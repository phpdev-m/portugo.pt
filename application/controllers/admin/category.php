<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Category extends CI_Controller {

	

	function __construct(){

  	parent::__construct();	

		 

		if(!$this->session->userdata('logged_in')){

			redirect('admin/login','refresh');

		}

		
	$this->load->library('fckeditor','form_validation');
		$this->load->model('admin/category_model');
		$this->load->model('admin/restaurant_model');

		//$this->load->model('user_model');

		$this->data['title'] = 'PortuGo Takeaway';

							

	}

	

	

			function manage_category()

			{
			
			$rid = $this->uri->segment(4);
			
			if(!empty($rid)){
			$this->data['category']=$this->category_model->get_restaurant_category($rid);
			}else{
			$this->data['category']=$this->category_model->get_all_category();	
			}

			$this->load->view('admin/category/manage_category',$this->data);		

			}

			

			public function add_category(){
				
			$rest_id = $this->uri->segment(4); 

			$this->load->helper(array('form'));
			 $this->load->library('form_validation');

			if(!$_POST){

			$this->load->view('admin/category/add_category',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;			
           
			$this->form_validation->set_rules('cat_name', '<strong>Category Name</strong>', 'required');
		    if(empty($rest_id)){			
			$this->form_validation->set_rules('rest', '<strong>Restaurant Name</strong>', 'required');
			}else{ }
            $this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');

			if ($this->form_validation->run() == FALSE)
			{

			$this->data['error']=validation_errors();			
			$this->load->view('admin/category/add_category',$this->data);	

			}
			else
			{
								
		$file_name='';	
		if($_FILES['file']['error']==0){ 
			$config['upload_path'] = './category_gallery/category_image';
			$config['allowed_types'] = 'gif|jpg|png|doc|pdf';
			$config['max_size'] = '10000';
			//$config['max_width']  = '1366';
			//$config['max_height']  = '768';
			$config['width'] = 75;
			$config['height'] = 50;
			
			$this->load->library('upload', $config);
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
			
			if ( ! $this->upload->do_upload('file')) {
			   $error1 = $this->upload->display_errors();
			   $this->data['error'] = $error1; //print_r($error1); die;
			} else {
			   $this->load->helper("file"); //$path='';			   
			   $data = array('upload_data' => $this->upload->data());
			  // print_r($data); 
			   $file_name = $data['upload_data']['file_name']; 
			}
    	}
				
				

			$this->category_model->insert_category($_POST,$file_name,$rest_id);
			
            if(!empty($rest_id)){
				redirect("admin/category/manage_category/".$rest_id."","refresh");
				}else{
			redirect("admin/category/manage_category","refresh");
				}

			}

			}

			}

			
        function view()
		{
		$id=$this->uri->segment(4);
		$this->data['cms_detail']=$this->cms_model->get_cms($id);
		$this->load->view('admin/cms/view_cms',$this->data);	
		}


			

			

				

					public function edit_category(){
					
					$id = $this->uri->segment(5);
					$rest_id = $this->uri->segment(6);
					
					$this->data['edit_category']=$this->category_model->get_category($id);
					
					$this->load->helper(array('form'));					
					$this->load->library('form_validation');
					
					if(!$_POST){
					
					$this->load->view('admin/category/edit_category',$this->data);
					
					} else { 
					
					$this->form_validation->set_rules('cat_name', '<strong>Category</strong>', 'required');
					$this->form_validation->set_rules('rest', '<strong>Restaurant Name</strong>', 'required');
					$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
					
					if ($this->form_validation->run() == FALSE)
					
					{
					
					$this->data['error']=validation_errors();					
					$this->load->view('admin/category/edit_category',$this->data);	
					
					}
					
					else
					
					{
					//echo '<pre>';
					//print_r($_POST); die;
					
						
		   if($_FILES['file']['error']==0){ 
			$config['upload_path'] = './category_gallery/category_image';
			$config['allowed_types'] = 'gif|jpg|png|doc|pdf';
			$config['max_size'] = '10000';
			//$config['max_width']  = '1366';
			//$config['max_height']  = '768';
			$config['width'] = 75;
			$config['height'] = 50;
			
			$this->load->library('upload', $config);
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
			
			if ( ! $this->upload->do_upload('file')) {
			   $error1 = $this->upload->display_errors();
			   $this->data['error'] = $error1; //print_r($error1); die;
			} else {
			   $this->load->helper("file"); //$path='';			   
			   $data = array('upload_data' => $this->upload->data());
			  // print_r($data); 
			   $file_name1 = $data['upload_data']['file_name']; 
			}
    	}else{ $file_name1 = $_POST['file_hidden'];
			
		}
		
				
					$this->category_model->update_category($_POST,$id,$file_name1);
					if(!empty($rest_id)){
						redirect("admin/category/manage_category/".$rest_id."","refresh");
						}else{
					redirect("admin/category/manage_category","refresh");
						}
					
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
					redirect('admin/category/manage_category/'.$rest_id,'refresh');
				}else{
				redirect('admin/category','refresh');
				}
				
				}
				



			

		

}