<?php 
class Home extends CI_Controller{
	
	
function __construct()
    {
        // Call the Model constructor
    parent::__construct();
    $this->load->database();
	
    }	

public function index()
	{
	 $this->load->view('home');
	}
	
	

}



?>