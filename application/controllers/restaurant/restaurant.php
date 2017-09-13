<?php error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class restaurant extends CI_Controller {

	

	function __construct(){

  	parent::__construct();	

		 

		if(!$this->session->userdata('restaurant_logged_in')){

			redirect('restaurant/login','refresh');

		}

		
	$this->load->library('fckeditor','form_validation');		
				       
		$this->load->model('restaurant/cuisine_model');
		$this->load->model('restaurant/restaurant_model');
		$this->load->model('restaurant/category_model');
		$this->load->model('restaurant/category_items_model');
		
		$this->data['title'] = 'PortuGo Takeaway';

							

	}

	

	

			function manage_restaurant()

			{
			$session_data=$this->session->userdata('restaurant_logged_in');		    
		    $rest_id=$session_data['id'];

			$this->data['manage_restaurant']=$this->restaurant_model->restaurant_data($rest_id);	

			$this->load->view('restaurant/restaurant/manage_restaurant',$this->data);		

			}
			
			
			
			public function add_restaurant(){ 

			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			if(!$_POST){

			$this->load->view('restaurant/restaurant/add_restaurant',$this->data);		
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
			$this->load->view('restaurant/restaurant/add_restaurant',$this->data);	

			}

			else

			{
				//echo "<pre>";
				//print_r($_POST);die;				
						
			$this->restaurant_model->insert_restaurant($_POST,$getid,$name);			
			redirect("restaurant/restaurant/manage_restaurant","refresh");					
			//redirect("admin/restaurant_logo/rest_logo/".$insert_id."/id/".$getid."","refresh");

			}

			}

			}
			
									
			
			
			
			
			public function edit_restaurant(){
				
			$session_data=$this->session->userdata('restaurant_logged_in');		    
		    $rest_id=$session_data['id'];			
			
			$this->load->helper(array('form'));
			$this->load->library('form_validation');

			if(!$_POST){

			$this->load->view('restaurant/restaurant/edit_restaurant',$this->data);		

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
			$this->load->view('restaurant/restaurant/edit_restaurant',$this->data);	

			}

			else

			{
				//echo "<pre>";
				//print_r($_POST);
				//print_r($_FILES);
			//$getid = $this->uri->segment(4);
			$getid = $session_data['id'];		
			$this->restaurant_model->update_restaurant($_POST,$getid);
			
	  
			
	  if($_POST['status']==1){
				
		 $contact = $this->restaurant_model->get_restaurant_detail($getid);
	  
	  $to = $contact['contact_email'];
	   
      $this->load->library('email');
      $this->email->set_mailtype("html");
      $this->email->from('info@nsglobalsystem.com');
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
			
			redirect("restaurant/restaurant/edit_restaurant/","refresh");
			
			}

			}

			}
			
						
			
			
			public function edit_restaurant_info(){
			
			$session_data=$this->session->userdata('restaurant_logged_in');		    
            $getid=$session_data['id'];
			
			$this->load->helper(array('form'));
			$this->load->library('form_validation');

			if(!$_POST){

			$this->load->view('restaurant/restaurant/edit_restaurant',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			$this->form_validation->set_rules('rest_about', '<strong>About Restaurant</strong>', 'required');			
            //$this->form_validation->set_rules('open_time', '<strong>Opening Time</strong>', 'required');
			//$this->form_validation->set_rules('close_time', '<strong>Closing Time</strong>', 'required');			
            //$this->form_validation->set_rules('time', '<strong>AM/PM</strong>', 'required');			
			$this->form_validation->set_rules('min_order', '<strong>Minimum Order</strong>', 'required');
            $this->form_validation->set_rules('charges', '<strong>Delivery Charges</strong>', 'required');					
            
			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();
			$this->load->view('restaurant/restaurant/edit_restaurant',$this->data);	

			}

			else

			{
				//echo "<pre>";
				//print_r($_POST);die;
				//print_r($_FILES);
			$getid=$session_data['id'];			
			$this->restaurant_model->update_restaurant_info($_POST,$getid);
						
			$restaurant_info = $this->restaurant_model->restaurant_timetable($getid);
						
			foreach($restaurant_info as $info){						
			$this->category_model->update_restaurant_timetable($_POST,$info['id'],$info['open_close_day']);
			}
						
			redirect("restaurant/restaurant/edit_timetable","refresh");
			
			}

			}

			}
			
			
			
			
			function view_restaurant()

			{				
			$rid = $this->uri->segment(5);
			
			$query = $this->data['query']=$this->restaurant_model->get_restaurant_detail($rid);	
			$this->data['owner_name']=$this->restaurant_model->get_restaurant($query['restaurant_owner_id']);
			
			$this->load->view('restaurant/restaurant/view_restaurant_detail',$this->data);		

			}
			
			
			
			
			function delete_restaurant()
				{
				$id=$this->uri->segment(5);
				//echo $id; die;
				$this->restaurant_model->delete_restaurant($id);
				redirect('restaurant/restaurant/manage_restaurant','refresh');
				}
			
			
			
			
			function change_restaurant_status()

			{
			//echo "hiii";die;	
			
			if($_POST['status_data']==1){
				
				$contact_person = $this->restaurant_model->get_restaurant_detail($_POST['rest_id']);
	  
	  $to = $contact_person['contact_email'];
	  //$to = 'shabnamaaraa@gmail.com';
	   
      $this->load->library('email');
      $this->email->set_mailtype("html");
      $this->email->from('info@nsglobalsystem.com');
      $this->email->to($to);
      $this->email->subject('New Restaurant Approval Message...');
      $this->load->library('encrypt');
      
      $message = "Hello,<br><br>
      Welcome to Go Takeway. <br><br>
      ".ucwords($contact_person['contact_name'].' ')." Your New Restaurant Approval Request has been Approved. <br><br>
      Warm wishes<br><br>
Go Takeway";
      //echo $message; die; 
      $this->email->message($message);
      
      $this->email->send();
	  
			}

			$this->restaurant_model->update_restaurant_status($_POST['status_data'],$_POST['rest_id']);		
			
			}
			
			
			
			
			public function send_comments(){
				
			$admin_arr = $this->session->userdata('logged_in');
			//print_r($admin_arr);die;	
			$rest_id = $this->uri->segment(4);	
             
			$this->load->helper(array('form'));
			$this->load->library('form_validation');

			if(!$_POST){

			$this->load->view('restaurant/restaurant/edit_restaurant',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			$this->form_validation->set_rules('comment', '<strong>Comment</strong>', 'required');			            

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();
			$this->load->view('restaurant/restaurant/edit_restaurant',$this->data);	

			}

			else

			{
				//echo "<pre>";
				//print_r($_POST);die;				
			$rest_data = $this->restaurant_model->get_restaurant_detail($rest_id);
			$admin_data = $this->setting_model->get_admin_info($admin_arr['id']);
			//print_r($admin_data);die;
						
			$this->restaurant_model->insert_comment($_POST,$rest_id,$rest_data['contact_email'],$admin_data['email']);
									
			redirect("restaurant/restaurant/edit_restaurant/".$rest_id."","refresh");					
			
			}

			}

			}
			
			
			
	function get_state()
	{
	$state = $this->restaurant_model->get_state($_POST['country_id']);
	foreach ($state as $key => $pks) {
		                          $city = $this->restaurant_model->get_city1($pks['id']);
									
									foreach ($city as $key => $pks1) {?>
									<option value='<?php echo $pks1['id'];?>' <?php if($pks1['id']==$this->input->post('city')){echo 'selected="selected"';}?> ><?php echo utf8_decode($pks1['countryname']);?></option>
									<?php
									}
									}
									
	}
			
						

		
 
 function edit_timetable()
	{
		
		$session_data=$this->session->userdata('restaurant_logged_in');		    
		   $rest_id=$session_data['id'];

			
		$this->data['restaurant']=$this->restaurant_model->get_restaurant_detail($rest_id);
		
		
		$this->load->library('form_validation');
		
		$this->data['error']='';
		$this->data['success']='';
		
		if(!$_POST){			
		$this->load->view('restaurant/restaurant/edit_timetable',$this->data);		
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
			redirect("restaurant/restaurant/edit_timetable/","refresh");
		
		}
	}


}
