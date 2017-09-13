<?php
class Login_model extends CI_Model
{
	
	function admin_login($username, $password){
	
	   $this -> db -> select('id, username, password');
	   $this -> db -> from('admin');
	   $this -> db -> where('username', $username);
	   $this -> db -> where('password', $password);
	   $this -> db -> limit(1);
	 
	   $query = $this -> db -> get();
	 
	   if($query -> num_rows() == 1)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}
	
	
	
	
	function mentor_location_update($location,$country_id,$id){
	
	            $this->location=$location;
				$this->db->where('id',$country_id);
				$this->db->where('member_id',$id);
				$this->db->update('mentor_experience',$this);
	}
	
	function remainder_insert($remainder,$price,$id){
	           
				$this->remainder=$remainder;
				$this->price = $price;
				$this->member_id = $id;
				$this->status=1;
	            $this->db->insert('remainder',$this);
	
	}
	
	            

	function remainder_select($id,$remainder){
	           
				$this -> db -> select('*');
				$this -> db -> from('remainder');
				$this -> db -> where('member_id',$id);
				$this -> db -> where('remainder',$remainder);
				$query = $this->db->get();
			return $query->num_rows();	
	
	}
	
	function remainder_fetch($id,$remainder){
	           
				$this -> db -> select('*');
				$this -> db -> from('remainder');
				$this -> db -> where('member_id',$id);
				$this -> db -> where('remainder',$remainder);
				$query = $this->db->get();
			return $query->row_array();	
	
	}
	
	
	
	
}


