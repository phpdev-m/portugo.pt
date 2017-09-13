<?php

class order_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	
		
	function get_all_orders($user_id)
	{
	    $this -> db -> select('*');
		$this -> db -> from('order');
		$this -> db -> where('customer_id',$user_id);		
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	
	function get_payment_method($order_id)
	{
	   $this->db->select('transaction_mode');
	   $this->db->from('payment');
	   $this->db->where('order_id',$order_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function get_order_detail($order_id)
	{
	 $this->db->select('*');
		  $this->db->from('order_detail');
		  $this->db->where('order_id',$order_id);
		  $query=$this->db->get();
		  return $query->result_array();
	}
	
	
	
	
	
	function get_restaurant_name($id)
	{
	   $this->db->select('restaurant_name,full_address');
	   $this->db->from('restaurant');
	   $this->db->where('id',$id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	
	function get_user_detail($user_id)
	{
	   $this->db->select('*');
	   $this->db->from('users');
	   $this->db->where('user_id',$user_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	
	
	function addres($user_id)
	{
	   $this->db->select('*');
	   $this->db->from('customer_address');
	   $this->db->where('customer_id',$user_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	function addresby_id($address_id)
	{
	   $this->db->select('*');
	   $this->db->from('customer_address');
	   $this->db->where('id',$address_id);
	   $query=$this->db->get();
	   return $query->row_array();
	}
	
	
	
	function insert_menu_cart($data,$ip_address)
			{
			$this->db->select('*');
			$this->db->from('cart');
			$this->db->where('menu_id',$data['menu_id']);
			$query=$this->db->get();
			$cart=$query->row_array();
			$this->ip_address=$ip_address;
			$this->menu_id=$data['menu_id'];
			$this->addons=$data['addons'];
			$this->type=$data['type'];
			$this->restaurant_id=$data['rest_id'];
			if(empty($cart))
			{
			$this->quantity=1;
			$this->db->insert('cart',$this);
			}
			else
			{
			$quantity=$cart['quantity']+1;
			$this->quantity=$quantity;
			$this->db->where('menu_id',$data['menu_id']);
			$this->db->where('restaurant_id',$data['rest_id']);
			$this->db->update('cart',$this);
			}
			}
			
			function update_delivery_type($data,$ip_address)
			{
			$this->type=$data['type'];
			$this->db->where('restaurant_id',$data['rest_id']);
			$this->db->where('ip_address',$ip_address);
			$this->db->update('cart',$this);
			}
			
			 function get_delivery_type($ip_address)
		  {
		   $this->db->select('*');
		  $this->db->from('cart');
		  $this->db->where('ip_address',$ip_address);
		  $query=$this->db->get();
		  return $query->row_array();
		  }
			
			 function get_cart_detail($ip_address)
		  {
		   $this->db->select('*');
		  $this->db->from('cart');
		  $this->db->where('ip_address',$ip_address);
		  $query=$this->db->get();
		  return $query->result_array();
		  }
		  
		  function delete_menu_cart($cart_id)
	{
	$this->db->where('id',$cart_id);
	$this->db->delete('cart',$this);
	}
	
	 function update_quantity($data)
		  {
		
		   $this->quantity=$data['quantity'];
		  $this->db->where('id',$data['cart_id']);
		  $this->db->update('cart',$this);
		  }
		  
		  function insert_guest($data)
		  {
			$this->full_name=$data['full_name'];
			$this->email=$data['email'];
			$this->address_line_1=$data['adress_line_1'];
			$this->address_line_2	=$data['adress_line_2'];
			$this->phone_number	=$data['phone_number'];
			$this->city	=$data['city'];
			$this->postcode=$data['postcode'];
			$this->db->insert('guest',$this);
			 return $this->db->insert_id();
		  
		  }
	function get_guest_detail($guest_id)
		  {
		   $this->db->select('*');
		  $this->db->from('guest');
		  $this->db->where('guest_id',$guest_id);
		  $query=$this->db->get();
		  return $query->row_array();
		  }
		  
function insert_order($data,$restaurant_id,$order_type,$delivery_charge,$estimate_delivery_time)
{
     $order_id='ORD'.rand(1111,9999);
	$this->order_id=$order_id;
	$this->type=$data['user_type'];
	if($data['user_type']=='user')
	{
	$this->customer_id=$data['user_id'];
	}


	if($data['user_type']=='guest')
	{
	$this->guest_id=$data['user_id'];
	}
	else
	{
	$this->guest_id=0;
	}

    
////criado para usar localmente
     $this->service_tax="0";
     $this->vat_tax="0";
     $this->invoice_created_status=0; 
     $this->view=0;
     $this->cancel_reason="  ";

     ///////////////////////////


	$this->restaurant_id=$restaurant_id;

	$this->	delivery_charge=$delivery_charge;
	
	//$this->service_tax=$data['service_tax'];
	//$this->vat_tax=$data['vat_tax'];


	$this->order_date=time();   //usa unix stamp para criar a data 


        //testo o horario recebido . se for 2 numeros identifica entrega imediata e calcula data

        if (strlen($estimate_delivery_time) > 3)
        {
	$this->delivery_time=$estimate_delivery_time;
        }
        else
        {

$time_order=time();

$estimate_time = intval($estimate_delivery_time) * 60;

//echo '<script type="text/javascript"> alert("'.  $estimate_time  . '")</script>';

$order_time = gmdate("H:i ", $time_order + $estimate_time);
$order_date = gmdate("d-m-Y ", $time_order);

$total_time =  $order_date . " " . $order_time;

//echo '<script type="text/javascript"> alert("'.  $total_time  . '")</script>';

        $this->delivery_time=  $total_time ;
        }


	$this->order_type=ucfirst($order_type);
	$this->status=1;
	$this->address_id=$data['address_id'];
	$this->payment_method=$data['payment_method'];
	$this->comments=$data['add_coment'];

   


	if($data['payment_method']!='Cash on Delivery')
	{
	$this->payment_status=1;
	}
	{
	$this->payment_status=1;
	}


//	if($data['payment_method']=='Stripe')
//	{
//	$this->payment_status=0;
	//}
	


//////essa configuracao duplica cada insercao de order em outro table order_reporter - admin/restaurant
         $this->db->insert('order',$this); 
         $id_order =  $this->db->insert_id(); 
         $this->id=$id_order;
         $this->db->insert('order_report',$this); 
         return $id_order;




//config para inserir order
//	$this->db->insert('order',$this);
//	return $this->db->insert_id();


         }




	 function get_order($order_id)
		  {
		   $this->db->select('*');
		  $this->db->from('order');
		  $this->db->where('id',$order_id);
		  $query=$this->db->get();
		  return $query->row_array();
		  }
		
		function update_alladdress($address_id)
		{
		$this->status=0;
		$this->db->where('id',$address_id);
		$this->db->update('customer_address',$this);
		}
		
		
		function get_review($order_id)
		{
		$this -> db -> select('*');
		$this -> db -> from('review');
		$this -> db -> where('order_id',$order_id);
		$query = $this -> db -> get();
		return $query->row_array();
		}
		
		
		function insert_review($data,$customer_id,$rest_id)
		{
		 $this->customer_id=$customer_id;
		  $this->restaurant_id=$rest_id;
		  $this->rating=$data['rating'];
		  $this->message=$data['message'];
		  $this->added_date	=time();
		  $this->order_id=$data['order_id'];
		  $this->db->insert('review',$this);
		}
		
		function get_delivery_time($ip_address)
		{
		$this->db->select('*');
			$this->db->from('delivery_time');
			$this->db->where('ip_address',$ip_address);
			$query=$this->db->get();
			return $query->row_array();

		}
		
		function insert_delivery_time($data,$ip_address,$date_res)
		{
		$this->db->select('*');
			$this->db->from('delivery_time');
			$this->db->where('ip_address',$ip_address);
			$query=$this->db->get();
			$res=$query->num_rows();
			$this->ip_address=$ip_address;
			$this->date_time=$date_res;
			$this->postcode=$data['postcode'];
			
			if($res==0)
			{
			$this->db->insert('delivery_time',$this);
			}
			else
			{
			$this->db->where('ip_address',$ip_address);
			$this->db->update('delivery_time',$this);
			
			}
		}
		
		
		function delete_delivery_time($ip_address)
		{
		
			$this->db->where('ip_address',$ip_address);
			$this->db->delete('delivery_time',$this);

		}
		
		function insert_address($data,$user_id)
	{
		
		$date = date('Y-m-d');
	    $this->customer_id=$user_id;
		//$this->address_tittle=$data['address_tittle'];
		$this->apartment=$data['address'];
		$this->address=$data['addressline_2'];
		$this->added_date=$date;
		$this->city=$data['city'];
		$this->zip_code=$data['postcode'];
		$this->status=1;	
			
	    $this->db->insert('customer_address',$this);
		return $this->db->insert_id();
	}
			
		
	
}

?>
