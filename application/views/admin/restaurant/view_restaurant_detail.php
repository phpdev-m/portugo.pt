<?php
error_reporting(0);
//print_r($restaurant_detail);die;
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?php echo $title; ?> | Admin Panel</title>
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
	<link rel="shortcut icon" href="favicon.ico" />
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
							 View Restaurant Detail
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							
							<li>
								<a href="<?php echo base_url('admin/restaurant'); ?>">Manage Restaurant Detail</a>
								<i class="icon-angle-right"></i>
							
							<li>
								<a href="javascript:void(0);">View</a>
								<i class="icon-angle-right"></i>
						</ul>
						    
						
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
								<div class="caption"><i class="icon-edit"></i>View Restaurant Owner</div>
								
							</div>
							<div class="portlet-body">
                            
								
								<table class="table table-striped table-hover table-bordered" id="">
									
									<thead>
										<tr>
                                        
											<th>Sl No.</th> <td><?php echo $query['id'];?></td></tr>
                                            <tr> <th>Restaurant Name</th> <td><?php echo ucwords($query['restaurant_name']);?></td></tr>
										    <tr><th>Restaurant Owner Name</th> <td><?php echo ucfirst($owner_name['first_name']);?> &nbsp;<?php echo ucfirst($owner_name['last_name']);?></td></tr>											
											<tr> <th>Restaurant Address</th> <td><?php echo ucfirst($owner_name['restaurant_address']);?></td></tr>
                                            <tr> <th>Restaurant Phone</th> <td><?php echo $owner_name['restaurant_phone'];?></td></tr>
											<tr> <th>Restaurant Description</th> <td><?php echo ucfirst($query['restaurant_description']);?></td></tr>
                                            
                                            <tr> <th>Restaurant Logo</th> <td><img src="<?php echo base_url(); ?>image_gallery/restaurant_logo/<?php echo $query['restaurant_logo'];?>" style="height:50px; width:60px;"/></td></tr>
                                            
                                            
                                            <tr> <th>Restaurant Cover Photo</th> <td><img src="<?php echo base_url(); ?>image_gallery/cover_photo/<?php echo $query['cover_photo'];?>" style="height:50px; width:60px;"/></td></tr>
                                            
                                                                                       
                                            
                                            <tr> <th>Cuisine Types</th> 
                                            <td><?php
											$cuisines = explode(',', $query['cuisine_types']);
											foreach($cuisines as $co){
												
											$cuisine_types = $this->restaurant_model->get_cuisine($co);
												
											echo $cuisine_types['cuisine_name'].',&nbsp;';} ?></td></tr>
                                            
                                            
                                            <tr> <th>Category Name</th> 
                                            <td><?php $category = $this->restaurant_model->get_category($query['id']);
											
											foreach($category as $cate){
											
											echo ucfirst($cate['cat_name']).',&nbsp;'; }?></td></tr>
                                            
                                            <tr> <th>Category Description</th> 
                                            <td><?php $category = $this->restaurant_model->get_category($query['id']);
											
											foreach($category as $cate){
											
											echo ucfirst($cate['category_desc']).',&nbsp;<br>'; }?></td></tr>
                                            
                                            <tr> <th>Category Image</th> 
                                            <td><?php $category = $this->restaurant_model->get_category($query['id']);
											
											foreach($category as $cate){
												
												?>
												<img src="<?php echo base_url(); ?>category_gallery/category_image/<?php echo $cate['category_image'];?>" style="height:50px; width:60px;"/>
											<?php
											 }?></td></tr>
                                                                                          
                                            <tr> <th>Items Name</th> 
                                            <td><?php $category1 = $this->restaurant_model->get_category($query['id']);
											
											foreach($category1 as $cate1){
											
											$items = $this->restaurant_model->get_items($cate1['id']);
											
											foreach($items as $item){
											
											echo ucfirst($item['item_name']).',&nbsp;'; }?><?php } ?></td></tr>
                                            
                                            
                                            <tr> <th>Items Description</th> 
                                            <td><?php $category1 = $this->restaurant_model->get_category($query['id']);
											
											foreach($category1 as $cate1){
											
											$items = $this->restaurant_model->get_items($cate1['id']);
											
											foreach($items as $item){
											
											echo ucfirst($item['item_desc']).',&nbsp;<br>'; }?><?php } ?></td></tr>
                                            
                                            
                                            <tr> <th>Items Image</th> 
                                            <td><?php $category1 = $this->restaurant_model->get_category($query['id']);
											
											foreach($category1 as $cate1){
											
											$items = $this->restaurant_model->get_items($cate1['id']);
											
											foreach($items as $item){ ?>
                                            
                                            <img src="<?php echo base_url(); ?>category_gallery/menu_image/<?php echo $item['item_image'];?>" style="height:50px; width:60px;"/>
                                            
                                            <?php											
											 }?><?php } ?></td></tr>                                             
                                             
                                            
                                            <tr> <th>Allergens Type</th> 
                                            <td><?php $category1 = $this->restaurant_model->get_category($query['id']);
											
											foreach($category1 as $cate1){
											
											$items = $this->restaurant_model->get_items($cate1['id']);
											
											foreach($items as $item){
											
											echo ucfirst($item['allergens']).',&nbsp;'; }?><?php } ?></td></tr>
                                            

                                             
                                            
											
                        <?php
						 $country = $this->member_model->get_country($owner_name['country']);
						 $city = $this->member_model->get_country($owner_name['city']);
						?>
                         
                         <tr> <th>Country</th> <td><?php echo ucfirst(@$country['countryname']);?></td></tr>
						 <tr> <th>City</th> <td><?php echo ucfirst(@$city['countryname']);?></td></tr>						
                        <tr><th>Zip Code</th> <td><?php echo $owner_name['zip_code'];?>
                        <tr><th>Created Date</th> <td><?php echo $query['created_date'];?>						
                     <tr><th>Status</th> <td><?php if($query['status']==1) {echo 'Active';}else{echo "Inactive";}?></td></tr>               
									</thead>
                                                     
								</table>
                                
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
    
    
     <script>
	$(document).ready(function(){
		$('#challenge').click(function(){
			$('#challenge_history').show();
			$('#transaction_history').hide();
			});
			
			
			$('#transaction').click(function(){
			$('#transaction_history').show();
			$('#challenge_history').hide();
			
			});
			
			
			
			
			
			
			
		});
	</script>
    
    
    
    
    
    
    
    
</body>
<!-- END BODY -->
</html>