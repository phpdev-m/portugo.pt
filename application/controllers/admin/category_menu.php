<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Category_menu extends CI_Controller {

	

	function __construct(){

  	parent::__construct();	

		 

		if(!$this->session->userdata('logged_in')){

			redirect('admin/login','refresh');

		}

		
	$this->load->library('fckeditor','form_validation');
		$this->load->model('admin/category_model');
		$this->load->model('admin/restaurant_model');
		$this->load->model('admin/category_items_model');
		$this->load->model('admin/cuisine_model');
		
		$this->data['title'] = 'PortuGo Takeaway';

							

	}
	

	

			function manage_menu()

			{
			
			$rest_id = $this->uri->segment(4);
			
			if(!empty($rest_id)){
			$this->data['menu']=$this->category_items_model->get_restaurant_items($rest_id);	
			}else{
			$this->data['menu']=$this->category_items_model->get_all_items();	
			}

			$this->load->view('admin/menu/manage_menu',$this->data);		

			}

			

			public function add_menu(){ 

			$this->load->helper(array('form'));
			 $this->load->library('form_validation');
			 
			 $rest_id = $this->uri->segment(4);

			if(!$_POST){

			$this->load->view('admin/menu/add_menu',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;

			if(empty($rest_id)){
			$this->form_validation->set_rules('rest_id', '<strong>Restaurant Name</strong>', 'required');
			}else{ }
			$this->form_validation->set_rules('menu_name', '<strong>Menu Name</strong>', 'required');
			$this->form_validation->set_rules('category', '<strong>Category</strong>', 'required');
			$this->form_validation->set_rules('currency', '<strong>Currency Type</strong>', 'required');
			$this->form_validation->set_rules('price', '<strong>Menu Price</strong>', 'required');					
            
			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();

			$this->load->view('admin/menu/add_menu',$this->data);	

			}

			else

			{
				
				
		$file_name='';	
		if($_FILES['file']['error']==0){ 
			$config['upload_path'] = './category_gallery/menu_image';
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
								

			$this->category_items_model->insert_category_items($_POST,$file_name,$rest_id);
			$item_id = $this->db->insert_id();
						
			$extra_item=$_POST['exta_items'];
			//$type=$_POST['ctype'];
			$price=$_POST['pricee'];
			
			$i=0;
			foreach($extra_item as $datas){
			if($datas!=''){							
			$this->category_model->insert_extra_items($datas,$price[$i],$item_id,$rest_id);
			}
			$i++;}
			
			
			if(!empty($rest_id)){
				redirect("admin/category_menu/manage_menu/".$rest_id."","refresh");
			}else{
			redirect("admin/category_menu/manage_menu","refresh");
			}

			}

			}

			}
			
			
			
			public function edit_menu(){
				
			$item_id = $this->uri->segment(4);
			$rest_id = $this->uri->segment(6);

			$this->load->helper(array('form'));
			$this->load->library('form_validation');

			if(!$_POST){

			$this->load->view('admin/menu/edit_menu',$this->data);		

			} else { 
			//echo '<pre>';
			//print_r($_POST); die;
			
			$this->form_validation->set_rules('rest_id', '<strong>Restaurant Name</strong>', 'required');
			$this->form_validation->set_rules('menu_name', '<strong>Menu Name</strong>', 'required');
			$this->form_validation->set_rules('currency', '<strong>Currency Type</strong>', 'required');
			$this->form_validation->set_rules('category', '<strong>Category</strong>', 'required');
			$this->form_validation->set_rules('price', '<strong>Menu Price</strong>', 'required');					
            
			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();
			$this->load->view('admin/menu/edit_menu',$this->data);	

			}

			else
			{
				
			if($_FILES['file']['error']==0){ 
			$config['upload_path'] = './category_gallery/menu_image';
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

			$this->category_items_model->update_category_items($_POST,$item_id,$file_name1);
			
			$ext_items = $this->category_items_model->get_extra_items($item_id);
						
			$extra_item=$_POST['extra_items'];
			//$type=$_POST['ctype'];
			$price=$_POST['pricee'];
										
			$i=0;			
			foreach($ext_items as $data2){
			if($data2!=''){
			$this->restaurant_model->update_extra_items($extra_item[$i],$price[$i],$data2['id'],$rest_id);						
			}
			$i++;}
			
			$extra_item1=$_POST['extra_items1'];
			//$type1=$_POST['ctype1'];
			$price1=$_POST['pricee1'];
			
			$j=0;
			foreach($extra_item1 as $datas){						
			if($datas!=''){
			$this->category_model->insert_extra_items($datas,$price1[$j],$item_id,$rest_id);
			}
			$j++;}
			
						
			if(!empty($rest_id)){
				redirect("admin/category_menu/manage_menu/".$rest_id."","refresh");
				}else{
			redirect("admin/category_menu/manage_menu","refresh");
				}

			}

			}

			}
			
			
			
				
				function delete_menu()
				{
				$id=$this->uri->segment(5);
				$rid=$this->uri->segment(6);
				//echo $rid; die;
				$this->category_items_model->delete_item($id);
				if(!empty($rid)){
					redirect('admin/category_menu/manage_menu/'.$rid,'refresh');
					}else{
				redirect('admin/category_menu/manage_menu','refresh');
					}
				}
				
				
	
	
	function delete_extra_menu()
				{
				
				$item_id = $this->uri->segment(4);
			    $rest_id = $this->uri->segment(6);
			    $ext_id = $this->uri->segment(7);
			
				$this->category_model->delete_ext_menu($ext_id);				
				
				redirect('admin/category_menu/edit_menu/'.$item_id.'/id/'.$rest_id,'refresh');
				
				
				}
				
				
				
				function view()
				{
				$item_id = $this->uri->segment(5);
				$this->data['query']=$this->category_items_model->get_item($item_id);
				$this->load->view('admin/menu/view_menu',$this->data);	
				}
				
				
				
	public function check_list_cuisine()
	{
	$rest_id = $_POST['rest_id'];	
	
	echo '<option value="">-- Select --</option>';	
	$rest_cuisine = $this->category_items_model->get_rest_cuisine($rest_id);	
	$cuisine = explode(',', $rest_cuisine['cuisine_types']);
									
	foreach($cuisine as $cname){										
	$all_cuisine = $this->cuisine_model->get_cuisine($cname);
	echo '<option value="'.$all_cuisine['id'].'">'.$all_cuisine['cuisine_name'].'</option>';
	 }
	}
		

		

}