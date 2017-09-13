<?php
class category_items_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
		
		
		public function get_all_items()
		{
		$this->db->select('*');
		$this->db->from('category_items');
		$query=$this->db->get();
		return $query->result_array();	
		}
		
				
	
	function insert_category_items($data,$file_name,$rest_id)
	{
		//echo $rest_id;die;
		$this->category_id=$data['category'];
		if(!empty($rest_id)){
		$this->restaurant_id=$rest_id;	
		}else{
		$this->restaurant_id=$data['rest_id'];
		}
		$this->cuisine_id=$data['cuisine'];	
		
		$this->item_name=addslashes($data['menu_name']);
		
		if(!empty($file_name)){
		$this->item_image=$file_name;	
		}
		
		$this->item_desc=addslashes($data['menu_desc']);
		$this->item_cost=addslashes($data['price']);
		$this->type=addslashes($data['currency']);
		if(isset($data['menu_type']) && !empty($data['menu_type']))	
		{	
		$menu_type=implode(',',$data['menu_type']);	
		$this->allergens=$menu_type;
		}		
		$this->created_date=date('Y-m-d');
		$this->status=$data['status'];
		$this->db->insert('category_items',$this);
		return $this->db->insert_id();
	}
	
	
	
	
	
	function update_category_items($data,$item_id,$file_name1,$rest_id)
	{
		//print_r($data); die;		
		$this->category_id=$data['category'];
		$this->restaurant_id=$rest_id;
		$this->cuisine_id=$data['cuisine'];		
		$this->item_name=addslashes($data['menu_name']);
		
		if(!empty($file_name1)){
		$this->item_image=$file_name1;	
		}
		
		$this->item_desc=addslashes($data['menu_desc']);
		$this->type=addslashes($data['currency']);
		$this->item_cost=addslashes($data['price']);		
		if(isset($data['menu_type']) && !empty($data['menu_type']))	
		{	
		$menu_type=implode(',',$data['menu_type']);	
		$this->allergens=$menu_type;
		}			
		$this->created_date=date('Y-m-d');	
		$this->status=$data['status'];	
		$this->db->where('id', $item_id);
		$this->db->update('category_items',$this);
	}
	
	
	
	function delete_item($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('category_items'); 
		
	}
	
	
	
	public function get_item($item_id)
		{
		$this->db->select('*');
		$this->db->from('category_items');
		$this->db->where('id', $item_id);
		$query=$this->db->get();
		return $query->row_array();	
		}
		
		
		
		public function get_restaurant_items($rest_id)
		{
		$this->db->select('*');
		$this->db->from('category_items');
		$this->db->where('restaurant_id', $rest_id);
		$query=$this->db->get();
		return $query->result_array();	
		}
		
		
		
		
		public function get_extra_items($item_id)
		{
		$this->db->select('*');
		$this->db->from('menu_extra_items');
		$this->db->where('item_id', $item_id);
		$query=$this->db->get();		
		return $query->result_array();	
		}
		
		
		
		public function get_rest_cuisine($rest_id)
		{
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('id', $rest_id);
		$query=$this->db->get();
		return $query->row_array();	
		}
		
		
		function get_menu_detail($menu_id)
		{
		$this->db->select('*');
			$this->db->from('category_items');
			$this->db->where('id',$menu_id);
			$query=$this->db->get();
			return $query->row_array();	
		}
		
		
	 function insert_addons($addon_name,$price,$menu_id,$rest_id)
	  {
	
		$this->restaurant_id=$rest_id;
		$this->item_id=$menu_id;		
		$this->extra_item=$addon_name;
		$this->create_date=time();
		$this->price=$price;		
	    $this->status=1;
		$this->db->insert('menu_extra_items',$this);
	  }
		
		
		
	function update_addons($addon_name,$price,$id,$menu_id)
		{
	    $this->item_id=$menu_id;		
		$this->extra_item=$addon_name;
		$this->price=$price;		
	    $this->db->where('id', $id);
	    $this->db->update('menu_extra_items',$this);
		}		
	
	
	
	function delete_addons($id)
		{
		$this->db->where('id', $id);
        $this->db->delete('menu_extra_items'); 
		}
	
	
		
	}