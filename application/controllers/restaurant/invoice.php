<?php
class invoice extends CI_Controller
{ 
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('restaurant_logged_in')){

			redirect('restaurant/login','refresh');

		}

		
		$this->load->helpers('url');
		$this->load->model('restaurant/invoice_model');
		$this->load->model('restaurant/restaurant_model');
		$this->load->model('restaurant/cuisine_model');		

		$this->data['title'] = 'PortuGo Takeaway';			
	}




	function create_invoice()
	{
	 $session_id=$this->session->userdata('restaurant_logged_in');
	 $rest_id=$session_id['id'];

      	$this->data['order']=$this->invoice_model->get_all_orderforinvoice($rest_id);

	$this->load->view('restaurant/invoice/create_invoice',$this->data);
	}


function insert()
{
$session_id=$this->session->userdata('restaurant_logged_in'); 
$rest_id=$session_id['id'];
$commission=$this->restaurant_model->get_restaurantinfo($rest_id);
	 //print_r($commission);die;
if(isset($commission) && $commission['commission']!=''){$comission_percent=$commission['commission'];}else{$comission_percent=10;}
$order_ids=explode(',',$_POST['order_id']);
$order=$this->invoice_model->get_all_orderbyid($order_ids);
	//echo '<pre>';
	//print_r($order); die;
$invoice_total=0;
if(!empty($order)){
foreach($order as $w){
$this->restaurant_model->change_invoice_created_status($w['id']);
$total=0;
$order_detail=$this->invoice_model->get_order_detail($w['id']);
foreach($order_detail as $allorder){
// print_r($allorder);

$item_detail=$this->invoice_model->get_item($allorder['menu_id']);
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
$this->invoice_model->insert_invoice($rest_id,$_POST['order_id'],$invoice_total,$comission_percent);
}
redirect('restaurant/invoice/track_invoice');

}

function track_invoice()
	{
	 $session_id=$this->session->userdata('restaurant_logged_in'); 
						
						$rest_id=$session_id['id'];

	$this->data['invoice']=$this->invoice_model->get_all_invoice($rest_id);
	$this->load->view('restaurant/invoice/track_invoice',$this->data);
	}
	
	
	function cash_in()
	{
	 $session_id=$this->session->userdata('restaurant_logged_in'); 
						
						$rest_id=$session_id['id'];

	$this->data['invoice']=$this->invoice_model->get_all_invoice($rest_id);
	$this->load->view('restaurant/invoice/cash_in',$this->data);
	}
	  
	 
	  
	  
	  
	  
	  
}
