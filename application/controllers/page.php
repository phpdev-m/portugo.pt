<?php 
class page extends CI_Controller{
	
	
function __construct()
    {
        // Call the Model constructor
    parent::__construct();
    $this->load->database();
	
	$this->load->model('home_model');
	$this->load->model('myaccount_model');
	
    }	


	
			public function contact_us()
			{
			$admin_email=$this->home_model->get_admin_detail();
			if(!$_POST)
			{
			$this->load->view('page/contact_us');
			}
			else
			{
                 	$config1 = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			);
			$this->load->library('email',$config1);
			$this->email->from($_POST['email']);
			$this->email->to($admin_email['email']);
			$this->email->subject('Contact Query');
			$this->data['data']=$_POST;
			$message=$this->load->view('mail/contact_us',$this->data,true);;
			//echo $message; die;	
			$this->email->message($message);
			@$this->email->send();
			$this->email->clear();
			//return $this->email->print_debugger();	
			
			$this->send_automatic_contact_email($_POST);
			 $this->session->set_flashdata('success_msg', 'Mail has been sent to administrator.Please wait for response.');	
		 redirect('page/contact_us','refresh');
	
			
			}
			}
			
			
			function send_automatic_contact_email($data)
			{
			$admin_email=$this->home_model->get_admin_detail();
			$config1 = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			);
			$this->load->library('email',$config1);
			//$this->email->from($admin_email['email']);
			$this->email->from('noreply@portugo.pt');
			$this->email->to($data['email']);
			$this->email->subject('Contact');
			$this->data['data']=$data;
			$message=$this->load->view('mail/send_automatic_contact_email',$this->data,true);;
			//echo $message; die;	
			$this->email->message($message);
			@$this->email->send();
			$this->email->clear();
			}
			
			
			
			
			
			public function faq()
			{
			$this->load->view('page/faq');
			}
			
			public function recomend_restaurant()
			{
			$admin_email=$this->home_model->get_admin_detail();
			if(!$_POST)
			{
			$this->load->view('page/recomend_restaurant');
			}
			else
			{
			
	$config1 = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			);
			$this->load->library('email',$config1);
			$this->email->from($_POST['email']);
			$this->email->to($admin_email['email']);
			$this->email->subject('Recommend a restaurant');
			$this->data['data']=$_POST;
			$message=$this->load->view('mail/recomend_restaurant',$this->data,true);;
			//echo $message; die;	
			$this->email->message($message);
			@$this->email->send();
			$this->email->clear();
			//return $this->email->print_debugger();
			$this->send_automatic_recomend_email($_POST);	
			 $this->session->set_flashdata('success_msg', 'Mail has been sent to administrator.Please wait for response.');	
		     redirect('page/recomend_restaurant','refresh');
	
			
			}
			
			
			
			}	
			
			
			
			function send_automatic_recomend_email($data)
			{
			$admin_email=$this->home_model->get_admin_detail();
			$config1 = Array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			);
			$this->load->library('email',$config1);
			//$this->email->from($admin_email['email']);
			$this->email->from('noreply@portugo.pt');
			$this->email->to($data['email']);
			$this->email->subject('Recommend Restaurant');
			$this->data['data']=$data;
			$message=$this->load->view('mail/send_automatic_recomend_email',$this->data,true);;
			//echo $message; die;	
			$this->email->message($message);
			@$this->email->send();
			$this->email->clear();
			}
			
			
			
			
			
			
			public function about_us()
			{
			$this->load->view('about_us');      //   page/about_us
			}
			
			public function term_condition()
			{
			$this->load->view('terms_conditions');   //   page/term_condition
			}
			
			
			public function privacy_policy()
			{
			$this->load->view('page/privacy_policy');  // page/privacy_policy
			}
		
			
			



}



?>
