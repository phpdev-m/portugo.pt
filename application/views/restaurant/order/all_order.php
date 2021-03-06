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
	<title><?php echo $title;?> | Restaurant Panel</title>
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
							<?php echo $this->lang->line('Rest_All_Orders'); ?>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('restaurant/dashboard'); ?>"><?php echo $this->lang->line('Home'); ?></a> 
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="<?php echo base_url('restaurant/order/all'); ?>"><?php echo $this->lang->line('Rest_All_Orders'); ?></a>
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
								<div class="caption"><i class="icon-edit"></i><?php echo $this->lang->line('Rest_All_Orders'); ?></div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
								
                            <form  action="<?=base_url()?>restaurant/order/all" method="POST">	
								
								<div class="span4">
								<input type="text" id="datepicker"  name="datefrom" value="<?=@$_POST['datefrom']?>"  placeholder="<?php echo $this->lang->line('Rest_Date_From'); ?>"  /></div>
								
								<div class="span3" style="margin-right:70px;"><input type="text" id="datepicker1" name="dateto" value="<?=@$_POST['dateto']?>"  placeholder="<?php echo $this->lang->line('Rest_Date_To'); ?>"  /></div>
								<div class="span4"><button class="btn green" name="submit" value="submit"><?php echo $this->lang->line('Rest_Search'); ?> </button>
								
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
										<!--<th><?php //echo $this->lang->line('Rest_Customer_Address'); ?></th>-->
										<th><?php echo $this->lang->line('Rest_Order'); ?></th>
										<th><?php echo $this->lang->line('Rest_Order_Value'); ?></th>
										<th><?php echo $this->lang->line('Rest_Delivery_Time'); ?></th>
                                       <th><?php echo $this->lang->line('Rest_Status'); ?></th>
									    <th><?php echo $this->lang->line('Print_Receipt'); ?></th>
                                        <th><center><?php echo $this->lang->line('Rest_Action'); ?></center></th>
										</tr>
									</thead>
                                    
									
									<tbody>
										<?php 
										foreach($order as $w){	
										
										$order_detail=$this->order_model->get_order_detail($w['id']);
																											
										?>
										<tr>										
										<td><?php echo $w['order_id'];?></td>
										<td><?php
										if($w['customer_id']!=0){
										$customer = $this->order_model->get_customer($w['customer_id']);
										echo ucwords($customer['first_name']).'&nbsp'.ucwords($customer['last_name']);
										}else{
										$guest = $this->order_model->get_guest_detail($w['guest_id']);
										echo ucwords($guest['full_name']);
										}?>
										 </td>
										
										<!--<td><?php 
										
										//if($w['customer_id']!=0){
										//$customer_address = $this->order_model->get_customer_address($w['address_id']);
										//echo ucwords($customer_address['apartment']).','.ucwords($customer_address['address']).','.ucwords($customer_address['city']).','.ucwords($customer_address['zip_code']);
										//}else{
										//$guest = $this->order_model->get_guest_detail($w['guest_id']);
										//echo ucwords($guest['address_line_1']).', '. ucwords($guest['address_line_2']).', '. ucwords($guest['city']).', '. ucwords($guest['postcode']);
										//}?></td>-->
										<td><?php 
										 $total=0;
										 foreach($order_detail as $allorder){
										// print_r($allorder);
										 $item_detail=$this->order_model->get_item($allorder['menu_id']);
										  echo ucwords($item_detail['item_name']).'&nbsp;';
										  $total=$total+$allorder['quantity']*$allorder['menu_price'];
										  	   if($allorder['adddons']!='')
	  {
	
	   $addon_id= explode(',',$allorder['adddons']);
	   $addons=$this->order_model->get_addonsby_id($addon_id);
	
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total=$total+$alladons['price'];
	   }}}
										  }
										
										
										
										
										?>
										
										
										<?php
									 if($w['delivery_charge']!=''){$delivery_charge=$w['delivery_charge'];}else{$delivery_charge=0;}
									  if($w['service_tax']!=''){$service_tax=$w['service_tax'];}else{$service_tax=0;}
									 if($w['vat_tax']!=''){$vat_tax=$w['vat_tax'];}else{$vat_tax=0;}
									 
									  if($w['order_type']!='Delivery')
		 {
		 $delivery_charge=0;
		 }
                                      $total=$total+$delivery_charge;
									 ?>
										
										
										
										</td>
										<td><?php
									 $total=$total+$order['delivery_charge'];
									  echo $dollar; ?> <?php echo number_format($total,2,'.', ',');?></td>


<?php
//echo '<script type="text/javascript"> alert("'. $w['delivery_time']  . '")</script>';
?>




			                            <td><?php if(!empty($w['delivery_time'])){ echo $w['delivery_time'];} ?> </td> 


										<td class="center"><?php if($w['status']==0){ echo '<img style="float:left; margin-top:5px;" src="'.base_url('public/front/images/red.png').'"/>'.$this->lang->line('Cancelled');} if($w['status']==1){echo '<img style="float:left; margin-top:5px;" src="'.base_url('public/front/images/green.png').'"/>'.$this->lang->line('Pending');} if($w['status']==2){echo '<img style="float:left; margin-top:5px;" src="'.base_url('public/front/images/orange.png').'"/>'.$this->lang->line('Processing');}if($w['status']==3){echo '<img style="float:left; margin-top:5px;" src="'.base_url('public/front/images/blue.png').'"/>'.$this->lang->line('Delivered');}?></td>
										<td><a href="javascript:void(0);" class="print" id="print<?php echo $w['id']?>"><?php echo $this->lang->line('Print'); ?></a></td>
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


<script>
$(document).ready(function(){	
$(".print").click(function(){	
var res=$(this).attr('id');
var order_id=res.replace('print','');
$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant/order/order_print_detail'); ?>', 
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

<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js" > </script> 
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
