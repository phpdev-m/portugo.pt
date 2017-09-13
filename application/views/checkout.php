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
  
   <?php $this->load->view('segment/header'); ?> 
  
  <div class=" inner_wrapper wrap_margin" >
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12 padding_main">
       <a href="#"><?php echo $this->lang->line('Home');?></a>&nbsp;  / &nbsp;      <?php echo $this->lang->line('Checkout');?>


      </div>
      </div>
   </div>
  <div class="container">
    <div class="row">
       
     
     
     <div class="col-md-12 padding_main">
     <div class="col-md-12">
     
     
     <div class="account_head3" >
     <div class="col-md-8" style="background:#fff; padding-top:15px; padding-bottom:15px;">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="8%" valign="top"><img src="<?php echo base_url();?>public/front/images/res_img1.png" width="80" height="80" /></td>
    <td width="92%" valign="top">
    <h1>Pizza - 100 + Delicacies</h1>
    <h4><?php echo $this->lang->line('Order total');?>: Rs.387.50</h4>
    </td>
  </tr>
</table>

    
    </div>
    </div>
    <div class="clearfix"></div>
    
    
    <div class="table_responsive">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td width="47%" height="40" align="left" class="td_bord2"><strong><?php echo $this->lang->line('Menu Name');?></strong></td>
    <td width="8%" height="40" align="left" class="td_bord2"><strong><?php echo $this->lang->line('Quantity');?></strong></td>
    <td width="23%" height="40" align="left" class="td_bord2"><strong><?php echo $this->lang->line('Price');?></strong></td>
    <td width="14%" height="40" align="left" class="td_bord2"><strong><?php echo $this->lang->line('Total Price');?></strong></td>
  </tr>
  
   <tr>
    <td height="60" align="left" class="td_bord2">Pizza<br />Contrary to popular belief, Lorem Ipsum is not</td>
    <td height="60" align="left" class="td_bord2"> 
     <div class="center">
    <div class="input-group">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="2"> <input type="text" name="quant[1]" class="form-control3 input-number" value="1" min="1" max="10"></td>
    <td><span class="input-group-btn">
              <button type="button" class="btn btn-number" data-type="plus" data-field="quant[1]" style="background:none;">
                  <span class="glyphicon glyphicon-plus"  style="font-size: 12px;"></span>
              </button>
          </span></td>
  </tr>
  <tr>
    <td><span class="input-group-btn">
              <button type="button" class="btn btn-number" disabled="disabled" data-type="minus" data-field="quant[1]" style="background:none;">
                  <span class="glyphicon glyphicon-minus" style="font-size: 12px;"></span>
              </button>
          </span></td>
  </tr>
</table>

      </div>
   
</div></td>
    <td height="60" align="left" class="td_bord2">$ 120.00</td>
    <td height="60" align="left" class="td_bord2">$ 160.00</td>
    
  </tr>
  
  
  <tr>
    <td height="60" align="left" class="td_bord2">Spicy Pizza<br />Contrary to popular belief, Lorem Ipsum is not</td>
    <td height="60" align="left" class="td_bord2"> 
     <div class="center">
    <div class="input-group">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="2"> <input type="text" name="quant1[1]" class="form-control3 input-number1" value="1" min="1" max="12"></td>
    <td><span class="input-group-btn">
              <button type="button" class="btn btn-number1" data-type="plus" data-field="quant1[1]" style="background:none;">
                  <span class="glyphicon glyphicon-plus"  style="font-size: 12px;"></span>
              </button>
          </span></td>
  </tr>
  <tr>
    <td><span class="input-group-btn">
              <button type="button" class="btn  btn-number1" disabled="disabled" data-type="minus" data-field="quant1[1]" style="background:none;">
                  <span class="glyphicon glyphicon-minus" style="font-size: 12px;"></span>
              </button>
          </span></td>
  </tr>
</table>

      </div>
   
</div></td>
    <td height="60" align="left" class="td_bord2">$ 120.00</td>
    <td height="60" align="left" class="td_bord2">$ 160.00</td>
    
  </tr>
  
  
   <tr>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="right" class="td_bord3"><?php echo $this->lang->line('Sub Total');?></td>
     <td height="50" align="left" class="td_bord3">$ 280.00</td>
   </tr>
   <tr>
     
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="right" class="td_bord3"><?php echo $this->lang->line('Tax');?> (5.00 %)</td>
     <td height="50" align="left" class="td_bord3">$ 24.00</td>
   </tr>
   <tr>
     
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="right" class="td_bord3"><?php echo $this->lang->line('Delivery Charges');?></td>
     <td height="50" align="left" class="td_bord3">$ 10.00</td>
   </tr>
   <tr>
     
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="left" class="td_bord3">&nbsp;</td>
     <td height="50" align="right" class="td_bord3"><strong><?php echo $this->lang->line('Total');?></strong></td>
     <td height="50" align="left" class="td_bord3"><strong>$ 524.00</strong></td>
   </tr>
  
  
    </table>
    </div>
    
    <hr />
    
    <div class="col-lg-12 padding_main">
     <div class="col-sm-6">
      <h4><center><a href="#" data-target="#myModal_login_guest" data-toggle="modal"><button class="btn_contine_guest " type="button" ><?php echo $this->lang->line('Continue As Guest');?></button></a></center></h4>
     
     </div>
     
     
     <div class="col-sm-6">
       <h4><center><a href="#" data-target="#myModal_login" data-toggle="modal"><button class="btn_contine" type="button" ><?php echo $this->lang->line('Continue');?></button></a></center></h4>
     </div>
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
<img src="images/close.png">
</button>
        <h3 style="margin:0px;"><center><?php echo $this->lang->line('Guest');?></center></h3>
      </div>
      
      <div class="modal-body" style="overflow:hidden">
       
       <div class="col-md-12 guest_login" style="display:none">
        <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate">
        <div class="col-xs-12 padding_main"><center><a href="#"><img src="<?php echo base_url();?>public/front/images/facebook_login.png"  style=" margin:20px 0px 0px 0px;" /></a></center></div>
        <div class="col-xs-12 padding_main"><center><a href="#"><img src="<?php echo base_url();?>public/front/images/twitter_login.png"  style=" margin:20px 0px 20px 0px;" /></a></center></div>
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
        <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate">
        
       <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Full Name');?></p>
        <input id="firstname" class="form-control2" type="text" placeholder="" >
        <!--<p class="inpu_text4">House name/number and street,P.O.box,company name c/o</p>-->
     </div>
    </div>
    
    
    <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Password');?></p>
        
        <input id="firstname" class="form-control2" type="text" placeholder="" >
       <p class="inpu_text4"><?php echo $this->lang->line('Apartment, suite, unit, building, floor,etc');?></p>
        
     </div>
    </div>
    
    <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Address Line 2');?></p>
        <input id="firstname" class="form-control2" type="text" placeholder="" >
     </div>
    </div>
        
      <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Phone Number');?></p>
        <input id="firstname" class="form-control2" type="text" placeholder="" >
     </div>
    </div>


   <div class="form-group has-feedback">
    <div class="col-lg-12 ">
     <p class="inpu_text2"><?php echo $this->lang->line('Town/City');?></p>
     <input id="firstname" class="form-control2" type="text" placeholder="" >
   </div>
  </div>
  
  <div class="form-group has-feedback">
    <div class="col-lg-12 ">
     <p class="inpu_text2"><?php echo $this->lang->line('Postcode');?></p>
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
     <td width="90%" valign="top"  height="55"><p style="margin-top:4px;"><?php echo $this->lang->line('Yes, I agree to the');?> <strong><?php echo $this->lang->line('Gotakeaway');?></strong> <a href="#"><?php echo $this->lang->line('Terms of     Service');?></a> <?php echo $this->lang->line('and');?> <a href="#"><?php echo $this->lang->line('Privacy Policy');?></a>.</p></td>
    </tr>
  </table>

         <div class="form-group has-feedback">
          <div class="col-lg-12">
          <button class="btn_loginmain guest_sign_btn22" type="submit"><?php echo $this->lang->line('Confirm');?></button>
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
       <h3 style="margin:0px;"><center>User</center></h3>
      </div>
      
      <div class="modal-body" style="overflow:hidden">
       
       <div class="col-md-12 guest_login" >
        <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate">
        <div class="col-xs-12 padding_main"><center><a href="#"><img src="<?php echo base_url();?>public/front/images/facebook_login2.png"  style=" margin:20px 0px 0px 0px;" /></a></center></div>
        <div class="col-xs-12 padding_main"><center><a href="#"><img src="<?php echo base_url();?>public/front/images/twitter_login2.png"  style=" margin:20px 0px 20px 0px;" /></a></center></div>
        <div class="clearfix"></div>
        
      <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2">Email</p>
        <input id="firstname" class="form-control2" type="text" placeholder="" >
     </div>
    </div>


   <div class="form-group has-feedback">
    <div class="col-lg-12 ">
     <p class="inpu_text2">Password</p>
     <input id="firstname" class="form-control2" type="text" placeholder="" >
   </div>
  </div>
                <div class="form-group has-feedback">
                 <div class="col-lg-12">
                  <div class="checkbox checkbox-primary">
                        <input id="1" class="styled" type="checkbox" >
                        <label for="1">
                            &nbsp;&nbsp;Remember me
                        </label>
                    </div>
                 </div>
                 </div>

         <div class="form-group has-feedback">
          <div class="col-lg-12">
          <button class="btn_loginmain" type="button">Login</button>
          </div>
          </div>
          
          <div class="form-group has-feedback">
          <div class="col-lg-12 padding_main">
          <div class="col-xs-6">
         <a href="#">Forgot password?</a>
             </div>
          <div class="col-xs-6" style="text-align:right" >
         <a href="#" class="guest_login_btn">Create account</a>
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
     <td width="90%" valign="top"  height="55"><p style="margin-top:4px;">Yes, I agree to the <strong>Gotakeaway</strong> <a href="#">Terms of     Service</a> and <a href="#">Privacy Policy</a>.</p></td>
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
