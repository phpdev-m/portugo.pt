<?php
error_reporting(0);
$session_data=$this->session->userdata('restaurant_logged_in');		    
$rest_id=$session_data['id'];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title><?php echo $title; ?> | Restaurant Bank Detail</title>
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
Bank A/C Detail
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="<?php echo base_url('restaurant/dashboard'); ?>">Home</a> 
<i class="icon-angle-right"></i>
</li>

<li>Bank Detail</li>

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
								<div class="caption"><i class="icon-reorder"></i>Bank A/C Detail</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
                                                  
							<div class="portlet-body form" id="cont_tbl">
                        
								
								
								<form action="<?php echo base_url('restaurant/restaurant_bank_detail/edit_bank_detail/'.$rest_id.''); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
                                                                <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									                                   
                                    
                                    <div class="control-group">
										<label class="control-label">Bank Name<span class="required">*</span></label>
										<div class="controls">
											<input id="bank_name" class="m-wrap span4" value="<?php echo ucfirst($bank_detail['bank_name']); ?>" type="text" name="bank_name"/>
										</div>
									</div>
                                    
                                    
                                     <div class="control-group">
										<label class="control-label">Bank A/C No </label>
										<div class="controls">
											<input id="ac_number" class="m-wrap span4" value="<?php echo $bank_detail['bank_account_no']; ?>" type="text" name="ac_number"/>
										</div>
									</div>
                                    
                                    
                                    
                                     <div class="control-group">
										<label class="control-label">Account Holder Name </label>
										<div class="controls">
										<input id="holder_name" class="m-wrap span4" value="<?php echo ucfirst($bank_detail['holder_name']); ?>" type="text" name="holder_name"/>
										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Bank Address </label>
										<div class="controls">
											<input id="bank_address" class="m-wrap span4" value="<?php echo ucfirst($bank_detail['bank_address']); ?>" type="text" name="bank_address"/>
										</div>
									</div>
                                           
                                    <div class="control-group">
										<label class="control-label">Bank IFSC Code </label>
										<div class="controls">
											<input id="ifsc_code" class="m-wrap span4" value="<?php echo $bank_detail['bank_ifsc_code']; ?>" type="text" name="ifsc_code"/>
										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Choose Payment Type </label>
										<div class="controls">
                                        
                                        <?php 
										$type = explode(',', $bank_detail['payment_type']); 
										
											//print_r($type);
										?>
                                        
                                        <input type="checkbox" name="payment_type[]" value="Direct Debit" <?php if(in_array('Direct Debit', $type)){echo "checked==checked"; } ?> /> Direct Debit  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="payment_type[]" value="Credit Card" <?php if(in_array('Credit Card', $type)){echo "checked==checked"; } ?> /> Credit Card &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="payment_type[]" value="Paypal" <?php if(in_array('Paypal', $type)){echo "checked==checked"; }?> /> Paypal 
                                         
                                          
  

										</div>
									</div>
                                    
                                    
                                    <div class="control-group" style="display:none;">
										<label class="control-label">Status<span class="required">*</span></label>
										<div class="controls">
											<select class="m-wrap span4" name="status">
											<option value="">--Select Status--</option>
											<option value="1" <?php if($bank_detail['status']==1){echo "selected"; }?>>Active</option>
											<option value="0" <?php if($bank_detail['status']==0){echo "selected"; }?>>Inactive</option>
											</select>
										</div>
									    </div>
                                    
                                                             
									
									<div class="form-actions">										
                                      <input type="submit" name="submit" class="btn green" value="UPDATE">
                                      &nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><button type="reset" class="btn green" id="adcms">CANCEL</button></a>
										
									</div>
								</form>
                                
                                
                                
                                <form action="<?php //echo base_url('admin/restaurant/send_comments/'.$getid.''); ?>" method="post" class="form-horizontal"> 
                                
                                <input type="hidden" value="Contact Information" name="comment_type">
                                
                                
                                <div class="control-group" style="margin:345px 0px 0px 680px;  width:200px; position:absolute; top:0;">
                                <p><strong>All Comments for Restaurant Information</strong></p>
                                
                                <?php
								$all_comments = $this->restaurant_model->get_account_comments($rest_id);								
								foreach($all_comments as $comments){
								?>                                
                                <p style="background:#ccf7fe; padding:10px; border-radius:6px !important;"><?php echo ucfirst($comments['comment']);?></p>
                                <?php } ?>
                                
										<label class="control-label">Comments <span class="required">*</span></label>
										<div class="controls">
											<textarea id="comment" class="m-wrap span3" value="<?php echo ucfirst($restaurant_name['restaurant_name']); ?>" type="text" name="comment" style="width:250px; margin-bottom:15px;"></textarea>
                                            <br>
                                            <p><input type="submit" name="send" class="btn green" value="Send" style="width:80px; height:30px; margin-bottom:10px;"></p>
										</div>
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
$(document).on('change','.country',function(){	
var country_id= $('.country').val();
  //alert(country_id); return false;	
  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>restaurant/restaurant/get_state",
            data: { country_id:country_id},
            success: function(msg){
     					//alert(msg); return false;						
				$('.city').html(msg);   						
            }
			});
			});
			});
			</script>





<!--<img src="../../../../public/restaurant/assets/img/calendar.gif">-->

</body>
<!-- END BODY -->
</html>