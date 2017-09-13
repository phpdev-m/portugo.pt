<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telephone_directory extends CI_Controller {





function __construct(){		
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model(array('cms_model','faqs_model','telephone_directory_model'));
		 $this->load->library("pagination");	
	}


function index()
{
$this->load->view('telephone_directory/telephone_directory_view');
}



//======================================= yellow pages===================================//


function yellow_pages()
{
$this->data['category']=$this->telephone_directory_model->get_all_category();
$this->data['providence']=$this->telephone_directory_model->get_all_providence();
//print_r($this->data['providence']); die;
$this->load->view('telephone_directory/yellow_pages_view',$this->data);
}




function search()
{
if(!empty($_GET))
{
//print_r($_GET); die;
$this->data['record']=$this->telephone_directory_model->fetch_record($_GET);
$this->data['count']=$this->telephone_directory_model->fetch_num_record($_GET);
//print_r($this->data['record']); die;
$this->load->view('telephone_directory/yellow_pages_result_view',$this->data);

}

}






function search_yellow_record()
						{
					$data['letter']=@$_GET['letter']; 
					$data['island']=@$_GET['island'];
					if (count($_GET) > 0) {$config['suffix'] = '?' . http_build_query($_GET, '', "&");} 
					$config["base_url"] = base_url() . "telephone_directory/search_yellow_record";
					$config["total_rows"] = $this->telephone_directory_model->yellow_category_count($data);
					$config["per_page"] = 10;
					$config["uri_segment"] = 3;
					$this->pagination->initialize($config);
					
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					
					$this->data['category']=$this->telephone_directory_model->get_category_list($config["per_page"], $page,$data);
					$this->data["links"] = $this->pagination->create_links();
					
					
					
					$this->load->view('telephone_directory/yellow_pages_list',$this->data);
						
						}





function yellow_page_details()
{

if(!empty($_GET))
{
//print_r($_GET); die;
$this->data['record']=$this->telephone_directory_model->fetch_yellow_record($_GET['category']);
$this->data['count']=$this->telephone_directory_model->fetch_yellow_num_record($_GET['category']);
//print_r($this->data['record']); die;
$this->load->view('telephone_directory/yellow_pages_result_view',$this->data);

}
}




						

//=================================search government pages by letter=========================//


function government_pages()
{
$this->data['ministry_name']=$this->telephone_directory_model->get_all_ministry_name();
$this->load->view('telephone_directory/government_pages_view',$this->data);

}









function search_government_pages()
{

    //$this->data['ministry_name']=$this->telephone_directory_model->get_all_ministry_name();
	$data['letter']=@$_GET['letter'];
	if (count($_GET) > 0) {$config['suffix'] = '?' . http_build_query($_GET, '', "&");} 
	$config["base_url"] = base_url() . "telephone_directory/search_government_pages";
        $config["total_rows"] = $this->telephone_directory_model->government_ministry_count($data);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
		
		
		
		$config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
$config['full_tag_close'] = '</ul>';
$config['prev_link'] = '&lt;';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['next_link'] = '&gt;';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="current"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
 
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';
 
$config['first_link'] = '&lt;&lt;';
$config['last_link'] = '&gt;&gt;';
		
		
		  $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	
	$this->data['ministry_name']=$this->telephone_directory_model->get_ministry_name($config["per_page"], $page,$data);
	$this->data["links"] = $this->pagination->create_links();
	
	
	
	$this->load->view('telephone_directory/government_pages_list',$this->data);

}



function search_result()
						{
						$this->data['ministry_name']=$this->telephone_directory_model->get_all_ministry_name();
						if(!empty($_GET['ministry']))
						{
						//echo  $_GET['ministry'];
						$this->data['record']=$this->telephone_directory_model->fetch_record_government($_GET['ministry']);
						//print_r($this->data['record']); die;
						$this->data['count']=$this->telephone_directory_model->fetch_num_record__government($_GET['ministry']);
						$this->load->view('telephone_directory/government_pages_result_view',$this->data);
						
						}
						
						else
						{
						
						$this->load->view('telephone_directory/government_pages_view',$this->data);
						}
						
						}
















function search_government_record()
						{
						$this->data['ministry_name']=$this->telephone_directory_model->get_all_ministry_name();
						if(!empty($_GET['ministry']))
						{
						//echo  $_GET['ministry'];
						$this->data['record']=$this->telephone_directory_model->fetch_record_government($_GET['ministry']);
						//print_r($this->data['record']); die;
						$this->data['count']=$this->telephone_directory_model->fetch_num_record__government($_GET['ministry']);
						$this->load->view('telephone_directory/government_pages_result_view',$this->data);
						
						}
						
						else
						{
						
						$this->load->view('telephone_directory/government_pages_view',$this->data);
						}
						
						}


















}