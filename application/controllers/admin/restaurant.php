<?php error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class restaurant extends CI_Controller {


	function __construct(){

  	parent::__construct();


		if(!$this->session->userdata('logged_in')){

			redirect('admin/login','refresh');

		}



         	$this->load->library('fckeditor','form_validation');
		$this->load->model('admin/cms_model');
		$this->load->model('admin/cuisine_model');
		$this->load->model('admin/restaurant_model');
		$this->load->model('admin/category_model');
		$this->load->model('admin/category_items_model');
		$this->load->model('admin/member_model');
		$this->load->model('admin/setting_model');

		$this->data['title'] = 'PortuGo Takeaway';

          	}


			function manage_restaurant()
			{
			$this->data['manage_restaurant']=$this->restaurant_model->get_all_restaurant();
			$this->load->view('admin/restaurant/manage_restaurant',$this->data);
			}


                        //chama view para cadastro de clone do restaurante
                        public function add_sub_restaurant()
                        {
			$getid = $this->uri->segment(4);
			$this->load->helper(array('form'));
			$this->load->library('form_validation');

			if(!$_POST){

			$this->load->view('admin/restaurant/add_sub_restaurant',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			$this->form_validation->set_rules('rest_name', '<strong>Restaurant Name</strong>', 'required');	
        		$this->form_validation->set_rules('rest_sub_name', '<strong>Restaurant Local Name</strong>', 'required');
                        $this->form_validation->set_rules('rest_phone', '<strong>Restaurant Phone</strong>', 'required');
			$this->form_validation->set_rules('address', '<strong>Restaurant Address</strong>', 'required');			
                        $this->form_validation->set_rules('country', '<strong>Country</strong>', 'required');			
			$this->form_validation->set_rules('city', '<strong>City</strong>', 'required');
                        $this->form_validation->set_rules('postcode', '<strong>Postcode</strong>', 'required');
			$this->form_validation->set_rules('nif_no', '<strong>NIF (Company registration number)</strong>', 'required');					
                        $this->form_validation->set_rules('cname', '<strong>Contact Name</strong>', 'required');
			$this->form_validation->set_rules('phone', '<strong>Contact Phone</strong>', 'required');
			$this->form_validation->set_rules('email', '<strong>Contact Email</strong>', 'required');			
			$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();
			$this->load->view('admin/restaurant/add_sub_restaurant',$this->data);
			}

			else

			{
				//echo "<pre>";
				//print_r($_POST);
				//print_r($_FILES);

		                 	//$getid = $this->uri->segment(4);

			$this->restaurant_model->insert_sub_restaurant($_POST);

			$getid = $this->db->insert_id();

                        $this->cms_model->insert_delivery_postcode($_POST,$getid);

			redirect("admin/restaurant/manage_restaurant","refresh");
			}

			}

			}




			public function add_restaurant()
                        {

			$this->load->helper(array('form'));
			$this->load->library('form_validation');

			if(!$_POST)
                        {

			$this->load->view('admin/restaurant/add_restaurant',$this->data);

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			$this->form_validation->set_rules('rest_name', '<strong>Restaurant Name</strong>', 'required');			
                        $this->form_validation->set_rules('rest_phone', '<strong>Restaurant Phone</strong>', 'required');
			$this->form_validation->set_rules('address', '<strong>Restaurant Address</strong>', 'required');			
                        $this->form_validation->set_rules('country', '<strong>Country</strong>', 'required');			
			$this->form_validation->set_rules('city', '<strong>City</strong>', 'required');
                        $this->form_validation->set_rules('postcode', '<strong>Postcode</strong>', 'required');					
                        $this->form_validation->set_rules('cname', '<strong>Contact Name</strong>', 'required');
			$this->form_validation->set_rules('phone', '<strong>Contact Phone</strong>', 'required');
			$this->form_validation->set_rules('email', '<strong>Contact Email</strong>', 'required');
			$this->form_validation->set_rules('password', '<strong>Password</strong>', 'required');
			$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();
			$this->load->view('admin/restaurant/add_restaurant',$this->data);	

			}

			else

			{
				//echo "<pre>";
				//print_r($_POST);die;				
						
			$this->restaurant_model->insert_restaurant($_POST,$getid,$name);			
			redirect("admin/restaurant/manage_restaurant","refresh");					
			
			//redirect("admin/restaurant_logo/rest_logo/".$insert_id."/id/".$getid."","refresh");

			}

			}

			}
			
									
			
			
			
			
			public function edit_restaurant(){
				
			$getid = $this->uri->segment(4);			
			
			$this->load->helper(array('form'));
			$this->load->library('form_validation');

			if(!$_POST){

			$this->load->view('admin/restaurant/edit_restaurant',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			$this->form_validation->set_rules('rest_name', '<strong>Restaurant Name</strong>', 'required');			
                        $this->form_validation->set_rules('rest_phone', '<strong>Restaurant Phone</strong>', 'required');
			$this->form_validation->set_rules('address', '<strong>Restaurant Address</strong>', 'required');			
                        $this->form_validation->set_rules('country', '<strong>Country</strong>', 'required');			
			$this->form_validation->set_rules('city', '<strong>City</strong>', 'required');
                        $this->form_validation->set_rules('postcode', '<strong>Postcode</strong>', 'required');
                        $this->form_validation->set_rules('nif_no', '<strong>NIF (Company registration number)</strong>', 'required');					
                        $this->form_validation->set_rules('cname', '<strong>Contact Name</strong>', 'required');
			$this->form_validation->set_rules('phone', '<strong>Contact Phone</strong>', 'required');
			$this->form_validation->set_rules('email', '<strong>Contact Email</strong>', 'required');			
			$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();
			$this->load->view('admin/restaurant/edit_restaurant',$this->data);	

			}

			else

			{
				//echo "<pre>";
				//print_r($_POST);
				//print_r($_FILES);
			$getid = $this->uri->segment(4);			
			$this->restaurant_model->update_restaurant($_POST,$getid);
			$this->cms_model->update_delivery_postcode($_POST,$getid);
	  
			
	  if($_POST['status']==1){
				
		 $contact = $this->restaurant_model->get_restaurant_detail($getid);
	  
	  $to = $contact['contact_email'];
	   
      $this->load->library('email');
      $this->email->set_mailtype("html");
     // $this->email->from('info@nsglobalsystem.com');
	  $this->email->from('noreply@portugo.pt');
      $this->email->to($to);
      $this->email->subject('New Restaurant Approval Message...');
      $this->load->library('encrypt');
      
      $message = "Hello,<br><br>
      Welcome to Go Takeway. <br><br>
      ".ucwords($contact['contact_name'].' ')." Your New Restaurant Approval Request has been Approved. <br><br>
      Warm wishes<br><br>
Go Takeway";
      //echo $message; die; 
      $this->email->message($message);
      
      $this->email->send();
	  
			}
			
			redirect("admin/restaurant/manage_restaurant","refresh");
			
			}

			}

			}
			
						
			
	function edit_restaurant_info()
	{		
				    
	   $rest_id=$this->uri->segment(4);

			
		$this->data['restaurant']=$this->restaurant_model->get_restaurant_detail($rest_id);
		
		
		$this->load->library('form_validation');
		
		$this->data['error']='';
		$this->data['success']='';
		
		if(!$_POST){			
		$this->load->view('admin/restaurant/edit_restaurant',$this->data);	
		} else {
		
				
		$day=$_POST['day'];
			$open_hours=$_POST['open_time'];
			$open_min=$_POST['open_mints'];
			$open_am_pm=$_POST['time_open'];
			$close_hours=$_POST['close_time'];
			$close_min=$_POST['close_mints'];
			$close_am_pm=$_POST['time_close'];
			$status=$_POST['status'];
			
                        $about=$_POST['rest_about'];
                        $min_order=$_POST['min_order'];
                        $free_delivery=$_POST['free_delivery'];
                        $delivery_check=$_POST['delivery_check'];
                        $charges=$_POST['charges'];
                        $delivery_time=$_POST['min_time'];

			
			foreach($day as $key=>$value)
			{
			$day_name=$day[$key];
			$rest_status=$status[$key];
			$opnening_time=$open_hours[$key].':'.$open_min[$key].' '.$open_am_pm[$key];
			$closing_time=$close_hours[$key].':'.$close_min[$key].' '.$close_am_pm[$key];
			//echo $rest_id;die;
			$this->restaurant_model->insert_timetable($day_name,$opnening_time,$closing_time,$rest_id,$rest_status);
			}
                        $this->category_model->update_restaurant_info($about,$min_order,$free_delivery,$delivery_check,$charges,$delivery_time,$rest_id);
		
		//$this->session->set_flashdata('success_message', 'Time Table Updated successfully.');			
			redirect("admin/restaurant/manage_restaurant","refresh");
		
		}
	}
			
			
			
			
			
			
			
			
			
			function view_restaurant()

			{				
			$rid = $this->uri->segment(5);
			
			$query = $this->data['query']=$this->restaurant_model->get_restaurant_detail($rid);	
			$this->data['owner_name']=$this->restaurant_model->get_restaurant($query['restaurant_owner_id']);
			
			$this->load->view('admin/restaurant/view_restaurant_detail',$this->data);		

			}
			
			
			
			
			function delete_restaurant()
				{
				$id=$this->uri->segment(5);
				//echo $id; die;
				$this->restaurant_model->delete_restaurant($id);
				redirect('admin/restaurant/manage_restaurant','refresh');
				}
			
			
			
			
			function change_restaurant_status()

			{
			//echo "hiii";die;	
			//$_POST['rest_id']=13;
			//$_POST['status_data']=1;
			if($_POST['status_data']==1){
				 $password=rand(111111,999999);
				 $this->restaurant_model->update_restaurant_password($_POST['rest_id'],$password);
				$contact_person = $this->restaurant_model->get_restaurant_detail($_POST['rest_id']);
	  
	  $to = $contact_person['contact_email'];
	  //$to = 'shabnamaaraa@gmail.com';
	   
      $this->load->library('email');
      $this->email->set_mailtype("html");
      //$this->email->from('info@nsglobalsystem.com');
	  $this->email->from('noreply@portugo.pt');
      $this->email->to($to);
      $this->email->subject('New Restaurant Approval Message...');
      $this->load->library('encrypt');
	  $this->data['data']=$contact_person;
      $message=$this->load->view('admin/restaurant/restaurant_approval_mail',$this->data,true);;
      
      //echo $message; die; 
      $this->email->message($message);
      
      $this->email->send();
	  
			}

			$this->restaurant_model->update_restaurant_approval($_POST['status_data'],$_POST['rest_id']);		
			
			}
			
			
			
			
			public function send_comments(){
				
			$admin_arr = $this->session->userdata('logged_in');
			//print_r($admin_arr);die;	
			$rest_id = $this->uri->segment(4);	
             
			$this->load->helper(array('form'));
			$this->load->library('form_validation');

			if(!$_POST){

			$this->load->view('admin/restaurant/edit_restaurant',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			$this->form_validation->set_rules('comment', '<strong>Comment</strong>', 'required');			            

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();
			$this->load->view('admin/restaurant/edit_restaurant',$this->data);	

			}

			else

			{
				//echo "<pre>";
				//print_r($_POST);die;				
			$rest_data = $this->restaurant_model->get_restaurant_detail($rest_id);
			$admin_data = $this->setting_model->get_admin_info($admin_arr['id']);
			//print_r($admin_data);die;
						
			$this->restaurant_model->insert_comment($_POST,$rest_id,$rest_data['contact_email'],$admin_data['email']);
									
			redirect("admin/restaurant/edit_restaurant/".$rest_id."","refresh");					
			
			}

			}

			}
			
			
			
			
	function edit_timetable()
	{
		
		$admin_arr = $this->session->userdata('logged_in');
		$rest_id = $this->uri->segment(4);
			
		$this->data['restaurant']=$this->restaurant_model->get_restaurant_detail($rest_id);
		
		$this->load->library('form_validation');
		
		$this->data['error']='';
		$this->data['success']='';
		
		if(!$_POST){			
		$this->load->view('admin/restaurant/edit_restaurant/'.$rest_id,$this->data);		
		} else {
		
				
		$day=$_POST['day'];
			$open_hours=$_POST['open_time'];
			$open_min=$_POST['open_mints'];
			$open_am_pm=$_POST['time_open'];
			$close_hours=$_POST['close_time'];
			$close_min=$_POST['close_mints'];
			$close_am_pm=$_POST['time_close'];
			$status=$_POST['status'];

                        $about=$_POST['rest_about'];
                        $min_order=$_POST['min_order'];
                        $free_delivery=$_POST['free_delivery'];
                        $delivery_check=$_POST['delivery_check'];
                        $charges=$_POST['charges'];
                        $delivery_time=$_POST['min_time'];
			
			foreach($day as $key=>$value)
			{
			$day_name=$day[$key];
			$rest_status=$status[$key];
			$opnening_time=$open_hours[$key].':'.$open_min[$key].' '.$open_am_pm[$key];
			$closing_time=$close_hours[$key].':'.$close_min[$key].' '.$close_am_pm[$key];
			//echo $rest_id;die;
			$this->restaurant_model->insert_timetable($day_name,$opnening_time,$closing_time,$rest_id,$rest_status);
			}
//                        $this->category_model->update_restaurant_info($about,$min_order,$charges,$rest_id);	
                        $this->category_model->update_restaurant_info($about,$min_order,$free_delivery,$delivery_check,$charges,$delivery_time,$rest_id);
		
		//$this->session->set_flashdata('success_message', 'Time Table Updated successfully.');			
			redirect("admin/restaurant/manage_restaurant/","refresh");
		
		}
	}
			
			
						

		

}
