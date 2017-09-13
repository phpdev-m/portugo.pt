<?php  
$language_data=$this->session->userdata('language');
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
<!--<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.min.js"></script>-->  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.masked-input.js"></script>-->
<!--<script src="js/scrolltopcontrol.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/front/css/dd.css" />
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.dd.js"></script>


<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDkQtOxZKHfcvJtdoYD_X1PflGNbOba_sQ&amp;libraries=places"></script>

<script src="<?php echo base_url();?>public/front/js/jquery.geocomplete.js"></script>
    <script src="<?php echo base_url();?>public/front/js/logger.js"></script>
    
    
    <!--<script>
      $(function(){
        
        $("#geocomplete").geocomplete()
          .bind("geocode:result", function(event, result){
            $.log("Result: " + result.formatted_address);
          })
          .bind("geocode:error", function(event, status){
            $.log("ERROR: " + status);
          })
          .bind("geocode:multiple", function(event, results){
            $.log("Multiple: " + results.length + " results found");
          });
        
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        });
        
        
        $("#examples a").click(function(){
          $("#geocomplete").val($(this).text()).trigger("geocode");
          return false;
        });
        
      });
    </script>-->
    
    
    <script>
      $(function(){
        
        
  var input = document.getElementById('geocomplete');
  var options = {
  types: ['(cities)'],
  componentRestrictions: {country: 'pt'}//Portugal only
  };
  var autocomplete = new google.maps.places.Autocomplete(input,options);
      });
    </script>


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
 
 
 <div class=" main_login_wrapper wrap_margin" >
 
  
   
   <div class=" signup_wrapper">
   <div class="col-md-6 col-md-offset-1">
   <div class="account_head_sign">
    
    <h1><span> <?php echo $this->lang->line('Join Our Growing Family');?></h1>
	</div>
    </div>
   </div>
   
   
   
  <div class="container">
   <div class="row">
   <!--<div class="col-md-6 col-md-offset-3">
   <div class="account_head_sign">
    <h1><span> Join </span><span> Our </span><span> Growing </span><span> Family </span></h1>
    </div>
    </div>-->
   
  
  <?php if($language_data['language']=='english'){?>  
    
    <div class="pc">
    
   <?php 
   $content_data=$this->restaurant_model->get_signup_content();     
   ?> 
    
   <div class="col-md-12 padding_main">   
   
   <div class="col-sm-6">
    <div class="list_group">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="9%" align="left" valign="middle">
    <?php if($content_data['content_image']!=''){ ?>
      <img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_data['content_image']; ?>" style="margin-right:35px; margin-top:60px;"   /><?php } ?></td>
    <td width="91%" valign="top"><h1><?php echo $content_data['content_title']; ?></h1><p style="text-align:left;"><?php echo stripslashes($content_data['content_desc']);?></p>
</td>
  </tr>
</table>
</div>
</div>

<?php 
   $content_dataa=$this->restaurant_model->get_signup_contentt();     
?> 

   <div class="col-sm-6 ">
    <div class="list_group">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="91%" valign="top"><h1><?php echo $content_dataa['content_title']; ?></h1><p style="text-align:left;"><?php echo stripslashes($content_dataa['content_desc']);?></p>
</td>

<td width="9%" align="right" valign="middle">
      <?php if($content_dataa['content_image']!=''){ ?>
      <img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_dataa['content_image']; ?>" style="margin-right:35px; margin-top:60px;"   /><?php } ?></td>
  </tr>
</table>
</div>
</div>


</div>
<div class="clearfix"></div>
<div class="col-md-12 padding_main"> 
   <div class="col-sm-6 ">
    <div class="list_group">
    
<?php 
$content_dataaa=$this->restaurant_model->get_signup_contenttt();     
?> 
   
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="9%" align="left" valign="middle">
      <?php if($content_dataaa['content_image']!=''){ ?>
      <img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_dataaa['content_image']; ?>" style="margin-right:35px; margin-top:60px;"   /><?php } ?></td>
    <td width="91%" valign="top"> <h1><?php echo $content_dataaa['content_title']; ?></h1><p style="text-align:left;"><?php echo stripslashes($content_dataaa['content_desc']);?></p>
</td>
  </tr>
</table>
</div>
</div>

<?php 
$content_data4=$this->restaurant_model->get_signup_contentttt();     
?> 

   <div class="col-sm-6">
    <div class="list_group">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     
    <td width="91%" valign="top"><h1><?php echo $content_data4['content_title']; ?></h1><p style="text-align:left;"><?php echo stripslashes($content_data4['content_desc']);?></p>
</td>

<td width="9%" align="right" valign="middle">
      <?php if($content_data4['content_image']!=''){ ?>
      <img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_data4['content_image']; ?>" style="margin-right:35px; margin-top:60px;"   /><?php } ?></td>
  </tr>
</table>
</div>
</div>
</div>
<div class="clearfix"></div>

<?php 
$content_data5=$this->restaurant_model->get_signup_contenttttt();     
?> 

<div class="col-sm-6 ">
    <div class="list_group">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="9%" valign="middle">
      <img src="<?php echo base_url();?>public/front/images/why_img_blank.png" style="margin-right:35px;margin-top:50px;"   /></td>
    <td width="91%" valign="top"> <h1><?php echo $content_data5['content_title']; ?></h1><p style="text-align:left;padding: 0 30px 0 0;"><?php echo stripslashes($content_data5['content_desc']);?></p>
</td>
  </tr>
</table>
</div>
</div>

<div class="col-sm-6">
    <div class="list_group" style="vertical-align:middle">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     
    <td width="91%" valign="middle" align="center"><?php if($content_data5['content_image']!=''){ ?>
      <img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_data5['content_image']; ?>" style="margin-right:35px; margin-top:60px;"   /><?php } ?>
</td>

<td width="9%" align="right" valign="middle">
      <img src="<?php echo base_url();?>public/front/images/why_img_blank.png" style="margin-right:0px; margin-top:50px; margin-left:33px;"  /></td>
  </tr>
</table>
</div>
</div>

</div>

<?php }else{ ?>

    <div class="pc">
    
   <?php 
   $content_data=$this->restaurant_model->get_signup_content();     
   ?> 
    
   <div class="col-md-12 padding_main">   
   
   <div class="col-sm-6">
    <div class="list_group">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="9%" align="left" valign="middle">
    <?php if($content_data['content_image']!=''){ ?>
      <img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_data['content_image']; ?>" style="margin-right:35px; margin-top:60px;"   /><?php } ?></td>
    <td width="91%" valign="top"><h1><?php echo $content_data['portugoese_content_tittle']; ?></h1><p style="text-align:left;"><?php echo stripslashes($content_data['portugoese_content_desc']);?></p>
</td>
  </tr>
</table>
</div>
</div>

<?php 
   $content_dataa=$this->restaurant_model->get_signup_contentt();     
?> 

   <div class="col-sm-6 ">
    <div class="list_group">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="91%" valign="top"><h1><?php echo $content_dataa['portugoese_content_tittle']; ?></h1><p style="text-align:left;"><?php echo stripslashes($content_dataa['portugoese_content_desc']);?></p>
</td>

<td width="9%" align="right" valign="middle">
      <?php if($content_dataa['content_image']!=''){ ?>
      <img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_dataa['content_image']; ?>" style="margin-right:35px; margin-top:60px;"   /><?php } ?></td>
  </tr>
</table>
</div>
</div>


</div>
<div class="clearfix"></div>
<div class="col-md-12 padding_main"> 
   <div class="col-sm-6 ">
    <div class="list_group">
    
<?php 
$content_dataaa=$this->restaurant_model->get_signup_contenttt();     
?> 
   
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="9%" align="left" valign="middle">
      <?php if($content_dataaa['content_image']!=''){ ?>
      <img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_dataaa['content_image']; ?>" style="margin-right:35px; margin-top:60px;"   /><?php } ?></td>
    <td width="91%" valign="top"> <h1><?php echo $content_dataaa['portugoese_content_tittle']; ?></h1><p style="text-align:left;"><?php echo stripslashes($content_dataaa['portugoese_content_desc']);?></p>
</td>
  </tr>
</table>
</div>
</div>

<?php 
$content_data4=$this->restaurant_model->get_signup_contentttt();     
?> 

   <div class="col-sm-6">
    <div class="list_group">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     
    <td width="91%" valign="top"><h1><?php echo $content_data4['portugoese_content_tittle']; ?></h1><p style="text-align:left;"><?php echo stripslashes($content_data4['portugoese_content_desc']);?></p>
</td>

<td width="9%" align="right" valign="middle">
      <?php if($content_data4['content_image']!=''){ ?>
      <img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_data4['content_image']; ?>" style="margin-right:35px; margin-top:60px;"   /><?php } ?></td>
  </tr>
</table>
</div>
</div>
</div>
<div class="clearfix"></div>

<?php 
$content_data5=$this->restaurant_model->get_signup_contenttttt();     
?> 

<div class="col-sm-6 ">
    <div class="list_group">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="9%" valign="middle">
      <img src="<?php echo base_url();?>public/front/images/why_img_blank.png" style="margin-right:35px;margin-top:50px; max-width:100%"   /></td>
    <td width="91%" valign="top"> <h1><?php echo $content_data5['portugoese_content_tittle']; ?></h1><p style="text-align:left;padding: 0 30px 0 0;"><?php echo stripslashes($content_data5['portugoese_content_desc']);?></p>
</td>
  </tr>
</table>
</div>
</div>

<div class="col-sm-6">
    <div class="list_group" style="vertical-align:middle">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     
    <td width="91%" valign="middle" align="center"><?php if($content_data5['content_image']!=''){ ?>
      <img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_data5['content_image']; ?>" style="margin-right:35px; margin-top:60px;"   /><?php } ?>
</td>

<td width="9%" align="right" valign="middle">
      <img src="<?php echo base_url();?>public/front/images/why_img_blank.png" style="margin-right:0px; margin-top:50px; margin-left:33px;"  /></td>
  </tr>
</table>
</div>
</div>

</div>

<?php } ?>


<?php if($language_data['language']=='english'){?>

<div class="mobile">

<?php 
$content_data=$this->restaurant_model->get_signup_content();     
?> 
    
   <div class="col-sm-6">
    <div class="list_group_mobile1">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <td width="100%" valign="top">
    <h1><?php echo $content_data['content_tittle']; ?> </h1>
    <p><center><?php if($content_data['content_image']!=''){ ?><img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_data['content_image']; ?>"  /><?php } ?> </center></p>
    <p style="text-align:left;"><?php echo stripslashes($content_data['content_desc']);?></p>
</td>
  </tr>
</table>
</div>
</div>

<?php 
$content_dataa=$this->restaurant_model->get_signup_contentt();     
?>

   <div class="col-sm-6 ">
    <div class="list_group_mobile2">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" valign="top"><h1><?php echo $content_dataa['content_tittle']; ?></h1>
    
     <p style="text-align:left;"><center><?php if($content_dataa['content_image']!=''){ ?><img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_dataa['content_image']; ?>"  /><?php } ?> </center></p>
    <p><?php echo stripslashes($content_dataa['content_desc']);?></p>
</td>


  </tr>
</table>
</div>
</div>

<?php 
$content_dataaa=$this->restaurant_model->get_signup_contenttt();     
?>

   <div class="col-sm-6 ">
    <div class="list_group_mobile3">
   
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td width="100%" valign="top"> <h1><?php echo $content_dataaa['content_tittle']; ?></h1>
    <p><center><?php if($content_dataaa['content_image']!=''){ ?><img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_dataaa['content_image']; ?>"   /><?php } ?> </center></p>
    <p style="text-align:left;"><?php echo stripslashes($content_dataaa['content_desc']);?></p>
</td>
  </tr>
</table>
</div>
</div>

<?php 
$content_data4=$this->restaurant_model->get_signup_contentttt();     
?>

   <div class="col-sm-6">
    <div class="list_group_mobile4">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     
    <td width="100%" valign="top"><h1><?php echo $content_data4['content_tittle']; ?></h1>
    
    <p><center><?php if($content_data4['content_image']!=''){ ?><img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_data4['content_image']; ?>"  /><?php } ?> </center></p>
    <p style="text-align:left;"><?php echo stripslashes($content_data4['content_desc']);?></p>
</td>


  </tr>
</table>
</div>
</div>

<?php 
$content_data5=$this->restaurant_model->get_signup_contenttttt();     
?>

 <div class="col-sm-6 col-sm-offset-3">
    <div class="list_group_mobile5">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td width="100%" valign="top"> <h1><?php echo $content_data5['content_tittle']; ?></h1>
    <p><center><?php if($content_data5['content_image']!=''){ ?><img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_data5['content_image']; ?>" style="max-width:100%"   /><?php } ?></center></p>
    <p style="text-align:left; padding: 0 30px 0 0;"><?php echo stripslashes($content_data5['content_desc']);?></p>
</td>
  </tr>
</table>
</div>
</div>

</div>

<?php }else{ ?>

<div class="mobile">

<?php 
$content_data=$this->restaurant_model->get_signup_content();     
?> 
    
   <div class="col-sm-6">
    <div class="list_group_mobile1">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <td width="100%" valign="top">
    <h1><?php echo $content_data['portugoese_content_tittle']; ?> </h1>
    <p><center><?php if($content_data['content_image']!=''){ ?><img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_data['content_image']; ?>"   /><?php } ?> </center></p>
    <p style="text-align:left;"><?php echo stripslashes($content_data['portugoese_content_desc']);?></p>
</td>
  </tr>
</table>
</div>
</div>

<?php 
$content_dataa=$this->restaurant_model->get_signup_contentt();     
?>

   <div class="col-sm-6 ">
    <div class="list_group_mobile2">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" valign="top"><h1><?php echo $content_dataa['portugoese_content_tittle']; ?></h1>
    
     <p style="text-align:left;"><center><?php if($content_dataa['content_image']!=''){ ?><img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_dataa['content_image']; ?>"  /><?php } ?> </center></p>
    <p><?php echo stripslashes($content_dataa['portugoese_content_desc']);?></p>
</td>


  </tr>
</table>
</div>
</div>

<?php 
$content_dataaa=$this->restaurant_model->get_signup_contenttt();     
?>

   <div class="col-sm-6 ">
    <div class="list_group_mobile3">
   
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td width="100%" valign="top"> <h1><?php echo $content_dataaa['portugoese_content_tittle']; ?></h1>
    <p><center><?php if($content_dataaa['content_image']!=''){ ?><img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_dataaa['content_image']; ?>"   /><?php } ?> </center></p>
    <p style="text-align:left;"><?php echo stripslashes($content_dataaa['portugoese_content_desc']);?></p>
</td>
  </tr>
</table>
</div>
</div>

<?php 
$content_data4=$this->restaurant_model->get_signup_contentttt();     
?>

   <div class="col-sm-6">
    <div class="list_group_mobile4">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
     
    <td width="100%" valign="top"><h1><?php echo $content_data4['portugoese_content_tittle']; ?></h1>
    
    <p><center><?php if($content_data4['content_image']!=''){ ?><img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_data4['content_image']; ?>"  /><?php } ?> </center></p>
    <p style="text-align:left;"><?php echo stripslashes($content_data4['portugoese_content_desc']);?></p>
</td>


  </tr>
</table>
</div>
</div>

<?php 
$content_data5=$this->restaurant_model->get_signup_contenttttt();     
?>

 <div class="col-sm-6 col-sm-offset-3">
    <div class="list_group_mobile5">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td width="100%" valign="top"> <h1><?php echo $content_data5['portugoese_content_tittle']; ?></h1>
    <p><center><?php if($content_data5['content_image']!=''){ ?><img src="<?php echo base_url();?>image_gallery/content_image/<?php echo $content_data5['content_image']; ?>" style="max-width:100%"/><?php } ?></center></p>
    <p style="text-align:left; padding: 0 30px 0 0;"><?php echo stripslashes($content_data5['portugoese_content_desc']);?></p>
</td>
  </tr>
</table>
</div>
</div>

</div>

<?php } ?>

<div class="clearfix"></div>
<div>
    <div class="list_group" style="margin:0px 0px 25px 0px;">
    <center><a href="#" data-target="#myModal_signup" data-toggle="modal"><button class="btn_login" type="submit" style="margin: 50px 0px 0px 0px; width:190px;"><?php echo $this->lang->line('Register Interest');?></button></a></center>
</div>
</div>


<div >
    <center><h3><strong><?php echo $this->lang->line('OR');?></strong></h3></center>
</div>
</div>


<div >
   <div class="message_head">
      <h1 ><a href="javascript:void(0)" style="color:#e81d25" class="mess_btn"><?php echo $this->lang->line('Ask Us a Question');?></a></h1>
     </div>
</div>
</div>

     <div class="col-md-8 col-md-offset-2 send_mass" style="display:none" >
     <div class="col-md-8" style="height:30px;">
     <p class="inpu_text2 error-red" style="padding-bottom:30px; color:#FF0000; display:none;"><?php echo $this->lang->line('Please fill in the required fields');?> <span style="color:#F00">*</span></p>
     </div>
     
     <div class="col-sm-6 " >
     
     <form id="registerForm" class="form-horizontal" name="register-form">
  <div class="form-group has-feedback">
  <div class="col-lg-12">
  <p class="inpu_text2"><?php echo $this->lang->line('First Name');?> <span style="color:#F00">*</span></p>
<input id="firstname_msg" class="form-control2" type="text" placeholder="" >
</div>
</div>

<div class="form-group has-feedback">
<div class="col-lg-12">
<p class="inpu_text2"><?php echo $this->lang->line('Last Name');?> <span style="color:#F00">*</span></p>
<input id="lastname_msg" class="form-control2" type="text" placeholder="" >
</div>
</div>


<div class="form-group has-feedback">
<div class="col-lg-12">
<p class="inpu_text2"><?php echo $this->lang->line('Email');?> <span style="color:#F00">*</span></p>
<input id="email_msg" class="form-control2" type="text" placeholder="" >
</div>
</div>
</form>
     </div>
     
     
     
     <div class="col-sm-6 " >
      
     <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form">
  <div class="form-group has-feedback">
<div class="col-lg-12">
<p class="inpu_text2"><?php echo $this->lang->line('Initial Question');?> </p>
<textarea  class="form-control" id="msg_msg" placeholder="" style="height:175px;"></textarea>
</div>
</div>

<div class="form-group">
<div class=" col-lg-12" style=" margin-top:0px;">
<a href="#" data-target="" id="send_msg" data-toggle="modal">
<button class="btn_login pull-right message_send" type="submit" style="padding:10px 0px; width:140px; font-size:16px;margin: 0px 0 40px;"><?php echo $this->lang->line('Send Message');?></button>
</a>
 </div>
</div>

</form>
     </div>
     </div>

   </div>
        </div>
    </div>
	<style>
	.error{border:1px #FF0000 solid;}
	</style>
	<script>
	$(function(){
	  $('.message_send').on('click',function(){
	     var firstname = $('#firstname_msg').val();
		 var lastname = $('#lastname_msg').val();
		 var email = $('#email_msg').val();
		 var msg = $('#msg_msg').val();
		 var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 if(firstname==''){
		 $('#firstname_msg').addClass('error');
		 $('#lastname_msg').removeClass('error');
		 $('#email_msg').removeClass('error');
		 $('#msg_msg').removeClass('error');
		 $('.error-red').show();
		 }else if(lastname==''){
		 $('#lastname_msg').addClass('error');
		 $('#firstname_msg').removeClass('error');
		 $('#email_msg').removeClass('error');
		 $('#msg_msg').removeClass('error');
		 $('.error-red').show();
		 }else if(email==''){
		 $('#email_msg').addClass('error');
		 $('#lastname_msg').removeClass('error');
		 $('#firstname_msg').removeClass('error');
		 $('#msg_msg').removeClass('error');
		 $('.error-red').show();
		 }else if(email!='' && (!regex.test(email))){
	     $('#email_msg').addClass('error');
		 $('#lastname_msg').removeClass('error');
		 $('#firstname_msg').removeClass('error');
		 $('#msg_msg').removeClass('error');
		 $('.error-red').show();
	     }else if(msg==''){
		 $('#msg_msg').addClass('error');
		 $('#lastname_msg').removeClass('error');
		 $('#firstname_msg').removeClass('error');
		 $('#email_msg').removeClass('error');
		 $('.error-red').show();
		 }else{
		 
		 $('#msg_msg').removeClass('error');
		 $('#lastname_msg').removeClass('error');
		 $('#firstname_msg').removeClass('error');
		 $('#email_msg').removeClass('error');
		 $('.send_mass').hide();
		 $('#send_msg').attr('data-target','#myModal_signup_mass');
		 $('.error-red').hide();
		 $(this).trigger('click');
		 
		 }
	  });
	});
	</script>
    
    
<div class="clearfix"></div>
 <?php $this->load->view('segment/footer');?>
 
 
</body>
</html>

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





<div class="modal fade" id="myModal_signup_mass" tabindex="-1" role="dialog" >
  <div class="modal-dialog2" role="document">
   <div class="modal-body ">
       <div class="col-md-12 login_header" >
       
      <center><h2> Thank you for contacting us!</h2> </center>
      <center><h4 style="margin:20px 0px 40px 0px"> We will get back to you shortly</h4></center> 
       </div>

      </div>
  </div>
</div>




<div class="modal fade" id="myModal_signup" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
   <div class="modal-body ">
       <div class="col-md-12 login_header" >
         <h2 class="login_head" ><?php echo $this->lang->line('Sign Up My Restaurant');?></h2>
         
         <?php if(isset($exist_error)) {?><div class="error"><button type="button" class="close">×</button><?php echo $exist_error; ?></div><?php } ?>
         
         <form id="registerForm" action="<?php echo base_url('restaurant_signup/add_restaurant'); ?>" method="post" class="form-horizontal bv-form" name="register-form" role="form" onSubmit="return check_blank()">
         
         <div class="form-group has-feedback" >
           <div class="col-lg-6" >
            <p class="inpu_text2"><?php echo $this->lang->line('Name');?></p>
             <input type="text" name="contact_name" id="contact_name" placeholder="" autocomplete="off" class="form-control2">
             <span id="cname_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Enter Your Name');?></i></span>
             
             
          </div>
          <div class="col-lg-6">
          <p class="inpu_text2 input_mar"><?php echo $this->lang->line('Email');?></p>
             <input type="text" name="email" id="contact_email" placeholder="" autocomplete="off" class="form-control2" onblur="check_email();">
             <span id="contact_email_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Enter Your Email Id');?></i></span>
             <span id="validemail_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Enter Valid Email Id');?></i></span>
             
             <span id="email_exist_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('This email already exists in the current database');?>.</span>             
          </div>
         </div>
        
         
         <div class="form-group has-feedback">
           <div class="col-lg-12">
           <p class="inpu_text2"><?php echo $this->lang->line('Phone Number');?></p>
             <input type="text" name="phone" id="phone" placeholder="" autocomplete="off" class="form-control2">
             <span id="phone_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Enter Phone Number');?></i></span>
             <span id="phone_numeric_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Enter Numeric Value');?></i></span>
             <span id="phone_digit_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Enter 8 Characters');?></i></span>
          </div>
         </div>
         
         <div class="form-group has-feedback">
           <div class="col-lg-12">
           <p class="inpu_text2"><?php echo $this->lang->line('Restaurant Name');?></p>
             <input type="text" name="rest_name" id="rest_name" placeholder="" autocomplete="off" class="form-control2">
             <span id="rest_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please enter name of restaurant');?></i></span>
          </div>
         </div>
         
         
            
           <div class="form-group has-feedback">
           <div class="col-lg-12">
           <p class="inpu_text2"><?php echo $this->lang->line('Restaurant Phone Number');?></p>
             <input type="text" name="rest_phone" id="rest_phone" placeholder="" autocomplete="off" class="form-control2">
             <span id="rest_phone_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Enter Restaurant Phone Number');?></i></span>
             <span id="prest_numeric_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Enter Numeric Value');?></i></span>
             <span id="prest_digit_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Enter 10 Characters');?></i></span>
          </div>
         </div>
         
         
         
         <div class="form-group has-feedback">
           <div class="col-lg-12">
           <p class="inpu_text2"><?php echo $this->lang->line('Restaurant Address');?></p>
             <input type="text" name="rest_address" id="geocomplete" placeholder="" class="form-control2">
             <span id="rest_address_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Enter Restaurant Address');?></i></span>
          </div>
         </div>
            
            
            <div class="form-group has-feedback">
           <div class="col-lg-6">
             <p class="inpu_text2"><?php echo $this->lang->line('City');?></p>
             <select class="form-control2" name="city" id="city" ><option value="">City</option>
             <option value="Braga">Braga</option>
             <option value="Coímbra">Coímbra</option>
             <option value="Amadora">Amadora</option>
             <option value="Lisboa">Lisboa</option>
             <option value="Stockholm">Stockholm</option>
             <option value="Porto">Porto</option>             
             </select>
             
			 <span id="city_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Select City');?></i></span>             
          </div>
          <div class="col-lg-6">
          <p class="inpu_text2 input_mar"><?php echo $this->lang->line('Postcode');?></p>
             <input type="text" name="postcode" id="postcode" placeholder="" data-masked-input="9999-999" maxlength="8" autocomplete="off" class="form-control2">
        <span id="postcode_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Enter Postcode');?></i></span>
        <!--<span id="postcode_numeric_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i>Postcode should be Numeric</i></span>
        <span id="postcode_digit_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i>Postcode should be 6 Digits</i></span> -->       

          </div>
         </div>
             
            
            
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="8%" valign="top" height="60">
    
    <div class="form-group has-feedback">
     <div class="col-lg-12">
      <div class="checkbox checkbox-primary">      
                        <input id="privacy_policy" class="styled" type="checkbox" >
                        <label for="privacy_policy">
                        </label>
                      
                    </div>
                    </div>
                    
           </div>
      </td>
     <td width="92%" valign="top"  height="60"><p style="margin-top:4px;"><?php echo $this->lang->line('Yes, I understand and agree to the');?> <strong>PortuGo Takeaway </strong> <a href="<?php echo base_url('page/term_condition'); ?>"><?php echo $this->lang->line('Terms of     Service');?></a> <?php echo $this->lang->line('and');?> <a href="<?php echo base_url('page/privacy_policy'); ?>"><?php echo $this->lang->line('Privacy Policy');?></a>.</p></td>
    </tr>
    <span id="privacy_policy_error" class="error-ok" style="color:#FF0000; display:none;font-style:normal"><i><?php echo $this->lang->line('Please Checked Privacy');?></i></span>
  </table>

               

          <div class="form-group">
          <div class="col-lg-12">
          <center><button class="btn_login check_mail" type="submit" name="submit" style="margin: 0 0 10px; width:190px;"><?php echo $this->lang->line('Register Interest');?></button></center>
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
	$('#msg_msg').val('');
		 $('#lastname_msg').val('');
		 $('#firstname_msg').val('');
		 $('#email_msg').val('');
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

  function check_blank()
  {	 
	  
    var contactName=document.getElementById("contact_name").value;
	   if(contactName=="")
	   {	    
		   		   
		   hideAllErrorscheck_blank();
		   document.getElementById('cname_error').style.display="inline";
		   document.getElementById('contact_name').focus();
		   return false;
		   
	   }
	   
	   
	var contactEmail=document.getElementById("contact_email").value;
	   if(contactEmail=="")
	   {
		   
		   hideAllErrorscheck_blank();
		   document.getElementById('contact_email_error').style.display="inline";
		   document.getElementById('contact_email').focus();
		   return false;
		   
	   }
	 var emailspec= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		 if(contactEmail.match(emailspec))
		 {
			 
		 /*$.ajax({
			type : "POST",
			url : "<?php echo base_url('restaurant_signup/check_email');?>",
			data: {contactEmail:contactEmail},
			success:function(data){
				//alert(email);return false;
				if(data>0)
				{
				$("#email_exist_error").show();
				return false;
				}
			
			}
		});*/
		 
		 }else
		 {
			  hideAllErrorscheck_blank();
			  document.getElementById("validemail_error").style.display="inline";
			  document.getElementById("contact_email").focus();
			  return false;
		 }
		 
		 
		 
     var phoneNumber=document.getElementById("phone").value;
	   if(phoneNumber=="")
	   {
		   
		   hideAllErrorscheck_blank();
		   document.getElementById('phone_error').style.display="inline";
		   document.getElementById('phone').focus();
		   return false;
		   
	   }
	   
	   if(isNaN(phoneNumber)||phoneNumber.indexOf(" ")!=-1)
           {
             
  		   hideAllErrorscheck_blank();
		   document.getElementById('phone_numeric_error').style.display="inline";
		   document.getElementById('phone').focus();
		   return false;
			   
           }
           if (phoneNumber.length<8)
           {
                
		   hideAllErrorscheck_blank();
		   document.getElementById('phone_digit_error').style.display="inline";
		   document.getElementById('phone').focus();
		   return false;

           }
           	   
	   	   	   
	 var restName=document.getElementById("rest_name").value;
	   if(restName=="")
	   {
		   
		   hideAllErrorscheck_blank();
		   document.getElementById('rest_error').style.display="inline";
		   document.getElementById('rest_name').focus();
		   return false;
		   
	   }
	   
	   
	 var restPhone=document.getElementById("rest_phone").value;
	   if(restPhone=="")
	   {
		   
		   hideAllErrorscheck_blank();
		   document.getElementById('rest_phone_error').style.display="inline";
		   document.getElementById('rest_phone').focus();
		   return false;
		   
	   }
	   
	   
	   if(isNaN(restPhone)||restPhone.indexOf(" ")!=-1)
           {
             
  		   hideAllErrorscheck_blank();
		   document.getElementById('prest_numeric_error').style.display="inline";
		   document.getElementById('rest_phone').focus();
		   return false;
			   
           }
           if (restPhone.length<10)
           {
                
		   hideAllErrorscheck_blank();
		   document.getElementById('prest_digit_error').style.display="inline";
		   document.getElementById('rest_phone').focus();
		   return false;

           }
	   
	   
	 var restAddress=document.getElementById("geocomplete").value;
	   if(restAddress=="")
	   {
		   
		   hideAllErrorscheck_blank();
		   document.getElementById('rest_address_error').style.display="inline";
		   document.getElementById('geocomplete').focus();
		   return false;
		   
	   }
	   
	   
	   
   var restCity=document.getElementById("city").value;
	   if(restCity=="")
	   {
		   
		   hideAllErrorscheck_blank();
		   document.getElementById('city_error').style.display="inline";
		   document.getElementById('city').focus();
		   return false;
		   
	   }

  var postcode=document.getElementById("postcode").value;
	   if(postcode=="")
	   {
		   
		   hideAllErrorscheck_blank();
		   document.getElementById('postcode_error').style.display="inline";
		   document.getElementById('postcode').focus();
		   return false;
		   
	   }
	   	   
  var privacy=document.getElementById("privacy_policy").checked;
	   if(privacy=="")
	   {
		   
		   hideAllErrorscheck_blank();
		   document.getElementById('privacy_policy_error').style.display="inline";
		   document.getElementById('privacy_policy').focus();
		   return false;
		   
	   }
	  
	    
  }
  
  
  function hideAllErrorscheck_blank()
{
	
	document.getElementById("cname_error").style.display="none";
	document.getElementById("contact_email_error").style.display="none";
	document.getElementById("validemail_error").style.display="none";
	document.getElementById("phone_error").style.display="none";
	document.getElementById("phone_numeric_error").style.display="none";
	document.getElementById("phone_digit_error").style.display="none";	
	document.getElementById("rest_error").style.display="none";	
	document.getElementById("rest_phone_error").style.display="none";
	document.getElementById("privacy_policy_error").style.display="none";
	document.getElementById("prest_numeric_error").style.display="none";	
	document.getElementById("rest_address_error").style.display="none";
	document.getElementById("prest_digit_error").style.display="none";	
	document.getElementById("city_error").style.display="none";
	document.getElementById("postcode_error").style.display="none";	
		
}


</script>

<script>

function check_email()
{

	var email=$("#contact_email").val();
	
	//alert(email);return false;
	
	$.ajax({
			type : "POST",
			url : "<?php echo base_url('restaurant_signup/check_email');?>",
			data: {email:email},
			success:function(data){
				//alert(email);return false;
				if(data>0)
				{
				$("#email_exist_error").show();
				return false;
				}
				else
				{
				$("#email_exist_error").hide();
				}	
			}
		});
	
}

</script>



<style>
p{text-align:left !important;}
#mycomp_child{
height:90px!important;}

#mycomp1_child{ margin-left: -6px;
    margin-top: 25px;}
	
	.pac-container {position:relative; z-index:999999999999 !important;}

</style>

<style>
.error {
    color: #D8000C;
    background-color: #FCD0D0/*FFBABA*/;
    border: 1px solid #EDB5B5;
    background-image: url(error.png);
}
.info, .success, .warning, .error, .validation {
    border: 0px solid;
    margin: 10px 0px;
    padding: 15px 10px 15px 20px;
    background-repeat: no-repeat;
    background-position: 10px center;
    border-radius: 5px;
}
</style>
