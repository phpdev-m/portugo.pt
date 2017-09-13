<?php

class user_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	
	function insert_user($data)
	{
		$date = date('Y-m-d');
	    $this->first_name=$data['first_name'];
		$this->last_name=$data['last_name'];
		$this->email=$data['email'];
		$this->phone=$data['phone'];
		$this->created_date=$date;
		$this->password=$data['password'];
	    $this->status=$data['status'];
	    $this->db->insert('users',$this);
	}
	
	
	function get_all_user()
	{
	    $this -> db -> select('*');
		$this -> db -> from('users');
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	
	function get_user($id)
	{
	   $this->db->select('*');
	   $this->db->from('users');
	   $this->db->where('user_id',$id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function get_customer($customer_id)
	{
	   $this->db->select('*');
	   $this->db->from('users');
	   $this->db->where('user_id',$customer_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function delete_user($id)
	{
		$this->db->where('user_id', $id);
        $this->db->delete('users');
	}
	
	
	
	function update_user($data,$id)
	{
		
	    $this->first_name=$data['first_name'];
		$this->last_name=$data['last_name'];
		$this->email=$data['email'];
		$this->phone=$data['phone'];
		$this->mobile=$data['mobile'];
		$this->password=$data['password'];
	    $this->status=$data['status'];
		$this->db->where('user_id', $id);
	    $this->db->update('users',$this);
	}
	
	
	function get_all_users()
	{
	    $this -> db -> select('*');
		$this -> db -> from('users');
		$query = $this->db->get();
		return $query->num_rows();	
	}
	
	function get_address($id)
	{
	   $this->db->select('*');
	   $this->db->from('customer_address');
	   $this->db->where('customer_id',$id);
	   $query=$this->db->get();
	   return $query->result_array();
	}
	
	function insert_address($data)
	{
		$date = date('Y-m-d');
	    $this->customer_id=$data['customer_id'];
		//$this->address_tittle=$data['address_tittle'];
		$this->apartment=$data['apartment'];
		$this->address=$data['address'];
		$this->added_date=$date;
		//$this->state=$data['state'];
		$this->city=$data['city'];
		$this->zip_code=$data['zip_code'];
		$this->landmark=$data['landmark'];
		//$this->landline=$data['landline'];
		$this->address_level=$data['address_lavel'];
	    $this->status=$data['status'];
	    $this->db->insert('customer_address',$this);
	}
	
	function update_address($data,$id)
	{
		
	    $this->customer_id=$data['customer_id'];
		//$this->address_tittle=$data['address_tittle'];
		$this->apartment=$data['apartment'];
		$this->address=$data['address'];
		//$this->added_date=$date;
		//$this->state=$data['state'];
		$this->city=$data['city'];
		$this->zip_code=$data['zip_code'];
		$this->landmark=$data['landmark'];
		//$this->landline=$data['landline'];
		$this->address_level=$data['address_lavel'];
	    $this->status=$data['status'];
		$this->db->where('id', $id);
	    $this->db->update('customer_address',$this);
	}
	
	function addres($user_id)
	{
	   $this->db->select('*');
	   $this->db->from('customer_address');
	   $this->db->where('customer_id',$user_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	
	function get_addres($id)
	{
	   $this->db->select('*');
	   $this->db->from('customer_address');
	   $this->db->where('id',$id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function delete_customer($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('customer_address');
	}
	
	function get_user_order($user_id)
	{
	    $this -> db -> select('*');
		$this -> db -> from('order');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return $query->num_rows();	
	}
	
	function get_order($id)
	{
	   $this->db->select('*');
	   $this->db->from('order');
	   $this->db->where('user_id',$id);
	   $query=$this->db->get();
	   return $query->result_array();
	}
	
	function get_restaurant($restaurant_id)
	{
	   $this->db->select('*');
	   $this->db->from('restaurant');
	   $this->db->where('id',$restaurant_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function get_orders($id)
	{
	   $this->db->select('*');
	   $this->db->from('order');
	   $this->db->where('id',$id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function payment($order_id)
	{
	   $this->db->select('*');
	   $this->db->from('payment');
	   $this->db->where('order_id',$order_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	
	function delete_order($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('order');
	}
}

?>