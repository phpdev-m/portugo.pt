<?php

//require_once(APPPATH.'config/autoload.php');

//echo '<script type="text/javascript"> alert("' .  ' envia server'  . '") </script>';

//$lib = realpath($_SERVER["DOCUMENT_ROOT"]) . '/system/libraries' ;

require_once('./system/libraries/Stripe/init.php');

//$teste =$lib; // base_url().'application/libraries/Stripe/lib/Stripe/Stripe';

//echo '<script type="text/javascript"> alert("' . $teste . ' envia server'  . '") </script>';



$stripe = array(
  "secret_key"      => "sk_test_9yncolScUeej6KHuKtF3aUXV",
  "publishable_key" => "pk_test_W1Feoc2oYQ7UpiLeBoY5V0N6"
);
 
//base_url() . 'application\libraries\Stripe\lib\Stripe\Stripe::setApiKey($stripe['secret_key'])';

$result = \Stripe\Stripe::setApiKey($stripe['secret_key']);

 //echo '<script type="text/javascript"> alert("' . $result . 'envia server'  . '") </script>';

?>

