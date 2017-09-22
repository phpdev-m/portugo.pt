<span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;">


<?php


//include('C:Apache24/htdocs/portugo.pt/system/libraries/Stripe/init.php');  //usa localserver
require_once('./application/views/order/config.php');    //usa site 


defined('BASEPATH') OR exit('No direct script access allowed');
  
class Stripe extends CI_Controller {
  
 public function __construct() {
  
 parent::__construct();
  
 }
  
         // public function index()
        //// {
        //     $this->load->view(stripe);
      //    }
  
 
 public function checkout()
 {


  \Stripe\Stripe::setApiKey("sk_test_2FJhlPa7CqRWodcXZqCyk6CZ");

   //@$session_order_data = $this->session->userdata('user_order_id');

   $token  = $_POST['stripeToken'];
   $final_amount=$this->session->userdata('final_amount');
  // $order_number =  @$session_order_data['order_id'];

   $email = 'user_controller@gmail.com'; //$_POST['email'];
   $descricao = 'compra stripe controller'; // $_POST['descricao'];
   $origem = 'restaurantes';  //e$_POST['origem'];


   //$final_amount=str_replace (".","", $final_amount); //sse nao tm decimal tem problema  opcao multiplica por 100
    $final_amount= $final_amount * 100;
   //echo '<script type="text/javascript"> alert("'. "valor total da ordem antes stripe server: " . $final_amount. '")</script>';


 
  $customer = \Stripe\Customer::create(array(
      "email" => $email,
      "source"  => $token,
  ));



 try 
 { 
  // Charge the user's card:
      $charge = \Stripe\Charge::create(array(
      "amount" => $final_amount,
      "currency" => "eur",
      "customer" => $customer->id
      ));
 }
 catch(Stripe_CardError $e) {}
 catch (Stripe_InvalidRequestError $e) {}
 catch (Stripe_AuthenticationError $e) {} 
 catch (Stripe_ApiConnectionError $e) {} 
 catch (Stripe_Error $e) {} 
 catch (Exception $e) {}
 

//echo '<script type="text/javascript"> alert("'. "TOKEN de autorizacao do servidor: " . $token. '")</script>';
//echo '<script type="text/javascript"> alert("'. "valor total da ordem (stripe): " . $final_amount. '")</script>';
//echo '<script type="text/javascript"> alert("'. $order_number. '")</script>';


//funcao envia order cartao
redirect('order/stripesuccess','refresh');


 } // public function checkout
  
} //class







?>

</span></span>