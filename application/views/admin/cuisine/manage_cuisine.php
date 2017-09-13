<?php
error_reporting(0);
$rest_id = $this->uri->segment(4);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?php echo $title;?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url('public/admin/assets/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/plugins/bootstrap/css/bootstrap-responsive.min.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/style-metro.css" rel="stylesheet');?>" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/style.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/style-responsive.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('public/admin/assets/css/themes/default.css');?>" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo base_url('public/admin/assets/plugins/uniform/css/uniform.default.css');?>" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/assets/plugins/select2/select2_metro.css');?>" />
	<link rel="stylesheet" href="<?php echo base_url('public/admin/assets/plugins/data-tables/DT_bootstrap.css');?>" />
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="../settings/favicon.ico" />
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
							Manage Cuisine
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="<?php echo base_url('admin/cuisine/mamage_cuisine'); ?>">Manage Cuisine</a>
								<i class="icon-angle-right"></i>
							
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
								<div class="caption"><i class="icon-edit"></i>Manage Cuisine</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
                  <a href="<?php if(!empty($rest_id)){echo base_url('admin/cuisine/add_cuisine/'.$rest_id);}else{echo base_url('admin/cuisine/add_cuisine');}?>">
										<button class="btn green">
										Add New <i class="icon-plus"></i>
										</button>
                    </a>
									</div>
								</div>
                                <div>
                               
</div>                                
                                <div class="table-responsive">
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
									<?php //print_r('result_array')?>
									
									<thead>
										<tr>
										<th width="61">Sl No.</th>
											<th width="153">Cuisine Name</th>
                                            <th width="110">Added Date</th>										    
					                        <th width="113">Status</th>
											<th width="68"><center>Action</center></th>
											
											
										</tr>
									</thead>
                                    
									
									<tbody>
										<?php 
										$sn=1;
										foreach($manage_cuisine as $cuisine_all){
										//print_r($w); die;
										
										
										?>
										<tr>
										<td><?php echo $sn;?></td>
											<td><?php echo $cuisine_all['cuisine_name'];?></td>
											<td><?php if(!empty($cuisine_all['created_date'])){echo date('d-m-Y',strtotime($cuisine_all['created_date']));} ?></td>					                      			
                                                                                                
                                                                                                							
											<td class="center">
                                            <select class="m-wrap span8 status" style="width: 136px !important;" name="status" id="<?php echo $cuisine_all['id'];?>">
                                            <option value="">Select Status</option>
                                            <option value="1" <?php if($cuisine_all['status']==1){ echo "selected";} ?>>Active</option>
											<option value="0" <?php if($cuisine_all['status']==0){ echo "selected";}?>>Inactive</option>
                                            </select>
		                                    
                                            </td>
                                                                                        
                                            
               <td><center><a href="<?php echo base_url("admin/cuisine/edit_cuisine/id/".$cuisine_all['id']); ?>" style="text-decoration:none;"><i class="icon-large icon-edit" style="font-size:20px;"></i>
</a>&nbsp;&nbsp;
											<a href="<?php echo base_url("admin/cuisine/delete_cuisine/id/".$cuisine_all['id']);?>" onClick="return confirm('Sure you want to delete this?');" style="text-decoration:none;"><i class="icon-large icon-trash" style="font-size:20px; color:#FF0000;"></i></a>
</center></td>                             
                                            
											
										</tr>
									<?php $sn++;} ?>	
									</tbody>
                  
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
	<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url('public/admin/assets/plugins/jquery-1.10.1.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery-migrate-1.2.1.min.js');?>" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js');?>" type="text/javascript"></script>      
	<script src="<?php echo base_url('public/admin/assets/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js');?>" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>  
	<script src="<?php echo base_url('public/admin/assets/plugins/jquery.cookie.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/admin/assets/plugins/uniform/jquery.uniform.min.js');?>" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/select2/select2.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/data-tables/jquery.dataTables.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/admin/assets/plugins/data-tables/DT_bootstrap.js');?>"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url('public/admin/assets/scripts/app.js');?>"></script>
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
<script>
$(function(){
$('.cancel').on('click',function(){

   $('#approved').modal('hide');
 
  
  });
});
</script>
<script>
$(function(){
$('.mentor_approved').on('click',function(){
  $('.checker span').removeClass('checked');
  $('.chk').prop('checked',false);
  $('#price_val').val('');
  $('#intro').val('');
  var mentor_id = $(this).attr('mentor_id');
  $('#mentor_id').val(mentor_id);
  });
});
</script>



<div id="approved" class="modal fade" aria-hidden="true" aria-labelledby="modalLabel" role="dialog" tabindex="-1">
<div class="modal-dialog02">
<div class="modal-content">
<div style="background:#eda17f"><h1 style="margin:0px; padding:20px 40px; font-size:26px; color:#FFF">Approved Mentor !</h1></div>
<div class="modal-header" style="border-bottom:none; overflow:hidden">


<div class="col-lg-12"  style="margin-top:10px; border:#999999 1px solid; padding:10px 0px 20px 10px" >



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>Remainder Section :</strong></td>
    <td>
	<input type="hidden" id="mentor_id">
	<input type="checkbox" id="1" class="chk" name="remainder[]" value="Career Development">Career Development
<input type="checkbox" id="2" class="chk" name="remainder[]" value="Resume Critique">Resume Critique
<input type="checkbox" id="3" class="chk" name="remainder[]" value="Mock Interview">Mock Interview
</td>
  </tr>
  <tr>
    <td><strong>Price per hour :</strong></td>
    <td><input type="text" name="price" id="price_val" value="">$</td>
  </tr>
  <tr>
    <td><strong>Intro :</strong></td>
    <td><textarea name="intro" id="intro"></textarea></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td><input  type="button" class="btn green submit" value="Submit">&nbsp;<input type="button" class="btn red cancel" value="Cancel"></td>
  </tr>
</table>

 </div>





</div>

</div>
</div>
</div>
<script>
$(function(){
$('.submit').on('click',function(){
 var mentor_id = $('#mentor_id').val();
  var remainder = $('.chk:checked').map(function(){
		        return $(this).val();
                }).get();
  var price = $('#price_val').val();
  var intro = $('#intro').val();
  //alert(mentor_id);
  if(mentor_id!='' && remainder!='' && price!='' && intro!=''){
		$.ajax({
		type:"POST",
		url:"<?php echo base_url();?>admin/member/approved_mentor",
		data:{mentor_id:mentor_id,remainder:remainder,price:price,intro:intro}
		}).done(function(msg){
		//alert(msg); return false;
		window.location.reload();
		});
		
		
		
		}
  
 });
});
</script>


<script>
$(function(){
$(document).on('change','.status',function(){
	
 var status_data = $(this).val();
  var cuisine_id = $(this).attr('id'); 
 		
	  if(cuisine_id!=''){
	  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>admin/cuisine/change_cuisine_status",
            data:{status_data:status_data,cuisine_id:cuisine_id}
		}).done(function(msg){
	//alert(msg);
			window.location.reload();
		});
			}
  
 });
});
</script>