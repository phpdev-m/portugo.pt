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
    
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.masked-input.js"></script>
  
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

 
	   
	   <?php $this->load->view('segment/header');?>
	   
  <div class="inner_wrapper wrap_margin"  >
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12 padding_main">      
      
       <a href="#"><?php echo $this->lang->line('Home');?></a>&nbsp;  / &nbsp;      <?php echo $this->lang->line('Address Book & Manage Addresses');?>
	   
	   <?php //print_r($user_id);die;?>
      </div>
      </div>
   </div>
  <div class="container">
    <div class="row">
    
	
	 <?php $this->load->view('segment/user_sidebar');?>
	
	
     
     
     <div class="col-md-09 padding_main">
     
     
     <div class="col-md-12 padding_main top_acc2" style="display:none1">
     <div class="col-md-12">     
     <div class="account_head2">
     
	<?php 
			/*													
												$msg=$this->session->flashdata('message');				
																if(isset($msg) && $msg == 'success'){?>
									<div class="alert alert-success">
										<button class="close" data-dismiss="alert"><span style=" color:#FFF;">x</span></button>
										<strong style="color:#FFF;"><?php echo "Updated your address successfully !!"; ?></strong>
									</div>
                                                                <?php }else{?>
                                                                <div class="alert alert-error hide">
										<button class="close" data-dismiss="alert"></button>
										<?php echo "You have some form errors. Please check below."; ?>
									</div>
                                                                <?php }?>
                                                                
                                                                
                                                                
                                                                
                                                                <?php 
																
												$msg1=$this->session->flashdata('add_message');				
																if(isset($msg1) && $msg1 == 'success_add'){?>
									<div class="alert alert-success">
										<button class="close" data-dismiss="alert"><span style=" color:#FFF;">x</span></button>
										<strong style="color:#FFF;"><?php echo "Added your address successfully !!"; ?></strong>
									</div>
                                                                <?php }else{?>
                                                                <div class="alert alert-error hide">
										<button class="close" data-dismiss="alert"></button>
										<?php echo "You have some form errors. Please check below."; ?>
									</div>
                                                                <?php }
																
																
																*/
																?>
          
    <h1> <?php echo $this->lang->line('Address Book & Manage Addresses');?></h1>
    <h5><?php echo $this->lang->line('An upto date address information would make your ordering process even simpler');?>.</h5>
    </div>
    
   <div class="row">
    <div class="col-md-12 padding_main">
    <div class="col-md-5">
	
	<?php foreach($address as $address_book){?>
	
      <div class="address_col delete_col">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="65%" align="left" valign="top"><h5><!--<?php echo ucfirst($address_book['address_tittle']);?> <br />-->
<?php echo $address_book['apartment'];?><br />
<?php echo $address_book['address'];?><br />
<?php echo $address_book['city'];?><br />
<?php echo $address_book['zip_code'];?></h5></td>
    <td width="35%" align="right" valign="top">
    <button class="btn_edit edit " id="<?php echo $address_book['id']; ?>" type="submit" ><?php echo $this->lang->line('Edit');?></button><br />
    <a href="<?php echo base_url();?>myaccount/delete_address/id/<?php echo $address_book['id']; ?>" onClick="return confirm('Are You Sure you want to delete this?');"><button class=" btn_edit" type="submit" ><?php echo $this->lang->line('Delete');?></button></a>
    <div class="checkbox checkbox-primary" style="float:right">
						<input id="primary_address<?php echo $address_book['id']; ?>" class="styled primary_address" type="checkbox"  name="primary[]" value="<?php echo $address_book['id']; ?>" <?php if($address_book['status']==1){?>checked="checked"<?php } ?> >
						<label for="primary_address<?php echo $address_book['id']; ?>">
                        </label>
						<p class="inpu_text4" style="margin-top:17px;"><?php echo $this->lang->line('Primary Address');?></p>
    </div>
	</td>
  </tr>
</table>

      </div>
	<?php } ?>
      <!--<div class="address_col delete_col2">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="65%" align="left" valign="top"><h5>Pedro Gasper<br />
Viera da Silva 1<br />
Apartamento 204<br />
Lisbao<br />
1050-105</h5></td>
    <td width="35%" align="right" valign="top">
    <button class="btn_edit edit " type="submit" >Edit</button><br />
    <button class="btn_edit delete2" type="submit" >Delete</button>
    </td>
  </tr>
</table>
      </div>-->
      
      
      
      <div class="address_col delete_col2">
      <button class="btn_edit add" type="submit" style="width:140px;" ><?php echo $this->lang->line('Add New Address');?></button>
      </div>
     
    </div>
   
   
    <div class="col-md-7 edit_form" style="display:none">
    <form id="registerForm" action="<?php echo base_url('myaccount/myaddress_book'); ?>" method="post" class="form-horizontal bv-form" name="register-form" role="form" onclick="return check_blank1()">

<div class="address">

 <div class="form-group has-feedback" style="display:none">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3">Full Name:</p></div>
 <div class="col-lg-9 padding_three">
 
 <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="fname1_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i>Please type your full name</p>
 
  <input id="fname" name="fname" value="" class="form-control2" type="text" placeholder="" >
  <p class="inpu_text4">House name/number and street,P.O.box,company name c/o</p>
  </div>
</div>
</div>


  <div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3">Address Line 1:<br /><span>(or&nbsp;company&nbsp;name)</span></p></div>
 <div class="col-lg-9 padding_three">
 
 <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="address2_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i>Please type your address</p>
   
 <input id="address1" name="apartment" value="" class="form-control2" type="text" placeholder="" >
 <p class="inpu_text4">Apartment, suite, unit, building, floor,etc</p>
 </div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3">Address Line 2:<br /><span>(Optional)</span></p></div>
 <div class="col-lg-9 padding_three">
 <input id="address1" name="address" value="" class="form-control2" type="text" placeholder="" >
 </div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3">Town/City:</p></div>
 <div class="col-lg-9 padding_three">
 
 <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="city1_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i>Please type your city</p>
  
 <input id="city1" name="city" value="" class="form-control2" type="text" placeholder="" >
 </div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3">Postcode:</p></div>
 <div class="col-lg-9 padding_three">
 
 <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="postcode1_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i>Please type your postcode</p>
   
 <input id="postcode" name="postcode" value="" class="form-control2" data-masked-input="9999-999" maxlength="8" type="text" placeholder="" >
 </div>
</div>
</div>

</div>
 
<div class="form-group has-feedback">
  <div class="col-lg-12 ">
  <div class="col-lg-3 padding_three"> <p class="inpu_text3">&nbsp;</p></div>
 <div class="col-lg-9 padding_three"> 
 <button class="btn_edit confirm" type="button" style="width:140px;" ><?php echo $this->lang->line('Confirm Changes');?></button>
 
 </div>
</div>
</div>
</form>
</div>
		
	
 
	
	<div class="col-md-7 add_form" style="display:none">
    <form action="<?php echo base_url('myaccount/add_address');?>" method="post" class="form-horizontal bv-form" onsubmit="return check_blank()">
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
 <button class="btn_edit add_address" type="submit" name="submit" value="submit" style="width:140px;" ><?php echo $this->lang->line('Add Address');?></button>
 </div> 
</div>
</form>
</div>	
		
		
		
		
		
		
    </div>
    </div>
     </div>
     </div>
     
     </div>
     </div>
    </div>
    
  
 </div>
 
  <?php $this->load->view('segment/footer');?> 
 
  
 
 
</body>
</html>



<a href="javascript:void(0);" data-target="#myModal_address" data-toggle="modal" class="myModal_address" style="display:none">myModal_address</a>

<div class="modal fade" id="myModal_address" tabindex="-1" role="dialog" >
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
          
          <h4 style="text-align:center"><?php echo $this->lang->line('Message_Display');?></h4>
   
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
   <center><button class="btn_popup  " data-dismiss="modal" style="margin:5px 0px 0px 0px; width:150px;"><?php echo $this->lang->line('Ok');?></button></center>
  
  </div>
 </div>
</div>

</form>

      </div>
      
      
    </div>
  </div>
</div>

<?php
if($this->session->flashdata('add_message'))
{
?>
<script>
$(document).ready(function(){

$(".myModal_address").trigger('click');

});
</script>
<?php }
?>








<script>
$(document).ready(function(){	
	$(document).on('click',".add_address",function(){
		

var address= $("#apartment").val();
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
	 $(document).on('click',".add",function(){
    $(".top_acc").hide();
	$(".top_acc2").show();
	
  });
    $(document).on('click',".add2",function(){
    $(".top_acc").hide();
	$(".top_acc2").show();
  });
  
});
</script>

<script>
$(document).ready(function(){
$(".primary_address").click(function(){
var id=$(this).attr('id');

var  address_id=id.replace('primary_address','');

if($("#"+id).is(':checked'))
{
$(".primary_address").prop('checked',false);
$("#"+id).prop('checked',true);
var status=1;
   
	}
else
{
   var status=0;
	}

	$.ajax({
		type : "POST",
		url : "<?php echo base_url('myaccount/primary_address');?>",
		data: {address_id:address_id,status:status},
		success:function(data){
		//alert(data);
		//$("#address_row"+address_id).hide('slow');
		}
	  });  
	
});
});
</script>


<script>
$(document).ready(function(){
	$(document).on('click',".add",function(){
	$(".add_form").show();
	$(".edit_form").hide();
	
  });
	
	 $(document).on('click',".edit",function(){
		 //alert();return false;
		 var address_id=$(this).attr('id');
	
  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>myaccount/myaddress_book",
            data: { address_id:address_id},
            success: function(msg){
     					//alert(msg); return false;						
				$('.address').html(msg);   						
            }
			});
			
		 
		  
		 
	$(".edit_form").show();
	$(".add_form").hide();
	
  });
    $(document).on('click',".delete",function(){
    $(".delete_col").hide();
  });
  
   $(document).on('click',".delete2",function(){
    $(".delete_col2").hide();
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
$(document).ready(function(){	
	$(document).on('click',".confirm",function(){

var id = $("#address_id").val();

var apartment = $("#address1").val();
var address = $("#address").val();
var city = $("#city1").val();
var postcode = $("#postcode").val();


if(apartment==''){
$('#address2_error').show();
$('#address1').focus();
return false;
}else{
$('#address2_error').hide();
}

if(city==''){
$('#city1_error').show();
$('#city1').focus();
return false;
}else{
$('#city1_error').hide();
}

if(postcode==''){
$('#postcode1_error').show();
$('#postcode').focus();
return false;
}else{
$('#postcode1_error').hide();
}

// Returns successful data submission message when the entered information is stored in database.
var dataString = 'name1='+ fname + '&apartment1='+ apartment + '&address1='+ address + '&city1='+ city + '&postcode1='+ postcode + '&id1='+ id;

// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "<?php echo base_url();?>myaccount/edit_address_bood",
data: dataString,
cache: false,
success: function(result){
//alert(result);
window.location = "<?php echo base_url('myaccount/address_book'); ?>";
}
});

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


<script>
$(document).ready(function(){
$('#close').click(function(){
$('#myDiv').hide();
	});
	});
</script>

<style>
.alert-success {
    background-color: #F00;
    border-color: #d6e9c6;
    color: #3c763d;
}
</style>

<style>
#mycomp_child{height:90px!important;}

#mycomp1_child{ margin-left: -6px;
    margin-top: 25px;}

</style>
