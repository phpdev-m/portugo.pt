<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Category_menu extends CI_Controller {

	

	function __construct(){

  	parent::__construct();	

		 

		if(!$this->session->userdata('restaurant_logged_in')){

			redirect('restaurant/login','refresh');

		}

		
	$this->load->library('fckeditor','form_validation');
		$this->load->model('restaurant/category_model');
		$this->load->model('restaurant/restaurant_model');
		$this->load->model('restaurant/category_items_model');
		$this->load->model('restaurant/cuisine_model');		
		
		$this->data['title'] = 'PortuGo Takeaway';

							

	}
	

	

			function manage_menu()

			{
			
			$session_data=$this->session->userdata('restaurant_logged_in');
            $rest_id = $session_data['id'];
						
			$this->data['menu']=$this->category_items_model->get_restaurant_items($rest_id);
			$this->load->view('restaurant/menu/manage_menu',$this->data);		

			}

			

			public function add_menu(){ 

			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			 
			$session_data=$this->session->userdata('restaurant_logged_in');
            $rest_id = $session_data['id'];
			

			if(!$_POST){

			$this->load->view('restaurant/menu/add_menu',$this->data);		

			} else { 
			//echo '<pre>';
			
			if(empty($rest_id)){
			$this->form_validation->set_rules('rest_id', '<strong>Restaurant Name</strong>', 'required');
			}else{ }
			$this->form_validation->set_rules('menu_name', '<strong>Menu Name</strong>', 'required');
			$this->form_validation->set_rules('category', '<strong>Category</strong>', 'required');			
			$this->form_validation->set_rules('price', '<strong>Menu Price</strong>', 'required');					
            
			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();

			$this->load->view('restaurant/menu/add_menu',$this->data);	

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
			   $file_name = $data['upload_data']['file_name']; 
			}
    	}
								

			$this->category_items_model->insert_category_items($_POST,$file_name,$rest_id);
			$item_id = $this->db->insert_id();
						
			$extra_item=$_POST['exta_items'];			
			$price=$_POST['pricee'];
			
			$i=0;
			foreach($extra_item as $datas){
			if($datas!=''){							
			$this->category_model->insert_extra_items($datas,$price[$i],$item_id,$rest_id);
			}
			$i++;}
									
			redirect("restaurant/category_menu/manage_menu","refresh");
			
			}

			}

			}
			
			
			
			public function edit_menu(){
				
			$item_id = $this->uri->segment(4);
			$session_data=$this->session->userdata('restaurant_logged_in');
            $rest_id = $session_data['id'];

			$this->load->helper(array('form'));
			$this->load->library('form_validation');

			if(!$_POST){

			$this->load->view('restaurant/menu/edit_menu',$this->data);		

			} else { 
			//echo '<pre>';			
						
			$this->form_validation->set_rules('menu_name', '<strong>Menu Name</strong>', 'required');			
			$this->form_validation->set_rules('category', '<strong>Category</strong>', 'required');
			$this->form_validation->set_rules('price', '<strong>Menu Price</strong>', 'required');					
            
			if ($this->form_validation->run() == FALSE)

			{

			$this->data['error']=validation_errors();
			$this->load->view('restaurant/menu/edit_menu',$this->data);	

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
			   $file_name1 = $data['upload_data']['file_name']; 
			}
    	}else{ $file_name1 = $_POST['file_hidden'];
			
		}

			$this->category_items_model->update_category_items($_POST,$item_id,$file_name1,$rest_id);
			
			$ext_items = $this->category_items_model->get_extra_items($item_id);
						
			$extra_item=$_POST['extra_items'];			
			$price=$_POST['pricee'];
										
			$i=0;			
			foreach($ext_items as $data2){
			if($data2!=''){
			$this->restaurant_model->update_extra_items($extra_item[$i],$price[$i],$data2['id'],$rest_id);						
			}
			$i++;}
			
			$extra_item1=$_POST['extra_items1'];			
			$price1=$_POST['pricee1'];
			
			$j=0;
			foreach($extra_item1 as $datas){						
			if($datas!=''){
			$this->category_model->insert_extra_items($datas,$price1[$j],$item_id,$rest_id);
			}
			$j++;}
			
			redirect("restaurant/category_menu/manage_menu","refresh");
			
			}

			}

			}
			
			
			
			function view()
				{
				$item_id = $this->uri->segment(5);
				$this->data['query']=$this->category_items_model->get_item($item_id);
				$this->load->view('restaurant/menu/view_menu',$this->data);	
				}
				
				
				
				
				function delete_menu()
				{
				$id=$this->uri->segment(4);								
				$this->category_items_model->delete_item($id);				
				redirect('restaurant/category_menu/manage_menu','refresh');
					
				}
				
				
	
	
	function delete_extra_menu()
				{
				
				$item_id = $this->uri->segment(4);
			    $rest_id = $this->uri->segment(6);
			    $ext_id = $this->uri->segment(7);
			
				$this->category_model->delete_ext_menu($ext_id);				
				
				redirect('restaurant/category_menu/edit_menu/'.$item_id.'/id/'.$rest_id,'refresh');
				
				
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
	
	
	
	function addons()
				{
				$item_id = $this->uri->segment(4);
				$this->data['ext_items']=$this->category_items_model->get_extra_items($item_id);				
				$this->load->view('restaurant/menu/addons',$this->data);	
				}
				
				
				
				
  function update()
			{
			$session_data=$this->session->userdata('restaurant_logged_in');
            $rest_id = $session_data['id'];
			$menu_id=$this->uri->segment(4);
			$menu_detail=$this->category_items_model->get_menu_detail($menu_id);			
			$addon_name=$_POST['addons_name'];
			$edit_id=$_POST['edit_id'];			
			$price=$_POST['price'];			
			$count=count($_POST['addons_name']);
			for($i=0;$i<$count;$i++)
			{
			if($edit_id[$i]!='')
			{
			if($addon_name[$i]!==''){$this->category_items_model->update_addons($addon_name[$i],$price[$i],$edit_id[$i],$menu_id);}
			}
			else
			{
			if($addon_name[$i]!==''){$this->category_items_model->insert_addons($addon_name[$i],$price[$i],$menu_id,$rest_id);}
			}
			}
			$this->session->set_flashdata('success_message', 'Record  has  been updated successfully.');
			redirect('restaurant/category_menu/addons/'.$menu_id);
			}
			
			
			
			function delete()
			{
			$addon_id=$this->uri->segment(4);
			$menu_id=$this->uri->segment(5);
			$this->category_items_model->delete_addons($addon_id);
			$this->session->set_flashdata('error_message', 'Record  has  been deleted successfully.');
			redirect('restaurant/category_menu/addons/'.$menu_id);
			}
			
				
		

		

}