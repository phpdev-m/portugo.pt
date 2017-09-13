<?php 
ob_start();

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class language extends CI_Controller {
	
	function __construct(){
  	 parent::__construct();
		 
		 $this->load->helper('url');
		// $this->load->model('admin/center_model','',TRUE);
		 $this->load->model('admin/language_model','',TRUE);	
		 	 //$this->load->model('admin/languagephrase_model','',TRUE);	
		 
		 if(!$this->session->userdata('logged_in')){
			redirect(base_url().'admin/login','refresh');
		}
		
	
		 $this->data['title'] = 'PortuGo Takeaway';	 
		  
  }
	
	public function index()
	{ 
	$this->data['language']=$this->language_model->get_all_language();
	$this->load->view('admin/language/manage_language',$this->data);
	}
	
	function add()
	{

	if(!$_POST)
	{
	$this->load->view('admin/language/add_language',$this->data);
	}
	else
	{
	$last_id=$this->language_model->insert_language($_POST);
	//print_r($_POST);die;
	$handle1 = fopen(APPPATH.'language/english/english_lang.php','r');
	//echo APPPATH.'language/english/english_lang.php'; die;
		if($_POST['lang_code']!='en')
						{
							$my_file = $_POST['lang_code'].'.php';
							//$handle2 = fopen(APPPATH.'my_langs/'.$my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
							
							$handle2 = fopen(APPPATH.'language/'.$my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
						
							while( !feof($handle1) )
							{
								$contents = fgets($handle1);
								fwrite($handle2, $contents);
							}
							fclose($handle2);
						}						
						fclose($handle1);	
	$this->session->set_flashdata('message', 'success');
	redirect(base_url().'admin/language');
	}
	}
	
	function edit()
	{
	$lang_id=$this->uri->segment(4);
	$this->data['lang_detail']=$this->language_model->get_language_detail($lang_id);
	
	if(!$_POST)
	{
	$this->load->view('admin/language/edit_language',$this->data);
	}
	else
	{
    $this->language_model->edit_language($_POST,$lang_id);
	if($_POST['lang_code']!=$_POST['old_lang_code'])
					{
						rename(APPPATH.'my_langs/'.$_POST['old_lang_code'].'.php', APPPATH.'my_langs/'.$_POST['lang_code'].'.php');
					}
	redirect(base_url().'admin/language');
	}
	
	}
	
	
	function delete()
	{	
		$id = $this->uri->segment(4);
		$l_code = $this->uri->segment(5);

		if($l_code!='en'){
			
			$this->language_model->delete_language($id);		
			@unlink(APPPATH.'my_langs/'.$l_code.'.php');
		}

		redirect(base_url().'admin/language');		
	}
	
	
	
	function view()
	{
	
	   $l_code = $this->uri->segment(4);
	   //echo $l_code;die;
	   
	   if($l_code=='Ch'){
		   
		$id = $this->uri->segment(5); //echo $id;die;
		$data1=$this->data['res'] = $this->language_model->get_language_detail($id);
				
		if(!$_POST)
		{
	     //$this->data['file'] = fopen(APPPATH.'language/english/'.$l_code.'.php','r') or die('Unable to open file!');		 
		 $this->data['file'] = fopen(APPPATH.'language/chinese/chinese_lang.php','r') or die('Unable to open file!');		 
		
		$this->load->view('admin/language/view_language',$this->data);
		}
		elseif($_POST)
		{
			
			//$handle2 = fopen(APPPATH.'language/english/'.$l_code.'.php','w') or die('Cannot open file: ');			
			$handle2 = fopen(APPPATH.'language/chinese/chinese_lang.php','w') or die('Cannot open file: ');

			fseek($handle2, 0);		
			fwrite($handle2, $_POST['content']);		
			fclose($handle2);

			$this->data['success']='Update Successfull';
			
			//$this->data['file'] = fopen(APPPATH.'language/english/'.$l_code.'.php','r') or die('Unable to open file!');			
			$this->data['file'] = fopen(APPPATH.'language/chinese/chinese_lang.php','r') or die('Unable to open file!');
			
			$this->load->view('admin/language/view_language',$this->data);		
		}
				
		   
	   }else if($l_code=='En'){	   
  
	   	   
		$id = $this->uri->segment(5); //echo $id;die;
		$data1=$this->data['res'] = $this->language_model->get_language_detail($id);
				
		if(!$_POST)
		{
	     //$this->data['file'] = fopen(APPPATH.'language/english/'.$l_code.'.php','r') or die('Unable to open file!');		 
		 $this->data['file'] = fopen(APPPATH.'language/english/english_lang.php','r') or die('Unable to open file!');		 
		
		$this->load->view('admin/language/view_language',$this->data);
		}
		elseif($_POST)
		{
			
			//$handle2 = fopen(APPPATH.'language/english/'.$l_code.'.php','w') or die('Cannot open file: ');			
			$handle2 = fopen(APPPATH.'language/english/english_lang.php','w') or die('Cannot open file: ');

			fseek($handle2, 0);		
			fwrite($handle2, $_POST['content']);		
			fclose($handle2);

			$this->data['success']='Update Successfull';
			
			//$this->data['file'] = fopen(APPPATH.'language/english/'.$l_code.'.php','r') or die('Unable to open file!');			
			$this->data['file'] = fopen(APPPATH.'language/english/english_lang.php','r') or die('Unable to open file!');
			
			$this->load->view('admin/language/view_language',$this->data);		
		}	
		
	}else{	   
  
	   	   
		$id = $this->uri->segment(5); //echo $id;die;
		$data1=$this->data['res'] = $this->language_model->get_language_detail($id);
				
		if(!$_POST)
		{
	     //$this->data['file'] = fopen(APPPATH.'language/english/'.$l_code.'.php','r') or die('Unable to open file!');		 
		 $this->data['file'] = fopen(APPPATH.'language/korean/korean_lang.php','r') or die('Unable to open file!');		 
		
		$this->load->view('admin/language/view_language',$this->data);
		}
		elseif($_POST)
		{
			
			//$handle2 = fopen(APPPATH.'language/english/'.$l_code.'.php','w') or die('Cannot open file: ');			
			$handle2 = fopen(APPPATH.'language/korean/korean_lang.php','w') or die('Cannot open file: ');

			fseek($handle2, 0);		
			fwrite($handle2, $_POST['content']);		
			fclose($handle2);

			$this->data['success']='Update Successfull';
			
			//$this->data['file'] = fopen(APPPATH.'language/english/'.$l_code.'.php','r') or die('Unable to open file!');			
			$this->data['file'] = fopen(APPPATH.'language/korean/korean_lang.php','r') or die('Unable to open file!');
			
			$this->load->view('admin/language/view_language',$this->data);		
		}	
		
	}
	
	}
		
	
	
		
}

