<?php

class signup_user_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	
	
	function user_login($email, $password){
	   $this -> db -> select('*');
	   $this -> db -> from('users');
	   $this -> db -> where('email', $email);
	   $this -> db -> where('password', $password);
	  // $this -> db -> where('status','1');
	   //$this -> db -> limit(1);
	   $query = $this -> db -> get();
					
	   return $query -> row();
	}
	
	function insert_user($data)
	{
		$date = date('Y-m-d');
	    $this->first_name=$data['first_name'];
		$this->last_name=$data['last_name'];
		$this->email=$data['email'];
		$this->created_date=$date;
		$this->password=$data['password'];
	    $this->status='0';
	    $this->db->insert('users',$this);
		return $this->db->insert_id();
	}
	
	
	public function checkfbUser($email,$first_name,$last_name){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		
		if($prevCheck > 0){
			 $prevResult = $prevQuery->row_array();
			 return $prevResult['user_id'];
		}else{
			
			$this->first_name=ucfirst($first_name);
			$this->last_name=ucfirst($last_name);
		    $this->email=$email;
			$this->status='1';
			$this->created_date = date('Y-m-d');
			$this->db->insert('users',$this);
			return $this->db->insert_id();
			
		}

		
    }
	
	
	public function checkUser($email,$name){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		
		if($prevCheck > 0){
			 $prevResult = $prevQuery->row_array();
			 return $prevResult['user_id'];
		}else{
			
			$this->first_name=ucfirst($name);
		    $this->email=$email;
			$this->status='1';
			$this->db->insert('users',$this);
			return $this->db->insert_id();
			
		}

		
    }
	
	
	
	function get_customer($email)
		  {
		  $this->db->select('user_id,email,	password,first_name,last_name');
		  $this->db->from('users');
		  $this->db->where('email',$email);
		  $query=$this->db->get();
		  return $query->row_array();
		  }
		  
		  
  function update_customer_password($password,$customer_id)
		{
		$this->password=$password;
		$this->db->where('user_id',$customer_id);
		//echo $this->db->last_query();die;
		$this->db->update('users',$this);
		}
		
	
	
  function check_user_email($email, $password)
		  {
		  $this->db->select('*');
		  $this->db->from('users');
		  $this->db->where('email',$email);
		  $this->db->where('password',$password);
		  $query=$this->db->get();
		  //echo $this->db->last->query();die;
		  return $query->num_rows();
		  }	
	function get_user($user_id)
		  {
		  $this->db->select('*');
		  $this->db->from('users');
	      $this->db->where('user_id',$user_id);
		  $query=$this->db->get();
		  //echo $this->db->last->query();die;
		  return $query->row_array();
		  }	
		  
		  function activate_account($uid){
		//$data['activation_code'] = NULL;
		$data['status'] = 1;
		$this->db->update('users',$data,array('user_id'=>$uid));
	}
	
	
	
}

?>