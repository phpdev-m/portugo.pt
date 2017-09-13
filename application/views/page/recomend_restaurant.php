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
<script src="<?php echo base_url();?>public/front/js/jquery-ui.js"></script>
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

    <script>
	$(function() {
		$( "#slider-range2" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 0, 99 ],
			slide: function( event, ui ) {
				$( "#amount2" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			}
		});
		$( "#amount2" ).val(  $( "#slider-range2" ).slider( "values", 0 ) +
			" - " + $( "#slider-range2" ).slider( "values", 1 ) );
	});
	</script> 
    
    
    
      


<title>PortuGo</title>
</head>
<body>

  <?php $this->load->view('segment/header');?>
     
  <div class=" inner_wrapper" style="margin-top:103px; padding-bottom:0px;">
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12">
       <a href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('Home');?></a>&nbsp;  / &nbsp; <?php echo $this->lang->line('Recommend a restaurant');?>
      </div>
      </div>
   </div>
  <div class="container">
    <div class="row1">
    <div class="col-md-12">
     <div class="message_head">
      <h1 style="margin-top:40px;"><a href="javascript:void(0)" style="color:#e81d25" class="mess_btn"><?php echo $this->lang->line('Recommend a restaurant');?></a></h1>
     </div>
      
       <div class="col-md-8 col-md-offset-2 send_mass" >

     <div class="col-md-8" style="height:30px;">
     <p class="inpu_text2 error-red" style="padding-bottom:30px; color:#FF0000; display:none;"><?php echo $this->lang->line('Please fill in the required fields');?> <span style="color:#F00">*</span></p>
     </div>
     
     <div class="col-sm-12 " >
     
     <form id="registerForm" class="form-horizontal" name="register-form"  method="post" action="<?php echo base_url('page/recomend_restaurant'); ?>">
  <div class="form-group has-feedback">
  <div class="col-lg-5">
  <p class="inpu_text2"><?php echo $this->lang->line('Name of restaurant or');?></p>
  </div>
  <div class="col-lg-7">
<input id="rest_name_msg" class="form-control2" type="text" placeholder="" name="rest_name" >
<span id="rest_name_msg_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Please enter name of restaurant');?>.</span>
</div>
</div>

<div class="form-group has-feedback">
<div class="col-lg-5">
<p class="inpu_text2"><?php echo $this->lang->line('First Name');?></p>
</div>
<div class="col-lg-7">
<input id="first_name_msg" class="form-control2" type="text" placeholder="" name="first_name" >
<span id="first_name_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Please enter your first name');?>.</span>
</div>
</div>




<div class="form-group has-feedback">
<div class="col-lg-5">
<p class="inpu_text2"><?php echo $this->lang->line('Last Name');?></p>
</div>
<div class="col-lg-7">
<input id="last_name_msg" class="form-control2" type="text" placeholder="" name="last_name" >
<span id="last_name_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Please enter your last name');?>.</span>
</div>
</div>


<div class="form-group has-feedback">
<div class="col-lg-5">
<p class="inpu_text2"><?php echo $this->lang->line('Your Email');?></p>
</div>
<div class="col-lg-7">
<input id="email_msg" class="form-control2" type="text" placeholder="" name="email" >
<span id="email_mag_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Please enter a valid email');?>.</span>
</div>
</div>


<div class="form-group has-feedback">
<div class="col-lg-5">
<p class="inpu_text2"><?php echo $this->lang->line('Your Message');?></p>
</div>
<div class="col-lg-7">
<textarea  class="form-control" id="message" placeholder="" style="height:150px;" name="message"></textarea>
<span id="message_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Please enter message');?>.</span>
</div>
</div>

     
    
  <?php /*?><div class="form-group has-feedback">
<div class="col-lg-12">
<p class="inpu_text2"> Your Message</p>
<textarea  class="form-control" id="message" placeholder="" style="height:175px;" name="message"></textarea>
<span id="message_error" style="display:none;color:#a94442;">*Please enter message.</span>
</div>
</div><?php */?>

<div class="form-group">
<div class=" col-lg-12" style=" margin-top:0px;">

<button class="btn_login pull-right message_send" type="submit" style="padding:10px 0px; width:140px; font-size:16px;margin: 0px 0 40px;" onclick="return validate();"> <?php echo $this->lang->line('Send suggestion');?></button>
<a href="#" data-target="#send_msg" data-toggle="modal" class="open_popup" style="display:none;">popup </a>
 </div>
</div>

</form>
     
     </div>
     </div>
       
       
       
     
    </div>
     </div>
    </div>
    
  
 
 
 
 <?php $this->load->view('segment/footer');?>  

 
 
</body>
</html>


<div class="modal fade" id="send_msg" tabindex="-1" role="dialog" >
  <div class="modal-dialog2" role="document">
   <div class="modal-body ">
       <div class="col-md-12 login_header" >
       
      <center><h2 style="margin-bottom:40px;"> <?php echo $this->lang->line('Thank you for your suggestion');?>!</h2> </center>
      <!--<center><h4 style="margin:20px 0px 40px 0px"> We will get back to you shortly</h4></center> -->
       </div>

      </div>
  </div>
</div>









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

<script>
function validate()
{


var rest_name_msg=$("#rest_name_msg").val();
//alert(first_name);
if(rest_name_msg=='')
{
$("#rest_name_msg_error").show();
$("#rest_name_msg").focus();
return false;
}
else
{
$("#rest_name_msg_error").hide();
}




var first_name=$("#first_name_msg").val();
//alert(first_name);
if(first_name=='')
{
$("#first_name_error").show();
$("#first_name_msg").focus();
return false;
}
else
{
$("#first_name_error").hide();
}

var last_name=$("#last_name_msg").val();
if(last_name=='')
{
$("#last_name_error").show();
$("#last_name_msg").focus();
return false;
}
else
{
$("#last_name_error").hide();
}

var email=$("#email_msg").val();
var regexp=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(email=='' || !(email.match(regexp)))
{
$("#email_mag_error").show();
$("#email_msg").focus();
return false;
}
else
{
$("#email_mag_error").hide();
}

var message=$("#message").val();
if(message=='')
{
$("#message_error").show();
$("#message").focus();
return false;
}
else
{
$("#message_error").hide();
}




}



</script>

<?php if($this->session->flashdata('success_msg')) {?>
<script>

$(".open_popup").trigger('click');



</script>


<?php } ?>