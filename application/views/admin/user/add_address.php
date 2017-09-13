<?php 
error_reporting(0);
$id=$this->uri->segment(5);
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
Add Address
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
<i class="icon-angle-right"></i>
</li>

<li><a href="<?php echo base_url('admin/user'); ?>">Manage Users  </a>
<i class="icon-angle-right"></i>
</li>

<li><a href="<?php echo base_url();?>admin/user/address/id/<?php echo $id; ?>">Manage Address  </a>

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
								<div class="caption"><i class="icon-reorder"></i>Add Address </div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
                                                  
							<div class="portlet-body form">
                                                          <form action="<?php echo base_url('admin/user/add_address/id/'.$id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
                                                                <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									<div class="control-group" readonly="readonly">
										<label class="control-label">User Name<span class="required">*</span></label>
										<div class="controls" >
										
										     <select name="customer_id" style="width:280px;" readonly="readonly">
											 
                                                 <option value="">--Select User--</option>
                                                 <?php foreach($customer as $customers){?>
												 <option value="<?php echo $customers['user_id']; ?>"<?php if($customers['user_id']==$id) { echo "selected=selected"; } ?> ><?php echo $customers['first_name'].'&nbsp;'.$customers['last_name']; ?></option>
												 <?php } ?>
                                             </select>
										
										</div>
									</div>
                                      
                                    <!--<div class="control-group">
										<label class="control-label">Customer Name<span class="required">*</span></label>
										<div class="controls">
											<input id="customer_id" class="m-wrap span4" placeholder="<?php echo $customer['first_name'].'&nbsp;'.$customer['last_name'];?>"value="<?php echo $customer['user_id'];?>" type="text" name="customer_id"/>
										</div>
									</div>--> 

									  
									<?php /*?><div class="control-group">
										<label class="control-label">Address Tittle<span class="required">*</span></label>
										<div class="controls">
											<input id="address_tittle" class="m-wrap span4" value="<?php echo $this->input->post('address_tittle');?>" type="text" name="address_tittle"/>
										</div>
									</div><?php */?>                            
									
                                    <div class="control-group">
										<label class="control-label">Address Line 1<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" value="<?php echo $this->input->post('apartment');?>" name="apartment" id="apartment" />
										</div>
									</div>
									 
									 <div class="control-group">
										<label class="control-label">Address Line 2<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" maxlength="13" value="<?php echo $this->input->post('address');?>" name="address" id="address" />
										</div>
									</div>
									 
									
                                    <div class="control-group">
										<label class="control-label">City<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" value="<?php echo $this->input->post('city');?>" name="city" id="city" />
										</div>
									</div>
                                    
                                    
                                   <!--  <div class="control-group">
										<label class="control-label">Country<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" value="<?php echo $this->input->post('state');?>" name="state" id="state" />
										</div>
									</div>-->
									
									  
									  <div class="control-group">
										<label class="control-label">Zipcode<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" value="<?php echo $this->input->post('zip_code');?>" name="zip_code" id="zip_code" />
										</div>
									</div>
									  
									  <div class="control-group">
										<label class="control-label">Phone Number<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" value="<?php echo $this->input->post('landmark');?>" name="landmark" id="landmark" />
										</div>
									</div>
									  
								<!--	 <div class="control-group">
										<label class="control-label">Mobile Number<span class="required">*</span></label>
										<div class="controls">
											<input type="text" class="m-wrap span4" value="<?php echo $this->input->post('landline');?>" name="landline" id="landline" />
										</div>
									</div>--> 
									  
									  <div class="control-group">
										<label class="control-label">Address level<span class="required">*</span></label>
										<div class="controls">
											<input type="radio" name="address_lavel" value="Home">&nbsp;Home &nbsp;&nbsp;
									        <input type="radio" name="address_lavel" value="Office">&nbsp;Office &nbsp;&nbsp;
                                            <input type="radio" name="address_lavel" value="Other">&nbsp;Other
										</div>
									</div> 
									  
									  
									<div class="control-group">
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
										
                                    <input type="submit" name="submit" class="btn green" value="ADD">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/user/address/id/'.$id);?>"><button type="button" class="btn green" id="adcms">CANCEL</button></a>
										
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

</body>
<!-- END BODY -->
</html>