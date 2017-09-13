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
	<title><?php echo $title;?> | Admin Panel</title>
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
							Manage Reports
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="<?php echo base_url('admin/report');?>">Manage Reports</a>
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
								<div class="caption"><i class="icon-edit"></i>Manage Reports</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
							
								
								<form  action="<?=base_url()?>admin/report" method="POST">	
								<div class="span3">
								     <div class="controls" >
								        <select name="restaurant_id" id="restaurant_id" style="width:250px;">
					                          <option value="">--Select Restaurant--</option>
                                                 <?php 
												foreach($restaurant as $restaurants){?>
												 <option value="<?php echo $restaurants['id']; ?>"<?php if($_POST['restaurant_id']==$restaurants['id']){ echo 'selected="selected"';}?>><?php echo $restaurants['restaurant_name']; ?></option>
												 <?php } ?>
                                             </select>
									</div>
								</div>
								
								<div class="span3">
								<input type="text" id="datepicker"  name="datefrom" value="<?=@$_POST['datefrom']?>"  placeholder="Date From"  /></div>
								
								
								<div class="span2" style="margin-right:70px;"><input type="text" id="datepicker1" name="dateto" value="<?=@$_POST['dateto']?>"  placeholder="Date To"  /></div>
								<div class="span3"><button class="btn green" name="submit" value="submit">Search </button>
								
								<a href="<?php echo base_url();?>admin/report/manage_report_pdf" target="_blank"><button type="button" class="btn green"  name="submit" value="submit"> PDF </button></a>
									<a href="<?php echo base_url();?>admin/report/manage_report_excel" ><button type="button" class="btn green"  name="submit" value="submit"> Excel </button></a>    
								
								</div>
								</form>
										
								
                                                           
                               <div id="report">
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									
									
									<thead>
										<tr>
										<th>Sl No.</th>
										<th>Order Id</th>
										<th>Customer Name</th>
										<th>Customer Email</th>
										<th>Restaurant</th>
										<th>Phone Number</th>
										<th>Payment Method</th>
										<th>Order date</th>
										
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
										if(!empty($w['customer_id'])){
											$user_id=$w['customer_id'];
										$customer = $this->order_model->get_customer($user_id);
										echo ucwords($customer['first_name']).'&nbsp'.ucwords($customer['last_name']);
										}else{
										$guest = $this->order_model->get_guest_detail($w['guest_id']);
										echo ucwords($guest['full_name']);
										}?>
										 </td>
										 <td><?php
										if(!empty($w['customer_id'])){
											$user_id=$w['customer_id'];
										$customer = $this->order_model->get_customer($user_id);
										echo $customer['email'];
										}else{
										$guest = $this->order_model->get_guest_detail($w['guest_id']);
										echo ucwords($guest['email']);
										}?>
										 </td>
										
										<td><?php $restaurant = $this->payment_model->restaurant($w['restaurant_id']); 
										echo ucwords($restaurant['restaurant_name']);?></td>
										<td><?php
										if(!empty($w['customer_id'])){
											$user_id=$w['customer_id'];
										$customer = $this->order_model->get_customer($user_id);
										echo $customer['phone'];
										}else{
										$guest = $this->order_model->get_guest_detail($w['guest_id']);
										echo ucwords($guest['phone_number']);
										}?>
										 </td>
										
										<td><?php echo ucwords($w['payment_method']); ?></td>
			                            <td><?php if($w['order_date']!=''){ echo date('d-m-Y',$w['order_date']); ?> <?php echo date('H:i A',$w['order_date']);} ?></td> 
                                      										
										
										<td><center><a href="<?php echo base_url("admin/report/report_view/id/".$w['id']);?>" style="text-decoration:none;"><i class="icon-large icon-eye-open" style="font-size:20px;"></i></a>
                                        </a>
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
<!--<script>
$(function(){
  $(document).on('change','#restaurant_id',function(){
	  var restaurant = $('#restaurant_id').val();
	  //var date_from = $('#datepicker').val();
	  //var date_to = $('#datepicker1').val();
	 //alert(restaurant);return false;
	  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>admin/report/get_ajax_report",
            data: { restaurant:restaurant},
            success: function(msg){
				//alert(msg);				
				    						
					$('#report').html(msg);					
		     }
		});
	});
});
</script>-->

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
  
