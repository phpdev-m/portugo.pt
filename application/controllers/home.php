<?php 


class Home extends MY_Controller{
	
function __construct()
    {
        // Call the Model constructor
    parent::__construct();
    $this->load->database();
	
	$this->load->model('home_model');
	$this->load->model('myaccount_model');
	$this->load->model('restaurant_model');
	
	
    }	

public function index()
	{

  $this->counter_init = counter_init();  

  $this->count_visitor = count_visitor();

//    $counter =  $this->count_visitor;

//echo '<script type="text/javascript"> alert("'. $counter . '")</script>';

    $this->load->view('home.php');

 }
	
	
public function search()
	{
	 $this->load->view('search');
	}
	
	
public function about_us()
	{
	 $this->load->view('about_us');
	}
	
public function terms_conditions()
	{
	 $this->load->view('terms_conditions');
	}
	
public function privacy_policy()
	{
	 $this->load->view('privacy_policy');
	}	
	
	
public function restaurant_detail()
	{
	 $this->load->view('restaurant_detail');
	}
		
		

	
public function all_restaurant()
	{
	 $this->load->view('restaurant');
	}
	
	
	function create_invoice()
	{
	if(date('Y-m-d')==date('Y-m-t')){
	$restaurant=$this->home_model->get_all_restaurant(); 
	$month=1;
	$date = date("Y-m-d",strtotime(date("Y-m-t") . " -$month month"));
	
	$start=strtotime($date);
	$end=strtotime(date('Y-m-t'));
	
	foreach($restaurant as $allrest)
	{
	$rest_id=$allrest['id'];
	 $commission=$this->home_model->get_restaurantinfo($rest_id);
	 //print_r($commission);die;
	 $order_ids=array();
	 if(isset($commission) && $commission['commission']!=''){$comission_percent=$commission['commission'];}else{$comission_percent=10;}
	 $orders_new=$this->home_model->get_all_orders($rest_id,$start,$end);
	 if(!empty($orders_new))
	 {
	 foreach($orders_new as $new_orders)
	 {
	 array_push($order_ids,$new_orders['id']);
	 }
	 $new_order_ids=implode(',',$order_ids);
	$order=$this->home_model->get_all_orderbyid($order_ids);
	//echo '<pre>';
	//print_r($order); die;
	$invoice_total=0;
	if(!empty($order)){
	foreach($order as $w){
	
	
										$this->restaurant_model->change_invoice_created_status($w['id']);
										 $total=0;
										 $order_detail=$this->home_model->get_order_detail($w['id']);
										  foreach($order_detail as $allorder){
										// print_r($allorder);
										 
										  $item_detail=$this->home_model->get_item($allorder['menu_id']);
										   $total=$total+$allorder['quantity']*$allorder['menu_price'];
										   
										    if($allorder['adddons']!='')
	  {
	
	   $addon_id= explode(',',$allorder['adddons']);
	  $addons=$this->invoice_model->get_addonsby_id($addon_id);
	
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total=$total+$alladons['price'];
	  }}}
			
										  }
										 $total=$total+$w['delivery_charge'];
										 $invoice_total=$invoice_total+$total;
										 }
										 
				//***************** insert  invoice ***************************		
				$this->home_model->insert_invoice($rest_id,$new_order_ids,$invoice_total,$comission_percent);				 
										 }
										 }
										 
										 }
										 
	
	}else{echo '';}
	}
	
	
	
	

}



?>
