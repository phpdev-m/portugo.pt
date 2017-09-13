<?php
error_reporting(0);
$session_data=$this->session->userdata('restaurant_logged_in');
$rest_id = $session_data['id'];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title><?php echo $title; ?> | Restaurant Postcode</title>
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
<script type="text/javascript" src="<?php echo base_url('public/restaurant/assets/js/jquery.min.js'); ?>"></script>
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
Add Order Delivery Postcode
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="<?php echo base_url('restaurant/dashboard'); ?>"><?php echo $this->lang->line('Home'); ?></a> 
<i class="icon-angle-right"></i>
</li>

<li><a href="<?php if(!empty($rest_id)){echo base_url('restaurant/settings/delivery_postcode');}else {echo base_url('restaurant/settings/delivery_postcode');} ?>"><?php echo $this->lang->line('Rest_Manage_Order_Delivery_Postcode'); ?></a>

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
								<div class="caption"><i class="icon-reorder"></i>Add Order Delivery Postcode</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
                                                  
							<div class="portlet-body form">



<form action="<?php echo base_url('restaurant/settings/add_postcode_multi') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">



<div  class="control-group">
                 <input  class="control-label" type="text" id="text_code" name = "text_cod" value="PostCode(ex:XXXX-000):">
<div class="controls">
                 <input  class="m-wrap span4" type="text" id="code" name = "code" value="">
</div>       
                <input  class="control-label" type="text" id="text_range1" name = "text_range1" value="Start (ex:0000-XXX):">
<div class="controls">
                <input  class="m-wrap span4" type="text" id="start" name = "start" "value="">
                
</div>
                <input  class="control-label" type="text" id="text_range2" name = "text_range2" value="Finish (ex:0000-XXX):">
<div class="controls">
                <input  class="m-wrap span4" type="text" id="finish" name = "finish" >      
</div>
</div>

  <div class="form-actions">
 <input type="submit" name="submit" class="btn green" value="<?php echo $this->lang->line('Rest_Add'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('restaurant/settings/delivery_postcode'); ?>"><button type="button" class="btn green" id="adcms"><?php echo $this->lang->line('Rest_Cancel'); ?></button></a>
</div>

               





                                                          
                                                          <div  id="myDiv"><?php if($this->session->flashdata('message')){?><br /><div class="success" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?php echo $this->session->flashdata('message');?></div><?php } ?></div> <br />
									
                                                                <div hidden  id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
                                                                
                                     <div id="show_more">
                                                                
									<div hidden  class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Postcode'); ?><span class="required">*</span></label>
										<div class="controls">
											<input id="postcode" class="m-wrap span4" value="" type="text" name="postcode[]"/>
										</div>`
									</div>
                                    
                                    </div>
                                    
                                    
                                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)"    hidden  id="add_more" style="margin-top:20px; margin-left:470px;"><strong><?php echo $this->lang->line('Rest_Add_More'); ?></strong></a>
                                    




                                    
                                    
  
  				
										                        
									
									<div hidden class="form-actions">
										
  <input type="submit" name="submit" class="btn green" value="<?php echo $this->lang->line('Rest_Add'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('restaurant/settings/delivery_postcode'); ?>"><button type="button" class="btn green" id="adcms"><?php echo $this->lang->line('Rest_Cancel'); ?></button></a>

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
$("#add_more").click(function(){	
	var rowNum = 0;
	rowNum ++;
	//alert('hiiii');return false;
var res='<div id="rowNum'+rowNum+'"><div class="control-group"><label class="control-label">Postcode<span class="required">*</span></label><div class="controls"><input id="postcode" class="m-wrap span4" value="" type="text"name="postcode[]"/>&nbsp;&nbsp;<a href="javascript:void(0);" onClick="removeRow('+rowNum+');" style="margin-top:20px; margin-left:10px;"><strong>Remove</strong></a></div></div></div>';
$("#show_more").append(res);
});

});

function removeRow(rnum) {
$('#rowNum'+rnum).remove();
}


</script>


<!--<img src="../../../../public/restaurant/assets/img/calendar.gif">-->

</body>
<!-- END BODY -->
</html>
