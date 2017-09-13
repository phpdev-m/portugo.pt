<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Cms extends CI_Controller {

	

	function __construct(){

  	parent::__construct();	

		 

		if(!$this->session->userdata('logged_in')){

			redirect('admin/login','refresh');

		}

		
	$this->load->library('fckeditor','form_validation');
		$this->load->model('admin/cms_model');
		$this->load->model('admin/member_model');

		//$this->load->model('user_model');

		$this->data['title'] = 'PortuGo Takeaway';

							

	}

	

	

			function index()

			{

			$this->data['cms']=$this->cms_model->get_all_cms();	

			$this->load->view('admin/cms/manage_cms',$this->data);		

			}

			

			public function add(){ 

			$this->load->helper(array('form'));

			 $this->load->library('form_validation');

			

			if(!$_POST){

			$this->load->view('admin/cms/add_cms',$this->data);		

			} else { 

			//print_r($_POST); die;

			$this->form_validation->set_rules('title', '<strong>Title</strong>', 'required');
			$this->form_validation->set_rules('desc', '<strong>Description</strong>', 'required');
            $this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();

			$this->load->view('admin/cms/add_cms',$this->data);	

			}

			else

			{

			$this->cms_model->insert_cms($_POST);

			redirect("admin/cms","refresh");

			}

			}

			}

			
        function view()
		{
		$id=$this->uri->segment(4);
		$this->data['cms_detail']=$this->cms_model->get_cms($id);
		$this->load->view('admin/cms/view_cms',$this->data);	
		}


			

			

				

					public function edit(){
					
					
					$id = $this->uri->segment(4);	//echo $id;
					
					$this->data['query']=$this->cms_model->get_cms($id);
					
					$this->load->helper(array('form'));
					
					$this->load->library('form_validation');
					
					if(!$_POST){
					
					$this->load->view('admin/cms/edit_cms',$this->data);
					
					} else { 
					
					$this->form_validation->set_rules('title', '<strong>Title</strong>', 'required');
					$this->form_validation->set_rules('desc', '<strong>Description</strong>', 'required');
					$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
					
					if ($this->form_validation->run() == FALSE)
					
					{
					
					$this->data['error']=validation_errors();
					
					$this->load->view('admin/cms/edit_cms',$this->data);	
					
					}
					
					else
					
					{
				//print_r($_POST); die;
					$this->cms_model->update_cms($_POST,$id);
					
					redirect("admin/cms","refresh");
					}
					}		
					}
					
					
					public function edit_portugoese(){
					$id = $this->uri->segment(4);
					
					
					$this->data['query']=$this->cms_model->get_cms($id);
					$this->load->helper(array('form'));
					$this->load->library('form_validation');
					if(!$_POST){
					$this->load->view('admin/cms/edit_cms',$this->data);
					} else { 
					//$this->form_validation->set_rules('title', '<strong>Title</strong>', 'required');
					//$this->form_validation->set_rules('descs', '<strong>Description</strong>', 'required');
					$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
					if ($this->form_validation->run() == FALSE)
					{
					$this->data['error']=validation_errors();
					$this->load->view('admin/cms/edit_cms',$this->data);
					}
					else
					{
					$this->cms_model->update_portugoese_cms($_POST,$id);
					redirect("admin/cms","refresh");
					}
					}		
					}
					
					

				
				function delete()
				{
				$id=$this->uri->segment(4);
				$this->cms_model->delete_cms($id);
				redirect('admin/cms','refresh');
				}
				



			

		

}