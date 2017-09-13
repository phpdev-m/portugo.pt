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
<title><?php echo $title; ?> | Admin Member</title>
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
Add Coupon
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
<i class="icon-angle-right"></i>
</li>

<li><a href="<?php echo base_url('admin/coupon/manage_coupon'); ?>">Manage Coupon</a>

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
								<div class="caption"><i class="icon-reorder"></i>Add Coupon</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
                                                  
							<div class="portlet-body form">
                                                          <form action="<?php echo base_url('admin/coupon/add_coupon'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
                                                                <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									<div class="control-group">
										<label class="control-label">Coupon Starting Date<span class="required">*</span></label>
										<div class="controls">
											<input id="from" class="m-wrap span4" type="text" name="start_date"/>
										</div>
									</div>
                                        
										<div class="control-group">
										<label class="control-label">Coupon Ending Date<span class="required">*</span></label>
										<div class="controls">
											<input id="to" class="m-wrap span4" type="text" name="end_date"/>
										</div>
									</div>                            
									
                                                                    <div class="control-group">
										<label class="control-label">Coupon Type<span class="required">*</span></label>
										<div class="controls">
                     <select id="ctype" name="ctype" class="m-wrap span4">
					 <option value="">---Select Coupon Type---</option>
                    <option value="Fixed Price Coupon">Fixed Price Coupon</option>
                   <option value="Percentage Amount Coupon">Percentage Amount Coupon</option>                   
                    </select>
											
										</div>
									</div>

                                                                    
                                                                    <div class="control-group">
										<label class="control-label">Price<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" name="price" id="price" />
										</div>
									</div>
                  <div class="control-group">
										<label class="control-label">Coupon Code<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" name="code" id="code" />											
										</div>
									</div>
									
									
                  <div class="control-group">
										<label class="control-label">Coupon Applicable To<span class="required">*</span></label>
										<div class="controls">
                     <select id="applic" name="applic" class="m-wrap span4">
					 <option value="">---Select Reastaurant---</option> 
					 <?php		
					   foreach($restaurant as $restaurants){
					 ?>                   
                   <option value="<?php echo $restaurants['id']; ?>"><?php echo $restaurants['restaurant_name']; ?></option>
				   
				   <?php } ?>                   
                    </select>
											
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label">Status<span class="required"></span></label>
										<div class="controls">
                     <select id="status" name="status" class="m-wrap span4">					 
                    <option value="1">Active</option>
                   <option value="0">Inactive</option>                   
                    </select>
											
										</div>
									</div>

									
									<div class="form-actions">
										<!--<button type="submit" class="btn green" id="adcms">Submit</button>-->
                                                                                <input type="submit" name="submit" class="btn green" value="ADD COUPON">
										
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


<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
   
<script language="javascript">
        $(document).ready(function () {
            $("#from").datepicker({
                minDate: 0,
        maxDate: "+60D",
        numberOfMonths: 1,
        onSelect: function(selected) {
          $("#to").datepicker("option","minDate", selected)
        }
				 });
			});
	</script>
<script>
	$(document).ready(function () {	            
			$("#to").datepicker({
                 minDate: 0,
        maxDate:"+60D",
        numberOfMonths: 1,
        onSelect: function(selected) {
           $("#from").datepicker("option","maxDate", selected)
        }
            });
        });
    </script>









<!--<img src="../../../../public/admin/assets/img/calendar.gif">-->

</body>
<!-- END BODY -->
</html>