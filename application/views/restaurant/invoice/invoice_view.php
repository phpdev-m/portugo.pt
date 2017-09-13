<?php
error_reporting(0);
require_once(APPPATH.'libraries/config.php');
$invoice_id = $this->uri->segment(5);
$session_data=$this->session->userdata('restaurant_logged_in');		    
$rest_id=$session_data['id'];
//echo '<pre>';
//print_r($invoice); die;
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
							View Invoice
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
								<div class="caption"><i class="icon-edit"></i>View invoice Details - <?php echo $invoice['id'];?></div>
								
							</div>
							
</div>                                
                                <?php  //print_r($invoice);die;?>
								<div style="display:block; width:100%; vertical-align:top;margin-top:15px;">
			<div style="display:block; width:100%; vertical-align:top;">
				<!--  Logo  -->
				<div style="display:inline-block; width:100%; padding-bottom:20px;">
					<div style="display:inline-block; width:49%; vertical-align:top;">
						<div style="display:inline-block; width:100%; vertical-align:top; font-size:20px; font-weight:bold; padding-bottom:5px;">Invoice  <?php echo $invoice['invoice']; ?></div>
						<div style="display:inline-block; width:100%; vertical-align:top padding-bottom:5px;;">Invoice Date :  <?php echo date('d M Y',strtotime($invoice['invoice_date'])); ?></div>
						<div style="display:inline-block; width:100%; vertical-align:top; padding-bottom:5px;">Period : (<?php echo date('M Y',strtotime($invoice['invoice_date'])); ?>)</div>
					</div>
					<div style="display:inline-block; width:49%; vertical-align:top; float:right;">					
					<?php $restaurant_logo=$this->invoice_model->logo($invoice['restaurant_id']);
					?>
                    <img src="<?php echo base_url(); ?>image_gallery/restaurant_logo/<?php echo $restaurant_logo['restaurant_logo']?>" alt="Logo" width="20%" title="Go Takeway" style="float:right;">
                    
					</div>
				</div>
				<!--  Address  -->
                
                <?php
				$restaurant = $this->restaurant_model->get_restaurant_detail($invoice['restaurant_id']);
				$city = $this->restaurant_model->get_city($restaurant['city']);								
				?>
                
				<div style="display:inline-block; width:100%; border-top:1px solid #000; padding-top:20px;">
					<div style="display:inline-block; width:49%; vertical-align:top;">
						<div style="width:100%; font-family:Arial; font-size:13px; font-weight:bold;">Restaurant</div>
						<div style="display:block; width:100%; font-family:Arial; font-size:13px;"><?php echo ucwords($restaurant['restaurant_name']); ?></div>
						<div style="display:block; width:100%; font-family:Arial; font-size:13px;"><?php echo ucwords($restaurant['address']); ?>.</div>						<div style="display:block; width:100%; font-family:Arial; font-size:13px;">Zipcode-<?php echo $restaurant['postcode'];?></div>						
                        <div style="display:block; width:100%; font-family:Arial; font-size:13px;"><?php echo $city['countryname']; ?></div>						<div style="display:block; width:100%;">
							<!--<div style="display:inline-block; padding-right:20px; vertical-align:top;font-weight:bold;">Email :</div>-->
							
						</div>
					</div>
					<div style="display:inline-block; width:49%; vertical-align:top; float:right; text-align:right;">
						<div style="display:block; width:100%; font-family:Arial; font-size:13px;">
							<!--<div style="display:inline-block; padding-right:20px; vertical-align:top; font-weight:bold;">Address :</div>-->
							
						<div style="display:block; width:100%;">
							<!--<div style="display:inline-block; padding-right:20px; vertical-align:top;font-weight:bold;">Telephone :</div>-->
							<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Tel : </span><?php echo $restaurant['restaurant_phone']; ?></div>
						</div>
						<div style="display:block; width:100%;">
							<!--<div style="display:inline-block; padding-right:20px; vertical-align:top;font-weight:bold;">Email :</div>-->
							<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Email : </span><a href="http://www.comeneat.com/v2/restaurantcp/support@roamsoft.in"><?php echo $restaurant['contact_email']; ?></a></div>
						</div>
						<div style="display:block; width:100%;">
							<!--<div style="display:inline-block; padding-right:20px; vertical-align:top;font-weight:bold;">Website :</div>-->
							<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">Website : </span><?php echo $restaurant['website']; ?></div>
						</div>
						<div style="display:block; width:100%;">
							<!--<div style="display:inline-block; padding-right:20px; vertical-align:top;font-weight:bold;">Email :</div>-->
							<div style="display:inline-block; vertical-align:top;"><span style="font-weight:bold">VAT Registration : </span><?php echo $restaurant['comp_registration_no']; ?></div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Invoice List  -->
			<div style="clear:both;"></div>
			<div style="display:block; width:100%; vertical-align:top; margin-top:15px;margin-bottom:10px;">
				<!--<div style="display:block; width:auto; float:left; font-family:Arial; font-size:16px; font-weight:bold; margin-bottom:15px;border-bottom:1px solid #000; padding-bottom:8px;">Invoice breakdown</div>-->
				<div style="clear:both;"></div>
				<table width="100%" align="center" style="font:13px Arial;">
					<tbody><tr style="border-bottom:1px solid #000; font-size:18px;">
						<th width="70%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; font-weight:bold;">
                        
                        
                        <?php 
						$orders = $this->restaurant_model->get_restaurant_orders($rest_id);
						$total_orders = count($orders);
						$i=0;
						foreach($orders as $all_orders){						
						$i=$all_orders['total_amount']+$i;						
						}																																				
						$payment_by_cash = $this->restaurant_model->get_cash_payment($rest_id);
						$total_cash = count($payment_by_cash);						
						$j=0;
						foreach($payment_by_cash as $all_cash){						
						$j=$all_cash['total_amount']+$j;						
						}
						
						$payment_by_online = $this->restaurant_model->get_online_payment($rest_id);
						$total_online_ammount = count($payment_by_online);
						$k=0;
						foreach($payment_by_online as $all_payment){						
						$k=$all_payment['total_amount']+$k;						
						}
						
						$commission_on_orders = ($i * $restaurant['commission'])/100;
						$payable_invoice = ($k - $commission_on_orders);																
						?>
                        
							<table width="100%" align="center">
								<tbody><tr>
									<td width="70%" align="left">Invoice breakdown</td>
									<td width="30%" style="text-align:right;"></td>
								</tr>
							</tbody></table>
						</th>
						<th width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; font-weight:bold;">Amount</th>
					</tr>
					<tr>
						<td width="70%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">
							<table width="100%" align="center">
								<tbody><tr>
									<td width="70%">Total value for</td>
									<td width="30%" style="text-align:right;"><?php echo $total_orders; ?> orders</td>
								</tr>
							</tbody></table>
						</td>
						<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"><?php echo $dollar; ?> <?php echo number_format($i, 2, '.', ','); ?></td>
					</tr>
					<tr>
						<td width="70%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">
							<table width="100%" align="center">
								<tbody><tr>
									<td width="70%">Customers paid cash for</td>
									<td width="30%" style="text-align:right;"><?php echo $total_cash; ?> orders</td>
								</tr>
							</tbody></table>
						</td>
						<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"><?php echo $dollar; ?> <?php echo number_format($j, 2, '.', ','); ?></td>
					</tr>
					<tr>
						<td width="70%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;">
							<table width="100%" align="center">
								<tbody><tr>
									<td width="70%">Customers prepaid online with card for </td>
									<td width="30%" style="text-align:right;"><?php echo $total_online_ammount; ?> orders</td>
								</tr>
							</tbody></table>
						</td>
						<td width="30%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;"><?php echo $dollar; ?> <?php echo number_format($k, 2, '.', ','); ?></td>
					</tr>
				</tbody></table>
				<table width="100%" align="center" style="font:13px Arial;">
                
                    
					<tbody><tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;"><?php echo $restaurant['commission']; ?>% commission on orders</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;"><?php echo $dollar; ?> <?php echo number_format($commission_on_orders, 2, '.', ','); ?></td>
					</tr>
                    <tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">Card Payment Fee</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; "><?php echo $dollar; ?> 0.00</td>
					</tr>
                    <tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">Total Commission with Card fee</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-bottom:1px solid #ddd9c3;"><?php echo $dollar; ?> <?php echo number_format($commission_on_orders, 2, '.', ','); ?></td>
					</tr>
					<tr>
						<?php /*?><?php /*?><td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;">VAT (20%):</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">$ 0.00</td>
					</tr>
                    <tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">Total amount owed to Come N Eat :</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">$ 0.00</td>
					</tr>
					<tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;">Total owned to restaurant ($ 0.00 - $ 0.00):</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3;">$ 0.00</td>
					</tr>
					<tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">Account balance carried forward from previous invoice (CP218_1001 – 11 Feb 2014)<br>(Note: This should be £0.00 if the previous amount is positive, because it had been paid by Come N Eat )</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right;">$ 0.00</td>
					</tr>
					<tr height="1"><td>&nbsp;</td><td>&nbsp;</td></tr><?php */?>
					<tr>
						<td width="85%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3; font-weight:bold;">Total payable to restaurant (this invoice):</td>
						<td width="15%" style="padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; text-align:right; border-top:1px solid #ddd9c3; font-weight:bold;"><?php echo $dollar; ?> <?php echo number_format($payable_invoice, 2, '.', ','); ?></td>
					</tr>
				</tbody></table>
			</div>
			
			<!-- Site to Restaurant  -->
			<div style="clear:both;"></div>
						
			<!-- Order Detail  -->
			<div style="clear:both;"></div>
			<div style="display:block; width:100%; vertical-align:top; margin-top:15px;margin-bottom:10px; border-top:1px solid #000000; padding-top:15px;">
				<div style="display:block; width:100%; font-family:Arial; font-size:20px; font-weight:bold; margin-bottom:15px;">Order details</div>
				<table width="100%" align="center" style="font-size:13px; font-family:Arial; line-height:22px;">
				<thead>
				  <tr>
					<th style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">#</th>
					<th style=" text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Date</th>
					<th style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Order No</th>
					<th style="text-align:center;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Paid Mtd</th>
                    <th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Sub Total</th>
                    <th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Del.charge</th>
                    <th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Tax</th>
                    <th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Offer(-)</th>
					<th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Grand Total</th>
					<th style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px;font-weight:bold; border-bottom:2px solid #f5950c;">Commission</th>
					
				  </tr>
				 </thead>
				 <tbody>
				  				  <tr>
					<td colspan="10" align="right" style="text-align:right;padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px; background:#fff;border-bottom:2px solid #f5950c;/*4bacc6*/ font-weight:bold;">Subtotal commission on orders: <?php echo $dollar; ?> <?php echo number_format($commission_on_orders, 2, '.', ','); ?></td>
				 </tr></tbody>
			</table>
			</div>
			
			<div style="clear:both;"></div>
			<div style="display:block; width:100%; vertical-align:top; margin-top:10px;margin-bottom:15px;">
				<!--<div style="display:block; width:100%; font-family:Arial; font-size:16px; font-weight:bold; margin-bottom:5px;">Partner tariff</div>-->
				<div style="display:block; width:100%; font-family:Arial; font-size:13px;margin-bottom:5px;">Your current commission is: <?php echo $restaurant['commission']; ?>% per order</div>
			</div>	
		</div>
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
$('.mentor_approved').on('click',function(){
  $('.checker span').removeClass('checked');
  $('.chk').prop('checked',false);
  $('#price_val').val('');
  $('#intro').val('');
  var mentor_id = $(this).attr('mentor_id');
  $('#mentor_id').val(mentor_id);
  });
});
</script>



<div id="approved" class="modal fade" aria-hidden="true" aria-labelledby="modalLabel" role="dialog" tabindex="-1">
<div class="modal-dialog02">
<div class="modal-content">
<div style="background:#eda17f"><h1 style="margin:0px; padding:20px 40px; font-size:26px; color:#FFF">Approved Mentor !</h1></div>
<div class="modal-header" style="border-bottom:none; overflow:hidden">


<div class="col-lg-12"  style="margin-top:10px; border:#999999 1px solid; padding:10px 0px 20px 10px" >



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>Remainder Section :</strong></td>
    <td>
	<input type="hidden" id="mentor_id">
	<input type="checkbox" id="1" class="chk" name="remainder[]" value="Career Development">Career Development
<input type="checkbox" id="2" class="chk" name="remainder[]" value="Resume Critique">Resume Critique
<input type="checkbox" id="3" class="chk" name="remainder[]" value="Mock Interview">Mock Interview
</td>
  </tr>
  <tr>
    <td><strong>Price per hour :</strong></td>
    <td><input type="text" name="price" id="price_val" value="">$</td>
  </tr>
  <tr>
    <td><strong>Intro :</strong></td>
    <td><textarea name="intro" id="intro"></textarea></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td><input  type="button" class="btn green submit" value="Submit">&nbsp;<input type="button" class="btn red cancel" value="Cancel"></td>
  </tr>
</table>

 </div>





</div>

</div>
</div>
</div>
<script>
$(function(){
$('.submit').on('click',function(){
 var mentor_id = $('#mentor_id').val();
  var remainder = $('.chk:checked').map(function(){
		        return $(this).val();
                }).get();
  var price = $('#price_val').val();
  var intro = $('#intro').val();
  //alert(mentor_id);
  if(mentor_id!='' && remainder!='' && price!='' && intro!=''){
		$.ajax({
		type:"POST",
		url:"<?php echo base_url();?>restaurant/member/approved_mentor",
		data:{mentor_id:mentor_id,remainder:remainder,price:price,intro:intro}
		}).done(function(msg){
		//alert(msg); return false;
		window.location.reload();
		});
		
		
		
		}
  
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