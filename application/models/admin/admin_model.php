<?php
class Admin_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
		
		function getinfo()
		{
			$this -> db -> select('*');
			$this -> db -> from('admin');
			
			
			$query = $this->db->get();
			return $query->row_array();	
		
		}
		
		
		
		
		
		
		
		
		
		
		
		
	
	
	
	}