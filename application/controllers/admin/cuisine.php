<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class cuisine extends CI_Controller {

	

	function __construct(){

  	parent::__construct();	

		 

		if(!$this->session->userdata('logged_in')){

			redirect('admin/login','refresh');

		}

		
	$this->load->library('fckeditor','form_validation');
		
		$this->load->model('admin/cms_model');        
		$this->load->model('admin/cuisine_model');
		$this->load->model('admin/restaurant_model');
		

		$this->data['title'] = 'PortuGo Takeaway';

							

	}

	

	

			function mamage_cuisine()

			{
			
			$rest_id = $this->uri->segment(4);
			
			if(!empty($rest_id)){
			$this->data['manage_cuisine']=$this->cuisine_model->all_cuisine($rest_id);	
			}else{
			$this->data['manage_cuisine']=$this->cuisine_model->get_all_cuisine();				
			}

			$this->load->view('admin/cuisine/manage_cuisine',$this->data);		

			}
			
			
			
			
			public function add_cuisine(){ 
			
			$rest_id = $this->uri->segment(4);

			$this->load->helper(array('form'));
     		$this->load->library('form_validation');

			if(!$_POST){

			$this->load->view('admin/cuisine/add_cuisine',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			$this->form_validation->set_rules('cuisin_name', '<strong>Cuisin Name (English)</strong>', 'required');
			$this->form_validation->set_rules('portu_cuisin_name', '<strong>Cuisin Name (Purtogal)</strong>', 'required');			
            $this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();

			$this->load->view('admin/cuisine/add_cuisine',$this->data);	

			}

			else

			{
				//print_r($_POST);die;

			$this->cuisine_model->insert_cuisine($_POST,$rest_id);
			
			if(!empty($rest_id)){
			redirect("admin/cuisine/mamage_cuisine/".$rest_id."","refresh");
			}else{
			redirect("admin/cuisine/mamage_cuisine","refresh");
			}

			}

			}

			}
			
			
			
			public function edit_cuisine(){
					
					$id = $this->uri->segment(5);	//echo $id; die;
					$rest_id = $this->uri->segment(6);
					
					$this->data['edit_cuisine']=$this->cuisine_model->get_cuisine($id);
					
					$this->load->helper(array('form'));					
					$this->load->library('form_validation');
					
					
					
					if(!$_POST){
					
					$this->load->view('admin/cuisine/edit_cuisine',$this->data);
					
					} else { 
					
					$this->form_validation->set_rules('cuisin_name', '<strong>Cuisine Name (English)</strong>', 'required');
					$this->form_validation->set_rules('portu_cuisin_name', '<strong>Cuisin Name (Purtogal)</strong>', 'required');						
					$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
					
					if ($this->form_validation->run() == FALSE)
					
					{
					
					$this->data['error']=validation_errors();
					
					$this->load->view('admin/cuisine/edit_cuisine',$this->data);	
					
					}
					
					else
					
					{
					//echo '<pre>';
					//print_r($_POST); die;
					
					$this->cuisine_model->update_cuisine($_POST,$id);
					
					if(!empty($rest_id)){
					redirect("admin/cuisine/mamage_cuisine/".$rest_id."","refresh");
					}else{
					redirect("admin/cuisine/mamage_cuisine","refresh");
					}
					
					}
					}		
					}
					
										
				
				function delete_cuisine()
				{
				$id=$this->uri->segment(5);
				$rest_id=$this->uri->segment(6);
				//echo $id; die;
				$this->cuisine_model->delete_cuisine($id);
				
				if(!empty($rest_id)){
				redirect("admin/cuisine/mamage_cuisine/".$rest_id."","refresh");	
				}
				redirect("admin/cuisine/mamage_cuisine","refresh");
				}
				
				
				function restaurant_cuisine()
				{
				
					$rest_id = $this->uri->segment(4);
					$this->data['all_cuisine']=$this->cuisine_model->get_all_cuisine();		
					$this->data['restaurant']=$this->restaurant_model->get_restaurant_detail($rest_id);
					//print_r($this->data['restaurant']); die;
					if(!$_POST){

			$this->load->view('admin/cuisine/restaurant_cuisine',$this->data);		
			

			} else { 
			
                 $cuisine='';
				if(isset($_POST['cuisine']) && !empty($_POST['cuisine'])){$cuisine=implode(',',$_POST['cuisine']);}
				$this->cuisine_model->update_restaurant_cuisine($cuisine,$rest_id);
				$this->session->set_flashdata('message', 'Record  has  been updated.');
				redirect("admin/cuisine/restaurant_cuisine/".$rest_id."","refresh");
			}
				
				}
				
				
				
			function change_cuisine_status()
			{
			
			$this->cuisine_model->update_cuisine_status($_POST['status_data'],$_POST['cuisine_id']);		
			
			}

			
		

}