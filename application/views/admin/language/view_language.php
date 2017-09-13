
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?php echo $title; ?> | Admin</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url('public/admin/assets/plugins/bootstrap/css/bootstrap.min.css') ; ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/plugins/bootstrap/css/bootstrap-responsive.min.css') ; ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/plugins/font-awesome/css/font-awesome.min.css') ; ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/style-metro.css') ; ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/style.css') ; ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/style-responsive.css') ; ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/themes/default.css') ; ?>" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo base_url('public/admin/assets/plugins/uniform/css/uniform.default.css') ; ?>" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/assets/plugins/select2/select2_metro.css') ; ?>" />
	<link rel="stylesheet" href="<?php echo base_url('public/admin/assets/plugins/data-tables/DT_bootstrap.css'); ?>" />
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico" />
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
							 Manage Language File 
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							
							<li><a href="<?php echo base_url('admin/language');?>">Manage Language </a></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box red">
							<div class="portlet-title">
								<div class="caption"><i class="icon-edit"></i>Language detail</div>
								
							</div>
							<div class="portlet-body">
                            <div class="table-responsive">
								<?php if(isset($success)){ ?><div class="success"><?=$success?></div><?php }?>
	
	<form id="form1" name="form1" method="post" action="<?php echo base_url();?>admin/language/view/<?php echo $res['lang_code'];?>/<?php echo $res['id'];?>" accept-charset="utf-8">  
	<label for="Setting2Value" style="color:#F00; font-size:12px; font-family:courier-new;">Don't remove anything! Change only second value in define function.<br />
	For example: define('HOME', 'Home') change Home not HOME</label>
	<textarea name="content" style="width:500px; height:900px;; overflow-y:scroll;"><?php while(!feof($file)){echo $data = fgets($file);}?></textarea>
	
	<div class="form-actions">
									        <input type="submit" name="submit" value="submit" class="btn green"/>
									</div>
								</form>
                               </div>
                                
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
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
	<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url('public/admin/assets/plugins/jquery-1.10.1.min.js'); ?>" type="text/javascript"></script>
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
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery.cookie.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/uniform/jquery.uniform.min.js'); ?>" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/select2/select2.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/data-tables/jquery.dataTables.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url('public/admin/assets/scripts/app.js'); ?>"></script>
	<script src="<?php echo base_url('public/admin/assets/scripts/table-editable.js'); ?>"></script>    
	<script>
		jQuery(document).ready(function() {       
		   App.init();
		   TableEditable.init();
		});
	</script>
    <script>
	$(document).ready(function(){
		$('#reply').click(function(){
			$('#post_comment').css("display","inline");
			});
		});
	</script>
</body>
<!-- END BODY -->
</html>