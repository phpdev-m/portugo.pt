<?php
class Faq_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
		
		public function get_all_faq()
		{
		$this->db->select('*');
		$this->db->from('faq');
		$query=$this->db->get();
		return $query->result_array();	
		}
		
	
	function insert_faq($data)
	{
		
		$this->faq_category=$data['category'];
		$this->question=mysql_real_escape_string($data['question']);
		$this->answer=addslashes($data['answer']);
		$this->status=$data['status'];
		$this->db->insert('faq',$this);
	}
	
	function get_faq($id)
	{
		$this->db->select('*');
		$this->db->from('faq');
		$this->db->where('faq_id',$id);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	
	function update_faq($data,$id)
	{
			$this->faq_category=$data['category'];
			$this->question=mysql_real_escape_string($data['question']);
			$this->answer=addslashes($data['answer']);
			$this->status=$data['status'];	
			$this->db->where('faq_id',$id);
			$this->db->update('faq',$this);
	}
	
	
	function update_portugoese_faq($data,$id)
	{
			$this->faq_category=mysql_real_escape_string($data['category']);
			$this->portugoese_question=mysql_real_escape_string($data['question']);
			$this->portugoese_answer=addslashes($data['answer']);
			$this->status=$data['status'];	
			$this->db->where('faq_id',$id);
			$this->db->update('faq',$this);
			
	}
	
	
	
}