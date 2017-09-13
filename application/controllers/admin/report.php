<?php
class report extends CI_Controller
{
	function __construct(){		
		parent::__construct();
		
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login','refresh');
		}
		
		$this->load->helpers('url');
		$this->load->model('admin/payment_model');
		$this->load->model('admin/report_model');
		$this->load->model('admin/order_model');
		$this->load->model('admin/user_model');
		$this->load->model('admin/login_model');
		error_reporting(0);
		$this->data['title'] = 'PortuGo Takeaway';			
	}
	
	function index()
	{
		if($_POST){
			//print_r($_POST);die;
		$this->data['restaurant']=$this->report_model->get_all_restaurant();
		$this->data['report'] = $this->report_model->get_ajax($_POST);
		}else{
	$this->data['restaurant']=$this->report_model->get_all_restaurant();
	$this->data['report']=$this->report_model->get_all_report();
		}	
	$this->load->view('admin/report/report',$this->data);
	}
	
	
	function report_view()
	{
	$order_id=$this->uri->segment(5);
	
	$this->data['order_detail']=$this->report_model->get_order_detail($order_id);
	
	$this->data['order']=$this->report_model->get_report($order_id);	
	$this->load->view('admin/report/report_view',$this->data);
	}
	
	function get_ajax_report() {
	//print_r($_POST);
	$report = $this->report_model->get_ajax_report($_POST);
							
									?>
									
									<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									
									
									<thead>
										<tr>
										<th>Sl No.</th>
										<th>Order Id</th>
										<th>Cust Name</th>
										<th>Cust Email</th>
										<th>Restaurant</th>
										<th>Phone</th>
										<th>Pay Method</th>
										<th>Order date</th>
										<th>Order Price</th>
										<th style="text-align:center">Action</th>
										</tr>
									</thead>
									
									<tbody>
									 
										<?php
										$sn=1;
										foreach($report as $w){
										
										?>
										<tr>
										<td><?php echo $sn;?></td>
										<td><?php echo $w['order_id'];?></td>
										<td><?php
										$customer = $this->order_model->get_customer($w['user_id']);
										echo ucwords($customer['first_name']).'&nbsp'.ucwords($customer['last_name']);?>
										</td>
										<td><?php echo $customer['email'];?></td>
										<td><?php $restaurant = $this->payment_model->restaurant($w['restaurant_id']); 
										echo ucwords($restaurant['restaurant_name']);?></td>
										<td><?php echo $customer['phone'];?></td>
										<td><?php $pay_method = $this->report_model->get_pay_method($w['order_id']); 
										echo ucwords($pay_method['transaction_mode']);?></td>
			                            <td><?php echo date('d-m-Y',strtotime($w['order_date']));?></td> 
                                        <td class="center">$&nbsp;<?php echo number_format($w['total_amount'],2,'.', ',');?></td>										
										
										<td><center><a href="<?php echo base_url("admin/report/report_view/id/".$w['order_id']);?>" style="text-decoration:none;"><i class="icon-large icon-eye-open" style="font-size:20px;"></i></a>
                                        </a>
                                        </center></td>
										</tr>
									<?php $sn++;} ?>
									
									</tbody>
                  
								</table>
<script src="<?php echo base_url('public/admin/assets/scripts/app.js');?>"></script>
<script src="<?php echo base_url('public/admin/assets/scripts/table-editable.js'); ?>"></script>
									
<?php									
	
	}
	
	
	public function manage_report_pdf()
    {
	$this->load->helper(array('dompdf', 'file'));
	$data['title'] = ucwords(str_replace('_',' ',$page));
    if($_POST){
		$data['report'] = $this->report_model->get_ajax($_POST);
		}else{
	$data['report']=$this->report_model->get_all_report();
		}		
	//$data['report']=$this->report_model->get_all_report();
	$this->load->view('admin/report/report_pdf',$data);	
	$html = $this->load->view('admin/report/report_pdf', $data,true);
	pdf_create($html, "Manage-report-".date('Y-m-d h:i:s')."");
	redirect('admin/report');
    }
	
	
	
	public function manage_report_excel()
    {
	
    if($_POST){
		$report = $this->report_model->get_ajax($_POST);
		}else{
	$report=$this->report_model->get_all_report();
		}		
	
	$filename = "report.csv";
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename");  
header("Pragma: no-cache"); 
header("Expires: 0");
$sn=1;
echo 'SN.,' . 'Order Id,'.'Name,'.'Email,'.'Restaurant,'.'Phone,'.'Payment,'.'Date,'. "\r\n";
//echo 'SN.,' . 'Order Id,'.'Name,'.'Email,'.'Restaurant,'.'Phone,'.'Payment,'.'Date,'.'Price,' . "\r\n";
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
$customer = $this->order_model->get_customer($w['customer_id']);
$restaurant = $this->payment_model->restaurant($w['restaurant_id']);
 
    echo '"'.$sn.'",'.'"'.$w['order_id'].'",' . '"'.$user.'",'.'"'.$email.'",'.'"'.ucwords($restaurant['restaurant_name']).'",'.'"'.$phone.'",'.'"'.ucwords($w['payment_method']).'",'.'"'.date('d-m-Y',$w['order_date']).'",' . "\r\n";
	//echo '"'.$sn.'",'.'"'.$w['order_id'].'",' . '"'.$user.'",'.'"'.$email.'",'.'"'.ucwords($restaurant['restaurant_name']).'",'.'"'.$phone.'",'.'"'.ucwords($w['payment_method']).'",'.'"'.date('d-m-Y',$w['order_date']).'",'.'"'.'€'.number_format($w['total_amount'],2,'.', ',').'",' . "\r\n";
	$sn++;
}

    }
	
	
}
