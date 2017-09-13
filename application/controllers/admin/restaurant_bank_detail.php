<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class restaurant_bank_detail extends CI_Controller {

	

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

	

	

			function bank_detail()

			{

			//$this->data['manage_cuisine']=$this->cuisine_model->get_all_cuisine();
			$id = $this->uri->segment(4);

			$this->load->view('admin/restaurant/add_restaurant_bank_detail',$this->data);		

			}
			
			
			
			public function add_bank_detail(){ 

			$this->load->helper(array('form'));

			 $this->load->library('form_validation');
			 $res_id = $this->uri->segment(4);
			 $own_id = $this->uri->segment(6);

			

			if(!$_POST){

			$this->load->view('admin/restaurant/add_restaurant_bank_detail',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			$this->form_validation->set_rules('bank_name', '<strong>Bank Name</strong>', 'required');			
            $this->form_validation->set_rules('ac_number', '<strong>Bank A/C No</strong>', 'required');
			$this->form_validation->set_rules('holder_name', '<strong>Account Holder Name</strong>', 'required');			
			$this->form_validation->set_rules('bank_address', '<strong>Bank Address</strong>', 'required');			
            $this->form_validation->set_rules('ifsc_code', '<strong>Bank IFSC Code</strong>', 'required');
			$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
			

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();

			$this->load->view('admin/restaurant/add_restaurant_bank_detail',$this->data);	

			}

			else

			{
				//print_r($_POST);die;

			$this->restaurant_model->insert_bank_detail($_POST,$res_id,$own_id);

			redirect("admin/restaurant","refresh");

			}

			}

			}
			
			
			
			
			public function edit_bank_detail(){
				
			$rid = $this->uri->segment(4);
			
			$restaurant_detail = $this->data['restaurant_detail']=$this->restaurant_model->get_restaurant_detail($rid);	 

			$this->load->helper(array('form'));
			 $this->load->library('form_validation');
			
			if(!$_POST){

			$this->load->view('admin/restaurant/edit_restaurant_bank_detail',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			$this->form_validation->set_rules('bank_name', '<strong>Bank Name</strong>', 'required');			
            $this->form_validation->set_rules('ac_number', '<strong>Bank A/C No</strong>', 'required');
			$this->form_validation->set_rules('holder_name', '<strong>Account Holder Name</strong>', 'required');			
			$this->form_validation->set_rules('bank_address', '<strong>Bank Address</strong>', 'required');			
            $this->form_validation->set_rules('ifsc_code', '<strong>Bank IFSC Code</strong>', 'required');
			$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
			

			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();

			$this->load->view('admin/restaurant/edit_restaurant_bank_detail',$this->data);	

			}

			else

			{
				//print_r($_POST);die;

			$this->restaurant_model->update_bank_detail($_POST,$rid);

			redirect("admin/restaurant/manage_restaurant","refresh");

			}

			}

			}
				

			
			public function edit_commission(){
				
			$rid = $this->uri->segment(4);
			$this->restaurant_model->update_commission($_POST,$rid);
            redirect("admin/restaurant/manage_restaurant","refresh");
			}

		

}