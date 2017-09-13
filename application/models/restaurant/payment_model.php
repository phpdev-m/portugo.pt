<?php

class payment_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	function get_all_payment($data,$rest_id)
	{
	    $this -> db -> select('*');
		$this -> db -> from('payment');
		$this->db->where('restaurant_id',$rest_id);
		if($data['datefrom']!=''){
		$this->db->where('transaction_date >=',$data['datefrom']);
		}
		if($data['dateto']!=''){
		$this->db->where('transaction_date <=',$data['dateto']);
		}
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	
	
	function restaurant($restaurant_id)
	{
	   $this->db->select('*');
	   $this->db->from('restaurant');
	   $this->db->where('id',$restaurant_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	
	function get_restaurant_payment($rest_id)
	{
	   $this->db->select('*');
	   $this->db->from('payment');
	   $this->db->where('restaurant_id',$rest_id);
	   $query=$this->db->get();
	   return $query->result_array();
	}

     function get_user($order_id){
		$this->db->select('*');
	   $this->db->from('order');
	   $this->db->where('order_id',$order_id);
	   $query=$this->db->get();
	   return $query->row_array(); 
	 }
}

?>