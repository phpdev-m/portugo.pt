<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="icon" href="<?php echo base_url();?>public/images/logoportugo.png">

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
     <link href="<?php echo base_url();?>public/front/css/jquery-ui.css" rel="stylesheet">
<!--<script type="text/javascript" src="<?php //echo base_url();?>public/front/js/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
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
 javascript:document.paypalform.submit();
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
   var height=$(window).height();
   if($(this).scrollTop()>=400 ){
	//$('.navbar-collapse').removeClass('in');

}
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

<?php 

$this->load->view('segment/header'); 


?> 
  <div class=" inner_wrapper wrap_margin" >
  <div class="container">
    <div class="row">
     <div class="col-md-12 padding_main">
     <div class="col-md-12">
     
     <div class="thanks" style="min-height:300px;">
     <h1 style="font-size:35px; color:#000000; line-height:40px"><?php echo $this->lang->line('Please wait while you are redirected to Paypal for payment');?>....... </h1>
     <p><img src="<?php echo base_url();?>public/front/images/ajax-loader.gif"  /></p>


<?php 
//<form name="paypalform" id="paypalform" method="post" action="https://www.paypal.com/cgi-bin/webscr" >
//<input type="hidden" name="business" value="portugotakeaway@gmail.com">  
?>

<form name="paypalform" id="paypalform" method="post" action="https://www.sandbox.paypal.com/us/cgi-bin/webscr" >

<input type="hidden" name="charset" value="utf-8">
<input type="hidden" name="cmd" value="_xclick">  
<input type="hidden" name="business" value="maurelio45-facilitator@gmail.com">  
<input type="hidden" name="item_name" value="Menu Order">  
<input type="hidden" name="amount" id="am" value="<?php echo $final_amount; ?>"> 
<input type="hidden" name="currency_code" id="currency_code" value="EUR"> 
<input type="hidden" name="return" value="<?php echo base_url('order/paypalsuccess'); ?>">
<input type="hidden" name="cancel_return" value="<?php echo base_url('order/paypalcancel'); ?>">
<input type="hidden" name="notify_url" value="<?=base_url()?>">

</form>
     </div>
     </div>
     </div>
     </div>
    </div>
    
  

  <?php $this->load->view('segment/footer'); ?>  
 
 
</body>
</html>


<script>
$(document).ready(function(){
	$(document).on('click',".mess_btn",function(){
	$(".send_mass").show();
  });
  
   javascript:document.paypalform.submit();

});
</script>

 <script>

$(document).ready(function(e) {		
	//no use
	try {
		var pages = $("#pages").msDropdown({on:{change:function(data, ui) 
                {
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


