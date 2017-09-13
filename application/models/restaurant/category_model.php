<?php
class category_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
		
		public function get_all_category()
		{
		$this->db->select('*');
		$this->db->from('category');
		$query=$this->db->get();
		return $query->result_array();	
		}
		
	
	function insert_category($data,$rest_id)
	{
		//print_r($data); die;
		if(!empty($rest_id)){
		$this->restaurant_id=$rest_id;
		}else{
		$this->restaurant_id=$data['rest'];
		}
		$this->cat_name=addslashes($data['cat_name']);
		
		
		
		$this->create_date=date('Y-m-d');		
		$this->status=$data['status'];
		$this->db->insert('category',$this);
	}
	
	
	
	function insert_categories($cat_name,$cat_desc,$getid,$insert_id,$status,$file_name)
	{
		//print_r($file_name);die; 
		$this->restaurant_id=$insert_id;
		$this->rest_owner_id=$getid;
		$this->cat_name=addslashes($cat_name);
		$this->category_desc=addslashes($cat_desc);
		if(!empty($file_name)){
		$this->category_image=$file_name;
		}
		$this->create_date=date('Y-m-d');
		$this->status=$status;
		$this->db->insert('category',$this);
	}
	
	
	
	function update_categories($datas,$cat_desc,$getid,$status,$file_name)
	{
		//echo $getid;die;		
		$this->cat_name=addslashes($datas);
		$this->category_desc=addslashes($cat_desc);
		if(!empty($file_name)){
		$this->category_image=$file_name;
		}
		$this->create_date=date('Y-m-d');
		$this->status=$status;		
		$this->db->where('restaurant_id', $getid);
		
		$this->db->update('category',$this);
	}
	
	
	function get_category($id)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	
	function update_category($data,$id,$rest_id)
	{
				
			$this->restaurant_id=$rest_id;
			$this->cat_name=addslashes($data['cat_name']);
			$this->create_date=date('Y-m-d');			
			$this->status=$data['status'];	
			$this->db->where('id',$id);
			$this->db->update('category',$this);
	}
	
		function get_all_menu($cat_id)
		{
		$this->db->select('*');
		$this->db->from('category_items');
		$this->db->where('category_id',$cat_id);
		$query=$this->db->get();
		return $query->result_array();	
		}
		
	function delete_category($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('category'); 
		
	}
	
	
	function get_restaurant_category($rid)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('restaurant_id',$rid);
		$query=$this->db->get();
		return $query->result_array();	
	}
	
	
	
	function insert_extra_items($extra_item,$price,$item_id,$rest_id)
	{			
		$this->restaurant_id=$rest_id;		
		$this->item_id=$item_id;		
		$this->extra_item=addslashes($extra_item);		
		$this->price=$price;	
		$this->create_date=date('Y-m-d');		
		$this->status=1;
		$this->db->insert('menu_extra_items',$this);
	}
	
	
	
	function delete_ext_menu($ext_id)
	{
			
		$this->db->where('id', $ext_id);
        $this->db->delete('menu_extra_items'); 
		
	}
	
	
	
	
	
	function update_restaurant_info($about,$min_order,$free_delivery,$delivery_check,$charges,$delivery_time,$rest_id)
	{
					 
		$this->restaurant_description=addslashes($about);
		$this->min_order=$min_order;
		$this->free_delivery=$free_delivery;
                $this->delivery_check=$delivery_check;
		$this->delivery_time_min=$delivery_time;
		$this->delivery_charges=$charges;
		$this->db->where('id', $rest_id);		
		$this->db->update('restaurant',$this);
	}
		
	
	
	
		
	}
