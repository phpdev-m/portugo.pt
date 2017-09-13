<?php
error_reporting(0);
class Dashboard_model extends CI_Model
{	
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}
	function restaurant_order($rest_id){
		$this->db->select('*');
		$this->db->from('order');
		$this->db->where('restaurant_id',$rest_id);
		$query = $this->db->get();
   	    return $query->num_rows;
	}
	
	function get_paid_order($rest_id)
	{
	$this->db->select('*');
		$this->db->from('order');
		$this->db->where('restaurant_id',$rest_id);
		$this->db->where('payment_status',1);
		$query = $this->db->get();
   	     return $query->result_array();
	}
	
	function get_paid_order_today($rest_id)
	{
	$start=strtotime(date('y-m-d 00:00:00'));
	$end=strtotime(date('y-m-d 23:59:59'));
	$this->db->select('*');
		$this->db->from('order');
		$this->db->where('restaurant_id',$rest_id);
		$this->db->where('payment_status',1);
		$this->db->where('order_date >=',$start);
		$this->db->where('order_date <=',$end);
		
		$query = $this->db->get();
   	     return $query->result_array();
	}
	
	
	function get_paid_order_week($rest_id)
	{
	$day = date('w');
        $week_start = date('Y-m-d 00:00:00', strtotime('-'.$day.' days'));
        $week_end = date('Y-m-d 23:59:59', strtotime('+'.(6-$day).' days'));
        $start=strtotime($week_start);
	$end=strtotime($week_end);
	$this->db->select('*');
		$this->db->from('order');
		$this->db->where('restaurant_id',$rest_id);
		$this->db->where('payment_status',1);
		$this->db->where('order_date >=',$start);
		$this->db->where('order_date <=',$end);
		$query = $this->db->get();
   	     return $query->result_array();
	}
	
	function get_paid_order_month($rest_id)
	{
	$start=strtotime(date('y-m-01 00:00:00'));
	$end=strtotime(date('y-m-t 23:59:59'));
	$this->db->select('*');
		$this->db->from('order');
		$this->db->where('restaurant_id',$rest_id);
		$this->db->where('payment_status',1);
		$this->db->where('order_date >=',$start);
		$this->db->where('order_date <=',$end);
		$query = $this->db->get();
   	     return $query->result_array();
	}
	
	
	function get_paid_order_year($rest_id)
	{
		$start=strtotime(date('Y-01-01 00:00:00'));
		$end=strtotime(date('Y-12-31 23:59:59'));
		$this->db->select('*');
		$this->db->from('order');
		$this->db->where('restaurant_id',$rest_id);
		$this->db->where('payment_status',1);
		$this->db->where('order_date >=',$start);
		$this->db->where('order_date <=',$end);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
	function total_rest_turnover($rest_id){
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where('restaurant_id',$rest_id);
		$this->db->where('status',1);
		$query = $this->db->get();
   	    return $query->result_array();
	}
	
	function pending_order($rest_id){
		$this->db->select('*');
		$this->db->from('order');
		$this->db->where('restaurant_id',$rest_id);
		$this->db->where('status','1');
		$query = $this->db->get();
   	    return $query->num_rows;
	}
	
	/****************customer*****************/
	function get_number_customer(){
		$this->db->select('*');
		$this->db->from('users');
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
	
	
	
	
	/*****************order********************/
	
	function get_oneday_order($date,$rest_id)
		{

                $start=strtotime(date('y-m-d 00:00:00'));
                $end=strtotime(date('y-m-d 23:59:59'));


                $this->db->select('*');
                $this->db->from('order');
//              $this->db->where('order_date',$date);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);

		$this->db->where('restaurant_id',$rest_id);
		$query = $this->db->get(); 
		return $query->num_rows(); 
		}
	
	function get_oneweek_order($date,$week,$rest_id)
		{
			
	//		$query ="SELECT * FROM `order` WHERE `order_date` between '$week' and '$date' and restaurant_id='$rest_id'";
	//		$query = $this->db->query($query);
	//		return $query->num_rows();
	
        $day = date('w');
        $week_start = date('Y-m-d 00:00:00', strtotime('-'.$day.' days'));
        $week_end = date('Y-m-d 23:59:59', strtotime('+'.(6-$day).' days'));
        $start=strtotime($week_start);
        $end=strtotime($week_end);
        $this->db->select('*');
                $this->db->from('order');
                $this->db->where('restaurant_id',$rest_id);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
             return $query->num_rows();

	}
	
	function get_onemonth_order($date,$month,$rest_id)
		{
			
//			$query ="SELECT * FROM `order` WHERE `order_date` between '$month' and '$date' and restaurant_id='$rest_id'";
//			$query = $this->db->query($query);
//			return $query->num_rows();


        $start=strtotime(date('y-m-01 00:00:00'));
        $end=strtotime(date('y-m-t 23:59:59'));
        $this->db->select('*');
                $this->db->from('order');
                $this->db->where('restaurant_id',$rest_id);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
             return $query->num_rows();



		}
	
	function get_oneyear_order($date,$year,$rest_id)
		{
			
//			$query ="SELECT * FROM `order` WHERE `order_date` between '$year' and '$date' and restaurant_id='$rest_id'";
//			$query = $this->db->query($query);
//			return $query->num_rows();


                $start=strtotime(date('Y-01-01 00:00:00'));
                $end=strtotime(date('Y-12-31 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                $this->db->where('restaurant_id',$rest_id);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();




		}
	
	/****************pending_orders*****************/
	
	function get_oneday_processing($date,$rest_id)
		{


                $start=strtotime(date('y-m-d 00:00:00'));
                $end=strtotime(date('y-m-d 23:59:59'));


                $this->db->select('*');
                $this->db->from('order');
//              $this->db->where('order_date',$date);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);

		$this->db->where('restaurant_id',$rest_id);
		$this->db->where('status',1);
		$query = $this->db->get(); 
		return $query->num_rows(); 
		}
	
	function get_oneweek_processing($date,$week,$rest_id)
		{
		//	$query ="SELECT * FROM `order` WHERE `order_date` between '$week' and '$date' and status='0' and restaurant_id='$rest_id'";
		//	$query = $this->db->query($query);
		//	return $query->num_rows();


                $start=strtotime(date('y-m-d 00:00:00'));
                $end=strtotime(date('y-m-d 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                $this->db->where('restaurant_id',$rest_id);
                $this->db->where('status',1);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                
                $query = $this->db->get();
                return $query->num_rows();



		} 
		
	function get_onemonth_processing($date,$month,$rest_id)
		{
///			$query ="SELECT * FROM `order` WHERE `order_date` between '$month' and '$date' and status='0' and restaurant_id='$rest_id'";
///			$query = $this->db->query($query);
///			return $query->num_rows();


                $start=strtotime(date('y-m-01 00:00:00'));
                $end=strtotime(date('y-m-t 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                $this->db->where('restaurant_id',$rest_id);
                $this->db->where('status',1);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
             return $query->num_rows();




		}
	function get_oneyear_processing($date,$year,$rest_id)
		{
///			$query ="SELECT * FROM `order` WHERE `order_date` between '$year' and '$date' and status='0' and restaurant_id='$rest_id'";
///			$query = $this->db->query($query);
///			return $query->num_rows();


                $start=strtotime(date('Y-01-01 00:00:00'));
                $end=strtotime(date('Y-12-31 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                $this->db->where('restaurant_id',$rest_id);
                $this->db->where('status',1);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();



		}
		
	/***************delivered_order****************/
	
	function get_oneday_delivered($date,$rest_id)
		{

                $start=strtotime(date('y-m-d 00:00:00'));
                $end=strtotime(date('y-m-d 23:59:59'));


                $this->db->select('*');
                $this->db->from('order');
//              $this->db->where('order_date',$date);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);

		$this->db->where('restaurant_id',$rest_id);
		$this->db->where('status',3);
		$query = $this->db->get(); 
		return $query->num_rows(); 
		}
	
	function get_oneweek_delivered($date,$week,$rest_id)
		{
///			$query ="SELECT * FROM `order` WHERE `order_date` between '$week' and '$date' and status='1' and restaurant_id='rest_id'";
///			$query = $this->db->query($query);
///			return $query->num_rows();


        $day = date('w');
        $week_start = date('Y-m-d 00:00:00', strtotime('-'.$day.' days'));
        $week_end = date('Y-m-d 23:59:59', strtotime('+'.(6-$day).' days'));
        $start=strtotime($week_start);
        $end=strtotime($week_end);
        $this->db->select('*');
                $this->db->from('order');
//              $this->db->where('order_date',$date);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);

                $this->db->where('restaurant_id',$rest_id);
                $this->db->where('status',3);
                $query = $this->db->get(); 
                return $query->num_rows(); 

		} 
	function get_onemonth_delivered($date,$month,$rest_id)
		{
///			$query ="SELECT * FROM `order` WHERE `order_date` between '$month' and '$date' and status='1' and restaurant_id='rest_id'";
///			$query = $this->db->query($query);
//			return $query->num_rows();


        $start=strtotime(date('y-m-01 00:00:00'));
        $end=strtotime(date('y-m-t 23:59:59'));
        $this->db->select('*');
        $this->db->from('order');
//              $this->db->where('order_date',$date);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);

                $this->db->where('restaurant_id',$rest_id);
                $this->db->where('status',3);
                $query = $this->db->get(); 
                return $query->num_rows(); 



		}
	
	function get_oneyear_delivered($date,$year,$rest_id)
		{
///			$query ="SELECT * FROM `order` WHERE `order_date` between '$year' and '$date' and status='1' and restaurant_id='rest_id'";
///			$query = $this->db->query($query);
///			return $query->num_rows();

                $start=strtotime(date('Y-01-01 00:00:00'));
                $end=strtotime(date('Y-12-31 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                $this->db->where('restaurant_id',$rest_id);
                $this->db->where('status',3);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();



		}
	
	/****************cancel_order*****************/
	
	
	function get_oneday_cancel($date,$rest_id)
		{

               $start=strtotime(date('y-m-d 00:00:00'));
                $end=strtotime(date('y-m-d 23:59:59'));


                $this->db->select('*');
                $this->db->from('order');
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);

                $this->db->where('status',0);
                $query = $this->db->get(); 
                return $query->num_rows(); 
		}
	
	function get_oneweek_cancel($date,$week,$rest_id)
		{
//			$query ="SELECT * FROM `order` WHERE `order_date` between '$week' and '$date' and status='2' and restaurant_id='$rest_id'";
//			$query = $this->db->query($query);
//			return $query->num_rows();

        $day = date('w');
        $week_start = date('Y-m-d 00:00:00', strtotime('-'.$day.' days'));
        $week_end = date('Y-m-d 23:59:59', strtotime('+'.(6-$day).' days'));
        $start=strtotime($week_start);
        $end=strtotime($week_end);
        $this->db->select('*');
                $this->db->from('order');
//              $this->db->where('order_date',$date);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);

                $this->db->where('restaurant_id',$rest_id);
                $this->db->where('status', 0);
                $query = $this->db->get(); 
                return $query->num_rows(); 

		}
		
	function get_onemonth_cancel($date,$month,$rest_id)
		{
///			$query ="SELECT * FROM `order` WHERE `order_date` between '$month' and '$date' and status='2' and restaurant_id='$rest_id'";
///			$query = $this->db->query($query);
///			return $query->num_rows();

 $start=strtotime(date('y-m-01 00:00:00'));
        $end=strtotime(date('y-m-t 23:59:59'));
        $this->db->select('*');
        $this->db->from('order');
//              $this->db->where('order_date',$date);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);

                $this->db->where('restaurant_id',$rest_id);
                $this->db->where('status',0);
                $query = $this->db->get(); 
                return $query->num_rows(); 


		}
	
	function get_oneyear_cancel($date,$year,$rest_id)
		{
///			$query ="SELECT * FROM `order` WHERE `order_date` between '$year' and '$date' and status='2' and restaurant_id='$rest_id'";
///			$query = $this->db->query($query);
///			return $query->num_rows();

                $start=strtotime(date('Y-01-01 00:00:00'));
                $end=strtotime(date('Y-12-31 23:59:59'));
                $this->db->select('*');
                $this->db->from('order');
                $this->db->where('restaurant_id',$rest_id);
                $this->db->where('status',0);
                $this->db->where('order_date >=',$start);
                $this->db->where('order_date <=',$end);
                $query = $this->db->get();
                return $query->num_rows();

		}
	




	/*****************sells_order****************/
	function get_oneday_sales($date, $rest_id)
		{
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where('transaction_date',$date);
		$this->db->where('restaurant_id',$rest_id);
		$this->db->where('status',1);
		$query = $this->db->get(); 
		return $query->result_array(); 
		}
		
	function get_oneweek_sales($date,$week,$rest_id)
		{
			$query ="SELECT * FROM `payment` WHERE `transaction_date` between '$week' and '$date' and status='1' and restaurant_id='$rest_id'";			
			$query = $this->db->query($query);
			return $query->result_array();
		}
		
	function get_onemonth_sales($date,$month,$rest_id)
		{
			$query ="SELECT * FROM `payment` WHERE `transaction_date` between '$month' and '$date' and status='1' and restaurant_id='$rest_id'";
			$query = $this->db->query($query);
			return $query->result_array();
		}
	
	function get_oneyear_sales($date,$year,$rest_id)
		{
			$query ="SELECT * FROM `payment` WHERE `transaction_date` between '$year' and '$date' and status='1' and restaurant_id='$rest_id'";
			$query = $this->db->query($query);
			return $query->result_array();
		}
		
		
		
		
   /****************restaurant logo*****************/
   
   function restaurant_logo($rest_id){
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('id',$rest_id);		
		$query = $this->db->get();
   	    return $query->row_array();
	}
	
	
	
	/****************end dashbord*****************/
	public function view_new_order_count($id)
	{   
	$this->db->select('*');
	$this->db->from('order');
	$this->db->where('status',0);
	$this->db->where('restaurant_id',$id);
	$this->db->where('view',0);
	$query = $this->db->get();
  //echo $this->db->last_query();die;	
	return $query->num_rows();
	}
	
	public function view_new_order()
	{   
	$this->db->select('*');
	$this->db->from('order');
	$this->db->where('status',0);
	$this->db->where('view',0);
	$query = $this->db->get();
  
	return $query->result_array();
	}
	
	function get_invoice_amount($rest_id)
	{
	    $this -> db -> select('*');
		$this -> db -> from('invoice');
		$this->db->where('restaurant_id',$rest_id);
		$query = $this->db->get();
		return $query->result_array();	
	}
	
}

?>
		
