<?php
error_reporting(0);
require_once(APPPATH.'libraries/config.php');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?php echo $title;?> | Restaurant</title>
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
							Manage Invoice
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('restaurant/dashboard'); ?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="<?php echo base_url('restaurant/invoice/create_invoice'); ?>">Manage Invoice</a>
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
								<div class="caption"><i class="icon-edit"></i>Manage Invoice</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									
									<div class="btn-group">
                  <a href="javascript:void(0);" id="create_invoice">
										<button class="btn green">
										Create Invoice
										</button>
                    </a>
					
					
					
									</div>
								</div>
                                                                
                                <div class="table-responsive">
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									
									
									<thead>
										<tr>
										<th>Sl No.</th>
										<th>Order Id</th>
										<th>Total Amount</th>
										<th><center>Action</center></th>
										</tr>
									</thead>
                                    
									
									<tbody>
										<?php 
										$sn=1;


										if(!empty($order))
										{
										foreach($order as $w){
										 $total=0;

										 $order_detail=$this->invoice_model->get_order_detail($w['id']);

										 $check_invoice_created = $this->invoice_model->get_order($w['id']);
//echo '<script type="text/javascript"> alert("'. $check_invoice_created['invoice_created_status'] . '")</script>';
										  foreach($order_detail as $allorder){
										// print_r($allorder);
										 
										  $item_detail=$this->invoice_model->get_item($allorder['menu_id']);
										   $total=$total+$allorder['quantity']*$allorder['menu_price'];
										   
										    if($allorder['adddons']!='')
	  {
	
	   $addon_id= explode(',',$allorder['adddons']);
	  $addons=$this->invoice_model->get_addonsby_id($addon_id);
	
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total=$total+$alladons['price'];
	  }}}
										   
										   
										   
										   
										   
										   
										  }
										 $total=$total+$w['delivery_charge'];
										
										?>
										<tr>
										<td><?php echo $sn;?></td>
										<td><?php echo $w['order_id'];?></td>
									<td class="center">
										<?php echo $dollar;?> <?php echo number_format($total,2); ?>
										
										</td>
										<td>
										<?php
                                                                                if ($check_invoice_created['invoice_created_status'] == '0')
										{
										?>
										<input type="checkbox" class="order" name="order" id="<?php echo $w['id'];?>" value="<?php echo $w['id'];?>">Select Invoice</>
										<?php
										}
										else
										{
 										?>
<input type="checkbox" class="order" name="order" id="<?php echo $w['id'];?>" disabled  value="?php echo $w['id'];?> ">Invoice issued</>
										<?php
										}
										?>

										</td>
										</tr>
									<?php $sn++;} } else {?>	
									
									
									<tr>
										<td colspan="4"><div class="error" style="margin:10px 0px;">You have no order to create invoice.</div></td>
									
										</tr>
									
									
									
									
									
									<?php } ?>
									
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

<form name="" action="<?php  echo base_url('restaurant/invoice/insert'); ?>" id="invoice_form" method="post">
<input type="hidden" name="order_id" id="order_id" value="">
</form>

<script>
$(function(){
$("#create_invoice").click(function(){
var order_id=$("#order_id").val();
if(order_id=='')
{
alert('Please select at least one order to  generate invoice');
}
else
{
$("#invoice_form").submit();
}
});
});
</script>
<script>
$(document).ready(function(){

$(".order").live('click',function(){


var order_id = $('.order:checked').map(function(){
		   return $(this).attr('id');
        }).get();
		$("#order_id").val(order_id);
		
		
		
});
});

</script>
