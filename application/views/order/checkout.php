<?php
require_once(APPPATH.'libraries/config.php');

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
  
   <?php $this->load->view('segment/header'); ?> 
  
  <div class=" inner_wrapper wrap_margin" >
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12 padding_main">
       <a href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('Home');?></a>&nbsp;  / &nbsp;      <?php echo $this->lang->line('Checkout');?>


      </div>
      </div>
   </div>
  <div class="container">
    <div class="row">
   <?php    
     $total_amount=0;
	$delivery_charge=0;
if(isset($restaurent['delivery_charges']) && $restaurent['delivery_charges']!=''){$delivery_charge=$restaurent['delivery_charges'];}
?>
     
     <div class="col-md-12 padding_main">
     <div class="col-md-12">
     
     
     <div class="account_head3" >
     <div class="col-md-8" style="background:#fff; padding-top:15px; padding-bottom:15px;">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="45%" valign="top">
	
	
	<div class="col-md-12 padding_more">
      <div class="restaurant_col">
       <div class="col-sm-12 padding_main">
       <div class="resbg" style="background:rgba(0, 0, 0, 0) url('<?php echo base_url();?>image_gallery/cover_photo/<?php echo $restaurent['cover_photo'];?>') no-repeat scroll center top / cover ;">
          <img src="<?php echo base_url();?>public/front/images/res_bg.png"  />
          <div style="position:absolute; top:0; left: 0px; margin:15px 0 0 6px">
          <div class="frame">
          <?php
		  if($restaurent['restaurant_logo']!='' && file_exists('image_gallery/restaurant_logo/'.$restaurent['restaurant_logo']))
		  {?>
		  <img src="<?php echo base_url();?>image_gallery/restaurant_logo/<?php echo $restaurent['restaurant_logo']; ?>" class="main_img" />
		  <?php } else {?>
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"/ class="main_img">
		  <?php } ?>
          </div>
          </div>
          
          </div>
		 
       </div>
	   </div>
	</div>
	
	
	
	<!--<?php
	if($restaurent['cover_photo']!='' && file_exists('image_gallery/cover_photo/'.$restaurent['cover_photo']))
	{?>
	<img src="<?php echo base_url();?>image_gallery/cover_photo/<?php echo $restaurent['cover_photo'];?>" width="80" height="80" />
	<?php } else {?>
	<img src="<?php echo base_url();?>public/front/images/res_img1.png" width="80" height="80" />
	<?php } ?>-->
	</td>
    <td width="55%" valign="top">
    <h1><?php 


//tela verifica checkout antes de pagamento

	if(!empty($cart))
	{

	foreach($cart as $allcart)
	  {
	   $type=$cart[0]['type'];

  	  $menu=$this->search_model->get_menu_detail($allcart['menu_id']);



	 $total_amount=$total_amount+$menu['item_cost']*$allcart['quantity'];

	  if($allcart['addons']!='')
	  {
	   $addon_id= explode(',',$allcart['addons']);

	  $addons=$this->search_model->get_addonsby_id($addon_id);

		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total_amount=$total_amount+$alladons['price'];
	   }}}


	echo ucfirst($menu['item_name']).'&nbsp;';} }?></h1>

    <h4><?php echo $this->lang->line('Order total');?>: <?php echo $dollar; ?><?php


	 if($type!='delivery')
		 {
		 $delivery_charge=0;
      		 }
		else
		 {
		    if ($total_amount >= $restaurent['free_delivery'])
	        	{
			$delivery_charge=0;
	         	}
		  }


           	 $total_amount=$total_amount+$delivery_charge;


                 echo number_format($total_amount,2); ?></h4>
    </td>
  </tr>
</table>

    </div>
    </div>
    <div class="clearfix"></div>
    
    
    <div class="table_responsive" id="order_detail">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td width="47%" height="40" align="left" class="td_bord2"><strong><?php echo $this->lang->line('Menu Name');?></strong></td>
    <td width="8%" height="40" align="left" class="td_bord2"><strong><?php echo $this->lang->line('Quantity');?></strong></td>
    <td width="23%" height="40" align="left" class="td_bord2"><strong><?php echo $this->lang->line('Price');?></strong></td>
    <td width="14%" height="40" align="left" class="td_bord2"><strong><?php echo $this->lang->line('Total Price');?></strong></td>
  </tr>
  
  <?php 
  $new_total_amount=0;
  

	if(!empty($cart))
	{
	$type=$cart[0]['type'];
	foreach($cart as $allcart)
	  {
	   $menu=$this->search_model->get_menu_detail($allcart['menu_id']);


           $new_total_amount=$new_total_amount+$menu['item_cost']*$allcart['quantity'];



	  ?>
   <tr>
    <td height="60" align="left" class="td_bord2"><?php echo ucfirst($menu['item_name']); ?><br /><?php echo ucfirst($menu['item_desc']); ?></td>
    <td height="60" align="left" class="td_bord2">

<input type="number" value="<?php echo $allcart['quantity']; ?>" class="cart_form quantity"  id="quantity<?php echo $allcart['id']; ?>" min="1" >

</td>
    <td height="60" align="left" class="td_bord2"><?php echo $dollar; ?> <fornt id="item_amount<?php echo $allcart['id']; ?>"><?php echo number_format($menu['item_cost'],2); ?></font></td>
    <td height="60" align="left" class="td_bord2"><?php echo $dollar; ?> <fornt id="item_total_amount"><?php echo number_format($menu['item_cost']*$allcart['quantity'],2); ?></font><a href="javascript:void(0);" class="delete_cart" id="delete_cart<?php echo $allcart['id']; ?>" style=" float:right;">X</a></td>
    
  </tr>
  
  
  <?php
		   if($allcart['addons']!='')
	  {
	   $addon_id= explode(',',$allcart['addons']);
	  $addons=$this->search_model->get_addonsby_id($addon_id);
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {

	   $new_total_amount=$new_total_amount+$alladons['price'];


	  ?>
	   <tr>
    <td height="60" align="left" class="td_bord2"><?php echo $this->lang->line('Addons');?>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucfirst($alladons['extra_item']); ?></td>
    <td height="60" align="left" class="td_bord2">&nbsp; 
     </td>
    <td height="60" align="left" class="td_bord2"><?php echo $dollar; ?> <?php echo number_format($alladons['price'],2); ?></td>
    <td height="60" align="left" class="td_bord2"><?php echo $dollar; ?> <?php echo number_format($alladons['price'],2); ?></td>
    
  </tr>
  <?php } } } ?>
  
  
  
  
  
  <?php } } ?>
   <?php




   if($type!='delivery')
                 {
                 $delivery_charge=0;
                 }
                else
                 {
                    if ($total_amount >= $restaurent['free_delivery'])
                        {
                        $delivery_charge=0;
                        }
                  }


                  $final_amount=$new_total_amount+$delivery_charge;


		   ?>
  
  
   <tr>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="right" class="td_bord3"><?php echo $this->lang->line('Sub Total');?></td>
     <td height="50" align="left" class="td_bord3"><?php echo $dollar; ?> <font id="subtotal"><?php echo number_format($new_total_amount,2); ?></td>
   </tr>
   
   <tr>
     
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="right" class="td_bord3"><?php echo $this->lang->line('Delivery Charges');?></td>
     <td height="50" align="left" class="td_bord3"><?php echo $dollar; ?> <font id="delivery_charge"><?php echo number_format($delivery_charge,2); ?></font></td>
   </tr>
   <tr>
     
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="right" class="td_bord3"><strong><?php echo $this->lang->line('Total');?></strong></td>
     <td height="50" align="left" class="td_bord3"><strong><?php echo $dollar; ?> <font id="final_total"><?php echo number_format($final_amount,2); ?></font></strong></td>
   </tr>
  
  
    </table>
    </div>
    
    <hr />
    
    <div class="col-lg-12 padding_main">
     <div class="col-sm-6">
      <h4><center><a href="#" data-target="#myModal_login_guest" data-toggle="modal" class="user_type" id="guest"><button class="btn_contine_guest " style="width:245px; font-size:20px;" type="button" ><?php echo $this->lang->line('Continue As Guest');?></button></a></center></h4>
     
     </div>
     <?php
	 @$session_data = $this->session->userdata('user_logged_in');
	 $restaurent_info=$this->restaurant_model->all_restaurant_details($restaurent['id']);
	 if(@$session_data['user_id']!=""){
	 if($restaurent_info['min_order']<=$new_total_amount && $new_total_amount!=0){
	 ?>
     
     <div class="col-sm-6">
       <h4><center><a href="javascript:void(0);"  class="user_type logged_in" id="user"><button class="btn_contine" type="button" style="width:245px; font-size:20px;" ><?php echo $this->lang->line('Continue');?></button></a></center></h4>
     </div>
	 <?php
	 }else{?>
	 <div class="col-sm-6">
       <h4><center><a href="<?php if($restaurent['id']==''){echo base_url();}else{?>restaurant_details/?id=<?php echo $restaurent['id'];}?>"  class="user_type logged_in" id="user"><button class="btn_contine" style="width:245px; font-size:20px;" type="button" >Continue Order</button></a></center></h4>
     </div>
	 <?php }} else {
	 if($restaurent_info['min_order']<=$new_total_amount){
	 ?>
	  <div class="col-sm-6">
       <h4><center><a href="javascript:void(0);" data-target="#myModal_login" data-toggle="modal" class="user_type" id="user"><button class="btn_contine" style="width:245px; font-size:20px;" type="button" ><?php echo $this->lang->line('Continue');?></button></a></center></h4>
     </div>
	 <?php }else{?>
	 <div class="col-sm-6">
       <h4><center><a href="<?php echo base_url();?>restaurant_details/?id=<?php echo $restaurent['id'];?>" data-target="#myModal_login" data-toggle="modal" class="user_type" id="user"><button class="btn_contine" type="button" style="width:245px; font-size:20px;" ><?php echo $this->lang->line('Continue');?></button></a></center></h4>
     </div>
	 <?php }}  ?>
    </div>
    
      
    
     </div>
     </div>
     </div>
    </div>
    
  
   <?php $this->load->view('segment/footer'); ?>  
 
</body>
</html>

<script type="text/javascript" src="js/ddaccordion.js">
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
<img src="<?php echo base_url();?>public/front/images/close.png">
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

<div class="modal fade" id="myModal_login_guest" tabindex="-1" role="dialog" >
  <div class="modal-dialog2" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url();?>public/front/images/close.png">
</button>
        <h3 style="margin:0px;"><center><?php echo $this->lang->line('Guest');?></center></h3>
      </div>
      
      <div class="modal-body" style="overflow:hidden">
       
       <div class="col-md-12 guest_login" style="display:none">
        <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate">
        <div class="col-xs-12 padding_main"><center><a href="javascript:void(0);" class="facebook_login"><img src="<?php echo base_url();?>public/front/images/facebook_login.png"  style=" margin:20px 0px 0px 0px;" /></a></center></div>
        <div class="col-xs-12 padding_main"><center><a href="<?php echo base_url('twtest'); ?>"><img src="<?php echo base_url();?>public/front/images/twitter_login.png"  style=" margin:20px 0px 20px 0px;" /></a></center></div>
        <div class="clearfix"></div>
        
      <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Email');?></p>
        <input id="firstname" class="form-control2" type="text" placeholder="" >
     </div>
    </div>


   <div class="form-group has-feedback">
    <div class="col-lg-12 ">
     <p class="inpu_text2"><?php echo $this->lang->line('Password');?></p>
     <input id="firstname" class="form-control2" type="text" placeholder="" >
   </div>
  </div>
                <div class="form-group has-feedback">
                 <div class="col-lg-12">
                  <div class="checkbox checkbox-primary">
                        <input id="1" class="styled" type="checkbox" >
                        <label for="1">
                            &nbsp;&nbsp;<?php echo $this->lang->line('Remember me');?>
                        </label>
                    </div>
                 </div>
                 </div>

         <div class="form-group has-feedback">
          <div class="col-lg-12">
          <button class="btn_loginmain" type="button"><?php echo $this->lang->line('Login');?></button>
          </div>
          </div>
          
          <div class="form-group has-feedback">
          <div class="col-lg-12 padding_main">
          <div class="col-xs-6">
         <a href="#"><?php echo $this->lang->line('Forgot password');?>?</a>
             </div>
          <div class="col-xs-6" style="text-align:right" >
         <a href="#" class="guest_login_btn"><?php echo $this->lang->line('Create account');?></a>
             </div>
          </div>
          </div>
          
        </form>
</div>
     

     <div class="col-md-12 guest_signup">
	  <div class="error" id="signup_error" style="display:none; color:#FF0000;"></div>
        <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate">
        
       <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Full Name');?></p>
        <input id="full_name" class="form-control2" type="text" placeholder="" >
        <!--<p class="inpu_text4">House name/number and street,P.O.box,company name c/o</p>-->
     </div>
    </div>
    
	<div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Email');?></p>
        <input id="email_guest" class="form-control2" type="text" placeholder="" >
        <!--<p class="inpu_text4">House name/number and street,P.O.box,company name c/o</p>-->
     </div>
    </div>
	
    
    <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Address Line 1');?></p>
        
        <input id="adress_line_1" class="form-control2" type="text" placeholder="" >
       <p class="inpu_text4"><?php echo $this->lang->line('Apartment, suite, unit, building, floor,etc');?></p>
        
     </div>
    </div>
    
    <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Address Line 2');?></p>
        <input id="adress_line_2" class="form-control2" type="text" placeholder="" >
     </div>
    </div>
        
      <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Phone Number');?></p>
        <input id="phone_number" class="form-control2" type="text" placeholder="" >
     </div>
    </div>


   <div class="form-group has-feedback">
    <div class="col-lg-12 ">
     <p class="inpu_text2"><?php echo $this->lang->line('Town/City');?></p>
     <input id="city" class="form-control2" type="text" placeholder="" >
   </div>
  </div>
  
  <div class="form-group has-feedback">
    <div class="col-lg-12 ">
     <p class="inpu_text2"><?php echo $this->lang->line('Postcode');?></p>
     <input id="postcode" class="form-control2" type="text" placeholder="" >
   </div>
  </div>
  
  
  
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" valign="top" height="55">
    
    <div class="form-group has-feedback">
     <div class="col-lg-12">
      <div class="checkbox checkbox-primary">
                        <input id="13" class="styled" type="checkbox" >
                        <label for="13">
                        </label>
                        
                    </div>
                    </div>
           </div></td>
     <td width="90%" valign="top"  height="55"><p style="margin-top:4px;"><?php echo $this->lang->line('Yes, I agree to the');?> <strong>PortuGo Takeaway </strong> <a href="<?php echo base_url('page/term_condition'); ?>"><?php echo $this->lang->line('Terms of     Service');?></a> <?php echo $this->lang->line('and');?> <a href="<?php echo base_url('page/privacy_policy'); ?>"><?php echo $this->lang->line('Privacy Policy');?></a>.</p></td>
    </tr>
  </table>

         <div class="form-group has-feedback">
          <div class="col-lg-12">
          <button class="btn_loginmain guest_sign_btn22" type="button" id="guest_signup"><?php echo $this->lang->line('Confirm');?></button>
          </div>
          </div>
         
        </form>
       </div>   

      </div>
      
      
    </div>
  </div>
</div>

<div class="modal fade" id="myModal_login" tabindex="-1" role="dialog" >
  <div class="modal-dialog2" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url();?>public/front/images/close.png">
</button>
       <h3 style="margin:0px;"><center><?php echo $this->lang->line('User');?></center></h3>
      </div>
      
      <div class="modal-body" style="overflow:hidden">
       
       <div class="col-md-12 guest_login" >
        <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate">
        <div class="col-xs-12 padding_main"><center><a href="javascript:void(0);" class="facebook_login"><img src="<?php echo base_url();?>public/front/images/facebook_login2.png"  style=" margin:20px 0px 0px 0px;" /></a></center></div>
        <div class="col-xs-12 padding_main"><center><a href="<?php echo base_url('twtest'); ?>"><img src="<?php echo base_url();?>public/front/images/twitter_login2.png"  style=" margin:20px 0px 20px 0px;" /></a></center></div>
        <div class="clearfix"></div>
         <div class="error" id="login_error" style="display:none;"></div>
      <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Email');?></p>
        <input id="email_customer" class="form-control2" type="text" placeholder="" >
     </div>
    </div>


   <div class="form-group has-feedback">
    <div class="col-lg-12 ">
     <p class="inpu_text2"><?php echo $this->lang->line('Password');?></p>
     <input id="password" class="form-control2" type="text" placeholder="" >
   </div>
  </div>
                <div class="form-group has-feedback">
                 <div class="col-lg-12">
                  <div class="checkbox checkbox-primary">
                        <input id="1" class="styled" type="checkbox" >
                        <label for="1">
                            &nbsp;&nbsp;<?php echo $this->lang->line('Remember me');?>
                        </label>
                    </div>
                 </div>
                 </div>

         <div class="form-group has-feedback">
          <div class="col-lg-12">
          <button class="btn_loginmain" type="button" id="login_btn"><?php echo $this->lang->line('Login');?></button>
          </div>
          </div>
          
          <div class="form-group has-feedback">
          <div class="col-lg-12 padding_main">
          <div class="col-xs-6">
         <a href="#"><?php echo $this->lang->line('Forgot password');?>?</a>
             </div>
          <div class="col-xs-6" style="text-align:right" >
        <!-- <a href="#" class="guest_login_btn">Create account</a>-->
             </div>
          </div>
          </div>
          
        </form>
</div>
     

     <div class="col-md-12 guest_signup" style="display:none">
        <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate">
        
       <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2">First Name</p>
        <input id="firstname" class="form-control2" type="text" placeholder="" >
     </div>
    </div>
    
    <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2">Last Name</p>
        <input id="firstname" class="form-control2" type="text" placeholder="" >
     </div>
    </div>
    
    <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2">Email</p>
        <input id="firstname" class="form-control2" type="text" placeholder="" >
     </div>
    </div>
        
      <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2">Confirm Password</p>
        <input id="firstname" class="form-control2" type="text" placeholder="" >
     </div>
    </div>


   <div class="form-group has-feedback">
    <div class="col-lg-12 ">
     <p class="inpu_text2">Password</p>
     <input id="firstname" class="form-control2" type="text" placeholder="" >
   </div>
  </div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" valign="top" height="55">
    
    <div class="form-group has-feedback">

     <div class="col-lg-12">
      <div class="checkbox checkbox-primary">
                        <input id="13" class="styled" type="checkbox" >
                        <label for="13">
                        </label>
                        
                    </div>
                    </div>
           </div></td>
     <td width="90%" valign="top"  height="55"><p style="margin-top:4px;">Yes, I agree to the <strong>PortuGo Takeaway </strong> <a href="<?php echo base_url('page/term_condition'); ?>">Terms of     Service</a> and <a href="<?php echo base_url('page/privacy_policy'); ?>">Privacy Policy</a>.</p></td>
    </tr>
  </table>

         <div class="form-group has-feedback">
          <div class="col-lg-12">
          <button class="btn_loginmain guest_sign_btn" type="submit">Sign Up</button>
          </div>
          </div>
         
        </form>
       </div>   

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

$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>


<script>

$('.btn-number1').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number1').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number1').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number1[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number1[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number1").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>


<script>
$(document).ready(function(){

	 $(document).on('click',".guest_sign_btn",function(){
	$(".guest_login").show();
	$(".guest_signup").hide();
  });
   $(document).on('click',".guest_login_btn",function(){
   $(".guest_login").hide();
	$(".guest_signup").show();
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

<?php

 //submete formulario para  saida e pagamento 

?>

<form name="" id="check_out_from" action="<?php echo base_url('order/checkout_detail'); ?>" method="get">
<!--<input type="hidden" name="menu_id" id="menu_id" value="<?php echo @$_GET['menu_id']; ?>">
<input type="hidden" name="addons" id="addons" value="<?php echo @$_GET['addons']; ?>">
<input type="hidden" name="cuisine_id" id="cuisine_id" value="<?php echo @$_GET['cuisine_id']; ?>">
<input type="hidden" name="rest_id" id="rest_id" value="<?php echo @$_GET['rest_id']; ?>">-->
<input type="hidden" name="user_type" id="user_type">
<input type="hidden" name="rest_id" id="rest_id" value="<?php echo $restaurent['id']; ?>">

<script>
$(document).ready(function(){
$(".user_type").click(function(){
var user_type=$(this).attr('id');

$("#user_type").val(user_type);

})
});
</script>
<script>
$(document).ready(function(){
$(".logged_in").click(function(){
var user_type=$(this).attr('id');

$("#user_type").val(user_type);
$("#check_out_from").submit();
})
});
</script>
<script>
$(document).ready(function(){
$("#login_btn").click(function(){
var email=$("#email_customer").val();
var password=$("#password").val();
var remember=0;
$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('order/login'); ?>', 
    data: {email:email,password:password,remember:remember}, 
    success: function (data) {
     //alert(data);
	if(data==1)
	{
	$("#check_out_from").submit();
	}
	
	else{
	$("#login_error").show();
	$("#login_error").html(data);
	}
	
	}
    });
})
});
</script>
<script>
$(document).ready(function(){
$("#guest_signup").click(function(){
var full_name=$("#full_name").val();
var email=$("#email_guest").val();
var adress_line_1=$("#adress_line_1").val();
var adress_line_2=$("#adress_line_2").val();
var phone_number=$("#phone_number").val();

var city=$("#city").val();
var postcode=$("#postcode").val();

$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('order/guest_signup'); ?>', 
    data: {full_name:full_name,adress_line_1:adress_line_1,adress_line_2:adress_line_2,phone_number:phone_number,email:email,city:city,postcode:postcode}, 
    success: function (data) {
     //alert(data);
	if(data==1)
	{
	$("#check_out_from").submit();
	}
  
	
	else{
	$("#signup_error").show();
	$("#signup_error").html(data);
	}
	
	}
    });
})
});
</script>


<script>
$(document).ready(function(){
$(".quantity").change(function(){

var  res=$(this).attr('id');
var cart_id=res.replace('quantity','');
var quantity=$("#quantity"+cart_id).val();
$("#order_detail").html('<center><img src="<?php  echo base_url('public/front/images/ajax-loader.gif'); ?>" style="margin-top:10px;"></center>');
$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('order/update_quantity'); ?>', 
    data: {quantity:quantity,cart_id:cart_id}, 
    success: function (data) {
//	alert(data);
	window.location.reload();
	}
    });
	
	
});

});
</script>

<script>
$(document).ready(function(){

$(".delete_cart").click(function(){
var res=$(this).attr('id');
var cart_id=res.replace('delete_cart','');
var rest_id=$("#rest_id").val();
$("#order_detail").html('<center><img src="<?php  echo base_url('public/front/images/ajax-loader.gif'); ?>" style="margin-top:10px;"></center>');
	$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant_details/del_cart_item'); ?>', 
    data: {cart_id:cart_id,rest_id:rest_id}, 
    success: function (data) {
     //alert(data);
	window.location.reload();
	
	
	
	
	}
    });

		
});
});
</script>
