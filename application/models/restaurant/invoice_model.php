<?php
class Invoice_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
		
		public function get_all_invoices($rest_id)
		{
		$this->db->select('*');
		$this->db->from('invoice');
		$this->db->where('restaurant_id',$rest_id);
		$query=$this->db->get();
		return $query->result_array();	
		}
		
		
		function update_invoice($status_data,$invoice_id)
	    {				
		$this->status=$status_data;		
		$this->db->where('id', $invoice_id);				
		$this->db->update('invoice',$this);
	    }
		
		
		
		public function get_invoice($invoice_id)
		{
		$this->db->select('*');
		$this->db->from('invoice');
		$this->db->where('id', $invoice_id);
		$query=$this->db->get();
		return $query->row_array();	
		}
	
		public function logo($restaurant_id)
		{
		$this->db->select('*');
		$this->db->from('restaurant');
		$this->db->where('id',$restaurant_id);
		$query=$this->db->get();
		return $query->row_array();
			
			
		}
		
		
		function get_all_orderforinvoice($rest_id)
		{

		$message = htmlentities('Cash%on%Delivery');

		$this->db->select('*');
		$this->db->from('order');
		//$this->db->where('payment_method !=', $message);
                //$this->db->where('payment_status','1');
		//$this->db->where('invoice_created_status','0');
		$this->db->where('restaurant_id', $rest_id);
		$query = $this->db->get();
		return $query->result_array();


		}

		function get_all_orderbyid($order_ids)
		{
		$this -> db -> select('*');
		$this -> db -> from('order');
		$this->db->where_in('id',$order_ids);
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
		
               public function get_order($id)
                {
                $this->db->select('*');
                $this->db->from('order');
                $this->db->where('id', $id);
                $query=$this->db->get();
                return $query->row_array();     
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
		
		
		function insert_invoice($rest_id,$order_id,$invoice_total,$comission_percent)
		{		
		$this->	restaurant_id=$rest_id;
		$this->	order_id=$order_id;
		$this->total_amount=$invoice_total;
		$this->commission_percent=$comission_percent;
	    $this->	created_date=time();
		$this->	status=0;
		$this->db->insert('invoice',$this);
		}
		
		
		function get_all_invoice($rest_id)
		{
		$this -> db -> select('*');
		$this -> db -> from('invoice');
		$this->db->where('restaurant_id',$rest_id);
		$query = $this->db->get();
		return $query->result_array();	
		}
			

	
	}
