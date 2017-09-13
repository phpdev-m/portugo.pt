<?php
error_reporting(0);
$getid = $this->uri->segment(4);
$restaurant_name = $this->restaurant_model->get_restaurant_detail($getid);
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/assets/scripts/jquery.masked-input.js'); ?>"></script>

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
Add Branch Restaurant
</h3>
<ul class="breadcrumb">
<li>
<i class="icon-home"></i>
<a href="<?php echo base_url('admin/dashboard'); ?>">Home</a> 
<i class="icon-angle-right"></i>
</li>

<li><a href="<?php echo base_url('admin/restaurant/manage_restaurant'); ?>">Manage Restaurants</a>

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
                        
                         <div class="portlet-title">
							
							</div>
                        
						<div class="portlet box red">
						     	<ul class="nav nav-tabs" >
                                          	          <li class="active"  id="cont_info" ><a data-toggle="tab" class="tab">New Sub Restaurant -  <?php echo $restaurant_name['restaurant_name'];?>   </a></li>
                                                       <?php  // <li id="rest_info"><a data-toggle="tab" class="tab"  >Restaurant Info</a></li>
							   //<li id="rest_photo"><a data-toggle="tab" class="tab" >Restaurant Photo</a></li>
							   //<li id="rest_ac"><a data-toggle="tab" class="tab"  >Bank A/C Info</a></li>
							  // <li id="commission"><a data-toggle="tab" class="tab"  >Commission Info</a></li>
                                                          ?>
							   
                            </ul>
							</div>
                            
                                                  
							<div class="portlet-body form" id="cont_tbl">
                        <form action="<?php echo base_url('admin/restaurant/add_sub_restaurant/'.$getid.''); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
                                                                <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									                                   
                                    
										<strong><span style="margin-left:15px;">Responsible Person: </span></strong>									
									
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Contact Name </label>
										<div class="controls">
											<input id="cname" class="m-wrap span4" value="<?php echo ucfirst($restaurant_name['contact_name']); ?>" type="text" name="cname"/>
										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Contact Phone  Number</label>
										<div class="controls">
											<input id="phone" class="m-wrap span4" value="<?php echo $restaurant_name['contact_phone']; ?>" type="text" name="phone"/>
										</div>
									</div>                                                    
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Contact Email </label>
										<div class="controls">
										  <input id="email" class="m-wrap span4" value="<?php echo $restaurant_name['contact_email']; ?>" type="text" name="email"/>
										</div>
									</div>
                                    
                                    
                                    <strong><span style="margin-left:15px;">Restaurant Information: </span></strong></span><br>
									
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Restaurant Name<span class="required">*</span></label>
										<div class="controls">
											<input id="rest_name" class="m-wrap span4" value="<?php echo ucfirst($restaurant_name['restaurant_name']); ?>" type="text" name="rest_name"/>
                                            
										</div>
 									</div>
                                    <div class="control-group">
                                                                                <label class="control-label">Restaurant Local Name<span class="required">*</span></label>
                                                                                <div class="controls">
                                                                                        <input id="rest_sub_name" class="m-wrap span4" value="<?php echo ucfirst($restaurant_name['restaurant_sub_name']); ?>" type="text" name="rest_sub_name"/>
                                            
                                                                                </div>
                                                                        </div>

                                    
                                    
                                     <div class="control-group">
										<label class="control-label">Restaurant Phone Number</label>
										<div class="controls">
											<input id="rest_phone" class="m-wrap span4" value="<?php echo $restaurant_name['restaurant_phone']; ?>" type="text" name="rest_phone"/>
										</div>
									</div>
                                    
                                    
                                     <div class="control-group">
										<label class="control-label">Restaurant Website</label>
										<div class="controls">
											<input id="website" class="m-wrap span4" value="<?php echo $restaurant_name['website']; ?>" type="text" name="website"/>
										</div>
									</div>
                                    
                                    
                                     <div class="control-group">
										<label class="control-label">Restaurant Street Address</label>
										<div class="controls">
											<input id="address" class="m-wrap span4" value="<?php echo ucfirst($restaurant_name['address']); ?>" type="text" name="address"/>
										</div>
									</div>
                                                                        
                                
                                <?php
$country_name = $this->member_model->country();
//print_r($all_country);
?>
									<div class="control-group">
										<label class="control-label">Country<span class="required">*</span></label>
										<div class="controls">
											<select class="m-wrap span4 country" name="country" id="country">
	

	<option value="" >Country</option>
	<?php
//foreach($all_country as $country_all){?>
<option <?php if($country_name['id']==160){echo 'selected="selected"';}?> value="<?php echo ucfirst($country_name['countryname']);?>"><?php echo ucfirst($country_name['countryname']);?></option>
<?php //} ?>
	</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">City<span class="required">*</span></label>
										<div class="controls">
											<select class="m-wrap span4 city" name="city">
	

	<option value="">City</option>
	<?php
	$state = $this->member_model->get_state1($country_name['id']);
	//print_r($state);die;
	
	foreach ($state as $key => $pks) {
								
								$city = $this->member_model->get_city($pks['id']);
								
								foreach ($city as $key => $pks1) {?>
								<option value='<?php echo utf8_decode($pks1['countryname']);?>' <?php if($pks1['countryname']==$restaurant_name['city']){echo 'selected="selected"';}?> ><?php echo utf8_decode($pks1['countryname']);?></option>
								<?php
								}
								}
								?>
	</select>
										</div>
									</div>
                                    									
                                    
                                    <div class="control-group">
										<label class="control-label">Postcode </label>
										<div class="controls">
								         <input type="text" class="m-wrap span4" data-masked-input="9999-999" maxlength="8" autocomplete="off" value="<?php echo $restaurant_name['postcode']; ?>" name="postcode" id="postcode" />
										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">NIF</label>
										<div class="controls">
											<input id="nif_no" class="m-wrap span4" value="<?php echo ucfirst($restaurant_name['comp_registration_no']); ?>" type="text" name="nif_no"/>&nbsp;&nbsp;(Company Registration Number)
										</div>
									</div>
                                    
                                    
                                    
                                     <div class="control-group">
										<label class="control-label">Status<span class="required">*</span></label>
										<div class="controls">
											<select class="m-wrap span4" name="status">
											<option value="">--Select Status--</option>
											<option value="1" <?php if($restaurant_name['status']==1){echo "selected"; }?>>Active</option>
											<option value="0" <?php if($restaurant_name['status']==0){echo "selected"; }?>>Inactive</option>
											</select>
										</div>
									    </div>
                                        
                                     	                   
									
									<div class="form-actions">
										
                               <input type="submit" name="submit" class="btn green" value="CONFIRM">&nbsp;&nbsp;&nbsp;&nbsp;
                               <a href="<?php echo base_url(); ?>admin/restaurant/manage_restaurant"><button type="button" class="btn green" id="adcms">CANCEL</button></a>
										
									</div>
								</form>
                                
                                
                                
                                <form   action="<?php echo base_url('admin/restaurant/send_comments/'.$getid.''); ?>" method="post" class="form-horizontal"> 
                                
                                <input   type="hidden" value="Contact Information" name="comment_type">
                                
                                <div hidden class="control-group" style="margin:345px 0px 0px 500px; width:200px; position:absolute; top:0;">
										<label class="control-label">Comment<span class="required">*</span></label>
										<div class="controls">
											<textarea id="comment" class="m-wrap span3" value="<?php echo ucfirst($restaurant_name['restaurant_name']); ?>" type="text" name="comment" style="width:250px; margin-bottom:15px;"></textarea>
                                            <br>
                                            <p><input type="submit" name="send" class="btn green" value="Send" style="width:80px; height:30px; margin-bottom:10px;"></p>
										</div>
									    </div>                                        
                                        </form>                                        
                                
								<!-- END FORM-->
							</div>
                                                       
                            
                            
                            
                            <div class="portlet-body form" id="rest_tbl" style="display:none;">

                        <form action="<?php echo base_url('admin/restaurant/edit_restaurant_info/'.$getid.''); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
                                                                <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									                                   
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">About Restaurant </label>
										<div class="controls">
											<textarea id="rest_about" class="m-wrap span4" type="text" name="rest_about" style="height:120px;"/><?php echo ucfirst($restaurant_name['restaurant_description']); ?></textarea>
										</div>
									</div>
                                    
                                    
                                     <div class="control-group">
										<label class="control-label"> </label>
										<div class="controls span2" style="margin-top:15px;">                                        
										<strong>Opening Time</strong>
										</div>
                                        <div class="controls span2" style="margin-top:15px;">                                        
										<strong>Closing Time</strong>
										</div>                              
                                        
									</div>
                                    
                                   <?php
								   									
									$dayname='Monday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$getid);
									//print_r($timetable); die;
									
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
										<label class="control-label">Monday</label>
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
                                        
                                        <select class="m-wrap span1" name="time_open[]" style="width:58px;">
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
                                        
                                        <select class="m-wrap span1" name="time_close[]" style="width:58px;">
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?>>AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="m-wrap span1" style="width:100px;" name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>
                                                                        
										
										</div>
                                        
									</div>
                                    
                                    	<?php
									$dayname='Tuesday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$getid);
									
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
										<label class="control-label">Tuesday </label>
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
                                        
                                        <select class="m-wrap span1" name="time_open[]" style="width:58px;">
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
                                        
                                        <select class="m-wrap span1" name="time_close[]" style="width:58px;">
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?>>AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="m-wrap span1" style="width:100px;" name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>
                                        
                                                                       
										
										</div>
                                        
									</div>
                                    
                                         <?php
									$dayname='Wednesday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$getid);
									
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
										<label class="control-label">Wednesday </label>
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
                                        
                                        <select class="m-wrap span1" name="time_open[]" style="width:58px;">
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
                                        
                                        <select class="m-wrap span1" name="time_close[]" style="width:58px;">
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?> >AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="m-wrap span1" style="width:100px;" name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>                                
										
										</div>
                                        
									</div>
                                   
								   
								   
								   
                                         <?php
									$dayname='Thursday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$getid);
									
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
										<label class="control-label">Thursday </label>
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
                                        
                                        <select class="m-wrap span1" name="time_open[]" style="width:58px;">
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
                                        
                                        <select class="m-wrap span1" name="time_close[]" style="width:58px;">
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?> >AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="m-wrap span1" style="width:100px;" name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>                                
										
										</div>
                                        
									</div>
                                    
                                         <?php
									$dayname='Friday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$getid);
									
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
										<label class="control-label">Friday </label>
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
                                        
                                        <select class="m-wrap span1" name="time_open[]" style="width:58px;">
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
                                        
                                        <select class="m-wrap span1" name="time_close[]" style="width:58px;">
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?> >AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="m-wrap span1" style="width:100px;" name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>                                
										
										</div>
                                        
									</div>
                                    
									 <?php
									$dayname='Saturday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$getid);
									
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
										<label class="control-label">Saturday<?php //echo ucfirst($timetable['open_close_day']); ?> </label>
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
                                        
                                        <select class="m-wrap span1" name="time_open[]" style="width:58px;">
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
                                        
                                        <select class="m-wrap span1" name="time_close[]" style="width:58px;">
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?>>AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?>>PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="m-wrap span1" style="width:100px;" name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>                                  
										
										</div>
                                        
									</div>                                    
                                     <?php
									$dayname='Sunday';
									$timetable=$this->restaurant_model->get_timetable($dayname,$getid);
									
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
										<label class="control-label">Sunday </label>
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
                                        
                                        <select class="m-wrap span1" name="time_open[]" style="width:58px;">
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
                                        
                                        <select class="m-wrap span1" name="time_close[]" style="width:58px;">
										<option value="am" <?php if($close_am_pm=='am'){echo "selected"; }?>>AM</option>
                                        <option value="pm" <?php if($close_am_pm=='pm'){echo "selected"; }?> >PM</option>
                                        </select> 
                                        
                                        
                                        &nbsp;&nbsp;&nbsp;<select class="m-wrap span1" style="width:100px;" name="status[]"><option value="Open" <?php if($status=='Open'){echo "selected"; }?>>Open</option>
                                        <option value="Close" <?php if($status=='Close'){echo "selected"; }?>>Closed</option>
                                        </select>                                 
										
										</div>
                                        
									</div>
                                               
                                    <?php //} } ?>



<div class="control-group">
<label class="control-label">Minimum Order</label>
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
<label class="control-label">Amount free delivery </label>
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
<label class="control-label">Accept Delivery/Pickup</label>
<div class="controls">
<select name="delivery_check" id="type" class="form-control2" style="padding: 2px 5px;" >
<option value="delivery/pickup" <?php if(isset($restaurant_name['delivery_check']) && $restaurant_name['delivery_check']=='delivery/pickup'){?>selected="selected"<?php } ?>> Delivery/Pickup  </option>
<option value="delivery" <?php if(isset($restaurant_name['delivery_check']) && $restaurant_name['delivery_check']=='delivery'){?>selected="selected"<?php } ?>> Delivery  </option>
<option value="pickup" <?php if(isset($restaurant_name['delivery_check']) && $restaurant_name['delivery_check']=='pickup'){?>selected="selected"<?php } ?>> Pickup </option>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label">Delivery Charge
</label>
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
										
                               <input type="submit" name="submit" class="btn green" value="UPDATE">&nbsp;&nbsp;&nbsp;&nbsp;
                               <a href="<?php echo base_url(); ?>admin/restaurant/manage_restaurant"><button type="button" class="btn green" id="adcms">CANCEL</button></a>
										
									</div>
								</form>

                              <form action="<?php echo base_url('admin/restaurant/send_comments/'.$getid.''); ?>" method="post" class="form-horizontal">  
                                
                                <input type="hidden" value="Restaurant Information" name="comment_type">
                                
                                <div class="control-group" style="margin:345px 0px 0px 500px; width:200px; position:absolute; top:0;">
										<label class="control-label">Comment<span class="required">*</span></label>
										<div class="controls">
											<textarea id="comment" class="m-wrap span3" value="<?php echo ucfirst($restaurant_name['restaurant_name']); ?>" type="text" name="comment" style="width:250px; margin-bottom:15px;"></textarea>
                                            <br>
                                            <p><input type="submit" name="send" class="btn green" value="Send" style="width:80px; height:30px; margin-bottom:10px;"></p>
										</div>
									    </div>
                                </form>
                                
								<!-- END FORM-->
							</div>
                            
                            
                            
                            <div class="portlet-body form" id="photo_tbl" style="display:none;">
                            <?php $rest_id=$this->uri->segment(4); ?>
                         <form action="<?php echo base_url('admin/restaurant_logo/edit_restaurant_logo/'.$rest_id.''); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
                                                                <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									                                   
                                    
                                    <div class="control-group">
										<label class="control-label">Restaurant Title </label>
										<div class="controls">
											<input id="res_name" class="m-wrap span4" value="<?php echo ucfirst($restaurant_name['restaurant_name']); ?>" disabled="disabled" type="text" name="res_name"/>
										</div>
									</div>
                                    
                                    
                                     <div class="control-group">
										<label class="control-label">Restaurant Logo </label>
										<div class="controls">
											<input id="file" class="m-wrap span4" value="" type="file" name="file" />
										
                                        <?php if($restaurant_name['restaurant_logo']!=''){ ?>
                                            <img src="<?php echo base_url(); ?>image_gallery/restaurant_logo/<?php echo $restaurant_name['restaurant_logo'];?>" style="height:50px; width:50px;"/>
                                            <?php } ?>
                                            
                                            <input type="hidden" name="file_hidden1" value="<?php echo $restaurant_name['restaurant_logo'];?>"/>

                                        
                                        
                                        </div>
									</div>
                                    
                         
                                    
                                     <div class="control-group">
										<label class="control-label">Restaurant Cover Photo </label>
										<div class="controls">
										<input id="file2" class="m-wrap span4" value="" type="file" name="file2" />										
                                        
                                        <?php if($restaurant_name['cover_photo']!=''){ ?>
                                            <img src="<?php echo base_url(); ?>image_gallery/cover_photo/<?php echo $restaurant_name['cover_photo'];?>" style="height:50px; width:50px;"/>
                                            <?php } ?>
                                            
                                            <input type="hidden" name="file_hidden2" value="<?php echo $restaurant_name['cover_photo'];?>"/>
                                        
                                        </div>
									</div>
                                    
                                    
                                    <div class="control-group">
										<label class="control-label">Restaurant Description </label>
										<div class="controls">
											<textarea name="rest_desc" id="rest_desc" rows="4" class="m-wrap span4"><?php echo ucfirst($restaurant_name['restaurant_description']);?></textarea>
										</div>
									</div>
                                    
                                                               
									
									<div class="form-actions">
										
                                               <input type="submit" name="submit" class="btn green" value="UPDATE">
                                               &nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><button type="button" class="btn green" id="adcms">CANCEL</button></a>
										
									</div>
								</form>
                                
                                
                                
                                <form action="<?php echo base_url('admin/restaurant/send_comments/'.$getid.''); ?>" method="post" class="form-horizontal">
                                
                                <input type="hidden" value="Restaurant Logo" name="comment_type">                                 
                                
                                <div class="control-group" style="margin:345px 0px 0px 500px; width:200px; position:absolute; top:0;">
										<label class="control-label">Comment<span class="required">*</span></label>
										<div class="controls">
											<textarea id="comment" class="m-wrap span3" value="<?php echo ucfirst($restaurant_name['restaurant_name']); ?>" type="text" name="comment" style="width:250px; margin-bottom:15px;"></textarea>
                                            <br>
                                            <p><input type="submit" name="send" class="btn green" value="Send" style="width:80px; height:30px; margin-bottom:10px;"></p>
										</div>
									    </div>
                                </form>
                                
								<!-- END FORM-->
							</div>
                            
                            
                            <div class="portlet-body form" id="bank_tbl" style="display:none;">
<?php
$rest_id=$this->uri->segment(4);
$bank_detail = $this->restaurant_model->get_bank_detail($rest_id);
$payment_info = $this->restaurant_model->getall_payment_option();
//echo $payment;die;
?>
                            
                                                          <form action="<?php echo base_url('admin/restaurant_bank_detail/edit_bank_detail/'.$rest_id.''); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
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
										foreach($payment_info as $payment)
									    {
										
										if($payment['id']!=2)
										{
										?>
                                        
                                        <!--<input type="checkbox" name="payment_type[]" value="Direct Debit" <?php if(in_array('Direct Debit', $type)){echo "checked==checked"; } ?> /> Direct Debit  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="payment_type[]" value="Credit Card" <?php if(in_array('Credit Card', $type)){echo "checked==checked"; } ?> /> Credit Card &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="payment_type[]" value="Paypal" <?php if(in_array('Paypal', $type)){echo "checked==checked"; }?> /> Paypal--> 
                                         
                                          <input type="checkbox" name="payment_type[]" value="<?php echo $payment['payment_name']; ?>" <?php if(in_array($payment['payment_name'],$type)){?> checked="checked" <?php } ?> >&nbsp;&nbsp;&nbsp;<?php echo $payment['payment_name']; ?></br>
                                        <?php  }  }?>

										</div>
									</div>
                                    
                                    
                                    <div class="control-group">
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
                                      &nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><button type="button" class="btn green" id="adcms">CANCEL</button></a>
										
									</div>
								</form>
                                
                                
                                <form action="<?php echo base_url('admin/restaurant/send_comments/'.$getid.''); ?>" method="post" class="form-horizontal">
                                
                                <input type="hidden" value="Bank Account" name="comment_type">
                                                                 
                                <div class="control-group" style="margin:345px 0px 0px 500px;  width:200px; position:absolute; top:0;">
										<label class="control-label">Comment<span class="required">*</span></label>
										<div class="controls">
											<textarea id="comment" class="m-wrap span3" value="<?php echo ucfirst($restaurant_name['restaurant_name']); ?>" type="text" name="comment" style="width:250px; margin-bottom:15px;"></textarea>
                                            <br>
                                            <p><input type="submit" name="send" class="btn green" value="Send" style="width:80px; height:30px; margin-bottom:10px;"></p>
										</div>
									    </div>
                                </form>
								
                                <!-- END FORM-->
							</div>
                            
							
							
							
							
<div class="portlet-body form" id="commission_tbl" style="display:none;">

<?php
//$rest_id=$this->uri->segment(4);
//$bank_detail = $this->restaurant_model->get_bank_detail($rest_id);
//$/payment_info = $this->restaurant_model->getall_payment_option();
//echo $payment;die;
?>
                            
                                   <form action="<?php echo base_url('admin/restaurant_bank_detail/edit_commission/'.$rest_id.''); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
									
                                    <div id="myDiv"><?php if(isset($error) && $error!=''){?><br /><div class="error" style="margin:10px 0px;"><div id="close" style="float:right; cursor:pointer;">X</div><?=$error?></div><?php } ?></div> <br />
									                            
                                    <div class="control-group">
										<label class="control-label">Restaurant Commission<span class="required">*</span></label>
										<div class="controls">
											<input id="commission" class="m-wrap span4" value="<?php echo $restaurant_name['commission']; ?>" type="text" name="commission"/>&nbsp;%
										</div>
									</div>
                                                     
									
									<div class="form-actions">										
                                      <input type="submit" name="submit" class="btn green" value="UPDATE">
                                      
										
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

$(document).on('change','.country',function(){
var country_id= $('.country').val();
  //alert(country_id); return false;	
  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>admin/member/get_state",
            data: { country_id:country_id},
            success: function(msg){
     					//alert(msg); return false;						
				$('.city').html(msg);   						
            }
			});
			});
			});
			</script>

<script>
$(document).ready(function() {
    $("#zip_code").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>


<script>
$(document).ready(function(){
	$("#cont_info").click(function(){
	 $("#rest_tbl").hide();	
	 $("#photo_tbl").hide();
	 $("#bank_tbl").hide();
     $("#commission_tbl").hide();	 
     $("#cont_tbl").show();
    });
});

$(document).ready(function(){
	$("#rest_info").click(function(){			
     $("#cont_tbl").hide();	 
	 $("#photo_tbl").hide();
	 $("#bank_tbl").hide();
     $("#commission_tbl").hide();	 
     $("#rest_tbl").show();
    });
});

$(document).ready(function(){
	$("#rest_photo").click(function(){			
     $("#cont_tbl").hide();
	 $("#rest_tbl").hide();
	 $("#bank_tbl").hide();
     $("#commission_tbl").hide();	 
     $("#photo_tbl").show();
    });
});

$(document).ready(function(){
	$("#rest_ac").click(function(){			
     $("#cont_tbl").hide();
	 $("#rest_tbl").hide();
	 $("#photo_tbl").hide();
	 $("#commission_tbl").hide();
     $("#bank_tbl").show();
    });
});

$(document).ready(function(){
	$("#commission").click(function(){			
     $("#cont_tbl").hide();
	 $("#rest_tbl").hide();
	 $("#photo_tbl").hide();
     $("#bank_tbl").hide();
	 $("#commission_tbl").show();
    });
});


</script>


<!--<img src="../../../../public/admin/assets/img/calendar.gif">-->

</body>
<!-- END BODY -->
</html>



<style>
a {
    color: #fff;
    text-shadow: none !important;
}
.nav-tabs > li > a, .nav-pills > li > a {
    line-height: 29px;
    margin-right: 0px;
    padding-left: 20px;
    padding-right: 20px;
}
.table th, .table td {
    border-top: 1px solid #ddd;
    line-height: 32px;
    padding: 8px;
    text-align: left;
    vertical-align: top;
}

.portlet.box > .portlet-title {
    margin-bottom: -25px;
	border-bottom: 1px solid #eee;
    color: #fff !important;
	
}

.nav {
    list-style: outside none none;
    margin-bottom: -1px;
    margin-left: -10px;
	margin-top: -8px;
}

</style>

