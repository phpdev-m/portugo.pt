<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
  	parent::__construct();	
		 
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login','refresh');
		}
		
		$this->load->model('admin/dashboard_model');
		
		$this->load->model('admin/member_model');
		$this->data['title'] = 'Go Takeaway';
							
	}
	
	
	function index(){
		
	    $date = date('Y-m-d');
		  
		$week=date('Y-m-d', strtotime("-7 days"));
	    $this->data['oneweek_customer'] = $this->dashboard_model->get_oneweek_customer($date,$week);
		 
        $month=date('Y-m-d', strtotime("-30 days"));
	    $this->data['onemonth_customer'] = $this->dashboard_model->get_onemonth_customer($date,$month);     
   		
	    $year=date('Y-m-d', strtotime("-365 days"));
	    $this->data['oneyear_customer'] = $this->dashboard_model->get_oneyear_customer($date,$year);     
   		
	    $this->data['oneweek_restaurant'] = $this->dashboard_model->get_oneweek_restaurant($date,$week);
		$this->data['onemonth_restaurant'] = $this->dashboard_model->get_onemonth_restaurant($date,$month);
		$this->data['oneyear_restaurant'] = $this->dashboard_model->get_oneyear_restaurant($date,$year);
		
		$this->data['oneday_order'] = $this->dashboard_model->get_oneday_order($date);
		$this->data['oneweek_order'] = $this->dashboard_model->get_oneweek_order($date,$week);
		$this->data['onemonth_order'] = $this->dashboard_model->get_onemonth_order($date,$month);
		$this->data['oneyear_order'] = $this->dashboard_model->get_oneyear_order($date,$year);
		
		$this->data['oneday_processing_order'] = $this->dashboard_model->get_oneday_processing($date);
		$this->data['oneweek_processing_order'] = $this->dashboard_model->get_oneweek_processing($date,$week);
		$this->data['onemonth_processing_order'] = $this->dashboard_model->get_oneweek_processing($date,$month);
		$this->data['oneyear_processing_order'] = $this->dashboard_model->get_oneyear_processing($date,$year);
		
		$this->data['oneday_delivered_order'] = $this->dashboard_model->get_oneday_delivered($date);
		$this->data['oneweek_delivered_order'] = $this->dashboard_model->get_oneweek_delivered($date,$week);
	    $this->data['onemonth_delivered_order'] = $this->dashboard_model->get_oneweek_delivered($date,$month);
		$this->data['oneyear_delivered_order'] = $this->dashboard_model->get_oneyear_delivered($date,$year);
		
		$this->data['oneday_cancel_order'] = $this->dashboard_model->get_oneday_cancel($date);
		$this->data['oneweek_cancel_order'] = $this->dashboard_model->get_oneweek_cancel($date,$week);
		$this->data['onemonth_cancel_order'] = $this->dashboard_model->get_oneweek_cancel($date,$month);
		$this->data['oneyear_cancel_order'] = $this->dashboard_model->get_oneyear_cancel($date,$year);
		
		$this->data['oneday_sales'] = $this->dashboard_model->get_oneday_sales($date);
		$this->data['oneweek_sales'] = $this->dashboard_model->get_oneweek_sales($date,$week);
		//print_r($this->data['oneweek_sales']);die;
		$this->load->view('admin/dashboard_view',$this->data);		
	}
		
}
