<?php
class language_model extends CI_Model
{
	function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
		
		
	function get_all_language()
	{
	$this->db->select('*');
	$this->db->from('language');
	$query=$this->db->get();
	return $query->result_array();
	}
	
	function insert_language($data)
	{
	$this->lang_code=$data['lang_code'];
	$this->lang_name=$data['lang_name'];
	$this->country=$data['country'];
	$this->status=1;
	$this->db->insert('language',$this);
	return $this->db->insert_id();
	}
	
	function get_language_detail($id)
	{
	$this->db->select('*');
	$this->db->from('language');
	$this->db->where('id',$id);
	$query=$this->db->get();
	return $query->row_array();
	}
	
	function edit_language($data,$id)
	{
	$this->lang_code=$data['lang_code'];
	$this->lang_name=$data['lang_name'];
	$this->country=$data['country'];
	$this->status=1;
	$this->db->where('id',$id);
	$this->db->update('language',$this);
	}
	
	function delete_language($lang_id)
	{
	$this->db->where('id',$lang_id);
	$this->db->delete('language',$this);
	}
	
	
	
	
	
		
	
	
}