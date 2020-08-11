<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		include APPPATH . 'third_party/src/Payment.php';
		include APPPATH . 'third_party/src/Validator.php';
		include APPPATH . 'third_party/src/Crypto.php';
	}
	public function request()
	{
		$this->load->view('payment/request');
	}
	public function submit()
	{
		$fname          = $_POST['full_name'];
		$product_name   = $_POST['product_name'];
		$email          = $_POST['email'];
		$amount         = $_POST['amount'];
		$contact        = $_POST['contact'];
		$country        = $_POST['country'];
		$state          = $_POST['state'];
		$city           = $_POST['city'];
		$postalcode     = $_POST['postalcode'];
		$address        = $_POST['address'];
		$obj = new \Paykun\Checkout\Payment('907827924705710', '9ADEC6FF0C1804049C84F02B0871B3AC', 'CA4CF211861A319F3A993FE8A672CC72', false,true);
		$successUrl = str_replace("request", "successs", $_SERVER['HTTP_REFERER']);
		$failUrl 	= str_replace("request", "failed", $_SERVER['HTTP_REFERER']);
		$microtime = str_replace('.', '', microtime(true));
		$p_id=substr($microtime, 0, 14);
		$obj->initOrder($p_id, $product_name,  $amount, $successUrl,  $failUrl, 'INR');
		$obj->addCustomer($fname, $email, $contact);
		$obj->addShippingAddress($country,$state,$city,$postalcode,$address);
		$obj->addBillingAddress($address,$city,$state,$country,$postalcode);
		//$obj->setCustomFields(array('udf_1' =>$custom_field_1.'0'));
		echo $obj->submit();
	}
	public function success()
	{
		$obj = new \Paykun\Checkout\Payment('907827924705710', '9ADEC6FF0C1804049C84F02B0871B3AC', 'CA4CF211861A319F3A993FE8A672CC72', false,true);
		$response = $obj->getTransactionInfo($_REQUEST['payment-id']);
		if(is_array($response) && !empty($response)) {

    if($response['status'] && $response['data']['transaction']['status'] == "Success") 
    {
    	echo "<pre>";
    	print_r($response);
    }
	}
	}
	public function failed()
	{
		$obj = new \Paykun\Checkout\Payment('907827924705710', '9ADEC6FF0C1804049C84F02B0871B3AC', 'CA4CF211861A319F3A993FE8A672CC72', false,true);
		$response = $obj->getTransactionInfo($_REQUEST['payment-id']);
		if(is_array($response) && !empty($response)) {
		if($response['status'] && $response['data']['transaction']['status'] == "Failed") {
			echo "<pre>";
			print_r($response);
    }
	}
	}

}



