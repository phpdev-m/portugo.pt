<?php 
class Signup extends CI_Controller{
	
	
function __construct()
    {
        // Call the Model constructor
     parent::__construct();
     $this->load->database();
	$this->load->model('signup_user_model');


$language_data=$this->session->userdata('language');

if($language_data==''){
$language_data=array('language' =>'purtgal');
}

if(!empty($language_data)){
$this->lang->load($language_data['language'], $language_data['language']);
}


	 }
	 
	 
	


	
	function add_user()
	{
		
	if(!$_POST){
	$this->load->view('home');
	}
	else
	{ 					
	$last_insert_id=$this->signup_user_model->insert_user($_POST);
	$this->send_email($last_insert_id);
	$this->session->set_flashdata('register_success', 'Congratulation!<br>Registration successful.');
	redirect("home","refresh");
	}
	}
	
	
	
	
	function send_email($user_id){
	
		$user = $this->signup_user_model->get_user($user_id);
		
		$config1 = Array(
		'mailtype' => 'html',
		'charset' => 'utf-8',
		);
		$this->load->library('email',$config1);
		//$this->email->from('nsg@hotmail.com');
		$this->email->from('noreply@portugo.pt');
		$this->email->to($user['email']);
		$this->email->subject('Verify Your Email Address.');
		$this->data['data']=$user;
		$message=$this->load->view('mail/signup_mail',$this->data,true);
		/*$message='
 <div style="font-family:Myriad Pro; font-size:17px; color:#000; padding:20px 20px 0px 20px;">Dear '.ucfirst($user['first_name']).'</div>

 <div style="font-family:Myriad Pro; font-size:17px; color:#000; padding:20px 20px 0px 20px;">we need to activate Your account, Please hit the button below:</div>
 <div style="margin:10px 0px 0px 15px;"><a href="'.base_url('signup/confirm').'/'.$user['user_id'].'/'.$user['activation_code'].'" target="_blank" style="text-decoration:none;"><div style="width:127px; height:18px; background:#399fb0; border-radius:6px; font-size:16px; font-family:Myriad Pro,arial; color:#ffffff; font-weight:400; text-align:center; text-decoration:none; padding:10px 0px; margin:10px 0px;">Activate now</div></a></div>
 

</div>';*/
	
	//echo $message; die;	
		$this->email->message($message);
		@$this->email->send();
		$this->email->clear();
		return $this->email->print_debugger();	
	}
	
	
	function confirm(){ 
		$uid = $this->uri->segment(3); 
		$activation_code = $this->uri->segment(4); //echo $activation_code; die;	
		
		$user = $this->signup_user_model->get_user($uid); //print_r($user); die;
		if(!empty($user)){
			if($user && $user['activation_code']==$activation_code) {
				$this->signup_user_model->activate_account($uid);
				$this->session->set_flashdata('account_verified', 'Congratulation!<br>Your account is verified.');	
				redirect("home","refresh");
			} 
		} 
		
	}
	
						
   function login()
		    {
			  if(!$_POST)
			{
	          $this->load->view('home');
			}
			else{
								
	 $user=$this->signup_user_model->user_login($_POST['email'], $_POST['passwordd']);	 
	 	  
	
	 if($user){ 
		  $s = array(
									 				 
					'status' => $user->status,
					'user_id' => $user->user_id,
					
					);
			
			
			if($s['status']==1){	
			$sess_array = array(
					'user_id' => $user->user_id,					 				 
					'status' => $user->status,
					
					);
			$this->session->set_userdata('user_logged_in', $sess_array);
			$session_user_id=$this->session->userdata('user_logged_in');
						
			if(isset($_POST['remember']) && $_POST['remember']=='1') { 
			$this->load->helper('cookie');
			$this->input->set_cookie("email",$_POST['email'],time()+(86400*7));
			$this->input->set_cookie("password",$_POST['passwordd'],time()+(86400*7));
			$this->input->set_cookie("remember",$_POST['remember'],time()+(86400*7));
			}
			else{
			$this->load->helper('cookie');
			delete_cookie('email');
			delete_cookie('password');
			delete_cookie('remember');
			}
		           $session_data=$this->session->userdata('user_logged_in');
				   
			echo '1';	   
					 
	  }
	  else{echo '2';	}
	  }
	  
	  
	  else{
				
				echo $this->lang->line("Invalid Email or Password");
					
			}
	  
	          
	}
	}
	
	
		
	function logout(){
		$this->session->sess_destroy();
		redirect('home','refresh');
	}	
	
	
	 function insert_fbuser()
	  {
	  $email=$_GET['email'];
	  $first_name=$_GET['first_name'];
	  $last_name=$_GET['last_name'];
	  //print_r($_GET);die;
	  $user_id=$this->signup_user_model->checkfbUser($email,$first_name,$last_name);
	  //echo $customer_id;die;
	  if($user_id!='')
	  {
	  $sess_array = array(
					'user_id' => $user_id,					 				 
					'status' => 1,
					
					);
			$this->session->set_userdata('user_logged_in', $sess_array);
			echo '1';
					}
	  
	  }
	  
	  
	  
	  
function customer()
	{
	$segment=$this->uri->segment(3);
	$length=strlen($segment);
	$customer_id=substr($segment,32,$length);
	//echo $length; die;
	
	if(!$_POST)
	{
	$this->load->view('reset_password');
	}
	else
	{
	if($segment!='')
	{
	$this->signup_user_model->update_customer_password($_POST['password'],$customer_id);
	
	
	$this->session->set_flashdata('success_msg', 'Your password  has been  reset .');	
	redirect('signup/customer','refresh');
	}
	else
	{
	$this->session->set_flashdata('error_message', 'Link Expired .');	
	redirect('signup/customer','refresh');
	}
	
	}
	
	}
	
	 
	
	
	
}

?>