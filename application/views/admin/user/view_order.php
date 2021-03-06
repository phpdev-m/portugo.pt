<?php
error_reporting(0);
$u_id=$this->uri->segment(5);
$id=$this->uri->segment(7);

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?php echo $title; ?> | Admin</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url('public/admin/assets/plugins/bootstrap/css/bootstrap.min.css') ; ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/plugins/bootstrap/css/bootstrap-responsive.min.css') ; ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/plugins/font-awesome/css/font-awesome.min.css') ; ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/style-metro.css') ; ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/style.css') ; ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/style-responsive.css') ; ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/themes/default.css') ; ?>" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo base_url('public/admin/assets/plugins/uniform/css/uniform.default.css') ; ?>" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/assets/plugins/select2/select2_metro.css') ; ?>" />
	<link rel="stylesheet" href="<?php echo base_url('public/admin/assets/plugins/data-tables/DT_bootstrap.css'); ?>" />
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
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
							 View Order
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							
							<li>
								<a href="<?php echo base_url('admin/user'); ?>">Manage Users</a>
								<i class="icon-angle-right"></i>
							
							<li>
								<a href="<?php echo base_url();?>admin/user/order/id/<?php echo $u_id; ?>">Manage Order</a>
								
							
							
						</ul>
						    
						
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
								<div class="caption"><i class="icon-edit"></i>Order view full details - <?php echo $order['order_id'];?></div>
								
						 	</div>
						</div>						 
				    </div>
				</div>
			
				
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div>
							<!--<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Product Details</div>
								
						 	</div>-->
							<div class="portlet-body">
                            
								 <div class="table-responsive">
								<table  class="table table-striped table-hover table-bordered" >
									
									<thead >
										
										   <tr>
										<th>S.No</th>
										<th>Product Name</th>
										<th>Product Price</th>
							            <th>Product QTY</th>
                                        
										<th>Total Price</th>
										</tr>
				                       
									</thead>
                                  
								  <tbody>
                                        
										  <?php 
										 $sn=1;
										  //print_r($order_detail);die;  
											
										  $total=0;
										  foreach($order_detail as $allorder){
										  $item_detail=$this->order_model->get_item($allorder['menu_id']);
										  
										 ?>
										
										 <tr>
									     <td><?php echo $sn;?></td>
										 
										 <td><?php echo ucwords($item_detail['item_name']);?></td>
										 
										 <td><?php echo $allorder['quantity'];?></td>
										 
										 <td><?php echo $dollar; ?><?php echo number_format($allorder['menu_price'],2);?></td>
										 
										 <td><?php echo $dollar; ?>&nbsp;<?php echo number_format($allorder['quantity']*$allorder['menu_price'],2);
										 $total=$total+$allorder['quantity']*$allorder['menu_price'];
										 
										 ?></td>
										 
										 </tr>
										  <?php
				 				 
		   if($allorder['adddons']!='')
	  {
	
	   $addon_id= explode(',',$allorder['adddons']);
	  $addons=$this->order_model->get_addonsby_id($addon_id);
	
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total=$total+$alladons['price'];
	  ?>
										 
										 <tr>
									     <td>&nbsp;</td>
										 
										 <td>Addons:&nbsp;&nbsp;<?php echo ucfirst($alladons['extra_item']); ?></td>
										 
										 <td>&nbsp;</td>
										 
										 <td><?php echo $dollar; ?><?php echo number_format($alladons['price'],2); ?></td>
										 
										 <td><?php echo $dollar; ?><?php  echo number_format($alladons['price'],2); ?>
									  
										 
										</td>
										 
										 </tr>
										 
										<?php }}}?> 
										 
										 
										 
									 <?php $sn++;}  ?>
									 
									 
									 <?php
									 if($order['delivery_charge']!=''){$delivery_charge=$order['delivery_charge'];}else{$delivery_charge=0;}
									  if($order['service_tax']!=''){$service_tax=$order['service_tax'];}else{$service_tax=0;}
									 if($order['vat_tax']!=''){$vat_tax=$order['vat_tax'];}else{$vat_tax=0;}

									 ?>
									 
									 <!-- <tr>
									 
									 <td colspan="3"></td>
									 <td>Vat/Tax</td>
									 <td><?php
									
									  echo $dollar; ?> <?php echo number_format($vat_tax,2);?></td>
									 </tr>
									 
									 
									  <tr>
									 
									 <td colspan="3"></td>
									 <td>Service Tax</td>
									 <td><?php
									
									  echo $dollar; ?> <?php echo number_format($service_tax,2);?></td>
									 </tr>-->
									 
									
									 
									 <tr>
									 
									 <td colspan="3"></td>
									 <td>Delivery Charge</td>
									 <td><?php
									
									  echo $dollar; ?> <?php echo number_format($delivery_charge,2);?></td>
									 </tr>
									 
									 
                                   <tr>
									 
									 <td colspan="3"></td>
									 <td>Total Amount</td>
									 <td><?php
									 $total=$total+$order['delivery_charge'];
									  echo $dollar; ?> <?php echo number_format($total,2,'.', ',');?></td>
									 </tr>
										
                                  </tbody>
								  
								  
								</table>
								
                                
                             </div>
                             </div>
							
						</div>						 
				    </div>
				</div>
				
				<div class="span12" style="margin-top:40px;">
				
				<div class="span5">
				<div class="row-fluid" style="width:500px;">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div >
							<div class="portlet-title">
								<div class="caption" style="font-size:14px;"><strong>Order Details</strong>
 </div>
							</div>
							<div class="portlet-body" style="margin-top:20px;">
                            
								<table class="table1">
									
									<tbody>
										<tr>
										
										    <tr> <td>Order Number </td> <td>: <?php echo $order['order_id'];?></td></tr>
											<tr> <td>Order Type </td> <td>: <?php echo ucwords($order['order_type']);?></td></tr>
											<tr> <td>Delivery Time </td> <td>: <?php if($order['delivery_time']!=''){ echo date('d-m-Y',$order['delivery_time']); ?> <?php echo date('H:i A',$order['delivery_time']);} ?></td></tr>
											
											<tr> <td>Order Date </td> <td>:<?php if($order['order_date']!=''){ echo date('d-m-Y',$order['order_date']); ?> <?php echo date('H:i A',$order['order_date']);} ?></td></tr>
								            <tr><td>Order Status </td> <td>: <?php if($order['status']==0){ echo "Cancelled";} if($order['status']==1){echo "Pending";} if($order['status']==2){echo "Processing";}if($order['status']==3){echo "Delivered";}?>
											<tr><td>Restaurant Name </td> <td> : <?php 
										      $restaurant = $this->user_model->get_restaurant($order['restaurant_id']);
											  echo ucwords($restaurant['restaurant_name']);?></td><tr>
									
									</tbody>
                                                     
								</table>
                                
                             </div>
                             
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
					</div>
					
					
					<div class="span5" style="margin-left:100px;">
					<div class="row-fluid" style="width:500px;">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div>
							<div class="portlet-title">
								<div class="caption" style="font-size:14px;" ><strong>Customer Details</strong></div>
								
							</div>
							<div class="portlet-body" style="margin-top:20px; ">
                            
								
								<table class="table1" id="">
									
									<tbody>
										<tr>
											
										    <tr> <td>User Name </td> <td>: <?php $customer = $this->user_model->get_user($order['customer_id']);
										    echo ucwords($customer['first_name']).'&nbsp'.ucwords($customer['last_name']);?></td></tr>
											<tr> <td> User Email </td> <td>: <?php echo $customer['email'];?></td></tr>
											<tr> <td>User Address </td> <td>: <?php $address = $this->user_model->addres($order['customer_id']);
											echo ucwords($address['apartment']).'&nbsp,'.ucwords($address['address']).'&nbsp,'.ucwords($address['landmark']).'&nbsp,'.ucwords($address['city']).'&nbsp,'.ucwords($address['state']).'&nbsp,'.$address['zip_code'];?></td></tr>
								            <tr> <td>User Phone Number </td> <td>: <?php echo $customer['phone'];?></td></tr>
                                            
											
									</tbody>
                                                     
								</table>
                                
                             </div>
                             
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
					</div>
					
					</div>
					
					
				<div class="span12" style="margin-top:50px; margin-bottom:60px;">
				
				<div class="span5">
				<div class="row-fluid" style="width:500px;">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div >
							<div>
								<div class="caption" style="font-size:14px;"><strong>Payment Details</strong></div>

							</div>
							<div class="portlet-body" style="margin-top:20px;">
                            
								<table class="table1" id="">
									
									<tbody>
										<tr>
											
										    <tr><td>Payment Method </td> <td>: <?php echo ucwords($order['payment_method']); ?></td></tr>
										    
											<tr><td>Payment Status </td> <td>: <?php if($order['payment_status']==0){ echo "Unpaid";} if($order['payment_status']==1){echo "Paid";}?></td></tr>
                                         </tr>    
									</tbody>
                                                     
								</table>
                                
                             </div>
                             
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
					</div>
					
					
					<div class="span5" style="margin-left:100px; display:none;">
					
					</div>
					
					
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
	<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url('public/admin/assets/plugins/jquery-1.10.1.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery-migrate-1.2.1.min.js'); ?>" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js'); ?>" type="text/javascript"></script>      
	<script src="<?php echo base_url('public/admin/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js'); ?>" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="<?php echo base_url('public/admin/assets/plugins/excanvas.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/respond.min.js'); ?>"></script>  
	<![endif]-->   
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>  
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery.cookie.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/uniform/jquery.uniform.min.js'); ?>" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/select2/select2.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url('public/admin/assets/scripts/app.js'); ?>"></script>
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

<style>
.table1 th, .table1 td {
    padding: 8px;
    line-height: 20px;
    text-align: left;
    vertical-align: top;
	
    border:0px;
}

</style>