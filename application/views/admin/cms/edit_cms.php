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
<script src="<?php echo base_url('public/admin/assets/js/jquery-ui.js'); ?>" type="text/javascript"></script>
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
Edit Cms
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
<i class="icon-angle-right"></i>
</li>

<li><a href="<?php echo base_url('admin/cms'); ?>">Manage Cms</a>

</li>

</ul>
<!-- END PAGE TITLE & BREADCRUMB-->
</div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->

<div class="tab-pane row-fluid profile-account" id="tab_1_3">
<div class="row-fluid">
<div class="span12">


<!--<div class="table-toolbar">
									<div class="btn-group">
                  <a href="<?php //echo base_url('admin/cms/edit_portugoese/'.$query['cms_id']); ?>">
										<button class="btn green">
										Edit Portugoese Cms
										</button>
                    </a>
									</div>
                                  
								</div>-->
								
								<div class="portlet-title">
							
							</div>
                        
						<div class="portlet box blue">
							<ul class="nav nav-tabs" >
							   <li id="rest_info" class="active" ><a data-toggle="tab" class="tab"  >Portugoese</a></li>
                    	       <li id="cont_info" ><a data-toggle="tab" class="tab">English</a></li>
                               
							   
							   
                            </ul>
							</div>


<div class="span9" form" id="cont_tbl"  style="display:none;">
<div class="tab-content">
<div id="tab_1-1" class="tab-pane active">

<div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
<div style="height: auto;" id="accordion1-1" class="accordion collapse">
<form action="<?php echo base_url('admin/cms/edit/'.$query['cms_id']); ?>" method="post" enctype="multipart/form-data">
<label class="control-label">Title</label>
<input type="text" class="m-wrap span8" name="title" id="title" value="<?php echo ucfirst($query['page_title']); ?>" />


<label class="control-label">Description</label>

 <?php 
  //$this->fckeditor->test();
	$this->fckeditor->InstanceName = 'desc';
	$this->fckeditor->Value = stripslashes($query['page_content']);
	$this->fckeditor->Width='94%';
	$this->fckeditor->Height='475';
	$this->fckeditor->create();
  ?>






<label class="control-label" style="display:none">Status</label>
<select name="status" class="m-wrap span8" style="display:none">

<option value="">Select Status</option>
<option value="0" <?php if($query['status']==0){echo "selected";} ?>>Inactive</option>
<option value="1" <?php if($query['status']==1){echo "selected";} ?>>Active</option>
      
</select>


<div class="submit-btn">
<input type="submit" name="submit" class="btn green" value="SAVE">
<!--<input type="reset" class="btn" value="Cancel">-->
</div>
</form>
</div>
</div>

</div>
</div>


<div class="span9 form" id="rest_tbl">
<div class="tab-content">
<div id="tab_1-1" class="tab-pane active">

<div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
<div style="height: auto;" id="accordion1-1" class="accordion collapse">
<form action="<?php echo base_url('admin/cms/edit_portugoese/'.$query['cms_id']); ?>" method="post" enctype="multipart/form-data">
<label class="control-label">Title</label>
<input type="text" class="m-wrap span8" name="title" id="title" value="<?php echo ucfirst($query['portugoese_tittle']); ?>" />



<label class="control-label">Description</label>

 <?php 
  //$this->fckeditor->test();
	$this->fckeditor->InstanceName = 'descs';
	$this->fckeditor->Value = stripslashes($query['portugoese_content']);;
	$this->fckeditor->Width='94%';
	$this->fckeditor->Height='475';
	$this->fckeditor->create();
  ?>






<label class="control-label" style="display:none">Status</label>
<select name="status" class="m-wrap span8" style="display:none">

<option value="">Select Status</option>
<option value="0" <?php if($query['status']==0){echo "selected";} ?>>Inactive</option>
<option value="1" <?php if($query['status']==1){echo "selected";} ?>>Active</option>
      
</select>


<div class="submit-btn">
<input type="submit" name="submit" class="btn green" value="SAVE">
<!--<input type="reset" class="btn" value="Cancel">-->
</div>
</form>
</div>
</div>

</div>
</div>





<!--end span9-->                                   
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
<script>
jQuery(document).ready(function() {       
App.init();
TableEditable.init();
});
</script>
<script>
$(document).ready(function(){
$('#close').click(function(){
$('#myDiv').hide();
	});
	});
</script>
</body>
<!-- END BODY -->
</html>


<script>
$(document).ready(function(){
	$("#cont_info").click(function(){
	 $("#rest_tbl").hide();	
	 $("#cont_tbl").show();
    });
});

$(document).ready(function(){
	$("#rest_info").click(function(){			
     $("#cont_tbl").hide();	 
	 $("#rest_tbl").show();
    });
});

</script>

<style>
a {
    color: #fff;
    text-shadow: none !important;
}
.nav-tabs > li > a, .nav-pills > li > a {
    line-height: 29px;
    margin-right: 0px;
    padding-left: 20px;
    padding-right: 20px;
}
.table th, .table td {
    border-top: 1px solid #ddd;
    line-height: 32px;
    padding: 8px;
    text-align: left;
    vertical-align: top;
}

.portlet.box > .portlet-title {
    margin-bottom: -25px;
	border-bottom: 1px solid #eee;
    color: #fff !important;
	
}

.nav {
    list-style: outside none none;
    margin-bottom: -1px;
    margin-left: -10px;
	margin-top: -8px;
}

</style>