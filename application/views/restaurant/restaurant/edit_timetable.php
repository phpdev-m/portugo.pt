<?php
error_reporting(0);
$session_data=$this->session->userdata('restaurant_logged_in');		    
$rest_id=$session_data['id'];
$getid = $session_data['id'];
$restaurant_name = $this->restaurant_model->get_restaurant_detail($rest_id);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title><?php echo $title; ?> | Restaurant Timetable</title>
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
Edit Opening Hours
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="<?php echo base_url('restaurant/dashboard'); ?>"><?php echo $this->lang->line('Home'); ?></a> 
<i class="icon-angle-right"></i>
</li>

<li><a href="<?php echo base_url('restaurant/restaurant/edit_restaurant/'.$getid); ?>"><?php echo $this->lang->line('Rest_Opening_Hours'); ?></a>

</li>

</ul>
<!-- END PAGE TITLE & BREADCRUMB-->
</div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<style>
.open_width{
width:100px;
 background-color: #ffffff;
    background-image: none !important;
    border: 1px solid #e5e5e5;
}
.am_width{
width:58px;
}
.pc_title{
display:block;
}
.mobile_title{
display:none;}

@media screen and (max-width: 767px) {
.pc_title{
display:none;
}
.mobile_title{
display:block;}
.am_width{
width:100%;
margin-bottom:10px;
}
.open_width{
width:100%;
 background-color: #ffffff;
    background-image: none !important;
    border: 1px solid #e5e5e5;
}
}
</style>

<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN VALIDATION STATES-->
						<div class="portlet box red">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i><?php echo $this->lang->line('Rest_Edit_Opening_Hours'); ?></div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
                                                
							<div class="portlet-body form" id="rest_tbl">
                            
                        <form action="<?php echo base_url('restaurant/restaurant/edit_timetable'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
                                                                <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									                                   
                                    
                                    
                                    <div class="control-group" style="display:none;">
										<label class="control-label">About Restaurant </label>
										<div class="controls">
											<textarea id="rest_about" class="m-wrap span4" type="text" name="rest_about" style="height:120px;"/><?php echo ucfirst($restaurant_name['restaurant_description']); ?></textarea>
										</div>
									</div>
                                    
                                    <div class="control-group mobile_title " >
                                <p><strong>All Comments for Restaurant Information</strong></p>
                                
                                <?php
								$all_comments = $this->restaurant_model->get_restaurant_comments($rest_id);								
								foreach($all_comments as $comments){
								?>                                
                                <p style="background:#ccf7fe; padding:10px; border-radius:6px !important;"><?php echo ucfirst($comments['comment']);?></p>
                                <?php } ?>
                                
                                										
									    </div>
                                     <div class="control-group pc_title">
										<label class="control-label"> </label>
										<div class="controls span2" style="margin-top:15px;">                                        
										<strong>Opening Time</strong>
										</div>
                                        <div class="controls span2" style="margin-top:15px;">                                        
										<strong><?php echo $this->lang->line('Rest_Closing_Time'); ?></strong>
										</div>                              
                                        
									</div>
									
									<div class="control-group mobile_title">
										<label class="control-label"> </label>
									
                                        <div class="controls span2" style="margin-top:15px;">                                        
										<strong><?php echo $this->lang->line('Rest_Opening_Closing_Time'); ?></strong>
										</div>                              
                                        
									</div>
                                    
                                   <?php
								   									
									$dayname='Monday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$rest_id);									
									
									$openning_time=$timetable['opening_time'];
									$closing_time=$timetable['closing_time'];
									
									$res1=explode(' ',$openning_time);
									$res2=explode(':',$res1[0]);
									$res3=explode(' ',$closing_time);
									$res4=explode(':',$res3[0]);
			$open_hours=$res2[0];
			$open_min=$res2[1];
			$open_am_pm=$res1[1];
			$close_hours=$res4[0];
			$close_min=$res4[1];
			$close_am_pm=$res3[1];
			
			          $status=$timetable['status'];									
									?>
										
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Monday'); ?></label>
										<div class="controls"> 
										<input type="hidden" name="day[]" value="Monday">
                                        <select class="m-wrap span1" name="open_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                  <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_hours==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        </select>									                                        
                                        
                                        <select class="m-wrap span1" name="open_mints[]"><option value="00" selected="selected">00</option>
                                       <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                     <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_min==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_open[]" >
										<option value="am" <?php if($open_am_pm=='am'){echo "selected"; }?>>AM</option>
                                        <option value="pm" <?php if($open_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
										    &nbsp;&nbsp; 
                                            
                                        
                                        <select class="m-wrap span1" name="close_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                 <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_hours==$i){echo "selected"; }?>  ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        
                                        </select>
                                        
                                        <select class="m-wrap span1" name="close_mints[]"><option value="00" selected="selected">00</option>
                                        <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_min==$i){echo "selected"; }?>  ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                       
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_close[]" >
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?>>AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="open_width"  name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>
                                                                        
										
										</div>
                                        
									</div>
                                    
                                    	<?php
									$dayname='Tuesday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$rest_id);
									
									$openning_time=$timetable['opening_time'];
									$closing_time=$timetable['closing_time'];
									
									$res1=explode(' ',$openning_time);
									$res2=explode(':',$res1[0]);
									$res3=explode(' ',$closing_time);
									$res4=explode(':',$res3[0]);
			$open_hours=$res2[0];
			$open_min=$res2[1];
			$open_am_pm=$res1[1];
			$close_hours=$res4[0];
			$close_min=$res4[1];
			$close_am_pm=$res3[1];			
			
					$status=$timetable['status'];				
									?>
                                   
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Tuesday'); ?> </label>
										<div class="controls"> 
										<input type="hidden" name="day[]" value="Tuesday">
                                        <select class="m-wrap span1" name="open_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_hours==$i){echo "selected"; }?>  ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        </select>									                                        
                                        
                                        <select class="m-wrap span1" name="open_mints[]"><option value="00" selected="selected">00</option>
                                       <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_min==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_open[]">
										<option value="am" <?php if($open_am_pm=='am'){echo "selected"; }?> >AM</option>
                                        <option value="pm" <?php if($open_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
										    &nbsp;&nbsp; 
                                            
                                        
                                        <select class="m-wrap span1" name="close_time[]">
										<option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_hours==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        
                                        </select>
                                        
                                        <select class="m-wrap span1" name="close_mints[]"><option value="00" selected="selected">00</option>
                                        <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_min==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                       
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_close[]" >
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?>>AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="open_width"  name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>
                                        
                                                                       
										
										</div>
                                        
									</div>
                                    
                                         <?php
									$dayname='Wednesday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$rest_id);
									
									$openning_time=$timetable['opening_time'];
									$closing_time=$timetable['closing_time'];
									
									$res1=explode(' ',$openning_time);
									$res2=explode(':',$res1[0]);
									$res3=explode(' ',$closing_time);
									$res4=explode(':',$res3[0]);
			$open_hours=$res2[0];
			$open_min=$res2[1];
			$open_am_pm=$res1[1];
			$close_hours=$res4[0];
			$close_min=$res4[1];
			$close_am_pm=$res3[1];
								
						$status=$timetable['status'];		
									?>                                                              
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Wednesday'); ?> </label>
										<div class="controls"> 
										<input type="hidden" name="day[]" value="Wednesday">
                                        <select class="m-wrap span1" name="open_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_hours==$i){echo "selected"; }?>  ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        </select>									                                        
                                        
                                        <select class="m-wrap span1" name="open_mints[]"><option value="00" selected="selected">00</option>
                                       <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_min==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_open[]" >
										<option value="am" <?php if($open_am_pm=='am'){echo "selected"; }?>>AM</option>
                                        <option value="pm" <?php if($open_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
										    &nbsp;&nbsp; 
                                            
                                        
                                        <select class="m-wrap span1" name="close_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_hours==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        
                                        </select>
                                        
                                        <select class="m-wrap span1" name="close_mints[]"><option value="00" selected="selected">00</option>
                                        <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_min==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                       
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_close[]" >
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?> >AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="open_width"  name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>                                
										
										</div>
                                        
									</div>
                                   
								   
								   
								   
                                         <?php
									$dayname='Thursday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$rest_id);
									
									$openning_time=$timetable['opening_time'];
									$closing_time=$timetable['closing_time'];
									
									$res1=explode(' ',$openning_time);
									$res2=explode(':',$res1[0]);
									$res3=explode(' ',$closing_time);
									$res4=explode(':',$res3[0]);
			$open_hours=$res2[0];
			$open_min=$res2[1];
			$open_am_pm=$res1[1];
			$close_hours=$res4[0];
			$close_min=$res4[1];
			$close_am_pm=$res3[1];
			
						$status=$timetable['status'];			
									?>          
								   
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Thursday'); ?> </label>
										<div class="controls">
										<input type="hidden" name="day[]" value="Thursday"> 
                                        <select class="m-wrap span1" name="open_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>"  <?php if($open_hours==$i){echo "selected"; }?>  ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        </select>									                                        
                                        
                                        <select class="m-wrap span1" name="open_mints[]"><option value="00" selected="selected">00</option>
                                       <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_min==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_open[]" >
										<option value="am" <?php if($open_am_pm=='am'){echo "selected"; }?> >AM</option>
                                        <option value="pm" <?php if($open_am_pm=='pm'){echo "selected"; }?>>PM</option>
                                        </select> 
										    &nbsp;&nbsp; 
                                            
                                        
                                        <select class="m-wrap span1" name="close_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_hours==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        
                                        </select>
                                        
                                        <select class="m-wrap span1" name="close_mints[]"><option value="00" selected="selected">00</option>
                                        <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_min==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                       
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_close[]" >
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?> >AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="open_width"  name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>                                
										
										</div>
                                        
									</div>
                                    
                                         <?php
									$dayname='Friday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$rest_id);
									
									$openning_time=$timetable['opening_time'];
									$closing_time=$timetable['closing_time'];
									
									$res1=explode(' ',$openning_time);
									$res2=explode(':',$res1[0]);
									$res3=explode(' ',$closing_time);
									$res4=explode(':',$res3[0]);
			$open_hours=$res2[0];
			$open_min=$res2[1];
			$open_am_pm=$res1[1];
			$close_hours=$res4[0];
			$close_min=$res4[1];
			$close_am_pm=$res3[1];
						
						$status=$timetable['status'];			
									?>      
                                    
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Friday'); ?> </label>
										<div class="controls">
										<input type="hidden" name="day[]" value="Friday">  
                                        <select class="m-wrap span1" name="open_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_hours==$i){echo "selected"; }?>  ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        </select>									                                        
                                        
                                        <select class="m-wrap span1" name="open_mints[]"><option value="00" selected="selected">00</option>
                                       <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_min==$i){echo "selected"; }?>><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_open[]" >
										<option value="am" <?php if($open_am_pm=='am'){echo "selected"; }?> >AM</option>
                                        <option value="pm" <?php if($open_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
										    &nbsp;&nbsp; 
                                            
                                        
                                        <select class="m-wrap span1" name="close_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_hours==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        
                                        </select>
                                        
                                        <select class="m-wrap span1" name="close_mints[]"><option value="00" selected="selected">00</option>
                                        <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_min==$i){echo "selected"; }?>><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                       
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_close[]" >
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?> >AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="open_width"  name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>                                
										
										</div>
                                        
									</div>
                                    
									 <?php
									$dayname='Saturday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$rest_id);
									
									$openning_time=$timetable['opening_time'];
									$closing_time=$timetable['closing_time'];
									
									$res1=explode(' ',$openning_time);
									$res2=explode(':',$res1[0]);
									$res3=explode(' ',$closing_time);
									$res4=explode(':',$res3[0]);
			$open_hours=$res2[0];
			$open_min=$res2[1];
			$open_am_pm=$res1[1];
			$close_hours=$res4[0];
			$close_min=$res4[1];
			$close_am_pm=$res3[1];
			
						$status=$timetable['status'];
									?>      
                                    
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Saturday'); ?></label>
										<div class="controls"> 
										<input type="hidden" name="day[]" value="Saturday">  
                                        <select class="m-wrap span1" name="open_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_hours==$i){echo "selected"; }?>  ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        </select>									                                        
                                        
                                        <select class="m-wrap span1" name="open_mints[]"><option value="00" selected="selected">00</option>
                                       <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_min==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_open[]"  >
										<option value="am" <?php if($open_am_pm=='am'){echo "selected"; }?>>AM</option>
                                        <option value="pm" <?php if($open_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
										    &nbsp;&nbsp; 
                                            
                                        
                                        <select class="m-wrap span1" name="close_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_hours==$i){echo "selected"; }?>><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        
                                        </select>
                                        
                                        <select class="m-wrap span1" name="close_mints[]"><option value="00" selected="selected">00</option>
                                        <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>"  <?php if($close_min==$i){echo "selected"; }?>><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                       
                                        </select>
                                        
                                        <select class="am_width" name="time_close[]" >
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?>>AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?>>PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="open_width"  name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>                                  
										
										</div>
                                        
									</div>                                    
                                     <?php
									$dayname='Sunday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$rest_id);
									
									$openning_time=$timetable['opening_time'];
									$closing_time=$timetable['closing_time'];
									
									$res1=explode(' ',$openning_time);
									$res2=explode(':',$res1[0]);
									$res3=explode(' ',$closing_time);
									$res4=explode(':',$res3[0]);
			$open_hours=$res2[0];
			$open_min=$res2[1];
			$open_am_pm=$res1[1];
			$close_hours=$res4[0];
			$close_min=$res4[1];
			$close_am_pm=$res3[1];
			
			              $status=$timetable['status'];									
									?>      
                                    
                                  
                                    
                                    <div class="control-group">
										<label class="control-label"><?php echo $this->lang->line('Rest_Sunday'); ?> </label>
										<div class="controls"> 
										<input type="hidden" name="day[]" value="Sunday"> 
                                        <select class="m-wrap span1" name="open_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_hours==$i){echo "selected"; }?>  ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        </select>									                                        
                                        
                                        <select class="m-wrap span1" name="open_mints[]"><option value="00" selected="selected">00</option>
                                       <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($open_min==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_open[]" >
										<option value="am" <?php if($open_am_pm=='am'){echo "selected"; }?> >AM</option>
                                        <option value="pm" <?php if($open_am_pm=='pm'){echo "selected"; }?>>PM</option>
                                        </select> 
										    &nbsp;&nbsp; 
                                            
                                        
                                        <select class="m-wrap span1" name="close_time[]"><option value="00" selected="selected">00</option>
                                        <?php for($i=1; $i<=12; $i++){?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_hours==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                        <?php } ?>
                                        
                                        </select>
                                        
                                        <select class="m-wrap span1" name="close_mints[]"><option value="00" selected="selected">00</option>
                                        <?php $i = 0; while($i < 55){$i = $i + 5; ?>
                                        <option value="<?php if($i<=9){echo "0".$i."";}else{echo $i; }?>" <?php if($close_min==$i){echo "selected"; }?> ><?php if($i<=9){echo "0".$i."";}else{echo $i; }?></option>
                                       <?php } ?>
                                       
                                        </select>
                                        
                                        <select class="m-wrap span1 am_width" name="time_close[]" >
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?>>AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="open_width"  name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>                                 
										
										</div>
                                        
									</div>                                                           





<div class="control-group">
<label class="control-label"><?php echo $this->lang->line('Rest_Minimum_Order_Amount'); ?> </label>
<div class="controls">
<select name="min_order" id="min_order" class="form-control2" style="padding: 2px 5px;"  >
<option selected="" value="<?php echo $restaurant_name['min_order']; ?>" ><?php echo $restaurant_name['min_order']; ?></option>
<option value="10.00" >10.00</option>
<option value="15.00" >15.00</option>
<option value="20.00" >20.00</option>
<option value="25.00" >25.00</option>

</select>


</div>
</div>

<div class="control-group">
<label class="control-label"><?php echo $this->lang->line('Rest_Order_Amount_Free_Delivery'); ?> </label>
<div class="controls">
<select name="free_delivery" id="free_delivery" class="form-control2" style="padding: 2px 5px;"  >
<option selected="" value="<?php echo $restaurant_name['free_delivery']; ?>" ><?php echo $restaurant_name['free_delivery']; ?></option>
<option value="10.00" >10.00</option>
<option value="15.00" >15.00</option>
<option value="20.00" >20.00</option>
<option value="25.00" >25.00</option>

</select>

</div>
</div>

<div class="control-group">
<label class="control-label"><?php echo $this->lang->line('Accept_Delivery'); ?> </label>
<div class="controls">
<select name="delivery_check" id="type" class="form-control2" style="padding: 2px 5px;" >
<option value="delivery/pickup" <?php if(isset($restaurant_name['delivery_check']) && $restaurant_name['delivery_check']=='delivery/pickup'){?>selected="selected"<?php } ?>> <?php echo $this->lang->line('Delivery')?>/<?php echo $this->lang->line('Pickup')?>  </option>
<option value="delivery" <?php if(isset($restaurant_name['delivery_check']) && $restaurant_name['delivery_check']=='delivery'){?>selected="selected"<?php } ?>> <?php echo $this->lang->line('Delivery')?>  </option>
<option value="pickup" <?php if(isset($restaurant_name['delivery_check']) && $restaurant_name['delivery_check']=='pickup'){?>selected="selected"<?php } ?>>     <?php echo $this->lang->line('Pickup')?>  </option>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label"><?php echo $this->lang->line('Rest_Delivery_Charge'); ?></label>
<div class="controls">
<select name="charges" id="charges" class="form-control2" style="padding: 2px 5px;"  >
<option selected="" value="<?php echo $restaurant_name['delivery_charges']; ?>" ><?php echo $restaurant_name['delivery_charges']; ?></option>
<option value="1.00" >1.00</option>
<option value="1.50" >1.50</option>
<option value="2.00" >2.00</option>
<option value="3.00" >3.00</option>
</select>

</div>
</div>

<div class="control-group">
<label class="control-label">Delivery Time Min </label>
<div class="controls">

<select name="min_time" id="min_time" class="form-control2" style="padding: 2px 5px;"  >
<option selected="" value="<?php echo $restaurant_name['delivery_time_min']; ?>" ><?php echo $restaurant_name['delivery_time_min']; ?></option>
<option value="30" >30 min</option>
<option value="45" >45 min</option>
<option value="50" >50 min</option>
<option value="60" >60 min</option>
</select>


</div>
</div>







<div class="form-actions">
<input type="submit" name="submit" class="btn green" value="<?php echo $this->lang->line('Rest_Update'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?php //echo base_url(); ?>restaurant/restaurant/manage_restaurant"><button type="reset" class="btn green" id="adcms"><?php echo $this->lang->line('Rest_Cancel'); ?></button></a>
</div>
</form>


                                <div class="control-group pc_title " style="margin:290px 0px 0px 700px; width:200px; position:absolute; top:0;">
                                <p><strong>All Comments for Restaurant Information</strong></p>
                                
                                <?php
								$all_comments = $this->restaurant_model->get_restaurant_comments($rest_id);								
								foreach($all_comments as $comments){
								?>                                
                                <p style="background:#ccf7fe; padding:10px; border-radius:6px !important;"><?php echo ucfirst($comments['comment']);?></p>
                                <?php } ?>
                                
                                										
									    </div>                                
                              
                                
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
