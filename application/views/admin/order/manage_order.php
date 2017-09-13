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
	<title><?php echo $title;?> | Admin Panel | Manage Restaurant Owner</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url('public/admin/assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/plugins/bootstrap/css/bootstrap-responsive.min.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/style-metro.css" rel="stylesheet');?>" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/style.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/style-responsive.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/themes/default.css');?>" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo base_url('public/admin/assets/plugins/uniform/css/uniform.default.css');?>" rel="stylesheet" type="text/css"/>



	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/assets/plugins/select2/select2_metro.css');?>" />
	<link rel="stylesheet" href="<?php echo base_url('public/admin/assets/plugins/data-tables/DT_bootstrap.css');?>" />
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="../settings/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->   
	<?php $this->load->view('admin/segments/header');?>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		<?php $this->load->view('admin/segments/sidebar');?> 
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
							Manage Orders
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="<?php echo base_url('admin/order'); ?>">Manage Orders</a>
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
								<div class="caption"><i class="icon-edit"></i>Manage Orders</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									
								</div>
                                                                
                                 <div class="table-responsive">
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									
									
									<thead>
										<tr>
										
										<th>Order Id</th>
										<th>Customer Name</th>
										<th>Restaurant Name</th>
										<th>Order Type</th>
										<th>Delivery Time</th>
                                        <th>User Type</th>
										<th>Status</th>
										<th>Print Receipt</th>
                                        <th><center>Action</center></th>
										</tr>
									</thead>
                                    
									
									<tbody>
<?php
foreach($order as $w){
//print_r($w);
//correcao  das datas
//$timeorder=$order['order_date'];
//$order_time = gmdate("H:i A:", $timeorder);
//$order_date = gmdate("d-m-Y ", $timeorder);
//echo '<script type="text/javascript"> alert("'. $date . '")  </script>';
//echo '<script type="text/javascript"> alert("'. $time . '")  </script>';
$timedelivery=$w['delivery_time'];

//echo '<script type="text/javascript"> alert("'. $timedelivery . '")  </script>';


//$delivery_time = gmdate("H:i A:", $timedelivery);
//$delivery_date = gmdate("d-m-Y ", $timedelivery);
?>
<tr>

										<td><?php echo $w['order_id'];?></td>
										<td><?php
											if(!empty($w['customer_id'])){
											$user_id=$w['customer_id'];
										$customer = $this->order_model->get_customer($user_id);
										echo ucwords($customer['first_name']).'&nbsp'.ucwords($customer['last_name']);
										}else{
											$guest_id=$w['guest_id'];
											
										$guest = $this->order_model->get_guest_detail($guest_id);
										echo ucwords($guest['full_name']);
										}?>
										 </td>
										
										<td><?php 
										$restaurant = $this->order_model->get_restaurant($w['restaurant_id']);

										echo ucwords($restaurant['restaurant_name']);?></td>
										<td><?php echo $w['order_type'];?></td>

<td><?php if($w['delivery_time']!=''){ echo $timedelivery;} ?></td> 
<td><?php if(!empty($w['customer_id'])){echo 'Registered User';}else{echo 'Guest';}?></td>								
										<td class="center"><?php if($w['status']==0){ echo '<span style="color:red"><b>Cancelled</b><span>';} if($w['status']==1){echo '<span style="color:green"><b>Pending</b></span>';} if($w['status']==2){echo '<span style="color:#F93"><b>Processing</b></span>';}if($w['status']==3){echo '<span style="color:blue"><b>Delivered</b></span>';}?></td>
										<!--<td class="center"><?php if($w['status']==0){ echo '<span style="color:#F93"><b>Processing</b></span>';} if($w['status']==1){echo '<span style="color:#35AA47"><b>Delivered</b></span>';}if($w['status']==2){echo '<span style="color:red"><b>Cancelled</b></span>';}?></td>-->
										
										<td><a href="javascript:void(0);" class="print" id="print<?php echo $w['id']?>">Print</a></td>
										
										
										<td><center><a href="<?php echo base_url("admin/order/order_edit/id/".$w['id']);?>" style="text-decoration:none;"><i class="icon-large icon-edit" style="font-size:20px;"></i>
                                        <a  href="<?php echo base_url("admin/order/order_view/id/".$w['id']);?>" style="text-decoration:none;"><i class="icon-large icon-eye-open" style="font-size:20px;"></i></a>
                                        </a>
										
										<a href="<?php echo base_url("admin/order/delete_order/id/".$w['id']);?>" onClick="return confirm('Are You Sure you want to delete this?');" style="text-decoration:none;"><i class="icon-large icon-trash" style="font-size:20px; color:#FF0000;"></i></a>
                                        </center></td>
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
	<?php $this->load->view('admin/segments/footer');?>
	
	
	
	
	
	
	
	
	
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url('public/admin/assets/plugins/jquery-1.10.1.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery-migrate-1.2.1.min.js');?>" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js');?>" type="text/javascript"></script>      
	<script src="<?php echo base_url('public/admin/assets/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js');?>" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>  
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery.cookie.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/uniform/jquery.uniform.min.js');?>" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/select2/select2.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/data-tables/jquery.dataTables.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/data-tables/DT_bootstrap.js');?>"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url('public/admin/assets/scripts/app.js');?>"></script>
	<script src="<?php echo base_url('public/admin/assets/scripts/table-editable.js'); ?>"></script>    
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
$(document).ready(function(){	
$(".print").click(function(){	
var res=$(this).attr('id');
var order_id=res.replace('print','');
$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('admin/order/order_print_detail'); ?>', 
    data: {order_id:order_id}, 
    success: function (data) {
     //alert(data);
	$("#print_order_detail").html(data);
	PrintElem('#print_order_detail')
	}
    });

});
});
</script>


 <script src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js"></script>

<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>


<div id="print_order_detail">
</div>
