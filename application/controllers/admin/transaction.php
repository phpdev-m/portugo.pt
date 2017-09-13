<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class transaction extends CI_Controller {

	

	function __construct(){

  	parent::__construct();	

		 

		if(!$this->session->userdata('logged_in')){

			redirect('admin/login','refresh');

		}

		
	   $this->load->library('fckeditor','form_validation');
		$this->load->model('admin/cms_model');
		$this->load->model('admin/help_model');
		$this->load->model('admin/member_model');
        $this->load->model('admin/transaction_model');
		//$this->load->model('user_model');

		$this->data['title'] = 'PortuGo Takeaway';

							

	}


			function index()

			{

			$this->data['transaction']=$this->transaction_model->get_all_transaction();	

			$this->load->view('admin/transaction/manage_transaction',$this->data);		

			}
			
        function view()
		{
		$id=$this->uri->segment(4);
		$this->data['transaction_detail']=$this->transaction_model->get_transaction($id);
		$this->load->view('admin/transaction/view_transaction',$this->data);	
		}

	

}