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
		//print_r($data); die;
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
		$this->allergens=addslashes($data['menu_type']);		
		$this->created_date=date('Y-m-d');
		
		$this->db->insert('category_items',$this);
		return $this->db->insert_id();
	}
	
	
	
	
	
	function update_category_items($data,$item_id,$file_name1)
	{
		//print_r($data); die;		
		$this->category_id=$data['category'];
		$this->restaurant_id=$data['rest_id'];
		$this->cuisine_id=$data['cuisine'];		
		$this->item_name=addslashes($data['menu_name']);
		
		if(!empty($file_name1)){
		$this->item_image=$file_name1;	
		}
		
		$this->item_desc=addslashes($data['menu_desc']);
		$this->type=addslashes($data['currency']);
		$this->item_cost=addslashes($data['price']);		
		$this->allergens=addslashes($data['menu_type']);		
		$this->created_date=date('Y-m-d');
		
		$this->db->where('id', $item_id);
		//echo $this->db->last_query();die;
		
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
		//echo $this->db->last_query();die;
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
		
	
	
	
	
		
	}