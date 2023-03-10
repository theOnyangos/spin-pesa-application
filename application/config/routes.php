<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['get_token'] = 'mpesa_payment';
$route['initiate_stk_push']['get'] = 'mpesa_payment/initiate_stk_pusher';
$route['callback_data']['post'] = 'mpesa_payment/stk_callback';
$route['payments/confirmation']['post'] = 'mpesa_payment/confirmation';
$route['payments/validation']['post'] = 'mpesa_payment/validation';
$route['simulate']['get'] = 'mpesa_payment/simulate';
$route['registerurl']['get'] = 'mpesa_payment/register_url';
$route['admin'] = 'admin/dashboard';
$route['admin/login'] = 'admin/login';
$route['admin/users'] = 'admin/users';
$route['admin/settings'] = 'admin/dashboard/settings';
$route['admin/update_password'] = 'admin/dashboard/update_password';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
