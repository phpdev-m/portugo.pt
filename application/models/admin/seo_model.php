<?php

class seo_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	
	function insert_tittle($data)
	{
		
	    $this->tittle_name=$data['tittle_name'];
	    $this->status=$data['status'];
	    $this->db->insert('seo_tittle',$this);
	}
	
	
	function get_tittle()
	{
	    $this -> db -> select('*');
		$this -> db -> from('seo_tittle');
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	
	function get_title($id)
	{
	   $this->db->select('*');
	   $this->db->from('seo_tittle');
	   $this->db->where('id',$id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function delete_tittle($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('seo_tittle');
	}
	
	
	function edit_tittle($data,$id)
	{
		$this->tittle_name=$data['tittle_name'];
		$this->status=$data['status'];
		$this->db->where('id',$id);
		$this->db->update('seo_tittle',$this);		
	}
	
	function insert_logo($data,$file_name)
	{
		
	    $this->logo=$file_name;
	    $this->status=$data['status'];
	    $this->db->insert('seo_logo',$this);
	}

    function get_logo()
	{
	    $this -> db -> select('*');
		$this -> db -> from('seo_logo');
		$query = $this->db->get();
		return $query->result_array();	
	}
     
	 function get_logos($id)
	{
	   $this->db->select('*');
	   $this->db->from('seo_logo');
	   $this->db->where('id',$id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	 
	 
    function delete_logo($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('seo_logo');
	}    

	function edit_logo($data,$id,$file_name)
	{
		$this->logo=$file_name;
		$this->status=$data['status'];
		$this->db->where('id',$id);
		$this->db->update('seo_logo',$this);		
	}
}


?>