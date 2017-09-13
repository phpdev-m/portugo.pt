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


 	 
  <div class=" inner_wrapper wrap_margin" >
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12 padding_main">
       <a href="#"><?php echo $this->lang->line('Home');?></a>&nbsp;  / &nbsp;       <?php echo $this->lang->line('My Favorites Dishes');?> 

	   <?php $this->load->view('segment/header');?>

      </div>
      </div>
   </div>
  <div class="container">
    <div class="row">
       
      <?php $this->load->view('segment/user_sidebar');?>
     
     <div class="col-md-09 padding_main">
     <div class="col-md-12">
     <div class="account_head">
    <h1><?php echo $this->lang->line('My Favorites Dish');?> </h1>
    </div>
    <div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   
    <td width="45%" height="40" align="center" class="td_bord2"><strong><?php echo $this->lang->line('Restaurant Name');?></strong></td>
    <td width="45%" height="40" align="center" class="td_bord2"><strong><?php echo $this->lang->line('Dishes');?></strong></td>
   <!-- <td width="30%" height="40" align="center" class="td_bord2"><strong><?php echo $this->lang->line('Rate Us');?></strong></td>-->
    <td width="14%" height="40" align="center" class="td_bord2"><strong><?php echo $this->lang->line('Action');?></strong></td>
  </tr>
  <?php
  $i=0;
  if(!empty($fav_dish))
  {	 
  foreach($fav_dish as $alldish)
  {	  
  $restaurant_menu=$this->restaurant_model->get_restaurent_menu_detail($alldish['menu_id']);
  //print_r($restaurant_menu);
  $i++;
  ?>
   <tr id="row<?php echo $alldish['fav_dish_id']; ?>">
    
    <td height="60" align="center" class="td_bord2"><a href="<?php echo base_url('restaurant_details/'); ?>?id=<?php echo $restaurant_menu['id']; ?>"> <?php  echo ucfirst($restaurant_menu['restaurant_name']); ?></a> </td>
    <td height="60" align="center" class="td_bord2"><a href="javascript:void(0);"><?php  echo ucfirst($restaurant_menu['item_name']); ?></a></td>
   
    <td height="60" align="center" class="td_bord2"><a href="javascript:void(0);" data-target="#myModal_res_detail" data-toggle="modal" class="remove" id="remove<?php echo $alldish['fav_dish_id']; ?>"><img src="<?php echo base_url();?>public/front/images/delete.png"  /></a></td>
   </tr>
<?php } } else{ ?>
  
   
   <tr>
   
    <td height="60" align="center" bgcolor="#fafafa" class="td_bord" colspan="3"><div class="error"><?php echo $this->lang->line('No Records');?>.......</div></td>
   
  </tr>
  <?php } ?>
  
  
 
  
  
      </table>
    </div>
     </div>
     </div>
     </div>
    </div>
    
    
 
 <?php $this->load->view('segment/footer');?> 
 

</body>
</html>



<div class="modal fade" id="myModal_res_detail" tabindex="-1" role="dialog" >
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
          
          <h4 style="text-align:center"><?php echo $this->lang->line('Are you  sure to  remove this dish from your  favourite list');?></h4>
   
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
   <center><button class="btn_popup  " data-dismiss="modal" style="margin:5px 0px 0px 0px; width:150px;"><?php echo $this->lang->line('No');?></button>
   
   <button class="btn_popup  remove_yes" data-dismiss="modal" style="margin:5px 0px 0px 0px; width:150px;"><?php echo $this->lang->line('Yes');?></button>
   </center>
  
  </div>
 </div>
</div>

</form>

      </div>
      
      
    </div>
  </div>
</div>




<input type="hidden" name="" id="dish_id">
<script>
$(document).ready(function(){
$(".remove").click(function(){
var res=$(this).attr('id');
var fav_id=res.replace('remove','');
$("#dish_id").val(fav_id);

});
});
</script>

<script>
$(document).ready(function(){
$(".remove_yes").click(function(){
var res=$(this).attr('id');
var fav_id=$("#dish_id").val();
$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant_details/remove_fav_dish'); ?>', 
    data: {fav_id:fav_id}, 
    success: function (data) {
     //alert(data);
	document.location.reload();
	
	}
    });

});
});
</script>



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
      <div class="modal-body">
       <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate">
      
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
<input id="radio12" name="radio1" value="option1" checked="" type="radio">
<label for="radio12"> 2 </label>
</div></td>
    <td><div class="radio">
<input id="radio13" name="radio1" value="option1" checked="" type="radio">
<label for="radio13"> 3 </label>
</div></td>
    <td><div class="radio">
<input id="radio14" name="radio1" value="option1" checked="" type="radio">
<label for="radio14"> 4 </label>
</div></td>
    <td><div class="radio">
<input id="radio15" name="radio1" value="option1" checked="" type="radio">
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
   <button class="btn_login" type="submit" style="margin:5px 0px 0px 0px;">Submit</button>
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
