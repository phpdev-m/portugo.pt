<?php
class payment extends CI_Controller
{
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login','refresh');
		}
		
		$this->load->helpers('url');
		$this->load->model('admin/payment_model');
		$this->load->model('admin/order_model');
		$this->load->model('admin/user_model');
		$this->load->model('admin/login_model');
		
		$this->data['title'] = 'PortuGo Takeaway';			
	}
	
	function manage_payment()
	{
	$this->data['restaurant']=$this->payment_model->get_all_restaurant();
	$rest_id = $this->uri->segment(4);
	if(!$_POST){$data=array();}else{$data=$_POST;}
	
	if(!empty($rest_id)){
	$this->data['payment']=$this->payment_model->get_restaurant_payment($rest_id,$data);
	}else{
	$this->data['payment']=$this->payment_model->get_all_payment($data);		
	}
	$this->load->view('admin/payment/manage_payment',$this->data);
	}

	
	function payment_view()
	{
	$order_id=$this->uri->segment(5);
	$this->data['order']=$this->payment_model->get_payment($order_id);	
	$this->load->view('admin/payment/payment_view',$this->data);
	}
	
	
	function change_payment_status()
	{
		//print_r($_POST);die;
			
	$this->payment_model->update_payment_status($_POST['status_data'],$_POST['payment_id']);		
			
	}
	
}