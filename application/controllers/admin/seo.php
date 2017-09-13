<?php
class seo extends CI_Controller
{
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login','refresh');
		}
		
		$this->load->helpers('url');
		$this->load->model('admin/seo_model');
		$this->load->model('admin/login_model');
		
		$this->data['title'] = 'PortuGo Takeaway';			
	}
	
	
	function tittle()
	{
	$this->data['query']=$this->seo_model->get_tittle();
    $this->load->view('admin/seo/tittle',$this->data);
	}
	
	
	function add_tittle()
	{
	$this->load->library('form_validation');
	if(!$_POST){
		
    $this->load->view('admin/seo/add_tittle',$this->data);
	
	}else {
		
	 $this->form_validation->set_rules('tittle_name', '<strong>Tittle Name</strong>', 'required');
     $this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
	if ($this->form_validation->run() == FALSE)
	{
	$this->data['error']=validation_errors();
	$this->load->view('admin/seo/add_tittle',$this->data);	
	}
	else
	{  
	$this->seo_model->insert_tittle($_POST);
    redirect("admin/seo/tittle","refresh");
	}
    }	
	}
	
	
	function view_tittle()
	{
	$id=$this->uri->segment(5);
	$this->data['query']=$this->seo_model->get_title($id);
    $this->load->view('admin/seo/view_tittle',$this->data);
	}
   
    function edit_tittle()
	{
	
	$id=$this->uri->segment(5);
	$this->data['res']=$this->seo_model->get_title($id);
    $this->load->library('form_validation');

    if(!$_POST) {	
    $this->load->view('admin/seo/edit_tittle',$this->data);
	}else{
	
	
    $this->form_validation->set_rules('tittle_name', '<strong>Tittle Name</strong>', 'required');
    $this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
	
	if ($this->form_validation->run() == FALSE)
	{
	$this->data['error']=validation_errors();
	$this->load->view('admin/seo/edit_tittle',$this->data);	
	}
	else
	{  	
	$this->seo_model->edit_tittle($_POST,$id);
    redirect("admin/seo/tittle","refresh");
	}
    }	
	}
   
	function delete_tittle()
	  {
	  $id=$this->uri->segment(5);
	  $this->seo_model->delete_tittle($id);
	  redirect('admin/seo/tittle');
	  }
	
	function logo()
	{
	$this->data['query']=$this->seo_model->get_logo();
    $this->load->view('admin/seo/logo',$this->data);
	}
	
	function add_logo()
	{
	$this->load->library('form_validation');
	if(!$_POST){
		
    $this->load->view('admin/seo/add_logo',$this->data);
	
	}else {
		
	//$this->form_validation->set_rules('file', '<strong>Logo</strong>', 'required');
    $this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
	
	if ($this->form_validation->run() == FALSE)
	{
	$this->data['error']=validation_errors();
	$this->load->view('admin/seo/add_logo',$this->data);	
	}
	else
	{  
		
		if($_FILES['file']['error']==0){ 
			$config['upload_path'] = 'public/images/';
			$config['allowed_types'] = 'gif|jpg|png|doc|pdf';
			$config['max_size'] = '1000000';
			$config['width'] = 75;
			$config['height'] = 50;
			$this->load->library('upload', $config);
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
			if ( ! $this->upload->do_upload('file')){
				$error1 = $this->upload->display_errors();
				$this->data['error'] = $error1; //print_r($error1); die;
			} else {
				$this->load->helper("file"); //$path='';
			   
			    $data = array('upload_data' => $this->upload->data());
			  
			    $file_name = $data['upload_data']['file_name'];  
			} 
		} else {
			$file_name = ''; 
		}
	$this->seo_model->insert_logo($_POST,$file_name);
    redirect("admin/seo/logo","refresh");
	}
    }	
	}
	
	
	function view_logo()
	{
	$id=$this->uri->segment(5);
	$this->data['query']=$this->seo_model->get_logos($id);
    $this->load->view('admin/seo/view_logo',$this->data);
	}
	
	function delete_logo()
	  {
	  $id=$this->uri->segment(5);
	  $this->seo_model->delete_logo($id);
	  redirect('admin/seo/logo');
	  }
	
	function edit_logo()
	{
	$id=$this->uri->segment(5);
	$this->data['query']=$this->seo_model->get_logos($id);
    $this->load->view('admin/seo/edit_logo',$this->data);
	
	if($_POST) {
	if($_FILES['file']['error']==0){ 
			$config['upload_path'] = 'public/images/';
			$config['allowed_types'] = 'gif|jpg|png|doc|pdf';
			$config['max_size'] = '1000000';
			$config['width'] = 75;
			$config['height'] = 50;
			$this->load->library('upload', $config);
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
			if ( ! $this->upload->do_upload('file')){
				$error1 = $this->upload->display_errors();
				$this->data['error'] = $error1; //print_r($error1); die;
			} else {
				$this->load->helper("file"); //$path='';
			   
			    $data = array('upload_data' => $this->upload->data());
			  
			    $file_name = $data['upload_data']['file_name'];  
			} 
		} else {
			$file_name = $_POST['file_hidden']; 
		}	
	$this->seo_model->edit_logo($_POST,$id,$file_name);
    redirect("admin/seo/logo","refresh");
	
    }	
	}
	
	
}