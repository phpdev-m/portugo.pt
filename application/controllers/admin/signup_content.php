<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Signup_content extends CI_Controller {

	

	function __construct(){

  	parent::__construct();	

		 

		if(!$this->session->userdata('logged_in')){

			redirect('admin/login','refresh');

		}

        	$this->load->library('fckeditor','form_validation');
		$this->load->model('admin/signup_content_model');
		$this->load->model('admin/member_model');
		$this->data['title'] = 'PortuGo Takeaway';


         	}






			function index()

			{

			$this->data['signup_content']=$this->signup_content_model->get_all_signup_content();	

			$this->load->view('admin/signup_content/manage_signup_content',$this->data);		


			}

			

			public function add(){ 

			$this->load->helper(array('form'));

			 $this->load->library('form_validation');

			

			if(!$_POST){

			$this->load->view('admin/signup_content/add_signup_content',$this->data);		

			} else { 

			$this->form_validation->set_rules('category', '<strong>Category</strong>', 'required');
			$this->form_validation->set_rules('question', '<strong>Question</strong>', 'required');
            $this->form_validation->set_rules('answer', '<strong>Answer</strong>', 'required');
			$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();

			$this->load->view('admin/signup_content/add_signup_content',$this->data);	

			}

			else

			{

			$this->signup_content_model->insert_signup_content($_POST);

			redirect("admin/signup_content","refresh");

			}

			}

			}

			
        function view()
		{
		$id=$this->uri->segment(4);
		$this->data['signup_content_detail']=$this->signup_content_model->get_signup_content($id);
		$this->load->view('admin/signup_content/view_signup_content',$this->data);	
		}


	

					public function edit(){
					
					
					$id = $this->uri->segment(4);
					
					$this->data['query']=$this->signup_content_model->get_signup_content($id);
					
					$this->load->helper(array('form'));
					
					$this->load->library('form_validation');
					
					if(!$_POST){
					
					$this->load->view('admin/signup_content/edit_signup_content',$this->data);
					
					} else { 
					
					$this->form_validation->set_rules('title', '<strong>Content Title</strong>', 'required');
					$this->form_validation->set_rules('desc', '<strong>Content Description</strong>', 'required');
					//$this->form_validation->set_rules('file', '<strong>Content Image</strong>', 'required');
					$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
					
					if ($this->form_validation->run() == FALSE)
					
					{
					
					$this->data['error']=validation_errors();
					
					$this->load->view('admin/signup_content/edit_signup_content',$this->data);	
					
					}
					
					else

			{
				
		$file_name='';
			
		if($_FILES['file']['error']==0){ 
			$config['upload_path'] = './image_gallery/content_image';
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
    	}else{
			$file_name = $_POST['file_hidden'];
			}
						
										
					$this->signup_content_model->update_signup_content($_POST,$id,$file_name);
					
					redirect("admin/signup_content","refresh");
					}
					}		
					}
					
					
					public function edit_portugoese(){
					$id = $this->uri->segment(4);
					
					
					$this->data['query']=$this->signup_content_model->get_signup_content($id);
					$this->load->helper(array('form'));
					$this->load->library('form_validation');
					if(!$_POST){
					$this->load->view('admin/signup_content/edit_signup_content',$this->data);
					} else {
						 
					$this->form_validation->set_rules('title', '<strong>Content Title</strong>', 'required');
					$this->form_validation->set_rules('descs', '<strong>Content Description</strong>', 'required');
					//$this->form_validation->set_rules('file', '<strong>Content Image</strong>', 'required');
					$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
					
					if ($this->form_validation->run() == FALSE)
					{
					$this->data['error']=validation_errors();
					$this->load->view('admin/signup_content/edit_signup_content',$this->data);
					}
					else
					{
						
						$file_name='';
			
		if($_FILES['file']['error']==0){ 
			$config['upload_path'] = './image_gallery/content_image';
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
    	}else{
			$file_name = $_POST['file_hidden'];
			}
						
						
						
					$this->signup_content_model->update_portugoese_signup_content($_POST,$id,$file_name);
					redirect("admin/signup_content","refresh");
					}
					}		
					}
					
					

		

}
