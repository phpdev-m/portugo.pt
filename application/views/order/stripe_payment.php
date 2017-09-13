<?php




//include('C:Apache24/htdocs/portugo.pt/system/libraries/Stripe/init.php'); //usa local
require_once('./application/views/order/config.php');  //usa site


///para teste local nao funciona

//require_once('./application/views/order/config.php');

  //echo '<script type="text/javascript"> alert("'. $root. '")</script>';

//dados do cartao opcoes de info
/*
print_r($this->session->userdata('created_date')); 
echo '<pre>';
print_r($this->session->userdata('local'));
echo '<pre>';
print_r($this->session->userdata('paymentAmount'));
echo '<pre>';
print_r($this->session->userdata('creditCardType')); 
echo '<pre>';
print_r($this->session->userdata('creditCardNumber'));
echo '<pre>'; 
print_r($this->session->userdata('expMonth'));
echo '<pre>';
print_r($this->session->userdata('expYear'));
echo '<pre>';
print_r($this->session->userdata('cvv'));
echo '<pre>';
print_r($this->session->userdata('first_Name'));
echo '<pre>';
print_r($this->session->userdata('last_Name'));
echo '<pre>';
print_r($this->session->userdata('street'));
echo '<pre>';
print_r($this->session->userdata('city'));
echo '<pre>';
print_r($this->session->userdata('state'));
echo '<pre>';
print_r($this->session->userdata('zip'));
echo '<pre>';
print_r($this->session->userdata('countryCode'));
echo '<pre>';
print_r($this->session->userdata('currencyCode'));
echo '<pre>';
print_r($this->session->userdata('status'));
echo '<pre>';


die;
*/


/*

// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys

  \Stripe\Stripe::setApiKey("sk_test_9yncolScUeej6KHuKtF3aUXV");

// Token is created using Stripe.js or Checkout!
// Get the payment token ID submitted by the form:



$token = $_POST['stripeToken'];

// Charge the user's card:

echo '<script type="text/javascript"> alert("'. $token. '")</script>';

$charge = \Stripe\Charge::create(array(
  "amount" => 1000,
  "currency" => "usd",
  "description" => "Example charge",
  "source" => $token,
));

*/

   \Stripe\Stripe::setApiKey("sk_test_2FJhlPa7CqRWodcXZqCyk6CZ");

   $token  = $_POST['stripeToken'];

   $final_amount = "2388";  //$_POST['final_amount'];
   $order_number = $_POST['order_number'];



   $email = "user_payment@gmail.com"; //$_POST['email'];
   $descricao = "compra stripe file php"; // $_POST['descricao'];
   $origem = "resturantes";  //e$_POST['origem'];

 


  $customer = \Stripe\Customer::create(array(
      "email" => $email,
      "source"  => $token,
  ));


  
      // Charge the user's card:
      $charge = \Stripe\Charge::create(array(
      "amount" => $final_amount,
      "currency" => "usd",
      "customer" => $customer->id
      ));


 //echo '<script type="text/javascript"> alert("'. $token. '")</script>';


echo '<script type="text/javascript"> alert("'. $token. '")</script>';
echo '<script type="text/javascript"> alert("'. $final_amount. '")</script>';
//echo '<script type="text/javascript"> alert("'. $order_number. '")</script>';


?>













