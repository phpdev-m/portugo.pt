<?php 
class restaurant_details extends CI_Controller{
	
	
function __construct()
    {
        // Call the Model constructor
    parent::__construct();
    $this->load->database();
	$this->load->model('search_model');
	$this->load->model('home_model');
	$this->load->model('signup_user_model');
	$this->load->model('myaccount_model');
	
    }	
	
	
public function index()
	{
	echo $_GET['id']; die;
	/*if(@$_GET['location']!=''){
	 $this->data['restaurant_search'] = @$this->search_model->get_restaurant_address(@$_GET['location']);
	 }else{
	 $this->data['restaurant_search'] = $this->search_model->get_all_restaurant_address();
	}*/
	 $this->load->view('restaurant_detail');
	}
	
	
}



?>