<?php  
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
    
    
    
      


<title>PortuGo</title>
</head>
<body>

   <?php $this->load->view('segment/header');?>
 	 
     
  <div class=" inner_wrapper" style="margin-top:103px; padding-bottom:0px;">  
  
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12">
       <a href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('Home'); ?></a>&nbsp;  / &nbsp; <?php echo $this->lang->line('FAQ'); ?>
      </div>
      </div>
   </div>
  <div class="container">
    <div class="row1">
    <div class="col-md-12">
   <div class="faq">
   
   
   <?php if($language_data['language']=='english'){?>
   
   <?php 
	 $all_faq_data=$this->home_model->get_all_faqs();	 
	 $l=1;
	 foreach($all_faq_data as $faq_data){
		 
   ?>
   
   <h1><?php if($faq_data['faq_category']==1){echo "GENERAL"; }if($faq_data['faq_category']==2){echo "ORDERING"; }if($faq_data['faq_category']==3){echo "DELIVERY"; }if($faq_data['faq_category']==4){echo "PAYMENTS"; }if($faq_data['faq_category']==5){echo "MY ACCOUNT"; }?></h1>
      <div class="col-md-12 padding_main">
      <?php
	  $all_faq_data_cat=$this->home_model->get_all_faqs_by_cat($faq_data['faq_category']);
	  $k=1;
	  foreach($all_faq_data_cat as $data){
	   ?>
     <h2><span><a href="javascript:void(0);" class="alok" id="<?php echo $data['faq_id']; ?>"><?php echo $data['question']; ?></a></span></h2>
     <h3 class="san mun-<?php echo $data['faq_id']; ?>" <?php if($k!=1 || $l!=1){ ?> style="display:none;" <?php } ?>><?php echo stripslashes($data['answer']);?></h3>
     
     <?php $k++; } ?><br />
         
      </div> 
      
      <?php $l++; } ?>
      
   <?php }else{ ?>
   
   <?php 
	 $all_faq_data=$this->home_model->get_all_faqs();	 
	 $l=1;
	 foreach($all_faq_data as $faq_data){
		 
   ?>
   
   <h1><?php if($faq_data['faq_category']==1){echo "Geral"; }if($faq_data['faq_category']==2){echo "Encomenda"; }if($faq_data['faq_category']==3){echo "Delivery"; }if($faq_data['faq_category']==4){echo "Pagamentos"; }if($faq_data['faq_category']==5){echo "Minha conta"; }?></h1>
      <div class="col-md-12 padding_main">
      <?php
	  $all_faq_data_cat=$this->home_model->get_all_faqs_by_cat($faq_data['faq_category']);
	  $k=1;
	  foreach($all_faq_data_cat as $data){
	   ?>
     <h2><span><a href="javascript:void(0);" class="alok" id="<?php echo $data['faq_id']; ?>"><?php echo $data['portugoese_question']; ?></a></span></h2>
     <h3 class="san mun-<?php echo $data['faq_id']; ?>" <?php if($k!=1 || $l!=1){ ?> style="display:none;" <?php } ?>><?php echo stripslashes($data['portugoese_answer']);?></h3>
     
     <?php $k++; } ?><br />
         
      </div> 
      
      <?php $l++; } ?>
      
    <?php } ?>  
     
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
       
      <center><h2> Thank you for contacting us!</h2> </center>
      <center><h4 style="margin:20px 0px 40px 0px"> We will get back to you shortly</h4></center> 
       </div>

      </div>
  </div>
</div>


<style>
#mycomp_child{height:90px!important;}

#mycomp1_child{ margin-left: -6px;
    margin-top: 25px;}

</style>

 <script>
$(function(){
 $('.alok').on('click',function(){
  var id = $(this).attr('id');
  //$('.san').hide();
  //$('.mun-'+id).show();
  $( ".san" ).slideUp();
  $('.mun-'+id).slideDown();
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
