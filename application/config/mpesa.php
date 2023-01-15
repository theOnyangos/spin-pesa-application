<?php

/**
 * @author - Dennis Otieno
 * @param Date - 15-01-2023
 * @param Description - Mpesa Configuration files key and secret
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

$config = array(
	'consumer_key' => 'GbGAWoMVfGRWVaw6nVNlKi0tpU5scGBU',
	'consumer_secret' => 'TlQL3a3frGRbf0sT',
	'endpoint' => 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
);
