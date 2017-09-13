<?php
class cuisine_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
	
	function insert_cuisine($data,$rest_id)
	{		
		if(!empty($rest_id)){
		$this->restaurant_id=$rest_id;
		}
		$this->cuisine_name=addslashes($data['cuisin_name']);
		$this->portugoese_cuisine_name=addslashes($data['portu_cuisin_name']);
		$this->cuisine_desc=addslashes($data['desc']);
		$this->created_date=date('Y-m-d');		
		$this->status=$data['status'];
		$this->db->insert('cuisine',$this);
	}
	
	
	/*function insert_portugoese_cuisine($data,$rest_id)
	{		
		if(!empty($rest_id)){
		$this->restaurant_id=$rest_id;
		}
		$this->portugoese_cuisine_name=addslashes($data['cuisin_name']);
		$this->portugoese_cuisine_desc=addslashes($data['descs']);
		$this->created_date=date('Y-m-d');		
		$this->status=$data['status'];
		$this->db->insert('cuisine',$this);
	}*/
	
	
	public function get_all_cuisine()
		{
		$this->db->select('*');
		$this->db->from('cuisine');
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
			$this->portugoese_cuisine_name=addslashes($data['portu_cuisin_name']);
			$this->cuisine_desc=addslashes($data['desc']);			
			$this->created_date=date('Y-m-d');
			$this->status=$data['status'];	
			$this->db->where('id',$id);
			$this->db->update('cuisine',$this);
	}
	
	
	/*function update_portugoese_cuisine($data,$id)
	{
	
			$this->portugoese_cuisine_name=addslashes($data['cuisin_name']);
			$this->portugoese_cuisine_desc=addslashes($data['descs']);			
			$this->created_date=date('Y-m-d');
			$this->status=$data['status'];	
			$this->db->where('id',$id);
			$this->db->update('cuisine',$this);
			
	}*/
	
	
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
	
	
	function update_cuisine_status($status_data,$cuisine_id)
	    {				
		$this->status=$status_data;		
		$this->db->where('id', $cuisine_id);		
		$this->db->update('cuisine',$this);
	    }
	
	
	}