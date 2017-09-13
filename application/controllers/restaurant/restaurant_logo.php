<?php error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class restaurant_logo extends CI_Controller {

	

	function __construct(){

  	parent::__construct();
	
		 
if(!$this->session->userdata('restaurant_logged_in')){

			redirect('restaurant/login','refresh');

		}
		
	   //$this->load->library('fckeditor','form_validation');		
		$this->load->model('restaurant/cuisine_model');
		$this->load->model('restaurant/restaurant_model');
		
		$this->data['title'] = 'PortuGo Takeaway';

							

	}

			function rest_logo()

			{
				
			$id = $this->uri->segment(4);
			$this->load->view('admin/restaurant/add_restaurant_logo',$this->data);		

			}
			
			
			
			
			public function add_restaurant_logo(){ 

			$this->load->helper(array('form'));
			
			 $this->load->library('form_validation');
			 $res_id = $this->uri->segment(4);
			 $own_id = $this->uri->segment(6);

			

			if(!$_POST){

			$this->load->view('admin/restaurant/add_restaurant_logo',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			//$this->form_validation->set_rules('file', '<strong>Restaurant Logo</strong>', 'required');			
            //$this->form_validation->set_rules('file2', '<strong>Restaurant Cover Photo</strong>', 'required');
			$this->form_validation->set_rules('rest_desc', '<strong>Restaurant Description</strong>', 'required');

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();

			$this->load->view('admin/restaurant/add_restaurant_logo',$this->data);	

			}

			else

			{
				
		$file_name='';
			
		if($_FILES['file']['error']==0){ 
			$config['upload_path'] = './image_gallery/restaurant_logo';
			$config['allowed_types'] = 'gif|jpg|png|doc|pdf';
			$config['max_size'] = '10000';
			//$config['max_width']  = '100';
			//$config['max_height']  = '100';
			$config['width'] = 75;
			$config['height'] = 50;
			
			$this->load->library('upload', $config);
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
			
			if ( ! $this->upload->do_upload('file')) {
			   $error1 = $this->upload->display_errors();
			   //$this->data['error'] = $error1; print_r($error1); die;
			} else {
			   $this->load->helper("file"); //$path='';			   
			   $data = array('upload_data' => $this->upload->data());
			  // print_r($data); 
			   $file_name = $data['upload_data']['file_name']; 
			}
    	}
		
		
		$file_name2='';	
		if($_FILES['file2']['error']==0){ 
			$config['upload_path'] = './image_gallery/cover_photo';
			$config['allowed_types'] = 'gif|jpg|png|doc|pdf';
			$config['max_size'] = '10000';
			//$config['max_width']  = '1366';
			//$config['max_height']  = '768';
			$config['width'] = 75;
			$config['height'] = 50;
			
			$this->load->library('upload', $config);
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
			
			if ( ! $this->upload->do_upload('file2')) {
			   $error1 = $this->upload->display_errors();
			   $this->data['error'] = $error1; //print_r($error1); die;
			} else {
			   $this->load->helper("file"); //$path='';			   
			   $data = array('upload_data' => $this->upload->data());
			  // print_r($data); 
			   $file_name2 = $data['upload_data']['file_name']; 
			}
    	}
			

			$this->restaurant_model->insert_restaurant_logo($_POST,$file_name,$file_name2,$res_id);

			redirect("admin/restaurant_bank_detail/bank_detail/".$res_id."/id/".$own_id."","refresh");

			}

			}

			}
			
			
			
			public function edit_restaurant_logo(){				
				
		    //$rid = $this->uri->segment(4);
			//$restaurant_detail = $this->data['restaurant_detail']=$this->restaurant_model->get_restaurant_detail($rid);
            $session_id=$this->session->userdata('restaurant_logged_in');
            $rest_id=$session_id['id'];
			$this->data['restaurant_name'] = $this->restaurant_model->get_restaurant_detail($rest_id);
			//print_r($this->data['restaurant_name']);die;
			$this->load->helper(array('form'));
			 $this->load->library('form_validation');
			 		
			if(!$_POST){

			$this->load->view('restaurant/restaurant/edit_restaurant_logo',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			//$this->form_validation->set_rules('file', '<strong>Restaurant Logo</strong>', 'required');			
            //$this->form_validation->set_rules('file2', '<strong>Restaurant Cover Photo</strong>', 'required');
			$this->form_validation->set_rules('rest_desc', '<strong>Restaurant Description</strong>', 'required');

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();

			$this->load->view('restaurant/restaurant/edit_restaurant_logo',$this->data);	

			}

			else

			{
				
		$file_name='';
		if($_FILES['file']['error']==0){ 
			$config['upload_path'] = './image_gallery/restaurant_logo';
			$config['allowed_types'] = 'gif|jpg|png|doc|pdf';
			$config['max_size'] = '100000000000000';
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
			   
			   $upload_data = $this->upload->data();				
				
                $this->resize_function($upload_data);
			   		   
			   $data = array('upload_data' => $this->upload->data());
			  // print_r($data); 
			   $file_name = $data['upload_data']['file_name']; 
			}
			
		}else {
   $file_name = $_POST['file_hidden1'];
  }//print_r($image_config);die;
  
    
		
		$file_name2='';	
		if($_FILES['file2']['error']==0){ 
			$config['upload_path'] = 'image_gallery/cover_photo';
			$config['allowed_types'] = 'gif|jpg|png|doc|pdf';
			$config['max_size'] = '100000000000000';
			//$config['max_width']  = '1366';
			//$config['max_height']  = '768';
			$config['width'] = 75;
			$config['height'] = 50;
			
			$this->load->library('upload', $config);
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
			
			if ( ! $this->upload->do_upload('file2')) {
			   $error1 = $this->upload->display_errors();
			   $this->data['error'] = $error1; //print_r($error1); die;
			} else {
			   $this->load->helper("file"); //$path='';
			   
			   $upload_data = $this->upload->data();				
				
                $this->resize_function($upload_data);
			   			   
			   $data = array('upload_data' => $this->upload->data());
			  // print_r($data); 
			   $file_name2 = $data['upload_data']['file_name']; 
			}
    	}else {
			$file_name2 = $_POST['file_hidden2']; 
		}
				
			$this->restaurant_model->update_restaurant_logo($_POST,$file_name,$file_name2,$rest_id);

			redirect("restaurant/restaurant_logo/edit_restaurant_logo","refresh");

			}

			}

			}
			
			
			
	private function resize_function($upload_data)
    {
        $this->load->library('image_lib');
		/*  resize for image2 */ 

         $image_config["image_library"]  = "gd2";
        $image_config["source_image"]   = $upload_data["full_path"];
        $image_config['create_thumb']   = FALSE;
        $image_config['maintain_ratio'] = TRUE;
        $image_config['new_image']      = $upload_data["file_path"] . 'thumb/' . $upload_data["file_name"];
        $image_config['quality']        = "100%";
        $image_config['width']          = 209;
        $image_config['height']         = 50;
        
        
        $this->image_lib->initialize($image_config);
        $this->image_lib->resize();
	}
			
		

}