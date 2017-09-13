<?php class invoice extends CI_Controller {
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('logged_in')){

			redirect('admin/login','refresh');

		}
		
		$this->load->helpers('url');
		$this->load->model('admin/order_model');
		$this->load->model('admin/invoice_model');
		$this->load->model('admin/restaurant_model');
$this->load->model('admin/payment_model');		
		$this->data['title'] = 'PortuGo Takeaway';			
	}
	
		
function index()
	{
	

	$this->data['invoice']=$this->invoice_model->get_all_invoice();
	$this->load->view('admin/invoice/track_invoice',$this->data);
	}



//atualiza order  depois que confirma pagto  no admin/track_invoice view e controller invoice/pay 
//muda  no campo payment_status da order


//atualiza payment tables

	function pay()
	{
	$invoice_id=$this->uri->segment(4);

	$this->invoice_model->change_invoice_status($invoice_id);

        $this->order_model->change_order_status($invoice_id);

        $this->payment_model->create_payment($invoice_id);

	redirect('admin/invoice');
	}



}
