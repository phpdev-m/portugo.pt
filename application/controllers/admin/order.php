<?php
class order extends CI_Controller
{
	function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
			redirect('admin/login','refresh');
		}

		$this->load->helpers('url');
		$this->load->model('admin/order_model');
		$this->load->model('admin/user_model');
		$this->load->model('admin/login_model');
		$this->data['title'] = 'PortuGo Takeaway';
	}

	function index()
	{
	$this->data['order']=$this->order_model->get_all_order();
	$this->load->view('admin/order/manage_order',$this->data);
	}
	
	function order_view()
	{
	$id=$this->uri->segment(5);
	$this->data['order']=$this->order_model->get_order($id);
	
	$this->data['order_detail']=$this->order_model->get_order_detail($id);
	$this->load->view('admin/order/order_view',$this->data);
	}
	
	function order_edit()
	{
	$id=$this->uri->segment(5);
	$this->data['order']=$this->order_model->get_order($id);
	if(!$_POST){
	$this->load->view('admin/order/edit_order',$this->data);
	}else{
		$this->order_model->update_order($_POST,$id);
		if($_POST['status']==0)
		{
		$this->order_cancellation_email($_POST,$id);
		}
		redirect('admin/order');
	}

	}


	function order_cancellation_email($data,$order_id)
	{
	$order=$this->order_model->get_order($order_id);
	$rest=$this->order_model->get_restaurant($order['restaurant_id']);
	if($order['customer_id']!=0)
									{
									$customer = $this->order_model->get_customer($order['customer_id']);
									$email=$customer['email'];
									$name=ucwords($customer['first_name']).'&nbsp'.ucwords($customer['last_name']);
									}
									else {
											$guest = $this->order_model->get_guest_detail($order['guest_id']);
											$email=$guest['email'];
											$name=ucwords($guest['full_name']);
											}
	
			$config1 = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			);
			$this->load->library('email',$config1);
			//$this->email->from('info@nsglobal@system.com');
			$this->email->from('noreply@portugo.pt');
			$this->email->to($email);
			$this->email->subject('Order Cancelled');
			$this->data['data']=$data;
			$this->data['order_number']=$order['order_id'];
			$this->data['rest_name']=$rest['restaurant_name'];
			$this->data['name']=$name;
			
			$message=$this->load->view('admin/order/order_cancellation_email',$this->data,true);;
			//echo $message; die;	
			$this->email->message($message);
			@$this->email->send();
			$this->email->clear();
	}
	
	function delete_order()
	  {
	  $id=$this->uri->segment(5);
	  $this->order_model->delete_order($id);
	  redirect('admin/order');
	  }
	  
	  
	   function order_print_detail()
	 {
	$this->data['order']=$this->order_model->get_order($_POST['order_id']);	
	 //print_r($order);
	 $this->data['order_detail']=$this->order_model->get_order_detail($_POST['order_id']);
	 $this->load->view('admin/order/print_order',$this->data);
	 }
	  
	  
	  
}
