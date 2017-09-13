<?php

session_start();

class Langswitch extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library( array( 'encrypt', 'form_validation', 'session' ) );
    }
 
    function switchlanguage() {
		$language = $this->input->post('language');
		
		$sess_array = array('language' => $language);
		
		$this->session->set_userdata('language', $sess_array);
		$language_data=$this->session->userdata('language');
		
        redirect($this->input->post('redirect'));
    }
		
	
}
?>
