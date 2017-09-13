<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Faq extends CI_Controller {

	

	function __construct(){

  	parent::__construct();	

		 

		if(!$this->session->userdata('logged_in')){

			redirect('admin/login','refresh');

		}

		
	$this->load->library('fckeditor','form_validation');
		$this->load->model('admin/faq_model');
		$this->load->model('admin/member_model');
		$this->data['title'] = 'PortuGo Takeaway';

							

	}

	

	

			function index()

			{

			$this->data['faq']=$this->faq_model->get_all_faq();	

			$this->load->view('admin/faq/manage_faq',$this->data);		

			}

			

			public function add(){ 

			$this->load->helper(array('form'));

			 $this->load->library('form_validation');

			

			if(!$_POST){

			$this->load->view('admin/faq/add_faq',$this->data);		

			} else { 

			$this->form_validation->set_rules('category', '<strong>Category</strong>', 'required');
			$this->form_validation->set_rules('question', '<strong>Question</strong>', 'required');
            $this->form_validation->set_rules('answer', '<strong>Answer</strong>', 'required');
			$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();

			$this->load->view('admin/faq/add_faq',$this->data);	

			}

			else

			{

			$this->faq_model->insert_faq($_POST);

			redirect("admin/faq","refresh");

			}

			}

			}

			
        function view()
		{
		$id=$this->uri->segment(4);
		$this->data['faq_detail']=$this->faq_model->get_faq($id);
		$this->load->view('admin/faq/view_faq',$this->data);	
		}


	

					public function edit(){
					
					
					$id = $this->uri->segment(4);
					
					$this->data['query']=$this->faq_model->get_faq($id);
					
					$this->load->helper(array('form'));
					
					$this->load->library('form_validation');
					
					if(!$_POST){
					
					$this->load->view('admin/faq/edit_faq',$this->data);
					
					} else { 
					
					$this->form_validation->set_rules('category', '<strong>category</strong>', 'required');
					$this->form_validation->set_rules('question', '<strong>question</strong>', 'required');
					$this->form_validation->set_rules('answer', '<strong>answer</strong>', 'required');
					$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
					
					if ($this->form_validation->run() == FALSE)
					
					{
					
					$this->data['error']=validation_errors();
					
					$this->load->view('admin/faq/edit_faq',$this->data);	
					
					}
					
					else
					
					{
										
					$this->faq_model->update_faq($_POST,$id);
					
					redirect("admin/faq","refresh");
					}
					}		
					}
					
					
					public function edit_portugoese(){
					$id = $this->uri->segment(4);
					
					
					$this->data['query']=$this->faq_model->get_faq($id);
					$this->load->helper(array('form'));
					$this->load->library('form_validation');
					if(!$_POST){
					$this->load->view('admin/faq/edit_faq',$this->data);
					} else { 
					$this->form_validation->set_rules('category', '<strong>Category</strong>', 'required');
					$this->form_validation->set_rules('question', '<strong>Question</strong>', 'required');
					$this->form_validation->set_rules('answer', '<strong>Answer</strong>', 'required');
					$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
					if ($this->form_validation->run() == FALSE)
					{
					$this->data['error']=validation_errors();
					$this->load->view('admin/faq/edit_faq',$this->data);
					}
					else
					{
					$this->faq_model->update_portugoese_faq($_POST,$id);
					redirect("admin/faq","refresh");
					}
					}		
					}
					
					

		

}