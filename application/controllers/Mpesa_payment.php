<?php

use GuzzleHttp\Client;

class Mpesa_payment extends CI_Controller {

	private $consumer_key;
	private $consumer_secret;
	private $endpoint;
	private $mpesa_express_endpoint = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
	private $token_endpoint = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
	private $passKey;
	private $partyB;
	private $businessShortCode; // Can be the business store number
	private $transactionType = "CustomerPayBillOnline";
	private $callBackUrl ="https://spinpesa.programmer.co.ke/callback_response";
	private $accountReference;
	private $transactionDesc = "Adding money to my wallet";
	private $stkQueryEndpoint = "https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query";
	private $payments_table = "payments";

	function __construct()
	{
		parent::__construct();
		$this->load->model("Mpesa_model");
		$this->load->config('mpesa');
		$this->consumer_key = $this->config->item('consumer_key');
		$this->consumer_secret = $this->config->item('consumer_secret');
		$this->passKey = $this->config->item('passKey');
		$this->businessShortCode = $this->config->item('businessSortCode');
		$this->accountReference = $this->config->item('accountReference');
		$this->partyB = $this->config->item('partyB');
	}

	function index() {
		$settingsArray = [
			'consumer_key' => $this->consumer_key,
			'consumerSecret' => $this->consumer_secret,
			'passKey' => $this->passKey,
			'businessShortCode' => $this->businessShortCode,
			'accountReference' => $this->accountReference,
			'partyB' => $this->partyB,
			'token' => $this->get_mpesa_access_token()
		];
		echo json_encode($settingsArray);
	}

	function get_mpesa_access_token()
	{
		$client = new Client();
		$res = $client->request('GET', $this->token_endpoint, [
			'auth' => [$this->consumer_key, $this->consumer_secret]
		]);
		$response = json_decode($res->getBody());
		return $response->access_token;
	}

	function initiate_stk_pusher() {
		$token = $this->get_mpesa_access_token();
		$amount = $this->input->post('amount');
		$customer_phone_number = $this->input->post('phone_number');
		// $amount = 1;
		// $customer_phone_number = '0725134449';
		$result = $this->push_stk($token, $customer_phone_number, $amount);
		// Return response 
		$response = [
			'status' => 'success',
			'message' => $result['message'],
			'CheckoutRequestID' => $result['CheckoutRequestID'],
		];
		echo json_encode($response);
	}

	function push_stk($token, $phone, $amount)
	{
		$phone = substr_replace($phone, "254", 0, 1);
		$phone_number = $phone;
		$timestamp = date('YmdHis');
		$partyA = $phone_number;
		$partyB = $this->partyB;
		$password = base64_encode($this->businessShortCode.$this->passKey.$timestamp);
		$datapayload = [
			'BusinessShortCode' => $this->businessShortCode,
			'Password' => $password,
			'Timestamp' => $timestamp,
			'TransactionType' => $this->transactionType,
			'Amount' => $amount,
			'PartyA' => $partyA,
			'PartyB' => $partyB,
			'PhoneNumber' => $phone_number,
			'CallBackURL' => $this->callBackUrl,
			'AccountReference' => $this->accountReference,
			'TransactionDesc' => $this->transactionDesc
		];

		$res = $this->getCurlSetting($this->mpesa_express_endpoint, $datapayload, $token);
		$response = json_decode($res);
		$responseCode = $response->ResponseCode;
		if ($responseCode == 0) { // The request was successful
			$merchantRequestID = $response->MerchantRequestID;
            $checkoutRequestID = $response->CheckoutRequestID;
            $customerMessage = $response->CustomerMessage;
			$paymentData = array(
				// 'id' => $this->generate_transaction_number(),
				'phone_number' => $phone,
				'amount' => $amount,
				'account_reference' => $this->accountReference,
				'response_description' => $this->transactionDesc,
				'merchant_request_id' => $merchantRequestID,
				'checkout_request_id' => $checkoutRequestID,
				'customer_message' => "Requested",
			);
			$this->Mpesa_model->save_payment_details((array)$paymentData);
			$responseReturn = array(
				'message' => $customerMessage,
				'CheckoutRequestID' => $checkoutRequestID
			);
			return $responseReturn;
		} else {
			return "Request was unable to be completed";
		}
	}

	// get STK Callback after the payment has been processed from safaricom
	function stk_callback() 
	{
		$data = file_get_contents("php://input");
		$response = json_decode($data, true);
		write_file(FCPATH.'public/file.txt', $response);
		$this->Mpesa_model->update_payment_details($response);
	}

	// Check if the payment was successfull or not
	public function validate_payment(){
		$checkoutRequestID = $this->input->post('CheckoutRequestID');
        $accessToken = $this->get_mpesa_access_token();
        $BusinessShortCode = $this->businessShortCode;
        $PassKey = $this->passKey;
        $url = $this->stkQueryEndpoint;
        $Timestamp = date('YmdHis');
        $Password = base64_encode($BusinessShortCode.$PassKey.$Timestamp);
        $CheckoutRequestID = $checkoutRequestID;
        $payload = [
            'BusinessShortCode' => $BusinessShortCode,
            'Timestamp' => $Timestamp,
            'Password' => $Password,
            'CheckoutRequestID' => $CheckoutRequestID
        ];
		$response = $this->getCurlSetting($url, $payload, $accessToken);
		$decRequest = json_decode($response, true);
		$this->Mpesa_model->confirm_customer_payment($decRequest, $checkoutRequestID);
    }

	// Calculate the amount to update the client's wallet
	function update_users_wallet($phone="0725134449", $amount=5) 
	{
		$this->Mpesa_model->culculate_amount($phone, $amount);
	}

	function generate_transaction_number()
    {
        // Get the last waybill number
        $this->db->select('id');
        $this->db->from($this->payments_table);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $last_waybill = $query->row()->waybill_number;
            $last_four_digits = substr($last_waybill, -4);
            $last_four_digits = (int) $last_four_digits;
            $last_four_digits = $last_four_digits + 1;
            $last_four_digits = (string) $last_four_digits;
            $last_four_digits_length = strlen($last_four_digits);
            if ($last_four_digits_length < 4) {
                $diff = 4 - $last_four_digits_length;
                for ($i = 0; $i < $diff; $i++) {
                    $last_four_digits = '0' . $last_four_digits;
                }
            }
            $first_four_digits = substr($last_waybill, 0, 4);
            $waybill = $first_four_digits . $last_four_digits;
            return $waybill;
        } else {
            return '10000001';
        }
	}

	//initializing curl
	function getCurlSetting($url, $curldata, $token)
	{
		$url = $url;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$token));
		$dataString = json_encode($curldata);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $dataString);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	
		$response = curl_exec($curl);
		$error = curl_error($curl);
		if ($error) {
			return $error;
		} else {
			return $response;
		}
	}

	function getAccessToken()
    {
        $url = $this->token_endpoint;
        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYHOST =>false,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => "key=$this->consumer_key&secret=$this->consumer_secret",
                CURLOPT_HTTPHEADER => array(
                  "content-type: application/x-www-form-urlencoded"
				),
		));
    
        $response = curl_exec($curl);
        $error = curl_error($curl);
        $finalRes = json_decode($response);
		echo json_encode($finalRes);
    }
}
