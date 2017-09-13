<?php
date_default_timezone_set('America/Barbados');
?>
<link rel="icon" href="<?php echo base_url();?>public/images/favicon.png" type="image/x-icon" />
<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="<?php echo base_url('admin/dashboard'); ?>">
                
				<img src="<?php echo base_url('public/admin/assets/img/logo.png'); ?>" alt="Logo" />
        
				</a>
				<a class="btn-navbar collapsed" href="javascript:;" data-toggle="collapse" data-target=".nav-collapse">
<img src="<?php echo base_url();?>public/admin/assets/img/menu-toggler.png" alt="">
</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			       
				<ul class="nav pull-right">
					<?php $session_data=$this->session->userdata('logged_in'); 
					
	$admin=mysql_fetch_assoc(mysql_query("select *  from  admin where  id='".$session_data['id']."'"));
			//echo '<pre>';
			//print_r($admin);die;		
					?>
				
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<?php if($admin['profile_picture']!='' && file_exists('public/admin/admin_image/'.$admin['profile_picture'])){?>
						<img alt="Admin Avatar" src="<?php echo base_url('public/admin/admin_image/'.$admin['profile_picture']); ?>" height="29" width="29" />
						<?php }  else{?>
						<img alt="Admin Avatar" src="<?php echo base_url('public/admin/assets/img/avatar1_small.jpg'); ?>" />
						<?php } ?>
						
						<span class="username"><?php echo ucfirst($session_data['username']); ?> </span>
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
						<li><a href="<?php echo base_url('admin/login/logout');?>"><i class="icon-key"></i> Log Out</a></li>
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