<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
  	parent::__construct();	
		 
		if(!$this->session->userdata('restaurant_logged_in')){
			redirect('restaurant/login','refresh');
		}
		
		$this->load->model('restaurant/dashboard_model');
		$this->load->model('restaurant/cuisine_model');
		$this->load->model('restaurant/order_model');
		
		$this->data['title'] = 'PortuGo Takeaway';
							
	}
	
	
	function index(){
		
		$session_data=$this->session->userdata('restaurant_logged_in');
		//print_r($session_data); die;
		$rest_id=$session_data['id'];
				
	    $date = date('Y-m-d');
		  
		$this->data['turnover'] = $this->dashboard_model->total_rest_turnover($rest_id);
		   //print_r($this->data['turnover']);die;
		$week=date('Y-m-d', strtotime("-7 days"));
	    $this->data['oneweek_customer'] = $this->dashboard_model->get_oneweek_customer($date,$week);
		 
        $month=date('Y-m-d', strtotime("-30 days"));
	    $this->data['onemonth_customer'] = $this->dashboard_model->get_onemonth_customer($date,$month);     
   		
	    $year=date('Y-m-d', strtotime("-365 days"));
	    $this->data['oneyear_customer'] = $this->dashboard_model->get_oneyear_customer($date,$year);     
   		
	   
		$this->data['oneday_order'] = $this->dashboard_model->get_oneday_order($date,$rest_id);
		$this->data['oneweek_order'] = $this->dashboard_model->get_oneweek_order($date,$week,$rest_id);
		$this->data['onemonth_order'] = $this->dashboard_model->get_onemonth_order($date,$month,$rest_id);
		$this->data['oneyear_order'] = $this->dashboard_model->get_oneyear_order($date,$year,$rest_id);
		
		$this->data['oneday_processing_order'] = $this->dashboard_model->get_oneday_processing($date,$rest_id);
		$this->data['oneweek_processing_order'] = $this->dashboard_model->get_oneweek_processing($date,$week,$rest_id);
		$this->data['onemonth_processing_order'] = $this->dashboard_model->get_onemonth_processing($date,$month,$rest_id);
		$this->data['oneyear_processing_order'] = $this->dashboard_model->get_oneyear_processing($date,$year,$rest_id);
		
		$this->data['oneday_delivered_order'] = $this->dashboard_model->get_oneday_delivered($date,$rest_id);
		$this->data['oneweek_delivered_order'] = $this->dashboard_model->get_oneweek_delivered($date,$week,$rest_id);
	    $this->data['onemonth_delivered_order'] = $this->dashboard_model->get_onemonth_delivered($date,$month,$rest_id);
		$this->data['oneyear_delivered_order'] = $this->dashboard_model->get_oneyear_delivered($date,$year,$rest_id);
		
		$this->data['oneday_cancel_order'] = $this->dashboard_model->get_oneday_cancel($date,$rest_id);
		$this->data['oneweek_cancel_order'] = $this->dashboard_model->get_oneweek_cancel($date,$week,$rest_id);
		$this->data['onemonth_cancel_order'] = $this->dashboard_model->get_onemonth_cancel($date,$month,$rest_id);
		$this->data['oneyear_cancel_order'] = $this->dashboard_model->get_oneyear_cancel($date,$year,$rest_id);
		
		$this->data['oneday_sales'] = $this->dashboard_model->get_oneday_sales($date,$rest_id);
		$this->data['oneweek_sales'] = $this->dashboard_model->get_oneweek_sales($date,$week,$rest_id);
		$this->data['onemonth_sales'] = $this->dashboard_model->get_onemonth_sales($date,$month,$rest_id);
		$this->data['oneyear_sales'] = $this->dashboard_model->get_oneyear_sales($date,$year,$rest_id);
		$this->data['invoice_amount']=$this->dashboard_model->get_invoice_amount($rest_id);
		//print_r($this->data['oneweek_sales']);die;
		$this->load->view('restaurant/dashboard_view',$this->data);		
	}
	
	
	function get_pending_order()
	{
	$session_data=$this->session->userdata('restaurant_logged_in');
$rest_id=$session_data['id'];
$pending_order = $this->dashboard_model->pending_order($rest_id);
echo $pending_order;
	
	}
	
		
}