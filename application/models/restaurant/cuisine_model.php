<?php
class cuisine_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
	
	function insert_cuisine($cuisin_name, $portu_cuisin_name)
	{				
		$this->cuisine_name=$cuisin_name;
		$this->portugoese_cuisine_name=$portu_cuisin_name;		
		$this->created_date=date('Y-m-d');		
		$this->db->insert('cuisine',$this);
		$insert_id = $this->db->insert_id();
        return $insert_id;
        return true;
	}
	
	
	function insert_portugoese_cuisine($cuisin_name)
	{				
		$this->portugoese_cuisine_name=$cuisin_name;		
		$this->created_date=date('Y-m-d');		
		$this->db->insert('cuisine',$this);
		$insert_id = $this->db->insert_id();
        return $insert_id;
        return true;
	}
	
	
	public function get_all_cuisine()
		{
		$this->db->select('*');
		$this->db->from('cuisine');
		$this->db->where('status',1);
		$query=$this->db->get();
		return $query->result_array();	
		}
		
		
	function all_cuisine($rest_id)
	{
		$this->db->select('*');
		$this->db->from('cuisine');
		$this->db->where('restaurant_id',$rest_id);
		$query=$this->db->get();
		return $query->result_array();	
	}
	
	
	function get_cuisine($id)
	{
		$this->db->select('*');
		$this->db->from('cuisine');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	
	function update_cuisine($data,$id)
	{
	
			$this->cuisine_name=addslashes($data['cuisin_name']);
			$this->cuisine_desc=addslashes($data['desc']);			
			$this->created_date=date('Y-m-d');				
			$this->db->where('id',$id);
			$this->db->update('cuisine',$this);
	}
	
	function delete_cuisine($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('cuisine'); 
		
	}
		
	
	function update_restaurant_cuisine($cuisine,$rest_id)
	{		
		$this->cuisine_types=$cuisine;
		$this->db->where('id',$rest_id);		
		$this->db->update('restaurant',$this);
	}
	
	
	
	function approved($id)
		
		{
        $this->status = 1;		
		$this->db->where('id',$id);
		$this->db->update('cuisine',$this);
		}
		
		
		
		
		
  function restaurant_logo($rest_id){
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('id',$rest_id);		
		$query = $this->db->get();
   	    return $query->row_array();
	}
	/****************notification header*****************/
	
	public function view_new_order_count($id)
	{   
	$this->db->select('*');
	$this->db->from('order');
	$this->db->where('status',0);
	$this->db->where('restaurant_id',$id);
	$this->db->where('view',0);
	$query = $this->db->get();	
	return $query->num_rows();
	}
	
	public function view_new_order($id)
	{   
	$this->db->select('*');
	$this->db->from('order');
	$this->db->where('restaurant_id',$id);
	$this->db->where('status',0);
	$this->db->where('view',0);
	$query = $this->db->get();
    return $query->row_array();
	}
	
	function view_order($rest_id)
		
		{
        $this->view = 1;		
		$this->db->where('restaurant_id',$rest_id);
		$this->db->update('order',$this);
		}
	
	}