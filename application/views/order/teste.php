  <?php
include('C:Apache24/htdocs/portugo.pt/system/libraries/Stripe/init.php');


echo '<script type="text/javascript"> alert("") </script>'; 


$stripe = array(
  "secret_key"      => "sk_test_9yncolScUeej6KHuKtF3aUXV",
  "publishable_key" => "pk_test_W1Feoc2oYQ7UpiLeBoY5V0N6",
);



\Stripe\Stripe::setApiKey($stripe['secret_key']);
// Get the credit card details submitted by the form
$token  = $_GET['stripeToken'];
$email  = $_GET['stripeEmail'];
$callback = $_GET['callback'];

try {
  
    $customer = \Stripe\Customer::create(array(
      "source" => $token,
   "email" => $email
      ));
    $charge = \Stripe\Charge::create(array(
  'customer' => $customer->id,
     'amount'   => 1000,
      'currency' => 'usd'
    ));


    header('Content-type: application/json');
    $response_array['status'] = 'success';

    echo $callback.'('.json_encode($response_array).')';

    return 1;

} 

catch ( \Stripe\Error\Card $e) {
    // Since it's a decline, \Stripe\Error\Card will be caught
}
?>