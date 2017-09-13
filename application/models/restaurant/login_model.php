<?php
class Login_model extends CI_Model
{
	
	function restaurant_login($username, $password){
	
	   $this -> db -> select('id, contact_email, password,contact_name');
	   $this -> db -> from('restaurant');
	   $this -> db -> where('contact_email', $username);
	   $this -> db -> where('password', $password);
	   $this -> db -> where('status',1);
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
	
	
	
	
	
	
	
	
}


