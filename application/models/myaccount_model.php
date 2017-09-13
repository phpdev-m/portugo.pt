<?php

class myaccount_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	
	
	function myaccount($user_id){
	   $this -> db -> select('*');
	   $this -> db -> from('users');
	   $this -> db -> where('user_id', $user_id);
	   
	   $this -> db -> where('status','1');
	  
	   $query = $this -> db -> get();
					
	   return $query -> row_array();
	}
	
	
	
	function update_user_detail($data,$user_id)
	{						
		$date = date('Y-m-d');	    
		$this->first_name=$data['fname1'];
		$this->last_name=$data['lname1'];
		$this->email=$data['email1'];
		$this->phone=$data['phone1'];
		$this->created_date=$date;
		
		$this->db->where('user_id', $user_id);
	    $this->db->update('users',$this);
	}
	
	
	function update_user_password($data,$user_id)
	{				
		$date = date('Y-m-d');
		$this->password=$data['new_password1'];
		$this->created_date=$date;		
		$this->db->where('user_id', $user_id);
	    $this->db->update('users',$this);
	}

	
	/**************Address book****************/
	
	function insert_address($data,$user_id)
	{
		
		$date = date('Y-m-d');
	    $this->customer_id=$user_id;
		//$this->address_tittle=$data['address_tittle'];
		$this->apartment=$data['apartment'];
		$this->address=$data['address'];
		$this->added_date=$date;
		$this->city=$data['city'];
		$this->zip_code=$data['zip_code'];
		$this->added_date=$date;		
	    $this->db->insert('customer_address',$this);
	}
	
	
	function update_address($data,$address_id)
	{					
		$date = date('Y-m-d');	    
		//$this->address_tittle=$data['name1'];
		$this->apartment=$data['apartment1'];
		$this->address=$data['address1'];
		$this->added_date=$date;
		$this->city=$data['city1'];
		$this->zip_code=$data['postcode1'];
		$this->db->where('id', $address_id);
	    $this->db->update('customer_address',$this);
	}
	
	
	
	function get_address($user_id)
	{
	   $this->db->select('*');
	   $this->db->from('customer_address');
	   $this->db->where('customer_id',$user_id);
	   $query=$this->db->get();
	   return $query->result_array();
	}
	
	function delete_address($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('customer_address');
	}
	
	function update_address_book($address_id,$status)
		{
		$this->status=$status;		
		$this->db->where('id',$address_id);
		$this->db->update('customer_address',$this);
		}
		
		function update_alladdress($user_id)
		{
		$this->status=0;
		$this->db->where('id',$user_id);
		$this->db->update('customer_address',$this);
		}
	
	
	
	function address_get($address_id)
	{
	   $this->db->select('*');
	   $this->db->from('customer_address');
	   $this->db->where('id',$address_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	function get_user_address($user_id)
	{
	 $this->db->select('*');
	   $this->db->from('customer_address');
	   $this->db->where('customer_id',$user_id);
	    $this->db->where('status','1');
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function empty_cart($ip_address)
		{
		$this->db->where('ip_address',$ip_address);
		$this->db->delete('cart',$this);
		}
		
		
	function get_primary_address($user_id)
	{
	   $this->db->select('*');
	   $this->db->from('customer_address');
	   $this->db->where('customer_id',$user_id);
	   $this->db->where('status',1);	   
	   $query=$this->db->get();
	   return $query->result_array();
	}
	
}

?>