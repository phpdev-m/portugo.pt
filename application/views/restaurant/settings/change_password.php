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
	<title><?php echo $title; ?> | Restaurant</title>
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
	<!-- END PAGE LEVEL SCRIPTS -->
	<link rel="shortcut icon" href="favicon.ico" />
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
					<h3>Settings: Change Account</h3>
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
						<h3 class="page-title">
							<?php echo $this->lang->line('Rest_Settings_Change_Password'); ?>
							
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('restaurant/dashboard'); ?>"><?php echo $this->lang->line('Home'); ?></a> 
								
							</li>
							
							
						</ul>
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<div class="tabbable tabbable-custom boxless">
							
							<div class="tab-content">
							
								
								<div>
									<div class="portlet box red ">
										<div class="portlet-title">
											<div class="caption"><i class="icon-reorder"></i><?php echo $this->lang->line('Rest_Settings_Change_Password'); ?></div>
											<div class="tools">
												<a href="javascript:;" class="collapse"></a>
												<a href="#portlet-config" data-toggle="modal" class="config"></a>
												<a href="javascript:;" class="reload"></a>
												<a href="javascript:;" class="remove"></a>
											</div>
										</div>
										<div class="portlet-body form">
											<!-- BEGIN FORM-->
                                            <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
                                           
											<?php if($success!=''){?><div class="success" style="color:#4b8df8;"><?php echo $success;?> </div> <?php }?><br>
											<form action="<?php echo base_url('restaurant/settings/change_password'); ?>" class="form-horizontal form-bordered form-label-stripped" method="post" id="form1" name="form1">
												<div class="control-group">
													<label class="control-label"><?php echo $this->lang->line('Rest_Old_Password'); ?></label>
													<div class="controls">
														<input type="password" placeholder="" class="m-wrap span12" name="oldpass" id="oldpass"/>
														<span class="help-inline"></span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label"><?php echo $this->lang->line('Rest_New_Password'); ?></label>
													<div class="controls">
														<input type="password" placeholder="" class="m-wrap span12" name="newpass" id="newpass" />
														<span class="help-inline"></span>
													</div>
												</div>
                                                
                                                <div class="control-group">
													<label class="control-label"><?php echo $this->lang->line('Rest_Confirm_new_password'); ?></label>
													<div class="controls">
														<input type="password" placeholder="" class="m-wrap span12" name="cpass" id="cpass" />
														<span class="help-inline"></span>
													</div>
												</div>
                                               
												<div class="form-actions">
                                                
													<button type="submit" class="btn blue"><i class="icon-ok"></i> <?php echo $this->lang->line('Rest_Save'); ?></button>
													<button type="reset" class="btn"><?php echo $this->lang->line('Rest_Cancel'); ?></button>
												</div>
											</form>
											<!-- END FORM-->  
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->         
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->  
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			2013 &copy; Metronic by keenthemes.
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-1.10.1.min.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-migrate-1.2.1.min.js') ; ?>" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') ; ?>" type="text/javascript"></script>      
	<script src="<?php echo base_url('public/restaurant/assets/plugins/bootstrap/js/bootstrap.min.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js') ; ?>" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js') ; ?>"></script>
	<script src="assets/plugins/respond.min.js') ; ?>"></script>  
	<![endif]-->   
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery.blockui.min.js') ; ?>" type="text/javascript"></script>  
	<script src="<?php echo base_url('public/restaurant/assets/plugins/jquery.cookie.min.js') ; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/restaurant/assets/plugins/uniform/jquery.uniform.min.js') ; ?>" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url('public/restaurant/assets/plugins/select2/select2.min.js') ; ?>"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url('public/restaurant/assets/scripts/app.js') ; ?>"></script>
	<script src="<?php echo base_url('public/restaurant/assets/scripts/form-samples.js') ; ?>"></script>   
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {    
		   // initiate layout and plugins
		   App.init();
		   FormSamples.init();
		});
	</script>
    <script>
$(document).ready(function(){
$('#close').click(function(){
$('#myDiv').hide();
	});
	});
</script>
	<!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>