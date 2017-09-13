<?php

class Setting_Model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	
	
	function verfy_password($pass,$rest_id){
		$result = $this->db->get_where("restaurant",array('password'=>$pass,'id'=>$rest_id));
		if($result->num_rows()>0){
			return TRUE;
		} else {
			return FALSE;
		}		
	}
	
	function update_password($pass,$rest_id){
		$this->password=$pass;
		$this->db->where('id',$rest_id);
		$this->db->update('restaurant',$this);		
	}
	
	
	function get_admin_info($id)
	{
			$this -> db -> select('*');
			$this -> db -> from('admin');
			$this -> db -> where('id ',$id);
			$query = $this->db->get();
			return $query->row_array();	
	}
	
	
	
	function update_profile_image($id,$file)
	{
			$this->profile_picture=$file;
			$this->db->where('id', $id);
			$this->db->update('admin', $this); 
	}
	
	public function get_all_postcode($rest_id)
		{
		$this->db->select('*');
		$this->db->from('delivery_postcode');
		$this->db->where('restaurant_id', $rest_id);
		$query=$this->db->get();
		return $query->result_array();	
		}
		
		function insert_postcode($postcode,$searchcode,$rest_id)
		{


		$this->db->select('*');
		$this->db->from('delivery_postcode');
		$this->db->where('restaurant_id', $rest_id);
		$this->db->where('deliver_postcode', $postcode);
		$query=$this->db->get();
		$num=$query->num_rows();
		$this->restaurant_id=$rest_id;
		$this->deliver_postcode=$postcode;
                $this->deliver_postcode_search=$searchcode;
		if($num==0)
		{
	    $this->db->insert('delivery_postcode', $this); 
		}
		}
//funcao para inserir range em multi
       function insert_postcode_multi($postcode,$searchcode,$rest_id)
                {

// echo '<script type="text/javascript"> alert("'. $searchcode. '")</script>';
//echo '<script type="text/javascript"> alert("'. "Exec insert em setting_models.php" . '")</script>';
                $this->db->select('*');
                $this->db->from('delivery_postcode');
                $this->db->where('restaurant_id', $rest_id);
                $this->db->where('deliver_postcode', $postcode);
                $query=$this->db->get();
                $num=$query->num_rows();
                $this->restaurant_id=$rest_id;
                $this->deliver_postcode=$postcode;
                $this->deliver_postcode_search=$searchcode;
                if($num==0)
                {
            $this->db->insert('delivery_postcode', $this); 
                }
                }

	
}


?>
