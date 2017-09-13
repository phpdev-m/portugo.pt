<?php

class Setting_Model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	public function getall_payment_option(){
			
		 $this -> db -> select('*');
		 $this -> db -> from('payment_table');
		// $this -> db -> where('status','1');
	     $query = $this->db->get();
         return $query->result_array();
	}
	
	public function get_users(){
			
		 $this -> db -> select('*');
		 $this -> db -> from('users');
		 $this -> db -> order_by('user_id','desc');
		
		 $query = $this->db->get();
     return $query->result_array();
	}
	
	
	function verfy_password($pass){
		$result = $this->db->get_where("admin",array('password'=>$pass,'id'=>'1'));
		if($result->num_rows()>0){
			return TRUE;
		} else {
			return FALSE;
		}		
	}
	
	function update_password($pass){
		$this->password=$pass;
		$this->db->where('id',1);
		$this->db->update('admin',$this);		
	}
	
	function updae_email(){
	
		$data = array(
		'email' => $_POST['email'],
		'username' => $_POST['username'],
		);
		
		$this->db->where('id', 1);
		$this->db->update('admin', $data); 
						
	}
		
	
	
	function get_admin_info($id)
	{
			$this -> db -> select('*');
			$this -> db -> from('admin');
			$this -> db -> where('id ',$id);
			$query = $this->db->get();
			return $query->row_array();	
	}
	
	function update_contact_info($data,$id)
	{
	$this->phone=$data['telephone']; 
	$this->fax=$data['fax']; 
	$this->address =$data['address']; 
	$this->db->where('id', $id);
	$this->db->update('admin', $this); 
	
	}
	
			
			function  get_amount()
			{
			$this -> db -> select('*');
			$this -> db -> from('minimum_amount');
			$this->db->where('id','1');
			
			$query = $this->db->get();
			return $query->row_array();	
			} 
			
			
				function update_amount($data,$id)
				{
				$this->amount=$data['amount']; 
				$this->db->where('id', $id);
				$this->db->update('minimum_amount', $this); 
				}
				
	 function mentor_education_update_edu($school,$major,$start_year,$end_year,$exp_edu_id,$id){
		        $this->school=$school;
		        $this->major=$major;
				$this->start_year=$start_year;
				$this->end_year=$end_year;
				$this->db->where('id',$exp_edu_id);
				$this->db->where('member_id',$id);
				$this->db->update('mentor_education',$this);
		
		}
		
	function insert_exp($data,$id){
	   $this->member_id = $id;
	   $this->company = $data['company'];
	   $this->industry = $data['industry'];
	   $this->title = $data['title'];
	   $this->country = $data['country'];
	   $this->city = $data['city'];
	   $this->create_start_time = $data['exp_start_year'];
	   $this->create_end_time = $data['exp_end_year'];
	   $this->created_date=time();
	   $this->status=1;
	   $this->db->insert('mentor_experience',$this);
	
	}
	
	function update_profile_image($id,$file)
	{
			$this->profile_picture=$file;
			$this->db->where('id', $id);
			$this->db->update('admin', $this); 
	}
	




function reset_orders()
        {

$this->db->truncate('cart');
$this->db->truncate('delivery_time');
$this->db->truncate('invoice');
$this->db->truncate('order');
$this->db->truncate('order_report');
$this->db->truncate('order_detail');
$this->db->truncate('payment');
        }



}


?>
