<?php

class coupon_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	
	
	function add_coupon($data)
	{
	
	//print_r($_POST);die;
				$this->starting_date=$data['start_date'];
				$this->ending_date=$data['end_date'];				
				$this->coupon_type=$data['ctype'];				
				$this->price=$data['price'];
				$this->coupon_code=$data['code'];
				$this->coupon_applicableto=$data['applic'];				
				$this->create_time=time();
				$this->status=$data['status'];
				$this->db->insert('coupon',$this);
	}
	
	
	
function getall_restaurant()
{
    $this->db->select('*');
    $this->db->from('restaurant');
	$this->db->where('status', 1);
	$query=$this->db->get();
	return $query->result_array();
}	
function get_restaurant($id)
{
    $this->db->select('*');
    $this->db->from('restaurant');
	$this->db->where('id',$id);
	$query=$this->db->get();
	return $query->row_array();
}

function get_coupons()
{
    $this->db->select('*');
    $this->db->from('coupon');
	$query=$this->db->get();
	return $query->result_array();
}

function delete_coupon_id($id)
{
    $this->db->where('coupon_id', $id);
    $this->db->delete('coupon');
}

function update_coupon($data)
{
//print_r($_POST);die;
//echo $id; die;
  
  $this->starting_date = $data['start_date'];
  $this->ending_date = $data['end_date'];
  $this->coupon_type = $data['ctype'];
  $this->price = $data['price'];
  $this->coupon_code = $data['code'];
  $this->coupon_applicableto = $data['applic'];
  $this->status = $data['status'];  
  $this->db->where('coupon_id',$data['id']);
  $this->db->update('coupon',$this);	
 
}


function edit_coupon($id)
{
 
 $this->db->select('*');
 $this->db->from('coupon');
 $this->db->where('coupon_id', $id); 
 $query=$this->db->get();
 return $query->row_array();
   
}


	
	
	
		
}


?>