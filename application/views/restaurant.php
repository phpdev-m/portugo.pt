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
<script src="js/jquery-ui.js"></script>
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
  
  <?php $this->load->view('segment/header'); ?>
  
 	 
  <div class=" inner_wrapper" style="margin-top:103px;">
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12">
       <a href="<?php echo base_url('home'); ?>">Home</a>&nbsp;  / &nbsp; Restaurant
      </div>
      </div>
   </div>
  <div class="container">
    <div class="row1">
     <div class="col-md-3">
     <div>
     <div class="filter_head">
    <h1 style="cursor:pointer">Filter </h1>
    </div>
     <div style="background:#fafafa; border-radius:5px;">
     
 <div class="category">

<ul>
<li>
&nbsp;

</li>

<li>
<select class="form-control" style="height:40px; margin:20px 0px">
<option>Popularity</option>
<option> Minimum order value</option>

</select>

</li>

           <!--<li><a href="javascript:void(0);" >Distance  <span>
              <div class="col-lg-12 padding_main" style="margin-top:10px;" >
                <div id="slider-range3" ></div>
                </div>
               
                
                 <center> <p style="margin-top:10px;"><input type="text" id="amount3" readonly style="background: none repeat scroll 0 0 rgba(0, 0, 0, 0);                  border: 0 none; color: #000;  width:70px;"></p></center>
                </span> </a></li>-->
 
  <li><a href="javascript:void(0);">Rating  <span> 
<h4 style="color:#ffbf00; margin-top:0px;">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</h4></span> </a></li>  
 
</ul>
</div>
     </div>
     </div>
     
     <div>
     <div class="filter_head" style="margin-top:30px;">
    <h1>Cuisine </h1>
    </div>
     <div style="background:#fafafa; border-radius:5px;">
     
 <div class="c_nav">
<ul>
<li><a href="#"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp; Pizza <span style="float:right">130</span></a></li>
    <li><a href="#"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp; Italian <span style="float:right">200</span></a></li>
     <li><a href="#"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp; Thai <span style="float:right">125</span></a></li>
    <li><a href="#"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp; Greek <span style="float:right">110</span></a></li>
     <li><a href="#"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp; Lebanese <span style="float:right">215</span></a></li>
    <li><a href="#"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp;  Japanese <span style="float:right">100</span></a></li>
     <li><a href="#"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp; Chinese <span style="float:right">120</span></a></li>
    <li><a href="#"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp;  Canadian <span style="float:right">210</span></a></li>
    <li><a href="#"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp;  Wings <span style="float:right">300</span></a></li>
     <li><a href="#"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp; Sandwiches <span style="float:right">213</span></a></li>
    <li><a href="#"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp;  Chicken <span style="float:right">124</span></a></li>
    <li><a href="#"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp;  Chicken <span style="float:right">321</span></a></li>

</ul>
</div>
     </div>
     </div>
     </div>
     
     <div class="col-md-9 padding_main">
      <div class="right_pan">
      
      
      <div class="col-md-4 padding_more">
      <div class="restaurant_col">
       <div class="col-sm-12 padding_main">
        <div class="resbg">
          <img src="<?php echo base_url();?>public/front/images/res_bg.png"  />
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  style="position:absolute; top:0; left:
          0px; margin:38px 0 0 10px"/>
          </div>
       </div>
       <div class="col-sm-12 padding_main">
       <h1><a href="restaurant_detail.html">Milano Pizza</a> <span>30 Min</span></h1>
       <h6><span>  Italian </span> <span>  Greek </span><span>     Japanese  </span></h6>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><h2>Opening Hours </h2></td>
    <td align="right" valign="top"><h2><span>12:00 - 15:30 
    </span></h2></td>
  </tr>
  
   <tr>
    <td valign="top"><h2>Closing Hours</h2></td>
    <td align="right" valign="top"><h2><span> 18:00 - 22:30 </span></h2></td>
  </tr>
</table>
       
       </div>      
       </div>
       </div>
       
      <div class="col-md-4 padding_more">
      <div class="restaurant_col">
       <div class="col-sm-12 padding_main">
        <div class="resbg">
          <img src="<?php echo base_url();?>public/front/images/res_bg.png"  />
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  style="position:absolute; top:0; left:
          0px; margin:38px 0 0 10px"/>
          </div>
       </div>
       <div class="col-sm-12 padding_main">
       <h1><a href="restaurant_detail.html">Milano Pizza</a> <span>30 Min</span></h1>
       <h6><span>  Italian </span> <span>  Greek </span><span>     Japanese  </span></h6>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><h2>Opening Hours </h2></td>
    <td align="right" valign="top"><h2><span>12:00 - 15:30 
    </span></h2></td>
  </tr>
  
   <tr>
    <td valign="top"><h2>Closing Hours</h2></td>
    <td align="right" valign="top"><h2><span> 18:00 - 22:30 </span></h2></td>
  </tr>
</table>
       
       </div>      
       </div>
       </div>
       
       <div class="col-md-4 padding_more">
      <div class="restaurant_col">
       <div class="col-sm-12 padding_main">
        <div class="resbg">
          <img src="<?php echo base_url();?>public/front/images/res_bg.png"  />
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  style="position:absolute; top:0; left:
          0px; margin:38px 0 0 10px"/>
          </div>
       </div>
       <div class="col-sm-12 padding_main">
       <h1><a href="restaurant_detail.html">Milano Pizza</a> <span>30 Min</span></h1>
       <h6><span>  Italian </span> <span>  Greek </span><span>     Japanese  </span></h6>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><h2>Opening Hours </h2></td>
    <td align="right" valign="top"><h2><span>12:00 - 15:30 
    </span></h2></td>
  </tr>
  
   <tr>
    <td valign="top"><h2>Closing Hours</h2></td>
    <td align="right" valign="top"><h2><span> 18:00 - 22:30 </span></h2></td>
  </tr>
</table>
       
       </div>      
       </div>
       </div>
       
       <div class="col-md-4 padding_more">
      <div class="restaurant_col">
       <div class="col-sm-12 padding_main">
        <div class="resbg">
          <img src="<?php echo base_url();?>public/front/images/res_bg.png"  />
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  style="position:absolute; top:0; left:
          0px; margin:38px 0 0 10px"/>
          </div>
       </div>
       <div class="col-sm-12 padding_main">
       <h1><a href="restaurant_detail.html">Milano Pizza</a> <span>30 Min</span></h1>
       <h6><span>  Italian </span> <span>  Greek </span><span>     Japanese  </span></h6>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><h2>Opening Hours </h2></td>
    <td align="right" valign="top"><h2><span>12:00 - 15:30 
    </span></h2></td>
  </tr>
  
   <tr>
    <td valign="top"><h2>Closing Hours</h2></td>
    <td align="right" valign="top"><h2><span> 18:00 - 22:30 </span></h2></td>
  </tr>
</table>
       
       </div>      
       </div>
       </div>
       
       <div class="col-md-4 padding_more">
      <div class="restaurant_col">
       <div class="col-sm-12 padding_main">
        <div class="resbg">
          <img src="<?php echo base_url();?>public/front/images/res_bg.png"  />
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  style="position:absolute; top:0; left:
          0px; margin:38px 0 0 10px"/>
          </div>
       </div>
       <div class="col-sm-12 padding_main">
       <h1><a href="restaurant_detail.html">Milano Pizza</a> <span>30 Min</span></h1>
       <h6><span>  Italian </span> <span>  Greek </span><span>     Japanese  </span></h6>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><h2>Opening Hours </h2></td>
    <td align="right" valign="top"><h2><span>12:00 - 15:30 
    </span></h2></td>
  </tr>
  
   <tr>
    <td valign="top"><h2>Closing Hours</h2></td>
    <td align="right" valign="top"><h2><span> 18:00 - 22:30 </span></h2></td>
  </tr>
</table>
       
       </div>      
       </div>
       </div>
       
       <div class="col-md-4 padding_more">
      <div class="restaurant_col">
       <div class="col-sm-12 padding_main">
        <div class="resbg">
          <img src="<?php echo base_url();?>public/front/images/res_bg.png"  />
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  style="position:absolute; top:0; left:
          0px; margin:38px 0 0 10px"/>
          </div>
       </div>
       <div class="col-sm-12 padding_main">
       <h1><a href="restaurant_detail.html">Milano Pizza</a> <span>30 Min</span></h1>
       <h6><span>  Italian </span> <span>  Greek </span><span>     Japanese  </span></h6>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><h2>Opening Hours </h2></td>
    <td align="right" valign="top"><h2><span>12:00 - 15:30 
    </span></h2></td>
  </tr>
  
   <tr>
    <td valign="top"><h2>Closing Hours</h2></td>
    <td align="right" valign="top"><h2><span> 18:00 - 22:30 </span></h2></td>
  </tr>
</table>
       
       </div>      
       </div>
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
   
   
    
<div class="clearfix"  style="height:40px;"></div>
  
  <?php $this->load->view('segment/footer'); ?> 
  
</body>
</html>

<div class="modal fade" id="myModal_res_detail" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url();?>public/front/images/close.png">
</button>
        <h3 style="margin:0px;">Pizza</h3>
      </div>
      

      
      
      <div class="modal-body ">
       <form  class="form-horizontal san" name="register-form" >
      
        <div class="form-group has-feedback">
          <div class="col-md-12 padding">
          
          <h4>Hand tossed pizza.</h4>
   <div class="col-md-12 padding_main">
  <p style=" color:#000; margin:10px 0px;"> Option </p>
  </div>
  <div class="clearfix"></div>
   <div class="col-md-7 padding_main">
   
   <div class="radio">
<input id="radio1" name="radio1" value="option1" checked="" type="radio">
<label for="radio1">&nbsp;Regular </label>
</div>

<div class="radio">
<input id="radio122" name="radio1" value="option1" checked="" type="radio">
<label for="radio122">&nbsp;Twisted Spicy Dough </label>
</div>

 <div class="radio">
<input id="radio133" name="radio1" value="option1" checked="" type="radio">
<label for="radio133">&nbsp;Regular </label>
</div>

<div class="radio">
<input id="radio1333" name="radio1" value="option1" checked="" type="radio">
<label for="radio1333">&nbsp;Twisted Spicy Dough </label>
</div>


</div>
</div>
</div>


  <hr />    

<div class="form-group has-feedback">
  <div class="col-md-12 padding">
   <div class="col-md-4">
  <p style=" color:#000; margin:0px;">&nbsp;</p>
  </div>
   <div class="col-md-12  padding_main">
   <button class="btn_login pull-right" style="margin:5px 0px 0px 0px; width:160px;">Add to cart</button>
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