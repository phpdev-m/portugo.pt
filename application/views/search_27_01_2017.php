<?php
error_reporting(0);
//echo '<pre>';
//print_r($restaurant_search); die;
require_once(APPPATH.'libraries/config.php');
$session_user_id=$this->session->userdata('session_search_data');

?> 
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
$(document).ready(function(){
$(".sort").on('change',function(){

$(".right_pan").html('<img src="<?php  echo base_url('public/front/images/ajax-loader.gif'); ?>" style="margin-left:340px; margin-top:100px;">');
var sort_by=$(".sort_by").val();
var cuisine_id=$("#cuisine_id").val();

var rating=$("#rating").val();

$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('search/load_restaurant'); ?>', 
    data: {cuisine_id:cuisine_id,rating:rating,sort_by:sort_by}, 
    success: function (data) {
     //alert(data);
	$(".right_pan").html(data);
	
	}
    });

});
});
</script>
<script>
$(document).ready(function(){
$(".sort1").on('change',function(){

$(".right_pan").html('<img src="<?php  echo base_url('public/front/images/ajax-loader.gif'); ?>" style="margin-left:340px; margin-top:100px;">');
var sort_by=$(".sort_by1").val();
var cuisine_id=$("#cuisine_id").val();

var rating=$("#rating").val();

//alert(sort_by);
$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('search/load_restaurant'); ?>', 
    data: {cuisine_id:cuisine_id,rating:rating,sort_by:sort_by}, 
    success: function (data) {
     //alert(data);
	$(".right_pan").html(data);
	$(document).trigger('click');
	}
    });

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
 
     
  <div class=" inner_wrapper wrap_margin" >
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12">
       <a href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('Home')?></a>&nbsp;  / &nbsp; <?php echo $this->lang->line('Search')?>
      </div>
      </div>
   </div>
  <div class="container">
    <div class="row1">
	 <?php 
	  if(!empty($restaurant_search)){?>
	  
	  <div class="col-sm-3 padding_768 mobile">
      <div class="col-xs-6">
  <div class="dropdown filter_head" id="myDropdown">
     <h1 style="cursor:pointer; border-bottom:#036 1px solid; padding-bottom:5px;" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->lang->line('Filter')?><span class="caret pull-right" style="margin-top:10px;"></span></h1>
    <ul class="dropdown-menu" style="width:300px; position:absolute; z-index:9999">
      <div style="background:#fafafa; border-radius:5px;">
     
 <div class="category">

<ul>
<li>
&nbsp;

</li>

<li>
<form id="registerForm" class="form-horizontal" >
<select class="form-control sort1 sort_by1" style="height:40px; margin:20px 0px" id="sort">
<option value="">-- <?php echo $this->lang->line('Select option');?> --</option>
<option value="popular"><?php echo $this->lang->line('Popularity');?></option>
<option value="min_order"> <?php echo $this->lang->line('Minimum order value');?></option>

</select>
</form>
</li>

            
  <li><a href="javascript:void(0);"><?php echo $this->lang->line('Rating')?>  <span> 
<h4 style="color:#ffbf00; margin-top:0px;">
<i class="fa fa-star-o rat r-1" cus="1"></i>
<i class="fa fa-star-o rat r-2" cus="2"></i>
<i class="fa fa-star-o rat r-3" cus="3"></i>
<i class="fa fa-star-o rat r-4" cus="4"></i>
<i class="fa fa-star-o rat r-5" cus="5"></i>
</h4></span> </a></li>  
 
</ul>
</div>
     </div> 
    </ul>
  </div>
     </div>
      <div class="col-xs-6">
     <div class="filter_head dropdown" style="margin-top:20px;" id="myDropdown">
    <h1 class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer; border-bottom:#036 1px solid; padding-bottom:5px;"><?php echo $this->lang->line('Cuisine')?><span class="caret pull-right" style="margin-top:10px;"></span></h1>
    
    
     <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="width:300px;left: auto;
    right: 0; position:absolute; z-index:9999">
     <div style="background:#fafafa; border-radius:5px;">
     
 <div class="c_nav">
<ul>
<?php
$all_cusin = $this->restaurant_model->cusin_all();
foreach($all_cusin as $key=>$cuision){
$res_num=$this->search_model->get_number_restaurentbycuisine($cuision['id'],$session_user_id['search_data']);
?>
<li><a href="javascript:void(0);"  class="cuisine" id="cuisine<?php echo $cuision['id']; ?>"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp; <?php echo ucfirst($cuision['cuisine_name']);?> <span style="float:right"><?php echo $res_num; ?></span></a></li>
  <?php } ?> 
</ul>
</div>
     </div>
     </ul>
     </div>
	 </div>
     </div>
	  
	  
     <div class="col-md-3 padding_768 pc">
     
     
     <div>
     <div class="filter_head">
    <h1 style="cursor:pointer"><?php echo $this->lang->line('Filter')?> </h1>
    </div>
     <div style="background:#fafafa; border-radius:5px;">
     
 <div class="category">

<ul>
<li>
&nbsp;

</li>

<li>
<select class="form-control sort sort_by" style="height:40px; margin:20px 0px" id="sort">
<option value="">-- <?php echo $this->lang->line('Select option');?> --</option>
<option value="popular"><?php echo $this->lang->line('Popularity');?></option>
<option value="min_order"> <?php echo $this->lang->line('Minimum order value');?></option>

</select>

</li>

            
  <li><a href="javascript:void(0);"><?php echo $this->lang->line('Rating')?>  <span> 
<h4 style="color:#ffbf00; margin-top:0px;">
<i class="fa fa-star-o rat r-1" cus="1"></i>
<i class="fa fa-star-o rat r-2" cus="2"></i>
<i class="fa fa-star-o rat r-3" cus="3"></i>
<i class="fa fa-star-o rat r-4" cus="4"></i>
<i class="fa fa-star-o rat r-5" cus="5"></i>
</h4></span> </a></li>  
 
</ul>
</div>
     </div>
     </div>
    
     <div>
     <div class="filter_head" style="margin-top:30px;">
    <h1><?php echo $this->lang->line('Cuisine')?> </h1>
    </div>
     <div style="background:#fafafa; border-radius:5px;">
     
 <div class="c_nav">
<ul>
<?php
$all_cusin = $this->restaurant_model->cusin_all();
foreach($all_cusin as $key=>$cuision){
$res_num=$this->search_model->get_number_restaurentbycuisine($cuision['id'],$session_user_id['search_data']);
?>
<li><a href="javascript:void(0);"  class="cuisine" id="cuisine<?php echo $cuision['id']; ?>"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp; <?php echo ucfirst($cuision['cuisine_name']);?> <span style="float:right"><?php echo $res_num; ?></span></a></li>
  <?php } ?> 
</ul>
</div>
     </div>
     </div>
     </div>
	 <?php } ?>
     
     <div class="col-md-<?php if(!empty($restaurant_search)){ echo '9';}else{echo '12';}?>">
	 <center><p style="margin-top:100px; display:none;" id="loader"><img src="<?php echo base_url();?>public/front/images/loader.gif" /></p></center>
	 
	 
	 
	 
	   <div class="right_pan mobile">
      <?php
	  if(!empty($restaurant_search)){
	  foreach($restaurant_search as $key=>$all_restaurant){
	  $date=date("l");
	       $today = $this->restaurant_model->time_table($all_restaurant['id'],$date);
	  //print_r($today); die;
	   $review=$this->search_model->get_restaurant_review($all_restaurant['id']);
	  ?>
	  
      <div class="cuisine_col">
     <div class="col-sm-12">  <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><h1><?php echo $all_restaurant['restaurant_name'];?></h1></a></div>
     <div class="col-sm-12">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" valign="top">
   
		   <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><div class="resbg" style="background:rgba(0, 0, 0, 0) url('<?php echo base_url();?>image_gallery/cover_photo/<?php echo $all_restaurant['cover_photo'];?>') no-repeat scroll center top / cover ; float:left;  margin: 10px 10px 10px 0;
    max-width: 100%; height:88px;">
          <img src="<?php echo base_url();?>public/front/images/res_bg_mobile.png"  height="88" width="100"  />
		  <?php
		  if($all_restaurant['restaurant_logo']!='' && file_exists('image_gallery/restaurant_logo/'.$all_restaurant['restaurant_logo']))
		  {?>
		  <img src="<?php echo base_url();?>image_gallery/restaurant_logo/<?php echo $all_restaurant['restaurant_logo']; ?>"  style="position:absolute; top:0; left:
          0px; margin:24px 0 0 24px; height:50px;"/><?php } else {?>
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  style="position:absolute; top:0; left:
          0px; margin:24px 0 0 24px; height:50px;"/>
		  <?php } ?>
          </div></a>
          <font style="color:#ffbf00;">
    
<?php
$rat_val = $all_restaurant['avg_rating'];
for($i=1;$i<=5;$i++){?>
<?php
if($rat_val>=$i){?>
<i class="fa fa-star"></i>
<?php }else{ ?>

<i class="fa fa-star-o"></i>
<?php } }?>
<span style="color:#333">(<?php echo count($review); ?>)</span>


</font>
<h4><?php echo $this->lang->line('Rating');?>: <span><?php echo $all_restaurant['avg_rating'];?></span> <br /><?php echo $this->lang->line('Minimum Order');?>: <span><?php echo $dollar; ?><?php echo $all_restaurant['min_order'];?> </span><br /> <?php echo $this->lang->line('Delivery Charges');?>:  <span><?php echo $dollar; ?><?php echo $all_restaurant['delivery_charges'];?></span> <br /><?php echo $this->lang->line('Delivery');?>:  <span><?php echo $all_restaurant['delivery_time_min'];?> <?php echo $this->lang->line('mints');?> </span></h4>
          <h2><?php echo substr(stripslashes(strip_tags($all_restaurant['restaurant_description'])),0,70); if(strlen($all_restaurant['restaurant_description'])>70){echo ".....";}?>  <br />

 <?php
	   if(@$today['status']=='Open')
	   {?>
	   <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><button class="btn_order" style="margin:18px 0px 0px 0px;" type="submit"><?php echo $this->lang->line('Place order');?></button></a>
	   <?php } else{?>
	   <a href="javascript:void(0);" data-target="#myModal" data-toggle="modal"><button class="btn_order" style="margin:18px 0px 0px 0px;" type="submit"><?php echo $this->lang->line('Place order');?></button></a>
	   <?php } ?>
</h2>
    </td>
  </tr>
</table>
       </div>
       </div>
        <?php } }else{?>
	  <div class="cuisine_col">
       <div class="col-sm-12">
        <center><h1><?php echo $this->lang->line('Sorry,We don t find restaurant this location');?> <?php echo $session_user_id['search_data'];?></h1></center>
		<br />
		<center><a href="<?php echo base_url();?>"><input type="button" class="btn_login alo"  value="Change location" style="margin:5px 0px 0px 0px; width:200px;"/></a></center>
       </div>
             
       </div>
	 
	  <?php }?>
       
      </div>
	 
	 
	 
	 
	 
      <div class="right_pan pc">
	  
	  <?php 
	  if(!empty($restaurant_search)){
	  foreach($restaurant_search as $key=>$all_restaurant){
	  $date=date("l");
	       $today = $this->restaurant_model->time_table($all_restaurant['id'],$date);
	  //print_r($today); die;
	   $review=$this->search_model->get_restaurant_review($all_restaurant['id']);
	  ?>
      
      <div class="cuisine_col">
       <div class="col-sm-4">
        <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><div class="resbg" style="background:rgba(0, 0, 0, 0) url('<?php echo base_url();?>image_gallery/cover_photo/<?php echo $all_restaurant['cover_photo'];?>') no-repeat scroll center top / cover ;">
          <img src="<?php echo base_url();?>public/front/images/res_bg.png"  />
		   <?php
		  if($all_restaurant['restaurant_logo']!='' && file_exists('image_gallery/restaurant_logo/'.$all_restaurant['restaurant_logo']))
		  {?>
		  <img src="<?php echo base_url();?>image_gallery/restaurant_logo/<?php echo $all_restaurant['restaurant_logo']; ?>"  style="position:absolute; top:0; left:
          0px; margin:38px 0 0 26px; width:72px; height:77px;"/>
		  <?php } else {?>
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  style="position:absolute; top:0; left:
          0px; margin:38px 0 0 26px"/>
		  <?php } ?>
          </div></a>
       </div>
       <div class="col-sm-8 padding_main">
       <div class="col-sm-8">
       <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><h1><?php echo $all_restaurant['restaurant_name'];?></h1></a>
       <h2 style="font-size:14px;"><?php echo substr(stripslashes(strip_tags($all_restaurant['restaurant_description'])),0,150); if(strlen($all_restaurant['restaurant_description'])>150){echo ".....";}?></h2>
       
       
<h4 style="color:#ffbf00;">
<?php
$rat_val = $all_restaurant['avg_rating'];
for($i=1;$i<=5;$i++){?>
<?php
if($rat_val>=$i){?>
<i class="fa fa-star"></i>
<?php }else{ ?>

<i class="fa fa-star-o"></i>
<?php } }?>
<span style="color:#333">(<?php echo count($review); ?>)</span>
<?php //echo $all_restaurant['cuisine_types'];?>
</h4>
       
       </div>
       <div class="col-sm-4">
       <h4><?php echo $this->lang->line('Rating');?>: <span><?php echo $all_restaurant['avg_rating'];?></span></h4>
       <h4><?php echo $this->lang->line('Minimum Order');?>: <span><?php echo $dollar; ?><?php echo $all_restaurant['min_order'];?> </span></h4>
       <h4><?php echo $this->lang->line('Delivery Charges');?>:  <span><?php echo $dollar; ?><?php echo $all_restaurant['delivery_charges'];?></span></h4>
       <h4><?php echo $this->lang->line('Delivery');?>:  <span><?php echo $all_restaurant['delivery_time_min'];?> <?php echo $this->lang->line('mints');?> </span></h4>
       <h4>
	   <?php
	   if(@$today['status']=='Open')
	   {?>
	   <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><button class="btn_order" type="submit" style="font-size:12px;"><?php echo $this->lang->line('Place order');?></button></a>
	   <?php } else{?>
	   <a href="javascript:void(0);" data-target="#myModal" data-toggle="modal"><button class="btn_order" type="submit" style="font-size:12px;"><?php echo $this->lang->line('Place order');?></button></a>
	   <?php } ?>
	   
	   </h4>
       </div>
       </div>      
       </div>
       
      <?php } }else{?>
	  <div class="cuisine_col">
       <div class="col-sm-12">
        <center><h1><?php echo $this->lang->line('Sorry,We don t find restaurant this location');?> <?php echo $session_user_id['search_data'];?></h1></center>
		<br />
		<center><a href="<?php echo base_url();?>"><input type="button" class="btn_login alo"  value="Change location" style="margin:5px 0px 0px 0px; width:200px;"/></a></center>
       </div>
             
       </div>
	 
	  <?php }?>
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

<script>
$(function(){
   $('.rat').on('click',function(){
      var rat_val = $(this).attr('cus');
	  if(rat_val==1){
	  $('.r-1').removeClass('fa-star-o');
	  $('.r-2').removeClass('fa-star');
	  $('.r-2').removeClass('add-star');
	  $('.r-3').removeClass('fa-star');
	  $('.r-3').removeClass('add-star');
	  $('.r-4').removeClass('fa-star');
	  $('.r-4').removeClass('add-star');
	  $('.r-5').removeClass('fa-star');
	  $('.r-5').removeClass('add-star');
	  $('.r-1').addClass('fa-star');
	  $('.r-1').addClass('add-star');
	  $('.r-1').addClass('one-add-star');
	  $('.r-2').addClass('fa-star-o');
	  $('.r-3').addClass('fa-star-o');
	  $('.r-4').addClass('fa-star-o');
	  $('.r-5').addClass('fa-star-o');
	  $("#rating").val(1);
	  }
	  if(rat_val==2){
	  $('.r-1').removeClass('fa-star-o');
	  $('.r-1').removeClass('one-add-star');
	  $('.r-2').removeClass('fa-star-o');
	  $('.r-3').removeClass('fa-star');
	  $('.r-3').removeClass('add-star');
	  $('.r-4').removeClass('fa-star');
	  $('.r-4').removeClass('add-star');
	  $('.r-5').removeClass('fa-star');
	  $('.r-5').removeClass('add-star');
	  $('.r-1').addClass('fa-star');
	  $('.r-1').addClass('add-star');
	  $('.r-2').addClass('fa-star');
	  $('.r-2').addClass('add-star');
	  $('.r-3').addClass('fa-star-o');
	  $('.r-4').addClass('fa-star-o');
	  $('.r-5').addClass('fa-star-o');
	  $("#rating").val(2);
	  }
	  if(rat_val==3){
	  $('.r-1').removeClass('fa-star-o');
	  $('.r-1').removeClass('one-add-star');
	  $('.r-2').removeClass('fa-star-o');
	  $('.r-3').removeClass('fa-star-o');
	  $('.r-4').removeClass('fa-star');
	  $('.r-4').removeClass('add-star');
	  $('.r-5').removeClass('fa-star');
	  $('.r-5').removeClass('add-star');
	  $('.r-1').addClass('fa-star');
	  $('.r-1').addClass('add-star');
	  $('.r-2').addClass('fa-star');
	  $('.r-2').addClass('add-star');
	  $('.r-3').addClass('fa-star');
	  $('.r-3').addClass('add-star');
	  $('.r-4').addClass('fa-star-o');
	  $('.r-5').addClass('fa-star-o');
	  $("#rating").val(3);
	  }
	  if(rat_val==4){
	  $('.r-1').removeClass('fa-star-o');
	  $('.r-1').removeClass('one-add-star');
	  $('.r-2').removeClass('fa-star-o');
	  $('.r-3').removeClass('fa-star-o');
	  $('.r-4').removeClass('fa-star-o');
	  $('.r-5').removeClass('fa-star');
	  $('.r-5').removeClass('add-star');
	  $('.r-1').addClass('fa-star');
	  $('.r-1').addClass('add-star');
	  $('.r-2').addClass('fa-star');
	  $('.r-2').addClass('add-star');
	  $('.r-3').addClass('fa-star');
	  $('.r-3').addClass('add-star');
	  $('.r-4').addClass('fa-star');
	  $('.r-4').addClass('add-star');
	  $('.r-5').addClass('fa-star-o');
	  $("#rating").val(4);
	  }
	   if(rat_val==5){
	  $('.r-1').removeClass('fa-star-o');
	  $('.r-1').removeClass('one-add-star');
	  $('.r-2').removeClass('fa-star-o');
	  $('.r-3').removeClass('fa-star-o');
	  $('.r-4').removeClass('fa-star-o');
	  $('.r-5').removeClass('fa-star-o');
	  $('.r-1').addClass('fa-star');
	  $('.r-1').addClass('add-star');
	  $('.r-2').addClass('fa-star');
	  $('.r-2').addClass('add-star');
	  $('.r-3').addClass('fa-star');
	  $('.r-3').addClass('add-star');
	  $('.r-4').addClass('fa-star');
	  $('.r-4').addClass('add-star');
	  $('.r-5').addClass('fa-star');
	  $('.r-5').addClass('add-star');
	  $("#rating").val(5);
	  }
	  
	  
	  $(".right_pan").html('<img src="<?php  echo base_url('public/front/images/ajax-loader.gif'); ?>" style="margin-left:340px; margin-top:100px;">');
var sort_by=$("#sort").val();
var cuisine_id=$("#cuisine_id").val();
var rating= $("#rating").val();


$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('search/load_restaurant'); ?>', 
    data: {cuisine_id:cuisine_id,rating:rating,sort_by:sort_by}, 
    success: function (data) {
     //alert(data);
	$(".right_pan").html(data);
	
	}
    });
	  
	  
	  
	  
   });
});
</script>

 <input name="rating" value="" id="rating" type="hidden"  >
 <input type="hidden" id="cuisine_id" value="">
 
 <script>
$(document).ready(function(){
$(".cuisine").click(function(){
$(".right_pan").html('<img src="<?php  echo base_url('public/front/images/ajax-loader.gif'); ?>" style="margin-left:340px; margin-top:100px;">');
//return false;
var id=$(this).attr('id');
$(".cuisine").removeClass('active');
$("#"+id).addClass('active');
var cuisine_id=id.replace('cuisine','');
$("#cuisine_id").val(cuisine_id);
var rating=$("#rating").val();
var sort_by=$("#sort").val();

$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('search/load_restaurant'); ?>', 
    data: {cuisine_id:cuisine_id,rating:rating,sort_by:sort_by}, 
    success: function (data) {
     //alert(data);
	$(".right_pan").html(data);
	
	}
    });

});
});
</script>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url('public/front/images/close.png'); ?>">
</button>
        <h3 style="margin:0px; text-align:center" id=""><?php echo $this->lang->line('Message');?></h3>
      </div>
      

      
      
      <div class="modal-body " id="model_content">
       <form  class="form-horizontal san" name="register-form" >
      
        <div class="form-group has-feedback">
          <div class="col-md-12 padding">
          
          <h4 style="text-align:center"><?php echo $this->lang->line('This restaurant is closed for today');?>.</h4>
   
  <div class="clearfix"></div>
   <div class="col-md-7 padding_main">
   
   



 




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
   <center><button class="btn_popup  " data-dismiss="modal" style="margin:5px 0px 0px 0px; width:150px;">Ok</button></center>
  
  </div>
 </div>
</div>

</form>

      </div>
      
      
    </div>
  </div>
</div>