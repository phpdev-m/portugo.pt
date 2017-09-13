<?php
error_reporting(0);
$getid = $this->uri->segment(4);
$restaurant_name = $this->restaurant_model->get_restaurant($getid);
//print_r($restaurant_name);die;
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title><?php echo $title; ?> | Admin Restaurant</title>
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
Add Restaurant
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
<i class="icon-angle-right"></i>
</li>

<li><a href="<?php echo base_url('admin/restaurant'); ?>">Manage Restaurant</a>

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
								<div class="caption"><i class="icon-reorder"></i>Add Restaurant</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
                                                  
							<div class="portlet-body form">
                        <form action="<?php echo base_url('admin/restaurant/add_restaurant/'.$getid.''); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
                                                                <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									                                   
                                    
                                    <div class="control-group">
										<label class="control-label">Restaurant Name<span class="required">*</span></label>
										<div class="controls">
											<input id="res_name" class="m-wrap span4" value="<?php echo ucwords($restaurant_name['restaurant_name']); ?>" type="text" name="res_name"/>
										</div>
									</div>
                                    
                                    <?php $all_cuisine = $this->restaurant_model->get_all_cuisine(); 
									
									      $count = count($all_cuisine);
									?>
                                    
                                    <div class="control-group">
										<label class="control-label">Cuisine Type<span class="required">*</span></label>
										<div class="controls">
                                        <?php
										$ct=1;
										 foreach($all_cuisine as $cuisine) {?>
											<input type="checkbox" name="cuisine[]" value="<?php echo $cuisine['id']; ?>" /> <?php echo ucfirst($cuisine['cuisine_name']); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                            <?php if($ct%3==0){ ?>
                                            <br>
                                            <?php } ?>
  
  <?php $ct++; } ?>
										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label"><strong>Category Name</strong><span class="required">*</span></label>
										<div class="controls">
											<input id="cat_name" class="m-wrap span4" value="" type="text" name="cat_name[]"/>
										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label"><strong>Category Description</strong><span class="required">*</span></label>
										<div class="controls">
											<textarea name="cat_desc[]" id="cat_desc" rows="4" class="m-wrap span4"></textarea>
										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label"><strong>Category Image</strong><span class="required">*</span></label>
										<div class="controls">
											<input id="cat_image" class="m-wrap span4" value="" multiple="multiple" type="file" name="file[]"/>
										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Item Name<span class="required">*</span></label>										
                                        <div class="controls">
											<input id="item_name" class="m-wrap span4" value="" type="text" name="item_name[]"/>
										</div>                                        
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Item Description<span class="required">*</span></label>
										<div class="controls">
											<textarea name="item_desc[]" id="item_desc" rows="4" class="m-wrap span4"></textarea>
										</div>
									</div>
                                           
                                    <div class="control-group">                                    
										<label class="control-label">Item Cost<span class="required">*</span></label>
										<div class="controls">
											<input id="item_cost" class="m-wrap span4" value="" type="text" name="item_cost[]"/> <strong>$</strong>                     
                                        </div>
                                        </div>
                                        
                                        
                                        <div class="control-group">
										<label class="control-label">Ingredients Allergens<span class="required">*</span></label>
										<div class="controls">                                        
											<input type="radio" name="allergens[]" checked="checked" value="Veg" > Veg &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="allergens[]" value="Nonveg"> Nonveg 
                                            
  
  
										</div>
									</div>
                                        
                                    
                                    <div class="control-group">
                                    <div id="item_div">
										<label class="control-label">Item Image<span class="required">*</span></label>
										<div class="controls">
											<input id="item_img" class="m-wrap span4" value="" type="file" multiple="multiple" name="item_image[]"/>
										</div>
                                        </div>
									
                                    
                                    
                                        <input type="button" value="Add More Items" id="add_more_items" class="btn green" style=" margin-left:550px;margin-top: -100px;">  
                                         <input type="button" value="Add More Category" id="add_more_category" class="btn green" style=" margin-left:550px;margin-top:-36px;">                                       
									</div>
                                                                        
                                                                   
                                    										
										<div class="control-group" style="margin-top:-47px;">
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
										<!--<button type="submit" class="btn green" id="adcms">Submit</button>-->
                                                                                <input type="submit" name="submit" class="btn green" value="ADD">
										
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
$(document).ready(function(){
$("#add_more_items").click(function(){
var res='<div class="control-group"><label class="control-label" style="margin-top:20px;">Item Name<span class="required">*</span></label><div class="controls"><input id="item_name" class="m-wrap span4" value="" type="text" name="item_name[]" style="margin-top:20px;"/></div></div><div class="control-group"><label class="control-label">Item Description<span class="required">*</span></label><div class="controls"><textarea name="item_desc[]" id="item_desc" rows="4" class="m-wrap span4"></textarea></div></div><div class="control-group"><label class="control-label">Item Cost<span class="required">*</span></label><div class="controls"><input id="item_cost" class="m-wrap span4" value="" type="text" name="item_cost[]"/> <strong>$</strong></div></div><input type="button" value="Hide" id="hide" class="btn green" style=" margin-left:550px;margin-top: -100px;"><div class="control-group"><label class="control-label">Ingredients Allergens<span class="required">*</span></label><div class="controls"><input type="radio" checked="checked" name="allergens[]" value="Veg" > Veg &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="allergens[]" value="Nonveg"> Nonveg</div></div><div class="control-group"><label class="control-label">Item Image<span class="required">*</span></label><div class="controls"><input id="item_img" class="m-wrap span4" value="" type="file" name="item_image[]"/></div></div>';
$("#item_div").append(res);
});
});
</script>



<script>
$(document).ready(function(){
$("#add_more_category").click(function(){
var res='<div class="control-group"><label class="control-label" style="margin-top:20px;"><strong>Category Name</strong><span class="required">*</span></label><div class="controls"><input id="cat_name" class="m-wrap span4" value="" type="text" name="cat_name[]" style="margin-top:20px;"/></div></div><div class="control-group"><label class="control-label"><strong>Category Description</strong><span class="required">*</span></label><div class="controls"><textarea name="cat_desc[]" id="cat_desc" rows="4" class="m-wrap span4"></textarea></div></div><div class="control-group"><label class="control-label"><strong>Category Image</strong><span class="required">*</span></label><div class="controls"><input id="cat_img" class="m-wrap span4" value="" type="file" multiple="multiple" name="file[]"/></div></div><div class="control-group"><label class="control-label" style="margin-top:20px;">Item Name<span class="required">*</span></label><div class="controls"><input id="item_name" class="m-wrap span4" value="" type="text" name="item_name[]" style="margin-top:20px;"/></div></div><div class="control-group"><label class="control-label">Item Description<span class="required">*</span></label><div class="controls"><textarea name="item_desc[]" id="item_desc" rows="4" class="m-wrap span4"></textarea></div></div><div class="control-group"><label class="control-label">Item Cost<span class="required">*</span></label><div class="controls"><input id="item_cost" class="m-wrap span4" value="" type="text" name="item_cost[]"/> <strong>$</strong></div></div><input type="button" value="Hide" id="hide" class="btn green" style=" margin-left:550px;margin-top: -100px;"><div class="control-group"><label class="control-label">Ingredients Allergens<span class="required">*</span></label><div class="controls"><input type="radio" checked="checked" name="allergens[]" value="Veg" > Veg &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="allergens[]" value="Nonveg"> Nonveg</div></div><div class="control-group"><label class="control-label">Item Image<span class="required">*</span></label><div class="controls"><input id="item_img" class="m-wrap span4" value="" type="file" name="item_image[]"/></div></div>';
$("#item_div").append(res);
});
});
</script>



<script>
$(document).ready(function(){
$("#hide").click(function(){
alert('sss');return false;
});
});
</script>






<!--<img src="../../../../public/admin/assets/img/calendar.gif">-->

</body>
<!-- END BODY -->
</html>