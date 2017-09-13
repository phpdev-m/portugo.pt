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
       <a href="#">Home</a>&nbsp;  / &nbsp;      Payment Methods
      </div>
      </div>
   </div>
  <div class="container">
    <div class="row">
    
      
     <?php $this->load->view('segment/user_sidebar');?>
     
     
     
     
     <div class="col-md-09 padding_main">
     
     
     
     <div class="top_acc2 col-md-12">
     <div class="col-md-6">
     <div class="account_head">
    <h1>Payment Methods</h1>
    
<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" height="70" valign="bottom"><h4>Your Wallet</h4></td>
    <td width="67%" height="70" valign="bottom"><h4><span>$600</span></h4></td>
  </tr>
  
  <tr>
    <td height="55" colspan="2" valign="bottom"><h1>Add Fund to Wallet</h1></td>
  </tr>
  
   <tr>
    <td><h4>Amount</h4></td>
    <td><h4><input type="" class="form-control2" /></h4></td>
  </tr>
</table>-->
    </div>
     </div>
     
     
     <div class="clearfix"></div>
     <div class="account_head" style="margin-top:1px;" >
     <h1>Choose how to pay </h1>
     <hr />
     
     <div class="col-md-12 padding_main">
     

<div class="col-md-12 " style="background:#efeeee; margin-bottom:10px;">
<div class="radio" style="margin-bottom:6px; ">
<input id="radio1" name="radio1" value="option1" checked="" type="radio"  class="alo5">
<label for="radio1" style="font-size:16px; font-weight:600">&nbsp;MB <img src="<?php echo base_url();?>public/front/images/mb.png" width="20" height="20" style=" margin-left:72px;"  /></label>
</div>
</div>

<div class="col-md-12 " style="background:#efeeee; margin-bottom:10px;">
<div class="radio " style="margin-bottom:6px; ">
<input id="radio122" name="radio1" value="option1" checked="" type="radio"  class="alo">
<label for="radio122" style="font-size:16px; font-weight:600">&nbsp;Pay Online 
<img src="<?php echo base_url();?>public/front/images/master.png" width="39" height="22" style=" margin-left:17px;"  />
<img src="<?php echo base_url();?>public/front/images/visa.png" width="58" height="14" style=" margin-left:0px;"  />
<img src="<?php echo base_url();?>public/front/images/mastro.png" width="35" height="19" style=" margin-left:3px;"  />
 </label>
</div>

<div class="col-md-12 san muz" style="margin-top:30px; display:none" >
<form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate">
<div class="form-group has-feedback">
  <div class="col-lg-3"><h5 style="margin-top:10px;">Credit Card Number</h5></div>
  <div class="col-lg-6">
<input id="firstname" class="form-control2" type="text" placeholder="" >
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-3"><h5 style="margin-top:10px;">CVV</h5></div>
  <div class="col-lg-6">
<input id="firstname" class="form-control2" type="text" placeholder="" >
</div>
</div>


<div class="form-group has-feedback">
  <div class="col-lg-3"><h5 style="margin-top:10px;">Expiration<br />(MM/YYYY)</h5></div>
  <div class="col-lg-3">
<input id="firstname" class="form-control2" type="text" placeholder="" >
</div>
 <div class="col-lg-3">
<input id="firstname" class="form-control2" type="text" placeholder="" >
</div>
</div>

</form>
</div>
</div>




<div class="col-md-12 " style="background:#efeeee; margin-bottom:10px;">
<div class="radio" style="margin-bottom:6px; ">
<input id="radio188" name="radio1" value="option1" checked="" type="radio" class="alo4">
<label for="radio188" style="font-size:16px; font-weight:600">&nbsp;Paypal <img src="<?php echo base_url();?>public/front/images/paypal.png" width="55" height="20" style=" margin-left:47px;"  /> </label>
</div>
</div>


<button class="btn_contine pull-right" type="button">Add Payment Details</button>

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



<div class="modal fade" id="myModal_new_tag" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="images/close.png">
</button>
        <h3 style="margin:0px;"><center>Reviews</center></h3>
      </div>
      
       <h2 style="margin:50px 0px; color:#3fbb01; display:none;" class="mun" ><center>Thank you for your feedback!</center></h2>
      
      
      <div class="modal-body ">
       <form  class="form-horizontal san" name="register-form" >
      
        <div class="form-group has-feedback">
          <div class="col-md-12 padding">
   <div class="col-md-4">
  <p style=" color:#000; margin:0px;"> Rating  <span style="color:#F00">*</span></p>
  </div>
   <div class="col-md-7">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div class="radio">
<input id="radio1" name="radio1" value="option1" checked="" type="radio">
<label for="radio1">1 </label>
</div></td>
    <td><div class="radio">
<input id="radio12" name="radio1" value="option1q" checked="" type="radio">
<label for="radio12"> 2 </label>
</div></td>
    <td><div class="radio">
<input id="radio13" name="radio1" value="option1w" checked="" type="radio">
<label for="radio13"> 3 </label>
</div></td>
    <td><div class="radio">
<input id="radio14" name="radio1" value="option1e" checked="" type="radio">
<label for="radio14"> 4 </label>
</div></td>
    <td><div class="radio">
<input id="radio15" name="radio1" value="option1s" checked="" type="radio">
<label for="radio15"> 5 </label>
</div></td>
  </tr>
</table>

</div>
</div>
</div>


      <div class="form-group has-feedback">
          <div class="col-md-12 padding">
   <div class="col-md-4">
  <p style=" color:#000; margin:0px;">Message <span style="color:#F00">*</span></p>
  </div>
   <div class="col-md-7">
   <textarea class="form-control" style="height:150px;"></textarea>
</div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-md-12 padding">
   <div class="col-md-4">
  <p style=" color:#000; margin:0px;">&nbsp;</p>
  </div>
   <div class="col-md-7">
   <input class="btn_login alo"  value=Submit style="margin:5px 0px 0px 0px;"/>
  </div>
 </div>
</div>

</form>

      </div>
      
      
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
$(".alo").click(function(){
    $(".san").hide();
	  $(".mun").show();
});
});
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
$(".alo").click(function(){
    $(".muz").hide();
	 $(".san").show();
});

$(".alo1").click(function(){
	$(".muz").hide();
    $(".san1").show();
});
$(".alo2").click(function(){
	$(".muz").hide();
    $(".san2").show();
});
$(".alo3").click(function(){
	$(".muz").hide();
   
});
$(".alo4").click(function(){
	$(".muz").hide();
    
});
$(".alo5").click(function(){
	$(".muz").hide();
    
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