<?php

class order_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }



        function all_restaurant($id)
                {
                $this->db->select('*');
                $this->db->from('restaurant');
                $this->db->where('id',$id);
                $query=$this->db->get(); 
                return $query->row_array();
                }







	function insert_user($data)
	{
		
	    $this->first_name=$data['first_name'];
		$this->last_name=$data['last_name'];
		$this->email=$data['email'];
		$this->phone=$data['phone'];
		$this->password=$data['password'];
	    $this->status=$data['status'];
	    $this->db->insert('users',$this);
	}
	
	
	function get_all_order($rest_id)
	{
	    $this -> db -> select('*');
		$this -> db -> from('order');
		$this -> db -> where('restaurant_id',$rest_id);
		$this -> db -> where('customer_id !=', 0,FALSE);			
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	
	function get_order($id)
	{
	   $this->db->select('*');
	   $this->db->from('order');
	   $this->db->where('id',$id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function delete_order($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('order');
	}
	
	function get_customer($id)
	{
	   $this->db->select('*');
	   $this->db->from('users');
	   $this->db->where('user_id',$id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	
	function get_coupon($restaurant_id,$coupon_id)
	{
	   $this->db->select('*');
	   $this->db->from('coupon');
	   $this->db->where('coupon_applicableto',$restaurant_id);
	   $this->db->where('coupon_id',$coupon_id);
	   $this->db->where('status',1);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function get_restaurant($restaurant_id)
	{
	   $this->db->select('*');
	   $this->db->from('restaurant');
	   $this->db->where('id',$restaurant_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	
	
	function update_order($data,$id)
	{
		
		$this->status=$data['status'];
		$this->cancel_reason=$data['cancel_reason'];
		$this->db->where('id',$id);
		$this->db->update('order',$this);		
	}
	
	function get_guest_detail($guest_id)
	{
	$this->db->select('*');
	   $this->db->from('guest');
	   $this->db->where('guest_id',$guest_id);	   
	   $query=$this->db->get();	  
	   return $query->row_array();
	}
	
	/*function get_ajax($data,$rest_id)
			{
			
			 $from_date=$data['datefrom'];
			 $to_date=$data['dateto'];
				
			$this->db->select('*');
			$this->db->from('order');
			$this -> db -> where('restaurant_id',$rest_id);
			if($from_date!=''){
			$this->db->where('order_date >=',$from_date);
			}
			if($to_date!=''){
		    $this->db->where('order_date <=',$to_date);
			}
			$this -> db -> where('customer_id',1);
            $query = $this->db->get();
			return $query->result_array();
			
			}*/
	
	function get_ajax($data,$rest_id)
   {
   
  //carrega por intervalo de data

   $from_date=strtotime($data['datefrom']);
   $to_date=strtotime($data['dateto']);


   $this->db->select('*');
   $this->db->from('order');
   $this -> db -> where('restaurant_id',$rest_id);
   if($from_date!=''){
   $this->db->where('order_date >=',$from_date);
   }
   if($to_date!=''){
      $this->db->where('order_date <=',$to_date);
   }
   $this->db->where('guest_id',0);
            $query = $this->db->get();   
   return $query->result_array();
   
   }
	
	
	
	function get_all_pending_order($rest_id)
	{
	    $this -> db -> select('*');
		$this -> db -> from('order');
		$this -> db -> where('restaurant_id',$rest_id);
		$this -> db -> where('status','1');
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	function get_all_guest_order($rest_id)
	{
	    $this -> db -> select('*');
		$this -> db -> from('order');
		$this -> db -> where('restaurant_id',$rest_id);		
		$this->db->where('guest_id != ',0,FALSE);
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
		}
		
		
		
	public function get_item($item_id)
		{
		$this->db->select('*');
		$this->db->from('category_items');
		$this->db->where('id', $item_id);
		$query=$this->db->get();		
		return $query->row_array();	
		}
		
		
	function get_addonsby_id($addons_id)
		{
		$this -> db -> select('*');
		$this -> db -> from('menu_extra_items');
		$this-> db ->where_in('id',$addons_id);
	    $query = $this->db->get();
		return $query->result_array();
		}
		
		
		function get_order_all($rest_id)
		{
		 $this -> db -> select('*');
		$this -> db -> from('order');
		$this -> db -> where('restaurant_id',$rest_id);
			
		$query = $this->db->get();
		return $query->result_array();	
		}
	
	function get_ajax_all($data,$rest_id)
   {
   
   $from_date=strtotime($data['datefrom']);
   $to_date=strtotime($data['dateto']);
    
   $this->db->select('*');
   $this->db->from('order');
   $this -> db -> where('restaurant_id',$rest_id);
   if($from_date!=''){
   $this->db->where('order_date >=',$from_date);
   }
   if($to_date!=''){
      $this->db->where('order_date <=',$to_date);
   }
  
            $query = $this->db->get();   
   return $query->result_array();
   
   }
   
   
   function get_customer_address($address_id)
   {
    $this -> db -> select('*');
		$this -> db -> from('customer_address');
		$this -> db -> where('id',$address_id);
			
		$query = $this->db->get();
		return $query->row_array();	
   }
   
   
   
   function get_order_accepted($rest_id)
   {
    $this -> db -> select('*');
		$this -> db -> from('order');
		$this -> db -> where('restaurant_id',$rest_id);
		$this->db->where('status',2);	
		$query = $this->db->get();
		return $query->result_array();
   }
   
   function get_ajax_accepted($data,$rest_id)
   {
   $from_date=strtotime($data['datefrom']);
   $to_date=strtotime($data['dateto']);
    
   $this->db->select('*');
   $this->db->from('order');
   $this -> db -> where('restaurant_id',$rest_id);
   if($from_date!=''){
   $this->db->where('order_date >=',$from_date);
   }
   if($to_date!=''){
      $this->db->where('order_date <=',$to_date);
   }
   $this->db->where('status',2);
  
            $query = $this->db->get();   
   return $query->result_array();
   }
   
   
   
   function get_order_pending($rest_id)
   {
    $this -> db -> select('*');
		$this -> db -> from('order');
		$this -> db -> where('restaurant_id',$rest_id);
		$this->db->where('status',1);	
		$query = $this->db->get();
		return $query->result_array();
   }
   
   function get_ajax_pending($data,$rest_id)
   {
   $from_date=strtotime($data['datefrom']);
   $to_date=strtotime($data['dateto']);
    
   $this->db->select('*');
   $this->db->from('order');
   $this -> db -> where('restaurant_id',$rest_id);
   if($from_date!=''){
   $this->db->where('order_date >=',$from_date);
   }
   if($to_date!=''){
      $this->db->where('order_date <=',$to_date);
   }
   $this->db->where('status',1);
  
            $query = $this->db->get();   
   return $query->result_array();
   }
   
   
   
	
	
}

?>
