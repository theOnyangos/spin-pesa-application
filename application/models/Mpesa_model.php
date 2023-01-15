<?php

class Mpesa_model extends CI_Model {
	private $payments_table = 'diposits2';

	function save_payment_details($paymentData) {
		$this->db->insert($this->payments_table, $paymentData);
		return true;
	}
}
