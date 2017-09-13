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
	$('.navbar-collapse').removeClass('in');

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
    
    
    
      


<title>Gotakeaway</title>
</head>
<body>

  <?php $this->load->view('segment/header');?>
     
  <div class=" inner_wrapper" style="margin-top:103px; padding-bottom:0px;">
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12">
       <a href="<?php echo base_url('home'); ?>">Home</a>&nbsp;  / &nbsp; Recommend a restaurant
      </div>
      </div>
   </div>
  <div class="container">
    <div class="row1">
    <div class="col-md-12">
     <div class="message_head">
      <h1 style="margin-top:40px;"><a href="javascript:void(0)" style="color:#c30001" class="mess_btn">Recommend a restaurant</a></h1>
     </div>
      
       <div class="col-md-8 col-md-offset-2 send_mass" >

     <div class="col-md-8" style="height:30px;">
     <p class="inpu_text2 error-red" style="padding-bottom:30px; color:#FF0000; display:none;">Please fill in the required fields <span style="color:#F00">*</span></p>
     </div>
     
     <div class="col-sm-12 " >
     
     <form id="registerForm" class="form-horizontal" name="register-form">
  <div class="form-group has-feedback">
  <div class="col-lg-5">
  <p class="inpu_text2">Name of restaurant or takeaway</p>
  </div>
  <div class="col-lg-7">
<input id="firstname_msg" class="form-control2" type="text" placeholder="" >
</div>
</div>

<div class="form-group has-feedback">
<div class="col-lg-5">
<p class="inpu_text2">First Name</p>
</div>
<div class="col-lg-7">
<input id="firsttname" class="form-control2" type="text" placeholder="" >
</div>
</div>




<div class="form-group has-feedback">
<div class="col-lg-5">
<p class="inpu_text2">Last Name</p>
</div>
<div class="col-lg-7">
<input id="lastname" class="form-control2" type="text" placeholder="" >
</div>
</div>


<div class="form-group has-feedback">
<div class="col-lg-5">
<p class="inpu_text2">Your Email</p>
</div>
<div class="col-lg-7">
<input id="lastname_msg" class="form-control2" type="text" placeholder="" >
</div>
</div>



</form>
     </div>
     
     
     
     <div class="col-sm-12 " >
      
     <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate">
  <div class="form-group has-feedback">
<div class="col-lg-12">
<p class="inpu_text2"> Comments</p>
<textarea  class="form-control" id="msg_msg" placeholder="" style="height:175px;"></textarea>
</div>
</div>

<div class="form-group">
<div class=" col-lg-12" style=" margin-top:0px;">
<a href="#" data-target="#send_msg" data-toggle="modal">
<button class="btn_login pull-right message_send" type="submit" style="padding:10px 0px; width:140px; font-size:16px;margin: 0px 0 40px;"> Send suggestion</button>
</a>
 </div>
</div>

</form>
     
     </div>
     </div>
       
       
       
     
    </div>
     </div>
    </div>
    
    <div  class="social_col mobile" style="margin-top:40px;">
  <a href="#"><div class="s_facebook"><i class="fa fa-facebook" aria-hidden="true" style="color:#FFF; padding:11px 0 0 13px; font-size:21px"></i></div></a>
  <a href="#"><div class="s_instagram"><i class="fa fa-instagram" aria-hidden="true" style="color:#FFF; padding:11px 0 0 12px; font-size:21px"></i></div></a>
   <a href="#"><div class="s_twitter"><i class="fa fa-twitter" aria-hidden="true" style="color:#FFF; padding:11px 0 0 13px; font-size:20px"></i></div></a>
   <a href="#"><div class="s_youtube"><i class="fa fa-youtube" aria-hidden="true" style="color:#FFF; padding:10px 0 0 13px; font-size:20px; font-weight:normal;"></i></div></a>
  </div>
     </div>
   
   
    
   
 <div class="clearfix"  style="height:60px; clear:both"></div>
 
 
 
 
 <?php $this->load->view('segment/footer');?>  

 
 
</body>
</html>


<div class="modal fade" id="send_msg" tabindex="-1" role="dialog" >
  <div class="modal-dialog2" role="document">
   <div class="modal-body ">
       <div class="col-md-12 login_header" >
       
      <center><h2 style="margin-bottom:40px;"> Thank you for your suggestion!</h2> </center>
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