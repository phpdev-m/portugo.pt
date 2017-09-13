<?php
error_reporting(0);
$session_data=$this->session->userdata('restaurant_logged_in');		    
$rest_id=$session_data['id'];
$getid = $this->uri->segment(4);
$restaurant_name = $this->restaurant_model->get_restaurant_detail($rest_id);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title><?php echo $title; ?> | Restaurant Category</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo base_url('public/restaurant/assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/restaurant/assets/plugins/bootstrap/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/restaurant/assets/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/restaurant/assets/css/style-metro.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/restaurant/assets/css/style.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/restaurant/assets/css/style-responsive.css'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/restaurant/assets/css/themes/default.css'); ?>" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url('public/restaurant/assets/plugins/uniform/css/uniform.default.css'); ?>" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/restaurant/assets/plugins/select2/select2_metro.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/restaurant/assets/plugins/data-tables/DT_bootstrap.css'); ?>" />
<!-- END PAGE LEVEL STYLES -->
<link rel="shortcut icon" href="favicon.ico" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('public/restaurant/assets/scripts/jquery.masked-input.js'); ?>"></script>

<script src="<?php echo base_url('public/restaurant/assets/scripts/jquery-ui.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('public/restaurant/assets/css/jquery-ui.min.css'); ?>" type="text/css" rel="stylesheet" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->   
<?php $this->load->view('restaurant/segments/header');?>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
<!-- BEGIN SIDEBAR -->
<?php $this->load->view('restaurant/segments/sidebar');?>
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
<?php echo $this->lang->line('Rest_Edit'); ?> <?php echo $this->lang->line('Rest_Account'); ?>
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="<?php echo base_url('restaurant/dashboard'); ?>"><?php echo $this->lang->line('Home'); ?></a> 
<i class="icon-angle-right"></i>
</li>

<li><a href="<?php echo base_url('restaurant/restaurant/edit_restaurant/'.$getid); ?>"><?php echo $this->lang->line('Rest_Account'); ?></a>

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
								<div class="caption"><i class="icon-reorder"></i><?php echo $this->lang->line('Rest_Edit'); ?> <?php echo $this->lang->line('Rest_Account'); ?></div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
                                                  
							<div class="portlet-body form" id="cont_tbl" style="overflow:hidden;">
                            <div class="span6">
                        <form action="<?php echo base_url('restaurant/restaurant/edit_restaurant/'.$getid.''); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
                                                                <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									                                   
                                    
										<strong><span style="margin-left:15px;"><?php echo $this->lang->line('Rest_Responsible_Person'); ?>: </span></strong>									
									
                                    
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Contact_Name'); ?></label>
										<div class="controls">
											<input id="cname" class="m-wrap span10" value="<?php echo ucfirst($restaurant_name['contact_name']); ?>" type="text" name="cname"/>
										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Contact Phone </label>
										<div class="controls">
											<input id="phone" class="m-wrap span10" value="<?php echo $restaurant_name['contact_phone']; ?>" type="text" name="phone"/>
										</div>
									</div>                                                    
                                    
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Contact_Email'); ?> </label>
										<div class="controls">
										  <input id="email" class="m-wrap span10" value="<?php echo $restaurant_name['contact_email']; ?>" type="text" name="email"/>
										</div>
									</div>
                                    
                                    
                                    <strong><span style="margin-left:15px;"><?php echo $this->lang->line('Rest_Restaurant_Information'); ?>: </span></strong></span><br>
									
                                    
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Restaurant_Name'); ?><span class="required">*</span></label>
										<div class="controls">
											<input id="rest_name" class="m-wrap span10" value="<?php echo ucfirst($restaurant_name['restaurant_name']); ?>" type="text" name="rest_name"/>
                                            
										</div>
									</div>

                                   <div class="control-group">
                                                                                <label class="control-label">Restaurant Local Name<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <input id="rest_sub_name" class="m-wrap span10" value="<?php echo ucfirst($restaurant_name['restaurant_sub_name']); ?>" type="text" name="rest_sub_name"/>
                                            
                                                                                </div>
                                                                        </div>




                                    
                                    
                                     <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Restaurant_Phone'); ?></label>
										<div class="controls">
											<input id="rest_phone" class="m-wrap span10" value="<?php echo $restaurant_name['restaurant_phone']; ?>" type="text" name="rest_phone"/>
										</div>
									</div>
                                    
                                    
                                     <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Restaurant_Website'); ?></label>
										<div class="controls">
											<input id="website" class="m-wrap span10" value="<?php echo $restaurant_name['website']; ?>" type="text" name="website"/>
										</div>
									</div>
                                    
                                    
                                     <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Restaurant_Street_Address'); ?></label>
										<div class="controls">
											<input id="address" class="m-wrap span10" value="<?php echo ucfirst($restaurant_name['address']); ?>" type="text" name="address"/>
										</div>
									</div>
                                                                        
                                
                                <?php
$country_name = $this->restaurant_model->countryname();
//print_r($country_name);
?>
									<div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Country'); ?><span class="required">*</span></label>
										<div class="controls">
											<select class="m-wrap span10" name="country" id="country">
	

	<option value="" ><?php echo $this->lang->line('Rest_Country'); ?></option>
	<?php
//foreach($all_country as $country_all){?>
<option <?php if($country_name['id']==160){echo 'selected="selected"';}?> value="<?php echo ucfirst($country_name['countryname']);?>"><?php echo ucfirst($country_name['countryname']);?></option>
<?php //} ?>
	</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_City'); ?><span class="required">*</span></label>
										<div class="controls">
											<select class="m-wrap span10 city" name="city">
	

	<option value=""><?php echo $this->lang->line('Rest_City'); ?></option>
	<?php
	$state = $this->restaurant_model->get_state($country_name['id']);
	//print_r($state);die;
	
	foreach ($state as $key => $pks) {
								
								$city = $this->restaurant_model->get_city1($pks['id']);
								
								foreach ($city as $key => $pks1) {?>
								<option value='<?php echo utf8_decode($pks1['countryname']); ?>' <?php if($pks1['countryname']==$restaurant_name['city']){echo 'selected="selected"';}?> ><?php echo utf8_decode($pks1['countryname']);?></option>
								<?php
								}
								}
								?>
	</select>
										</div>
									</div>
                                    									
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Postcode'); ?></label>
										<div class="controls">
								         <input type="text" class="m-wrap span10" data-masked-input="9999-999" maxlength="8" autocomplete="off" value="<?php echo $restaurant_name['postcode']; ?>" name="postcode" id="postcode" />
										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_NIF'); ?></label>
										<div class="controls">
											<input id="nif_no" class="m-wrap span10" value="<?php echo ucfirst($restaurant_name['comp_registration_no']); ?>" type="text" name="nif_no"/>&nbsp;&nbsp;(<?php echo $this->lang->line('Rest_Company_Registration_Number'); ?>)
										</div>
									</div>
                                    
                                    
                                    
                                     <div class="control-group" style="display:none;">
										<label class="control-label">Status<span class="required">*</span></label>
										<div class="controls">
											<select class="m-wrap span4" name="status">
											<option value="">--Select Status--</option>
											<option value="1" <?php if($restaurant_name['status']==1){echo "selected"; }?>>Active</option>
											<option value="0" <?php if($restaurant_name['status']==0){echo "selected"; }?>>Inactive</option>
											</select>
										</div>
									    </div>
                                                                            	                   
									
									
                                
                                </div>
                                
                                 <div class="span6">
                                <div class="control-group">
                                <p style="margin-top:30px; padding:10px;"><strong>All Comments for Contact Information</strong></p>
                                
                                <?php
								$all_comments = $this->restaurant_model->get_contact_comments($rest_id);								
								foreach($all_comments as $comments){
								?>
                                <div class="span6">                                
                                <p style="background:#ccf7fe; padding:10px; border-radius:6px !important;"><?php echo ucfirst($comments['comment']);?></p></div>
                                <?php /*?><div class="span2"><a href="<?php echo base_url('restaurant/restaurant/delete_comment/'.$comments['id']); ?>"><img src="<?php echo base_url('image_gallery/restaurant_logo/delete.png'); ?>" width="25" height="25" /></a></div><?php */?>
                                <?php } ?>
                                										
									    </div>
                                     </div>   
                                
								<div class="clearfix"></div>
                                <div class="form-actions">
										
                               <input type="submit" name="submit" class="btn green" value="<?php echo $this->lang->line('Rest_Update'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                               <a href="<?php echo base_url(); ?>restaurant/restaurant/manage_restaurant"><button type="button" class="btn green" id="adcms"><?php echo $this->lang->line('Rest_Cancel'); ?></button></a>
										
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
<?php $this->load->view('restaurant/segments/footer');?>
<!-- END FOOTER -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
     <script>
  $(function() {
    
    $( "#datepicker" ).datepicker({ 
	   
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd'});
  });
  </script>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->  <script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-1.10.1.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-migrate-1.2.1.min.js'); ?>" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js'); ?>" type="text/javascript"></script>      
<script src="<?php echo base_url('public/restaurant/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/restaurant/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js'); ?>" type="text/javascript" ></script>
<!--[if lt IE 9]>
<script src="<?php echo base_url('public/restaurant/assets/plugins/excanvas.min.js'); ?>"></script>
<script src="<?php echo base_url('public/restaurant/assets/plugins/respond.min.js'); ?>"></script>  
<![endif]-->   
<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>  
<script src="<?php echo base_url('public/restaurant//plugins/jquery.cookie.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/restaurant//plugins/uniform/jquery.uniform.min.js'); ?>" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url('public/restaurant/assets/plugins/select2/select2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/restaurant/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/restaurant//plugins/data-tables/DT_bootstrap.js'); ?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url('public/restaurant/assets/scripts/app.js'); ?>"></script>
<script src="<?php echo base_url('public/restaurant/assets/scripts/table-editable.js'); ?>"></script> 
<script src="<?php echo base_url('public/restaurant/assets/scripts/jquery-ui.min.js'); ?>"></script> 
<link href="<?php echo base_url('public/restaurant/assets/css/jquery-ui.css'); ?>" type="text/css" rel="stylesheet" />    
<script>
jQuery(document).ready(function() {       
App.init();
TableEditable.init();
});
</script>


<script>
$(document).ready(function(){
$(document).on('change','.country',function(){	
var country_id= $('.country').val();
  //alert(country_id); return false;	
  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>restaurant/restaurant/get_state",
            data: { country_id:country_id},
            success: function(msg){
     					//alert(msg); return false;						
				$('.city').html(msg);   						
            }
			});
			});
			});
			</script>





<!--<img src="../../../../public/restaurant/assets/img/calendar.gif">-->

</body>
<!-- END BODY -->
</html>
