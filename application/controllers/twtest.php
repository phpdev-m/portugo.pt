<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Twtest extends CI_Controller {


function __construct()
    {
        // Call the Model constructor
     parent::__construct();
     $this->load->database();
	$this->load->model('signup_user_model');
	ob_start();
	 }


	/* show link to connect to Twiiter */
	public function index() {
		$this->load->library('twconnect');

		echo '<p><a href="' . base_url() . 'twtest/redirect"><img src="'.base_url().'public/front/images/twitter_login2.png" width="100%" style=" margin:5px 0px 5px 0px;          min-height:27px;" /></a></p>';
		//echo '<p><a href="' . base_url() . 'twtest/clearsession">Clear session</a></p>';

		//echo 'Session data:<br/><pre>';
		//print_r($this->session->all_userdata());
		//echo '</pre>';
		redirect('twtest/redirect');
	}

	/* redirect to Twitter for authentication */
	public function redirect() {
		$this->load->library('twconnect');

		/* twredirect() parameter - callback point in your application */
		/* by default the path from config file will be used */
		$ok = $this->twconnect->twredirect('twtest/callback');

		if (!$ok) {
			echo 'Could not connect to Twitter. Refresh the page or try again later.';
		}
	}


	/* return point from Twitter */
	/* you have to call $this->twconnect->twprocess_callback() here! */
	public function callback() {
		$this->load->library('twconnect');

		$ok = $this->twconnect->twprocess_callback();
		
		if ( $ok ) { redirect('twtest/success'); }
			else redirect ('twtest/failure');
	}


	/* authentication successful */
	/* it should be a different function from callback */
	/* twconnect library should be re-loaded */
	/* but you can just call this function, not necessarily redirect to it */
	public function success() {
	//echo '<pre>';
		//echo 'Twitter connect succeded<br/>';
		//echo '<p><a href="' . base_url() . 'twtest/clearsession">Do it again!</a></p>';

		$this->load->library('twconnect');

		// saves Twitter user information to $this->twconnect->tw_user_info
		// twaccount_verify_credentials returns the same information
		$this->twconnect->twaccount_verify_credentials();

		//echo 'Authenticated user info ("GET account/verify_credentials"):<br/><pre>';
		
		$user_info=$this->twconnect->tw_user_info; 
		//echo $user_info->email;die;
		//print_r($user_info); die;
		$name=$user_info->name;
		$email=$user_info->email;
		$user_id=$this->signup_user_model->checkUser($email,$name);
	  //echo $customer_id;die;
	  if($user_id!='')
	  {
	  $sess_array = array(
					'user_id' => $user_id,					 				 
					'status' => 1,
					
					);
			$this->session->set_userdata('user_logged_in', $sess_array);
			redirect('myaccount/user_order');
					}
		
		
		
	}


	/* authentication un-successful */
	public function failure() {

		echo '<p>Twitter connect failed</p>';
		echo '<p><a href="' . base_url() . 'twtest/clearsession">Try again!</a></p>';
	}


	/* clear session */
	public function clearsession() {

		$this->session->sess_destroy();

		redirect('/twtest');
	}

}