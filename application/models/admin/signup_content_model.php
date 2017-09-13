<?php
class signup_content_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
		
		public function get_all_signup_content()
		{
		$this->db->select('*');
		$this->db->from('signup_content');
		$query=$this->db->get();
		return $query->result_array();	
		}
		
	
	
	function get_signup_content($id)
	{
		$this->db->select('*');
		$this->db->from('signup_content');
		$this->db->where('signup_content_id',$id);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	
	function update_signup_content($data,$id,$file_name)
	{			
			$this->content_title=mysql_real_escape_string($data['title']);
			$this->content_desc=addslashes($data['desc']);
			$this->content_image=$file_name;
			$this->status=$data['status'];	
			$this->db->where('signup_content_id',$id);
			$this->db->update('signup_content',$this);
	}
	
	
	function update_portugoese_signup_content($data,$id,$file_name)
	{
			$this->portugoese_content_tittle=mysql_real_escape_string($data['title']);
			$this->portugoese_content_desc=addslashes($data['descs']);
			$this->content_image=$file_name;
			$this->status=$data['status'];	
			$this->db->where('signup_content_id',$id);
			$this->db->update('signup_content',$this);
			
	}
	
	
	
}