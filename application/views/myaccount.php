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

	   
	   <?php $this->load->view('segment/header');?> 
	  
  <div class=" inner_wrapper wrap_margin">
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12 padding_main">
       <a href="#"><?php echo $this->lang->line('Home');?></a>&nbsp;  / &nbsp; <?php echo $this->lang->line('Account Information');?> 
      </div>
      </div>
   </div>
  <div class="container">
    <div class="row">
    
     <?php $this->load->view('segment/user_sidebar');?>

     
     
     <div class="col-md-09 padding_main">
     <div style="display:none" class="top_acc col-md-12">
     <div class="col-md-6">
     <div class="account_head">     
    <h1><?php echo $this->lang->line('Account Information');?></h1>
    </div>
  <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form">
  
  <div class="user_detail">
  
  <div class="form-group has-feedback">
  <div class="col-lg-12 padding_main">
  <div class="col-lg-12">
   <p class="inpu_text"><?php echo $this->lang->line('First Name');?> *</p>
   
   <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="fname_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your first name');?></p>
   
<input id="firstname" name="firstname" value="" class="form-control" type="text" placeholder="" >
</div>
</div>
</div>

       <div class="form-group has-feedback">
  <div class="col-lg-12 padding_main">
  <div class="col-lg-12">
   <p class="inpu_text"><?php echo $this->lang->line('Last Name');?> *</p>
   
   <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="lname_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your last name');?></p>
   
<input id="lastname" name="lastname" value="" class="form-control" type="text" placeholder="" >
</div>
</div>
</div>

 <div class="form-group has-feedback">
  <div class="col-lg-12 padding_main">
  <div class="col-lg-12">
   <p class="inpu_text"><?php echo $this->lang->line('Email Address');?>  *</p>
   
   <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="email_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your email id');?></p>
   <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="valid_email_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type valid email id');?></p>
   
<input id="email" name="email" value="" class="form-control" type="text" placeholder="" >
</div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-12 padding_main">
  <div class="col-lg-12">
   <p class="inpu_text"><?php echo $this->lang->line('Phone Number');?>  *</p>
   
   <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="phone_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your phone number');?></p>
   
<input id="phone" name="phone" value="" class="form-control" type="text" placeholder="" >
</div>
</div>
</div>

</div>

<button class="btn_login edit2" type="button" style="margin:10px 0px 0px 0px;"><?php echo $this->lang->line('Save');?></button>

    </form>
     </div>
     
     <div class="col-md-6">
     <div class="account_head">
    <h1><?php echo $this->lang->line('Change Password');?></h1>
    </div>
    <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form">
        <input type="hidden" value="<?php echo $user['password']; ?>" id="user_pass" />   
           
      <div class="form-group has-feedback">
  <div class="col-lg-12 padding_main">
  <div class="col-lg-12">
   <p class="inpu_text"><?php echo $this->lang->line('Current Password');?>  *</p>
   
    <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="cur_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your current password');?></p>
    
    <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="user_pass_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type correct password');?></p>
    
<input id="cur_pass" name="cur_pass" value="" class="form-control" type="password" placeholder="" >
</div>
</div>
</div>

      <div class="form-group has-feedback">
  <div class="col-lg-12 padding_main">
  <div class="col-lg-12">
   <p class="inpu_text"><?php echo $this->lang->line('New Password');?>  *</p>
   
   <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="new_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please type your new password');?></p>
   
<input id="new_pass" name="new_pass" value="" class="form-control" type="password" placeholder="" >
</div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-lg-12 padding_main">
  <div class="col-lg-12">
   <p class="inpu_text"><?php echo $this->lang->line('Confirm New Password');?>  *</p>
   
   <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="con_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please confirm your password');?></p>
   
   <p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="con_pass_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Confirm password not mached');?></p>
   
<input id="con_pass" name="con_pass" value="" class="form-control" type="password" placeholder="" >
</div>
</div>
</div>
<button class="btn_login edit3" type="button" style="margin:10px 0px 0px 0px;"><?php echo $this->lang->line('Save');?></button>
<p style="float:right; margin-top:20px;">* <?php echo $this->lang->line('Required Field');?> </p>
  </form>
     </div>
     </div>
     
     
     <div class="top_acc2 col-md-12">
     <div class="col-md-6">
     <div class="account_head">
     
   
                                                                
                                                                
                                                                  	<?php 
																
												$msg1=$this->session->flashdata('password_message');				
																if(isset($msg1) && $msg1 == 'change_success'){?>
									<div class="alert alert-success">
										<button class="close" data-dismiss="alert"><span style=" color:#FFF;">x</span></button>
										<strong style="color:#FFF;"><?php echo "Changed your password successfully !!"; ?></strong>
									</div>
                                                                <?php }else{?>
                                                                <div class="alert alert-error hide">
										<button class="close" data-dismiss="alert"></button>
										<?php echo "You have some form errors. Please check below."; ?>
									</div>
                                                                <?php }?>
                                                                
                                                                
          
    <h1><?php echo $this->lang->line('Account Information');?></h1>   
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" height="70" valign="bottom"><h4><?php echo $this->lang->line('First Name');?></h4></td>
    <td width="67%" height="70" valign="bottom"><h4><span><?php echo ucwords($user['first_name']);?></span></h4></td>
  </tr>
  
  <tr>
    <td><h4><?php echo $this->lang->line('Last Name');?></h4></td>
    <td><h4><span><?php echo ucwords($user['last_name']);?></span></h4></td>
  </tr>
  
  <tr>
    <td><h4><?php echo $this->lang->line('Email&nbsp;Address');?></h4></td>
    <td><h4><span><?php echo ucwords($user['email']);?></span></h4></td>
  </tr>
  
   <tr>
    <td><h4><?php echo $this->lang->line('Phone&nbsp;Number');?></h4></td>
    <td><h4><span><?php echo $user['phone'];?></span></h4></td>
  </tr>
</table>
    </div>
     </div>
     
    
     <div class="form-group has-feedback ">
  <div class="col-lg-12 padding_main">
  <div class="col-lg-12">
<button class="btn_login edit1" type="submit" id="<?php echo $user['user_id']; ?>" style="margin:0px 0px 0px 0px;"><?php echo $this->lang->line('Edit');?></button>
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


<a href="javascript:void(0);" data-target="#update_account" data-toggle="modal" class="update_account" style="display:none">update_account</a>

<div class="modal fade" id="update_account" tabindex="-1" role="dialog" >
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
if($this->session->flashdata('message'))
{
?>
<script>
$(document).ready(function(){

$(".update_account").trigger('click');

});
</script>
<?php }
?>












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
	 $(document).on('click',".edit1",function(){
		 
		 var user_id = $(this).attr('id');
		 $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>myaccount/user_detail",
            data: { user_id:user_id},
            success: function(msg){
     					//alert(msg); return false;						
				$('.user_detail').html(msg);   						
            }
			});
		 
    $(".top_acc").show();
	$(".top_acc2").hide();
	
  });
   
    /*$(document).on('click',".edit2",function(){
    $(".top_acc").hide();
	$(".top_acc2").show();
  });
  
  $(document).on('click',".edit3",function(){
    $(".top_acc").hide();
	$(".top_acc2").show();
  });*/
  
  
});
</script>




<script>
$(document).ready(function(){	
	$(document).on('click',".edit2",function(){

var user_id = $("#user_id").val();
var fname = $("#firstname").val();
var lname = $("#lastname").val();
var email = $("#email").val();
var phone = $("#phone").val();
var emailspec= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

if(fname==''){	
$('#fname_error').show();
$("#firstname").focus();
return false;
}else{
$('#fname_error').hide();
}

if(lname==''){
$('#lname_error').show();
$("#lastname").focus();
return false;
}else{
$('#lname_error').hide();
}

if(email==''){
$('#email_error').show();
$("#email").focus();
return false;
}else{
$('#email_error').hide();
}

if(!emailspec.test(email)) {				
$('#valid_email_error').show();
$("#email").focus();
return false;
}else{
$('#valid_email_error').hide();
} 

if(phone==''){
$('#phone_error').show();
$("#phone").focus();
return false;
}else{
$('#phone_error').hide();
}
  

// Returns successful data submission message when the entered information is stored in database.
var dataString = 'fname1='+ fname + '&lname1='+ lname + '&email1='+ email + '&phone1='+ phone + '&user_id1='+ user_id;

// AJAX Code To Submit Form.

$.ajax({
type: "POST",
url: "<?php echo base_url();?>myaccount/edit_user_detail",
data: dataString,
cache: false,
success: function(result){
//alert(result);
window.location = "<?php echo base_url('myaccount/dashboard'); ?>";

}
});

  });

});
</script>




<script>
$(document).ready(function(){	
  $(document).on('click',".edit3",function(){
		
var user_id = $("#user_id").val();
var current_password = $('#cur_pass').val();
var new_password = $('#new_pass').val();
var confirm_password = $('#con_pass').val();
var user_password = $('#user_pass').val();

if(current_password==''){
$('#cur_error').show();
$("#cur_pass").focus();
return false;
}else{
$('#cur_error').hide();
}

if(current_password!=user_password){
$('#user_pass_error').show();
$("#cur_pass").focus();
return false;
}else{
$('#user_pass_error').hide();
}

if(new_password==''){
$('#new_error').show();
$("#new_pass").focus();
return false;
}else{
$('#new_error').hide();
}

if(confirm_password==''){
$('#con_error').show();
$("#con_pass").focus();
return false;
}else{
$('#con_error').hide();
}

if(confirm_password!=new_password){
$('#con_pass_error').show();
$("#con_pass").focus();
return false;
}else{
$('#con_pass_error').hide();
}

// Returns successful data submission message when the entered information is stored in database.
var dataString = 'current_password1='+ current_password + '&new_password1='+ new_password + '&confirm_password='+ confirm_password + '&user_id1='+ user_id;

// AJAX Code To Submit Form.

$.ajax({
type: "POST",
url: "<?php echo base_url();?>myaccount/change_user_password",
data: dataString,
cache: false,
success: function(result){
//alert(result);
window.location = "<?php echo base_url('myaccount/dashboard'); ?>";

}
});

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
