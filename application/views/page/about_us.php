<?php 
 //error_reporting(0);
 $language_data=$this->session->userdata('language');

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
    
    
    
    <script>
	$(function() {
		$( "#slider-range3" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 0, 300 ],
			slide: function( event, ui ) {
				$( "#amount3" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			}
		});
		$( "#amount3" ).val(  $( "#slider-range3" ).slider( "values", 0 ) +
			" - " + $( "#slider-range3" ).slider( "values", 1 ) );
	});
	</script>  


<title>PortuGo</title>
</head>
<body>

  <?php $this->load->view('segment/header');?>
 	 
     
  <div class=" inner_wrapper" style="margin-top:103px; padding-bottom:0px;" >
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12">
       <a href="<?php echo base_url('home'); ?>">Home</a>&nbsp;  / &nbsp; <?php echo $this->lang->line('About Us');?>
      </div>
      </div>
   </div>
  <div class="container">
    <div class="row1">
    <div class="col-md-12">
     <div class="about_us">
       <h1><?php echo $this->lang->line('About Us');?></h1>
       <p><?php echo $this->lang->line('ABOUT_US_CONTENT1');?></p>
       
       <p><?php echo $this->lang->line('ABOUT_US_CONTENT1A');?></p>
       
       <h2><?php echo $this->lang->line('ABOUT_US_TITLE1');?></h2>
       
       <div class="col-sm-12 padding_0" style="margin-bottom:30px;">
       <div class="col-sm-2 padding_0"><img src="<?php echo base_url(); ?>public/front/images/abou_img1.png"/></div>
       <div class="col-sm-10 padding_0"><h3><?php echo $this->lang->line('ABOUT_US_TITLE2');?></h3><p><?php echo $this->lang->line('ABOUT_US_CONTENT2');?></p></div>
       </div>
       <div class="col-sm-12 padding_0" style="margin-bottom:30px;">
       <div class="col-sm-2 padding_0"><img src="<?php echo base_url(); ?>public/front/images/abou_img2.png"/></div>
       <div class="col-sm-10 padding_0"><h3><?php echo $this->lang->line('ABOUT_US_TITLE3');?></h3><p><?php echo $this->lang->line('ABOUT_US_CONTENT3');?></p></div>
       </div>
       <div class="col-sm-12 padding_0" style="margin-bottom:30px;">
       <div class="col-sm-2 padding_0"><img src="<?php echo base_url(); ?>public/front/images/abou_img3.png"/></div>
       <div class="col-sm-10 padding_0"><h3><?php echo $this->lang->line('ABOUT_US_TITLE4');?></h3><p><?php echo $this->lang->line('ABOUT_US_CONTENT4');?></p></div>
       </div>
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
