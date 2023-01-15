<?php

class Mpesa_payment extends CI_Model {
	private $payments_table = 'payments';

	function save_payment_details($paymentData) {
		$this->db->insert($this->payments_table, $paymentData);
		return true;
	}
}
