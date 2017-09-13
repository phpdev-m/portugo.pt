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
							 View Item 
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							
							<li>
								<a href="<?php echo base_url('admin/category_menu/manage_menu/'.$this->uri->segment(5)); ?>">Manage Item </a>
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
								<div class="caption"><i class="icon-edit"></i>View Item </div>
								
							</div>
							<div class="portlet-body">
                            
								
								<table class="table table-striped table-hover table-bordered" id="">
									
									<thead>
										<tr>
											<th>Sl No.</th> <td><?php echo $query['id'];?></td></tr>
										    <tr><th>Dish Name</th> <td><?php echo ucfirst($query['item_name']);?> </td></tr>
											<tr><th>Dish Image</th> <td><?php if($query['item_image']!='' && file_exists('public/category_gallery/menu_image/'.$query['item_image'])){?> <img src="<?php echo base_url('public/category_gallery/menu_image/'.$query['item_image']); ?>" height="50" width="50" ><?php } ?> </td></tr>
											 <tr> <th>Cuisine</th> <td><?php 
											  $Cuisine = $this->cuisine_model->get_cuisine($query['cuisine_id']);
											 echo $Cuisine['cuisine_name'];?></td></tr>
											 <tr> <th>Category</th> <td><?php 
											 
											 $category_name = $this->category_model->get_category($query['category_id']);
											 echo ucwords($category_name['cat_name']);?></td></tr>
											 <tr> <th>Type</th> <td><?php echo ucwords($query['allergens']);?></td></tr>
										    <tr> <th>Dish Description</th> <td><?php echo $query['item_desc'];?></td></tr>
											
                                            <tr> <th>Price</th> <td>€<?php echo $query['item_cost'];?></td></tr>
											
											
											<tr> <th>Restaurant Name</th> <td><?php 
											$restaurant_name = $this->restaurant_model->get_restaurant_detail($query['restaurant_id']);
											echo ucwords($restaurant_name['restaurant_name']);?></td></tr>
											<tr><th>Added Date</th> <td><?php echo date('d-m-Y',strtotime($query['created_date'])); ?>
                                            <tr> <th>Status</th> <td><?php if($query['status']==0){ echo "Inactive";} if($query['status']==1){echo "Active";}?></td></tr>                                         <tr> <td colspan="2" align="center"><h3 style="text-align:center; font-weight:bold; color:#0000FF;">Extra Items</h3></td></tr>
											
											<tr> <th>Add-ons</th> <th>Price</th></tr>
											<?php $extra_items = $this->category_items_model->get_extra_items($query['id']); 
									   if(!empty($extra_items))
									   {
									          foreach($extra_items as $items){
									   
									       ?>
										    <tr> <td><?php echo ucfirst($items['extra_item']); ?></td> <td>€<?php echo $items['price'];?></td></tr>
											
											
											<?php }}else{
											 ?>
											  <tr> <td colspan="2" align="center"><h5 style="text-align:center">No  extra items for  this  menu....</h1></td></tr>
											 <?php } ?>
											
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
   
</body>
<!-- END BODY -->
</html>