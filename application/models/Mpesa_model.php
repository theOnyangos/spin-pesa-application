<?php

class Mpesa_model extends CI_Model {
	private $payments_table = 'payments';
	private $clients_table = 'clients';

	function save_payment_details($paymentData) {
		$this->db->insert($this->payments_table, $paymentData);
		return true;
	}

	function update_payment_details($response) {
		$resultCode = $response->Body->stkCallback->ResultCode;
		$merchantRequestID = $response->Body->stkCallBack->MerchantRequestID;
		$checkoutRequestID = $response->Body->stkCallBack->CheckoutRequestID;
		$resultDescription = $response->Body->stkCallBack->ResultDesc;
		$amount = $response->Body->stkCallBack->CallbackMetadata->Item[0]->Value;
		$mpesaReciptNumber = $response->Body->stkCallBack->CallbackMetadata->Item[1]->Value;
		// $Balance = $response->Body->stkCallBack->CallbackMetadata->Item[2]->Value;
		$transactionDate = $response->Body->stkCallBack->CallbackMetadata->Item[3]->Value;
		$phoneNumber = $response->Body->stkCallBack->CallbackMetadata->Item[4]->Value;
        if ($resultCode == 0) {
			$this->update_details($paymentStatus="Paid", $merchantRequestID, $checkoutRequestID, $resultDescription, $amount, $mpesaReciptNumber);
        } else {
			$this->update_details($paymentStatus="Failed", $merchantRequestID="", $checkoutRequestID, $resultDescription, $amount="", $mpesaReciptNumber="");
        }
	}

	function update_details($payment_status, $merchantRequestID, $checkoutRequestID, $resultDescription, $amount, $mpesaReciptNumber)
	{
		if (!empty($merchantRequestID) && !empty($mpesaReciptNumber)) {
			$payloadData = array(
				'payment_status' => $payment_status,
				'merchant_request_id' => $merchantRequestID,
				'checkout_request_id' => $checkoutRequestID,
				'result_description' => $resultDescription,
				'amount' => $amount,
				'mpesa_recipt_number' => $mpesaReciptNumber
			);
			$this->db->select('*');
			$this->db->where('checkout_request_id', $checkoutRequestID);
			$this->db->update()($this->payments_table, $payloadData);
			return true;
		} else {
			$payloadData = array(
				'checkout_request_id' => $checkoutRequestID,
				'result_description' => $resultDescription,
				'amount' => $amount,
			);
			$this->db->select('*');
			$this->db->where('checkout_request_id', $checkoutRequestID);
			$this->db->update($this->payments_table, $payloadData);
			return true;
		}
	}

	function culculate_amount($phone, $amount)
	{
		// Get the customer form the clients table
		$this->db->select(['client_name', 'client_phone_num', 'client_wallet_bal']);
		$this->db->where('client_phone_num', $phone);
		$this->db->from($this->clients_table);
		$query = $this->db->get();
		if (!empty($query->row())) {
			$amount_in_account = $query->row()->client_wallet_bal;
			// Calculate the amount and update the wallet
			$totalAmount = $amount_in_account + $amount;
			return $totalAmount;
		} else {
			return false;
		}
		
	}
}
