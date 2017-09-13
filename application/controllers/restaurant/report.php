<?php
error_reporting(0);
class report extends CI_Controller
{
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('restaurant_logged_in')){
			redirect('restaurant/login','refresh');
		}
		
		$this->load->helpers('url');
		$this->load->model('restaurant/payment_model');
		$this->load->model('restaurant/report_model');
		$this->load->model('restaurant/order_model');
		$this->load->model('restaurant/user_model');
		$this->load->model('restaurant/login_model');
		$this->load->model('restaurant/cuisine_model');
				
		$this->data['title'] = 'PortuGo Takeaway';			
	}
	
	function index()
	{
	$session_id=$this->session->userdata('restaurant_logged_in');
        $rest_id=$session_id['id'];
	if($_POST){
	$this->data['report'] = $this->report_model->get_ajax($_POST,$rest_id);
	}else{
	$this->data['report']=$this->report_model->get_all_report($rest_id);
	}	
	$this->load->view('restaurant/report/report',$this->data);
	}
	
	
	function report_view()
	{
	$order_id=$this->uri->segment(5);
	
	$this->data['order']=$this->report_model->get_report($order_id);


	$this->data['report_detail']=$this->report_model->get_report_detail($order_id);	

	$this->load->view('restaurant/report/report_view',$this->data);
	}
	

	
	public function manage_report_pdf()
    {
	$this->load->helper(array('dompdf', 'file'));
	$data['title'] = ucwords(str_replace('_',' ',$page));
	$session_id=$this->session->userdata('restaurant_logged_in');
    $rest_id=$session_id['id'];
    if($_POST){
		$data['report'] = $this->report_model->get_ajax($_POST,$rest_id);
		}else{
	$data['report']=$this->report_model->get_all_report($rest_id);
		}		
	$this->load->view('restaurant/report/report_pdf',$data);	
	$html = $this->load->view('restaurant/report/report_pdf', $data,true);
	pdf_create($html, "Manage-report-".date('Y-m-d h:i:s')."");
	redirect('restaurant/report');
    }
	
	
	
	public function manage_report_excel()
    {
	$session_id=$this->session->userdata('restaurant_logged_in');
    $rest_id=$session_id['id'];
    if($_POST){
		$report = $this->report_model->get_ajax($_POST,$rest_id);
		}else{
	$report=$this->report_model->get_all_report($rest_id);
	
		}		
	
	$filename = "report.csv";
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename");  
header("Pragma: no-cache"); 
header("Expires: 0");
$sn=1;
echo 'SN.,' . 'Order Id,'.'Name,'.'Email,'.'Restaurant,'.'Phone,'.'Payment,'.'Date,'. "\r\n";
foreach($report as  $w){
if(!empty($w['customer_id'])){
$customer = $this->order_model->get_customer($w['customer_id']);
$user = ucwords($customer['first_name']);
$email = $customer['email'];
$phone = $customer['phone'];
}else{
$guest = $this->order_model->get_guest_detail($w['guest_id']);
$user = ucwords($guest['full_name']);
$email = $guest['email'];
$phone = $guest['phone_number'];
}
$restaurant = $this->payment_model->restaurant($w['restaurant_id']);
$pay_method = $this->report_model->get_pay_method($w['order_id']); 
    echo '"'.$sn.'",'.'"'.$w['order_id'].'",' . '"'.$user.'",'.'"'.$email.'",'.'"'.ucwords($restaurant['restaurant_name']).'",'.'"'.$phone.'",'.'"'.ucwords($w['payment_method']).'",'.'"'.date('d-m-Y',$w['order_date']).'",' . "\r\n";
	
	$sn++;
}

    }
	
	
}
