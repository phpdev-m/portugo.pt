<?php 
class restaurant_details extends CI_Controller{
	
	
function __construct()
    {
        // Call the Model constructor
    parent::__construct();
    $this->load->database();
	$this->load->model('search_model');
	$this->load->model('home_model');
	$this->load->model('signup_user_model');
	$this->load->model('myaccount_model');
	$this->load->model('restaurant_model');
	$this->load->model('order_model');
	error_reporting(0);
    }	
	
	
public function index() // chamada da escolha do restaurante para criar tela com  pratos para escolha dos pedidos
	{



	$restaurant_id = $_GET['id'];
	if(@$restaurant_id!=''){
	 $this->data['restaurant_all_details'] = @$this->restaurant_model->all_restaurant_details(@$restaurant_id);
	 }
	 $this->load->view('restaurant_detail',$this->data);
	}
	
	
	 function load_menu()
	 {
	 $this->data['menu']=$this->search_model->get_menu_detail($_POST['menu_id']);
	  $this->data['addons']=$this->search_model->get_addons($_POST['menu_id']);
	  $this->load->view('ajax/load_menu',$this->data);
	 }
	
	
	function get_order_amount()
	 {
	 //print_r($_POST);
	  $total_amount=0;
	  $menu=$this->search_model->get_menu_detail($_POST['menu_id']);
	  $total_amount=$total_amount+$menu['item_cost'];
	  if(isset($_POST['addon_id']) && !empty($_POST['addon_id']))
	  {
	$addons=$this->search_model->get_addonsby_id($_POST['addon_id']);
	  foreach($addons as $alladons)
	  {
	  $total_amount=$total_amount+$alladons['price'];
	  }
	   }
	   echo $total_amount;
	 
	 }
	 
	 
	 
	  function get_checkout_detail()
	 {
	 // echo '<pre>';
	 
	  $ip_address=$_SERVER['REMOTE_ADDR'];
	  
	 //print_r($_POST); die;
	  $this->search_model->delete_other_resitem($_POST['rest_id'],$ip_address);
	  $this->order_model->insert_menu_cart($_POST,$ip_address);
	 // echo $this->db->last_query(); die;
	  $this->data['cart']=$this->order_model->get_cart_detail($ip_address);
	
	   $this->data['restaurent']=$this->restaurant_model->all_restaurant_details($_POST['rest_id']);
	  
	  
	   
	  $this->load->view('ajax/load_checkout_detail',$this->data);
	 }
	 
	  function load_cart_detail()
	 {
	  $ip_address=$_SERVER['REMOTE_ADDR'];
	   
	   $this->data['cart']=$this->order_model->get_cart_detail($ip_address);
	
	   $this->data['restaurent']=$this->restaurant_model->all_restaurant_details($_POST['rest_id']);
	 
	  $this->load->view('ajax/load_checkout_detail',$this->data);
	 }
	 
	  function update_delivery_type()
	 {
	  $ip_address=$_SERVER['REMOTE_ADDR'];
	  $this->order_model->update_delivery_type($_POST,$ip_address);
	   $this->data['cart']=$this->order_model->get_cart_detail($ip_address);
	
	   $this->data['restaurent']=$this->restaurant_model->all_restaurant_details($_POST['rest_id']);
	 
	  $this->load->view('ajax/load_checkout_detail',$this->data);
	 }
	 
	 
	 
	 
	 function del_cart_item()
	 {
	 // echo '<pre>';
	  $ip_address=$_SERVER['REMOTE_ADDR'];
	  
	// print_r($_POST); die;
	  $this->order_model->delete_menu_cart($_POST['cart_id']);
	  $this->data['cart']=$this->order_model->get_cart_detail($ip_address);
	
	   $this->data['restaurent']=$this->restaurant_model->all_restaurant_details($_POST['rest_id']);
	 
	  $this->load->view('ajax/load_checkout_detail',$this->data);
	 }
	 
	 function check_cart_amount()
	 {
	 
	$ip_address=$_SERVER['REMOTE_ADDR'];
	$cart=$this->order_model->get_cart_detail($ip_address);
	$restaurent_info=$this->restaurant_model->all_restaurant_details(@$_POST['rest_id']);
	$total_amount=0;
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
	   } } }}
	  
	  
		   }
		   // $restaurent_info['min_order']; die;
		    if(  $total_amount <$restaurent_info['min_order']){echo 'Minimum $'.number_format($restaurent_info['min_order'],2);}else{echo 'correct';}
		   
		   
	
	
	 
	 }
	 
	 
	 
	 
 function addfavourite()
	{		
	$this->restaurant_model->add_fav_restaurant($_POST);
	}
	
	function delfavourite()
	{
	$this->restaurant_model->remove_fav_restaurant($_POST);
	}	 
	 
	function remove_fav()
	{
	$this->restaurant_model->delete_fav_restaurant($_POST['fav_id']);
	} 
	 
	 function addfavourite_dish()
	{		
	$this->restaurant_model->add_fav_dish($_POST);
	}
	function delfavourite_dish()
	{
	$this->restaurant_model->remove_fav_dish($_POST);
	}
	function remove_fav_dish()
	{
	$this->restaurant_model->delete_fav_dish($_POST['fav_id']);
	}


        function save_delivery_time()
	 {

         //echo '<script type="text/javascript"> alert("'. "controller restaurant_details -  salva na tabela delivery_time" . '")</script>';

 	 $date=$_POST['date'].' '.$_POST['time'];

	// $date_res= strtotime($date);

         // echo '<script type="text/javascript"> alert("'. $date_res . '")</script>';

        /// echo '<script type="text/javascript"> alert("'. $date_res . '")</script>';


         $date_res = $date;

        //echo '<script type="text/javascript"> alert("'. $date_res . '")</script>'; 


	 $ip_address=$_SERVER['REMOTE_ADDR'];
	 if($_POST['date']!='')
	 {


         $this->order_model->insert_delivery_time($_POST,$ip_address,$date_res);

         $delivery_time=$this->order_model->get_delivery_time($ip_address);



	 $today=date('d-m-Y');

         $tomorrow=date('d-m-Y', time()+86400);
  
         $arr = explode(" ", $delivery_time['date_time'], 2);

         $date = $arr[0];

         $time=$arr[1];




	 echo ' <p> Delivery For</p>


           <h5 class="restaurant_top_right_text_size" style="font-size:20px !important;">'; 

                  if($date==$today){ echo 'Today';}
                  if($date==$tomorrow){ echo 'Tomorrow';} '</h5>';
                   echo '<p>'.$time.'</p>';



		 }else
		 {
///para entrega   em minutos
		 	 $this->order_model->delete_delivery_time($ip_address);
			  $rest_info=$this->restaurant_model->all_restaurant_details($_POST['rest_id']);
			  echo'<p>Estimated Delivery </p>';
		 if($rest_info['delivery_time_min']!='')
		 {
         echo '<h5 class="restaurant_top_right_text_size">'.$rest_info['delivery_time_min'].'</h5>
         <p>Minutes</p>';} else{
		  echo '<p>N/A</p>';
         }

		 }

	 }
}



?>
