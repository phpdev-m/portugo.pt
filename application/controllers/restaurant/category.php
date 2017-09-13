<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Category extends CI_Controller {

	

	function __construct(){

  	parent::__construct();	

		 

		if(!$this->session->userdata('restaurant_logged_in')){

			redirect('restaurant/login','refresh');

		}

		
	$this->load->library('fckeditor','form_validation');
		$this->load->model('restaurant/category_model');
		$this->load->model('restaurant/restaurant_model');
		$this->load->model('restaurant/cuisine_model');

		$this->data['title'] = 'PortuGo Takeaway';

							

	}

	

	

			function manage_category()

			{
			
			$session_data=$this->session->userdata('restaurant_logged_in');		    
		    $rest_id=$session_data['id'];
						
			$this->data['category']=$this->category_model->get_restaurant_category($rest_id);			
			$this->load->view('restaurant/category/manage_category',$this->data);		

			}

			

			public function add_category(){
				
			$session_data=$this->session->userdata('restaurant_logged_in');		    
		    $rest_id=$session_data['id']; 

			$this->load->helper(array('form'));
			$this->load->library('form_validation');

			if(!$_POST){

			$this->load->view('restaurant/category/add_category',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;			
           
			$this->form_validation->set_rules('cat_name', '<strong>Category Name</strong>', 'required');		    			
			$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');

			if ($this->form_validation->run() == FALSE)
			{

			$this->data['error']=validation_errors();			
			$this->load->view('restaurant/category/add_category',$this->data);	

			}
			else
			{
								
		
			$this->category_model->insert_category($_POST,$rest_id);			            
			redirect("restaurant/category/manage_category","refresh");
			
			}

			}

			}

			
        function view()
		{
		$id=$this->uri->segment(4);
		$this->data['cms_detail']=$this->cms_model->get_cms($id);
		$this->load->view('restaurant/cms/view_cms',$this->data);	
		}


			

			

				

					public function edit_category(){
					
					$id = $this->uri->segment(5);
					$session_data=$this->session->userdata('restaurant_logged_in');		    
		            $rest_id=$session_data['id']; 
					
					$this->data['edit_category']=$this->category_model->get_category($id);
					
					$this->load->helper(array('form'));					
					$this->load->library('form_validation');
					
					if(!$_POST){
					
					$this->load->view('restaurant/category/edit_category',$this->data);
					
					} else { 
					
					$this->form_validation->set_rules('cat_name', '<strong>Category</strong>', 'required');					
					$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
					
					if ($this->form_validation->run() == FALSE)
					
					{
					
					$this->data['error']=validation_errors();					
					$this->load->view('restaurant/category/edit_category',$this->data);	
					
					}
					
					else
					
					{
					//echo '<pre>';
					//print_r($_POST); die;
					
						
		  
				
					$this->category_model->update_category($_POST,$id,$rest_id);					
					redirect("restaurant/category/manage_category","refresh");
										
					}
					}		
					}

				
				function delete_category()
				{
				$id=$this->uri->segment(5);
				$rest_id=$this->uri->segment(6);
				//echo $id; die;
				$this->category_model->delete_category($id);
				
				if(!empty($rest_id)){
					redirect('restaurant/category/manage_category/'.$rest_id,'refresh');
				}else{
				redirect('restaurant/category/manage_category','refresh');
				}
				
				}
				



			

		

}