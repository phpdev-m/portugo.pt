<?php
class payment extends CI_Controller
{
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('restaurant_logged_in')){
			redirect('restaurant/login','refresh');
		}
		
		$this->load->helpers('url');
		$this->load->model('restaurant/payment_model');
		$this->load->model('restaurant/order_model');
		$this->load->model('restaurant/user_model');
		$this->load->model('restaurant/login_model');
		$this->load->model('restaurant/cuisine_model');
		
		$this->data['title'] = 'PortuGo Takeaway';			
	}
	
	function manage_payment()
	{
	$session_id=$this->session->userdata('restaurant_logged_in');
    $rest_id=$session_id['id'];
	if(!$_POST)
	{
	$this->data['payment']=$this->payment_model->get_restaurant_payment($rest_id);
	}else{
	$this->data['payment']=$this->payment_model->get_all_payment($_POST,$rest_id);	
	}
	$this->load->view('restaurant/payment/manage_payment',$this->data);
	}

	
}