<?php
class Cms_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
		
		public function get_all_cms()
		{
		$this->db->select('*');
		$this->db->from('cms');
		$query=$this->db->get();
		return $query->result_array();	
		}
		
	
	function insert_cms($data)
	{
		//print_r($data); die;
		$this->page_title=mysql_real_escape_string($data['title']);
		$this->page_content=addslashes($data['desc']);
		$this->status=$data['status'];
		$this->db->insert('cms',$this);
	}
	
	function get_cms($id)
	{
		$this->db->select('*');
		$this->db->from('cms');
		$this->db->where('cms_id',$id);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	
	function update_cms($data,$id)
	{
			$this->page_title=mysql_real_escape_string($data['title']);
			$this->page_content=addslashes($data['desc']);
			$this->status=$data['status'];	
			$this->db->where('cms_id',$id);
			$this->db->update('cms',$this);
	}
	
	function update_portugoese_cms($data,$id)
	{
			$this->portugoese_tittle=mysql_real_escape_string($data['title']);
			$this->portugoese_content=addslashes($data['descs']);
			$this->status=$data['status'];	
			$this->db->where('cms_id',$id);
			$this->db->update('cms',$this);
			
	}
	
	
	function delete_cms($id)
	{
		$this->db->where('cms_id', $id);
        $this->db->delete('cms'); 
		
	}
	
	function mentor_experience($company,$industry,$title,$location,$create_start_time,$create_end_time,$member_id){
	            $this->company=$company;
				$this->member_id=$member_id;
				$this->industry=$industry;
				$this->title=$title;
				//$this->country=$country;
				$this->location = $location;
				$this->create_start_time = $create_start_time;
				$this->create_end_time = $create_end_time;
				$this->created_date = time();
				$this->status=1;
	            $this->db->insert('mentor_experience',$this);
				
	}
	function mentor_experience_update($company,$industry,$title,$location,$create_start_time,$create_end_time,$id,$member_id){
	            $this->company=$company;
				$this->member_id=$member_id;
				$this->industry=$industry;
				$this->title=$title;
				//$this->country=$country;
				$this->location = $location;
				$this->create_start_time = $create_start_time;
				$this->create_end_time = $create_end_time;
				$this->db->where('id',$id);
				$this->db->update('mentor_experience',$this);
				
	}
	function mentor_education_update($data,$id){
		        $this->member_id=$id;
		        $this->school=$data['school'];
				$this->db->where('member_id',$id);
				$this->db->update('mentor_education',$this);
		
		}
		function mentor_education_insert($data,$id){
		        $this->member_id=$id;
		        $this->school=$data['school'];
				$this->created_date = time();
				$this->status =$data['status'];
				$this->db->insert('mentor_education',$this);
		
		}
		function remainder_delete($id){
	           
				$this->db->where('member_id', $id);
                $this->db->delete('remainder');
				}
				public function deduct_amount_mentee($mentee_id,$amount,$mentee_balance){
		$this->balance=($mentee_balance - $amount);	
		$this->db->where('mentee_id',$mentee_id);
		$this->db->update('payment',$this);
		}
		
		
		function update_delivery_postcode($data,$restaurant_id)
		{

		$this->deliver_postcode=addslashes($data['postcode']);	
		$this->deliver_postcode_search = str_replace('-','',$data['postcode']);	


		$this->db->where('restaurant_id',$restaurant_id);

		$this->db->update('delivery_postcode',$this);
		}

                function insert_delivery_postcode($data,$restaurant_id)
                {

                $this->deliver_postcode=addslashes($data['postcode']);  

                $this->deliver_postcode_search = str_replace('-','',$data['postcode']); 

		$this->restaurant_id = $restaurant_id;	
//$this->db->where('restaurant_id',$restaurant_id);

                $this->db->insert('delivery_postcode',$this);


                }



	}
