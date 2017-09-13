<?php
class member extends CI_Controller
{
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login','refresh');
		}
		
		$this->load->helpers('url');
		$this->load->model('admin/member_model');
		$this->load->model('admin/cms_model');
		$this->load->model('admin/login_model');
		
		$this->data['title'] = 'PortuGo Takeaway';			
	}
	
	function restaurant_owner()
	{
	if(isset($_POST['email']) && $_POST['email']!="")
	{
	$this->data['query']=$this->member_model->get_memberbyemail($_POST['email']);
	}
	else
	{
	$this->data['query']=$this->member_model->get_all_member();
	}
    $this->load->view('admin/member/manage_restaurant_owner',$this->data);
	}
	
	function get_state()
	{
	$state = $this->member_model->get_state($_POST['country_id']);
	foreach ($state as $key => $pks) {
		                          $city = $this->member_model->get_city($pks['id']);
									
									foreach ($city as $key => $pks1) {?>
									<option value='<?php echo $pks1['id'];?>' <?php if($pks1['id']==$this->input->post('city')){echo 'selected="selected"';}?> ><?php echo utf8_decode($pks1['countryname']);?></option>
									<?php
									}
									}
									
	}
	
	function add_restaurant_owner()
	{ 

        $this->load->library('form_validation');
	
	if(!$_POST){
					$this->load->view('admin/member/add_restaurant_owner',$this->data);
								
			} else { 
			//echo '<pre>';
					//print_r($_POST); die;	
						$this->form_validation->set_rules('first_name', '<strong>First Name</strong>', 'required');
						$this->form_validation->set_rules('last_name', '<strong>Last Name</strong>', 'required');
						$this->form_validation->set_rules('password', '<strong>password</strong>', 'required|min_length[6]');
						$this->form_validation->set_rules('email', '<strong>Email</strong>', 'required|valid_email|is_unique[restaurant_owner.email]');
						$this->form_validation->set_rules('phone', '<strong>Phone</strong>', 'required');						
						$this->form_validation->set_rules('restaurant_name', '<strong>Restaurant Name</strong>', 'required');
						$this->form_validation->set_rules('restaurant_phone', '<strong>Restaurant Phone</strong>', 'required');
						$this->form_validation->set_rules('restaurant_address', '<strong>Restaurant Address</strong>', 'required');						
						$this->form_validation->set_rules('country', '<strong>Country</strong>', 'required');
						$this->form_validation->set_rules('city', '<strong>City</strong>', 'required');						
						$this->form_validation->set_rules('zip_code', '<strong>Zip</strong>', 'required');
						$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
						
						if ($this->form_validation->run() == FALSE)
						{
						$this->data['error']=validation_errors();
						$this->load->view('admin/member/add_restaurant_owner',$this->data);	
						}
						else
						{
						
						
		$file_name='';	
		if($_FILES['file']['error']==0){ 
			$config['upload_path'] = './image_gallery/restaurant_owner';
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
		
						
								  
						$this->member_model->add_restaurant_owner($_POST,$file_name);
						$last_id = $this->db->insert_id();
						//echo $last_id;die;
						redirect("admin/restaurant/add_restaurant/".$last_id."","refresh");
						}
						}
						}		
		
		
						function edit_restaurant_owner()
						{
						$id=$this->uri->segment(5);
						$this->data['res']=$this->member_model->get_restaurant_owner($id);
						$this->load->library('form_validation');
						//$this->data['res'] = $this->member_model->edit_member($id);
						if(!$_POST){
						$this->load->view('admin/member/edit_restaurant_owner',$this->data);				
						} else { 
						$this->form_validation->set_rules('first_name', '<strong>First Name</strong>', 'required');
						$this->form_validation->set_rules('last_name', '<strong>Last Name</strong>', 'required');
						$this->form_validation->set_rules('password', '<strong>password</strong>', 'required|min_length[6]');
						$this->form_validation->set_rules('email', '<strong>Email</strong>', 'required|valid_email');
						$this->form_validation->set_rules('phone', '<strong>Phone</strong>', 'required');
						$this->form_validation->set_rules('status', '<strong>Status</strong>', 'required');
						$this->form_validation->set_rules('restaurant_name', '<strong>Restaurant Name</strong>', 'required');
						$this->form_validation->set_rules('country', '<strong>Country</strong>', 'required');
						$this->form_validation->set_rules('city', '<strong>City</strong>', 'required');
						$this->form_validation->set_rules('restaurant_address', '<strong>Restaurant Address</strong>', 'required');
						$this->form_validation->set_rules('restaurant_phone', '<strong>Restaurant Phone</strong>', 'required');
						$this->form_validation->set_rules('zip_code', '<strong>Zip</strong>', 'required');
						$this->form_validation->set_rules('restaurant_name', '<strong>Restaurant name</strong>', 'required');
						if ($this->form_validation->run() == FALSE)
						{
						$this->data['error']=validation_errors();
						$this->load->view('admin/member/edit_restaurant_owner',$this->data);	
						}
						else
						{
							
		$file_name='';	
		if($_FILES['file']['error']==0){ 
			$config['upload_path'] = './image_gallery/restaurant_owner';
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
			
    	}else {
			$file_name = $_POST['file_hidden']; 
		}
							
							
							
						
						$this->member_model->edit_restaurant_owner($_POST,$id,$file_name);
						redirect("admin/member/restaurant_owner","refresh");
						}
						}
						}
      
	  
	  function delete_restaurant_owner()
	  {
	  $id=$this->uri->segment(5);
	  $this->member_model->delete_restaurant_owner($id);
	  redirect('admin/member/restaurant_owner');
	  }
	  
	  
	 
	  
	  
	  
	 
      
	function view_restaurant_owner()
	{
	$id=$this->uri->segment(5);
	
	$this->data['query']=$this->member_model->get_restaurant_owner($id);
	//print_r($this->data['query']);die;
    $this->load->view('admin/member/view_restaurant_owner',$this->data);
	}

    function approved_mentor()
	{
	//echo '<pre>';
	//print_r($_POST); die;
	if(isset($_POST['remainder'])){$remainder = implode(',',$_POST['remainder']);} else{$remainder='';}
	$this->member_model->approved_mentor_update($_POST,$remainder);
	}
	
	
	
	function approved(){
	          $id=$this->uri->segment(5);
						$this->member_model->mentor_approved($id);
						redirect('admin/member/member_mentor','refresh');
	}

}