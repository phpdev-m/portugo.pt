<?php 
class Restaurant_signup extends CI_Controller{
	
	
function __construct()
    {
        // Call the Model constructor
     parent::__construct();
     $this->load->database();
	 $this->load->model('restaurant_signup_model');
	 $this->load->model('signup_user_model');
	 $this->load->model('restaurant_model');
	 
	//ob_start();
	 }	


public function index()
	{
	$this->load->view('restaurant_signup');
	}
	

public function add_restaurant(){ 

   if(!$_POST){

	$this->load->view('restaurant_signup',$this->data);		

			} else {

            $check_exist=$this->restaurant_model->check_restaurent($_POST['email']);
   
   if($check_exist){
   $this->data['exist_error']='Record with this email already exists in the current database.';
   $this->load->view('restaurant_signup',$this->data);
    
   }else{			
						
			$this->restaurant_signup_model->insert_restaurant($_POST);
			$rest_id = $this->db->insert_id();
				$this->restaurant_model->insert_delivery_postcode($_POST,$rest_id);		
			$admin_data = $this->restaurant_signup_model->admin_data();				
			 //$restaurant = $this->restaurant_signup_model->get_restaurant_detail($rest_id);
				
	  $to = $admin_data['email'];
	 
	 	  	   
      $this->load->library('email');
      $this->email->set_mailtype("html");
     //$this->email->from('info@nsglobalsystem.com');
	   $this->email->from($_POST['email']);
	   $this->email->to($to);
      $this->email->subject('New Restaurant Request Message...');
      $this->load->library('encrypt');
      
      $message = "Restaurant Request for Approval. <br><br>
	  Restaurant Name
      <strong>".ucwords($_POST['rest_name'].' ')."</strong> I have added a new Restaurant.<br><br>
	   Please approval the restaurant<br><br>
      Warm wishes<br><br>
Go Takeway";
//echo $message;die;

      $this->email->message($message);      
      $this->email->send();				

			redirect("restaurant_signup/restaurant_thankyou","refresh");					
   }
			}

			}




 public function restaurant_thankyou()

			{
							
			$this->load->view('restaurant_thankyou');		

			}
			
			
			
			
function forget_password()
	 {
	if(!$_POST)
	{
	 $this->load->view('forget_password');
	 }
	 else
	 {
		 //print_r($_POST);die;
	 $customer = $this->signup_user_model->get_customer($_POST['customer_email']);
	//print_r($customer);die;
	if(empty($customer))
	{
	$this->data['email_error']="Email  doesn't exist  in  database ! Please try another";
	$this->load->view('forget_password',$this->data);
	}
	else
	{
           $this->send_mail_customer($customer);
		   $this->session->set_flashdata('success_msg', 'success');	
		   redirect('restaurant_signup/forget_password','refresh');
	}
	 }
	 
	 }
	 
	 function send_mail_customer($customer)
	 {
	 $this->data['customer']=$customer;
	
	 $config1 = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			);
			$this->load->library('email',$config1);
			//$this->email->from('nsglobalsystem@hotmail.com');
			$this->email->from('noreply@portugo.pt');
			$this->email->to($customer['email']);
			$this->email->subject('Reset Your Password.');
			$message=$this->load->view('mail/reset_password_customer',$this->data,true);;
			 //echo $message; die;	
			$this->email->message($message);
			@$this->email->send();
			$this->email->clear();
			return $this->email->print_debugger();	
	 }

	
	
}

?>
