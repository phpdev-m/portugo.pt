<?php
date_default_timezone_set('America/Barbados');
$session_data=$this->session->userdata('restaurant_logged_in');
$id = $session_data['id'];

$language_data=$this->session->userdata('language');

if($language_data==''){
$language_data=array('language' =>'purtgal');
}

if(!empty($language_data)){
$this->lang->load($language_data['language'], $language_data['language']);
}
$page=$this->uri->segment(1);

$this->load->model('restaurant/cuisine_model');
?>
<link rel="icon" href="<?php echo base_url();?>public/images/favicon.png" type="image/x-icon" />
<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="<?php echo base_url('restaurant/dashboard'); ?>">
                <img src="<?php echo base_url('public/restaurant/assets/img/logo.png'); ?>" alt="Logo" />
				</a>
				<a class="btn-navbar collapsed" href="javascript:;" data-toggle="collapse" data-target=".nav-collapse">
<img src="<?php echo base_url();?>public/admin/assets/img/menu-toggler.png" alt="">
</a>
        <!--<?php
		
		$counts_view = $this->cuisine_model->view_new_order_count($id);
		$view = $this->cuisine_model->view_new_order($id);
		?>
  <?php
   if($id==$view['restaurant_id']) {?>
   <a href="<?php echo base_url(); ?>restaurant/order/pending_order" ><img src="<?php echo base_url();?>image_gallery/restaurant_logo/school-bell.png" style="margin-top:5px;align:center;margin-left:600px;height:30px;width:40px;"/></a> <?php echo $counts_view; ?>&nbsp;New Order Notification
   <?php } ?>-->
				
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
                
                  
				<ul class="nav pull-right">	
                
                <li>
                            
            <form id="language" name="language_select" action="" method="post" >
            <select name="lang_sel" id="" class="select deepak mycomp" style="width:105px; margin-top:5px;" data-maincss="blue">
            <option  title="<?php echo base_url();?>public/front/images/pr.png" <?php if($language_data['language']=='purtgal'){ echo "selected==selected"; } ?> value="purtgal" class="pr_img"><?php echo utf8_encode('Português');?></option>
            <option  title="<?php echo base_url();?>public/front/images/en.png" <?php if($language_data['language']=='english'){ echo "selected==selected"; } ?> value="english"  class="en_img">English</option>
            
            <input type="hidden" id="page_name" value="<?php echo $page; ?>">
			</select>
            
            </form>
            
            
                </li>
                
                			
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						
						<img alt="Admin Avatar" src="<?php if($$restaurant['restaurant_logo']!=''){echo base_url('./image_gallery/restaurant_logo/thumb/'.$restaurant['restaurant_logo']);}else{echo base_url('./image_gallery/restaurant_logo/noimg.jpg');} ?>" height="30" width="30" />
                       
						<span class="username"><?php echo ucfirst($session_data['contact_name']); ?> </span>
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
						<li><a href="<?php echo base_url('restaurant/login/logout');?>"><i class="icon-key"></i> Log Out</a></li>
						</ul>
					</li>
                         
                         
                                        
					<!-- END USER LOGIN DROPDOWN -->
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU --> 
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
    
<style>
@media (max-width: 768px) {
.table-responsive {
    border: 1px solid #ddd;
    margin-bottom: 15px;
    overflow-x: scroll;
    overflow-y: hidden;
    width: 100%;
}
}
</style>