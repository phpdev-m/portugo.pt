<?php
error_reporting(0);
require_once(APPPATH.'libraries/config.php');
$session_data=$this->session->userdata('restaurant_logged_in');
$rest_id=$session_data['id'];
$this->load->model('restaurant/cuisine_model');
$manage_sidebar= $this->cuisine_model->restaurant_logo($rest_id);
?>

<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive restaurant Dashboard Template build with Twitter Bootstrap 2.3.2
Version: 1.4
Author: KeenThemes
Website: http://www.keenthemes.com/preview/?theme=metronic
Purchase: http://themeforest.net/item/metronic-responsive-restaurant-dashboard-template/4021469
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?php echo $title; ?> | Restaurant Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->        
	<link href="<?php echo base_url('public/restaurant/assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/plugins/bootstrap/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/css/style-metro.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/css/style.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/css/style-responsive.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/css/themes/default.css'); ?>" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo base_url('public/restaurant/assets/plugins/uniform/css/uniform.default.css'); ?>" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
	<link href="<?php echo base_url('public/restaurant/assets/plugins/gritter/css/jquery.gritter.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/plugins/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('public/restaurant/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/restaurant/assets/plugins/jqvmap/jqvmap/jqvmap.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
	<link href="<?php echo base_url('public/restaurant/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
	<!-- END PAGE LEVEL PLUGIN STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES --> 
	<link href="<?php echo base_url('public/restaurant/assets/css/pages/tasks.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
	<!-- END PAGE LEVEL STYLES -->
	
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->   
	<?php $this->load->view('restaurant/segments/header');?>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
    
		<!-- BEGIN SIDEBAR -->
    <?php $this->load->view('restaurant/segments/sidebar');?> 	
		<!-- END SIDEBAR -->
        
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Widget Settings</h3>
				</div>
				<div class="modal-body">
					Widget settings form goes here
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
							<?php echo $this->lang->line('Rest_Dashboard')?> <!--<small>Welcome To restaurant Area</small>-->
						</h3>
						
						
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<div id="dashboard">
					<!-- BEGIN DASHBOARD STATS -->
					<div class="row-fluid">
					
					<div class="span3 responsive" data-tablet="span4" data-desktop="span4">
							<div style="text-align:center">
							<h3 style=" font-size:20px"><i class="icon-food" style="color:#666666; font-size:21px"></i>&nbsp;<?php echo $this->lang->line('Rest_Pending'); ?> <?php echo $this->lang->line('Rest_Orders'); ?></h3>
							
                            <a href="<?php echo base_url("restaurant/order/pending");?>"><h2><strong style="color:red" id="pending_total"><?php $pending_order = $this->dashboard_model->pending_order($rest_id);
										echo $pending_order;?></strong></h2></a>
										
								<input type="hidden" name="" id="pending_order" value="<?php echo $pending_order; ?>" >

 

		
										
							</div>
						</div>
					
					
					
						<div class="span3 responsive" data-tablet="span4" data-desktop="span4">
							<div style="text-align:center">
							<h3 style=" font-size:20px"><i class="icon-tasks" style="color:#666666; font-size:21px"></i>&nbsp;<?php echo $this->lang->line('Rest_Total'); ?> <?php echo $this->lang->line('Rest_Orders'); ?></h3>
							<h2><strong><?php $order = $this->dashboard_model->restaurant_order($session_data['id']);
							echo $order;?></strong></h2>
							</div>
						</div>
						
						<div class="span3 responsive" data-tablet="span4" data-desktop="span4">
							<div style="text-align:center">
							<h3 style=" font-size:20px"><i class="icon-shopping-cart" style="color:#666666; font-size:21px"></i>&nbsp;  <?php echo $this->lang->line('Rest_Total_Turnover'); ?> </h3>
							<h2><strong style="color:#00CC33">
						   <?php echo $dollar; ?> <?php 
						   
						   $paid_order = $this->dashboard_model->get_paid_order($rest_id);
						  
						   $total_turnover=0;
						   foreach($paid_order as $all_order)
						   {
						   $order_detail=$this->order_model->get_order_detail($all_order['id']);
						   // print_r($order_detail);
						    foreach($order_detail as $allorder){
							 $item_detail=$this->order_model->get_item($allorder['menu_id']);
							  $total_turnover=$total_turnover+$allorder['quantity']*$allorder['menu_price'];
							   if($allorder['adddons']!='')
	  {
	
	   $addon_id= explode(',',$allorder['adddons']);
	   $addons=$this->order_model->get_addonsby_id($addon_id);
	
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total_turnover=$total_turnover+$alladons['price'];
	   }}}
	   }
						   
						   }
							$total = $turnover;
                            $a=0;
                            foreach($total as $sales){
	                       // $a=$sales['total_amount']+$a;
	                        }
                            echo number_format($total_turnover, 2, '.', ',');?></strong></h2>
							</div>
						</div>
						<div class="span3 responsive" data-tablet="span4" data-desktop="span4">
							<div style="text-align:center">
							<h3 style=" font-size:20px"><i class="icon-tasks" style="color:#666666; font-size:21px"></i>&nbsp<?php echo $this->lang->line('Rest_Total_Commission_Due'); ?> </h3>
							
							
							
							
							 <?php
						$commission=0;
						$total_invoice_amount=0;
						foreach($invoice_amount as $all_invoice_amount)
						{
						$total_invoice_amount=$total_invoice_amount+$all_invoice_amount['total_amount'];
						$invoice_commission=($all_invoice_amount['total_amount']*$all_invoice_amount['commission_percent'])/100;
						$commission=$commission+$invoice_commission;
						}
						$total_outstanding=$total_invoice_amount-$commission;
						?>
							
							
							<h2><strong style="color:red"> <?php echo $dollar; ?><?php 
							
                            echo number_format($commission, 2, '.', ',');?></strong></h2>
							</div>
						</div>
						
						<div class="clearfix"></div>
						<hr>
						</div>
						
						<div class="row-fluid">
							
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
						
							<div class="portlet-title">
							<ul class="nav nav-tabs">
                    	       <li class="active"  id="today" ><a data-toggle="tab" class="tab" style="border-left:none"><?php echo $this->lang->line('Rest_Today'); ?></a></li>
                               <li id="week"><a data-toggle="tab" class="tab"><?php echo $this->lang->line('Rest_Week'); ?></a></li>
							   <li id="month"><a data-toggle="tab" class="tab"><?php echo $this->lang->line('Rest_Month'); ?></a></li>
							   <li id="year"><a data-toggle="tab" class="tab"><?php echo $this->lang->line('Rest_Year'); ?></a></li>
							   
                            </ul>
							</div>
							
							<div class="portlet-body">
                            
								<table class="table" id="today_tbl">
									
									<tbody>
										<tr>
										    <tr><td style="border-top:none;"><strong><?php echo $date = date("l").',&nbsp;'.date('d-M-Y');?></strong></td ><td style="border-top:none;"></td></tr>
										    <tr><td><?php echo $this->lang->line('Rest_Orders_Today'); ?></td><td><?php echo $oneday_order;?></td></tr>
								            <tr><td><?php echo $this->lang->line('Rest_Sales_Today'); ?></td><td><?php echo $dollar; ?> <?php 
											
											  $paid_order_today = $this->dashboard_model->get_paid_order_today($rest_id);
						  
						   $total_turnover=0;
						   foreach($paid_order_today as $all_order)
						   {
						   $order_detail=$this->order_model->get_order_detail($all_order['id']);
						   // print_r($order_detail);
						    foreach($order_detail as $allorder){
							 $item_detail=$this->order_model->get_item($allorder['menu_id']);
							  $total_turnover=$total_turnover+$allorder['quantity']*$allorder['menu_price'];
							   if($allorder['adddons']!='')
	  {
	
	   $addon_id= explode(',',$allorder['adddons']);
	   $addons=$this->order_model->get_addonsby_id($addon_id);
	
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total_turnover=$total_turnover+$alladons['price'];
	   }}}
	   }
						   
						   }
											
											$sale = $oneday_sales;
                                                                        $a=0;
                                                                        foreach($sale as $sales){
	                                                                    $a=$sales['total_amount']+$a;
	                                                                    }
                                                                        echo number_format($total_turnover, 2, '.', ',');?></td></tr>
									        <!--<tr><td>Pending Orders</td><td>0</td></tr>-->
											<tr><td><?php echo $this->lang->line('Rest_Orders-Pending'); ?></td><td><?php echo $oneday_processing_order; ?></td></tr>
								            <tr><td><?php echo $this->lang->line('Rest_Orders-Delivered'); ?></td><td><?php echo $oneday_delivered_order; ?></td></tr>
									        <tr><td><?php echo $this->lang->line('Rest_Orders-Declined'); ?></td><td><?php echo $oneday_cancel_order; ?></td></tr>
										</tr>	
									</tbody>
                                                     
								</table>
								
								<table class="table" id="week_tbl" style=" display:none;">
									
									<tbody>
										<tr>
								      <tr><td><strong><?php echo $this->lang->line('Rest_This_Week'); ?> (<?php echo $this->lang->line('Rest_Week_of'); ?> <?php echo date('M-d-Y', strtotime('previous Monday', strtotime(date('Y-m-d'))));?>)</strong></td><td></td></tr>
										    <tr><td><?php echo $this->lang->line('Rest_Orders_This_Week'); ?></td><td><?php echo $oneweek_order;?></td></tr>
								            <tr><td><?php echo $this->lang->line('Rest_Sales_This_Week'); ?></td><td><?php echo $dollar; ?> <?php
											
											$paid_order_week = $this->dashboard_model->get_paid_order_week($rest_id);
						  
						   $total_turnover=0;
						   foreach($paid_order_week as $all_order)
						   {
						   $order_detail=$this->order_model->get_order_detail($all_order['id']);
						   // print_r($order_detail);
						    foreach($order_detail as $allorder){
							 $item_detail=$this->order_model->get_item($allorder['menu_id']);
							  $total_turnover=$total_turnover+$allorder['quantity']*$allorder['menu_price'];
							   if($allorder['adddons']!='')
	  {
	
	   $addon_id= explode(',',$allorder['adddons']);
	   $addons=$this->order_model->get_addonsby_id($addon_id);
	
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total_turnover=$total_turnover+$alladons['price'];
	   }}}
	   }
						   
						   }
											
											 $sale = $oneweek_sales;
                                                                        $a=0;
                                                                        foreach($sale as $sales){
	                                                                    $a=$sales['total_amount']+$a;
	                                                                    }
                                                                        echo number_format($total_turnover, 2, '.', ',');?></td></tr>
									        <!--<tr><td>Pending Orders</td><td>0</td></tr>-->
											<tr><td><?php echo $this->lang->line('Rest_Orders-Pending'); ?></td><td><?php echo $oneweek_processing_order;?></td></tr>
								            <tr><td><?php echo $this->lang->line('Rest_Orders-Delivered'); ?></td><td><?php echo $oneweek_delivered_order; ?></td></tr>
									        <tr><td><?php echo $this->lang->line('Rest_Orders-Declined'); ?></td><td><?php echo $oneweek_cancel_order; ?></td></tr>
										</tr>	
									</tbody>
                                                     
								</table>
								
								<table class="table" id="month_tbl" style=" display:none;">
									
									<tbody>
										<tr>
								      <tr><td><strong><?php echo $date = date('F');?></strong></td><td></td></tr>
										    <tr><td><?php echo $this->lang->line('Rest_Orders_This_Month'); ?></td><td><?php echo $onemonth_order;?></td></tr>
								            <tr><td><?php echo $this->lang->line('Rest_Sales_This_Month'); ?></td><td><?php echo $dollar; ?> <?php 
											
											$paid_order_month = $this->dashboard_model->get_paid_order_month($rest_id);
						  
						   $total_turnover=0;
						   foreach($paid_order_month as $all_order)
						   {
						   $order_detail=$this->order_model->get_order_detail($all_order['id']);
						   // print_r($order_detail);
						    foreach($order_detail as $allorder){
							 $item_detail=$this->order_model->get_item($allorder['menu_id']);
							  $total_turnover=$total_turnover+$allorder['quantity']*$allorder['menu_price'];
							   if($allorder['adddons']!='')
	  {
	
	   $addon_id= explode(',',$allorder['adddons']);
	   $addons=$this->order_model->get_addonsby_id($addon_id);
	
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total_turnover=$total_turnover+$alladons['price'];
	   }}}
	   }
						   
						   }
											
											$sale = $onemonth_sales;
                                                                        $a=0;
                                                                        foreach($sale as $sales){
	                                                                    $a=$sales['total_amount']+$a;
	                                                                    }
                                                                        echo number_format($total_turnover, 2, '.', ',');?></td></tr>
									        <!--<tr><td>Pending Orders</td><td>0</td></tr>-->
											<tr><td><?php echo $this->lang->line('Rest_Orders-Pending'); ?></td><td><?php echo $onemonth_processing_order;?></td></tr>
								            <tr><td><?php echo $this->lang->line('Rest_Orders-Delivered'); ?></td><td><?php echo $onemonth_delivered_order; ?></td></tr>
									        <tr><td><?php echo $this->lang->line('Rest_Orders-Declined'); ?></td><td><?php echo $onemonth_cancel_order; ?></td></tr>
										</tr>	
									</tbody>
                                                     
								</table>
								
								<table class="table" id="year_tbl" style=" display:none;">
									
									<tbody>
										<tr>
								      <tr><td><strong><?php echo $date = date('Y');?></strong></td><td></td></tr>
										    <tr><td><?php echo $this->lang->line('Rest_Orders_This_Year'); ?></td><td><?php echo $oneyear_order;?></td></tr>
								            <tr><td><?php echo $this->lang->line('Rest_Sales_This_Year'); ?></td><td><?php echo $dollar; ?> <?php
											$paid_order_year = $this->dashboard_model->get_paid_order_year($rest_id);
						  
						   $total_turnover=0;
						   foreach($paid_order_year as $all_order)
						   {
						   $order_detail=$this->order_model->get_order_detail($all_order['id']);
						   // print_r($order_detail);
						    foreach($order_detail as $allorder){
							 $item_detail=$this->order_model->get_item($allorder['menu_id']);
							  $total_turnover=$total_turnover+$allorder['quantity']*$allorder['menu_price'];
							   if($allorder['adddons']!='')
	  {
	
	   $addon_id= explode(',',$allorder['adddons']);
	   $addons=$this->order_model->get_addonsby_id($addon_id);
	
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total_turnover=$total_turnover+$alladons['price'];
	   }}}
	   }
						   
						   }
											
											
											 $sale = $oneyear_sales;
                                                                        $a=0;
                                                                        foreach($sale as $sales){
	                                                                    $a=$sales['total_amount']+$a;
	                                                                    }
                                                                        echo number_format($total_turnover, 2, '.', ',');?></td></tr>
									        <!--<tr><td>Pending Orders</td><td>0</td></tr>-->
											<tr><td><?php echo $this->lang->line('Rest_Orders-Pending'); ?></td><td><?php echo $oneyear_processing_order;?></td></tr>
								            <tr><td><?php echo $this->lang->line('Rest_Orders-Delivered'); ?></td><td><?php echo $oneyear_delivered_order; ?></td></tr>
									        <tr><td><?php echo $this->lang->line('Rest_Orders-Declined'); ?></td><td><?php echo $oneyear_cancel_order; ?></td></tr>
										</tr>	
									</tbody>
                                                     
								</table>
                                
                          </div>
                             
							</div>
						</div>
						
						
						</div>
					</div>
					
							
					
					
					<div class="clearfix"></div>
					
					
					
				</div>
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
	<!-- BEGIN CORE PLUGINS -->   
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-1.10.1.min.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-migrate-1.2.1.min.js') ; ?>" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') ; ?>" type="text/javascript"></script>      
	<script src="<?php echo base_url('public/restaurant/assets/plugins/bootstrap/js/bootstrap.min.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js') ; ?>" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/excanvas.min.js') ; ?>"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/respond.min.js') ; ?>"></script>  
	<![endif]-->   
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery.blockui.min.js') ; ?>" type="text/javascript"></script>  
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery.cookie.min.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/uniform/jquery.uniform.min.js') ; ?>" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jqvmap/jqvmap/jquery.vmap.js') ; ?>" type="text/javascript"></script>   
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') ; ?>" type="text/javascript"></script>  
	<script src="<?php echo base_url('public/restaurant/assets/plugins/flot/jquery.flot.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/flot/jquery.flot.resize.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery.pulsate.min.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/bootstrap-daterangepicker/date.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') ; ?>" type="text/javascript"></script>     
	<!--<script src="<?php echo base_url('public/restaurant/assets/plugins/gritter/js/jquery.gritter.js') ; ?>" type="text/javascript"></script>-->
	<script src="<?php echo base_url('public/restaurant/assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery.sparkline.min.js') ; ?>" type="text/javascript"></script>  
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url('public/restaurant/assets/scripts/app.js') ; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('public/restaurant/assets/scripts/index.js') ; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('public/restaurant/assets/scripts/tasks.js') ; ?>" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {
		   App.init(); // initlayout and core plugins
		   Index.init();
		   Index.initJQVMAP(); // init index page's custom scripts
		   Index.initCalendar(); // init index page's custom scripts
		   Index.initCharts(); // init index page's custom scripts
		   Index.initChat();
		   Index.initMiniCharts();
		   Index.initDashboardDaterange();
		   Index.initIntro();
		   Tasks.initDashboardWidget();
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
<style>
a {
    color: #fff;
    text-shadow: none !important;
}
.nav-tabs > li > a, .nav-pills > li > a {
    line-height: 29px;
    margin-right: 0px;
    padding-left: 20px;
    padding-right: 20px;
}
.table th, .table td {
    border-top: 1px solid #ddd;
    line-height: 32px;
    padding: 8px;
    text-align: left;
    vertical-align: top;
}

.portlet.box > .portlet-title {
    margin-bottom: -25px;
	border-bottom: 1px solid #eee;
    color: #fff !important;
	
}

.nav {
    list-style: outside none none;
    margin-bottom: 20px;
    margin-left: -10px;
	margin-top: -8px;
}

</style>


<script>
$(document).ready(function(){
	$("#user").click(function(){			
     $("#restaurant_tbl").hide();
     $("#user_tbl").show();
    });
});
</script>

<script>
$(document).ready(function(){
$("#restaurant").click(function(){			
$("#user_tbl").hide();
$("#restaurant_tbl").show();
});
});
</script>

<script>
$(document).ready(function(){
	$("#today").click(function(){			
     $("#week_tbl").hide();
	 $("#month_tbl").hide();
	 $("#year_tbl").hide();
     $("#today_tbl").show();
    });
});

$(document).ready(function(){
	$("#week").click(function(){			
     $("#today_tbl").hide();
	 $("#month_tbl").hide();
	 $("#year_tbl").hide();
     $("#week_tbl").show();
    });
});

$(document).ready(function(){
	$("#month").click(function(){			
     $("#week_tbl").hide();
	 $("#today_tbl").hide();
	 $("#year_tbl").hide();
     $("#month_tbl").show();
    });
});

$(document).ready(function(){
	$("#year").click(function(){			
     $("#week_tbl").hide();
	 $("#month_tbl").hide();
	 $("#today_tbl").hide();
     $("#year_tbl").show();
    });
});

</script>



