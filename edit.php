<?php
include ('Stripegateway.php');
$myStripe = new Stripegateway();
if(isset($_POST['btnsubmit'])){
	$data = array('ID' => 'cus_Dqsq58SM7pCGD0',
		'description' => 'Customer adalah raja'
		);
	$result = $myStripe->customer($data);
	echo "<pre>"; print_r($result);
}