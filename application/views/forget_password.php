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
     <link href="<?php echo base_url();?>public/front/css/jquery-ui.css" rel="stylesheet">
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
   //$('.navbar-collapse').removeClass('in');
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
     
     
  
  <div class=" main_login_wrapper" style="margin-top:103px;">
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12 padding_main">
       <a href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('Home');?></a>&nbsp;  / &nbsp; <?php echo $this->lang->line('Forgot password');?>
      </div>
      </div>
   </div>
  <div class="container">
        <div class="row">
        
     <div class="col-md-9  col-md-offset-3" style="margin-top:85px;">
      <div class="col-md-8 login_header" >
         <h2 class="login_head"><?php echo $this->lang->line('Forgot password');?></h2>
         
         <div class="jquerytab_wrapper">
	  
        
                                                                                
	<section class="" >
		<div class="col-md-12 padding_main">
        <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate" action="<?php echo base_url('restaurant_signup/forget_password'); ?>" method="post">
        
        
      
        <div class="clearfix"></div>
        
        <div class="clearfix"></div>
        <?php if($this->session->flashdata('success_msg')) {?><div class="success"><button type="button" class="close">×</button><?php echo $this->lang->line('mail_sent_message'); ?></div><?php } ?>

<?php if(isset($email_error)) {?><div class="error"><button type="button" class="close">×</button><?php echo $this->lang->line('mail_not_exist'); ?></div><?php } ?>
      <div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <p class="inpu_text"><?php echo $this->lang->line('Enter Your E-mail');?></p>
<input  class="form-control" type="text" placeholder="E-mail" name="customer_email" id="customer_email" value="" >
<span id="email_error11" style="display:none;color:#F00;;">*<?php echo $this->lang->line('Please enter your email address');?>.</span>
					
</div>
</div>



     
                

         <div class="form-group has-feedback">
         
          <div class="col-lg-12">
          <button class="btn_login" type="submit" onclick="return validate();"><?php echo $this->lang->line('Send');?></button>&nbsp;
                
          </div>
        </form>

        </div>
        
	  	</section>
    
    
    
	
	</div>
        </div>
         </div>
          </div>
        </div>
      
  
 
 <?php $this->load->view('segment/footer');?>
 
 
</body>
</html>

<script>
$(document).ready(function(){
	$(document).on('click',".mess_btn",function(){
	$(".send_mass").show();
  });

});
</script>




<script>
function validate()
{
	
var email=$("#customer_email").val();

if(email=='')
{	
$("#email_error11").show();
$("#customer_email").focus();
return false;
}
else
{
$("#email_error11").hide();
}
}
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

<style>
.success {
    color: #4F8A10;
    background-color: #DFF2BF;
    border: 1px solid #C5D8A5;
    background-image: url(success.png);
}

.info, .success, .warning, .error, .validation {
    border: 0px solid;
    margin: 10px 0px;
    padding: 15px 10px 15px 20px;
    background-repeat: no-repeat;
    background-position: 10px center;
    border-radius: 5px;
}

.error {
    color: #D8000C;
    background-color: #FCD0D0/*FFBABA*/;
    border: 1px solid #EDB5B5;
    background-image: url(error.png);
}

.info, .success, .warning, .error, .validation {
    /* border: 0px solid; */
    margin: 10px 0px;
    padding: 15px 10px 15px 20px;
    background-repeat: no-repeat;
    background-position: 10px center;
    border-radius: 5px;
}
</style>