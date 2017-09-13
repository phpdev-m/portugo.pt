<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
  	 parent::__construct();
		 
		 $this->load->helper('url');
		 $this->load->model('restaurant/login_model','',TRUE);	
	     //$this->load->model('restaurant/dashboard_model');
		 
		 $this->data['title'] = 'Go Takeaway';	 
  }
	
	public function index()
	{ 		
		if(!$this->session->userdata('restaurant_logged_in')){
			$this->load->helper(array('form'));		
			$this->load->view('restaurant/login_view',$this->data);		
		} else {
			redirect('restaurant/dashboard','refresh');
		}
	}
	
	public function verify(){ //echo 'ram'; //die;
	//print_r($_POST); die;
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters( '', '<br>' );
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
			
			$this->form_validation->set_message('username', 'The Field <strong>Username</strong> is required');
			$this->form_validation->set_message('password', 'The Field <strong>Password</strong> is required');
		 
			 if($this->form_validation->run('login_form') ){
					redirect('restaurant/dashboard', 'refresh');
			 }else{
				 $this->data['error']=	validation_errors();
				 $this->load->view('restaurant/login_view',$this->data);
			 }
		 
		
	}
	
	function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $username = $this->input->post('username');
	    $remember = $this->input->post('remember');
	 
	   //query the database
	   $result = $this->login_model->restaurant_login($username, $password);
	 
		   if($result)
		   {
			   $sess_array = array();
				foreach($result as $row)
				{
				$sess_array = array(
				'id' => $row->id,
				'contact_name' => $row->contact_name
				);
				$this->session->set_userdata('restaurant_logged_in', $sess_array);
				
				if($remember==1){ 
					$this->load->helper('cookie');
					$cookie = array('name'=> 'restaurant_username_cookie','value'  => $username,'expire' => '1209600');
					set_cookie($cookie);
					$cookie2 = array('name'=> 'restaurant_cookie','value'  => $password,'expire' => '1209600');
					set_cookie($cookie2);
				}
				}
			 return TRUE;
		   }
		   else
		   {
			 $this->form_validation->set_message('check_database', 'Invalid Username or Password');
			 return false;
		   }
	 }
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('restaurant/login','refresh');
	}
		
}

