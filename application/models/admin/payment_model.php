<?php

class payment_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	function get_all_payment($data)
	{
	    $this -> db -> select('*');
		$this -> db -> from('payment');
		if(!empty($data) && $data['restaurant_id']!=''){
		$this->db->where('restaurant_id',$data['restaurant_id']);
		}
		if(!empty($data) && $data['datefrom']!=''){
		$this->db->where('transaction_date >=',$data['datefrom']);
		}
		if(!empty($data) && $data['dateto']!=''){
		$this->db->where('transaction_date <=',$data['dateto']);
		}
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	
	function get_payment($order_id)
	{
	   $this->db->select('*');
	   $this->db->from('order');
	   $this->db->where('order_id',$order_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function restaurant($restaurant_id)
	{
	   $this->db->select('*');
	   $this->db->from('restaurant');
	   $this->db->where('id',$restaurant_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	
	function get_restaurant_payment($rest_id,$data)
	{
	   $this->db->select('*');
	   $this->db->from('payment');
	   $this->db->where('restaurant_id',$rest_id);
	   $query=$this->db->get();
	   return $query->result_array();
	}


function get_all_restaurant()
	{
	    $this -> db -> select('*');
		$this -> db -> from('restaurant');
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	function get_user($order_id){
		$this->db->select('*');
	   $this->db->from('order');
	   $this->db->where('order_id',$order_id);
	   $query=$this->db->get();
	   return $query->row_array(); 
	 }
	 
	 
	 function update_payment_status($status_data,$payment_id)
	    {				
		$this->status=$status_data;		
		$this->db->where('id', $payment_id);		
		$this->db->update('payment_table',$this);
	    }
	



//cria pagamento

function create_payment($invoice_id)
{
//array com dados de  invoice
$result_invoice = $this->db->select('order_id')->from('invoice')->where('invoice_id', $invoice_id)->limit(1)->get()->row_array();
$id = $result_invoice['order_id']; //retorna o numero da order id ex. 5

//array com dados de  order
$result_order = $this->db->select('order_id')->from('order')->where('id', $id)->limit(1)->get()->row_array();
$order_id = $result_order['order_id']; //retorna o numero da order id ex.ORD335


$result_order = $this->db->select('customer_id')->from('order')->where('id', $id)->limit(1)->get()->row_array();
$customer_id = $result_order['customer_id']; 


$result_order = $this->db->select('restaurant_id')->from('order')->where('id', $id)->limit(1)->get()->row_array();
$restaurant_id = $result_order['restaurant_id']; 

$result_order = $this->db->select('payment_method')->from('order')->where('id', $id)->limit(1)->get()->row_array();
$transaction_mode = $result_order['payment_method']; 


//array com dados de order_detail  (**ESTUDAR PARA  RETORNAR TOTAL***
$result_order_menu_price = $this->db->select('menu_price')->from('order_detail')->where('order_id', $id)->limit(1)->get()->row_array();
$result_order_quantity = $this->db->select('quantity')->from('order_detail')->where('order_id', $id)->limit(1)->get()->row_array();
$result_order_charge = $this->db->select('delivery_charge')->from('order')->where('id', $id)->limit(1)->get()->row_array();

$total_amount = ($result_order_menu_price['menu_price'] * $result_order_quantity['quantity']  ) + $result_order_charge['delivery_charge']  ; //retorna to$


$transaction_id =rand(1111,9999);

$data = time();

$this->order_id=$order_id;
$this->user_id=$customer_id;
$this->restaurant_id=$restaurant_id;
$this->transaction_mode=$transaction_mode;
$this->total_amount=$total_amount;
$this->transaction_date=$data;
$this->transaction_id=$transaction_id;
$this->status='1';


//echo '<script type="text/javascript"> alert("'. $invoice_id . '")</script>';
//alert();

        $this->db->insert('payment',$this);
        $this->db->insert_id();   
       }





}

?>
