<?php

class Mpesa_model extends CI_Model {
	private $payments_table = 'payments';
	private $clients_table = 'clients';
	private $mpesa_settings_table = 'mpesa_settings';

	function save_payment_details($paymentData) {
		$this->db->insert($this->payments_table, $paymentData);
		return true;
	}

	function update_payment_details($response) {
		$ResultCode = $response->Body->stkCallback->ResultCode;
		$merchantRequestID = $response->Body->stkCallBack->MerchantRequestID;
		$checkoutRequestID = $response->Body->stkCallBack->CheckoutRequestID;
		$resultDescription = $response->Body->stkCallBack->ResultDesc;
		$amount = $response->Body->stkCallBack->CallbackMetadata->Item[0]->Value;
		$mpesaReciptNumber = $response->Body->stkCallBack->CallbackMetadata->Item[1]->Value;
		// $Balance = $response->Body->stkCallBack->CallbackMetadata->Item[2]->Value;
		$transactionDate = $response->Body->stkCallBack->CallbackMetadata->Item[3]->Value;
		$phoneNumber = $response->Body->stkCallBack->CallbackMetadata->Item[4]->Value;
        if ($ResultCode == 0) {
			$this->update_details($paymentStatus="Paid", $merchantRequestID, $checkoutRequestID, $resultDescription, $amount, $mpesaReciptNumber, $transactionDate);
        } else {
			$this->update_details($paymentStatus="Failed", $merchantRequestID="", $checkoutRequestID, $resultDescription, $amount="", $mpesaReciptNumber="", $transactionDate);
        }
	}

	function update_details($payment_status, $merchantRequestID, $checkoutRequestID, $resultDescription, $amount, $mpesaReciptNumber, $transactionDate)
	{
		if (!empty($merchantRequestID) && !empty($mpesaReciptNumber)) {
			$payloadData = array(
				'customer_message' => $payment_status,
				'merchant_request_id' => $merchantRequestID,
				'checkout_request_id' => $checkoutRequestID,
				'result_description' => $resultDescription,
				'amount' => $amount,
				'mpesa_recipt_number' => $mpesaReciptNumber,
				'transaction_date' => $transactionDate
			);
			$this->db->select('*');
			$this->db->where('checkout_request_id', $checkoutRequestID);
			$this->db->update()($this->payments_table, $payloadData);
			return true;
		} else {
			$payloadData = array(
				'customer_message' => $payment_status,
				'checkout_request_id' => $checkoutRequestID,
				'result_description' => $resultDescription,
				'amount' => $amount,
				'transaction_date' => $transactionDate
			);
			$this->db->select('*');
			$this->db->where('checkout_request_id', $checkoutRequestID);
			$this->db->update($this->payments_table, $payloadData);
			return true;
		}
	}

	function calculate_amount($phone, $amount)
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
			// Update the clients table
			$this->db->where('client_phone_num', $phone);
			$this->db->update($this->clients_table, array('client_wallet_bal' => $totalAmount));
			return true;
		} else {
			return false;
		}
		
	}

	function confirm_customer_payment($decRequest, $checkoutRequestID)
	{
		// Get user phone umber and amount paid
		$userDetails = $this->db->get_where($this->payments_table, array('checkout_request_id' => $checkoutRequestID))->row();
		$customerPhone = str_replace('254', '0', $userDetails->phone_number);
		$amountPaid = $userDetails->amount;
		// Get result code
		$resultCode = $decRequest['ResultCode'];
		if ($resultCode == 0) { //The payment was a success
			$message = $decRequest['ResultDesc'];
			// Update the database and the users wallet
			if ($this->update_payment($checkoutRequestID, $message, $resultCode)) {
				// Update customer wallet
				if ($this->calculate_amount($customerPhone, $amountPaid)) {
					// Return message to user
					$returnRes = array(
						'status' => 'success',
						'message' => 'Payment made successfully',
						'code' => $resultCode
					);
					echo json_encode($returnRes);
				}
			}
		} else { // The payment was not a successfull
			// Return the error message
			$message = $decRequest['ResultDesc'];
			// Update the db
			if ($this->update_payment($checkoutRequestID, $message, $resultCode)) {
				// Return message to user
				$returnRes = array(
					'status' => 'error',
					'message' => 'Payment unsuccessfull!',
					'code' => $resultCode
				);
				echo json_encode($returnRes);
			}
		}
	}

	function update_payment($checkoutRequestID, $message, $code)
	{
		if ($code == 0) {
			$this->db->select('*');
			$this->db->where('checkout_request_id', $checkoutRequestID);
			$this->db->update($this->payments_table, array('customer_message' => 'Paid', 'result_description' => $message));
			return true;
		} else {
			$this->db->select('*');
			$this->db->where('checkout_request_id', $checkoutRequestID);
			$this->db->update($this->payments_table, array('customer_message' => 'Failed', 'result_description' => $message));
			return true;
		}
	}

	function update_mpesa_settings($payloadData) 
	{
		$this->db->select('*');
		$this->db->where('id', 1);
		$this->db->update($this->mpesa_settings_table, $payloadData);
		return true;

	}
}
