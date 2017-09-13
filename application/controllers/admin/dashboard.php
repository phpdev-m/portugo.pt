<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	function __construct(){
  	parent::__construct();	
		 
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login','refresh');
		}
		
		$this->load->model('admin/dashboard_model');
		
		$this->load->model('admin/member_model');
		$this->load->model('admin/order_model');
		$this->data['title'] = 'PortuGo Takeaway';
							
	}
	
	
	function index(){

     $this->count_dashboard = count_dashboard();
     $counter =  $this->count_dashboard;
     $_POST['counter'] = $counter;

		
	    $date = date('Y-m-d');
		  
		$this->data['turnover'] = $this->dashboard_model->total_turnover();
		   //print_r($this->data['turnover']);die;
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
		$this->data['oneyear_order'] = $this->dashboard_model->get_onemonth_order($date,$year);
		
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
		$this->data['onemonth_sales'] = $this->dashboard_model->get_oneweek_sales($date,$month);
		$this->data['oneyear_sales'] = $this->dashboard_model->get_oneyear_sales($date,$year);
		
		$this->data['invoice']=$this->dashboard_model->get_all_invoice();
		$this->data['pending_restaurant']=$this->dashboard_model->get_pending_restaurant();
		$this->data['invoice_amount']=$this->dashboard_model->get_invoice_amount();


		//print_r($this->data['oneweek_sales']);die;
		$this->load->view('admin/dashboard_view',$this->data);
	}

}
