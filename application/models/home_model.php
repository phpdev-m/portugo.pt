<?php 
class home_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
		
		
		
	function get_aboutus_cms()
	{
		$this->db->select('*');
		$this->db->from('cms');
		$this->db->where('cms_id',3);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	
	
	function get_privacy_cms()
	{
		$this->db->select('*');
		$this->db->from('cms');
		$this->db->where('cms_id',16);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	
	function get_terms_cms()
	{
		$this->db->select('*');
		$this->db->from('cms');
		$this->db->where('cms_id',17);
		$query=$this->db->get();
		return $query->row_array();	
	}
	function get_admin_detail()
	{
	$this -> db -> select('*');
	$this -> db -> from('admin');
	$this -> db -> where('rolls','1');
	$query = $this -> db -> get();
	return $query->row_array();
	}
	
	function get_all_restaurant()
	{
	$this -> db -> select('*');
	$this -> db -> from('restaurant');
	
	$query = $this -> db -> get();
	return $query->result_array();
	}
	
	function get_all_orders($rest_id,$start,$end)
	{
	$this -> db -> select('*');
		$this -> db -> from('order');
		$this->db->where('payment_method !=', 'Cash on Delivery');
		$this->db->where('invoice_created_status', '0');
		$this->db->where('payment_status', '1');
		$this->db->where('restaurant_id	',$rest_id);
		$this->db->where('order_date >=',$start);
		$this->db->where('order_date <=',$end);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_all_orderbyid($order_ids)
		{
		$this -> db -> select('*');
		$this -> db -> from('order');
		$this->db->where_in('id',$order_ids);
		$query = $this->db->get();
		return $query->result_array();	
		}
		
		public function get_restaurantinfo($id)
		{
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('id', $id);
		$query=$this->db->get();		
		return $query->row_array();	
		}
		
		function get_order_detail($order_id)
		{
		$this -> db -> select('*');
		$this -> db -> from('order_detail');
		$this->db->where('order_id', $order_id);
	    $query = $this->db->get();
		return $query->result_array();
		}
		
		public function get_item($item_id)
		{
		$this->db->select('*');
		$this->db->from('category_items');
		$this->db->where('id', $item_id);
		$query=$this->db->get();
		return $query->row_array();	
		}
		
		function insert_invoice($rest_id,$order_id,$invoice_total,$comission_percent)
		{		
		$this->	restaurant_id=$rest_id;
		$this->	order_id=$order_id;
		$this->total_amount=$invoice_total;
		$this->commission_percent=$comission_percent;
	    $this->	created_date=time();
		$this->	status=0;
		$this->db->insert('invoice',$this);
		}
		
		
	function get_all_faqs()
	{
		$this->db->select('*');
		$this->db->from('faq');
		$this->db->group_by('faq_category');
		$query=$this->db->get();
		return $query->result_array();	
	}
	
	function get_all_faqs_by_cat($id)
	{
		$this->db->select('*');
		$this->db->from('faq');
		$this->db->where('faq_category',$id);
		$query=$this->db->get();
		return $query->result_array();	
	}
	
	

}



?>