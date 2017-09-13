<?php
error_reporting(0);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title><?php echo $title; ?> | Admin Panel | Add Restaurant Owner</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo base_url('public/admin/assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/admin/assets/plugins/bootstrap/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/admin/assets/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/admin/assets/css/style-metro.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/admin/assets/css/style.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/admin/assets/css/style-responsive.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/admin/assets/css/themes/default.css'); ?>" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url('public/admin/assets/plugins/uniform/css/uniform.default.css'); ?>" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/assets/plugins/select2/select2_metro.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/admin/assets/plugins/data-tables/DT_bootstrap.css'); ?>" />
<!-- END PAGE LEVEL STYLES -->
<link rel="shortcut icon" href="favicon.ico" />
<script type="text/javascript" src="<?php echo base_url('public/admin/assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/admin/assets/scripts/jquery-ui.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('public/admin/assets/css/jquery-ui.min.css'); ?>" type="text/css" rel="stylesheet" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->   
<?php $this->load->view('admin/segments/header');?>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
<!-- BEGIN SIDEBAR -->
<?php $this->load->view('admin/segments/sidebar');?>
<!-- END SIDEBAR -->
<!-- BEGIN PAGE -->
<div class="page-content">
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div id="portlet-config" class="modal hide">
<div class="modal-header">
<button data-dismiss="modal" class="close" type="button"></button>
<h3>portlet Settings</h3>
</div>
<div class="modal-body">
<p>Here will be a configuration form</p>
</div>
</div>
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN PAGE CONTAINER-->        
<div class="container-fluid">
<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
<div class="span12">
<!-- BEGIN STYLE CUSTOMIZER -->

<!-- END BEGIN STYLE CUSTOMIZER -->  
<!-- BEGIN PAGE TITLE & BREADCRUMB-->
<h3 class="page-title">
Add Restaurant Owner 
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
<i class="icon-angle-right"></i>
</li>

<li><a href="<?php echo base_url('admin/member/restaurant_owner'); ?>">Manage Restaurant Owner </a>

</li>

</ul>
<!-- END PAGE TITLE & BREADCRUMB-->
</div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->

<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN VALIDATION STATES-->
						<div class="portlet box red">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>Add Restaurant Owner</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
                                                  
							<div class="portlet-body form">
                                                          <form action="<?php echo base_url('admin/member/add_restaurant_owner'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
                                                                <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									<div class="control-group">
										<label class="control-label">First Name<span class="required">*</span></label>
										<div class="controls">
											<input id="name" class="m-wrap span4" type="text" value="<?php echo $this->input->post('first_name');?>" name="first_name"/>
										</div>
									</div>
                                        
										<div class="control-group">
										<label class="control-label">Last Name<span class="required">*</span></label>
										<div class="controls">
											<input id="name" class="m-wrap span4" value="<?php echo $this->input->post('last_name');?>" type="text" name="last_name"/>
										</div>
									</div>                            
									
                                                                    <div class="control-group">
										<label class="control-label">Email<span class="required">*</span></label>
										<div class="controls">
											<input type="email" class="m-wrap span4" value="<?php echo $this->input->post('email');?>" name="email" id="email" />
										</div>
									</div>
									 <div class="control-group">
										<label class="control-label">Password<span class="required">*</span></label>
										<div class="controls">
											<input type="password" class="m-wrap span4" value="<?php echo $this->input->post('password');?>" name="password" id="password" />
										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Profile Image<span class="required">*</span></label>
										<div class="controls">
											<input id="cat_image" class="m-wrap span4" value="" type="file" name="file"/>
										</div>
									</div>
                                    
                                    
                                    
									 <div class="control-group">
										<label class="control-label">Phone<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" maxlength="13" value="<?php echo $this->input->post('phone');?>" name="phone" id="phone" />
										</div>
									</div>
                                    
                                     <div class="control-group">
										<label class="control-label">Restaurant Name<span class="required">*</span></label>
										<div class="controls">
											<input id="restaurant_name" class="m-wrap span4" value="<?php echo $this->input->post('cat_name');?>" type="text" name="restaurant_name"/>
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label">Restaurant Phone Number<span class="required">*</span></label>
										<div class="controls">
											<input id="restaurant_phone" class="m-wrap span4" value="<?php echo $this->input->post('cat_name');?>" type="text" name="restaurant_phone"/>
										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Restaurant Address<span class="required">*</span></label>
										<div class="controls">
											<input id="restaurant_address" class="m-wrap span4" value="<?php echo $this->input->post('cat_name');?>" type="text" name="restaurant_address"/>
										</div>
									</div>
                                    
                                    
                                    
									 <!--<div class="control-group">
										<label class="control-label">Date of birth<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" autocomplete="off" value="<?php echo $this->input->post('dob');?>" name="dob" id="datepicker" />
										</div>
									</div>-->
                                                                  
									<?php
									$all_country = $this->member_model->country();
									//print_r($all_country);
									?>
									<div class="control-group">
										<label class="control-label">Country<span class="required">*</span></label>
										<div class="controls">
										<select class="m-wrap span4 country" name="country" id="country">
										<option value="" >Country</option>
										<?php
										foreach($all_country as $country_all){?>
										<option <?php if($this->input->post('country')==$country_all['id']){echo 'selected="selected"';}?> value="<?php echo $country_all['id'];?>"><?php echo ucfirst($country_all['countryname']);?></option>
										<?php } ?>
										</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">City<span class="required">*</span></label>
										<div class="controls">
									<select class="m-wrap span4 city" name="city">
									<option value="">City</option>
									<?php
									$state = $this->member_model->get_state($this->input->post('country'));
									print_r($state);
									foreach ($state as $key => $pks) {
									
									$city = $this->member_model->get_city($pks['id']);
									
									foreach ($city as $key => $pks1) {?>
									<option value='<?php echo $pks1['id'];?>' <?php if($pks1['id']==$this->input->post('city')){echo 'selected="selected"';}?> ><?php echo utf8_decode($pks1['countryname']);?></option>
									<?php
									}
									}
									?>
									</select>
										</div>
									</div>
                                     
									  <!--<div class="control-group">
										<label class="control-label">Address<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" autocomplete="off" value="<?php echo $this->input->post('address');?>" name="address" id="address" />
										</div>
									</div>-->  
									
									 <div class="control-group">
										<label class="control-label">Postcode<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" maxlength="6" autocomplete="off" value="<?php echo $this->input->post('zip_code');?>" name="zip_code" id="zip_code" />
										</div>
									</div>
									 
                                     <!--<div class="control-group">
										<label class="control-label">Restaurant Name<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" autocomplete="off" value="<?php echo $this->input->post('restaurant_name');?>" name="restaurant_name" id="restaurant_name" />
										</div>
									</div>  -->                           
                 
               
									<div class="control-group">
										<label class="control-label">Status<span class="required">*</span></label>
										<div class="controls">
											<select class="m-wrap span4" name="status">
											<option value="">--Select Status--</option>
											<option value="1">Active</option>
											<option value="0">Inactive</option>
											</select>
										</div>
									    </div>
									<div class="form-actions">
										
                                    <input type="submit" name="submit" class="btn green" value="Add Restaurant Owner">
										
									</div>
								</form>
								<!-- END FORM-->
							</div>
                                                    
							</div>
                                                      
						</div>
					</div>
				</div>


<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view('admin/segments/footer');?>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->  <script src="<?php echo base_url('public/admin/assets/plugins/jquery-1.10.1.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/admin/assets/plugins/jquery-migrate-1.2.1.min.js'); ?>" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url('public/admin/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js'); ?>" type="text/javascript"></script>      
<script src="<?php echo base_url('public/admin/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/admin/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js'); ?>" type="text/javascript" ></script>
<!--[if lt IE 9]>
<script src="<?php echo base_url('public/admin/assets/plugins/excanvas.min.js'); ?>"></script>
<script src="<?php echo base_url('public/admin/assets/plugins/respond.min.js'); ?>"></script>  
<![endif]-->   
<script src="<?php echo base_url('public/admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/admin/assets/plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>  
<script src="<?php echo base_url('public/admin//plugins/jquery.cookie.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/admin//plugins/uniform/jquery.uniform.min.js'); ?>" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/select2/select2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin//plugins/data-tables/DT_bootstrap.js'); ?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url('public/admin/assets/scripts/app.js'); ?>"></script>
<script src="<?php echo base_url('public/admin/assets/scripts/table-editable.js'); ?>"></script> 
<script src="<?php echo base_url('public/admin/assets/scripts/jquery-ui.min.js'); ?>"></script> 
<link href="<?php echo base_url('public/admin/assets/css/jquery-ui.css'); ?>" type="text/css" rel="stylesheet" />    
<script>
jQuery(document).ready(function() {       
App.init();
TableEditable.init();
});
</script>
<script>
$(function() {
$( "#datepicker" ).datepicker({ 
  changeMonth: true,
  changeYear: true,
  dateFormat: 'yy-mm-dd'});
});
</script>

<script>
$(document).ready(function(){

$(document).on('change','.country',function(){
var country_id= $('.country').val();
  //alert(country_id); return false;	
  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>admin/member/get_state",
            data: { country_id:country_id},
            success: function(msg){
     					//alert(msg); return false;						
				$('.city').html(msg);   						
            }
			});
			});
			});
			</script>

<script>
$(document).ready(function() {
    $("#zip_code").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>









<!--<img src="../../../../public/admin/assets/img/calendar.gif">-->

</body>
<!-- END BODY -->
</html>