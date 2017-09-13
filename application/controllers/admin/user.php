<?php
class user extends CI_Controller
{
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login','refresh');
		}
		
		$this->load->helpers('url');
		$this->load->model('admin/user_model');
		$this->load->model('admin/login_model');
		$this->load->model('admin/order_model');
		
		$this->data['title'] = 'PortuGo Takeaway';			
	}
	
	function index()
	{
	$this->data['user']=$this->user_model->get_all_user();
	$this->load->view('admin/user/manage_user',$this->data);
	}
	
	function add_user()
	{
	$this->load->library('form_validation');
	if(!$_POST){
	$this->load->view('admin/user/add_user',$this->data);
	}else { 
			
					//print_r($_POST); die;	
						$this->form_validation->set_rules('first_name', '<strong>First Name</strong>', 'required');
						$this->form_validation->set_rules('last_name', '<strong>Last Name</strong>', 'required');
						
						$this->form_validation->set_rules('email', '<strong>Email</strong>', 'required|valid_email');
						$this->form_validation->set_rules('phone', '<strong>Phone Number</strong>', 'required|numeric|min_length[10]|max_length[10]');
						$this->form_validation->set_rules('password', '<strong> Password</strong>', 'trim|min_length[6]|matches[cpassword]|required|xss_clean');
   	                    $this->form_validation->set_rules('cpassword', '<strong>Confirm Password</strong>', 'trim|required|xss_clean');
						$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
						if ($this->form_validation->run() == FALSE)
						{
						$this->data['error']=validation_errors();
						$this->load->view('admin/user/add_user',$this->data);	
						}
						else
						{  
						$this->user_model->insert_user($_POST);
						redirect("admin/user","refresh");
						}
						}
						}

    function user_view()
	{
	$id=$this->uri->segment(5);
	$this->data['query']=$this->user_model->get_user($id);
	$this->load->view('admin/user/view_user',$this->data);
	}						
  
  
    function user_edit()
	{
						$id=$this->uri->segment(5);
						$this->data['query']=$this->user_model->get_user($id);
						$this->load->library('form_validation');
						
						if(!$_POST){
						$this->load->view('admin/user/edit_user',$this->data);				
						} else { 
						$this->form_validation->set_rules('first_name', '<strong>First Name</strong>', 'required');
						$this->form_validation->set_rules('last_name', '<strong>Last Name</strong>', 'required');
						//$this->form_validation->set_rules('password', '<strong>password</strong>', 'required|min_length[6]');
						$this->form_validation->set_rules('email', '<strong>Email</strong>', 'required|valid_email');
						$this->form_validation->set_rules('phone', '<strong>Phone Number</strong>', 'required|numeric|min_length[6]|max_length[8]');
						
						$this->form_validation->set_rules('mobile', '<strong>Mobile Number</strong>', 'required|numeric|min_length[10]|max_length[10]');
						
						$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
						
						if ($this->form_validation->run() == FALSE)
						{
						$this->data['error']=validation_errors();
						$this->load->view('admin/user/edit_user',$this->data);	
						}
						else
						{
						$this->user_model->update_user($_POST,$id);
						redirect("admin/user","refresh");
						}
						}
						}
  
  
    function delete_user()
	  {
	  $id=$this->uri->segment(5);
	  $this->user_model->delete_user($id);
	  redirect('admin/user');
	  }
	  
	 /********************Address User*********************/ 
	  
	  function address()
	{
		$c_id = $this->uri->segment(5);
	$this->load->view('admin/user/manage_address',$this->data);
	}
	 
    function add_address()
	{
		$id = $this->uri->segment(5);
	$this->load->library('form_validation');
	$this->data['customer'] = $this->user_model->get_all_user();
	
	if(!$_POST){
	$this->data['customer'] = $this->user_model->get_all_user();
	$this->load->view('admin/user/add_address',$this->data);
	}else { 
			
					
					    
						$this->form_validation->set_rules('apartment', '<strong>Address Line 1</strong>', 'required');
						//$this->form_validation->set_rules('address', '<strong>Address Line 2</strong>', 'required');
						//$this->form_validation->set_rules('state', '<strong>Country</strong>', 'required');
						$this->form_validation->set_rules('city', '<strong>City</strong>', 'required');
						$this->form_validation->set_rules('zip_code', '<strong>Zipcode</strong>', 'required|numeric|min_length[6]');
						$this->form_validation->set_rules('landmark', '<strong>Phone Number</strong>', 'required|numeric|min_length[6]|max_length[8]');
						//$this->form_validation->set_rules('landline', '<strong>Mobile No</strong>', 'required|numeric|min_length[10]|max_length[10]');
						$this->form_validation->set_rules('address_lavel', '<strong>Address level</strong>', 'required');
						
						
						$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
						if ($this->form_validation->run() == FALSE)
						{
						$this->data['error']=validation_errors();
						$this->load->view('admin/user/add_address',$this->data);	
						}
						else
						{ 
                         //print_r($_POST);die;
						$this->user_model->insert_address($_POST);
						redirect('admin/user/address/id/'.$id,"refresh");
						}
						}
						}
				
						
					function edit_address()
	{
						$c_id = $this->uri->segment(5);
	                    $id = $this->uri->segment(7);
	                    $this->load->library('form_validation');
	                    $this->data['customer'] = $this->user_model->get_all_user();
						$this->data['address'] = $this->user_model->get_addres($id);
						if(!$_POST){
						$this->data['customer'] = $this->user_model->get_all_user();
	                    $this->data['address'] = $this->user_model->get_addres($id);
	                    $this->load->view('admin/user/edit_address',$this->data);				
						} else { 						
						$this->form_validation->set_rules('apartment', '<strong>Address Line 1</strong>', 'required');
						//$this->form_validation->set_rules('address', '<strong>Address Line 2</strong>', 'required');
						//$this->form_validation->set_rules('state', '<strong>Country</strong>', 'required');
						$this->form_validation->set_rules('city', '<strong>City</strong>', 'required');
						$this->form_validation->set_rules('zip_code', '<strong>Zipcode</strong>', 'required|numeric|min_length[6]');
						$this->form_validation->set_rules('landmark', '<strong>Phone Number</strong>', 'required|numeric|min_length[6]|min_length[8]');
						//$this->form_validation->set_rules('landline', '<strong>Mobile Number</strong>', 'required|numeric|min_length[10]|max_length[10]');
						$this->form_validation->set_rules('address_lavel', '<strong>Address level</strong>', 'required');
						
						
						$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
						
						if ($this->form_validation->run() == FALSE)
						{
						$this->data['error']=validation_errors();
						$this->load->view('admin/user/edit_address',$this->data);		
						}
						else
						{
						
						$this->user_model->update_address($_POST,$id);
						redirect('admin/user/address/id/'.$c_id,"refresh");
						}
						}
						}	
						
						
						

    function delete_customer()
	  {
	  $c_id=$this->uri->segment(5);
	  $id=$this->uri->segment(7);
	  $this->user_model->delete_customer($id);
	  redirect('admin/user/address/id/'.$c_id,"refresh");
	  }
	 
	 /*********************Order********************/
	  
	function order()
	{
	$c_id = $this->uri->segment(5);
	$this->load->view('admin/user/manage_order',$this->data);
	}
	
	function view_order()
	{
    $u_id=$this->uri->segment(5);
	$id=$this->uri->segment(7);
	$this->data['order_detail']=$this->order_model->get_order_detail($id);
	$this->data['order']=$this->user_model->get_orders($id);
	
	$this->load->view('admin/user/view_order',$this->data);
	}
	
	
	
	function delete_order()
	  {
	  $u_id=$this->uri->segment(5);
	  $id=$this->uri->segment(7);
	  $this->user_model->delete_order($id);
	  redirect('admin/user/order/id/'.$u_id,"refresh");
	  }
}