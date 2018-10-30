<?php
include('Stripegateway.php');
$myStripe = new Stripegateway();
$data = array('ID' => 'cus_Dsgkl9dqi2X7BX');
$result = $myStripe->delcustomer($data);
echo "<pre>"; print_r($result);
?>