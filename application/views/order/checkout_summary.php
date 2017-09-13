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
<title>PortuGo</title>
</head>
<body>
  <?php $this->load->view('segment/header'); ?> 
 	 
  
  <div class=" inner_wrapper wrap_margin" >
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12 padding_main">
       <a href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('Home');?></a>&nbsp;  / &nbsp;    <?php echo $this->lang->line('Checkout');?>

      </div>
      </div>
   </div>
  <div class="container">

    <div class="row">
     <div class="col-md-12 padding_main">
     
     <div class="col-md-3 mobile" style="position:relative">
     <div class="restaurant_top_right" style="margin-top:30px;">
     <div class="col-md-12 padding_main">
      <div class="restaurant_col_right" style=" padding: 9px 0 21px;">
       <h1><?php echo $this->lang->line('My Order');?></h1>
      </div>
       </div>
       
       
        <div class="col-md-12">
        
        
        
         <div class="restaurant_total">
		<?php
$total_amount=0;
$delivery_charge=0;
if(isset($restaurent['delivery_charges']) && $restaurent['delivery_charges']!=''){$delivery_charge=$restaurent['delivery_charges'];}


		 if(!empty($cart))
		 {
		 foreach($cart as $allcart)
		 {
		 $menu=$this->search_model->get_menu_detail($allcart['menu_id']);
		 $total_amount=$total_amount+$menu['item_cost']*$allcart['quantity'];
		 ?>
    
          <h4><font style=" margin:3px 0px 0px 0px"><?php echo $allcart['quantity']; ?>x</font> <?php echo ucfirst($menu['item_name']); ?> <span><?php echo $dollar; ?><?php echo number_format($menu['item_cost']*$allcart['quantity'],2); ?> </span><font style="font-size:10px; position:absolute; margin:0px 0px 0px 5px; right:0;"><a href="javascript:void(0);" class="delete_cart" id="delete_cart<?php echo $allcart['id']; ?>">X</a></font></h4>
           
           <?php
		   if($allcart['addons']!='')
	  {
	   $addon_id= explode(',',$allcart['addons']);
	  $addons=$this->search_model->get_addonsby_id($addon_id);
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total_amount=$total_amount+$alladons['price'];
	  ?>
           
		    <h4><font style=" margin:3px 0px 0px 0px">&nbsp;</font> <?php echo ucfirst($alladons['extra_item']); ?> <span><?php echo $dollar; ?><?php echo number_format($alladons['price'],2); ?> </span><font style="font-size:10px; position:absolute; margin:0px 0px 0px 5px; right:0;"></font></h4>
		   
		   
		   <?php } } } ?>

           <?php } ?>
           
           <br />
		   <?php

   $type=$cart[0]['type'];


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



		   $final_amount=$total_amount+$delivery_charge;


		   ?>


           <h4><?php echo $this->lang->line('Subtotal');?> <span><?php echo $dollar; ?><?php echo number_format($total_amount,2); ?></span></h4>
         
           <h4><?php echo $this->lang->line('Delivery Charges');?><span><?php echo $dollar; ?><?php echo number_format($delivery_charge,2); ?></span></h4>
           <hr />
           <h6><?php echo $this->lang->line('Total');?> <span><?php echo $dollar; ?><?php echo number_format($final_amount,2); ?> </span></h6>


		    <?php } ?>
         </div>
         
         
         
         
        </div>
        </div>
       </div>
     
     
     <div class="col-md-9 padding_right">
     <div class="account_head3" >
     <h1><?php echo $this->lang->line('My Contact Details');?></h1>
	 
	 
     <hr />
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <?php
//DADOS USUARIOS

	  $address_id='';
	 if(@$_GET['user_type']=='user')
	 {
	  @$session_data = $this->session->userdata('user_logged_in');
	  
	   $user_id=@$session_data['user_id'];
	   $user=$this->myaccount_model->myaccount(@$session_data['user_id']);
	   $user_address=$this->myaccount_model->get_user_address(@$session_data['user_id']);
	   $address_id=@$user_address['id'];
	 ?>
	 
  <tr>
    <td width="15%"><h4 style="color:#333"><?php echo $this->lang->line('Full Name');?></h4></td>
    <td width="85%"><h4><span><?php echo ucwords($user['first_name'].'&nbsp;'.$user['last_name']); ?></span> </h4></td>
  </tr>
  
  <tr>
    <td width="15%"><h4 style="color:#333"><?php echo $this->lang->line('Email');?></h4></td>
    <td width="85%"><h4><span><?php echo $user['email']; ?></span> </h4></td>
  </tr>
  <tr>
    <td width="15%"><h4 style="color:#333"><?php echo $this->lang->line('Address');?> </h4></td>
    <td width="85%"><h4><span><?php if(!empty($user_address)){echo ucfirst($user_address['address_tittle']); ?>, <?php echo ucfirst($user_address['apartment']); ?> ,<?php echo ucfirst($user_address['address']); ?> ,<?php echo ucfirst($user_address['city']); ?>,<?php echo ucfirst($user_address['state']); ?>-<?php echo $user_address['zip_code']; }?></span> </h4></td>
  </tr>
  <tr>
    <td width="15%"><h4 style="color:#333"><?php echo $this->lang->line('Phone Number');?> </h4></td>
    <td width="85%"><h4><span><?php echo $user['phone']; ?></span> </h4></td>
  </tr>
  
 <?php } ?>
  
  	  <?php
//USA DADOS PARA CONVIDADOS

	 if(@$_GET['user_type']=='guest')
	 {
	 
	 $user_id = $this->session->userdata('last_quest_id');
	   $guest=$this->order_model->get_guest_detail($user_id);
	  
	 ?>
	 
	  <tr>
    <td width="15%"><h4 style="color:#333"><?php echo $this->lang->line('Full Name');?></h4></td>
    <td width="85%"><h4><span style="font-size:16px"><?php echo ucwords($guest['full_name']); ?></span> </h4></td>
  </tr>
  
  <tr>
    <td width="15%"><h4 style="color:#333"><?php echo $this->lang->line('Email');?></h4></td>
    <td width="85%"><h4><span style="font-size:16px"><?php echo $guest['email']; ?></span> </h4></td>
  </tr>
  <tr>
    <td width="15%"><h4 style="color:#333"><?php echo $this->lang->line('Address');?> </h4></td>
    <td width="85%"><h4><span style="font-size:16px"><?php echo $guest['address_line_1']; ?><?php if($guest['address_line_2']!=''){echo ','.$guest['address_line_2'];} ?>,<?php echo ucfirst($guest['city']); ?>-<?php echo $guest['postcode']; ?></span> </h4></td>
  </tr>
  <tr>
    <td width="15%"><h4 style="color:#333"><?php echo $this->lang->line('Phone Number');?> </h4></td>
    <td width="85%"><h4><span style="font-size:16px"><?php echo $guest['phone_number']; ?></span> </h4></td>
  </tr>
	 
	 
  
  <?php } ?>
  
  
</table>

<textarea cols="8" class="form-control2" style="height:80px; width:100%;" placeholder="<?php echo $this->lang->line('Additional note');?>" id="comment"></textarea>
<br />
<br />


<h1><?php echo $this->lang->line('Choose how to pay');?> </h1>
     <hr />

     <div class="col-md-6 padding_main">

<?php

$payment_info=array();

if(isset($payment_type['payment_type']) && $payment_type['payment_type']!='')
{
$payment_info=explode(',', $payment_type['payment_type']);
}



?>






<?php
//PAGTO CARTAO CREDITO

if(!empty($payment_info) && in_array('AllCards',$payment_info))
{?>

<div class="col-md-12 " style="background:#ffffff; margin-bottom:10px;">
<div class="radio " style="margin-bottom:6px; ">
<input id="radio122" name="radio1" value="option1" checked="" type="radio"  class="alo">
<label for="radio122" style="font-size:16px; font-weight:600">&nbsp;<?php //echo $this->lang->line('Pay Online');?> 
<img src="<?php echo base_url();?>public/front/images/master_w.png" width="39" height="22" style=" margin:0 0px 0 0px;"  />
<img src="<?php echo base_url();?>public/front/images/visa_w.png" width="58" height="14" style=" margin:0 0px 0 0;"  />
<img src="<?php echo base_url();?>public/front/images/mastro_w.png" width="35" height="19" style=" margin:0 0px 0 0;;"  />
 </label>
</div>

<div class="col-md-12 san muz" style="margin-top:30px; display:none" >
<form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" >
<div class="form-group has-feedback">
  <div class="col-lg-3"><h5 style="margin-top:10px;"><?php echo $this->lang->line('Credit Card Number');?></h5></div>
  <div class="col-lg-6">
<input id="card_number" name="card_number" class="form-control2" type="text" placeholder="xxxxxxxxxxxxxxxx" maxlength="16" onkeypress="return isNumberKey3(event)" value="">
<span id="card_number_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Please enter credit card number');?>.</span>
 <span id="card_number_length_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('card number must contain 16 digit');?>.</span>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-3"><h5 style="margin-top:10px;"><?php echo $this->lang->line('CVV');?></h5></div>
  <div class="col-lg-6">
<input id="cvv" name="cvv" class="form-control2" type="text" placeholder="<?php echo $this->lang->line('xxx');?>" maxlength="3"  onkeypress="return isNumberKey3(event)" value="">
<span id="cvv_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Please enter cvv');?>.</span>
 <span id="cvv_length_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Cvv must contain 3 digit');?>.</span>
</div>
</div>


<div class="form-group has-feedback">
  <div class="col-lg-3"><h5 style="margin-top:10px;"><?php echo $this->lang->line('Expiration');?><br />(<?php echo $this->lang->line('MM/YYYY');?>)</h5></div>
  <div class="col-lg-3">
<select name="month" id="month" class="form-control2">
<option value="">MM</option>
<option value="01">Jan</option>
<option value="02">Feb</option>
<option value="03">Mar</option>
<option value="04">Apr</option>
<option value="05">May</option>
<option value="06">Jun</option>
<option value="07">Jul</option>
<option value="08">Aug</option>
<option value="09">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>
<span id="expiry_date_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Please select expiry date');?>.</span>
</div>
 <div class="col-lg-3">
<select name="year" id="year" class="form-control2">
<option value=""><?php echo $this->lang->line('YYYY');?></option>
<?php
for($i=date('Y');$i<date('Y')+10;$i++)
{?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php } ?>
</select>
</div>
</div>

</form>
</div>
</div>

<?php } ?>






<?php
//PAGTO STRIPE  seleciona class alo2
if(!empty($payment_info) && in_array('All Cards',$payment_info))
{?>

<div class="col-md-12 " style="background:#ffffff; margin-bottom:10px;">
<div class="radio" style="margin-bottom:6px; ">
<input id="radio124" name="radio1" value="option1" checked="" type="radio" class="alo1">
<label for="radio124" style="font-size:12px; font-weight:600">&nbsp; 
<img src="<?php echo base_url();?>public/front/images/master_w.png" width="39" height="22" style=" margin:0 0px 0 0px;"  />
<img src="<?php echo base_url();?>public/front/images/visa_w.png" width="58" height="14" style=" margin:0 0px 0 0;"  />
<img src="<?php echo base_url();?>public/front/images/mastro_w.png" width="35" height="19" style=" margin:0 0px 0 0;;"  />

 <?php  //echo "Credito/Debito"; //echo $this->lang->line('Paypal');?> </label>
<br>

<!-- <span><?php echo $this->lang->line('paypal_comment');?> </span> -->

</div>

</div>

<?php } ?>



<?php
//PAGTO PAYPAL
if(!empty($payment_info) && in_array('Pay Pal',$payment_info))
{?>

<div class="col-md-12 " style="background:#ffffff; margin-bottom:10px;">
<div class="radio" style="margin-bottom:6px; ">
<input id="radio123" name="radio1" value="option1" checked="" type="radio" class="alo2">
<label for="radio123" style="font-size:12px; font-weight:600">&nbsp;<?php //echo $this->lang->line('Paypal');?> <img src="<?php echo base_url();?>public/front/images/paypal_w.png" width="62" height="24" />  <?php // echo "Conta email"; //echo $this->lang->line('Paypal');?>


 </label>
<br>

<!-- <span><?php echo $this->lang->line('paypal_comment');?> </span> -->

</div>

</div>

<?php } ?>






<?php
//PAGTO USUARIO


if(!empty($payment_info) && in_array('Cash On Delivery',$payment_info))
{?>
<div class="col-md-12 " style="background:#ffffff; margin-bottom:10px;">
<div class="radio" style="margin-bottom:6px; ">
<input id="radio126" name="radio1" value="option1" checked="" type="radio" class="alo3" >
<label for="radio126" style="font-size:12px; font-weight:600">&nbsp;&nbsp;<?php echo $this->lang->line('Cash on Delivery');?> <!--<img src="<?php echo base_url();?>public/front/images/cash.png" width="" height="" style=" margin-left:12px;"  />--> </label>
</div>
</div>

<?php } ?>

<button class="btn_contine pull-left" type="button" id="place_order"><?php echo $this->lang->line('Place order now');?></button>

</div>
</div>

<div class="clearfix"></div>
</div>

     <div class="col-md-3 pc" style="position:relative">
     <div class="restaurant_top_right" style="margin-top:99px;">
     <div class="col-md-12 padding_main">


      <div class="restaurant_col_right" style=" padding: 9px 0 21px;">


       <h1><?php echo $this->lang->line('My Order');?></h1>


      </div>


       </div>


        <div class="col-md-12">
        
        
        
         <div class="restaurant_total">
		<?php

$total_amount=0;

$delivery_charge=0;

if(isset($restaurent['delivery_charges']) && $restaurent['delivery_charges']!=''){$delivery_charge=$restaurent['delivery_charges'];}


		 if(!empty($cart))
		 {
		 foreach($cart as $allcart)
		 {

		 $menu=$this->search_model->get_menu_detail($allcart['menu_id']);
		 $total_amount=$total_amount+$menu['item_cost']*$allcart['quantity'];

		 ?>
    
          <h4><font style=" margin:3px 0px 0px 0px"><?php echo $allcart['quantity']; ?>x</font> <?php echo ucfirst($menu['item_name']); ?> <span><?php echo $dollar; ?><?php echo number_format($menu['item_cost']*$allcart['quantity'],2); ?> </span><font style="font-size:10px; position:absolute; margin:0px 0px 0px 5px; right:0;"><a href="javascript:void(0);" class="delete_cart" id="delete_cart<?php echo $allcart['id']; ?>">X</a></font></h4>
           
           <?php
		   if($allcart['addons']!='')
	  {
	   $addon_id= explode(',',$allcart['addons']);
	  $addons=$this->search_model->get_addonsby_id($addon_id);
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total_amount=$total_amount+$alladons['price'];
	  ?>
 <h4><font style=" margin:3px 0px 0px 0px">&nbsp;</font> <?php echo ucfirst($alladons['extra_item']); ?> <span><?php echo $dollar; ?><?php echo number_format($alladons['price'],2); ?> </span><font style="font-size:10px; position:absolute; margin:0px 0px 0px 5px; right:0;"></font></h4>

		   <?php } } } ?>
           <?php } ?>


           <br />
		   <?php

 $type=$cart[0]['type'];

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



                   $final_amount=$total_amount+$delivery_charge;


		   ?>
           <h4><?php echo $this->lang->line('Subtotal');?> <span><?php echo $dollar; ?><?php echo number_format($total_amount,2); ?></span></h4>

           <h4><?php echo $this->lang->line('Delivery Charges');?><span><?php echo $dollar; ?><?php echo number_format($delivery_charge,2); ?></span></h4>
           <hr />
           <h6><?php echo $this->lang->line('Total');?> <span><?php echo $dollar; ?><?php echo number_format($final_amount,2); ?> </span></h6>
		    <?php } ?>
         </div>
         
         
         
         
        </div>
        </div>
       </div>
     </div>
     </div>
    </div>
    

  <?php $this->load->view('segment/footer'); ?>  
 
 
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

<script>

//CHECA SELECAO DE METODO DE PAGTO E ARAMAZENA VARIAVEL payment_method


$(document).ready(function(){
$(".alo").click(function(){
    $(".muz").hide();
	 $(".san").show();
	  $("#payment_method").val('Credit Card');
});



$(".alo1").click(function(){
	$(".muz").hide();
     $("#payment_method").val('Stripe');
	
});


$(".alo2").click(function(){
  $(".muz").hide();
   $("#payment_method").val('Paypal');
});



$(".alo3").click(function(){
	$(".muz").hide();
	 $("#payment_method").val('Cash on Delivery');
});


$(".alo4").click(function(){
	$(".muz").hide();
	 $("#payment_method").val('MB');
    
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

</script>

<script src="<?php echo base_url();?>public/front/js/ImageDropDown.js"></script>

<style>

#mycomp_child{height:90px!important;}

#mycomp1_child{ margin-left: -6px;
    margin-top: 25px;}

</style>

<?php //RECEBE DADOS AO CARREGAR FORM E ENVIA FORM  COM DADOS PARA DB em funcao da escolha do pgto-  CHAMA FUNCAO ORDER/INSERT_ORDER PARA ARMAZENAR DADOS DE PAGTO no DB ?>

<form name="" id="order_form" action="<?php echo base_url('order/insert_order'); ?>" method="get">

<input type="hidden" name="user_type" id="user_type" value="<?php echo @$_GET['user_type']; ?>">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" name="address_id" id="address_id" value="<?php echo $address_id; ?>">
<input type="hidden" name="payment_method" id="payment_method" value="">
<input type="hidden" name="service_tax" id="service_tax" value="<?php echo @$service_tax_amount; ?>">
<input type="hidden" name="vat_tax" id="vat_tax" value="<?php echo @$vat_tax_amount; ?>">


<input type="hidden" name="card_number_order" id="card_number_order" value="" >
<input type="hidden" name="cvv_order" id="cvv_order" value="">
<input type="hidden" name="month_order" id="month_ordesr" value="">
<input type="hidden" name="year_order" id="year_order" value="">


<input type="text" name="add_coment"  value="" id="add_coment">

<input type="hidden" name="subtotal" id="subtotal" value="<?php echo $total_amount; ?>">


</form>


<script>


//armazena dados do  cartao de credito
$(document).ready(function(){
$("#card_number").keyup(function(){
var  card_number=$("#card_number").val();
$("#card_number_order").val(card_number);
});

$("#cvv").keyup(function(){
var  cvv=$("#cvv").val();
$("#cvv_order").val(cvv);
});

$("#month").change(function(){
var  month=$("#month").val();
$("#month_order").val(month);
});
$("#year").change(function(){
var  year=$("#year").val();
$("#year_order").val(year);
});

$("#comment").keyup(function(){
	  
var res=$("#comment").val();
$("#add_coment").val(res);
});


});
</script>



<script>
//TESTA SELECAO  DO METODO DE PAGTO AO ENVIAR FORMULARIO PARA ESCOLHER O METODO
//armazena na variavel payment_method oa forma de pagto escolhida

$(document).ready(function(){

$("#place_order").click(function(){

var  user_type=$("#user_type").val();

var  address_id=$("#address_id").val();

var payment_method= $("#payment_method").val();


//default cash
if(payment_method =='')
{
var payment_method= "Cash On Delivery";
$(".alo3").trigger('click');
};


//alert(user_type);
//alert(address_id);
//alert(payment_method);

if(payment_method=='Credit Card')
{
var card_number=$("#card_number").val();

if(card_number=='')
{
$("#card_number_error").show();
$("#card_number").focus();
return false;
}
else if(card_number.length!=16)
{
$("#card_number_error").hide();
$("#card_number_length_error").show();
$("#card_number").focus();
return false;
}
else
{
$("#card_number_error").hide();
$("#card_number_length_error").hide();
}

var cvv=$("#cvv").val();

if(cvv=='')
{
$("#cvv_error").show();
$("#cvv").focus();
return false;
}
else if(cvv.length!=3)
{
$("#cvv_error").hide();
$("#cvv_length_error").show();
$("#cvv").focus();
return false;
}
else
{
$("#cvv_error").hide();
$("#cvv_length_error").hide();
}
var month=$("#month").val();
var year=$("#year").val();

if(month=='' || year=='')
{
$("#expiry_date_error").show();
return false;
}
else
{
$("#expiry_date_error").hide();
}

}


if(user_type=='user' && address_id==''   )
{
$(".add_address").trigger('click');
}
else
{


if(payment_method !='')
{

//submet form para  controller  order para fazer pagto    cham funcao   insert_order em  controller order
$("#order_form").submit();
}
else
{
  alert("Lamentamos o incoveniente mas no momento estamos com um problema no sistema de pagamento.")  
}

}

})
});
</script>

<a href="javascript:void(0);" data-target="#myModal_address" data-toggle="modal" class="add_address" style="display:none;" >add_address</a>
<div class="modal fade" id="myModal_address" tabindex="-1" role="dialog" >
  <div class="modal-dialog2" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url();?>public/front/images/close.png">
</button>
        <h3 style="margin:0px;"><center><?php echo $this->lang->line('Add New Address');?></center></h3>
      </div>


      
      <div class="modal-body" style="overflow:hidden">
       
       
     

     <div class="col-md-12 guest_signup">
	  <div class="error" id="signup_error" style="display:none; color:#FF0000;"></div>
        <form action="#" method="post" class="form-horizontal bv-form" >
<div class="form-group has-feedback" style="display:none">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"><p class="inpu_text3"><?php echo $this->lang->line('Full Name');?>:</p></div>
 <div class="col-lg-9 padding_three">
 
 <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="fname_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your full name');?></p>
 
  <input id="address_tittle" name="address_tittle" value=""class="form-control2" type="text" placeholder="" >
  <p class="inpu_text4"><?php echo $this->lang->line('House name/number and street,P.O.box,company name c/o');?></p>
  
  </div>
</div>
</div>
<div style="margin-top:10px;">&nbsp;</div>

  <div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3"><?php echo $this->lang->line('Address Line');?> 1:<br /><span>(<?php echo $this->lang->line('or');?>&nbsp;<?php echo $this->lang->line('company');?>&nbsp;<?php echo $this->lang->line('name');?>)</span></p></div>
 <div class="col-lg-9 padding_three">
 
 <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="address1_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your address');?></p>
  
 <input id="apartment" name="apartment" value="" class="form-control2" type="text" placeholder="" >
 <p class="inpu_text4"><?php echo $this->lang->line('Apartment, suite, unit, building, floor,etc');?></p>
 
 </div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3"><?php echo $this->lang->line('Address Line 2');?>:<br /><span>(<?php echo $this->lang->line('Optional');?>)</span></p></div>
 <div class="col-lg-9 padding_three"> 
 <input id="address" name="address" value="" class="form-control2" type="text" placeholder="" >
 </div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3"><?php echo $this->lang->line('Town/City');?>:</p></div>
 <div class="col-lg-9 padding_three">
 
  <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="city_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your city');?></p>
  
 <input id="city" name="city" value="" class="form-control2" type="text" placeholder="" >
 
 </div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3"><?php echo $this->lang->line('Postcode');?>:</p></div>
 <div class="col-lg-9 padding_three">
 
 <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="postcode_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your postcode');?></p>
  
 <input id="zip_code" name="zip_code" value="" class="form-control2" data-masked-input="9999-999" maxlength="8" type="text" placeholder="" >
 
 </div>
</div>
</div>

 
<div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3">&nbsp;</p></div>
 <div class="col-lg-9 padding_three"> 
 <button class="btn_loginmain " type="button" name="submit" value="submit" style="width:170px;" id="add_address" ><?php echo $this->lang->line('Add Address');?></button>
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

	$(document).on('click',"#add_address",function(){
		

var address= $("#apartment").val();
var addressline_2= $("#address").val();
var city = $("#city").val();
var postcode = $("#zip_code").val();


if(address==''){
$('#address1_error').show();
$('#apartment').focus();
return false;
}else{
$('#address1_error').hide();
}

if(city==''){
$('#city_error').show();
$('#city').focus();
return false;
}else{
$('#city_error').hide();
}

if(postcode==''){
$('#postcode_error').show();
$('#zip_code').focus();
return false;
}else{
$('#postcode_error').hide();
}

if(address!='' && city!='' && postcode!='' )
{
$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('order/add_address'); ?>', 
    data: {address:address,addressline_2:addressline_2,city:city,postcode:postcode}, 
    success: function (data) {
	
	$("#address_id").val(data);
	$("#order_form").submit();
	}
    });

}

  });

});
</script>

<script type="text/javascript">
     
     
          function isNumberKey3(evt)
          {
             var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 10 && (charCode < 48 || charCode > 57)) {
               // $("#registration_no_error").show();
                 return false;
             }
     
             return true;
          }
     
       </script>
	   
	   
	
