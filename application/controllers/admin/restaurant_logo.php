<?php error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class restaurant_logo extends CI_Controller {

	

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
				
		    $rid = $this->uri->segment(4);
			$restaurant_detail = $this->data['restaurant_detail']=$this->restaurant_model->get_restaurant_detail($rid);

			$this->load->helper(array('form'));
			 $this->load->library('form_validation');
			 		
			if(!$_POST){

			$this->load->view('admin/restaurant/edit_restaurant_logo',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			//$this->form_validation->set_rules('file', '<strong>Restaurant Logo</strong>', 'required');			
            //$this->form_validation->set_rules('file2', '<strong>Restaurant Cover Photo</strong>', 'required');
			$this->form_validation->set_rules('rest_desc', '<strong>Restaurant Description</strong>', 'required');

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();

			$this->load->view('admin/restaurant/edit_restaurant_logo',$this->data);	

			}

			else

			{
				
			$file_name='';
		if(@$_FILES['file']['error']==0){ 
		
			$config['upload_path'] = './image_gallery/restaurant_logo';
			$config['allowed_types'] = 'gif|jpg|png|doc|pdf|docx';
			$config['max_size'] = '100000000';
			//$config['max_width']  = '1366';
			//$config['max_height']  = '768';
			$config['width'] = 75;
			$config['height'] = 50;
			$this->load->library('upload', $config);
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
			$this->upload->initialize($config); 
			
			if ( ! $this->upload->do_upload('file')){
				
				$error1 = $this->upload->display_errors();
				$this->data['error'] = $error1; //print_r($error1); die;
			} else {
				//echo "hello";die;
				$this->load->helper("file"); //$path='';
				$upload_data = $this->upload->data();
               $this->resize_function($upload_data);
			    /*if($this->data['detail']!='no'){
				$path = "image_gallery/userthumb/".$this->data['detail']->image;
			   }*/
			   //@delete_files($path, TRUE);
			    $data = array('upload_data' => $this->upload->data());
				
			   //print_r($data); die;
			    $file_name = $data['upload_data']['file_name'];  
				//echo $file_name;die;
			} 
		}else{
		$file_name = $_POST['file_hidden1']; 
		}
		
		$file_name2='';
		if(@$_FILES['file2']['error']==0){ 
			$config['upload_path'] = './image_gallery/cover_photo';
			$config['allowed_types'] = 'gif|jpg|png|doc|pdf|docx';
			$config['max_size'] = '100000000';
			//$config['max_width']  = '1366';
			//$config['max_height']  = '768';
			$config['width'] = 75;
			$config['height'] = 50;
			$this->load->library('upload', $config);
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
			$this->upload->initialize($config); 
			if ( ! $this->upload->do_upload('file2')){
				$error1 = $this->upload->display_errors();
				$this->data['error'] = $error1; //print_r($error1); die;
			} else {
				$this->load->helper("file"); //$path='';
				$upload_data = $this->upload->data();
               $this->resize_functionn($upload_data);
			    /*if($this->data['detail']!='no'){
				$path = "image_gallery/userthumb/".$this->data['detail']->image;
			   }*/
			   //@delete_files($path, TRUE);
			    $data = array('upload_data' => $this->upload->data());
			   //print_r($data);die; 
			    $file_name2 = $data['upload_data']['file_name'];  
				 	
			} 
		}else{
		$file_name2 = $_POST['file_hidden2']; 
		}	
				
		
						
			$this->restaurant_model->update_restaurant_logo($_POST,$file_name,$file_name2,$rid);

			redirect("admin/restaurant/manage_restaurant","refresh");

			}

			}

			}
			
			
			
	public function resize_function($upload_data)
    {
        
		//print_r($upload_data);die;
		$this->load->library('image_lib');
		/*  resize for image2 */ 

        $image_config["image_library"]  = "gd2";
        $image_config["source_image"]   = $upload_data["full_path"];
        $image_config['create_thumb']   = FALSE;
        $image_config['maintain_ratio'] = TRUE;
        $image_config['new_image']      = $upload_data["file_path"] . 'thumb/' . $upload_data["file_name"];
        $image_config['quality']        = "100%";
        $image_config['width']          = 72;
        $image_config['height']         = 77;
        
        
        $this->image_lib->initialize($image_config);
        $this->image_lib->resize();
					
	}
	
	
	private function resize_functionn($upload_data)
    {
		//print_r($upload_data);die;
        $this->load->library('image_lib');
		/*  resize for image2 */ 

        $image_config["image_library"]  = "gd2";
        $image_config["source_image"]   = $upload_data["full_path"];
        $image_config['create_thumb']   = FALSE;
        $image_config['maintain_ratio'] = TRUE;
        $image_config['new_image']      = $upload_data["file_path"] . 'cover_thumb/' . $upload_data["file_name"];
        $image_config['quality']        = "100%";
        $image_config['width']          = 234;
        $image_config['height']         = 179;
        
        
        $this->image_lib->initialize($image_config);
        $this->image_lib->resize();
			
			
	}
			
		

}