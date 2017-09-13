
<?php



$session_data=$this->session->userdata('user_logged_in');
$user_id = $session_data['user_id'];

$language_data=$this->session->userdata('language');



if($language_data==''){
$language_data=array('language' =>'purtgal');
}

if(!empty($language_data)){
$this->lang->load($language_data['language'], $language_data['language']);
}
$page=$this->uri->segment(1);

?>

<div id="fb-root"></div>

<a id="fb-auth" href="javascript:void(0);" style="display:none;" ><img src="<?php echo base_url();?>public/front/images/facebook_login2.png" width="100%"  style=" margin:5px 0px 5px 0px;          min-height:27px;" /></a>

<header class="navbar navbar-static-top bs-docs-nav header top_menu" id="top" role="banner">




  <div class="container1">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				 <a href="<?php echo base_url();?>home" class="navbar-brand"><img src="<?php echo base_url();?>public/front/images/logo.png"  />
			    </a>
			</div>
			
			
			<?php if(empty($user_id)){?>
			
			
			
			<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
			<ul class="nav navbar-nav navbar-right" style="margin-right:5px;">
              
            
                
                
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->lang->line('Login');?></a>
         <ul class="dropdown-menu" style="width:400px; border:#ccc 1px solid; margin-top:36px;">
          <i class="fa fa-caret-up" aria-hidden="true" style="color: #cd0000; font-size: 25px; margin: -22px 29px 0 0; position: absolute; right: 0;"></i>
          <div class="col-md-12 ">
        <form action="<?php echo base_url('signup/login');?>" method="post" class="form-horizontal bv-form"  onsubmit="return check_blankd()">
        <center><h3><strong><?php echo $this->lang->line('Welcome back');?></strong></h3></center>
         <div class="col-xs-6 padding_right_mobile_l"><center>
		 
		 <a  href="javascript:void(0);" class="facebook_login" ><img src="<?php echo base_url();?>public/front/images/facebook_login2.png" width="100%"  style=" margin:5px 0px 5px 0px;          min-height:27px;" /></a></center></div>
        <div class="col-xs-6 padding_right_mobile_r"><center><a href="<?php echo base_url('twtest'); ?>"><img src="<?php echo base_url();?>public/front/images/twitter_login2.png" width="100%" style=" margin:5px 0px 5px 0px;          min-height:27px;" /></a></center>
        </div>
        
         <div class="clearfix"></div>
         <center><h2 class="border_cut" style=" margin:8px 0px 5px 0px"> &nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('OR');?>&nbsp;&nbsp;&nbsp; </h2></center>
         <div class="clearfix"></div>
		 
		 <center>
     <?php if($this->session->flashdata('success')){ $success = $this->session->flashdata('success');}?>
        <?php if(isset($success)){?><div class="success" style="padding-bottom:30px;color:green;"><button type="button" class="close">X</button><?php echo $success; ?></div><?php }?>

<div class="error" id="login_error" style="display:none; padding-bottom:10px;color:red;"></div>
<div class="error" id="activation_error" style="display:none; padding-bottom:10px;color:red;"><?php echo $this->lang->line('account_inactive_msg');?></div>

 <?php if($this->session->flashdata('exist_error')){ $exist_error = $this->session->flashdata('exist_error');}?>
        <?php if(isset($exist_error)){?><div class="error" style="padding-bottom:30px;color:red;"><button type="button" class="close">X</button><?php echo $exist_error; ?></div><?php }?>	
	 </center>
		 
		 
		 
        
      <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Email');?></p>
        <input id="emaild" name="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}else{ echo $this->input->post('email'); }?>" class="form-control2" type="text" placeholder="" autocomplete="off">
     <div class="col-lg-12">
       <span id="emaild_error" class="error-ok"  style="font-style:normal;color:#FF0000; display:none;"><i><?php echo $this->lang->line('Enter your email');?></i></span>
      <span id="emaild_invalid" class="valid" style="color:#FF0000; display:none;font-style:normal;"><i><?php echo $this->lang->line('is Invalid');?></i></span>
    <!--<span style="color:#FF0000; display:none;font-style:normal" id="email_exist_error"><i>Your email address is registered with us. Please login</i></span>-->
  </div>
	 </div>
    </div>


   <div class="form-group has-feedback">
    <div class="col-lg-12 ">
     <p class="inpu_text2"><?php echo $this->lang->line('Password');?></p>
     <input id="passwordd" name="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}else{ echo $this->input->post('password'); }?>" class="form-control2" type="password" placeholder="" autocomplete="off">
   <div class="col-lg-12">
<span id="passwordd_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Enter your password');?></i></span>

</div>
   </div>
  </div>
                <div class="form-group has-feedback">
                 <div class="col-lg-12">
                  <div class="checkbox checkbox-primary">
                        <input id="check-box" class="styled" type="checkbox" value='1' name="remember" <?php if($this->input->cookie('email')){ echo "checked"; } ?>>
                        <label for="check-box">
                            &nbsp;&nbsp;<?php echo $this->lang->line('Remember me');?>
                        </label>
                    </div>
                 </div>
                 </div>

         <div class="form-group has-feedback">
          <div class="col-lg-12">
          <button class="btn_loginmain login_form" value="submit" type="button"><?php echo $this->lang->line('Login');?></button>
          </div>
          </div>
          
          <div class="form-group has-feedback">
          <div class="col-lg-12 padding_main">
          <div class="col-xs-6">
         <a href="<?php echo base_url('restaurant_signup/forget_password'); ?>"><?php echo $this->lang->line('Forgot password');?>?</a>
             </div>
          
          </div>
          </div>
          
        </form>
        </div>
        </ul>
      </li>
            
			
			
			
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->lang->line('Register');?></a>
                <ul class="dropdown-menu" style="width:400px; border:#ccc 1px solid; margin-top:36px;">
          <i class="fa fa-caret-up" aria-hidden="true" style="color: #cd0000;    font-size: 25px; margin: -22px 29px 0 0;  position: absolute;right: 0;"></i>
          <div class="col-md-12 ">
		  
        <form action="<?php echo base_url('signup/add_user');?>" method="post" class="form-horizontal bv-form" onsubmit="return check_blank()">
         <center><h3><strong><?php echo $this->lang->line('Create account');?></strong></h3></center>
         <div class="col-xs-6 padding_right_mobile_l"><center><a href="javascript:void(0);" class="facebook_login"><img src="<?php echo base_url();?>public/front/images/facebook_login2.png" width="100%"  style=" margin:5px 0px 5px 0px;          min-height:27px;" /></a></center></div>
        <div class="col-xs-6 padding_right_mobile_r"><center><a href="<?php echo base_url('twtest'); ?>"><img src="<?php echo base_url();?>public/front/images/twitter_login2.png" width="100%" style=" margin:5px 0px 5px 0px;          min-height:27px;" /></a></center></div>
        
         <div class="clearfix"></div>
         <center><h2 class="border_cut" style=" margin:8px 0px 5px 0px"> &nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('OR');?>&nbsp;&nbsp;&nbsp; </h2></center>
         <div class="clearfix"></div>
        
       <div class="form-group has-feedback">
        <div class="col-lg-12 padding_main">
         <div class="col-lg-6 ">
        <p class="inpu_text2"><?php echo $this->lang->line('First Name');?></p>
        <input id="first_name" value="" name="first_name" class="form-control2" type="text" placeholder="" autocomplete="off">
      <div class="col-lg-12">
      <span id="first_name-error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Enter your First name');?></i></span>
      </div>
	  </div>
	  
      <div class="col-lg-6 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Last Name');?></p>
        <input id="last_name" value="" name="last_name" class="form-control2" type="text" placeholder="" autocomplete="off">
     <div class="col-lg-12">
     <span id="last_name-error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Enter your Last name');?></i></span>
      </div>
	 </div>
     </div>
    </div>
    
    
    
  <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Email');?></p>
        <input id="email" name="email" value="" class="form-control2" type="text" placeholder="" autocomplete="off">
     <div class="col-lg-12">
       <span id="email_error" class="error-ok"  style="font-style:normal;color:#FF0000; display:none;"><i><?php echo $this->lang->line('Enter your email');?></i></span>
      <span id="email_invalid" class="valid" style="color:#FF0000; display:none;font-style:normal;"><i><?php echo $this->lang->line('is Invalid');?></i></span>
    <!--<span style="color:#FF0000; display:none;font-style:normal" id="email_exist_error"><i>Your email address is registered with us. Please login</i></span>-->
  </div>
	 </div>
    </div>
        
      <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Create Password');?></p>
        <input id="new_password" name="password" value="" class="form-control2" type="password" placeholder="" autocomplete="off">
     <div class="col-lg-12">
<span id="password_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Enter your password');?></i></span>
<!--<span id="numeric_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i>Enter Numeric password</i></span>-->
<span id="digit_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Enter Minimam 8 Digit');?></i></span>
<span id="password_expression_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('password_expression_error');?></i></span>
</div>
	 </div>
    </div>


   <div class="form-group has-feedback">
    <div class="col-lg-12 ">
     <p class="inpu_text2"><?php echo $this->lang->line('Confirm Password');?></p>
     <input id="cpassword" name="cpassword" value="" class="form-control2" type="password" placeholder="" autocomplete="off">
   <div class="col-lg-12">
<span id="cpassword_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Enter your confirm password');?></i></span>
<span id="matchpassword_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Passwords not match');?></i></span>
</div>
   </div>
  </div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" valign="top" height="55">
    
    <div class="form-group has-feedback">
     <div class="col-lg-12">
      <div class="checkbox checkbox-primary">
                        <input id="privacy" class="styled" type="checkbox" checked>
                        <label for="privacy"></label>
                         
                        
                    </div>
                    </div>
           </div></td>
     <td width="90%" valign="top"  height="55"><p style="margin-top:4px;"><?php echo $this->lang->line('Yes, I agree to the');?> <strong>PortuGo Takeaway</strong> <a href="<?php echo base_url('page/term_condition'); ?>"><?php echo $this->lang->line('Terms of     Service');?></a> <?php echo $this->lang->line('and');?> <a href="<?php echo base_url('page/privacy_policy'); ?>"><?php echo $this->lang->line('Privacy Policy');?></a>.</p></td>
    </tr>
	<div class="col-lg-12">
    <span id="privacy_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Checked Privacy');?></i></span>
    </div>
	
  </table>

         <div class="form-group has-feedback">
          <div class="col-lg-12">
          <button class="btn_loginmain register_form" name="submit" value="submit" type="submit"><?php echo $this->lang->line('Sign Up');?></button>
          </div>
          </div>
         
        </form>
       </div>
        </ul>
		
		
		
		
             </li>
               
                <li ><a href="<?php echo base_url();?>restaurant_signup"> <?php echo $this->lang->line('Restaurant Sign Up');?> </a></li>
				
                <li>
				
				
				
            
			
			<form id="language" name="language_select" action="" method="post" style="margin-top:49px;" >
            <select name="lang_sel" id="" class="select deepak mycomp" style="width:45px; cursor:pointer" data-maincss="blue">
            <option  title="<?php echo base_url();?>public/front/images/pr.png" <?php if($language_data['language']=='purtgal'){ echo "selected==selected"; } ?> value="purtgal" class="pr_img"></option>
            <option  title="<?php echo base_url();?>public/front/images/en.png" <?php if($language_data['language']=='english'){ echo "selected==selected"; } ?> value="english"  class="en_img"></option>
            <input type="hidden" id="page_name" value="<?php echo $page; ?>">
			
			</select>
            </form>
			
			
           </li>
           
           
                
				</ul>
			</nav>
			
			
			<?php } else { ?>
			<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
				<ul class="nav navbar-nav navbar-right" style="margin-right:5px;">
                <?php 
				
				$user = $this->myaccount_model->myaccount($user_id);
				
				?>
                
               <li> <a href="#" style="color:#000; cursor:default; font-weight:600; font-size:18px;"><?php echo $this->lang->line('Welcome');?> <?php echo ucwords($user['first_name']);?></a> </li>
				
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->lang->line('My Account');?>&nbsp;<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url();?>myaccount/favourite_restaurant"><?php echo $this->lang->line('My Favorites');?></a></li>
          <li><a href="<?php echo base_url();?>myaccount/user_order"><?php echo $this->lang->line('Recent Orders');?></a></li>
          <li><a href="<?php echo base_url();?>myaccount/dashboard"><?php echo $this->lang->line('My Account');?></a></li>
          <li><a href="<?php echo base_url();?>myaccount/address_book"><?php echo $this->lang->line('Address Book');?></a></li>
            
          <li class="divider"></li>
          <li><a href="javascript:void(0)" id="logout"><?php echo $this->lang->line('Log out');?> </a></li>
        </ul>
      </li>
      
        <li>
            
			
			<form id="language" name="language_select" action="" method="post" style="margin-top:49px;" >
            <select name="lang_sel" id="" class="select deepak mycomp" style="width:45px; cursor:pointer" data-maincss="blue">
            <option  title="<?php echo base_url();?>public/front/images/pr.png" <?php if($language_data['language']=='purtgal'){ echo "selected==selected"; } ?> value="purtgal" class="pr_img"></option>
            <option  title="<?php echo base_url();?>public/front/images/en.png" <?php if($language_data['language']=='english'){ echo "selected==selected"; } ?> value="english"  class="en_img"></option>
            <input type="hidden" id="page_name" value="<?php echo $page; ?>">
			
			</select>
            </form>
			
           </li>
               
				</ul>
			</nav>
			
			<?php } ?>
			
			
			
			
            </div>
	   </header>
	   
	   
	   
	   
	   
	   
	   
	   <header class="navbar navbar-static-top bs-docs-nav header top_submenu" id="top" role="banner">
   <div class="container1">
	 <div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				 <a href="<?php echo base_url();?>home" class="navbar-brand"><img src="<?php echo base_url();?>public/front/images/logo.png"  />
			    </a>
			</div>
			
			<?php if(empty($user_id)){?>
			
     
			<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
				<ul class="nav navbar-nav navbar-right">
               
                
               
               <li class="dropdown" ><a class="dropdown-toggle san" data-toggle="dropdown" href="#"><?php echo $this->lang->line('Login');?></a>
       
       
         <ul class="dropdown-menu pull-right" style="width:340px; border:#ccc 1px solid; margin-top:0px;">
          <i class="fa fa-caret-up" aria-hidden="true" style="color: #cd0000; font-size: 25px; margin: -22px 25px 0 0; position: absolute;
    right: 0;"></i>

         
          
          <div class="col-md-12 padding_right_mobile">
          
          
        <form action="<?php echo base_url('signup/login');?>" method="post" class="form-horizontal bv-form" name="register-form" onsubmit="return check_blankm()">
        
         <center><h3><strong><?php echo $this->lang->line('Welcome back');?></strong></h3></center>
        
        <div class="col-xs-6 padding_right_mobile_l"><center><a href="javascript:void(0);" class="facebook_login"><img src="<?php echo base_url();?>public/front/images/facebook_login2.png" width="100%"  style=" margin:5px 0px 5px 0px; min-height:27px;" /></a></center></div>
        <div class="col-xs-6 padding_right_mobile_r"><center><a href="<?php echo base_url('twtest'); ?>"><img src="<?php echo base_url();?>public/front/images/twitter_login2.png" width="100%" style=" margin:5px 0px 5px 0px; min-height:27px;" /></a></center></div>
        
         <div class="clearfix"></div>
         <center><h2 class="border_cut" style=" margin:8px 0px 5px 0px"> &nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('OR');?>&nbsp;&nbsp;&nbsp; </h2></center>
        <div class="clearfix"></div>
        
		  
		 <center>
     <?php if($this->session->flashdata('success')){ $success = $this->session->flashdata('success');}?>
        <?php if(isset($success)){?><div class="success" style="padding-bottom:30px;color:green;"><button type="button" class="close">X</button><?php echo $success; ?></div><?php }?>

 <?php if($this->session->flashdata('exist_error')){ $exist_error = $this->session->flashdata('exist_error');}?>
        <?php if(isset($exist_error)){?><div class="error" style="padding-bottom:30px;color:red;"><button type="button" class="close">X</button><?php echo $exist_error; ?></div><?php }?>	
	 </center>
		 
		 
		 
        
      <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Email');?></p>
        <input id="emailm" name="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}else{ echo $this->input->post('email'); }?>" class="form-control2" type="text" placeholder="" autocomplete="off">
     <div class="col-lg-12">
       <span id="emailm_error" class="error-ok"  style="font-style:normal;color:#FF0000; display:none;float:left;"><i><?php echo $this->lang->line('Enter your email');?></i></span>
      <span id="emailm_invalid" class="valid" style="color:#FF0000; display:none;font-style:normal;float:left;"><i><?php echo $this->lang->line('is Invalid');?></i></span>
    <!--<span style="color:#FF0000; display:none;font-style:normal" id="email_exist_error"><i>Your email address is registered with us. Please login</i></span>-->
  </div>
	 </div>
    </div>


   <div class="form-group has-feedback">
    <div class="col-lg-12 ">
     <p class="inpu_text2"><?php echo $this->lang->line('Password');?></p>
     <input id="passwordm" name="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}else{ echo $this->input->post('password'); }?>" class="form-control2" type="password" placeholder="" autocomplete="off">
   <div class="col-lg-12">
<span id="passwordm_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal;float:left;"><i><?php echo $this->lang->line('Enter your password');?></i></span>

</div>
   </div>
  </div>
                <div class="form-group has-feedback">
                 <div class="col-lg-12">
                  <div class="checkbox checkbox-primary" style="float:left">
                        <input id="2" class="styled" type="checkbox" value='1' name="remember" <?php if($this->input->cookie('email')){ echo "checked"; } ?>>
                        <label for="2">
                            &nbsp;&nbsp;<?php echo $this->lang->line('Remember me');?>
                        </label>
                    </div>
                 </div>
                 </div>

         <div class="form-group has-feedback">
          <div class="col-lg-12">
          <button class="btn_loginmain" name="submit" value="submit" type="submit"><?php echo $this->lang->line('Login');?></button>
          </div>
          </div>
		  
		  
		  
		  
          
          <div class="form-group has-feedback">
          <div class="col-lg-12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left"><a href="#" style="text-align:left;"><?php echo $this->lang->line('Forgot password');?>?</a></td>
    <td>&nbsp;</td>
  </tr>
</table>

       
         
            
          </div>
          </div>
          
        </form>
</div>
          
        
        </ul>
         
      </li>
               
            <div class="clearfix" style=" margin-top:-40px;">&nbsp;</div>   
              
               
				<li class="dropdown"><a class="dropdown-toggle san" data-toggle="dropdown" href="#"><?php echo $this->lang->line('Register');?></a>
                
                <ul class="dropdown-menu pull-right" style="width:340px; border:#ccc 1px solid; margin-top:20px;">
          <i class="fa fa-caret-up" aria-hidden="true" style="color: #cd0000;font-size: 25px;margin: -22px 29px 0 0; position: absolute; right: 0;"></i>

          <div class="col-md-12 padding_right_mobile">
          
          <center><h3><strong><?php echo $this->lang->line('Create account');?></strong></h3></center>
         <div class="col-xs-6 padding_right_mobile_l"><center><a href="javascript:void(0);" class="facebook_login"><img src="<?php echo base_url();?>public/front/images/facebook_login2.png" width="100%"  style=" margin:5px 0px 5px 0px; min-height:27px;" /></a></center></div>
        <div class="col-xs-6 padding_right_mobile_r"><center><a href="<?php echo base_url('twtest'); ?>"><img src="<?php echo base_url();?>public/front/images/twitter_login2.png" width="100%" style=" margin:5px 0px 5px 0px; min-height:27px;" /></a></center></div>
        
         <div class="clearfix"></div>
         <center><h2 class="border_cut" style=" margin:8px 0px 5px 0px"> &nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('OR');?>&nbsp;&nbsp;&nbsp; </h2></center>
        <div class="clearfix"></div>
          
        <form action="<?php echo base_url('signup/add_user');?>" method="post" class="form-horizontal bv-form" name="register-form" onsubmit="return check_blanks()" >
        
       <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('First Name');?></p>
        <input id="fname" value="" name="first_name" class="form-control2" type="text" placeholder="" autocomplete="off">
       <div class="col-lg-12">
      <span id="fname-error" class="error-ok" style="color:#FF0000; display:none;font-style:normal;float:left;"><i><?php echo $this->lang->line('Enter your First name');?></i></span>
      </div>
	 </div>
    </div>
    
    <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Last Name');?></p>
        <input id="lname" value="" name="last_name" class="form-control2" type="text" placeholder="" autocomplete="off">
     <div class="col-lg-12">
     <span id="lname-error" class="error-ok" style="color:#FF0000; display:none;font-style:normal;float:left;"><i><?php echo $this->lang->line('Enter your Last name');?></i></span>
      </div>
	 </div>
    </div>
    
    <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Email');?></p>
        <input id="emails" name="email" value="" class="form-control2" type="text" placeholder="" autocomplete="off">
     <div class="col-lg-12">
       <span id="emails_error" class="error-ok"  style="font-style:normal;color:#FF0000; display:none;float:left;"><i><?php echo $this->lang->line('Enter your email');?></i></span>
      <span id="emails_invalid" class="valid" style="color:#FF0000; display:none;font-style:normal;float:left;"><i><?php echo $this->lang->line('is Invalid');?></i></span>
    <!--<span style="color:#FF0000; display:none;font-style:normal" id="email_exist_error"><i>Your email address is registered with us. Please login</i></span>-->
  </div>
	 </div>
    </div>
        
        
      <div class="form-group has-feedback">
       <div class="col-lg-12 ">
        <p class="inpu_text2"><?php echo $this->lang->line('Create Password');?></p>
        <input id="npassword" name="password" value="" class="form-control2" type="password" placeholder="" autocomplete="off">
     <div class="col-lg-12">
<span id="npassword_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal;float:left;"><i><?php echo $this->lang->line('Enter your password');?></i></span>
<!--<span id="numeric_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i>Enter Numeric password</i></span>-->
<span id="ndigit_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal;float:left;"><i><?php echo $this->lang->line('Enter Minimam 6 Digit');?></i></span>
</div>
	 </div>
    </div>


   <div class="form-group has-feedback">
    <div class="col-lg-12 ">
     <p class="inpu_text2"><?php echo $this->lang->line('Confirm Password');?></p>
     <input id="ncpassword" name="cpassword" value="" class="form-control2" type="password" placeholder="" autocomplete="off">
   <div class="col-lg-12">
<span id="ncpassword_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal;float:left;"><i><?php echo $this->lang->line('Enter your confirm password');?></i></span>
<span id="nmatchpassword_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal;float:left;"><i><?php echo $this->lang->line('Passwords not match');?></i></span>
</div>
   </div>
  </div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" valign="top" height="55">
    
    <div class="form-group has-feedback">
     <div class="col-lg-12">
      <div class="checkbox checkbox-primary" style="margin-right:10px;">
                        <input id="nprivacy" class="styled" type="checkbox" checked>
                        <label for="nprivacy">
                        </label>
                        
                    </div>
                    </div>
           </div></td>
     <td width="90%" valign="top"  height="55"><p style="margin-top:4px; text-align:left"><?php echo $this->lang->line('Yes, I agree to the');?> <strong><?php echo $this->lang->line('Gotakeaway');?></strong> <a href="#"><?php echo $this->lang->line('Terms of     Service');?></a> <?php echo $this->lang->line('and');?> <a href="#"><?php echo $this->lang->line('Privacy Policy');?></a>.</p></td>
    </tr>
	<div class="col-lg-12">
    <span id="nprivacy_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal;float:left;"><i><?php echo $this->lang->line('Please Checked Privacy');?></i></span>
    </div>
  </table>

         <div class="form-group has-feedback">
          <div class="col-lg-12">
          <button class="btn_loginmain" type="submit"><?php echo $this->lang->line('Sign Up');?></button>
          </div>
          </div>
         
        </form>
       </div>
        </ul>
             </li>     
             
             <div class="clearfix" style=" margin-top:-40px;">&nbsp;</div> 
             
                <li ><a href="<?php echo base_url('restaurant_signup'); ?>" class="san"> <?php echo $this->lang->line('Restaurant Sign Up');?> </a></li>
                
                  
                
                 
					<li ><a class="dropdown-toggle san" data-toggle="dropdown" href="#"><?php echo $this->lang->line('Go Takeaway');?><span class="caret"></span></a>
                 <ul class="dropdown-menu" style="margin-top:-15px;">
                  <li> <a href="<?php echo base_url('page/contact_us'); ?>"><?php echo $this->lang->line('Contact us');?></a></li>
   <li> <a href="<?php echo base_url('page/faq'); ?>"><?php echo $this->lang->line('FAQ');?></a></li>
   <li> <a href="<?php echo base_url('page/recomend_restaurant'); ?>"><?php echo $this->lang->line('Recommend a restaurant');?></a></li>
   <li> <a href="<?php echo base_url('page/about_us'); ?>"><?php echo $this->lang->line('About Us');?></a></li>
    <li><a href="<?php echo base_url('page/term_condition'); ?>"><?php echo $this->lang->line('Terms and conditions');?></a></li>
   <li> <a href="<?php echo base_url('page/privacy_policy'); ?>"><?php echo $this->lang->line('Privacy policy');?></a></li>
                   </ul>
                  </li>					
					
					
                  
                 
				</ul>
           </nav>
		   
		   
		   <?php } else { ?>
			<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
				<ul class="nav navbar-nav navbar-right" style="margin-right:5px;">
                <?php 
				
				$user = $this->myaccount_model->myaccount($user_id);
				
				?>
               
		   
		   <li><a href="#" style="color:#000; cursor:default; font-weight:600; font-size:18px"><?php echo $this->lang->line('Welcome');?> <?php echo ucwords($user['first_name']);?></a></li>
                
        
		<li><a href="<?php echo base_url();?>myaccount/dashboard"><?php echo $this->lang->line('My Account');?></a></li>
           <li><a href="<?php echo base_url();?>myaccount/favourite_restaurant"><?php echo $this->lang->line('My Favorites');?></a></li>
          <li><a href="<?php echo base_url();?>myaccount/user_order"><?php echo $this->lang->line('Recent Orders');?></a></li>
          <li><a href="<?php echo base_url();?>myaccount/address_book"><?php echo $this->lang->line('Address Book');?></a></li>
          <li class="divider"></li>
          <li><a href="javascript:void(0);" id="logout"><?php echo $this->lang->line('Log out');?> </a></li>
               
                  <li> <a href="<?php echo base_url('page/contact_us'); ?>"><?php echo $this->lang->line('Contact us');?></a></li>
   <li> <a href="<?php echo base_url('page/faq'); ?>"><?php echo $this->lang->line('FAQ');?></a></li>
   <li> <a href="<?php echo base_url('page/recomend_restaurant'); ?>"><?php echo $this->lang->line('Recommend a restaurant');?></a></li>
   <li> <a href="<?php echo base_url('page/about_us'); ?>"><?php echo $this->lang->line('About Us');?></a></li>
    <li><a href="<?php echo base_url('page/term_condition'); ?>"><?php echo $this->lang->line('Terms and conditions');?></a></li>
   <li> <a href="<?php echo base_url('page/privacy_policy'); ?>"><?php echo $this->lang->line('Privacy policy');?></a></li>
                  
                
		   
               
				</ul>
			</nav>
			
			<?php } ?>
		   
		   
            </div>
	   </header>
	


<a href="javascript:void(0);" data-target="#myModal_register" data-toggle="modal" class="reg_success" style="display:none">reg_success</a>

<div class="modal fade" id="myModal_register" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url('public/front/images/close.png'); ?>">
</button>
        <h3 style="margin:0px; text-align:center" id=""><?php echo $this->lang->line('Message');?></h3>
      </div>
      

      
      
      <div class="modal-body " id="">
       <form  class="form-horizontal san" name="register-form" >
      
        <div class="form-group has-feedback">
          <div class="col-md-12 padding">
          
          <h4 style="text-align:center"><?php echo $this->lang->line('reg_success_msg');?></h4>
   
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
if($this->session->flashdata('register_success'))
{
?>
<script>
$(document).ready(function(){

$(".reg_success").trigger('click');

});
</script>
<?php }
?>








<a href="javascript:void(0);" data-target="#account_verified" data-toggle="modal" class="account_verified" style="display:none">account_verified</a>

<div class="modal fade" id="account_verified" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url('public/front/images/close.png'); ?>">
</button>
        <h3 style="margin:0px; text-align:center" id=""><?php echo $this->lang->line('Message');?></h3>
      </div>
      

      
      
      <div class="modal-body " id="">
       <form  class="form-horizontal san" name="register-form" >
      
        <div class="form-group has-feedback">
          <div class="col-md-12 padding">
          
          <h4 style="text-align:center"><?php echo $this->lang->line('account_verify_msg');?></h4>
   
  <div class="clearfix"></div>
   <div class="col-md-7 padding_main">
   
   


</div>
</div>
</div>


  <hr />    

<div class="form-group has-feedback foo">
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
if($this->session->flashdata('account_verified'))
{
?>
<script>
$(document).ready(function(){

$(".account_verified").trigger('click');

});
</script>
<?php }
?>








	  
  
<script>
$(document).ready(function(){	
	$(document).on('click',".login_form",function(){
	
var email = $("#emaild").val();
var emailspecd= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
var passwordd = $("#passwordd").val();


if(email==''){
$('#emaild_error').show();
$('#emaild').focus();
return false;
}else{
$('#emaild_error').hide();
}

if(!emailspecd.test(email)) {				
$('#emaild_invalid').show();
$("#email").focus();
return false;
}else{
$('#emaild_invalid').hide();
} 

if(passwordd==''){
$('#passwordd_error').show();
$('#passwordd').focus();
return false;
}else{
$('#passwordd_error').hide();
}

if($("#check-box").is(":checked")) {
  var remember=1;
}else{
	var remember=0;
}//alert(remember);

$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('signup/login'); ?>', 
    data: {email:email,passwordd:passwordd,remember:remember}, 
    success: function (data) {
    //alert(data);
	if(data==1)
	{
	window.location.href = "<?php echo base_url('home'); ?>";
	}
	else if(data==2)
	{
	$("#activation_error").show();
	}
	
	else{
	$("#activation_error").hide();
	$("#login_error").show();
	$("#login_error").html(data);
	}
	
	}
    });


  });

});
</script>





<script>
$(document).ready(function(){	
	$(document).on('click',".register_form",function(){
	
var firstname = $("#first_name").val();
var lastname = $("#last_name").val();	
var email = $("#email").val();
var emailspecd= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
var pass_express=/^(?=.*\d)(?=.*[A-Z])$/;
var new_password = $("#new_password").val();
var confirm_password = $("#cpassword").val();

if(firstname==''){
$('#first_name-error').show();
$('#first_name').focus();
return false;
}else{
$('#first_name-error').hide();
}

if(lastname==''){
$('#last_name-error').show();
$('#last_name').focus();
return false;
}else{
$('#last_name-error').hide();
}

if(email==''){
$('#email_error').show();
$('#email').focus();
return false;
}else{
$('#email_error').hide();
}

if(!emailspecd.test(email)) {				
$('#email_invalid').show();
$("#email").focus();
return false;
}else{
$('#email_invalid').hide();
} 

if(new_password==''){
$('#password_error').show();
$('#new_password').focus();
return false;
}else{
$('#password_error').hide();
}

if(new_password.length < 8){
$('#digit_error').show();
$("#new_password").focus();
return false;
}else{
$('#digit_error').hide();
}
if(!/\d/.test(new_password)) {				
$('#password_expression_error').show();
$("#new_password").focus();
return false;
}else{
$('#password_expression_error').hide();
} 
if(!/[A-Z]/.test(new_password)) {				
$('#password_expression_error').show();
$("#new_password").focus();
return false;
}else{
$('#password_expression_error').hide();
} 


if(confirm_password==''){
$('#cpassword_error').show();
$("#cpassword").focus();
return false;
}else{
$('#cpassword_error').hide();
}

if(confirm_password!=new_password){
$('#matchpassword_error').show();
$("#cpassword").focus();
return false;
}else{
$('#matchpassword_error').hide();
}


/*if($("#check-box").is(":checked")) {
  var remember=1;
}else{
	var remember=0;
}*///alert(remember);

/*$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('signup/login'); ?>', 
    data: {email:email,passwordd:passwordd,remember:remember}, 
    success: function (data) {
    //alert(data);
	if(data==1)
	{
	window.location.href = "<?php echo base_url('home'); ?>";
	}
	
	else{
	$("#login_error").show();
	$("#login_error").html(data);
	}
	
	}
    });*/


  });

});
</script>

   
	   
	 

 <!--<script>

  function check_blank()
  {
    var firstname=document.getElementById("first_name").value;
    if(firstname=="")
    {  
     hideAllErrorscheck_blank();
     document.getElementById('first_name-error').style.display="inline";
     document.getElementById('first_name').focus();
     return false;
     
    }
	
	var lastname=document.getElementById("last_name").value;
    if(lastname=="")
    { 
     hideAllErrorscheck_blank();
     document.getElementById('last_name-error').style.display="inline";
     document.getElementById('last_name').focus();
     return false;
     
    }
		
	 var email=document.getElementById("email").value;
    if(email=="")
    {
		
     hideAllErrorscheck_blank();
     document.getElementById("email_error").style.display="inline";
     document.getElementById("email").focus();
     return false;
    }
    
   var emailspec= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   if(email.match(emailspec))
   {
    
   }else
   {
     hideAllErrorscheck_blank();
     document.getElementById("email_invalid").style.display="inline";
     document.getElementById("email").focus();
     return false;
   }
   
var loginPassword=document.getElementById("new_password").value;
    if(loginPassword=="")
    {
     
     hideAllErrorscheck_blank();
     document.getElementById("password_error").style.display="inline";
     document.getElementById("new_password").focus();
     return false;
    } 
    
	
           if (loginPassword.length<6)
           {
                
     hideAllErrorscheck_blank();
     document.getElementById('digit_error').style.display="inline";
     document.getElementById('new_password').focus();
     return false;

           }
	
	
      var repeatPassword=document.getElementById("cpassword").value;
     if(repeatPassword=="")
     {
      hideAllErrorscheck_blank();
      document.getElementById("cpassword_error").style.display="inline";
      document.getElementById("cpassword").focus();
      return false;
     }
    
     if(repeatPassword != loginPassword)
     {
      hideAllErrorscheck_blank();
      document.getElementById("matchpassword_error").style.display="inline";
      document.getElementById("cpassword").focus();
      return false;
     }
	
 var privacy=document.getElementById("privacy").checked;
    if(privacy=="")
    {
     
     hideAllErrorscheck_blank();
     document.getElementById('privacy_error').style.display="inline";
     document.getElementById('privacy').focus();
     return false;
     
    }
   
     
  }
  
  
  function hideAllErrorscheck_blank()
{
 
 document.getElementById("first_name-error").style.display="none";
document.getElementById("last_name-error").style.display="none";
 document.getElementById("email_error").style.display="none";
 document.getElementById("email_invalid").style.display="none";
 document.getElementById("password_error").style.display="none";
 document.getElementById("cpassword_error").style.display="none";
 document.getElementById("matchpassword_error").style.display="none";
document.getElementById("privacy_error").style.display="none";
document.getElementById("digit_error").style.display="none";
  
}
</script>-->




<script>   

  function check_blankm()
  {
	  
   var emailm=document.getElementById("emailm").value;
    if(emailm=="")
    {
		
     hideAllErrorscheck_blankm();
     document.getElementById("emailm_error").style.display="inline";
     document.getElementById("emailm").focus();
     return false;
    }
    
   var emailspecm= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   if(emailm.match(emailspecm))
   {
    
   }else
   {
     hideAllErrorscheck_blankm();
     document.getElementById("emailm_invalid").style.display="inline";
     document.getElementById("emailm").focus();
     return false;
   }

   var passwordm=document.getElementById("passwordm").value;
    if(passwordm=="")
    {
     
     hideAllErrorscheck_blankm();
     document.getElementById("passwordm_error").style.display="inline";
     document.getElementById("passwordm").focus();
     return false;
    } 
	
  }
   
   
   function hideAllErrorscheck_blankm()
{

document.getElementById("emailm_error").style.display="none";
document.getElementById("emailm_invalid").style.display="none";
document.getElementById("passwordm_error").style.display="none";

  }
  </script>
	 
<script>   

  function check_blanks()
  {
	
    var fname=document.getElementById("fname").value;
    if(fname=="")
    {  
     hideAllErrorscheck_blanks();
     document.getElementById('fname-error').style.display="inline";
     document.getElementById('fname').focus();
     return false;
     
    }
	
	var lname=document.getElementById("lname").value;
    if(lname=="")
    {  
     hideAllErrorscheck_blanks();
     document.getElementById('lname-error').style.display="inline";
     document.getElementById('lname').focus();
     return false;
     
    }

	var emails=document.getElementById("emails").value;
    if(emails=="")
    {
		
     hideAllErrorscheck_blanks();
     document.getElementById("emails_error").style.display="inline";
     document.getElementById("emails").focus();
     return false;
    }
    
   var emailspecs= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   if(emails.match(emailspecs))
   {
    
   }else
   {
     hideAllErrorscheck_blanks();
     document.getElementById("emails_invalid").style.display="inline";
     document.getElementById("emails").focus();
     return false;
   }
	
	var npassword=document.getElementById("npassword").value;
    if(npassword=="")
    {
     
     hideAllErrorscheck_blanks();
     document.getElementById("npassword_error").style.display="inline";
     document.getElementById("npassword").focus();
     return false;
    } 
    
	
           if (npassword.length<6)
           {
                
     hideAllErrorscheck_blanks();
     document.getElementById('ndigit_error').style.display="inline";
     document.getElementById('npassword').focus();
     return false;

           }
		   
		   
	var ncpassword=document.getElementById("ncpassword").value;
     if(ncpassword=="")
     {
      hideAllErrorscheck_blanks();
      document.getElementById("ncpassword_error").style.display="inline";
      document.getElementById("ncpassword").focus();
      return false;
     }
    
     if(ncpassword != npassword)
     {
      hideAllErrorscheck_blanks();
      document.getElementById("nmatchpassword_error").style.display="inline";
      document.getElementById("ncpassword").focus();
      return false;
     }
	
	var nprivacy=document.getElementById("nprivacy").checked;
    if(nprivacy=="")
    {
     
     hideAllErrorscheck_blank();
     document.getElementById('nprivacy_error').style.display="inline";
     document.getElementById('nprivacy').focus();
     return false;
     
    }
	
	
  }	
	
  function hideAllErrorscheck_blanks()
{
document.getElementById("fname-error").style.display="none";
document.getElementById("lname-error").style.display="none";
document.getElementById("emails_error").style.display="none";
document.getElementById("emails_invalid").style.display="none";
document.getElementById("npassword_error").style.display="none";
document.getElementById("ncpassword_error").style.display="none";
document.getElementById("nmatchpassword_error").style.display="none";
document.getElementById("nprivacy_error").style.display="none";
document.getElementById("ndigit_error").style.display="none";


}

</script>



<script>
$(document).ready(function(){
$(".facebook_login").click(function(){
//alert();
$("#fb-auth").trigger('click');
});
});
</script>
<script>
$(document).ready(function(){
$(document).on("click","#logout",function(){
//alert('hi'); return false;


window.fbAsyncInit = function() {
  FB.init({ appId: '699100413610431', 
	    status: true, 
	    cookie: true,
	    xfbml: true,
	    oauth: true});

  function updateButton(response) {
    var button = document.getElementById('fb-auth');
	
	$("#fb-auth").trigger('click');	
	
    if (response.authResponse) {
      //user is already logged in and connected
      //var userInfo = document.getElementById('user-info');
    
      button.onclick = function() {
        FB.logout(function(response) {
          //var userInfo = document.getElementById('user-info');
          //userInfo.innerHTML="";
		 // window.location.href='<?php echo base_url('signup/logout'); ?>';
		 // alert();
	});
      };
	  
    } 
  }

  // run once with current status and whenever the status changes
  FB.getLoginStatus(updateButton);
  FB.Event.subscribe('auth.statusChange', updateButton);	
};

setTimeout(function(){ document.location.href='<?php echo base_url('signup/logout');?>'; }, 1000);




(function() {
  var e = document.createElement('script'); e.async = true;
  e.src = document.location.protocol 
    + '//connect.facebook.net/en_US/all.js';
  document.getElementById('fb-root').appendChild(e);
}());




});
});
</script>

<?php if(empty($user_id)){?>

<script>
window.fbAsyncInit = function() {
  FB.init({ appId: '699100413610431', 
	    status: true, 
	    cookie: true,
	    xfbml: true,
	    oauth: true});

  function updateButton(response) {
    var button = document.getElementById('fb-auth');
	
		
    if (response.authResponse) {
      //user is already logged in and connected
      //var userInfo = document.getElementById('user-info');
      FB.api('/me',{locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'}, function(response) {
        /*userInfo.innerHTML = '<img src="https://graph.facebook.com/' 
	  + response.id + '/picture">' + response.name + response.email;*/
        button.innerHTML = '<img src="images/flogout.png">';
		//alert(response.email); return false;
		insert_this(response.first_name,response.last_name,response.email);
      });
      button.onclick = function() {
        FB.logout(function(response) {
          //var userInfo = document.getElementById('user-info');
          //userInfo.innerHTML="";
		 // window.location.href='logout.php';
	});
      };
	  
    } else {
      //user is not connected to your app or logged out
      button.innerHTML = '<img src="<?php echo base_url();?>public/front/images/facebook_login2.png" width="100%"  style="margin:5px 0px 5px 0px;min-height:27px;cursor:pointer;">';
      button.onclick = function() {
        FB.login(function(response) {
	  if (response.authResponse) {
            FB.api('/me',{locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'}, function(response) {
	     /* var userInfo = document.getElementById('user-info');
	      userInfo.innerHTML = 
                '<img src="https://graph.facebook.com/' 
	        + response.id + '/picture" style="margin-right:5px"/>' 
	        + response.name+ response.email;*/
	    });	   
          } else {
            //user cancelled login or did not grant authorization
          }
        }, {scope:'email'});  	
      }
    }
  }

  // run once with current status and whenever the status changes
  FB.getLoginStatus(updateButton);
  FB.Event.subscribe('auth.statusChange', updateButton);	
};




(function() {
  var e = document.createElement('script'); e.async = true;
  e.src = document.location.protocol 
    + '//connect.facebook.net/en_US/all.js';
  document.getElementById('fb-root').appendChild(e);
}());

</script>
<?php } ?>

<script language="javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }






function insert_this(first_name,last_name,email){
//alert(email);
var uri = '<?php echo $_SERVER['REQUEST_URI'];?>';
var strURL='<?php echo base_url('signup/insert_fbuser');?>?email='+email+'&first_name='+first_name+'&last_name='+last_name;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {	
					    //check if the response is panda
						//alert(req.responseText);			
						if(req.responseText=='1'){
						document.location.href= uri;
						}				
						
					} else {
						//alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}	
}



function delete_ses(){
alert('going to logout');

}
</script>





<script>
$(function(){
	$(window).on('load',function(){
		
	 
	$('.selected .ddlabel').hide();
	$('.selected .fnone').hide();
	});
});
</script>

<script>
$(document).ready(function(){
$("#sdsds").click(function(){
$("#fb-auth").trigger('click');


});
});
</script>







