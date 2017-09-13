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
       <a href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('Home');?></a>&nbsp;  / &nbsp; <?php echo $this->lang->line('Reset Password');?>
      </div>
      </div>
   </div>
  <div class="container">
        <div class="row">
        
     <div class="col-md-9  col-md-offset-3 ">
      <div class="col-md-8 login_header" >
         <h2 class="login_head"><?php echo $this->lang->line('Reset Password');?></h2>
         
         <div class="jquerytab_wrapper">
	  
        
                                                                                
	<section class="" >
		<div class="col-md-12 padding_main">
        <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate" action="<?php echo base_url('signup/customer/'.$this->uri->segment(3)); ?>" method="post">
        
        
      
        <div class="clearfix"></div>
        
        <div class="clearfix"></div>
        <?php if($this->session->flashdata('success_msg')) {?><div class="success"><button type="button" class="close">×</button><?php echo $this->session->flashdata('success_msg'); ?></div><?php } ?>

<?php if($this->session->flashdata('error_message')) {?><div class="error"><button type="button" class="close">×</button><?php echo $this->session->flashdata('error_message'); ?></div><?php } ?>
      <div class="form-group has-feedback">
           <div class="col-lg-12">
            <p class="inpu_text"><?php echo $this->lang->line('Password');?></p>
             <input type="password" placeholder="Password" class="form-control" name="password" id="password">
			 <span id="password_error1" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Please enter your password');?>.</span>
					<span id="password_length_error1" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Your password is too short');?>.</span>
          </div>
         </div>
            
          <div class="form-group has-feedback">
           <div class="col-lg-12">
           <p class="inpu_text"><?php echo $this->lang->line('Confirm Password');?></p>
             <input type="password" placeholder="Confirm Password" class="form-control" name="confirm_password" id="confirm_password">
			 <span id="password_confirm_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Please enter confirm password');?>.</span>
					<span id="password_match_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Your password and confirm password do not match');?>.</span>
          </div>
         </div>


     
                

         <div class="form-group has-feedback" >
          <div class="col-lg-12">
          <button class="btn_login" type="submit" onclick="return validate();"><?php echo $this->lang->line('Reset');?></button>&nbsp;
                
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
function validate()
{

var password=$("#password").val();
//$("#result").html('');
if(password=='')
{
$("#password_error1").show();
$("#password").focus();
return false;
}
else if(password.length<5)
{
$("#password_error1").hide();
$("#password_length_error1").show();
$("#password").focus();
return false;
}
else
{
$("#password_error1").hide();
$("#password_length_error1").hide();
}

var confirm_password=$("#confirm_password").val();
if(confirm_password=='')
{
$("#password_confirm_error").show();
$("#confirm_password").focus();
return false;
}
else
{
$("#password_confirm_error").hide();
}


if(password!=confirm_password)
{
$("#password_match_error").show();
$("#confirm_password").focus();
return false;
}
else
{
$("#password_match_error").hide();
}


}

 
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
    / border: 0px solid; /
    margin: 10px 0px;
    padding: 15px 10px 15px 20px;
    background-repeat: no-repeat;
    background-position: 10px center;
    border-radius: 5px;
}
.login_header {
    border: #e2e0e0 1px solid;
    padding: 10px 20px 0px 20px;
    border-radius: 6px;
    background: #fff;
    margin: 56px 0px 30px 0px;
}

</style>