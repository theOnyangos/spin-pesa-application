<?php

class Mpesa_model extends CI_Model {
	private $payments_table = 'deposits2';

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

	function update_details($payment_status, $transactionDate, $mpesaReciptNumber, $resultDescription)
	{

	}
}
