<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class restaurant_bank_detail extends CI_Controller {

	

	function __construct(){

  	parent::__construct();	

		 

		if(!$this->session->userdata('restaurant_logged_in')){

			redirect('restaurant/login','refresh');

		}

		
	    $this->load->library('fckeditor','form_validation');		
		$this->load->model('restaurant/cuisine_model');
		$this->load->model('restaurant/restaurant_model');
		
		$this->data['title'] = 'PortuGo Takeaway';

		}

	     function payment()
	     { 
		 $session_id=$this->session->userdata('restaurant_logged_in');
         $rid=$session_id['id'];	
			
		 $this->data['bank_detail'] = $this->restaurant_model->get_bank_detail($rid);
		 if(!$_POST){
	     $this->data['payment_info']=$this->restaurant_model->getall_payment_option();
		 $this->load->view('restaurant/restaurant/payment_info',$this->data);
		 }else { 
		 $this->restaurant_model->update_payment_info($_POST,$rid);
	     redirect("restaurant/restaurant_bank_detail/payment",refresh);
	     }
		 }
		 
		 
			public function edit_bank_detail(){
			$session_id=$this->session->userdata('restaurant_logged_in');
            $rid=$session_id['id'];	
			
			$this->data['bank_detail'] = $this->restaurant_model->get_bank_detail($rid);
	        
			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			if(!$_POST){
				 //print_r($this->data['bank_detail']);die;
			$this->load->view('restaurant/restaurant/bank_info',$this->data);		

			} else { 
		    $this->form_validation->set_rules('bank_name', '<strong>Bank Name</strong>', 'required');			
            $this->form_validation->set_rules('ac_number', '<strong>Bank A/C No</strong>', 'required');
			$this->form_validation->set_rules('holder_name', '<strong>Account Holder Name</strong>', 'required');			
			$this->form_validation->set_rules('bank_address', '<strong>Bank Address</strong>', 'required');			
            $this->form_validation->set_rules('ifsc_code', '<strong>Bank IFSC Code</strong>', 'required');
			$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
			
            if ($this->form_validation->run() == FALSE)
            {
            $this->data['error']=validation_errors();
            $this->load->view('restaurant/restaurant/bank_info',$this->data);	
            }else{
		    $this->restaurant_model->update_bank_detail($_POST,$rid);
            redirect("restaurant/restaurant_bank_detail/edit_bank_detail",refresh);
            }
            }

			}
			
}