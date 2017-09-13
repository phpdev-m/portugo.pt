<?php 
class restaurant_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	
		
		function filter_min_order($min_val,$search_data)
		{
		if($min_val!=''){
		$query ="SELECT * FROM `restaurant` WHERE full_address like('%$search_data%') and full_address!='' order by min_order asc";
		}else{
		$query ="SELECT * FROM `restaurant` WHERE full_address like('%$search_data%') and full_address!=''";
		}
		$query = $this->db->query($query);
		return $query->result_array();
		}
		
		function cusin_all()
		{
		$this->db->select('*');
		$this->db->from('cuisine');
		$this->db->where('status','1');
		$query=$this->db->get(); 
		return $query->result_array();
		}
		
		function all_restaurant_details($id)
		{
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('id',$id);
		$query=$this->db->get(); 
		return $query->row_array();
		}
		
		function time_table($id,$date)
		{
		$this->db->select('*');
		$this->db->from('restaurent_timetable');
		$this->db->where('restaurant_id',$id);
		$this->db->where('open_close_day',$date);
		$query=$this->db->get(); 
		return $query->row_array();
		}
	
       function cuisine($cuisine)
		{
		$this->db->select('*');
		$this->db->from('cuisine');
		$this->db->where('id',$cuisine);
		$query=$this->db->get(); 
		return $query->result_array();
		}
		
		function restaurant_category($id)
		{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('restaurant_id',$id);
		$this -> db -> where('status','1');
		$query=$this->db->get(); 
		return $query->result_array();
		
		}
		
		function menu_name($cat_id)
		{
		$this->db->select('*');
		$this->db->from('category_items');
		$this->db->where('category_id',$cat_id);
		$this->db->where('status','1');
		$query=$this->db->get(); 
		//echo $this->db->last_query(); die;
		return $query->result_array();
		}
		
		function upadte_order_number($rest_id)
		{
		$this->db->set('total_order', '	total_order+1',FALSE);
		$this->db->where('id',$rest_id);
		$this->db->update('restaurant',$this);	
		}
		
		
		function get_restaurant_review($id)
		{
		$this -> db -> select('*');
		$this -> db -> from('review');
		$this -> db -> where('restaurant_id', $id);
		$query = $this -> db -> get();
		return $query->result_array();
		}
		
		
		function update_avg_review($rest_id,$avg_rating)
		{
		$this->avg_rating=$avg_rating;
		$this->db->where('id',$rest_id);		
		$this->db->update('restaurant',$this);
		}
		
function check_fav_restaurant($customer_id,$rest_id)
  {
          $this -> db -> select('*');
    $this -> db -> from('fav_restaurant');
    $this -> db -> where('customer_id', $customer_id);
    $this -> db -> where('restaurant_id', $rest_id);
    $query = $this -> db -> get();        
    return $query->num_rows();
  }
  
  
  function add_fav_restaurant($data)
  {
  $this->customer_id=$data['customer_id'];
  $this->restaurant_id=$data['rest_id'];
  $this->db->insert('fav_restaurant',$this);
  }
  
  
  function remove_fav_restaurant($data)
  {
  $this -> db -> where('customer_id', $data['customer_id']);
  $this -> db -> where('restaurant_id', $data['rest_id']);
  $this->db->delete('fav_restaurant',$this);
  }
  
  
  function get_fav_restaurant($customer_id)
  {
          $this -> db -> select('*');
    $this -> db -> from('fav_restaurant');
    $this -> db -> where('customer_id', $customer_id);
    $query = $this -> db -> get();
    return $query->result_array();
    
  }
  
   function add_fav_dish($data)
  {
  $this->customer_id=$data['customer_id'];
  $this->menu_id=$data['menu_id'];
  $this->db->insert('fav_dish',$this);
  }
 
   function remove_fav_dish($data)
  {
  $this -> db -> where('customer_id', $data['customer_id']);
  $this -> db -> where('menu_id', $data['menu_id']);
  $this->db->delete('fav_dish',$this);
  }
  
   function get_favourite_dish($customer_id)
  {
          $this -> db -> select('*');
    $this -> db -> from('fav_dish');
    $this -> db -> where('customer_id', $customer_id);
    $query = $this -> db -> get();
    return $query->result_array();
    
  }
  
  function get_restaurent_menu_detail($menu_id)
  {
         $this->db->select('category_items.*,restaurant.restaurant_name,restaurant.id');
		$this->db->from('category_items');
		$this->db->join('restaurant','restaurant.id=category_items.restaurant_id');
		$this->db->where('category_items.id',$menu_id);
		$query=$this->db->get(); 
		//echo $this->db->last_query(); die;
		return $query->row_array();
  }
  
   function delete_fav_dish($fav_id)
 {
     $this->db->where('fav_dish_id',$fav_id);
  $this->db->delete('fav_dish',$this);
 }
  
  
  function get_restaurent_detail($id)
    {
    $this -> db -> select('*');
    $this -> db -> from('restaurant');
    $this -> db -> where('id', $id);
    $query = $this -> db -> get();
    return $query->row_array();
    }
	
	
	function check_restaurent($email)
		  {
		  $this->db->select('id');
		  $this->db->from('restaurant');
		  $this->db->where('contact_email',$email);
		  $query=$this->db->get();
		  return $query->num_rows();
		  }
    
    
 function delete_fav_restaurant($fav_id)
 {
     $this->db->where('fav_id',$fav_id);
  $this->db->delete('fav_restaurant',$this);
 }
 
 
		function check_fav_dish($customer_id,$menu_id)
		{
		$this->db->select('*');
		$this->db->from('fav_dish');
		$this->db->where('customer_id',$customer_id);
		$this->db->where('menu_id',$menu_id);
		$query=$this->db->get();
		return $query->num_rows();
		}
		
		function change_invoice_created_status($order_id)
	{
			$this->invoice_created_status=1;
			$this->db->where('id',$order_id);
			$this->db->update('order',$this);
	}
	
	
	
	function get_signup_content()
	{
		$this->db->select('*');
		$this->db->from('signup_content');
		$this->db->where('signup_content_id',1);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	
	function get_signup_contentt()
	{
		$this->db->select('*');
		$this->db->from('signup_content');
		$this->db->where('signup_content_id',2);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	
	function get_signup_contenttt()
	{
		$this->db->select('*');
		$this->db->from('signup_content');
		$this->db->where('signup_content_id',3);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	
	function get_signup_contentttt()
	{
		$this->db->select('*');
		$this->db->from('signup_content');
		$this->db->where('signup_content_id',4);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	
	function get_signup_contenttttt()
	{
		$this->db->select('*');
		$this->db->from('signup_content');
		$this->db->where('signup_content_id',5);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	function insert_delivery_postcode($data,$restaurant_id)
	{
		$this->deliver_postcode=addslashes($data['postcode']);	
		$this->deliver_postcode_search = str_replace('-','',$data['postcode']);
		$this->restaurant_id=$restaurant_id;	
		$this->db->insert('delivery_postcode',$this);
	}
	
	public function get_bank_detail($id)
		{
		$this->db->select('*');
		$this->db->from('restaurant_bank_detail');
		$this->db->where('restaurant_id', $id);
		$query=$this->db->get();		
		return $query->row_array();	
		}
		
		
 
 
		
}

?>