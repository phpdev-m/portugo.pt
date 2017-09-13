<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class counter extends MY_Controller {
 
public function  index() {
//echo '<script type="text/javascript"> alert("'. "teste" . '")</script>';
 $data=array('isi'  	=>'home/index_home');
 $this->load->view('counter.php',$data); 
 }
}
