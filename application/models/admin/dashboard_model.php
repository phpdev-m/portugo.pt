<?php
class Dashboard_model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}
	function order(){
		$this->db->select('*');
		$this->db->from('order');
		$query = $this->db->get();
   	    return $query->num_rows;
	}
	
	function total_turnover(){
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where('status',1);
		$query = $this->db->get();
   	    return $query->result_array();
	}
	
	
	function get_paid_order()
	{
	$this->db->select('*');
		$this->db->from('order');
		
		$this->db->where('payment_status',1);
		$query = $this->db->get();
   	     return $query->result_array();
	}
	
	function get_paid_order_today()
	{
	$start=strtotime(date('y-m-d 00:00:00'));
	$end=strtotime(date('y-m-d 23:59:59'));
	$this->db->select('*');
		$this->db->from('order');
		$this->db->where('payment_status',1);
		$this->db->where('order_date >=',$start);
		$this->db->where('order_date <=',$end);
		$query = $this->db->get();
                return $query->result_array();
	}
	
	
	function get_paid_order_week()
	{
	$day = date('w');
        $week_start = date('Y-m-d 00:00:00', strtotime('-'.$day.' days'));
        $week_end = date('Y-m-d 23:59:59', strtotime('+'.(6-$day).' days'));
        $start=strtotime($week_start);
	$end=strtotime($week_end);
	$this->db->select('*');
		$this->db->from('order');
		
		$this->db->where('payment_status',1);
		$this->db->where('order_date >=',$start);
		$this->db->where('order_date <=',$end);
		$query = $this->db->get();
   	        return $query->result_array();
	}
	
	function get_paid_order_month()
	{
	$start=strtotime(date('y-m-01 00:00:00'));
	$end=strtotime(date('y-m-t 23:59:59'));
	$this->db->select('*');
		$this->db->from('order');
		
		$this->db->where('payment_status',1);
		$this->db->where('order_date >=',$start);
		$this->db->where('order_date <=',$end);
		$query = $this->db->get();
   	     return $query->result_array();
	}
	
	
	function get_paid_order_year()
	{
	$start=strtotime(date('Y-01-01 00:00:00'));
		$end=strtotime(date('Y-12-31 23:59:59'));
	$this->db->select('*');
		$this->db->from('order');
		
		$this->db->where('payment_status',1);
		$this->db->where('order_date >=',$start);
		$this->db->where('order_date <=',$end);
		$query = $this->db->get();
   	     return $query->result_array();
	}
	
	/****************customer*****************/
	function get_number_customer(){
		$this->db->select('*');
		$this->db->from('users');
		$query = $this->db->get();
   	    return $query->num_rows();
	}
	
	function get_active_customer(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('status','1');
		$query = $this->db->get(); 
		return $query->num_rows(); 
	}
	
	function get_inactive_customer(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('status','0');
		$query = $this->db->get(); 
		return $query->num_rows(); 
	}
	
	function get_oneweek_customer($date,$week)
		{
			
			$query ="SELECT * FROM `users` WHERE `created_date` between '$week' and '$date'";
			$query = $this->db->query($query);
			return $query->num_rows();
		}	
	
	function get_onemonth_customer($date,$month)
		{
			
			$query ="SELECT * FROM `users` WHERE `created_date` between '$month' and '$date'";
			$query = $this->db->query($query);
			return $query->num_rows();
		}
		
    function get_oneyear_customer($date,$year)
		{
			
			$query ="SELECT * FROM `users` WHERE `created_date` between '$year' and '$date'";
			$query = $this->db->query($query);
			return $query->num_rows();
		}		
	
	/******************Restaurant***************/
	
	function get_number_restaurant(){
		$this->db->select('*');
		$this->db->from('restaurant');
		$query = $this->db->get();
   	    return $query->num_rows();
	}
	
	function get_active_restaurant(){
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('status','1');
		$query = $this->db->get(); 
		return $query->num_rows(); 
	}
	
	function get_inactive_restaurant(){
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('status','0');
		$query = $this->db->get(); 
		return $query->num_rows(); 
	}
	
	function get_oneweek_restaurant($date,$week)
		{
			
			$query ="SELECT * FROM `restaurant` WHERE `created_date` between '$week' and '$date'";
			$query = $this->db->query($query);
			return $query->num_rows();
		}
		
	function get_onemonth_restaurant($date,$month)
		{
			
			$query ="SELECT * FROM `restaurant` WHERE `created_date` between '$month' and '$date'";
			$query = $this->db->query($query);
			return $query->num_rows();
		}
	
	function get_oneyear_restaurant($date,$year)
		{
			
			$query ="SELECT * FROM `restaurant` WHERE `created_date` between '$year' and '$date'";
			$query = $this->db->query($query);
			return $query->num_rows();
		}
	
	/*****************order********************/
	
	function get_oneday_order($date)
		{

                $start=strtotime(date('y-m-d 00:00:00'));
                $end=strtotime(date('y-m-d 23:59:59'));


		$this->db->select('*');
		$this->db->from('order');
		//$this->db->where('order_date',$date);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);

		$query = $this->db->get(); 
		return $query->num_rows(); 
		}
	
	function get_oneweek_order($date,$week)
		{
			
			//$query ="SELECT * FROM `order` WHERE `order_date` between '$week' and '$date'";
			//$query = $this->db->query($query);
			//return $query->num_rows();

            $day = date('w');
            $week_start = date('Y-m-d 00:00:00', strtotime('-'.$day.' days'));
            $week_end = date('Y-m-d 23:59:59', strtotime('+'.(6-$day).' days'));
            $start=strtotime($week_start);
            $end=strtotime($week_end);
            $this->db->select('*');
                $this->db->from('order');
                
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();
		}
	
	function get_onemonth_order($date,$month)
		{
			
			//$query ="SELECT * FROM `order` WHERE `order_date` between '$month' and '$date'";
			//$query = $this->db->query($query);
			//return $query->num_rows();
                $start=strtotime(date('y-m-01 00:00:00'));
                $end=strtotime(date('y-m-t 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();


		}
	
	function get_oneyear_order($date,$year)
		{

// 			$query ="SELECT * FROM `order` WHERE `order_date` between '$year' and '$date'";
// 			$query = $this->db->query($query);
// 			return $query->num_rows();

                 $start=strtotime(date('y-01-01 00:00:00'));
                 $end=strtotime(date('y-12-31 23:59:59'));
                 $this->db->select('*');
                 $this->db->from('order');
                
                 $this->db->where('order_date >=',$start);
                 $this->db->where('order_date <=',$end);
                 $query = $this->db->get();
                 return $query->num_rows();
 

		}
	
	/****************processing_orders*****************/
	
	function get_oneday_processing($date)

                {

                $start=strtotime(date('y-m-d 00:00:00'));
                $end=strtotime(date('y-m-d 23:59:59'));


		$this->db->select('*');
		$this->db->from('order');
//		$this->db->where('order_date',$date);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);

		$this->db->where('status',2);
		$query = $this->db->get(); 
		return $query->num_rows(); 
		}
	
	function get_oneweek_processing($date,$week)
		{
	//		$query ="SELECT * FROM `order` WHERE `order_date` between '$week' and '$date' and status='0'";
//			$query = $this->db->query($query);
//			return $query->num_rows();


            $day = date('w');
            $week_start = date('Y-m-d 00:00:00', strtotime('-'.$day.' days'));
            $week_end = date('Y-m-d 23:59:59', strtotime('+'.(6-$day).' days'));
            $start=strtotime($week_start);
            $end=strtotime($week_end);
            $this->db->select('*');
                $this->db->from('order');
                
                $this->db->where('status',2);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();


		} 
		
	function get_onemonth_processing($date,$month)
		{
//			$query ="SELECT * FROM `order` WHERE `order_date` between '$month' and '$date' and status='0'";
//			$query = $this->db->query($query);
//			return $query->num_rows();

                $start=strtotime(date('y-m-01 00:00:00'));
                $end=strtotime(date('y-m-t 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                
                $this->db->where('',2);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();
		}
	function get_oneyear_processing($date,$year)
		{
			//$query ="SELECT * FROM `order` WHERE `order_date` between '$year' and '$date' and status='0'";
			//$query = $this->db->query($query);
			//return $query->num_rows();
                $start=strtotime(date('Y-01-01 00:00:00'));
                $end=strtotime(date('Y-12-31 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                
                $this->db->where('status',2);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();
		}
		
	/***************delivered_order****************/
	
	function get_oneday_delivered($date)
		{

                $start=strtotime(date('y-m-d 00:00:00'));
                $end=strtotime(date('y-m-d 23:59:59'));


                $this->db->select('*');
                $this->db->from('order');
//              $this->db->where('order_date',$date);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);

                $this->db->where('status',3);
                $query = $this->db->get(); 
                return $query->num_rows(); 

		}
	
	function get_oneweek_delivered($date,$week)
		{
//			$query ="SELECT * FROM `order` WHERE `order_date` between '$week' and '$date' and status='1'";
//			$query = $this->db->query($query);
//			return $query->num_rows();

            $day = date('w');
            $week_start = date('Y-m-d 00:00:00', strtotime('-'.$day.' days'));
            $week_end = date('Y-m-d 23:59:59', strtotime('+'.(6-$day).' days'));
            $start=strtotime($week_start);
            $end=strtotime($week_end);
            $this->db->select('*');
                $this->db->from('order');
                $this->db->where('status',3);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();



		} 
	function get_onemonth_delivered($date,$month)
		{
//			$query ="SELECT * FROM `order` WHERE `order_date` between '$month' and '$date' and status='1'";
//			$query = $this->db->query($query);
//			return $query->num_rows();


                $start=strtotime(date('y-m-01 00:00:00'));
                $end=strtotime(date('y-m-t 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                $this->db->where('status',3);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();


		}
	
	function get_oneyear_delivered($date,$year)
		{
//			$query ="SELECT * FROM `order` WHERE `order_date` between '$year' and '$date' and status='1'";
//			$query = $this->db->query($query);
//			return $query->num_rows();


                $start=strtotime(date('Y-01-01 00:00:00'));
                $end=strtotime(date('Y-12-31 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                $this->db->where('status',3);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();


		}
	
	/****************cancel_order*****************/
	
	
	function get_oneday_cancel($date)
		{

                $start=strtotime(date('y-m-d 00:00:00'));
                $end=strtotime(date('y-m-d 23:59:59'));


                $this->db->select('*');
                $this->db->from('order');
//              $this->db->where('order_date',$date);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);

                $this->db->where('status','0');
                $query = $this->db->get(); 
                return $query->num_rows(); 


		}
	
	function get_oneweek_cancel($date,$week)
		{
//			$query ="SELECT * FROM `order` WHERE `order_date` between '$week' and '$date' and status='0'";
//			$query = $this->db->query($query);
//			return $query->num_rows();

             $day = date('w');
            $week_start = date('Y-m-d 00:00:00', strtotime('-'.$day.' days'));
            $week_end = date('Y-m-d 23:59:59', strtotime('+'.(6-$day).' days'));
            $start=strtotime($week_start);
            $end=strtotime($week_end);
            $this->db->select('*');
                $this->db->from('order');
                
                $this->db->where('status',0);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();



		}
		
	function get_onemonth_cancel($date,$month)
		{
//			$query ="SELECT * FROM `order` WHERE `order_date` between '$month' and '$date' and status='0'";
//			$query = $this->db->query($query);
//			return $query->num_rows();

                $start=strtotime(date('y-m-01 00:00:00'));
                $end=strtotime(date('y-m-t 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                 
                $this->db->where('',0);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();


		}
	
	function get_oneyear_cancel($date,$year)
		{
//			$query ="SELECT * FROM `order` WHERE `order_date` between '$year' and '$date' and status='0'";
//			$query = $this->db->query($query);
//			return $query->num_rows();

         $start=strtotime(date('Y-01-01 00:00:00'));
                $end=strtotime(date('Y-12-31 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                 
                $this->db->where('status',0);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();

		}
	
	/*********************************/
	function get_oneday_sales($date)
		{
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where('transaction_date',$date);
		$this->db->where('status',1);
		$query = $this->db->get(); 
		return $query->result_array(); 
		}
		
	function get_oneweek_sales($date,$week)
		{
			$query ="SELECT * FROM `payment` WHERE `transaction_date` between '$week' and '$date' and status='1'";
			$query = $this->db->query($query);
			return $query->result_array();
		}
		
	function get_onemonth_sales($date,$month)
		{
			$query ="SELECT * FROM `payment` WHERE `transaction_date` between '$month' and '$date' and status='1'";
			$query = $this->db->query($query);
			return $query->result_array();
		}
	
	function get_oneyear_sales($date,$year)
		{
			$query ="SELECT * FROM `payment` WHERE `transaction_date` between '$year' and '$date' and status='1'";
			$query = $this->db->query($query);
			return $query->result_array();
		}
	
	
	
	/****************end dashbord*****************/
	
	function get_number_member(){
		$this->db->select('*');
		$this->db->from('member');
		$query = $this->db->get();
   	return $query->num_rows;
	}
	
	function get_number_challenge(){
		$this->db->select('*');
		$this->db->from('challenge');
		$query = $this->db->get();
   	return $query->num_rows;
	}
	
	function get_recent_challenge(){				
		$this->db->select('*');
		$this->db->from('challenge');
		$this->db->order_by('challenge_id','DESC');
		$query=$this->db->get();
		return $query->result_array();	
	}
	
	function get_recent_ticket(){				
		$this->db->select('*');
		$this->db->from('ticket');
		$query=$this->db->get();
		return $query->result_array();	
	}
	
	function insert_view()
	{
		$this->user_ip=$_SERVER['REMOTE_ADDR'];
		$this->visit=1;
		$this->date=time();
		$this->view_date=date('Y-m-d');
		$this->db->insert('site_view',$this);
	}
	
	function get_num_siteview()
	{
	$this->db->select('*');
	$this->db->from('site_view');
	$query=$this->db->get();
	return $query->num_rows();	
	}
	
	function get_unique_view()
	{
		$this->db->distinct();
	$this->db->select('user_ip');
	$this->db->from('site_view');
	$query=$this->db->get();
	return $query->num_rows();	
	}
	
	
	
	function get_all_invoice()
		{
		$this -> db -> select('*');
		$this -> db -> from('invoice');
		$query = $this->db->get();
		return $query->result_array();	
		}
		
		
	function get_pending_restaurant()
	{
	    $this -> db -> select('*');
		$this -> db -> from('restaurant');
		$this->db->where('approval_status',0);
		$query = $this->db->get();
		return $query->num_rows();	
	}
	
	function get_invoice_amount()
	{
	    $this -> db -> select('*');
		$this -> db -> from('invoice');
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	
		
}

?>
		
