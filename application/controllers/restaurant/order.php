<?php
class order extends CI_Controller
{
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('restaurant_logged_in')){
			redirect('restaurant/login','refresh');
		}
		
		$this->load->helpers('url');
		$this->load->model('restaurant/order_model');
		$this->load->model('restaurant/user_model');
		$this->load->model('restaurant/login_model');
		$this->load->model('restaurant/cuisine_model');
		
		$this->data['title'] = 'PortuGo Takeaway';			
	}
	
	function manage_order()
	{
	$session_id=$this->session->userdata('restaurant_logged_in');
    $rest_id=$session_id['id'];
    if($_POST){
	$this->data['order'] = $this->order_model->get_ajax($_POST,$rest_id);
	}else{	
	$this->data['order']=$this->order_model->get_all_order($rest_id);
	}
	$this->load->view('restaurant/order/manage_order',$this->data);
	}
	
	function order_view()
	{
	$id=$this->uri->segment(5);
		
	$this->data['order']=$this->order_model->get_order($id);
	$this->data['order_detail']=$this->order_model->get_order_detail($id);
	$this->load->view('restaurant/order/order_view',$this->data);
	}
	
	function order_edit()
	{
	$id=$this->uri->segment(5);
	$this->data['order']=$this->order_model->get_order($id);
	if(!$_POST){
	$this->load->view('restaurant/order/edit_order',$this->data);
	}else{
		$this->order_model->update_order($_POST,$id);
		if($_POST['status']==0)
		{
		$this->order_cancellation_email($_POST,$id);
		}
		redirect('restaurant/order/manage_order');
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
			$this->email->from('info@nsglobal@system.com');
			$this->email->to($email);
			$this->email->subject('Order Cancelled');
			$this->data['data']=$data;
			$this->data['order_number']=$order['order_id'];
			$this->data['rest_name']=$rest['restaurant_name'];
			$this->data['name']=$name;
			
			$message=$this->load->view('restaurant/order/order_cancellation_email',$this->data,true);;
			//echo $message; die;	
			$this->email->message($message);
			@$this->email->send();
			$this->email->clear();
	}
	
	
	function delete_order()
	  {
	  $id=$this->uri->segment(5);
	  $this->order_model->delete_order($id);
	  redirect('restaurant/order/manage_order');
	  }
	  
	  
	 
	
	function pending_order_view()
	{
	$id=$this->uri->segment(5);
	//$this->data['order']=$this->order_model->get_order($id);
	
	$this->data['order']=$this->order_model->get_order($id);
	$this->data['order_detail']=$this->order_model->get_order_detail($id);
	$this->load->view('restaurant/order/pending_order_view',$this->data);
	}
	
	function pending_order_edit()
	{
	$id=$this->uri->segment(5);
	$this->data['order']=$this->order_model->get_order($id);
	if(!$_POST){
	$this->load->view('restaurant/order/edit_order',$this->data);
	}else{
		$this->order_model->update_order($_POST,$id);
		redirect('restaurant/order/pending_order');
	}
	}
	
	function pending_delete_order()
	  {
	  $id=$this->uri->segment(5);
	  $this->order_model->delete_order($id);
	  redirect('restaurant/order/pending_order');
	  }
	
	/***************guest order*****************/
	
	function guest_order()
	{
	$session_id=$this->session->userdata('restaurant_logged_in');
    $rest_id=$session_id['id'];
	    
	$this->data['order']=$this->order_model->get_all_guest_order($rest_id);	
	$this->load->view('restaurant/order/guest_order',$this->data);
	}
	
	function guest_order_view()
	{
	$id=$this->uri->segment(5);
	//$this->data['order']=$this->order_model->get_order($id);
	
	$this->data['order']=$this->order_model->get_order($id);
	$this->data['order_detail']=$this->order_model->get_order_detail($id);
	$this->load->view('restaurant/order/order_guest_view',$this->data);
	}
	
	function guest_order_edit()
	{
	$id=$this->uri->segment(5);
	$this->data['order']=$this->order_model->get_order($id);
	if(!$_POST){
	$this->load->view('restaurant/order/edit_order',$this->data);
	}else{
		$this->order_model->update_order($_POST,$id);
		redirect('restaurant/order/guest_order');
	}
	}
	
	function guest_delete_order()
	  {
	  $id=$this->uri->segment(5);
	  $this->order_model->delete_order($id);
	  redirect('restaurant/order/guest_order');
	  }
	  
	  
	  
	  function all()
	{
	$session_id=$this->session->userdata('restaurant_logged_in');
        $rest_id=$session_id['id'];
        if($_POST)
        {
	$this->data['order'] = $this->order_model->get_ajax_all($_POST,$rest_id);   //seleciona por data
	}
        else
        {	
	$this->data['order']=$this->order_model->get_order_all($rest_id);
	}
	$this->load->view('restaurant/order/all_order',$this->data);
	}
	
	
	function accepted()
	{
	$session_id=$this->session->userdata('restaurant_logged_in');
    $rest_id=$session_id['id'];
    if($_POST){
	$this->data['order'] = $this->order_model->get_ajax_accepted($_POST,$rest_id);
	}else{	
	$this->data['order']=$this->order_model->get_order_accepted($rest_id);
	}
	$this->load->view('restaurant/order/order_accepted',$this->data);
	}
	  
	   /**************pending order************/
	  
	  function pending()
	{
	$session_id=$this->session->userdata('restaurant_logged_in');
    $rest_id=$session_id['id'];
    if($_POST){
	$this->data['order'] = $this->order_model->get_ajax_pending($_POST,$rest_id);
	}else{	
	$this->data['order']=$this->order_model->get_order_pending($rest_id);
	}
	$this->load->view('restaurant/order/order_pending',$this->data);
	}
	  
	  
	   function order_print_detail()
	 {
	 $this->data['order']=$this->order_model->get_order($_POST['order_id']);	
	 //print_r($order);
	 $this->data['order_detail']=$this->order_model->get_order_detail($_POST['order_id']);
	 $this->load->view('restaurant/order/print_order',$this->data);
	 }
	  
	  
}
