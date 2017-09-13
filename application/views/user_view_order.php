<?php
require_once(APPPATH.'libraries/config.php');

//print_r($order);die;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
 <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>public/front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>public/front/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/front/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/front/css/font.css" rel="stylesheet">
     <!-- ...............add................-->
    <link href="<?php echo base_url();?>public/front/css/new_css.css" rel="stylesheet">
     <!-- ...............add................-->
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.min.js"></script>  
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/bootstrap.min.js"></script>
<!--<script src="js/scrolltopcontrol.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/front/css/dd.css" />
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.dd.js"></script>
<script>
$(function(){
 $(window).on('load',function(){
	 //alert();
 //$('.selected .ddlabel').hide();
 //$('.selected .fnone').hide();
 });
 $('#mycomp').on('change',function(){
	var flag = $(this).val();
	
	$('.enabled _msddli_ selected ddlabel').hide();
    $('.enabled _msddli_ selected fnone').hide();
	
 });
$(document).on('mouseleave','#mycomp_msdd',function(){
    $(this).removeClass('borderRadiusTp');
	 $(this).addClass('borderRadius');
	 $('#mycomp_child').hide();
 });
  $(document).on('mouseenter','#mycomp_msdd',function(){
   $(this).removeClass('borderRadius');
    $(this).addClass('borderRadiusTp');
	
	 $('#mycomp_child').show();
 });
});
</script>
<script>
$(function(){
  $(document).on('click',function(){
    $('.navbar-collapse').removeClass('in');
  });
  $(window).scroll(function() {
  // $('.navbar-collapse').removeClass('in');
});
$('.dropdown').on('click',function(){
$('.san').hide();
});
$('.navbar-toggle').on('click',function(){
$('.san').show();
});
});
</script>
<title>PortuGo</title>
</head>
<body>

<?php $this->load->view('segment/header');?>

 
  <div class=" inner_wrapper wrap_margin" >
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12 padding_main">
       <a href="#"><?php echo $this->lang->line('Home');?></a>&nbsp;  / &nbsp;      <?php echo $this->lang->line('Recent Orders Detail');?>


      </div>
      </div>
   </div>
  <div class="container">
    <div class="row">
      
      <?php $this->load->view('segment/user_sidebar');?>
     
     
     <div class="col-md-09 padding_main">
     <div class="col-md-12">
     <div class="account_head2">
    <h1><?php 

//Visualiza  ordens recentes



$timeorder=$order['order_date'];

$order_time = gmdate("H:i ", $timeorder);
$order_date = gmdate("d-m-Y ", $timeorder);

//echo '<script type="text/javascript"> alert("'. $timeorder . '")</script>';

echo $this->lang->line('Recent Orders Detail');?><font><a href="<?php echo base_url('myaccount/user_order'); ?>"><i class="fa fa-angle-left" aria-hidden="true"></i>&nbsp;<?php echo $this->lang->line('Back to Recent Orders'); ?></a></font></h1>
    
           
    <h5><span><?php echo $this->lang->line('Order Number');?> : <?php echo $order['order_id']; ?></span> <span><?php echo $this->lang->line('Ordered at');?>: <?php if($order['order_date']!='')
{ echo $order_date; ?> <?php echo $order_time;} ?></span><span> <?php echo $this->lang->line('Status');?>: <?php if($order['status']==0){ echo "Cancelled";} if($order['status']==1){echo "Pending";} if($order['status']==2){echo "Processing";}if($order['status']==3){echo "Delivered";}?></span></h5>
    </div>
    
    <div class="table_responsive">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td width="47%" height="40" align="left" class="td_bord2"><strong><?php echo $this->lang->line('Menu Name');?></strong></td>
    <td width="8%" height="40" align="left" class="td_bord2"><strong><?php echo $this->lang->line('Quantity');?></strong></td>
    <td width="23%" height="40" align="left" class="td_bord2"><strong><?php echo $this->lang->line('Price');?></strong></td>
    <td width="14%" height="40" align="left" class="td_bord2"><strong><?php echo $this->lang->line('Total Price');?></strong></td>
  </tr>
  <?php

$sn=1;
$total=0;

foreach($order_detail as $allorder){
// print_r($allorder);

$item_detail=$this->search_model->get_menu_detail($allorder['menu_id']);


$price = floatval($allorder['menu_price']);

$quantity = floatval($allorder['quantity']);

$total =  $total + ($quantity*$price);

?>

<tr>
    <td height="60" align="left" class="td_bord2"><?php echo ucwords($item_detail['item_name']);?></td>
    <td height="60" align="left" class="td_bord2"><?php echo $quantity ;?></td>
    <td height="60" align="left" class="td_bord2"><?php echo $dollar; ?>&nbsp;<?php echo number_format($price,2);?></td>
    <td height="60" align="left" class="td_bord2"><?php echo $dollar; ?>&nbsp;<?php echo number_format($quantity*$price,2);?></td> 
</tr>

<?php






if($allorder['adddons']!='')
 {


	   $addon_id= explode(',',$allorder['adddons']);
	  $addons=$this->search_model->get_addonsby_id($addon_id);



		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total=$total+$alladons['price'];
	  ?>
    <tr>

    <td height="60" align="left" class="td_bord2"><?php echo $this->lang->line('Addons');?>:&nbsp;&nbsp;<?php echo ucfirst($alladons['extra_item']); ?></td>
    <td height="60" align="left" class="td_bord2">&nbsp;</td>
    <td height="60" align="left" class="td_bord2"><?php echo $dollar; ?> <?php echo number_format($alladons['price'],2);?></td>
    <td height="60" align="left" class="td_bord2"><?php echo $dollar; ?> <?php echo number_format($alladons['price'],2);?></td>

  </tr>
  <?php } } } ?>
  
  
  <?php } ?>

  
   <tr>
     
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="right" class="td_bord3"><?php echo $this->lang->line('Sub Total');?></td>
     <td height="50" align="left" class="td_bord3"><?php echo $dollar; ?> <?php echo number_format($total,2); ?></td>
   </tr>
  <!-- <tr>
     
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="right" class="td_bord3">Tax (5.00 %)</td>
     <td height="50" align="left" class="td_bord3"><?php echo $dollar; ?> 24.00</td>
   </tr>-->
   <?php

   if($order['delivery_charge']!=''){$delivery_charge=$order['delivery_charge'];}else{$delivery_charge=0;}


   if($order['order_type']!='delivery')
		 {
		 $delivery_charge=0;
		 }


   $tx_delivery =  number_format(floatval($order['delivery_charge']),2);

   $final_total=$total+$tx_delivery;


?>
   <tr>

     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="right" class="td_bord3"><?php echo $this->lang->line('Delivery Charges');?></td>

     <td height="50" align="left" class="td_bord3"><?php echo $dollar; ?> <?php echo $tx_delivery;?></td>

   </tr>
   <tr>
     
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="right" class="td_bord3"><strong><?php echo $this->lang->line('Total');?></strong></td>
     <td height="50" align="left" class="td_bord3"><strong><?php echo $dollar; ?> <?php echo number_format($final_total,2); ?></strong></td>
   </tr>
  
  
    </table>
    </div>
    
    <?php 
	
	$restaurant = $this->order_model->get_restaurant_name($order['restaurant_id']);

//echo '<script type="text/javascript"> alert("'. "user_viewer_order_test" . '")</script>';
//echo '<script type="text/javascript"> alert("'.  date('d-m-Y',$order['order_date']) . '")</script>';
//echo '<script type="text/javascript"> alert("'.  date('H:i A',$order['order_date']) . '")</script>';
//echo '<script type="text/javascript"> alert("'.  $order['order_date'] . '")</script>';
//echo '<script type="text/javascript"> alert("'. "user_viewer_delivery_test" . '")</script>';
//echo '<script type="text/javascript"> alert("'. $order['order_type'] . '")</script>';
//echo '<script type="text/javascript"> alert("'.  date('d-m-Y',$order['delivery_time']) . '")</script>';
//echo '<script type="text/javascript"> alert("'.  date('H:i A',$order['delivery_time']) . '")</script>';
//echo '<script type="text/javascript"> alert("'.  $order['delivery_time'] . '")</script>';
//echo '<script type="text/javascript"> alert("'. "user_viewer_order_meu_teste" . '")</script>';


//correcao  das datas
//$timeorder=$order['order_date'];
//$order_time = gmdate("H:i A:", $timeorder);
//$order_date = gmdate("d-m-Y ", $timeorder);
//echo '<script type="text/javascript"> alert("'. $date . '")  </script>';
//echo '<script type="text/javascript"> alert("'. $time . '")  </script>';



$timedelivery=$order['delivery_time'];

//echo '<script type="text/javascript"> alert("'. $order['delivery_time'] . '")</script>';



//$delivery_time = gmdate("H:i A:", $timedelivery);
//$delivery_date = gmdate("d-m-Y ", $timedelivery);



?>

    <div class="col-lg-12 padding_main">
   
     <div class="col-sm-6">
       <h4><strong><?php echo $this->lang->line('Order Detail');?></strong></h4>
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
 
  <tr>
    <td width="36%" height="40"><p><strong><?php echo $this->lang->line('Restaurant');?></strong></p></td>
    <td width="6%" height="40"><p></p></td>
    <td width="58%" height="40"><p><?php echo strtoupper($restaurant['restaurant_name']).'&nbsp;Restaurant'; ?></p></td>
  </tr>
  
  <tr>
    <td width="36%" height="40"><p><strong><?php echo $this->lang->line('Order Number');?></strong></p></td>
    <td width="6%" height="40"><p></p></td>
    <td width="58%" height="40"><p><?php echo $order['order_id']; ?></p></td>
  </tr>
  
  <tr>
    <td width="36%" height="40"><p><strong><?php echo $this->lang->line('Order Type');?></strong></p></td>
    <td width="6%" height="40"><p></p></td>
    <td width="58%" height="40"><p><?php echo ucfirst($order['order_type']); ?></p></td>
  </tr>

  
  <tr>
    <td width="36%" height="40"><p><strong><?php echo $this->lang->line('Delivery Time');?></strong></p></td>
    <td width="6%" height="40"><p></p></td>
    <td width="58%" height="40"><p><?php if($order['delivery_time']!=''){ echo $timedelivery;} ?></p></td>

  </tr>
  
  <tr>
    <td width="36%" height="40"><p><strong><?php echo $this->lang->line('Payment Method');?></strong></p></td>
    <td width="6%" height="40"><p></p></td>
    <td width="58%" height="40"><p><?php echo ucwords($order['payment_method']);?></p></td>
  </tr>
 
  <tr>
    <td width="36%" height="40"><p><strong><?php echo $this->lang->line('Order Status');?></strong></p></td>
    <td width="6%" height="40"><p></p></td>
    <td width="58%" height="40"><p><?php if($order['status']==0){ echo "Cancelled";} if($order['status']==1){echo "Pending";} if($order['status']==2){echo "Processing";}if($order['status']==3){echo "Delivered";}?></p></td>
  </tr>

   <tr>
    <td width="36%" height="40"><p><strong><?php echo $this->lang->line('Payment Status');?></strong></p></td>
    <td width="6%" height="40"><p></p></td>
    <td width="58%" height="40"><p><?php if($order['payment_status']==0){ echo "Unpaid";} if($order['payment_status']==1){echo "Paid";}?></p></td>
	
	 
  </tr>
  
   <tr>
    <td width="36%" height="40"><p><strong><?php echo $this->lang->line('Additional note'); ?></strong></p></td>
    <td width="6%" height="40"><p></p></td>
    <td width="58%" height="40"><p><?php echo ucwords($order['comments']); ?></p></td>
	
	 
  </tr>
  
  
</table>
     </div>
     
     
        <?php 
	 $customer = $this->order_model->get_user_detail($order['customer_id']);
	 $address = $this->order_model->addresby_id($order['address_id']);
	 ?>
     
     <div class="col-sm-6">    
       <h4><strong><?php echo $this->lang->line('Customer Detail');?></strong></h4>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="35%" height="40"><p><strong><?php echo $this->lang->line('Customer Name');?></strong></p></td>
    <td width="7%" height="40"><p></p></td>
    <td width="58%" height="40"><p><?php echo ucfirst($customer['first_name']).' '.ucfirst($customer['last_name']); ?></p></td>
  </tr>
  
  <tr>
    <td width="35%" height="40"><p><strong><?php echo $this->lang->line('Customer Email');?></strong></p></td>
    <td width="7%" height="40"><p></p></td>
    <td width="58%" height="40"><p><?php echo $customer['email']; ?></p></td>
  </tr>
  
  <tr>
    <td width="35%" height="40" valign="top"><p><strong><?php echo $this->lang->line('Customer Address');?></strong></p></td>
    <td width="7%" height="40" valign="top"><p></p></td>
    <td width="58%" height="40" valign="top"><p><?php echo ucwords($address['apartment']).'&nbsp,'.ucwords($address['address']).'&nbsp,'.ucwords($address['landmark']).'&nbsp,'.ucwords($address['city']).'&nbsp,'.ucwords($address['state']).'&nbsp,'.$address['zip_code']; ?></p></td>
  </tr>
  
  <!--<tr>
    <td width="35%" height="40"><p><strong><?php echo $this->lang->line('Customer Phone');?></strong></p></td>
    <td width="7%" height="40"><p></p></td>
    <td width="58%" height="40"><p><?php echo $customer['phone']; ?></p></td>
  </tr>-->
  
  <tr>
    <td width="35%" height="40"><p><strong><?php echo $this->lang->line('Customer Mobile');?></strong></p></td>
    <td width="7%" height="40"><p></p></td>
    <td width="58%" height="40"><p><?php echo $customer['mobile']; ?></p></td>
  </tr>
</table>
     </div>
    </div>
    
      
    
     </div>
     </div>
     </div>
    </div>
	
   
  
  
  <?php $this->load->view('segment/footer');?>
 
 
 
</body>
</html>

<script type="text/javascript" src="<?php echo base_url();?>public/front/js/ddaccordion.js">
/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/
</script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})

</script>





<script>
$(document).ready(function(){

	 $(document).on('click',".moon",function(){
    $(".san").slideDown();
	$(this).addClass('choon');
	$(this).removeClass('moon');
  });
   $(document).on('click',".choon",function(){
    $(".san").slideUp();
	$(this).addClass('moon');
	$(this).removeClass('choon');
  });
  
});
</script>


<script>
$(document).ready(function(){
	$(document).on('click',".mess_btn",function(){
	$(".send_mass").show();
  });

});
</script>

 <script>

$(document).ready(function(e) {		
	//no use
	try {
		var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
												var val = data.value;
												if(val!="")
													window.location = val;
											}}}).data("dd");

		var pagename = document.location.pathname.toString();
		pagename = pagename.split("/");
		pages.setIndexByValue(pagename[pagename.length-1]);
		$("#ver").html(msBeautify.version.msDropdown);
	} catch(e) {
		//console.log(e);	
	}
	
	$("#ver").html(msBeautify.version.msDropdown);
		
	//convert
	$(".select").msDropdown({roundedBorder:false});
	createByJson();
	$("#tech").data("dd");
});
function showValue(h) {
	console.log(h.name, h.value);
}
$("#tech").change(function() {
	console.log("by jquery: ", this.value);
})
//
</script>
<style>
#mycomp_child{height:90px!important;}

#mycomp1_child{ margin-left: -6px;
    margin-top: 25px;}

</style>
