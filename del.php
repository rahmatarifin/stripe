<?php
include('Stripegateway.php');
$myStripe = new Stripegateway();
$data = array('cus_Dqsq58SM7pCGD0');
$result = $myStripe->customer($data);
echo "<pre>"; print_r($result);