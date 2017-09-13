<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class cuisine extends CI_Controller {

	

	function __construct(){

  	parent::__construct();	

		 

		if(!$this->session->userdata('restaurant_logged_in')){

			redirect('restaurant/login','refresh');

		}

		
	$this->load->library('fckeditor','form_validation');
		
		$this->load->model('restaurant/restaurant_model');        
		$this->load->model('restaurant/cuisine_model');
		//$this->load->model('restaurant/dashboard_model');

		$this->data['title'] = 'PortuGo Takeaway';

							

	}

	

	

			function mamage_cuisine()

			{
			
			$session_data=$this->session->userdata('restaurant_logged_in');		    
            $rest_id=$session_data['id'];
			$this->data['manage_cuisine']=$this->cuisine_model->all_cuisine($rest_id);	
			$this->load->view('restaurant/cuisine/manage_cuisine',$this->data);		

			}
						
			
			
			public function add_cuisine(){ 
			
			$session_data=$this->session->userdata('restaurant_logged_in');		    
            $rest_id=$session_data['id'];

			$this->load->helper(array('form'));
     		$this->load->library('form_validation');

			if(!$_POST){

			$this->load->view('restaurant/cuisine/add_cuisine',$this->data);		

			} else { 
			
			$this->form_validation->set_rules('cuisin_name', '<strong>Cuisin Name</strong>', 'required');			            if ($this->form_validation->run() == FALSE)
			{
			$this->data['error']=validation_errors();
			$this->load->view('restaurant/cuisine/add_cuisine',$this->data);
			}
			else
			{
			
			$cuisin_name=$_POST['cuisin_name'];
					
			$count=count($_POST['cuisin_name']);
			for($i=0;$i<$count;$i++)
			{
			$portu_cuisin_name=$_POST['portu_cuisin_name'];				
			if($cuisin_name[$i]!==''){$this->cuisine_model->insert_cuisine($cuisin_name[$i],$portu_cuisin_name[$i]);}
			
			$last_id = $this->db->insert_id();
			
			$rest_cuisine=$this->restaurant_model->get_restaurant_detail($rest_id);
			
			if($rest_cuisine['cuisine_types']!=''){
			$cuisine=$rest_cuisine['cuisine_types'].','.$last_id;
			}else{			
			$cuisine=$last_id;
			}
			$this->restaurant_model->update_restaurant_cuisine($cuisine,$rest_id);
			}
			$this->session->set_flashdata('message', 'Record  has  been added.');						
			redirect("restaurant/cuisine/add_cuisine","refresh");
			}
			}
			}
			
						
			
			public function edit_cuisine(){
										
					$session_data=$this->session->userdata('restaurant_logged_in');		    
                    $rest_id=$session_data['id'];
					$id = $this->uri->segment(4);
					
					$this->data['edit_cuisine']=$this->cuisine_model->get_cuisine($id);
					
					$this->load->helper(array('form'));					
					$this->load->library('form_validation');
					
					
					
					if(!$_POST){
					
					$this->load->view('restaurant/cuisine/edit_cuisine',$this->data);
					
					} else { 
					
					$this->form_validation->set_rules('cuisin_name', '<strong>Cuisine</strong>', 'required');										
					if ($this->form_validation->run() == FALSE)					
					{					
					$this->data['error']=validation_errors();					
					$this->load->view('restaurant/cuisine/edit_cuisine',$this->data);						
					}					
					else					
					{
					$this->cuisine_model->update_cuisine($_POST,$id);					
					redirect("restaurant/cuisine/mamage_cuisine","refresh");					
					}
					}		
					}

				
				function delete_cuisine()
				{
				$id=$this->uri->segment(4);				
				$this->cuisine_model->delete_cuisine($id);
				redirect("restaurant/cuisine/mamage_cuisine","refresh");
				}
				
				
				
				function restaurant_cuisine()
				{
					$session_data=$this->session->userdata('restaurant_logged_in');				
					$rest_id = $session_data['id'];
					$this->data['all_cuisine']=$this->cuisine_model->get_all_cuisine();		
					$this->data['restaurant']=$this->restaurant_model->get_restaurant_detail($rest_id);					
					if(!$_POST){

			$this->load->view('restaurant/cuisine/restaurant_cuisine',$this->data);		
			

			} else { 
			
                 $cuisine='';
				if(isset($_POST['cuisine']) && !empty($_POST['cuisine'])){$cuisine=implode(',',$_POST['cuisine']);}				
				$this->cuisine_model->update_restaurant_cuisine($cuisine,$rest_id);
				
				if(!empty($_POST['cuisin_name'])){
				$last_id=$this->restaurant_model->insert_cuisine($_POST['cuisin_name'],$rest_id);
				}
				
				$admin_data = $this->restaurant_model->admin_data();				
				$restaurant = $this->restaurant_model->get_restaurant_detail($rest_id);
				
				
	  $to = $admin_data['email'];
	  	   
      $this->load->library('email');
      $this->email->set_mailtype("html");
      $this->email->from('info@nsglobalsystem.com');
      $this->email->to($to);
      $this->email->subject('New Restaurant Cuisine Request Message...');
      $this->load->library('encrypt');
      
      $message = "Cuisine Request for Approval. <br><br>
	  Restaurant Name
      <strong>".ucwords($restaurant['restaurant_name'].' ')."</strong> I have added new cuisine for my Restaurant.<br><br>
	  Cuisine Name <strong>".ucwords($_POST['cuisin_name'].' ')."</strong><br><br>
	   Please approval for cuisine  <a href='".base_url('restaurant/cuisine/approve/'.$last_id.'/id/'.$rest_id)."'>Approval</a><br><br>
      Warm wishes<br><br>
Go Takeway";



      $this->email->message($message);      
      $this->email->send();				
								
				$this->session->set_flashdata('message', 'Record  has  been updated.');
				if(!empty($_POST['cuisin_name'])){
				$this->session->set_flashdata('message', 'Record  has  been updated and request has  been sent.');
			    }
				redirect("restaurant/cuisine/restaurant_cuisine/","refresh");
			}
				
				}
				

			

		function approve(){
				
		$rest_id = $this->uri->segment(6);		
		$id=$this->uri->segment(4);
						
		if($id!=''){
			
			$this->cuisine_model->approved($id);
			
		}
		 
		$restaurant = $this->restaurant_model->get_restaurant_detail($rest_id);		
		
		$to = $restaurant['contact_email'];
	  	   
      $this->load->library('email');
      $this->email->set_mailtype("html");
      $this->email->from('info@nsglobalsystem.com');
      $this->email->to($to);
      $this->email->subject('Cuisine Approved Message...');
      $this->load->library('encrypt');
      
$message = "Hello,<br><br>
      Welcome to Go Takeway. <br><br>
      <strong>".ucwords($restaurant['restaurant_name'].' ')."</strong> Your New Cuisine Approval Request has been Approved. <br><br>
      Warm wishes<br><br>
Go Takeway";

//echo $message;die;

      $this->email->message($message);
      
      $this->email->send();	
redirect(base_url().'admin/login');
		
	}	

		

}