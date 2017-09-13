<?php



//dados do cartao opcoes de info
/*
print_r($this->session->userdata('created_date')); 
echo '<pre>';
print_r($this->session->userdata('local'));
echo '<pre>';
print_r($this->session->userdata('paymentAmount'));
echo '<pre>';
print_r($this->session->userdata('creditCardType')); 
echo '<pre>';
print_r($this->session->userdata('creditCardNumber'));
echo '<pre>'; 
print_r($this->session->userdata('expMonth'));
echo '<pre>';
print_r($this->session->userdata('expYear'));
echo '<pre>';
print_r($this->session->userdata('cvv'));
echo '<pre>';
print_r($this->session->userdata('first_Name'));
echo '<pre>';
print_r($this->session->userdata('last_Name'));
echo '<pre>';
print_r($this->session->userdata('street'));
echo '<pre>';
print_r($this->session->userdata('city'));
echo '<pre>';
print_r($this->session->userdata('state'));
echo '<pre>';
print_r($this->session->userdata('zip'));
echo '<pre>';
print_r($this->session->userdata('countryCode'));
echo '<pre>';
print_r($this->session->userdata('currencyCode'));
echo '<pre>';
print_r($this->session->userdata('status'));
echo '<pre>';


die;
*/
?>


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

<script type="text/javascript" src="https://test.adyen.com/hpp/cse/js/[your unique generated library].shtml"></script>


<form method="POST" action="[payment request handler]" id="adyen-encrypted-form">
    <input type="text" size="20" data-encrypted-name="number"/>
    <input type="text" size="20" data-encrypted-name="holderName"/>
    <input type="text" size="2" data-encrypted-name="expiryMonth"/>
    <input type="text" size="4" data-encrypted-name="expiryYear"/>
    <input type="text" size="4" data-encrypted-name="cvc"/>
    <input type="hidden" value="[generate this server side]" data-encrypted-name="generationtime"/>
    <input type="submit" value="Pay"/>
</form>


<script>
// The form element to encrypt.
var form = document.getElementById('adyen-encrypted-form');
// See https://github.com/Adyen/CSE-JS/blob/master/Options.md for details on the options to use.
var options = {};
// Bind encryption options to the form.
adyen.createEncryptedForm(form, options);
</script>






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




