<?php
class Settings extends CI_Controller
{
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('restaurant_logged_in')){
			redirect('restaurant/login','refresh');
		}
		
		$this->load->helper('url');
		$this->load->model('restaurant/setting_model');
		$this->load->model('restaurant/cuisine_model');
		
		$this->data['title'] = 'PortuGo Takeaway';			
	}
	
	function change_password(){
	    $this->load->library('form_validation');
		$admin_arr = $this->session->userdata('restaurant_logged_in');
		$rest_id=$admin_arr['id'];
		if($admin_arr['contact_name']==$admin_arr['contact_name']){
			$this->data['error']='';
			$this->data['success']='';
		
			if(!$_POST){
					$this->load->view('restaurant/settings/change_password',$this->data);				
			} else { 
						$this->form_validation->set_rules('oldpass', '<strong>Old Password</strong>', 'required');
						$this->form_validation->set_rules('newpass', '<strong>New Password</strong>', 'required');
						if ($this->form_validation->run() == FALSE)
						{
						$this->data['error']=validation_errors();
						$this->load->view('restaurant/settings/change_password',$this->data);	
						}else{
			                  
							if($this->setting_model->verfy_password($_POST['oldpass'],$rest_id)==FALSE){
								$this->data['error'] = 'Incorrect Password Entered!';
								
							} elseif($_POST['newpass']!=$_POST['cpass']) {
								$this->data['error'] = 'Password Entered Mismatched!';
								
							} else{
								$this->setting_model->update_password($_POST['newpass'],$rest_id);
								$this->data['success']='Password Update successfull.';
								
							}
						
							$this->load->view('restaurant/settings/change_password',$this->data);	
						}
			}
		} else {
			redirect("restaurant/login","refresh");
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
	
	//tela inicial para cadastro de cep
	function delivery_postcode()
	{

	$restaurent = $this->session->userdata('restaurant_logged_in');
		$rest_id=$restaurent['id'];
	
	
	$this->data['postcode']=$this->setting_model->get_all_postcode($rest_id);
	$this->load->view('restaurant/settings/manage_delivery_postcode',$this->data);

//echo '<script type="text/javascript"> alert("'. "tela para chamar adicionar novo" . '")</script>';
	}
	




	public function add_postcode()
                        { 
	
                  	$this->load->helper(array('form'));
         		$this->load->library('form_validation');
			
			$session_data=$this->session->userdata('restaurant_logged_in');		    
                       $rest_id=$session_data['id'];


			if(!$_POST)
                        {
			$this->load->view('restaurant/settings/add_postcode',$this->data);		
			} 
                        else 
                        {

			$postcode=$_POST['postcode'];

//echo '<script type="text/javascript"> alert("'. $postcode[0] . '")</script>';


		
			$count=count($_POST['postcode']);
			for($i=0;$i<$count;$i++)
			{			
			if($postcode[$i]!=='')
			{
                         $searchcode = str_replace("-","", $postcode[$i]);
//                         echo '<script type="text/javascript"> alert("'. $searchcode . '")</script>';
			$this->setting_model->insert_postcode($postcode[$i],$searchcode,$rest_id);
			}
			}
			$this->session->set_flashdata('message', 'Record  has  been added.');						
			redirect("restaurant/settings/delivery_postcode","refresh");
			}




			}


//chama models setting_model - funcao insert_postcode_mult e executa comando em mysql
 public function add_postcode_multi()
                        { 

//echo '<script type="text/javascript"> alert("'. "Exec em settings funcao add_postcode e chama funcao em model para carregar DB" . '")</script>';

                        $this->load->helper(array('form'));
                        $this->load->library('form_validation');
                        
                        $session_data=$this->session->userdata('restaurant_logged_in');             
                       $rest_id=$session_data['id'];


                        if(!$_POST)
                        {
                        $this->load->view('restaurant/settings/add_postcode_multi',$this->data);              
                        } 
                        else 
                        {

                          $postcode=$_POST['code'];
                          $start  =$_POST['start'];
                          $finish  =$_POST['finish'];


//echo '<script type="text/javascript"> alert("'. $finish .$finish. '")</script>';


                        $count=$finish - $start;

//echo '<script type="text/javascript"> alert("'. $count. '")</script>';

                        for($i=0;$i<$count+1;$i++)
                        {


    			$code =  $postcode  . '-' . $start;
                        $searchcode = $postcode  . $start;
 //echo '<script type="text/javascript"> alert("'. $searchcode. '")</script>';
                        $this->setting_model->insert_postcode_multi($code,$searchcode,$rest_id);

			$start = $start + 1;


if (strlen($start)==1)
{
$start =  '00'. $start;
}


if (strlen($start)==2)
{
$start =  '0'. $start;
}




                        }
//echo '<script type="text/javascript"> alert("'. $code. '")</script>';
                        $this->session->set_flashdata('message', 'Record  has  been added.');                                           
                        redirect("restaurant/settings/delivery_postcode","refresh");
                        }




                        }





}
