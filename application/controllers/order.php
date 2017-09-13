<?php 

//usa para teste localhost

//include('C:Apache24/htdocs/portugo.pt/system/libraries/Stripe/init.php'); //usa local
require_once('./application/views/order/config.php');  //usa site


class Order extends CI_Controller{
	
	
function __construct()
    {
        // Call the Model constructor
     parent::__construct();
	 
	
    $this->load->database();
	$this->load->model('signup_user_model');
	$this->load->model('myaccount_model');
	$this->load->model('order_model');
	$this->load->model('search_model');
	$this->load->model('restaurant_model');
	error_reporting(0);

	 }
	
				
				private function check_user_login(){
				
				@$session_data = $this->session->userdata('user_logged_in');
				if(@$session_data['user_id']==""){
				redirect('home','refresh');
				}
				}
				
	
	function dashboard()
	{
	$this->check_user_login();
		
	$session_data=$this->session->userdata('user_logged_in');
	$user_id = $session_data['user_id'];
	$this->data['user'] = $this->myaccount_model->myaccount($user_id);	
	$this->load->view('myaccount',$this->data);	
	}
	
	
	
	public function checkout()  //confere compras   apos finalizar pedido  - chamada do botao finalizar tela restaurant_detail - chamda do controller restaurant_detail  
	{

	 //$this->check_user_login();
	 $ip_address=$_SERVER['REMOTE_ADDR'];
         $this->data['cart']=$this->order_model->get_cart_detail($ip_address);


	 $this->data['restaurent']=$this->restaurant_model->all_restaurant_details(@$this->data['cart'][0]['restaurant_id']);	  
	 $this->load->view('order/checkout',$this->data);

	}
	 function update_quantity()
	 {
	 
	 $this->order_model->update_quantity($_POST);
	 }
	 
	 
	 function checkout_detail()  // confirma e vai para tela de pagamento  - chamada do botao  continuar na tela  de checkout - chamada  da tela view checkout
	 {


	$ip_address=$_SERVER['REMOTE_ADDR'];
	$this->data['cart']=$this->order_model->get_cart_detail($ip_address);
    
	  $this->data['restaurent']=$this->restaurant_model->all_restaurant_details(@$this->data['cart'][0]['restaurant_id']);	

           $this->data['payment_type']=$this->restaurant_model->get_bank_detail(@$this->data['cart'][0]['restaurant_id']);


	  $this->load->view('order/checkout_summary',$this->data);

	 }
	 
	 
	 
	 
	  //**************************customer login **********************************//
	 function login()
	  {



	  //$this->check_customer_session();	    
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters( '', '<br>' );
					$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');
					/*$this->form_validation->set_rules('user_password', '<strong>Password</strong>', 'trim|required');*/
					if($this->form_validation->run() == FALSE) {
					$this->data['error']=validation_errors();
					//$this->load->view('customer/login',$this->data);	
					echo $this->data['error'];
					}
					else
					{
					 $user=$this->signup_user_model->user_login($_POST['email'],$_POST['password']);
					if($user) { $s = array('status' => $user->status,'user_id' => $user->user_id,);

			if($s['status']==1)
                       {
                        $sess_array = array('user_id' => $user->user_id,'status' => $user->status,);
			$this->session->set_userdata('user_logged_in', $sess_array);

			if(isset($_POST['remember']) && $_POST['remember']=='1')
                        {
			$this->load->helper('cookie');
			$this->input->set_cookie("email",$_POST['email'],time()+(86400*7));
			$this->input->set_cookie("password",$_POST['password'],time()+(86400*7));
			$this->input->set_cookie("remember",$_POST['remember'],time()+(86400*7));
			}
			else{
			$this->load->helper('cookie');
			delete_cookie('email');
			delete_cookie('password');
			delete_cookie('remember');
			}
			echo '1';

                        }
	  } else {
					echo  "Invalid Email or Password";
					}
					}
				
					
					
	  }
	 
	 
	 
	 
	 
	 function guest_signup()
	 {
			$this->load->helper(array('form'));
			 $this->load->library('form_validation');
			$this->form_validation->set_rules('full_name', '<strong>First Name</strong>', 'required');
		     $this->form_validation->set_rules('adress_line_1', '<strong>Last Name</strong>', 'required');
			$this->form_validation->set_rules('email', '<strong>Email</strong>', 'required|valid_email');
		    $this->form_validation->set_rules('phone_number', '<strong>Phone Number</strong>', 'required');
			$this->form_validation->set_rules('city', '<strong>City</strong>', 'required');
			$this->form_validation->set_rules('postcode', '<strong>Postcode</strong>', 'required');
			

			if ($this->form_validation->run() == FALSE)
			{

			$this->data['error']=validation_errors();			
			echo $this->data['error'];

			}
			else
			{
		    $guest_id=$this->order_model->insert_guest($_POST);
			$this->session->set_userdata('last_quest_id', $guest_id);
			echo '1';
          }

			
			
	 }
	 
	 

         //CARREGA FORMA DE PAGTO E ARMAZENA DO DATABASE 
	  function insert_order()
	 {	


//date_default_timezone_set('Africa/Nairobi');


	   $ip_address=$_SERVER['REMOTE_ADDR'];
	   $cart=$this->order_model->get_cart_detail($ip_address);
	   $payment_method=$_GET['payment_method'];
	   $add_coment=$_GET['add_coment'];
	   $subtotal = $_GET['subtotal'];


//echo '<script type="text/javascript"> alert("'.  $subtotal . '")</script>';
//para pagamento pelo usuario
//exit();





		if($payment_method=='Cash on Delivery')
		{

		 if(!empty($cart))
                 {
          	 $delivery_charge=0;
        	 $delivery_time='';
  		$restaurent_info=$this->restaurant_model->all_restaurant_details($cart[0]['restaurant_id']);


                //testa o tipo de pedido e armazena horario ou nao armazena / testa entrega rapida
 		if(isset($restaurent_info['delivery_charges']) && $restaurent_info['delivery_charges']!=''){$delivery_charge=$restaurent_info['delivery_charges'];}
		if(isset($restaurent_info['delivery_time_min']) && $restaurent_info['delivery_time_min']!=''){$delivery_time=$restaurent_info['delivery_time_min'];}


                // carrega valor do delivery do db


	        $delivery_time_save=$this->order_model->get_delivery_time($ip_address);

		if(empty($delivery_time_save))
                {

                      //envia horario para entrega imediata e  para tempo estimado
             	      if($delivery_time!='')
                         {
                         $estimate_delivery_time=$delivery_time;  //teste envia o tempo para entrega para o model e no model calcula o horario de entrega na hora atual

                         }
                         else
                         {
                         $estimate_delivery_time='';
                         }
		}
                else
                {

               //insere order no DB usa funcao insert_order do model  order_model  para escolha de delivery com horario
                $estimate_delivery_time=$delivery_time_save['date_time'];
               }





                $type=$cart[0]['type'];

                if($type!='delivery')
                 {
                 $delivery_charge=0;
                 }
                else
                 {
                    if ($subtotal >= $restaurent_info['free_delivery'])
                        {
                        $delivery_charge=0;
                        }
                  }
//echo '<script type="text/javascript"> alert("'.  $subtotal . '")</script>';
//para pagamento pelo usuario
//exit();




///////////////////////////////////////////////////////inicio da oredem paga pelo cliente direto


	    $order_id= $this->order_model->insert_order($_GET,$cart[0]['restaurant_id'],$cart[0]['type'],$delivery_charge,$estimate_delivery_time); //chama model para isnserir dados no db  



		$this->restaurant_model->upadte_order_number($cart[0]['restaurant_id']);  //atualiza o numero deordens no cadastro do restaurante



		foreach($cart as $allcart)
		 {
		 $menu=$this->search_model->get_menu_detail($allcart['menu_id']);
		 $addon_cost='';$amount=array();
		 
                if($allcart['addons']!=''){$addon_id= explode(',',$allcart['addons']);$addons=$this->search_model->get_addonsby_id($addon_id);
	         if(!empty($addons)){foreach($addons as $alladons){array_push($amount,$alladons['price']);} 
	         $addon_cost=implode(',',$amount);} }
		$this->search_model->insert_order_detail($order_id,$allcart['menu_id'],$allcart['addons'],$allcart['quantity'],$menu['item_cost'],$addon_cost);
		 }
	       }

	 $last_order=$this->order_model->get_order($order_id);


//envia  order to mail
	 $this->send_order_mail($order_id);

	 $this->myaccount_model->empty_cart($ip_address);

	 $this->session->set_flashdata('success_msg', $last_order['order_id']);

	 $sess_array_order_id = array('order_id' => $last_order['order_id'],);

	 $this->session->set_userdata('user_order_id', $sess_array_order_id);
 
        redirect('order/success','refresh');

/////////////////////////////////////////////////////////////////final da order paga direto
		}
		else if($payment_method=='Paypal')
		{
		$this->session->set_userdata('order_detail', $_GET);
		redirect('order/paypal');
		}
		

    	else if($payment_method=='Stripe')
		{

		$this->session->set_userdata('order_detail', $_GET);

		redirect('order/stripe');
		}

     	else if($payment_method=='Edyen')
		{

		$this->session->set_userdata('order_detail', $_GET);

		redirect('order/edien');
		}



		else if($payment_method=='Credit Card')
		{

		$this->session->set_userdata('order_detail', $_GET);
		redirect('order/credit_card');
		}		
		
		else if($payment_method=='MB')
		{
		$this->session->set_userdata('order_detail', $_GET);
		redirect('order/mb');
		
		}
		
				
	
	 }
	 
	 
	 //************************** credit card* STRIPE**********************************//
	 
	  function credit_card()
	 {


	// $this->load->view('order/paypalfunctions');

	   $orderdetail=$this->session->userdata('order_detail');

	   $ip_address=$_SERVER['REMOTE_ADDR'];


	   $cart=$this->order_model->get_cart_detail($ip_address);

	    $restaurent_info=$this->restaurant_model->all_restaurant_details(@$cart[0]['restaurant_id']);

	   $total_amount=0;

$delivery_charge=0;

if(isset($restaurent_info['delivery_charges']) && $restaurent_info['delivery_charges']!=''){$delivery_charge=$restaurent_info['delivery_charges'];}


//if(isset($tax['service_tax'])){$service_tax=$tax['service_tax'];}else{$service_tax=0;}
//if(isset($tax['vat_tax'])){$vat_tax=$tax['vat_tax'];}else{$vat_tax=0;}


//echo '<script type="text/javascript"> alert("'. $order_detail['card_number_order'] . '")</script>';
//para pagamento pelo usuario
//exit();


		 if(!empty($cart))
		 {
		 foreach($cart as $allcart)
		 {
		 $menu=$this->search_model->get_menu_detail($allcart['menu_id']);
		 $total_amount=$total_amount+$menu['item_cost']*$allcart['quantity'];
		  
		   if($allcart['addons']!='')
	  {
	   $addon_id= explode(',',$allcart['addons']);
	   $addons=$this->search_model->get_addonsby_id($addon_id);
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total_amount=$total_amount+$alladons['price'];
	   } } }
	   } }
	   $final_amount=$total_amount+$delivery_charge;
	   
	    if($orderdetail['user_type']=='user')
   	   {

//	   $user_id=@$session_data['user_id'];
           
//	   $user=$this->myaccount_model->myaccount(@$session_data['user_id']);

//	   $user_address=$this->myaccount_model->get_user_address(@$session_data['user_id']);

           $user_id=$orderdetail['user_id'];

           $user=$this->myaccount_model->myaccount($user_id); 

           $first_Name=ucwords($user['first_name']);

           $last_Name=ucwords($user['last_name']);

           $user_address=$this->myaccount_model->get_user_address($user_id);	   

 	  $user_address1=$user_address['apartment'];
      $user_address2=$user_address['address'];
	  $user_city=$user_address['city'];
	  $user_state=$user_address['state'];
	  $user_zip=$user_address['zip_code'];

	  }
	  else
	  {
   	   $user_id = $this->session->userdata('last_quest_id');
	   $guest=$this->order_model->get_guest_detail($user_id);
	   $first_Name=ucwords($guest['full_name']);
	   $user_street=$guest['address_line_1'];
	   $user_city=$guest['city'];
	   $$user_state=$guest['state'];
	   $user_zip=$guest['postcode'];
	  }
	   
	   

$created_date =date('Y-m-d h:i:s');

$local = $restaurent_info['restaurant_name'];


$paymentAmount = $final_amount;

$creditCardType= 'Credit Card';

$creditCardNumber= $orderdetail['card_number_order'];

$expMonth= $orderdetail['month_order'];

$expYear= $orderdetail['year_order'];

$expDate= $orderdetail['month_order'] ."/".  $orderdetail['year_order'];

$cvv= $orderdetail['cvv_order'];


$street=$user_address['apartment'] ;

$city=$user_city;
$state=$user_state;
$zip=$user_zip;

$countryCode="US";

$currencyCode = "EURO";

$paymentType = "Sale";



//echo '<script type="text/javascript"> alert("'.$currencyCode. '")</script>';


/*

//secho '<script type="text/javascript"> alert("'.$restaurantlocal. '")</script>';


////Envia pagamento para credit card

echo '<script type="text/javascript"> alert("'. $first_Name. '")</script>';
echo '<script type="text/javascript"> alert("'. $last_Name. '")</script>';
echo '<script type="text/javascript"> alert("'. $street . '")</script>';
echo '<script type="text/javascript"> alert("'. $user_address2 . '")</script>';
echo '<script type="text/javascript"> alert("'. $user_city . '")</script>';
echo '<script type="text/javascript"> alert("'. $user_state . '")</script>';
echo '<script type="text/javascript"> alert("'. $user_zip . '")</script>';



echo '<script type="text/javascript"> alert("'. $orderdetail['user_type'] . '")</script>';
echo '<script type="text/javascript"> alert("'. $orderdetail['user_id'] . '")</script>';
echo '<script type="text/javascript"> alert("'. $orderdetail['address_id'] . '")</script>';
echo '<script type="text/javascript"> alert("'. $orderdetail['payment_method'] . '")</script>';
echo '<script type="text/javascript"> alert("'. $orderdetail['service_tax'] . '")</script>';
echo '<script type="text/javascript"> alert("'. $orderdetail['vat_tax'] . '")</script>';
echo '<script type="text/javascript"> alert("'. $orderdetail['card_number_order'] . '")</script>';
echo '<script type="text/javascript"> alert("'. $orderdetail['cvv_order'] . '")</script>';
echo '<script type="text/javascript"> alert("'. $orderdetail['month_order'] . '")</script>';
echo '<script type="text/javascript"> alert("'. $orderdetail['year_order'] . '")</script>';
echo '<script type="text/javascript"> alert("'. $orderdetail['add_comment'] . '")</script>';
echo '<script type="text/javascript"> alert("'. $orderdetail['subtotal'] . '")</script>';
*/



// $restaurent_info
//echo '<script type="text/javascript"> alert("'. $orderdetail['subtotal'] . '")</script>';
//cria sessao para uasr no pagto



/////////////////////////usa essa parte para enviar dados para stripe  via formulario


//cria sessio com dados do cartao

$this->load->library('session');
$sess_array = array('created_date' =>$created_date,'local' =>$local,'paymentAmount' =>$paymentAmount,'creditCardType' =>$creditCardType, 'creditCardNumber' =>$creditCardNumber,'expMonth' =>$expMonth,'expYear' =>$expYear, 'cvv' =>$cvv, 'first_Name' =>$first_Name, 'last_Name' =>$last_Name, 'street' =>$street, 'city' =>$city, 'state' =>$state, 'zip' =>$zip, 'countryCode' =>$countryCode, 'currencyCode' => $currencyCode ,'status'   => TRUE);
$this->session->set_userdata($sess_array);



 //$this->load->view('order/stripe_embed.php',$this->data);

//echo '<script type="text/javascript"> alert("'. $orderdetail['subtotal'] . '")</script>';

//envia para paypal pagto cartao



//$resArray = DirectPayment($paymentType, $paymentAmount, $creditCardType, $creditCardNumber,$expDate, $cvv, $first_Name, $last_Name, $street, $city, $state, $zip, $countryCode, $currencyCode );



//usa stripe enviaando para formulario dados do cartao criptografado, deve criar um tokem para enviar e envia por ajax o POST



//print_r($resArray);die;

/*$ack = strtoupper($resArray["ACK"]);

if(strtoupper($resArray["ACK"])=="SUCCESS" || strtoupper($resArray["ACK"])=="SUCCESSWITHWARNING")
{	
//echo '1';
//redirect('order/credit_card_success');		
} 
else  
{
	//Display a user friendly Error on the page using any of the following error information returned by PayPal
	$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
	$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
	$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
	//$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);

	//echo "SetExpressCheckout API call failed. ";
	echo $ErrorLongMsg;
	//echo "Short Error Message: " . $ErrorShortMsg;
	//echo "Error Code: " . $ErrorCode;
	//echo "Error Severity Code: " . $ErrorSeverityCode;
	
	
	//$this->load->view('order/paypalcancel');
}
     // echo  '<pre>';
	  // print_r($order_detail); die;
*/


}
	 
	
	 
	 function credit_card_success()
	 {
	 $ip_address=$_SERVER['REMOTE_ADDR'];
	   $cart=$this->order_model->get_cart_detail($ip_address);
	    $order_detail=$this->session->userdata('order_detail');
	  if(!empty($cart))
	    {
	 $delivery_charge=0;
	 $delivery_time='';
		$restaurent_info=$this->restaurant_model->all_restaurant_details($cart[0]['restaurant_id']);
		if(isset($restaurent_info['delivery_charges']) && $restaurent_info['delivery_charges']!=''){$delivery_charge=$restaurent_info['delivery_charges'];}
		if(isset($restaurent_info['delivery_time_min']) && $restaurent_info['delivery_time_min']!=''){$delivery_time=$restaurent_info['delivery_time_min'];}
	   $delivery_time_save=$this->order_model->get_delivery_time($ip_address);
		 if(empty($delivery_time_save)){
		if($delivery_time!=''){ $estimate_delivery_time=time()+($delivery_time*60*60);}else{$estimate_delivery_time='';}
		}else{$estimate_delivery_time=$delivery_time_save['date_time'];}
		
	    $order_id= $this->order_model->insert_order($order_detail,$cart[0]['restaurant_id'],$cart[0]['type'],$delivery_charge,$estimate_delivery_time);
		$this->restaurant_model->upadte_order_number($cart[0]['restaurant_id']);
		foreach($cart as $allcart)
		 {
		 $menu=$this->search_model->get_menu_detail($allcart['menu_id']);
		 $addon_cost='';$amount=array();
		 
if($allcart['addons']!=''){$addon_id= explode(',',$allcart['addons']);$addons=$this->search_model->get_addonsby_id($addon_id);
	  if(!empty($addons)){foreach($addons as $alladons){array_push($amount,$alladons['price']);} 
	  $addon_cost=implode(',',$amount);} }
		$this->search_model->insert_order_detail($order_id,$allcart['menu_id'],$allcart['addons'],$allcart['quantity'],$menu['item_cost'],$addon_cost);
		 }
	 }

	 $last_order=$this->order_model->get_order($order_id);


	 $this->send_order_mail($order_id);
	 $this->myaccount_model->empty_cart($ip_address);
	 $this->session->set_flashdata('success_msg', $last_order['order_id']);
	 $this->session->unset_userdata('order_detail');

	 redirect('order/success','refresh');
	 
	 }
	 


	 function success()
	 {
	 $this->load->view('order/success');
	 }
	 

//////CHAMA APP PARA PAGMTO ALL CARDS

	 function stripe()
	 {

    	 //echo '<pre>';
         // $this->load->view('order/paypalfunctions');
       $order_detail=$this->session->userdata('order_detail');
	   $ip_address=$_SERVER['REMOTE_ADDR'];
	   $cart=$this->order_model->get_cart_detail($ip_address);
	   $restaurent_info=$this->restaurant_model->all_restaurant_details(@$cart[0]['restaurant_id']);
	   $total_amount=0;
       $delivery_charge=0;


       if(isset($restaurent_info['delivery_charges']) && $restaurent_info['delivery_charges']!=''){$delivery_charge=$restaurent_info['delivery_charges'];}

//if(isset($tax['service_tax'])){$service_tax=$tax['service_tax'];}else{$service_tax=0;}
//if(isset($tax['vat_tax'])){$vat_tax=$tax['vat_tax'];}else{$vat_tax=0;}

		 if(!empty($cart))
		 {
		 foreach($cart as $allcart)
		 {
		 $menu=$this->search_model->get_menu_detail($allcart['menu_id']);
		 $total_amount=$total_amount+$menu['item_cost']*$allcart['quantity'];
		  
		   if($allcart['addons']!='')
	   {
	   $addon_id= explode(',',$allcart['addons']);
	   $addons=$this->search_model->get_addonsby_id($addon_id);
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	   {
	   $total_amount=$total_amount+$alladons['price'];
	   } } }
	   } }



//corrige cobranca de taxa no final do paypal/stripe/adyen

          if($total_amount > $restaurent_info['free_delivery'] )
		   {
	        $final_amount=$total_amount;
            }
            else
          	 {
              $final_amount=$total_amount+$delivery_charge;
              }



//echo '<script type="text/javascript"> alert("'. $final_amount . '")</script>';

//echo '<script type="text/javascript"> alert("'. $total_amount . '")</script>';


	    $this->data['final_amount']=$final_amount;

		$this->data['item_count']=count($cart);



///funcao stripe/////////////// chama botao para carregar pagamento em javascript
//modo custom
//<button id="customButton">Purchase</button>



//envai final amount sem virgula para stripe
//$final_amount=str_replace (".","", $final_amount);

$this->load->library('session');
     $sess_array = array('final_amount' =>$final_amount, 'item_count' =>$item_count, 'status'   => TRUE);
$this->session->set_userdata($sess_array);


 
 //$final_amount=str_replace (".","", $final_amount); //tira 0 qdo nao tem decimal opcao manter com ponto e multiplicar por 100
 $final_amount= $final_amount * 100;

$show_amount = 'antes stripe web page : ' .  $final_amount;


//echo '<script type="text/javascript"> alert("' . $show_amount . '") </script>'; 
?>



<!--  verasao local 
<form name="stripeform" id="stripeform" action="" method="POST">

<script src="https://checkout.stripe.com/checkout.js"></script>

<button id="customButton">Purchase</button>

<script>

var handler = StripeCheckout.configure({
  key: "pk_test_W1Feoc2oYQ7UpiLeBoY5V0N6",
  image: "https://portugo.pt/public/images/logopay.png",
  locale: "auto",
  currency: "usd",
  token: function(token) {
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
                        }
   });

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: "PortugGO",
    description: "TakeAway",
    zipCode: true,
    amount: 3200 ,  //"<?php echo $this->session->userdata('final_amount') ;?>"
  });

  e.preventDefault();

});

// Close Checkout on page navigation:w
window.addEventListener('popstate', function() {
handler.close();
});
</script>
</form>

-->

<!--  versao server-side com stripe_payment
<form action="<?php echo site_url('stripe/checkout');?>" method="POST">
<form name="stripeform" id="stripeform" action="<?php echo base_url('application/views/order/stripe_payment.php'); ?>" method="POST">
-->





<!--  //ultima versao com saida de ordem  chama controller ou pagina externa
<span style="font-size:12px;"><span style="font-family:arial,helvetica,sans-serif;"><!DOCTYPE html>
<html lang="en">
<body>
<div class='web'>
<form action="<?php echo site_url('stripe/checkout');?>" method="POST">
<script>
 </script>
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_W1Feoc2oYQ7UpiLeBoY5V0N6"
    data-amount= "<?php echo $final_amount; ?>"
    data-name="PortuGO"
    data-description="TakeWay"
    data-image="https://portugo.pt/public/images/logopay.png"
    data-locale="auto"
    data-currency="usd"
    data-zip-code="true">
  </script>
</form>
</div>
</body>
</html></span></span>
 -->





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="icon" href="<?php echo base_url();?>public/images/logoportugo.png">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
 <!-- Bootstrap core CSS -->
     <link href="<?php echo base_url();?>public/front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>public/front/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/front/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/front/css/font.css" rel="stylesheet">
     <!-- ...............add................-->
    <link href="<?php echo base_url();?>public/front/css/new_css.css" rel="stylesheet">
     <!-- ...............add................-->
     <link href="<?php echo base_url();?>public/front/css/jquery-ui.css" rel="stylesheet">
<!--<script type="text/javascript" src="<?php //echo base_url();?>public/front/js/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/bootstrap.min.js"></script>
<!--<script src="js/scrolltopcontrol.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/front/css/dd.css" />
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.dd.js"></script>
<script>
$(function(){
 $(window).on('load',function(){
     //alert();
 //$('.selected .ddlabel').hide();
 //$('.selected .fnone').hide();

 //javascript:document.stripeform.submit();

 });
 $('#mycomp').on('change',function(){
    var flag = $(this).val();
    
    $('.enabled _msddli_ selected ddlabel').hide();
    $('.enabled _msddli_ selected fnone').hide();
    
 });
$(document).on('mouseleave','#mycomp_msdd',function(){
    $(this).removeClass('borderRadiusTp');
     $(this).addClass('borderRadius');
     $('#mycomp_child').hide();
 });
  $(document).on('mouseenter','#mycomp_msdd',function(){
   $(this).removeClass('borderRadius');
    $(this).addClass('borderRadiusTp');
    
     $('#mycomp_child').show();
 });
});
</script>

<script>
$(function(){

  $(document).on('click',function(){
    $('.navbar-collapse').removeClass('in');
  });
  $(window).scroll(function() {
   var height=$(window).height();
   if($(this).scrollTop()>=400 ){
    //$('.navbar-collapse').removeClass('in');

}
});
$('.dropdown').on('click',function(){
$('.san').hide();
});
$('.navbar-toggle').on('click',function(){
$('.san').show();
});
});
</script>

<title>PortuGo</title>
</head>
<body>

<?php 

$this->load->view('segment/header'); 

?> 
  <div class=" inner_wrapper wrap_margin" >
  <div class="container">
    <div class="row">
     <div class="col-md-12 padding_main">
     <div class="col-md-12">
     
     <div class="thanks" style="min-height:300px;">
     <h1 style="font-size:35px; color:#000000; line-height:40px"><?php //echo $this->lang->line('Please wait while you are redirected to site or payment');?> Obrigado por escolher PortuGO, confirme a operação clicando no botão abaixo, suas informações serão criptografadas e não permaneçerão no portátil.</h1>

     <p><img src="<?php //echo base_url();?>public/front/images/ajax-loader.gif"  /></p>


<!--
<form name="stripeform" id="stripeform" action="<?php echo base_url('application/views/order/stripe_payment.php');?>" method="POST">
<form action="<?php echo site_url('stripe/checkout');?>" method="POST">
<form name="stripeform" id="stripeform" action="<?php echo base_url('application/views/order/stripe_payment.php');?>" method="POST">
"<?php echo $this->session->userdata('final_amount') ;?>"
-->


<?php 

//esse form envia para o stripe autenticar e retorna se foi feita a operacao pela pagian stripe_payment.php
?>




<form action="<?php echo site_url('stripe/checkout');?>" method="POST">
<script>
 </script>
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_qKeX51DeZSeHuWUsk2RSoyMc"
    data-amount= "<?php echo $final_amount; ?>"
    data-name="PortuGO"
    data-description="TakeWay"
    data-image="https://portugo.pt/public/images/logopay.png"
    data-locale="auto"
    data-currency="eur"
    data-zip-code="true">
  </script>
</form>


     </div>
     </div>
     </div>
     </div>
    </div>
    
  

  <?php $this->load->view('segment/footer'); ?>  
 
 
</body>
</html>


<script>
$(document).ready(function(){
    $(document).on('click',".mess_btn",function(){
    $(".send_mass").show();
  });
  
   //javascript:document.stripeform.submit();

});
</script>

 <script>

$(document).ready(function(e) {     
    //no use
    try {
        var pages = $("#pages").msDropdown({on:{change:function(data, ui) 
                {
            var val = data.value;
        if(val!="")
            window.location = val;
            }}}).data("dd");
        var pagename = document.location.pathname.toString();
        pagename = pagename.split("/");
        pages.setIndexByValue(pagename[pagename.length-1]);
        $("#ver").html(msBeautify.version.msDropdown);


    } catch(e) {
        //console.log(e);   
    }
    
    $("#ver").html(msBeautify.version.msDropdown);
        
    //convert
    $(".select").msDropdown({roundedBorder:false});
    createByJson();
    $("#tech").data("dd");
});
function showValue(h) {
    console.log(h.name, h.value);
}
$("#tech").change(function() {
    console.log("by jquery: ", this.value);
})
//
</script>

<style>
#mycomp_child{height:90px!important;}

#mycomp1_child{ margin-left: -6px;
    margin-top: 25px;}

</style>



<?php

//vai para versao out form

 //depois de aceitar a order retorna numero da ordem e outro para avaliar no pagamento

//tem que validar depois e estudar para retirar o ou nao do db caso  nao pague


//$this->load->view('order/stripe_checkout',$this->data);


}



	public  function stripesuccess()
	 {

        ////////////////////////////////////////cria ordem e vai para pagto
   
        $ip_address=$_SERVER['REMOTE_ADDR'];

	    $cart=$this->order_model->get_cart_detail($ip_address);


	    $order_detail=$this->session->userdata('order_detail');	


	  if(!empty($cart))
	    {


   	    $delivery_charge=0;

	    $delivery_time='';



		$restaurent_info=$this->restaurant_model->all_restaurant_details($cart[0]['restaurant_id']);

		if(isset($restaurent_info['delivery_charges']) && $restaurent_info['delivery_charges']!=''){$delivery_charge=$restaurent_info['delivery_charges'];}

		if(isset($restaurent_info['delivery_time_min']) && $restaurent_info['delivery_time_min']!=''){$delivery_time=$restaurent_info['delivery_time_min'];}

	    $delivery_time_save=$this->order_model->get_delivery_time($ip_address);

		if(empty($delivery_time_save)){

		if($delivery_time!=''){ $estimate_delivery_time=time()+($delivery_time*60*60);}
		else
		{$estimate_delivery_time='';}

		}
		else
		{

	    $estimate_delivery_time=$delivery_time_save['date_time'];}



/////////////////////////////insere order //////////////////////////
	    



	    $order_id= $this->order_model->insert_order($order_detail,$cart[0]['restaurant_id'],$cart[0]['type'],$delivery_charge,$estimate_delivery_time);



		$this->restaurant_model->upadte_order_number($cart[0]['restaurant_id']);

		foreach($cart as $allcart)
		 {
		 $menu=$this->search_model->get_menu_detail($allcart['menu_id']);

		 $addon_cost='';$amount=array();
	

        if($allcart['addons']!=''){$addon_id= explode(',',$allcart['addons']);$addons=$this->search_model->get_addonsby_id($addon_id);

	    if(!empty($addons)){foreach($addons as $alladons){array_push($amount,$alladons['price']);} 

	    $addon_cost=implode(',',$amount);} }

	    $this->search_model->insert_order_detail($order_id,$allcart['menu_id'],$allcart['addons'],$allcart['quantity'],$menu['item_cost'],$addon_cost);

		 }

	    }    



	 $this->send_order_mail($order_id);

	 $this->myaccount_model->empty_cart($ip_address);

	 $this->session->set_flashdata('success_msg', $last_order['order_id']);

	 $this->session->unset_userdata('order_detail');


// envia o numero da ordem

	 $last_order=$this->order_model->get_order($order_id);

	 $sess_array_order_id = array('order_id' => $last_order['order_id'],);

	 $this->session->set_userdata('user_order_id', $sess_array_order_id);


	// echo '<script type="text/javascript"> alert("'. $last_order['order_id'] . '")</script>';

//@$session_order_data = $this->session->userdata('user_order_id');
//echo '<script type="text/javascript"> alert("'.  @$session_order_data['order_id'] . '")</script>';
////////////////////////////////////////cria ordem e vai para pagto
//vai para pagamento de cartao

//$this->load->view('order/stripe_checkout',$this->data);

  redirect('order/success','refresh');


	 }
	 


	 
	 function stripelcancel()
	 {
	  $this->load->view('order/stripecancel');
	 }




	 function adyen()
	 {

	   //echo '<pre>';
       // $this->load->view('order/paypalfunctions');

       $order_detail=$this->session->userdata('order_detail');
	   $ip_address=$_SERVER['REMOTE_ADDR'];
	   $cart=$this->order_model->get_cart_detail($ip_address);
	   $restaurent_info=$this->restaurant_model->all_restaurant_details(@$cart[0]['restaurant_id']);
	   $total_amount=0;
       $delivery_charge=0;


         if(isset($restaurent_info['delivery_charges']) && $restaurent_info['delivery_charges']!=''){$delivery_charge=$restaurent_info['delivery_charges'];}

//if(isset($tax['service_tax'])){$service_tax=$tax['service_tax'];}else{$service_tax=0;}
//if(isset($tax['vat_tax'])){$vat_tax=$tax['vat_tax'];}else{$vat_tax=0;}

		 if(!empty($cart))
		 {
		 foreach($cart as $allcart)
		 {
		 $menu=$this->search_model->get_menu_detail($allcart['menu_id']);

		 $total_amount=$total_amount+$menu['item_cost']*$allcart['quantity'];
		  
		   if($allcart['addons']!='')
	   {
	   $addon_id= explode(',',$allcart['addons']);
	   $addons=$this->search_model->get_addonsby_id($addon_id);
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	   {
	   $total_amount=$total_amount+$alladons['price'];
	   } } }
	   } }




	  //corrige cobranca de taxa no final do paypal/stripe/adyen

          if($total_amount > $restaurent_info['free_delivery'] )
		   {
	        $final_amount=$total_amount;
            }
            else
          	 {
              $final_amount=$total_amount+$delivery_charge;
              }


//echo '<script type="text/javascript"> alert("'. $final_amount . '")</script>';

//echo '<script type="text/javascript"> alert("'. $total_amount . '")</script>';


$final_amount=str_replace (".", "", $final_amount);

$this->load->library('session');
     $sess_array = array('final_amount' =>$final_amount, 'item_count' =>$item_count, 'status'   => TRUE);
$this->session->set_userdata($sess_array);


	    $this->data['final_amount']=$final_amount;


		$this->data['item_count']=count($cart);


	 $this->load->view('order/stripe_checkout',$this->data);


	 }







	 //*******************PAYPAL*****************************************//

	 function paypal()
	 {

	 //echo '<pre>';
        // $this->load->view('order/paypalfunctions');
           $order_detail=$this->session->userdata('order_detail');

	   $ip_address=$_SERVER['REMOTE_ADDR'];


	   $cart=$this->order_model->get_cart_detail($ip_address);

	   $restaurent_info=$this->restaurant_model->all_restaurant_details(@$cart[0]['restaurant_id']);
  

	   $total_amount=0;

       $delivery_charge=0;


       if(isset($restaurent_info['delivery_charges']) && $restaurent_info['delivery_charges']!=''){$delivery_charge=$restaurent_info['delivery_charges'];}


//if(isset($tax['service_tax'])){$service_tax=$tax['service_tax'];}else{$service_tax=0;}


//if(isset($tax['vat_tax'])){$vat_tax=$tax['vat_tax'];}else{$vat_tax=0;}



		 if(!empty($cart))
		 {
		 foreach($cart as $allcart)
		 {
		 $menu=$this->search_model->get_menu_detail($allcart['menu_id']);

		 $total_amount=$total_amount+$menu['item_cost']*$allcart['quantity'];
		  
		   if($allcart['addons']!='')
	   {
	   $addon_id= explode(',',$allcart['addons']);
	   $addons=$this->search_model->get_addonsby_id($addon_id);
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	   {
	   $total_amount=$total_amount+$alladons['price'];
	   } } }
	   } }


//corrige cobranca de taxa no final do paypal/stripe/adyen

          if($total_amount > $restaurent_info['free_delivery'] )
		   {
	        $final_amount=$total_amount;
            }
            else
          	 {
              $final_amount=$total_amount+$delivery_charge;
              }




//echo '<script type="text/javascript"> alert("'. $final_amount . '")</script>';

//echo '<script type="text/javascript"> alert("'. $total_amount . '")</script>';




	    $this->data['final_amount']=$final_amount;
		$this->data['item_count']=count($cart);


		///pagamento inclui taxa de entrega qdo nao tem

//echo '<script type="text/javascript"> alert("'. $final_amount . '")</script>';




	    $this->load->view('order/paypal',$this->data);


	 }







	  function paypalsuccess()
	 {
	  $ip_address=$_SERVER['REMOTE_ADDR'];
	   $cart=$this->order_model->get_cart_detail($ip_address);
	    $order_detail=$this->session->userdata('order_detail');		
	  if(!empty($cart))
	    {
	 $delivery_charge=0;
	 $delivery_time='';
		$restaurent_info=$this->restaurant_model->all_restaurant_details($cart[0]['restaurant_id']);
		if(isset($restaurent_info['delivery_charges']) && $restaurent_info['delivery_charges']!=''){$delivery_charge=$restaurent_info['delivery_charges'];}
		if(isset($restaurent_info['delivery_time_min']) && $restaurent_info['delivery_time_min']!=''){$delivery_time=$restaurent_info['delivery_time_min'];}
	    $delivery_time_save=$this->order_model->get_delivery_time($ip_address);
		 if(empty($delivery_time_save)){
		if($delivery_time!=''){ $estimate_delivery_time=time()+($delivery_time*60*60);}else{$estimate_delivery_time='';}
		}else{$estimate_delivery_time=$delivery_time_save['date_time'];}
		
	    $order_id= $this->order_model->insert_order($order_detail,$cart[0]['restaurant_id'],$cart[0]['type'],$delivery_charge,$estimate_delivery_time);
		$this->restaurant_model->upadte_order_number($cart[0]['restaurant_id']);
		foreach($cart as $allcart)
		 {
		 $menu=$this->search_model->get_menu_detail($allcart['menu_id']);
		 $addon_cost='';$amount=array();
	


if($allcart['addons']!=''){$addon_id= explode(',',$allcart['addons']);$addons=$this->search_model->get_addonsby_id($addon_id);
	  if(!empty($addons)){foreach($addons as $alladons){array_push($amount,$alladons['price']);} 
	  $addon_cost=implode(',',$amount);} }
		$this->search_model->insert_order_detail($order_id,$allcart['menu_id'],$allcart['addons'],$allcart['quantity'],$menu['item_cost'],$addon_cost);
		 }
	 }

	 $last_order=$this->order_model->get_order($order_id);
	  $this->send_order_mail($order_id);
	 $this->myaccount_model->empty_cart($ip_address);
	 $this->session->set_flashdata('success_msg', $last_order['order_id']);
	 $this->session->unset_userdata('order_detail');

	 redirect('order/success','refresh');
	 }
	 
	 
	 function paypalcancel()
	 {
	  $this->load->view('order/paypalcancel');
	 }
	 
	 


      function send_order_mail($order_id)

	  
	 {
	
	 $order=$this->order_model->get_order($order_id);
	
	  if($order['type']=='user')
	 {
	   $user_id=$order['customer_id'];
	   $user=$this->myaccount_model->myaccount($user_id);
	  // print_r($user); die;
	   $user_address=$this->myaccount_model->get_user_address($user_id);
	   
	 $this->data['first_Name']=ucwords($user['first_name']);
	  $this->data['user_email']=$user['email'];
	  $this->data['user_street']=$user_address['address'];
	   $this->data['user_city']=$user_address['city'];
	   $this->data['user_state']=$user_address['city'];
	   $this->data['user_zip']=$user_address['zip_code'];
	 }
	 else
	 {
 	 $user_id = $order['guest_id'];
	   $guest=$this->order_model->get_guest_detail($user_id);
	   $this->data['first_Name']=ucwords($guest['full_name']);
	   $this->data['user_email']=$guest['email'];
	   $this->data['user_street']=$guest['address_line_1'];
	  $this->data['user_city'] =$guest['city'];
	   $this->data['user_state']=$guest['city'];
	   $this->data['user_zip']=$guest['postcode'];
	 }
	 $this->data['restaurant']=$this->order_model->get_restaurant_name($order['restaurant_id']);
	 $this->data['order']=$order;
	  $this->data['order_detail']=$this->order_model->get_order_detail($order_id);

	  $date=date("l");


	  $this->data['restaurant_open'] = $this->restaurant_model->time_table($order['restaurant_id'],$date);
	  
	  
	// print_r($this->data); die;
	 $config1 = Array(
		'mailtype' => 'html',
		'charset' => 'utf-8',
		);
		$this->load->library('email',$config1);
		//$this->email->from('nsg@hotmail.com');
		$this->email->from('noreply@portugo.pt');
		$this->email->to($this->data['user_email']);
		$this->email->subject('Order Confirmation');
		$this->data['data']=$user;
		$message=$this->load->view('mail/place_order_mail',$this->data,true);
		
	
	     //echo $message; die;	

		$this->email->message($message);
		@$this->email->send();
		$this->email->clear();
		return $this->email->print_debugger();	
	 }
	 
	 
	 
	 
	 

	 
	 
	 function mb()
	 {
	 
	  $ip_address=$_SERVER['REMOTE_ADDR'];
	   $cart=$this->order_model->get_cart_detail($ip_address);
	    $order_detail=$this->session->userdata('order_detail');
	  if(!empty($cart))
	    {
	 $delivery_charge=0;
	 $delivery_time='';
		$restaurent_info=$this->restaurant_model->all_restaurant_details($cart[0]['restaurant_id']);
		if(isset($restaurent_info['delivery_charges']) && $restaurent_info['delivery_charges']!=''){$delivery_charge=$restaurent_info['delivery_charges'];}
		if(isset($restaurent_info['delivery_time_min']) && $restaurent_info['delivery_time_min']!=''){$delivery_time=$restaurent_info['delivery_time_min'];}
	   $delivery_time_save=$this->order_model->get_delivery_time($ip_address);
		 if(empty($delivery_time_save)){
		if($delivery_time!=''){ $estimate_delivery_time=time()+($delivery_time*60*60);}else{$estimate_delivery_time='';}
		}else{$estimate_delivery_time=$delivery_time_save['date_time'];}
		
	    $order_id= $this->order_model->insert_order($order_detail,$cart[0]['restaurant_id'],$cart[0]['type'],$delivery_charge,$estimate_delivery_time);
		$this->restaurant_model->upadte_order_number($cart[0]['restaurant_id']);
		foreach($cart as $allcart)
		 {
		 $menu=$this->search_model->get_menu_detail($allcart['menu_id']);
		 $addon_cost='';$amount=array();
		 
if($allcart['addons']!=''){$addon_id= explode(',',$allcart['addons']);$addons=$this->search_model->get_addonsby_id($addon_id);
	  if(!empty($addons)){foreach($addons as $alladons){array_push($amount,$alladons['price']);} 
	  $addon_cost=implode(',',$amount);} }
		$this->search_model->insert_order_detail($order_id,$allcart['menu_id'],$allcart['addons'],$allcart['quantity'],$menu['item_cost'],$addon_cost);
		 }
	 }
	$last_order=$this->order_model->get_order($order_id);
	 $this->myaccount_model->empty_cart($ip_address);
	 $this->session->set_flashdata('success_msg', $last_order['order_id']);
	 $this->session->unset_userdata('order_detail');
	redirect('order/success','refresh');
	 
	 
	 }
	 
	 
	 
	 function provide_review()
	 {			
	$session_data=$this->session->userdata('user_logged_in');
	$customer_id = $session_data['user_id'];		 
   
	$order=$this->order_model->get_order($_POST['order_id']);	
	$this->order_model->insert_review($_POST,$customer_id,$order['restaurant_id']);	
	$this->update_restaurant_review($order['restaurant_id']);		
	redirect('myaccount/user_order','refresh');
	}
	 
	 
	 function update_restaurant_review($restaurant_id)
	 {		 
	 $rating=0;
	 $review=$this->restaurant_model->get_restaurant_review($restaurant_id);
	 $total_review=count($review);
	 foreach($review as $allreview)
	 {
	  $rating=$rating+$allreview['rating'];	  
	 }
	 $avg_rating=round($rating/$total_review);
	 $this->restaurant_model->update_avg_review($restaurant_id,$avg_rating);	 
	 }
	 
	 
	 function order_print_detail()
	 {
	 $this->data['order']=$this->order_model->get_order($_POST['order_id']);	
	 //print_r($order);
	 $this->data['order_detail']=$this->order_model->get_order_detail($_POST['order_id']);
	 $this->load->view('order/print_order',$this->data);
	 }
	 
	 function add_address()
	 {
	 $session_data=$this->session->userdata('user_logged_in');
	$user_id = $session_data['user_id'];
	$lastid=$this->order_model->insert_address($_POST,$user_id);
	 echo $lastid;
	 }
	 
	 
	 
		
}

?>
