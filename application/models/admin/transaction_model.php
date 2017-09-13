<?php
class transaction_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
		
		public function get_all_transaction()
		{
		$this->db->select('*');
		$this->db->from('cart');
		$query=$this->db->get();
		return $query->result_array();	
		}
		
	
	
	function get_transaction($id)
	{
		$this->db->select('*');
		$this->db->from('cart');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	function user_details_mentee($id)
	{
	    $this->db->select('*');
		$this->db->from('member');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->row_array();	
	}
	function user_details_mentor($id)
	{
	    $this->db->select('*');
		$this->db->from('member');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	function credit_details($id)
	{
	    $this->db->select('*');
		$this->db->from('credit');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->row_array();	
	
	}
	
	function membership_plan_details($id)
	{
	    $this->db->select('*');
		$this->db->from('subscription');
		$this->db->where('s_id',$id);
		$query=$this->db->get();
		return $query->row_array();	
	
	}
	
	
	
	}