<?php

class member_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	
	
	function add_restaurant_owner($data,$file_name)
	          {
	
				$this->first_name=$data['first_name'];
				$this->last_name=$data['last_name'];
				$this->email=$data['email'];
				if(!empty($file_name)){
				$this->owner_image=$file_name;
				}
				$this->phone=$data['phone'];
				$this->restaurant_name= $data['restaurant_name'];
				$this->restaurant_phone= $data['restaurant_phone'];
				$this->restaurant_address=addslashes($data['restaurant_address']);				
				$this->country=$data['country'];
				$this->city=$data['city'];
				$this->user_type='Restaurant Owner';			
				$this->password=$data['password'];
				$this->created_date=date('Y-m-d');
				$this->status=$data['status'];
				//$this->dob=$data['dob'];
				$this->ip_address=$_SERVER['REMOTE_ADDR'];
				$this->zip_code= $data['zip_code'];				
				$this->db->insert('restaurant_owner',$this);
	          }
	
	
	function get_restaurant_owner($id)
	    {
				$this -> db -> select('*');
				$this -> db -> from('restaurant_owner');
				$this -> db -> where('id',$id);
			    $query = $this->db->get();
			    return $query->row_array();	
	    }
	
	function edit_restaurant_owner($data,$id,$file_name){
				//print_r($data);die;
                $this->first_name=$data['first_name'];
				$this->last_name=$data['last_name'];
				$this->email=$data['email'];
				if(!empty($file_name)){
				$this->owner_image=$file_name;
				}				
				$this->phone=$data['phone'];				
				$this->country=$data['country'];
				$this->city=$data['city'];
				//$this->address=addslashes($data['address']);
				$this->user_type='Restaurant Owner';			
				$this->password=$data['password'];
				
				$this->status=$data['status'];
				//$this->dob=$data['dob'];
				
				$this->zip_code= $data['zip_code'];
				$this->restaurant_name= $data['restaurant_name'];
				$this->restaurant_phone= $data['restaurant_phone'];
				$this->restaurant_address=addslashes($data['restaurant_address']);
                $this->db->where('id',$id);				
				$this->db->update('restaurant_owner',$this);		
				}
	
	
	
	function count_us_country()
	{
	            $this -> db -> select('country');
				$this -> db -> from('mentor_experience');
				$this -> db -> where('country','229');
				$this -> db -> or_where('country','239');
				$this -> db -> group_by('member_id');
				$this -> db -> order_by('id','desc');
			    $query = $this->db->get();
			    return $query->result_array();	
	}
	function insert_comment($data,$ip_address,$session_id)
	{
	            $this->booked_id=$data['booked_id'];
				$this->mentor_id=$data['mentor_id'];
				$this->mentee_id=$data['mentee_id'];
				if($data['comment']!=''){
				$this->thumb_up_message=$data['comment'];
				}
				if($data['comment1']!=''){
				$this->thumb_down_message=$data['comment1'];
				}
				$this->ip_address = $ip_address;
				$this->session_id_comment = $session_id;
				$this->created_date=time();
				$this->status=1;
				$this->db->insert('comment',$this);
	}
	
	function delay_send_msg($data,$session_id,$ip_address)
	{
	            $this->booked_id=$data['booked_id'];
				$this->mentor_id=$data['mentor_id'];
				$this->mentee_id=$data['mentee_id'];
				if($data['delay_msg']!=''){
				$this->message=$data['delay_msg'];
				}
				if($data['subject']!=''){
				$this->subject=$data['subject'];
				}
				$this->ip_address = $ip_address;
				$this->session_id_comment = $session_id;
				$this->created_date=time();
				$this->status=1;
				$this->db->insert('delay_comment',$this);
	
	}
	function paypal_update($data)
	{
	            $this->payment_amount=$data['amount'];
				$this->payment_status = 1;
				$this->live_action = 1;
				$this->chat_option = 1;
				$this->db->where('id',$data['booked_id']);
				$this->db->update('mentor_book_slot',$this);
	}
	function payment_cancel($data)
	{
	            $this->payment_amount=0;
				$this->payment_status = 0;
				$this->live_action = 0;
				$this->chat_option = 0;
				$this->db->where('id',$data['booked_id']);
				$this->db->update('mentor_book_slot',$this);
	}
	
	
	function check_comment($id,$mentee_id,$mentor_id){
	            $this -> db -> select('*');
				$this -> db -> from('comment');
				$this -> db -> where('booked_id',$id);
			    $query = $this->db->get();
			    return $query->result_array();
	}
	function check_comment_delay($id,$mentee_id,$mentor_id){
	            $this -> db -> select('*');
				$this -> db -> from('delay_comment');
				$this -> db -> where('booked_id',$id);
				$this -> db -> where('mentor_id',$mentor_id);
				$this -> db -> where('mentee_id',$mentee_id);
			    $query = $this->db->get();
			    return $query->result_array();
	}
	function count_asia_country(){
	            $this -> db -> select('country');
				$this -> db -> from('mentor_experience');
				$this -> db -> where('country !=','229');
				$this -> db -> where('country !=','239');
				$this -> db -> group_by('member_id');
				$this -> db -> order_by('id','desc');
			    $query = $this->db->get();
			    return $query->result_array();	
	
	}
	function add_member($data,$image_name)
	{
				$this->first_name=$data['first_name'];
				$this->last_name=$data['last_name'];
				
				$this->email=$data['email'];
				
				$this->phone=$data['phone'];
				$this->password=$data['password'];
				if($image_name!=''){
				$this->resume = $image_name;
				}
				$this->country=$data['country'];
				$this->city=$data['city'];
				$this->created_date=time();
				$this->user_type = 'Mentee';
				$this->status=$data['status'];
				$this->db->insert('member',$this);
	}
	
	       
	
	function add_member_mentor_register_step1($data,$image_name,$profile_image_name)
	{
				$this->user_type = 'mentor';
				$this->first_name=$data['firstname'];
				$this->last_name=$data['lastname'];
				$this->email=$data['email'];
				$this->phone=$data['phone'];
				$this->password=$data['password'];
					if($image_name!=''){
				$this->resume = $image_name;
				}
				$this->wechat=$data['wechat'];
				$this->created_date=time();
				$this->profile_image=$profile_image_name;
				$this->status=0;
				$this->activation_code = md5(time());
				$this->db->insert('member',$this);
				$insert_id = $this->db->insert_id();
				return  $insert_id;
	}
	function add_member_mentee_register($data,$image_name,$profile_image_name)
	{
				$this->user_type = 'mentee';
				$this->first_name=$data['first_name'];
				$this->last_name=$data['last_name'];
				$this->school=$data['school'];
				$this->industry=$data['industry'];
				$this->email=$data['email'];
				$this->wechat=$data['wechat'];
				$this->phone=$data['phone'];
				$this->password=$data['password'];
					if($image_name!=''){
				$this->resume = $image_name;
				}
				$this->created_date=time();
				$this->profile_image = $profile_image_name;
				$this->status=0;
				$this->activation_code = md5(time());
				$this->db->insert('member',$this);
				$insert_id = $this->db->insert_id();
				return  $insert_id;
	}
	
	
	
	function add_member_mentor_register_step2($school,$major,$start_year,$end_year,$company,$industry,$title,$country,$city,$create_start_time,$create_end_time,$last_id)
	{
				$this->school=$school;
				$this->major=$major;
				$this->start_year=$start_year;
				$this->end_year=$end_year;
				$this->company=$company;
				$this->industry=$industry;	
				$this->title=$title;
				$this->country=$country;
				$this->city=$city;
				$this->create_start_time=$create_start_time;
				$this->create_end_time=$create_end_time;
				$this->db->where('id',$last_id);
				$this->db->update('member',$this);
				
	}
	function mentor_education($school,$major,$start_year,$end_year,$member_id){
	            $this->school=$school;
				$this->member_id=$member_id;
				$this->major=$major;
				$this->start_year=$start_year;
				$this->end_year=$end_year;
				$this->created_date = time();
				$this->status=1;
	            $this->db->insert('mentor_education',$this);
				
	}
	function mentor_education_update($school,$major,$start_year,$end_year,$id,$member_id){
	            $this->school=$school;
				$this->member_id=$member_id;
				$this->major=$major;
				$this->start_year=$start_year;
				$this->end_year=$end_year;
				$this->db->where('id',$id);
				$this->db->update('mentor_education',$this);
				
	}
	
	
	
	
	function add_member_mentor_register_step3($data,$last_id)
	{
				$this->remainder=$data['remainder'];
				$this->db->where('id',$last_id);
				$this->db->update('member',$this);
				
	}
	
	
	
	
	function get_all_member()
	{
			$this -> db -> select('*');
			$this -> db -> from('restaurant_owner');
			$this -> db -> order_by('id','desc');
			$query = $this->db->get();
			return $query->result_array();	
	}
	function get_all_member_mentor()
	{
				$this -> db -> select('*');
				$this -> db -> from('member');
				$this -> db -> where('status',1);
				$this -> db -> where('user_type','mentor');
				
				$this -> db -> order_by('id','desc');
				//$this -> db -> limit(8);
			  $query = $this->db->get();
			return $query->result_array();	
	}
	function get_all_member_mentor1($name)
	{
	
	$query = $this->db->query("SELECT * FROM `member` WHERE (`first_name` like '%".$name."%' or `last_name` like '%".$name."%') and status=1 and `user_type`='mentor' ORDER BY `id` DESC");
	return $query->result_array();
	
				//$this -> db -> select('*');
				//$this -> db -> from('member');
				
				//$this -> db -> where('user_type','mentor');
				//if($name!=''){
				//$this-> db -> like('first_name',$name);
				//$this-> db -> or_like('last_name',$name);
				//}
				//$this -> db -> where('status',1);
				//$this -> db -> order_by('id','desc');
				//$this -> db -> limit(8);
			  //$query = $this->db->get();
			//return $query->result_array();	
	}
	
	function get_all_member_mentor_admin()
	{
				$this -> db -> select('*');
				$this -> db -> from('member');
				$this -> db -> where('user_type','mentor');
				//$this -> db -> where('status',1);
				$this -> db -> order_by('id','desc');
			  $query = $this->db->get();
			return $query->result_array();	
	}
	
	
	
	function get_memberbyemail($email)
	{
		$this -> db -> select('*');
		$this -> db -> from('member');
		$this -> db -> where('email',$email);
		
		$query = $this->db->get();
		return $query->result_array();	
	
	}
	
	function get_member($id)
	{
	$this->db->select('*');
	$this->db->from('member');
	$this->db->where('id',$id);
	$query=$this->db->get();
	
	if ($query->num_rows()>0) { return $query->row_array();	}
		else { return 'Not found'; }
	
	
	}
	function get_member_mentor($id)
	{
	$this->db->select('*');
	$this->db->from('member');
	$this->db->where('id',$id);
	$query=$this->db->get();
	
	if ($query->num_rows()>0) { return $query->row_array();	}
		else { return 'Not found'; }
	
	
	}
	
	
	
				function edit_member_mentee($data,$id,$image_name){
				
				$this->first_name=$data['first_name'];
				$this->last_name=$data['last_name'];
				
				$this->email=$data['email'];
				
				$this->phone=$data['phone'];
				$this->password=$data['password'];
				if($image_name!=''){
				$this->resume = $image_name;
				}
				$this->country=$data['country'];
				$this->city=$data['city'];
				$this->status=$data['status'];
				$this->db->where('id',$id);
				$this->db->update('member',$this);		
				}
				function edit_member_mentor($data,$id,$image_name){
				
				$this->first_name=$data['first_name'];
				$this->last_name=$data['last_name'];
				$this->email=$data['email'];
				$this->phone=$data['phone'];
				
				
				$this->country=$data['country'];
				$this->city=$data['city'];
				
				if($image_name!=''){
				$this->resume = $image_name;
				}
				
				$this->password=$data['password'];
				$this->status=$data['status'];
				$this->db->where('id',$id);
				$this->db->update('member',$this);		
				}
				
		
		function delete_restaurant_owner($id)
		{
		$this->db->where('id', $id);
         $this->db->delete('restaurant_owner');

		}
		function delete_member_mentor($id)
		{
		$this->db->where('id', $id);
         $this->db->delete('member');

		}
		function country()
		{
			$this->db->select('*');
			$this->db->from('country');
			$this->db->where('countryname','Portugal');			
			$this->db->group_by('countryname');
			$query=$this->db->get();
			return $query->row_array();
			
		
		}
		
		function get_state($id)
		{
			$this->db->select('*');
			$this->db->from('country');
			$this->db->where('countryname',$id);
			$query=$this->db->get();
			return $query->result_array();
			
		
		}
		
		
		function get_state1($id)
		{
			$this->db->select('*');
			$this->db->from('country');
			$this->db->where('parentid',$id);
			$query=$this->db->get();
			return $query->result_array();
			
		
		}
		
		
		function get_city($id)
		{
			$this->db->select('*');
			$this->db->from('country');
			$this->db->where('parentid',$id);
			$this->db->order_by('countryname');
			$query=$this->db->get();
			return $query->result_array();
			
		
		}
	
		
			
			function get_view_mentor($id)
	    {
				$this -> db -> select('*');
				$this -> db -> from('member');
				$this -> db -> where('id',$id);
			
				$query = $this->db->get();
			return $query->row_array();	
	    }
		
		
	
			
			function member_login($data){
			
			$this -> db -> select('*');
			        $this -> db ->from('member');
					$this -> db -> where('email', $data['email']);
					$this -> db -> where('password', $data['password']);
					
					$this -> db -> limit(1);
					
					$query = $this -> db -> get();
					
					if($query -> num_rows() == 1) {
					return $query->row();
					} else {
					return FALSE;
					}
			
			}
			
			function mentor_approved($id){
			  $this->status=1;
				$this->db->where('id',$id);
				$this->db->update('member',$this);
			}
			function resume_update($data,$image_name){
			  $this->resume=$image_name;
				$this->db->where('id',$data['user_id']);
				$this->db->update('member',$this);
			}
			function resume_update_mentee($data,$image_name){
			  $this->resume=$image_name;
				$this->db->where('id',$data['user_id']);
				$this->db->update('member',$this);
			}
			
			function mentee_update_pic($image,$user_id)
			{
			    $this->profile_image=$image;
				$this->db->where('id',$user_id);
				$this->db->update('member',$this);
			
			}
		
					function check_exist_mentor($email){
					$this->db->select('email');
					$this->db->from('member');
					$this->db->where('email',$email);
					$query = $this->db->get();
					return $query->num_rows(); 
					
				}
				function check_phone_exist_mentor($phone){
					$this->db->select('phone');
					$this->db->from('member');
					$this->db->where('phone',$phone);
					$query = $this->db->get();
					return $query->num_rows(); 
					
				}
				
				
				function check_exist_mentee($email){
					$this->db->select('email');
					$this->db->from('member');
					$this->db->where('email',$email);
					$query = $this->db->get();
					return $query->num_rows(); 
					
				}
				function member_details($id){
				$this -> db -> select('*');
			$this -> db -> from('member');
			$this -> db -> where('id',$id);
			
			$query = $this->db->get();
			return $query->row_array();	
				}
				
				function member_details_mentee($id){
				$this -> db -> select('*');
			$this -> db -> from('member');
			$this -> db -> where('id',$id);
			
			$query = $this->db->get();
			return $query->row_array();	
				}
			function industry(){
			$this -> db -> select('*');
			$this -> db -> from('industry');
			$this -> db -> where('status',1);
			$query = $this->db->get();
			return $query->result_array();	
				}
				
				function mentor_details($id){
				$this -> db -> select('*');
			$this -> db -> from('member');
			$this -> db -> where('id',$id);
			$query = $this->db->get();
			return $query->row_array();
				}
				function mentee_details($id){
				$this -> db -> select('*');
			$this -> db -> from('member');
			$this -> db -> where('id',$id);
			$query = $this->db->get();
			return $query->row_array();
				}
				function activate_account($uid){
		        $data['activation_code'] = NULL;
		        $data['status'] = 0;
		        $this->db->update('member',$data,array('id'=>$uid));
	            }
				function activate_account_mentee($uid){
		        $data['activation_code'] = NULL;
		        $data['status'] = 1;
		        $this->db->update('member',$data,array('id'=>$uid));
	            }
		function update_editprofile($id,$profile_image_name){
				$this->profile_image = $profile_image_name;
				$this->db->where('id',$id);
				$this->db->update('member',$this);
		}
		
		function update_editprofile_mentor($id,$profile_image_name,$firstname,$lastname,$email,$wechat,$phone,$password,$image_name){
				$this->profile_image = $profile_image_name;
				if($image_name!="")
				{
				 $this->resume=$image_name;
				 }
				$this->first_name = $firstname;
				$this->last_name = $lastname;
				$this->email = $email;
				$this->phone = $phone;
				$this->wechat = $wechat;
				$this->password = $password;
				$this->db->where('id',$id);
				$this->db->update('member',$this);
		}
		function update_editprofile_mentee($school,$industry,$id,$profile_image_name,$first_name,$last_name,$email,$wechat,$password,$phone,$image_name){
		        $this->profile_image=$profile_image_name;
				if($image_name!="")
				{
				 $this->resume=$image_name;
				 }
		        $this->school=$school;
				$this->phone = $phone;
				$this->industry=$industry;
				$this->first_name = $first_name;
				$this->last_name = $last_name;
				$this->email = $email;
				$this->wechat = $wechat;
				$this->password = $password;
				$this->db->where('id',$id);
				$this->db->update('member',$this);
		}
		
		function approved_mentor_update($data,$remainder)
		{
		        $this->remainder=$remainder;
		        $this->price=$data['price'];
				$this->intro=$data['intro'];
				$this->status=1;
				$this->db->where('id',$data['mentor_id']);
				$this->db->update('member',$this);
		
		}
		function industry_count(){
		//$query = $this->db->query("SELECT GROUP_CONCAT(`industry`) AS INDUSTRY  FROM `member` where status=1 and user_type='mentor'");
		$query = $this->db->query("SELECT member_id,`industry` AS INDUSTRY,COUNT(DISTINCT `member_id`) AS COUNT  FROM `mentor_experience` where status=1  GROUP BY `member_id` order by id desc");
	  return $query->result_array();
		//echo $this->db->last_query();  die;
		}
		function search_member_mentor($industry,$location_first,$service){
		//echo $service; die;
		  $this->db->select('*');
		  $this->db->from('mentor_experience');
		  if($service !="" && $service !="All")
			{
			$service_array=explode(',',$service);
			$this->db->join('remainder','mentor_experience.member_id=remainder.member_id');
			$this->db->where_in('remainder.remainder',$service_array);
			
			}
		  
			if($industry!='All' && $industry!=''){
		  $this->db->where("FIND_IN_SET(mentor_experience.industry,'".$industry."') !=", 0);
			}
			
			if($location_first=='us'){
			 $this->db->where("FIND_IN_SET(mentor_experience.country,'229,239')!=",0);
			}else if($location_first=='asia'){
			$this->db->where("!FIND_IN_SET(mentor_experience.country,'229,239')!=",0);
			}
			
			$this->db->where('mentor_experience.status','1');
			//$this->db->where('user_type','mentor');
			$this->db->group_by("mentor_experience.member_id");
			$this-> db ->order_by('mentor_experience.id','DESC');
			
		 return $this->db->get()->result_array();
		}
		
		function calender_insert_mentor($data,$book_time,$date,$month,$year,$user_id){
		
		        $this->user_id = $user_id;
				$this->book_time=$book_time;
				$this->date_of_book=$date;
				$this->month=$month;
				$this->year=$year;
				$this->available_date=time();
				$this->status=1;
				$this->db->insert('mentor_book_slot',$this);
				
		}
		
		function calender_update_mentor($data,$id,$user_id){
		
		        $this->booked_by=$user_id;
				$this->booked_date=time();
				$this->db->where('id',$id);
				$this->db->update('mentor_book_slot',$this);
		}
		
		
		function get_booked_date_mentor($user_id){
		
			$this->db->select('*');
			$this->db->from('mentor_book_slot');
			$this->db->where('user_id',$user_id);
		return $this->db->get()->result_array();
		}
		function get_booked_date_mentee($user_id){
		
			$this->db->select('*');
			$this->db->from('mentee_book_slot');
			$this->db->where('user_id',$user_id);
		return $this->db->get()->result_array();
		}
		
		function calender_select_mentor($data,$book_time,$date,$month,$year,$user_id){
		            $this->db->select('*');
					$this->db->from('mentor_book_slot');
					$this->db->where('user_id',$user_id);
					$this->db->where('book_time',$book_time);
					$this->db->where('date_of_book',$date);
					$this->db->where('month',$month);
					$this->db->where('year',$year);
					$query = $this->db->get();
					return $query->num_rows();
		}
		
		function session_deatails(){
		
		    $this->db->select('*');
			$this->db->from('mentor_book_slot');
			$this->db->where('booked_by !=',0);
			$this->db->where('booked_date !=','');
			$this->db->where('status',1);
			$this->db->order_by('booked_date','DESC');
		    return $this->db->get()->result_array();
		
		}
		function session_deatails_session($data){
		
		    $this->db->select('*');
			$this->db->from('mentor_book_slot');
			$this->db->where('booked_by !=',0);
			$this->db->where('booked_date !=','');
			$this->db->where('status',1);
			if($data['sesion_val']!='all'){
			$this->db->where('live_action',$data['sesion_val']);
			}
			$this->db->order_by('booked_date','DESC');
		    return $this->db->get()->result_array();
		
		}
		
		function session_deatails_mentor($id){
		
		    $this->db->select('*');
			$this->db->from('mentor_book_slot');
			$this->db->where('booked_by !=',0);
			$this->db->where('booked_date !=','');
			$this->db->where('status',1);
			$this->db->where('user_id',$id);
			$this->db->order_by('booked_date','DESC');
		    return $this->db->get()->result_array();
		}
		function session_deatails_mentor_session($id,$data){
		
		    $this->db->select('*');
			$this->db->from('mentor_book_slot');
			$this->db->where('booked_by !=',0);
			$this->db->where('booked_date !=','');
			$this->db->where('status',1);
			$this->db->where('user_id',$id);
			if($data['sesion_val']!='all')
			{
			$this->db->where('live_action',$data['sesion_val']);
			}
			$this->db->order_by('booked_date','DESC');
		    return $this->db->get()->result_array();
		}
		
		
		
		function service_deatails($id){
		    $this->db->select('*');
			$this->db->from('member');
			$this->db->where('id',$id);
			//$this->db->where('status',1);
		    return $this->db->get()->row_array();
		
		}
		
		function mentor_service($id){
		    $this->db->select('*');
			$this->db->from('member');
			$this->db->where('id',$id);
			//$this->db->where('status',1);
		    return $this->db->get()->row_array();
		
		}
		
		function check_user_email($email)
		{
		    $this->db->select('*');
			$this->db->from('member');
			$this->db->where('email',$email);
			//$this->db->where('status',1);
		    return $this->db->get()->row_array();
		
		}
		function update_password($password,$id)
		{
			$this->password=$password;
			$this->db->where('id',$id);
			$this->db->update('member',$this);
		
		}
		function member_details_experience($user_id)
		{
		    $this->db->select('*');
			$this->db->from('mentor_experience');
			$this->db->where('member_id',$user_id);
			$this->db->where('status',1);
			$this->db->order_by('id','ASC');
		    return $this->db->get()->result_array();
		
		}
		function member_details_education($user_id)
		{
		    $this->db->select('*');
			$this->db->from('mentor_education');
			$this->db->where('member_id',$user_id);
			$this->db->where('status',1);
			$this->db->order_by('id','ASC');
		    return $this->db->get()->result_array();
		
		}
		
		
		function mentor_exp_delete($id){
		 $this->db->where('id', $id);
         $this->db->delete('mentor_experience');
		
		}
		function member_location($member_id){
		    $this->db->select('country,city,id');
			$this->db->from('mentor_experience');
			$this->db->where('member_id',$member_id);
			$this->db->where('status',1);
			$this->db->order_by('id','ASC');
			return $this->db->get()->row_array();
		
		}
		function member_location_country($country_id){
		    $this->db->select('countryname');
			$this->db->from('country');
			$this->db->where('id',$country_id);
			return $this->db->get()->row_array();
		
		}
		function member_location_city($city_id){
		    $this->db->select('countryname');
			$this->db->from('country');
			$this->db->where('id',$city_id);
			return $this->db->get()->row_array();
		
		}
		function mentor_experience_details($member_id){
		    $this->db->select('*');
			$this->db->from('mentor_experience');
			$this->db->where('member_id',$member_id);
			return $this->db->get()->result_array();
		
		}
		function mentor_education_details($member_id){
		    $this->db->select('*');
			$this->db->from('mentor_education');
			$this->db->where('member_id',$member_id);
			return $this->db->get()->result_array();
		
		}
		function mentor_name_update($data,$last_name,$id){
		
		        $this->first_name=$data['mentor_name'];
				$this->last_name = $last_name;
				$this->db->where('id',$id);
				$this->db->update('member',$this);
		}
		 function education_member_mentor_admin($id)
		 {
		    $this->db->select('*');
			$this->db->from('mentor_education');
			$this->db->where('member_id',$id);
			return $this->db->get()->result_array();
		 }
		 
		 function experience_member_mentor_admin($id)
		 {
		    $this->db->select('*');
			$this->db->from('mentor_experience');
			$this->db->where('member_id',$id);
			return $this->db->get()->result_array();
		 
		 }
		 function mentee_slot_all($id)
		 {
		    $this->db->select('*');
			$this->db->from('mentor_book_slot');
			$this->db->where('booked_by',$id);
			$this->db->where('status',1);
			$this->db->order_by('id','DESC');
			return $this->db->get()->result_array();
		 
		 }
		  function mentor_slot_all($id)
		 {
		    $this->db->select('*');
			$this->db->from('mentor_book_slot');
			$this->db->where('user_id',$id);
			$this->db->where('status',1);
			$this->db->order_by('id','DESC');
			return $this->db->get()->result_array();
		 
		 }
		 
		 function remainder_fetch($id){
	           
				$this -> db -> select('*');
				$this -> db -> from('remainder');
				$this -> db -> where('member_id',$id);
				
				$query = $this->db->get();
			return $query->result_array();	
	
	}
	function update_user($data,$id,$user_type){
	        $this->first_name=$data['first_name'];
			$this->last_name =$data['last_name'];
			$this->screen_name = $data['screen_name'];
			$this->user_type = $user_type;
			$this->db->where('id',$id);
			$this->db->update('member',$this);
	
	
	}
	function count_education($id)
	{
	            $this -> db -> select('*');
				$this -> db -> from('mentor_education');
				$this -> db -> where('member_id',$id);
				$query = $this->db->get();
			   return $query->num_rows();
	}
	
	function count_experience($id)
	{
	            $this -> db -> select('*');
				$this -> db -> from('mentor_experience');
				$this -> db -> where('member_id',$id);
				$query = $this->db->get();
			   return $query->num_rows();
	}
	
		function get_experience($id)
		{
		
		      $this -> db -> select('*');
				$this -> db -> from('mentor_experience');
				$this -> db -> where('member_id',$id);
				$query = $this->db->get();
			   return $query->row_array();
		
		} 
		
		function get_country($id)
		{
		
		      $this -> db -> select('*');
				$this -> db -> from('country');
				$this -> db -> where('id',$id);
				$query = $this->db->get();
			   return $query->row_array();
		
		} 
		 function mentor_edu_details($id)
		 {
		    $this->db->select('*');
			$this->db->from('mentor_education');
			$this->db->where('member_id',$id);
			return $this->db->get()->row_array();
		 }
		




      function mentee_count_details()
	  {
	        $this->db->select('*');
			$this->db->from('member');
			$this->db->where('user_type','Mentee');
			return $this->db->get()->num_rows();
	  
	  }
	  function mentor_count_details()
	  {
	        $this->db->select('*');
			$this->db->from('member');
			$this->db->where('user_type','Mentor');
			return $this->db->get()->num_rows();
	  
	  }
    
    
		
}


?>