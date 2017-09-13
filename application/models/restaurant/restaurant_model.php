<?php error_reporting(0);
class restaurant_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
	
	function insert_cuisine($data,$rest_id)
	{
		//print_r($data); die;
		$this->cuisine_name=addslashes($data);		
		if(!empty($data['status'])){
		$this->status=$data['status'];
		}else{
		$this->status=0;
		}
		if(!empty($rest_id)){
		$this->restaurant_id=$rest_id;
		}
		$this->created_date=date('Y-m-d');
		$this->db->insert('cuisine',$this);
		$insert_id = $this->db->insert_id();
        return $insert_id;
        return true; 
	}
	
	
	public function get_all_cuisine()
		{
		$this->db->select('*');
		$this->db->from('cuisine');
		$query=$this->db->get();
		return $query->result_array();	
		}
		
		
		
	public function get_all_country()
		{
		$this->db->select('*');
		$this->db->from('country');
		$query=$this->db->get();
		return $query->result_array();	
		}
		
		
	function insert_restaurant($data)
	{
		//print_r($data);die;
		$this->restaurant_name=addslashes($data['rest_name']);
		$this->restaurant_phone=$data['rest_phone'];
		$this->website=addslashes($data['website']);
		$this->address=addslashes($data['address']);
		$this->country=addslashes($data['country']);
		$this->city=addslashes($data['city']);
		$this->postcode=addslashes($data['postcode']);
		$this->contact_name=addslashes($data['cname']);
		$this->contact_phone=addslashes($data['phone']);
		$this->contact_email=addslashes($data['email']);
		$this->password=addslashes($data['password']);		
		
		$this->created_date=date('Y-m-d');
		$this->status=$data['status'];
				
		$this->db->insert('restaurant',$this);
	}
			
	
	function update_restaurant($data,$getid)
	{
		//print_r($data);die; 
		$this->restaurant_name=addslashes($data['rest_name']);
		$this->restaurant_phone=$data['rest_phone'];
		$this->website=addslashes($data['website']);
		$this->address=addslashes($data['address']);
		$this->country=addslashes($data['country']);
		$this->city=addslashes($data['city']);
		$this->full_address=$data['address'].' '.$data['city'].' '.$data['postcode'];
		$this->postcode=addslashes($data['postcode']);
		$this->comp_registration_no=addslashes($data['nif_no']);
		$this->contact_name=addslashes($data['cname']);
		$this->contact_phone=addslashes($data['phone']);
		$this->contact_email=addslashes($data['email']);						
		$this->created_date=date('Y-m-d');				
		$this->status=$data['status'];
		$this->db->where('id', $getid);		
		$this->db->update('restaurant',$this);
	}
	
	
	
	
	public function get_all_restaurant()
		{
		$this->db->select('*');
		$this->db->from('restaurant');
		$query=$this->db->get();
		return $query->result_array();	
		}
		
	public function get_restaurant($id)
		{
		$this->db->select('*');
		$this->db->from('restaurant_owner');
		$this->db->where('id', $id);
		$query=$this->db->get();
		return $query->row_array();	
		}
		
		
		
	function insert_restaurant_logo($data,$file_name,$file_name2,$res_id)
	{
		//print_r($data); die;
		$this->restaurant_description=addslashes($data['rest_desc']);
		if(!empty($file_name)){
		$this->restaurant_logo=$file_name;
		}if(!empty($file_name2)){
		$this->cover_photo=$file_name2;
		}
		$this->db->where('id',$res_id);
		$this->db->update('restaurant',$this);
	}
	
	
	
	function update_restaurant_logo($data,$file_name,$file_name2,$rid)
	{
		//print_r($data); die;
		$this->restaurant_description=addslashes($data['rest_desc']);
		if(!empty($file_name)){
		$this->restaurant_logo=$file_name;
		}if(!empty($file_name2)){
		$this->cover_photo=$file_name2;
		}
		$this->db->where('id',$rid);
		$this->db->update('restaurant',$this);
	}

  function update_restaurant_cuisine($cuisine,$rest_id)
  {
  $this->cuisine_types=$cuisine;
  $this->db->where('id',$rest_id);
		$this->db->update('restaurant',$this);
  }

	
	
	
	function insert_bank_detail($data,$res_id,$own_id)
	{		
		$type = $data['payment_type'];			
	    $arr = implode(',', $type);
				
		$this->restaurant_id=$res_id;
		$this->restaurant_owner_id=$own_id;
		$this->bank_name=addslashes($data['bank_name']);
		$this->bank_account_no=$data['ac_number'];
		$this->holder_name=addslashes($data['holder_name']);
		$this->bank_address=addslashes($data['bank_address']);
		$this->bank_ifsc_code=addslashes($data['ifsc_code']);
		
		if(isset($arr)){
		$this->payment_type=$arr;
		}
		
		$this->status=$data['status'];
		
		$this->db->insert('restaurant_bank_detail',$this);
	}
	
	
	
	
	function update_bank_detail($data,$rid)
	{		
		$type = $data['payment_type'];			
	    $arr = implode(',', $type);		
		$this->bank_name=addslashes($data['bank_name']);
		$this->bank_account_no=$data['ac_number'];
		$this->holder_name=addslashes($data['holder_name']);
		$this->bank_address=addslashes($data['bank_address']);
		$this->bank_ifsc_code=addslashes($data['ifsc_code']);
		
		if(isset($arr)){
		$this->payment_type=$arr;
		}
		
		$this->status=$data['status'];
		$this->db->where('restaurant_id', $rid);
		
		$this->db->update('restaurant_bank_detail',$this);
	}
	
	
	
	
	
	function delete_restaurant($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('restaurant'); 
		
	}
	
	
	public function get_restaurant_detail($id)
		{
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('id', $id);
		$query=$this->db->get();
		return $query->row_array();	
		}
		
		
		
		public function get_cuisine($id)
		{
		$this->db->select('*');
		$this->db->from('cuisine');
		$this->db->where('id', $id);
		$query=$this->db->get();
		return $query->row_array();	
		}
		
		
		public function get_category($id)
		{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('restaurant_id', $id);
		$query=$this->db->get();
		return $query->result_array();	
		}
		
		
		public function get_items($id)
		{
		$this->db->select('*');
		$this->db->from('category_items');
		$this->db->where('category_id', $id);
		$query=$this->db->get();		
		return $query->result_array();	
		}
		
		
		public function get_bank_detail($id)
		{
		$this->db->select('*');
		$this->db->from('restaurant_bank_detail');
		$this->db->where('restaurant_id', $id);
		$query=$this->db->get();		
		return $query->row_array();	
		}
		
		
		function get_city($id)
		{
			$this->db->select('*');
			$this->db->from('country');
			$this->db->where('parentid',$id);
			$this->db->order_by('countryname');
			$query=$this->db->get();			
			return $query->row_array();
		}
		
		
		
		public function country_name($id)
		{
		$this->db->select('*');
		$this->db->from('country');
		$this->db->where('id', $id);
		$query=$this->db->get();
		return $query->row_array();	
		}
		
		
		function city_name($id)
		{
			$this->db->select('*');
			$this->db->from('country');
			$this->db->where('id',$id);			
			$query=$this->db->get();
			return $query->row_array();			
		
		}
		
		
		
		public function restaurant_timetable($id)
		{
		$this->db->select('*');
		$this->db->from('restaurent_timetable');
		$this->db->where('restaurant_id', $id);
		$query=$this->db->get();
		return $query->result_array();
		}
		
		
		
	function update_restaurant_info($data,$getid,$info)
	{				 
		$this->restaurant_description=addslashes($data['rest_about']);
		$this->min_order=$data['min_order'];
		$this->delivery_charges=$data['charges'];
		$this->db->where('id', $getid);
		
		$this->db->update('restaurant',$this);
	}



   public function get_timetable_detail($id)
		{
		$this->db->select('*');
		$this->db->from('restaurent_timetable');
		$this->db->where('restaurant_id', $id);
		$query=$this->db->get();
		return $query->result_array();
		}
				
		
		function update_restaurant_status($status_data,$rest_id)
	    {				
		$this->status=$status_data;		
		$this->db->where('id', $rest_id);		
		$this->db->update('restaurant',$this);
	    }
		
		
		function insert_comment($data,$rest_id,$to,$from)
	    {		
		$this->restaurant_id=$rest_id;		
		$this->comment=addslashes($data['comment']);
		$this->date=date('Y-m-d');
		$this->to=$to;
		$this->from=$from;		
		$this->status=1;
		$this->db->insert('comments',$this);
	    }
		
		
		
	function update_extra_items($extra_item,$price,$ext_id,$rest_id)
	{					
		$this->restaurant_id=$rest_id;						
		$this->extra_item=addslashes($extra_item);		
		$this->price=$price;	
		$this->create_date=date('Y-m-d');		
		$this->status=1;
		$this->db->where('id', $ext_id);
		$this->db->update('menu_extra_items',$this);
	}
	
	
		
	function country()
		{
			$this->db->select('*');
			$this->db->from('country');
			$this->db->where('parentid',0);
			$this->db->group_by('countryname');
			$query=$this->db->get();
			return $query->result_array();
			
		
		}
		
		
		function get_state($id)
		{
			$this->db->select('*');
			$this->db->from('country');
			$this->db->where('parentid',$id);
			$query=$this->db->get();
			return $query->result_array();
			
		
		}
		
		
		
		function get_city1($id)
		{
			$this->db->select('*');
			$this->db->from('country');
			$this->db->where('parentid',$id);
			$this->db->order_by('countryname');
			$query=$this->db->get();
			return $query->result_array();			
		
		}
		
			
	
	function get_timetable($dayname,$rest_id)
	{
	  
	    $this->db->select('*');
		$this->db->from('restaurent_timetable');
		$this->db->where('open_close_day', $dayname);
		$this->db->where('restaurant_id', $rest_id);
		$query=$this->db->get();		
	    return $query->row_array();	
		
	}
	
	
	
	function insert_timetable($day_name,$opnening_time,$closing_time,$rest_id,$status)
	{
		//echo $rest_id;die;
	    $this->db->select('*');
		$this->db->from('restaurent_timetable');
		$this->db->where('open_close_day', $day_name);
		$this->db->where('restaurant_id', $rest_id);
		$query=$this->db->get();
	    $res= $query->num_rows();	
		
		$this->restaurant_id=$rest_id;
		$this->	open_close_day=$day_name;
		$this->	opening_time=$opnening_time;
		$this->	closing_time=$closing_time;
		$this->	status=$status;					
		$this->	date=date('Y-m-d');
		
		if($res==0)
		{
		$this->db->insert('restaurent_timetable',$this);
		}
		else
		{
		$this->db->where('restaurant_id', $rest_id);
		$this->db->where('open_close_day', $day_name);
		$this->db->update('restaurent_timetable',$this);
		}
	}
	
	
	
	function countryname()
		{
			$this->db->select('*');
			$this->db->from('country');			
			$this->db->where('countryname','Portugal');
			$query=$this->db->get();
			return $query->row_array();
			
		
		}
		
		
		
		function admin_data()
		{
			$this->db->select('*');
			$this->db->from('admin');						
			$query=$this->db->get();
			return $query->result_array();
			
		
		}
	
	public function getall_payment_option(){
			
		 $this -> db -> select('*');
		 $this -> db -> from('payment_table');
		 $this -> db -> where('status','1');
	     $query = $this->db->get();
         return $query->result_array();
	}
	
	function update_payment_info($data,$rid)
	{	
			$this -> db -> select('*');
			$this -> db -> from('restaurant_bank_detail');
			$this -> db -> where('restaurant_id',$rid);
			$query = $this->db->get();
			$num= $query->num_rows();
		
		
		if(isset($data['payment_type'])){
		$type = $data['payment_type'];			
	    $arr = implode(',', $type);		
		
		
		}
		else
		{
		$arr='';
		}
		$this->payment_type=$arr;
		$this->restaurant_id=$rid;
		
		if($num==0)
		{
		$this->db->insert('restaurant_bank_detail',$this);
		}
		else
		{
		
		$this->db->where('restaurant_id', $rid);
		$this->db->update('restaurant_bank_detail',$this);
		}
	}
	
	
	
	public function get_contact_comments($rest_id)
		{
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('comment_type', 'Contact Information');
		$this->db->where('restaurant_id', $rest_id);
		$query=$this->db->get();				
		return $query->result_array();	
		}
		
		
	public function get_restaurant_comments($rest_id)
		{
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('comment_type', 'Restaurant Information');
		$this->db->where('restaurant_id', $rest_id);
		$query=$this->db->get();				
		return $query->result_array();	
		}
		
		
	public function get_logo_comments($rest_id)
		{
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('comment_type', 'Restaurant Logo');
		$this->db->where('restaurant_id', $rest_id);
		$query=$this->db->get();				
		return $query->result_array();	
		}
		
		
	public function get_account_comments($rest_id)
		{
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('comment_type', 'Bank Account');
		$this->db->where('restaurant_id', $rest_id);
		$query=$this->db->get();				
		return $query->result_array();	
		}
		
		
  
	
	
	function get_restaurant_orders($rest_id)
	{
	    $this -> db -> select('*');
		$this -> db -> from('payment');
		$this -> db -> where('restaurant_id',$rest_id);
		$this -> db -> where('status',1);		
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	
 function get_cash_payment($rest_id)
	{
	    $this -> db -> select('*');
		$this -> db -> from('payment');
		$this -> db -> where('restaurant_id',$rest_id);		
		$this -> db -> where('transaction_mode','cash');
		$this -> db -> where('status',1);
		$query = $this->db->get();		
		return $query->result_array();	
	}
	
	
	
	function get_online_payment($rest_id)
		{
			
$query ="SELECT * FROM `payment` WHERE `restaurant_id`='$rest_id' and (transaction_mode='card' and status='1') OR (transaction_mode='paypal' and status='1')";
			$query = $this->db->query($query);
			return $query->result_array();
		}
		
		
		
	public function get_restaurantinfo($id)
		{
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('id', $id);
		$query=$this->db->get();		
		return $query->row_array();	
		}
		
		
	function change_invoice_created_status($order_id)
	{
			$this->invoice_created_status=1;
			$this->db->where('id',$order_id);
			$this->db->update('order',$this);
	}
				
}