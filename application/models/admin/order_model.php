<?php

class order_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	
	function insert_user($data)
	{
		
	    $this->first_name=$data['first_name'];
		$this->last_name=$data['last_name'];
		$this->email=$data['email'];
		$this->phone=$data['phone'];
		$this->password=$data['password'];
	    $this->status=$data['status'];
	    $this->db->insert('users',$this);
	}
	
	
	function get_all_order()
	{
	    $this -> db -> select('*');
		$this -> db -> from('order');
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	function get_order_detail($order_id)
		{
		$this -> db -> select('*');
		$this -> db -> from('order_detail');
		$this->db->where('order_id', $order_id);
	    $query = $this->db->get();
		return $query->result_array();
		}
	
	public function get_item($item_id)
		{
		$this->db->select('*');
		$this->db->from('category_items');
		$this->db->where('id', $item_id);
		$query=$this->db->get();
		return $query->row_array();	
		}
	
	function get_addonsby_id($addons_id)
		{
		$this -> db -> select('*');
		$this -> db -> from('menu_extra_items');
		$this-> db ->where_in('id',$addons_id);
	    $query = $this->db->get();
		return $query->result_array();
		}
	
	
	function get_order($id)
	{
	   $this->db->select('*');
	   $this->db->from('order');
	   $this->db->where('id',$id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function delete_order($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('order');
	}
	
	function get_customer($id)
	{
	   $this->db->select('*');
	   $this->db->from('users');
	   $this->db->where('user_id',$id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	
	function get_coupon($restaurant_id,$coupon_id)
	{
	   $this->db->select('*');
	   $this->db->from('coupon');
	   $this->db->where('coupon_applicableto',$restaurant_id);
	   $this->db->where('coupon_id',$coupon_id);
	   $this->db->where('status',1);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function get_restaurant($restaurant_id)
	{
	   $this->db->select('*');
	   $this->db->from('restaurant');
	   $this->db->where('id',$restaurant_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	
	
	function update_order($data,$id)
	{
		
		$this->status=$data['status'];
		$this->cancel_reason=$data['cancel_reason'];
		$this->db->where('id',$id);
		$this->db->update('order',$this);		
	}
	
	function get_guest_detail($guest_id)
	{
	$this->db->select('*');
	   $this->db->from('guest');
	   $this->db->where('guest_id',$guest_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}




//muda status pagamento na order 
                function change_order_status($invoice_id)
                {

$result = $this->db->select('order_id')->from('invoice')->where('invoice_id', $invoice_id)->limit(1)->get()->row_array();
$order_id = $result['order_id'];  //retorna o numero da order id ex. 5

               $this->payment_status=1;
               $this->db->where('id',$order_id);
               $this->db->update('order',$this);            
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

$total_amount = ($result_order_menu_price['menu_price'] * $result_order_quantity['quantity']  ) + $result_order_charge['delivery_charge']  ; //retorna total


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


//echo '<script type="text/javascript"> alert("'. $transaction_date . '")</script>';
//alert();

        $this->db->insert('payment',$this);
        $this->db->insert_id();   
       }




}

?>
