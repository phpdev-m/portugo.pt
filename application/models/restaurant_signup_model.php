<?php error_reporting(0);
class restaurant_signup_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
	
	
		
		
	function insert_restaurant($data)
	{


//add edit_timetable defaults
//valor minimo de pedido
//valor minimo para entrega gratis
//tipo de entrega do restaurante
//taxa de entrega
//Tempo  minimo de entrega

  $this->min_order='0.00';
  $this->free_delivery='0.00';
  $this->delivery_check='delivery/pickup';
  $this->delivery_charges='0.00';
  $this->delivery_time_min='60';

				
		$this->restaurant_name=addslashes($data['rest_name']);
		$this->restaurant_phone=$data['rest_phone'];		
		$this->address=addslashes($data['rest_address']);
		$this->city=addslashes($data['city']);		
		$this->postcode=addslashes($data['postcode']);
		$this->postcode_search=str_replace('-','',$data['postcode']);		
		$this->contact_name=addslashes($data['contact_name']);
		$this->contact_phone=addslashes($data['phone']);
		$this->contact_email=addslashes($data['email']);				
		$this->created_date=date('Y-m-d');
		$this->status=0;				
		$this->db->insert('restaurant',$this);
	}
	
	
	
	function admin_data()
		{
			$this->db->select('*');
			$this->db->from('admin');						
			$query=$this->db->get();
			return $query->result_array();			
		
		}

	
		
	function get_restaurent_detail($id)
		  {
				$this -> db -> select('*');
				$this -> db -> from('restaurant');
				$this -> db -> where('id', $id);
				$query = $this -> db -> get();
				return $query->row_array();
		  }
		  
		  
		  
  function activate_account($id)
		  {
		  $this->activation_code='';
		  $this->status=1;
		  $this->db->where('id',$id);
		  $this->db->update('restaurant',$this);
		  }
		
		
		
	
				
}
