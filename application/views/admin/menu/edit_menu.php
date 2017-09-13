<?php
error_reporting(0);
require_once(APPPATH.'libraries/config.php');
$item_id = $this->uri->segment(4);
$rest_id = $this->uri->segment(6);
$items_data = $this->category_items_model->get_item($item_id);

$rest_cuisine = $this->category_items_model->get_rest_cuisine($rest_id);
//print_r($rest_cuisine);die;	
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title><?php echo $title; ?> | Admin Category</title>
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
Edit Menu
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
<i class="icon-angle-right"></i>
</li>

<li><a href="<?php if(!empty($rest_id)){echo base_url('admin/category_menu/manage_menu/'.$rest_id);}else {echo base_url('admin/category_menu/manage_menu');} ?>">Manage Menu</a>

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
								<div class="caption"><i class="icon-reorder"></i>Edit Menu</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
                                                  
							<div class="portlet-body form">
                                   <form action="<?php if(!empty($rest_id)){echo base_url('admin/category_menu/edit_menu/'.$item_id.'/id/'.$rest_id); }else {echo base_url('admin/category_menu/edit_menu/'.$item_id.''); }?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
                                                                <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									
                                    
                                    <div class="control-group">
										<label class="control-label">Restaurant Name<span class="required">*</span></label>
										<div class="controls">
											<select class="m-wrap span4" name="rest_id" id="restId">
											<option value="">--Select--</option>
											
                                            <?php 
											$restaurant = $this->restaurant_model->get_all_restaurant();
											foreach($restaurant as $rest){
											 ?>                                            
                                            <option value="<?php echo $rest['id']; ?>" <?php if($items_data['restaurant_id']==$rest['id']){echo "selected"; }?>><?php echo ucwords($rest['restaurant_name']); ?></option>
                                            <?php } ?>
											
											</select>
										</div>
									    </div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Dish Name<span class="required">*</span></label>
										<div class="controls">
											<input id="menu_name" class="m-wrap span4" value="<?php echo ucfirst($items_data['item_name']);?>" type="text" name="menu_name"/>
										</div>
									</div>
                                    
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Dish Image<span class="required">*</span></label>
										<div class="controls">
											<input id="cat_image" class="m-wrap span4" value="" type="file" name="file" />
                                            
                                             <?php if($items_data['item_image']!=''){ ?>
                                            <img src="<?php echo base_url(); ?>category_gallery/menu_image/<?php echo $items_data['item_image'];?>" style="height:50px; width:50px;"/>
                                            <?php } ?>
                                            
                           <input type="hidden" name="file_hidden" value="<?php echo $items_data['item_image'];?>">
                                            
										</div>
									</div>
                                        
										                                        
                                        
                                        <div class="control-group">
										<label class="control-label">Dish Type<span class="required">*</span></label>
										<div class="controls">                                        
											<input type="radio" name="menu_type" value="Meat" <?php if($items_data['allergens']=='Meat'){echo "checked"; }?>> Meat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="menu_type" value="Vegan" <?php if($items_data['allergens']=='Vegan'){echo "checked"; }?>> Vegan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="menu_type" value="Vegetarian" <?php if($items_data['allergens']=='Vegetarian'){echo "checked"; }?>> Vegetarian  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                                            <input type="radio" name="menu_type" value="Gluten Free" <?php if($items_data['allergens']=='Gluten Free'){echo "checked"; }?>> Gluten Free  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="menu_type" value="Dairy Free" <?php if($items_data['allergens']=='Dairy Free'){echo "checked"; }?>> Dairy Free 
                                            
  
  
										</div>
									</div>
                                    
                                    <?php
									
									
									?>
                                    
                                        
                                        <div class="control-group">
										<label class="control-label">Cuisine</label>
										<div class="controls">
											<select class="m-wrap span4" name="cuisine" id="cuisines">
											<option value="">--Select--</option>
                                            
                                            <?php $cuisine = explode(',', $rest_cuisine['cuisine_types']);
									
									       foreach($cuisine as $cname){										
										   $all_cuisine = $this->cuisine_model->get_cuisine($cname);										
																							
											?>                                            
											<option value="<?php echo $all_cuisine['id']; ?>" <?php if($items_data['cuisine_id']==$all_cuisine['id']){echo "selected"; }?>><?php echo ucfirst($all_cuisine['cuisine_name']); ?></option>
                                            <?php } ?>
											
											</select>
										</div>
									    </div>
                                        
                                        
                                        <div class="control-group">
										<label class="control-label">Category<span class="required">*</span></label>
										<div class="controls">
											<select class="m-wrap span4" name="category">
											<option value="">--Select--</option>
                                            
                                            <?php $all_category = $this->category_model->get_all_category(); 
											
											foreach($all_category as $category){											
											?>                                            
											<option value="<?php echo $category['id']; ?>" <?php if($items_data['category_id']==$category['id']){echo "selected"; }?>><?php echo ucwords($category['cat_name']); ?></option>
                                            <?php } ?>
											
											</select>
										</div>
									    </div>
                                        
                                        
                                         <div class="control-group">
										<label class="control-label">Dish Price<span class="required">*</span></label>
										<div class="controls">
                                        <input class="m-wrap span1" name="currency" value="€" style="width:50px; display:none;" />
											<input id="price" class="m-wrap span2" value="<?php echo $items_data['item_cost']; ?>" type="text" name="price" style="width:220px;"/>
										</div>                                        
									    </div> 
                                        
                                                                                
                                        <strong><span style="margin-left:50px;">Extra Choices: </span></strong>
                                                                                
                                          
                                           <?php $extra_items = $this->category_items_model->get_extra_items($item_id); 
									   
									          foreach($extra_items as $items){
									   
									       ?>
                                                                                
                                        <div class="control-group">                                        
										<label class="control-label">Add-ons<span class="required">*</span></label>
                                        <div class="controls">
									<input id="extra_items" class="m-wrap span4" value="<?php echo ucfirst($items['extra_item']); ?>" type="text" name="extra_items[]" />
										</div>
                                        
									</div>
                                    
                                    
                                    <div class="control-group">
                                        <label class="control-label">Price<span class="required">*</span></label>
                                        
										<div class="controls">
                                        <input class="m-wrap span1" name="ctype[]" value="€" style="width:50px; display:none;" />
											<input id="pricee" class="m-wrap span2" value="<?php echo $items['price']; ?>" type="text" name="pricee[]" style="width:220px;"/>
                                            
                                            &nbsp;&nbsp;<a href="<?php echo base_url("admin/category_menu/delete_extra_menu/".$item_id."/id/".$rest_id."/".$items['id']); ?>" onClick="return confirm('Sure you want to delete this?');" style="margin-top:20px; margin-left:10px;"><strong>Delete</strong></a>
                                            
                                            
										</div>
                                       
                                                                               
									    </div> 
                                                                                
                                        <?php } ?><div id="show_more"></div>
                                        
                                        
                                        
                                        &nbsp;&nbsp;<a href="javascript:void(0)" id="add_more" style="margin-top:20px; margin-left:470px;"><strong>Add More</strong></a>
                                         
                                    
                                    <div class="control-group">
										<label class="control-label">Dish Description</label>
										<div class="controls">
											<textarea name="menu_desc" id="menu_desc" rows="4" class="m-wrap span4"><?php echo ucfirst($items_data['item_desc']); ?></textarea>
										</div>
									</div>
                                    
                                        
										                          
									
									<div class="form-actions">
										
                                  <input type="submit" name="submit" class="btn green" value="UPDATE">
                                  
                                 &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php if(!empty($rest_id)){echo base_url('admin/category_menu/manage_menu/'.$rest_id); }else {echo base_url('admin/category_menu/manage_menu');} ?>"><button type="button" class="btn green" id="adcms">CANCEL</button></a>
										
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
$("#add_more").click(function(){
	var rowNum = 0;
	rowNum ++;
	//alert('hiiii');return false;
var res='<div id="rowNum'+rowNum+'"><div class="control-group" style="margin-top:20px;"><label class="control-label">Add-ons<span class="required">*</span></label><div class="controls"><input id="" class="m-wrap span4" value="" type="text" name="exta_items[]" /></div></div><input type="hidden" value="" name="edit_id[]"><div class="control-group"><label class="control-label">Price<span class="required">*</span></label><div class="controls"><input id="pricee" class="m-wrap span2" value="" type="text" name="pricee[]" style="width:220px;"/>&nbsp;&nbsp;<a href="javascript:void(0);" onClick="removeRow('+rowNum+');" style="margin-top:20px; margin-left:10px;"><strong>Remove</strong></a></div></div></div>';
$("#show_more").append(res);
});
});

function removeRow(rnum) {
$('#rowNum'+rnum).remove();
}
</script>



<script>
$(function(){
$(document).on('change','#restId',function(){
	
  var rest_id = $(this).val();  
    if(rest_id!=''){
	  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>admin/category_menu/check_list_cuisine",
            data: {rest_id:rest_id},
            success: function(msg){
     					//alert(msg); return false;	
						$('#cuisines').html(msg);		
										
            }
			});
			}
   });
});
</script>



<!--<img src="../../../../public/admin/assets/img/calendar.gif">-->

</body>
<!-- END BODY -->
</html>