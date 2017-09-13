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
	<title><?php echo $title;?> | restaurant Panel</title>
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
							Manage Orders
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('restaurant/dashboard'); ?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="<?php echo base_url('restaurant/order/manage_order'); ?>">Manage Orders</a>
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
								
                            <form  action="<?=base_url()?>restaurant/order/manage_order" method="POST">	
								
								<div class="span4">
								<input type="text" id="datepicker"  name="datefrom" value="<?=@$_POST['datefrom']?>"  placeholder="Date From"  /></div>
								
								<div class="span3" style="margin-right:70px;"><input type="text" id="datepicker1" name="dateto" value="<?=@$_POST['dateto']?>"  placeholder="Date To"  /></div>
								<div class="span4"><button class="btn green" name="submit" value="submit">Search </button>
								
								</div>
								</form>


								
								</div>
                                                                
                                <div class="table-responsive">
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									
									
									<thead>
										
										
										<tr>
										<!--<th>Sl No.</th>-->
										<th><?php echo $this->lang->line('Rest_Order_Id'); ?></th>
										<th><?php echo $this->lang->line('Rest_Customer_Name'); ?></th>
										<th><?php echo $this->lang->line('Restaurant_Name'); ?></th>
										<th><?php echo $this->lang->line('Order_Type'); ?></th>
										
										<!--<th>Coupon Price</th>-->
										<!--<th>Coupon Price</th>
										<th>Total Amount</th>-->
										<th><?php echo $this->lang->line('Delivery_Time'); ?></th>
                                        <!--<th>User Type</th>-->
										<th><?php echo $this->lang->line('Status'); ?></th>
                                        <th><center><?php echo $this->lang->line('Action'); ?></center></th>
										</tr>
									</thead>
                                    
									
									<tbody>
										<?php 
										foreach($order as $w){																					
										?>
										<tr>										
										<td><?php echo $w['order_id'];?></td>
										<td><?php
										if(!empty($w['customer_id'])){
										$customer = $this->order_model->get_customer($w['customer_id']);
										echo ucwords($customer['first_name']).'&nbsp'.ucwords($customer['last_name']);
										}else{
										$guest = $this->order_model->get_guest_detail($w['guest_id']);
										echo ucwords($guest['full_name']);
										}?>
										 </td>
										
										<td><?php 
										$restaurant = $this->order_model->get_restaurant($w['restaurant_id']);

										echo ucwords($restaurant['restaurant_name']);?></td>
										<td><?php echo ucwords($w['order_type']);?></td>
										<!--<td>$&nbsp;<?php echo $w['product_price'];?></td>
										
										<td><?php 
									
										$coupon = $this->order_model->get_coupon($w['restaurant_id'],$w['coupon_id']);
										 echo $coupon['coupon_code'];
										?>
										</td>
										<td>$&nbsp;<?php 
										$coupon = $this->order_model->get_coupon($w['restaurant_id'],$w['coupon_id']);
										echo $coupon['price'];?></td>
										
										<td><?php echo $dollar; ?>&nbsp;<?php echo number_format($w['total_amount'],2,'.', ',');?></td>-->
			                            <td><?php if(!empty($w['delivery_time'])){ echo $w['delivery_time'];} ?></td> 
										 <!--<td><?php if($w['customer_id']){echo 'Registered User';}else{echo 'Guest';}?></td> 
                                        <td class="center"><?php echo $w['flat_house_no'].'&nbsp,'.$w['apartment_name'].'&nbsp,'.$w['zip_code'];?></td>-->										
										<td class="center"><?php if($w['status']==0){ echo '<img style="float:left; margin-top:5px;" src="'.base_url('public/front/images/red.png').'"/>'.$this->lang->line('Cancelled');} if($w['status']==1){echo '<img style="float:left; margin-top:5px;" src="'.base_url('public/front/images/green.png').'"/>'.$this->lang->line('Pending');} if($w['status']==2){echo '<img style="float:left; margin-top:5px;" src="'.base_url('public/front/images/orange.png').'"/>'.$this->lang->line('Processing');}if($w['status']==3){echo '<img style="float:left; margin-top:5px;" src="'.base_url('public/front/images/blue.png').'"/>'.$this->lang->line('Delivered');}?></td>
										<td><center><a href="<?php echo base_url("restaurant/order/order_edit/id/".$w['id']);?>" style="text-decoration:none;"><i class="icon-large icon-edit" style="font-size:20px;"></i>
                                        <a href="<?php echo base_url("restaurant/order/order_view/id/".$w['id']);?>" style="text-decoration:none;"><i class="icon-large icon-eye-open" style="font-size:20px;"></i></a>
                                        </a>
										
										<a href="<?php echo base_url("restaurant/order/delete_order/id/".$w['id']);?>" onClick="return confirm('Are You Sure you want to delete this?');" style="text-decoration:none;"><i class="icon-large icon-trash" style="font-size:20px; color:#FF0000;"></i></a>
                                        </center></td>
										</tr>
									<?php }//$sn++;} ?>	
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

<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $(function() {
    
    $( "#datepicker" ).datepicker({ 
	   
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd'});
  });
  </script>
<script>
  $(function() {
    
    $( "#datepicker1" ).datepicker({ 
	   
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd'});
  });
  </script>
