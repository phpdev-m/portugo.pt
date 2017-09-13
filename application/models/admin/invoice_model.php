<?php
class Invoice_model extends CI_Model{

	 function __construct()
		{
				  // Call the Model constructor
			parent::__construct();
					$this->load->database();
		}
		
		
		
		function get_all_invoice()
		{
		$this -> db -> select('*');
		$this -> db -> from('invoice');
		$query = $this->db->get();
		return $query->result_array();	
		}
		
		
		function update_invoice($status_data,$invoice_id)
	    {
		//echo $status_data;die;		
		$this->status=$status_data;		
		$this->db->where('id', $invoice_id);
		//echo $this->db->last_query();die;		
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
		



//muda status pagamento no invoice efetuado 
		function change_invoice_status($invoice_id)
		{
		$this->status=1;
		$this->paid_date=time();
		$this->db->where('invoice_id',$invoice_id); 
		$this->db->update('invoice',$this);		
                }






	}
?>
