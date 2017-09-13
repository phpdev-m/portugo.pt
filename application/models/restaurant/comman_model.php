<?php
error_reporting(0);
class Comman_model extends CI_Model
{	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}
	
		
   /****************restaurant logo*****************/
   
   function restaurant_logo($rest_id){
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('id',$rest_id);		
		$query = $this->db->get();
   	    return $query->row_array();
	}
	
	
	
	/****************end dashbord*****************/
	
	public function view_new_order_count($id)
	{   
	$this->db->select('*');
	$this->db->from('order');
	$this->db->where('status',0);
	$this->db->where('restaurant_id',$id);
	$this->db->where('view',0);
	$query = $this->db->get();
  //echo $this->db->last_query();die;	
	return $query->result_array();
	}
	
	public function view_new_order($id)
	{   
	$this->db->select('*');
	$this->db->from('order');
	$this->db->where('status',0);
	$this->db->where('restaurant_id',$id);
	$this->db->where('view',0);
	$query = $this->db->get();
  
	return $query->result_array();
	}
	
}

?>
		