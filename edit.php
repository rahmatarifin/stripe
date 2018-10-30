<?php
include ('Stripegateway.php');
$myStripe = new Stripegateway();
if(isset($_POST['btnsubmit'])){
	$data = array('email' => $_POST['email'],
		'description' => $_POST['description'],
		'currency' => $_POST['currency'],
		'account_balance' => $_POST['account_balance']
		);
	$result = $myStripe->customer($data);
	echo "<pre>"; print_r($result);
}