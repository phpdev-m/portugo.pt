<?php
error_reporting(0);
require_once(APPPATH.'libraries/config.php');
$session_data=$this->session->userdata('restaurant_logged_in');		    
$rest_id=$session_data['id'];
//echo '<pre>';
//print_r($invoices); die;
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?php echo $title;?> | restaurant Panel | Manage Invoices</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url('public/restaurant/assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/plugins/bootstrap/css/bootstrap-responsive.min.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/css/style-metro.css" rel="stylesheet');?>" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/css/style.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/css/style-responsive.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/css/themes/default.css');?>" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo base_url('public/restaurant/assets/plugins/uniform/css/uniform.default.css');?>" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/restaurant/assets/plugins/select2/select2_metro.css');?>" />
	<link rel="stylesheet" href="<?php echo base_url('public/restaurant/assets/plugins/data-tables/DT_bootstrap.css');?>" />
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="../settings/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->   
	<?php $this->load->view('restaurant/segments/header');?>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		<?php $this->load->view('restaurant/segments/sidebar');?> 
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->        
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER -->
						
						<!-- END BEGIN STYLE CUSTOMIZER -->  
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Manage Invoices
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('restaurant/dashboard'); ?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="<?php echo base_url('restaurant/invoice'); ?>">Manage Invoices</a>
								<i class="icon-angle-right"></i>
							
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box red">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Manage Invoices</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
								
                                <div>
                               
</div>                                
                                <div class="table-responsive">
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									
									
									<thead>
										<tr>
										                                        
                                       	<th width="128">Invoice</th>
                                        <th width="83">Month</th>
                                        <th width="205">Restaurant</th>
                                        <th width="211">Invoice Ac Balance</th>
                                         <th width="156">Invoice Period</th>
                                        <th width="105">Invoice Id</th>                                        
                                        <th width="160">Invoice Date</th>                                       		    
					                    <th width="150"><center>Status</center></th>
										
										<th width="98"><center>Action</center></th>
											
										</tr>
									</thead>
                                    
									
									<tbody>
										<?php 
										
						foreach($invoices as $invoice_data){										
					        $restaurant = $this->restaurant_model->get_restaurant_detail($invoice_data['restaurant_id']);
										
										
						$orders = $this->restaurant_model->get_restaurant_orders($rest_id);
						$total_orders = count($orders);
						$i=0;
						foreach($orders as $all_orders){						
						$i=$all_orders['total_amount']+$i;						
						}																																										
						$payment_by_online = $this->restaurant_model->get_online_payment($rest_id);
						$total_online_ammount = count($payment_by_online);
						$k=0;
						foreach($payment_by_online as $all_payment){						
						$k=$all_payment['total_amount']+$k;						
						}
												
						$commission_on_orders = ($i * $restaurant['commission'])/100;
						
																				
										?>
										<tr>
										
                                        <td><?php echo $invoice_data['invoice']; ?></td>
                                        <td><?php echo date('M Y',strtotime($invoice_data['invoice_date'])); ?></td>
                                        <td><?php echo ucfirst($restaurant['restaurant_name']);?></td>
                                        
                                        <td><center><?php echo $dollar; ?> <?php echo number_format($commission_on_orders, 2, '.', ','); ?></center></td>
										<td><center><?php echo date('M Y', strtotime($invoice_data['invoice_period'])); ?></center></td>
                                        <td><center><?php echo $invoice_data['id'];?></center></td>                                            
                                            
                                           <td><?php echo $invoice_data['invoice_date']; ?></td>
                                            
                                           <td><center><?php echo $invoice_data['status'];?></center></td>
                                            
					<td><center><a href="<?php echo base_url();?>restaurant/invoice/invoice_view/id/<?php echo $invoice_data['id'];?>" style="text-decoration:none;"><i class="icon-large icon-eye-open" style="font-size:20px;"></i>
                                        </a>
										&nbsp;&nbsp;
                                       
</center></td>
											
										</tr>
                                        
                                        
                                        
                                        
									<?php $sn++;} ?>	
									</tbody>
                  
								</table>
							 </div>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>
				<!-- END PAGE CONTENT -->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	</div>
	
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<?php $this->load->view('restaurant/segments/footer');?>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-1.10.1.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-migrate-1.2.1.min.js');?>" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js');?>" type="text/javascript"></script>      
	<script src="<?php echo base_url('public/restaurant/assets/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js');?>" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>  
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery.cookie.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/uniform/jquery.uniform.min.js');?>" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url('public/restaurant/assets/plugins/select2/select2.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/restaurant/assets/plugins/data-tables/jquery.dataTables.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/restaurant/assets/plugins/data-tables/DT_bootstrap.js');?>"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url('public/restaurant/assets/scripts/app.js');?>"></script>
	<script src="<?php echo base_url('public/restaurant/assets/scripts/table-editable.js'); ?>"></script>    
	<script>
		jQuery(document).ready(function() {       
		   App.init();
		   TableEditable.init();
		});
	</script>
</body>
<!-- END BODY -->
</html>
<script>
$(function(){
$('.cancel').on('click',function(){

   $('#approved').modal('hide');
 
  
  });
});
</script>






<script>
$(function(){
$('.status').on('change',function(){
	//alert();return false;
 var status_data = $(this).val();
  var invoice_id = $(this).attr('id'); 
 		
	  if(invoice_id!=''){
	  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>restaurant/invoice/change_status",
            data:{status_data:status_data,invoice_id:invoice_id}
		}).done(function(msg){
		//alert(msg);
		window.location.reload();
		});
			}
  
 });
});
</script>





<style>

.btn {
    background-color: #e5e5e5;
    background-image: none;
    filter: none;
    border: 0;
    padding: 4px 12px;
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #333333;
    cursor: pointer;
    outline: none;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
    box-shadow: none !important;
    -webkit-border-radius: 0 !important;
    -moz-border-radius: 0 !important;
    border-radius: 0 !important;
    -webkit-text-shadow: none;
    -moz-text-shadow: none;
    text-shadow: none;
}

</style>
