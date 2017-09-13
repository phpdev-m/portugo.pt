<?php
error_reporting(0);
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?php echo $title;?></title>
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
							Manage Coupon
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="<?php echo base_url('admin/coupon/manage_coupon'); ?>">Manage Coupon</a>
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
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Manage Coupon</div>
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
                  <a href="<?php echo base_url('admin/coupon/add_coupon');?>">
										<button class="btn green">
										Add New <i class="icon-plus"></i>
										</button>
                    </a>
									</div>
								</div>
                                <div>
                               
</div>                                
                                 <div class="table-responsive">
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									
									
									<thead>
										<tr>
										  <th>Sl No.</th>											
										  <th>Coupon Code</th>
                                          <th>Starting Date</th>
                                          <th>Ending Date</th>
                                          <th>Coupon Status</th>
					                      <th>Coupon Type</th>
					                      <th>Discount Amount</th>
								          <th>Coupon Applicable To</th>								  
								          <th>Status</th>
                       
										  <th>Edit</th>
										  <th>Delete</th>										
										</tr>
									</thead>
                                   
									<tbody>
										<?php 
										$sn=1;
										foreach($all_coupons as $w){
										
										?>
										<tr>
										<td><?php echo $sn;?></td>
											<td><?php echo $w['coupon_code']?></td>
											
					                      <td><?php echo $w['starting_date'];?></td> 
                                          <td><?php echo $w['ending_date'];?></td>
										  
										  <td><?php if(time()>=strtotime($w['ending_date'])){ echo "<b style='text-align:center; color:red; font-size:16px;'>Expired</b>";}else{ echo "<b style='text-align:center; color:green; font-size:16px;'>Valid</b>";}?></td>
										  
                                          <td><?php echo $w['coupon_type'];?></td> 
                     
											<td class="center">
											<?php if($w['coupon_type']=='Percentage Amount Coupon'){?>
		                                    <?php echo $w['price'].'%';?>
											<?php }else{ ?>
											$<?php echo $w['price'];?>
											<?php } ?>
                                            </td>
											
											<td class="center">
											<?php
											 $restaurant=$this->coupon_model->get_restaurant($w['coupon_applicableto']);	 
											 ?>
		                                    <?php echo ucfirst($restaurant['restaurant_name']); ?>
											
                                            </td>
											
											<td class="center">
		                                    <?php if($w['status']==0){ echo "Inactive";} if($w['status']==1){echo "Active";}?>
                                            </td>
											
											<td><a href="<?php echo base_url("admin/coupon/edit_coupon/".$w['coupon_id']);?>" style="text-decoration:none;"><i class="icon-large icon-edit" style="font-size:20px;"></i>
</a></td>
											<td><a href="<?php echo base_url("admin/coupon/manage_coupon/".$w['coupon_id']);?>" onClick="return confirm('Are You Sure you want to delete this?');" style="text-decoration:none;"><i class="icon-large icon-trash" style="font-size:20px; color:#FF0000;"></i></a></td>
											
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

