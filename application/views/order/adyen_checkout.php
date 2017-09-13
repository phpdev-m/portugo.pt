<?php

//$lib = realpath($_SERVER["DOCUMENT_ROOT"]) . '/application/view' ;
require_once('./application/views/order/config.php');


//$teste=SYSDIR.'/libraries/Stripe/lib/config.php';

//echo '<script type="text/javascript"> alert("' . $teste .'") </script>'; 


//dados do cartao stripe opcoes de info
/*
print_r($this->session->userdata('final_amount')); 
echo '<pre>';
print_r($this->session->userdata('item_count'));
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

 //javascript:document.stripeform.submit();

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
     <h1 style="font-size:35px; color:#000000; line-height:40px"><?php //echo $this->lang->line('Please wait while you are redirected to site or payment');?>....... </h1>

     <p><img src="<?php //echo base_url();?>public/front/images/ajax-loader.gif"  /></p>

<?php 

//esse form envia para o stripe autenticar e retorna se foi feita a operacao pela pagian stripe_payment.php

?>



<form name="stripeform" id="stripeform" action="<?php echo base_url('application/views/order/stripe_payment.php'); ?>" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_W1Feoc2oYQ7UpiLeBoY5V0N6"
    data-amount="<?php echo $this->session->userdata('final_amount') ;?>"
    data-name="PortuGO"
    data-description="TakeWay"
    data-image="https://portugo.pt/public/images/logopay.png"
    data-locale="auto"
    data-currency="EUR"
    data-zip-code="true">
  </script>


<!--  <input type="hidden" name="return" value="<?php echo base_url('application/views/order/stripesuccess'); ?>">

<input type="hidden" name="cancel_return" value="<?php echo base_url('application/views/order/stripecancel'); ?>">

<input type="hidden" name="notify_url" value="<?=base_url()?>">
-->

</form>


<!--   //////////////////////usa plugin pra carregar o app  e envia direto para o stripe o pagot

<form name="stripeform" id="stripeform" action="" method="POST">

 <button id="customButton">Purchase</button> 

<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
//alert("<?php echo $this->session->userdata('final_amount');?>");

var handler = StripeCheckout.configure({
  key: 'pk_test_W1Feoc2oYQ7UpiLeBoY5V0N6',
  image: 'https://portugo.pt/public/images/logopay.png',
  locale: 'auto',
  token: function(token) {sk_test_9yncolScUeej6KHuKtF3aUXV}
});

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: 'PortuGO',
    description: 'TakeAway',
    zipCode: true,
    amount: <?php echo $this->session->userdata('final_amount') ;?> 
  });
  e.preventDefault();
});

// Close Checkout on page navigation:

window.addEventListener('popstate', function() {
 handler.close();

});
</script>
</form>

-->






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
  
   //javascript:document.stripeform.submit();

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
