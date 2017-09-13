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
<title><?php echo $title; ?> | Restaurant Logo</title>
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
Edit Restaurant Logo
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="<?php echo base_url('restaurant/dashboard'); ?>"><?php echo $this->lang->line('Home'); ?></a> 
<i class="icon-angle-right"></i>
</li>

<li><?php echo $this->lang->line('Rest_Edit_Restaurant_Logo'); ?>

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
								<div class="caption"><i class="icon-reorder"></i><?php echo $this->lang->line('Rest_Edit_Restaurant_Logo'); ?></div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
                                                  
							<div class="portlet-body form" style="overflow:hidden;">
                            <div class="span6">
                         <form action="<?php echo base_url('restaurant/restaurant_logo/edit_restaurant_logo/'.$rest_id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_logo">
									
                                                                <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									                                   
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Restaurant_Title'); ?><span class="required">*</span></label>
										<div class="controls">
											<input id="res_name" class="m-wrap span10" value="<?php echo ucfirst($restaurant_name['restaurant_name']); ?>" disabled="disabled" type="text" name="res_name"/>
										</div>
									</div>
                                    
                                    
                                     <div class="control-group">
										<label class="control-label"><strong><?php echo $this->lang->line('Rest_Restaurant_Logo'); ?></strong><span class="required">*</span></label>
										<div class="controls">
											<input id="file" class="m-wrap span10" value="" type="file" name="file" onchange="return validateForm();" />
											
										
                                        <?php if($restaurant_name['restaurant_logo']!=''){ ?>
                                            <img src="<?php echo base_url(); ?>image_gallery/restaurant_logo/<?php echo $restaurant_name['restaurant_logo'];?>" style="height:50px; width:50px;"/>
                                            <?php } ?>
                                            <span style="color:#ff0000;">* Please  upload an image less than 280px * 280px</span>
                                            <input type="hidden" name="file_hidden1" value="<?php echo $restaurant_name['restaurant_logo'];?>"/>

                                        
                                        
                                        </div>
									</div>
                                    
                                    
                                    
                                     <div class="control-group">
										<label class="control-label"><strong><?php echo $this->lang->line('Rest_Restaurant_Cover_Photo'); ?></strong><span class="required">*</span></label>
										<div class="controls">
										<input id="file2" class="m-wrap span10" value="" type="file" name="file2"  />										
                                        
                                        <?php if($restaurant_name['cover_photo']!=''){ ?>
                                            <img src="<?php echo base_url(); ?>image_gallery/cover_photo/<?php echo $restaurant_name['cover_photo'];?>" style="height:50px; width:50px;"/>
                                            <?php } ?>
                                            
                                            <input type="hidden" name="file_hidden2" value="<?php echo $restaurant_name['cover_photo'];?>"/>
                                        
                                        </div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Restaurant_Description'); ?><span class="required">*</span></label>
										<div class="controls">
											<textarea name="rest_desc" id="rest_desc" rows="4" class="m-wrap span10"><?php echo ucfirst($restaurant_name['restaurant_description']);?></textarea>
										</div>
									</div>
                                                               
									                                
                                 </div>      
                                   
                                   
                                   <div class="span6">
                                <div class="control-group">
                                <p style="margin-top:10px; padding:10px;"><strong>All Comments for Restaurant Logo</strong></p>
                                
                                <?php
								$all_comments = $this->restaurant_model->get_logo_comments($rest_id);								
								foreach($all_comments as $comments){
								?>
                                <div class="span6">                                
                                <p style="background:#ccf7fe; padding:10px; border-radius:6px !important;"><?php echo ucfirst($comments['comment']);?></p></div>
                                
                                <?php } ?>
                                										
									    </div>
                                     </div> 
                                    
                                     
                                    <div class="clearfix"></div> 
                                     <div class="form-actions">
										<!--<button type="submit" class="btn green" id="adcms">Submit</button>-->
                                     <input type="submit" name="submit" class="btn green" id="submit" value="<?php echo $this->lang->line('Rest_Update'); ?>" >
									&nbsp;&nbsp;&nbsp;&nbsp;<button type="reset" class="btn green" id="adcms"><?php echo $this->lang->line('Rest_Cancel'); ?></button>	
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

<script>
 $(document).ready(function(){

 $("#submit").click(function(){
  
  var img_heigth= $("#img_heigth").val();
  var img_width= $("#img_width").val();
 
  if(img_heigth!=''   && img_width!='' )
  {
  if(img_heigth > 280 || img_width >280 )
  {
   alert('Please  upload an image less than 280px * 280px');
  return false;
  }
  }
 })
 
 })
 </script>


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













<!--<img src="../../../../public/restaurant/assets/img/calendar.gif">-->

</body>
<!-- END BODY -->
</html>




<script type="text/javascript">

function validateForm()

{
  var fileUpload = document.getElementById("file");

    //Check whether the file is valid Image.
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png)$");
    if (regex.test(fileUpload.value.toLowerCase())) 
    {

        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") 
        {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) 
            {
                //Initiate the JavaScript Image object.
                var image = new Image();

                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;

                //Validate the File Height and Width.
                image.onload = function () 
                {
                    var height = this.height;
                    var width = this.width;
                   //alert(height);
                   $("#img_heigth").val(height);
				   $("#img_width").val(width);

                };

            }
        } 
        else 
        {
            alert("This browser does not support HTML5.");
            return false;
        }
    } 
    else 
    {
        alert("Please select a valid Image file.");
        return false;
    }

 }

 </script>
 
 
 
 <input type="hidden" id="img_heigth">
  <input type="hidden" id="img_width">
 