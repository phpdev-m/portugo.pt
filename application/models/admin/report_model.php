<?php

class report_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	function get_all_report()
	{
	    $this -> db -> select('*');
		$this -> db -> from('order_report');
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	function get_order_detail($order_id)
		{
			
		$this -> db -> select('*');
		$this -> db -> from('order_detail');
		$this->db->where('order_id', $order_id);
	    $query = $this->db->get();
		return $query->result_array();
		echo $this->db->last_query();
		}
	
	
	function get_pay_method($order_id)
	{
	   $this->db->select('*');
	   $this->db->from('payment');
	   $this->db->where('order_id',$order_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function get_report($order_id)
	{
	   $this->db->select('*');
	   $this->db->from('order_report');
	   $this->db->where('id',$order_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function get_all_restaurant()
	{
	    $this -> db -> select('*');
		$this -> db -> from('restaurant');
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	function get_ajax_report($data)
	    {
		$this->db->select('*');
		$this->db->from('order_report');
		$this->db->where('restaurant_id',$data['restaurant']);
		$query = $this->db->get();	
	    return $query->result_array();
		}
	
	function get_ajax($data)
			{
			$data1= strtotime($data['datefrom']);
			$data2= strtotime($data['dateto']);
			$this->db->select('*');
			$this->db->from('order_report');
			if($data['restaurant_id']!=''){
			$this->db->where('restaurant_id',$data['restaurant_id']);
			}
			if($data1!=''){
			$this->db->where('order_date >=',$data1);
			}
			if($data2!=''){
		    $this->db->where('order_date <=',$data2);
			}
            $query = $this->db->get();
			//echo $this->db->last_query();die;
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

	
}

?>
