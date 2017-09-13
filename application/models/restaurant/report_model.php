<?php

class report_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	function get_all_report($rest_id)
	{
	    $this -> db -> select('*');
		$this -> db -> from('order_report');
		$this -> db -> where('restaurant_id',$rest_id);
		$query = $this->db->get();
		return $query->result_array();	
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
//echo '<script type="text/javascript"> alert("'. $order_id . '")</script>';
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
	
	function get_ajax($data,$rest_id)
			{
			
			$from_date=strtotime($data['datefrom']);
			$to_date=strtotime($data['dateto']);
				
			$this->db->select('*');
			$this->db->from('order_report');
			$this -> db -> where('restaurant_id',$rest_id);
			if($from_date!=''){
			$this->db->where('order_date >=',$from_date);
			}
			if($to_date!=''){
		    $this->db->where('order_date <=',$to_date);
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
	
	
	function get_report_detail($order_id)
		{
		$this -> db -> select('*');
		$this -> db -> from('order_detail');
		$this->db->where('order_id', $order_id);
	    $query = $this->db->get();		
		return $query->result_array();
		}

	
}

?>
