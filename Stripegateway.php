<?php
include("./vendor/autoload.php");

class Stripegateway{
	public function __construct(){
		$stripe = array(
			"secret_key" => "sk_test_W6dUyU2soLtfhYGh6wOkzG4a",
			"public_key" => "pk_test_c8TcUKRkxDqwq5EsmKVjOupv");

		\Stripe\Stripe::setApiKey($stripe["secret_key"]);
	}

	public function checkout($data){
		$message = "";
		try{
			$mycard = array('number' => $data['number'],
				'exp_month' => $data['exp_month'],
				'exp_year' => $data['exp_year']);
			$charge = \Stripe\Charge::create(array('card' => $mycard,
				'amount' => $data['amount'],
				'curency' => 'usd'));

			$message = $charge->status;
		}catch(Exception $e){
			$message = $e->getMessage();
		}
		return $message;
	}

	public function update_charger($data){
		$message = "";
		try{
			$ch = \Stripe\Charge::retrieve($data['id']);
			$ch ->description = $data['description'];
			$message = $ch->save();
		}catch(Exception $e){
			$message = $e->getMessage();
		}
		return $message;
	}

	public function customer($data){
		$message = "";
		try{
			$customer = \Stripe\Customer::create(array('email' => $data['email'],
				'description' => $data['description']));
		}catch(Exception $e){
			$message = $e->getMessage();
		}
		return $message;
	}

	public function editcustomer($data){
		$message = "";
		try{
			$cu = \Stripe\Customer::retrieve(array($data['id']));
			$cu = 
			$cu->save();
		}catch(Exception $e){
			$message = $e->getMessage();
		}
		return $message;
	}

	public function delcustomer($data){
		$message = "";
		try{
			$del = \Stripe\Customer::retrieve($data['id']);
			$del->delete();
		}catch(Exception $e){
			$message = $e->getMessage();
		}
		return $message;
	}

	public function payment_detail($id){
		$message = "";
		try{
			$ch = \Stripe\Charge::retrieve($id);
			$message = $ch->capture();
		}catch(Exception $e){
			$message = $e->getMessage();
		}
		return $message;
	}
}