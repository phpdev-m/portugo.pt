<?php
class Settings extends CI_Controller
{
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login','refresh');
		}
		
		$this->load->helper('url');
		$this->load->model('admin/setting_model');
		$this->data['title'] = 'PortuGo Takeaway';			
	}
	
	function account(){
		$this->load->library('form_validation');
		$this->data['veryfy']=1;
		$this->data['error']='';
		$this->data['success']='';
		
	
		
		if(!$_POST){		
			$this->load->view('admin/settings/change_account',$this->data);
		} else {
			if($_POST['veryfy']==1){
				if($this->setting_model->verfy_password($_POST['password'])==FALSE)
				{
					$this->data['error']="You don't have permission to change email";
					$this->load->view('admin/settings/change_account',$this->data);					
				}   else 
				    {
					$this->data['veryfy']=2;
					$this->load->view('admin/settings/change_account',$this->data);
				    }
				
			}
			    elseif($_POST['veryfy']==2)
				{
				
				$this->form_validation->set_rules('email', '<strong>Email</strong>', 'required');
						$this->form_validation->set_rules('username', '<strong>Username</strong>', 'required');
						if ($this->form_validation->run() == FALSE)
						{
						$this->data['error']=validation_errors();
						$this->load->view('admin/settings/change_account',$this->data);	
						}
				
				else{
				$this->setting_model->updae_email();
				$this->data['success']='Your Email And Username Successfully Updated.';
				$this->load->view('admin/settings/change_account',$this->data);				  
				   }
			  }
		}					
	}
	
	
	
	function change_password(){
	    $this->load->library('form_validation');
		$admin_arr = $this->session->userdata('logged_in');
		
		if($admin_arr['username']=='admin'){
			$this->data['error']='';
			$this->data['success']='';
		
			if(!$_POST){
					$this->load->view('admin/settings/change_password',$this->data);				
			} else { 
						$this->form_validation->set_rules('oldpass', '<strong>Old Password</strong>', 'required');
						$this->form_validation->set_rules('newpass', '<strong>New Password</strong>', 'required');
						if ($this->form_validation->run() == FALSE)
						{
						$this->data['error']=validation_errors();
						$this->load->view('admin/settings/change_password',$this->data);	
						}else{
			         
							if($this->setting_model->verfy_password($_POST['oldpass'])==FALSE){
								$this->data['error'] = 'Incorrect Password Entered!';
								
							} elseif($_POST['newpass']!=$_POST['cpass']) {
								$this->data['error'] = 'Password Entered Mismatched!';
								
							} else{
								$this->setting_model->update_password($_POST['newpass']);
								$this->data['success']='Password Update successfull.';
								
							}
						
							$this->load->view('admin/settings/change_password',$this->data);	
						}
			}
		} else {
			redirect("admin/login","refresh");
		}
	}
	
	
				
				
	
	function profile_pricture()
	{
	$admin_arr = $this->session->userdata('logged_in');
	$this->data['admin']=$this->setting_model->get_admin_info($admin_arr['id']);
	
	if(!$_POST){

			$this->load->view('admin/settings/profile_picture',$this->data);		

			} else { 
			
			if($_FILES['file']['error']==0){ 
			$config['upload_path'] = 'public/admin/admin_image';
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
			   $file_name1 = $data['upload_data']['file_name']; 
			}
    	}else{ $file_name1 = $_POST['file_hidden'];
			
		}

			$this->setting_model->update_profile_image($admin_arr['id'],$file_name1);
			
			redirect("admin/settings/profile_pricture","refresh");
			
			}
	
	}
	
	
	function payment()
	{ 
	$this->data['payment']=$this->setting_model->getall_payment_option();
	$this->load->view('admin/settings/payment_info',$this->data);
	}


  function reset_orders()
        { 
        $this->setting_model->reset_orders();
         redirect("admin/dashboard","refresh");
        }


}
