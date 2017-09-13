<?php
class coupon extends CI_Controller
{
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login','refresh');
		}
		
		$this->load->helpers('url');
		$this->load->model('admin/coupon_model');
		$this->load->model('admin/login_model');
		
		$this->data['title'] = 'PortuGo Takeaway';			
	}
	
	function manage_coupon()
	{
	  
	  $id=$this->uri->segment(4);	  	  
	  $this->coupon_model->delete_coupon_id($id);
	
	  $this->data['all_coupons']=$this->coupon_model->get_coupons();	    	  
	  $this->load->view('admin/coupon/manage_coupon',$this->data);
	
	}
	
		
	function add_coupon()
	{ 

        $this->load->library('form_validation');
		
		$this->data['restaurant']=$this->coupon_model->getall_restaurant();
		
	if(!$_POST){
	
             $this->load->view('admin/coupon/add_coupon',$this->data);
								
			} 
			
			else {
			
			            $this->form_validation->set_rules('start_date', '<strong>Starting Date</strong>', 'required');
						$this->form_validation->set_rules('end_date', '<strong>Ending Date</strong>', 'required');
						$this->form_validation->set_rules('ctype', '<strong>Coupon Type</strong>', 'required');
						$this->form_validation->set_rules('price', '<strong>Price</strong>', 'required');
						$this->form_validation->set_rules('code', '<strong>Coupon Code</strong>', 'required');
						$this->form_validation->set_rules('applic', '<strong>Coupon Applicable To</strong>', 'required');
						
					if ($this->form_validation->run() == FALSE)
						{
						$this->data['error']=validation_errors();
						$this->load->view('admin/coupon/add_coupon',$this->data);	
						} else{

                 $this->coupon_model->add_coupon($_POST);				 
				 redirect('admin/coupon/manage_coupon','refresh');				 
				}
				}
			}
			
		
			
	 function edit_coupon()
	 {
	  $this->load->library('form_validation');
	  $id=$this->uri->segment(4);
	  $this->data['res']=$this->coupon_model->edit_coupon($id);
	  //print_r($this->data['res']);
	  $this->data['restaurant']=$this->coupon_model->getall_restaurant();	 
	 //print_r($this->data['restaurant']);die;
	  if(!$_POST){	  
	   
	   $this->load->view('admin/coupon/edit_coupon',$this->data);
		
	  }
	  else{
	  
			$this->form_validation->set_rules('start_date', '<strong>Starting Date</strong>', 'required');
			$this->form_validation->set_rules('end_date', '<strong>Ending Date</strong>', 'required');
			$this->form_validation->set_rules('ctype', '<strong>Coupon Type</strong>', 'required');
			$this->form_validation->set_rules('price', '<strong>Price</strong>', 'required');
			$this->form_validation->set_rules('code', '<strong>Coupon Code</strong>', 'required');
			$this->form_validation->set_rules('applic', '<strong>Coupon Applicable To</strong>', 'required');
			if ($this->form_validation->run() == FALSE)
						{
						$this->data['error']=validation_errors();
						$this->load->view('admin/coupon/edit_coupon',$this->data);	
						} else{
	  
	  $this->coupon_model->update_coupon($_POST);
	  redirect('admin/coupon/manage_coupon','refresh');
	  
	  } 	  
	 
	  }
	
 
	 }		
			
			
	
						
		
}

	
	

	