<?php

use GuzzleHttp\Client;

class Mpesa_payment extends CI_Controller {

	private $consumer_key;
	private $consumer_secret;
	private $endpoint;
	private $mpesa_express_endpoint = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
	private $passKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
	private $businessShortCode = 174379; // Can be the business store number
	private $transactionType = "CustomerPayBillOnline";
	private $callBackUrl ="https://spin-pesa.com/index.php";
	private $accountReference = "Spin Pesa";
	private $transactionDesc = "Adding money to my wallet";

	function __construct()
	{
		parent::__construct();
		$this->load->model("Mpesa_model");
		$this->load->config('mpesa');
		$this->consumer_key = $this->config->item('consumer_key');
		$this->consumer_secret = $this->config->item('consumer_secret');
		$this->endpoint = $this->config->item('endpoint');
	}

	function index() {
		$phone = $_SESSION['logged_in_user'];
		// $this->db->select('*');
		// $this->db->from('clients');
		// $this->db->where(array('client_phone_num' => $phone));
		// $this->db->update('clients', array('client_wallet_bal' => 150));

		$clientData = $this->db->get_where('clients', array('client_phone_num' => $phone))->row_array();
		echo json_encode($clientData);
	}

	function get_mpesa_access_token()
	{
		$client = new Client();
		$res = $client->request('GET', $this->endpoint, [
			'auth' => [$this->consumer_key, $this->consumer_secret]
		]);
		$response = json_decode($res->getBody());
		return $response->access_token;
	}

	function initiate_stk_pusher() {
		$token = $this->get_mpesa_access_token();
		$amount = 1;
		$customer_phone_number = "0725134449";
		$result = $this->push_stk($token, $customer_phone_number, $amount);
		// Return response 
		$response = [
			'status' => 'success',
			'message' => $result
		];
		echo json_encode($response);
	}

	function push_stk($token, $phone, $amount)
	{
		$phone = substr_replace($phone, "254", 0, 1);
		$phone_number = $phone;
		$timestamp = date('YmdHis');
		$partyA = $phone_number;
		$partyB = 174379;
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
		$res = $response->data;
		$responseCode = $res->message->ResponseCode;
		if ($responseCode === 0) { // The request was successful
			$merchantRequestID = $res->message->MerchantRequestID;
            $checkoutRequestID = $res->message->CheckoutRequestID;
            $customerMessage = $res->message->CustomerMessage;
			$paymentData = array(
				'phone' => $phone,
				'amount' => $amount,
				'reference' => $this->accountReference,
				// 'user_id' => $this->session->userdata('logged_in_user'),
				'ResponseDescription' => $this->transactionDesc,
				'MerchantRequestID' => $merchantRequestID,
				'CheckoutRequestID' => $checkoutRequestID,
				'payment_status' => "Requested",
			);
			$this->Mpesa_model->save_payment_details((array)$paymentData);
			return $customerMessage;
		} else {
			return "Request was unable to be completed";
		}
	}

	// get STK Callback after the payment has been processed from safaricom
	function stk_callback() {
		$data = file_get_contents("php://input");
		write_file('./stk_data.txt', $data);
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
			$respons = array(
					"status" => "error",
				);
			$res = json_encode($respons);
		} else {
			$respons = array(
					"status" => "success",
					"data" => json_decode($response)
				);
			$res = json_encode($respons);
		}
		return $res;
	}

	function getAccessToken()
    {
        $url = $this->endpoint;
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
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "grant_type=client_credentials&client_id=$this->consumer_key&client_secret=$this->consumer_secret&scope=read write",
                CURLOPT_HTTPHEADER => array(
                  "content-type: application/x-www-form-urlencoded"
				),
		));
    
        $response = curl_exec($curl);
        $error = curl_error($curl);
        return json_decode($response)->access_token;
    }
}
