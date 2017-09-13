<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        
			<ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li>
					
				</li>
				<li <?php if($this->uri->segment(2)=="dashboard"){echo 'class="start active"'; }?>>
					<a href="<?php echo base_url('admin/dashboard'); ?>">
					<i class="icon-home"></i> 
					<span class="title">Dashboard</span>
					<span class="selected"></span>
					</a>
				</li>
                
                                
                 <li <?php if($this->uri->segment(2)=="user"){echo 'class="start active"'; }?>>
					<a href="javascript:;">
					<i class="icon-group"></i> 
					<span class="title">User Management</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li <?php if($this->uri->segment(2)=='user' ||$this->uri->segment(3)=='edit_user' || $this->uri->segment(3)=='add_user' || $this->uri->segment(3)=='view_user' ){ echo 'class="active"';}?>>
							<a href="<?php echo base_url('admin/user'); ?>">
							Manage Users</a>
						</li>
						
					</ul>
				</li>
                       
					   
					   <li <?php if($this->uri->segment(2)=="cuisine" && $this->uri->segment(3)!="restaurant_cuisine" ){echo 'class="start active"'; }?>>
					<a href="javascript:;">
					<i class="icon-group"></i> 
					<span class="title">Manage Cuisine</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li <?php if($this->uri->segment(2)=="cuisine" && $this->uri->segment(3)==""){ echo 'class="active"';}?>>
							<a href="<?php echo base_url('admin/cuisine/mamage_cuisine'); ?>">
							Manage Cuisine</a>
						</li>
						
					</ul>
				</li>
                       
					   
					   
               
                
                <li <?php if($this->uri->segment(3)=="manage_restaurant" || $this->uri->segment(2)=="category_menu" || $this->uri->segment(3)=="add_restaurant" || $this->uri->segment(3)=="edit_restaurant" || $this->uri->segment(2)=="category" || $this->uri->segment(3)=="restaurant_cuisine"){echo 'class="start active"'; }?>>
					<a href="javascript:;">
					<i class="icon-food"></i>
					<span class="title">Restaurant Management</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
                    
						<li <?php if($this->uri->segment(3)=="manage_restaurant"){echo 'class="start active"'; }?>>
							<a href="<?php echo base_url('admin/restaurant/manage_restaurant'); ?>">
							Manage Restaurants</a>
						</li>
                      
					</ul>
                    
				</li>
                        
				
				
				<li <?php if($this->uri->segment(2)=="order"){echo 'class="start active"'; }?>>
     <a href="javascript:;">
     <i class="icon-shopping-cart"></i> 
     <span class="title">Order Management</span>
     <span class="arrow "></span>
     </a>
     <ul class="sub-menu">
      <li <?php if($this->uri->segment(2)=='order'){ echo 'class="active"';}?>>
       <a href="<?php echo base_url('admin/order');?>">
       Manage Orders</a>
      </li>
      
     </ul>
	 
    </li><li <?php if($this->uri->segment(2)=="payment" || $this->uri->segment(2)=="report"){echo 'class="start active"'; }?>>
					<a href="javascript:;">
					<i class="icon-usd"></i> 
					<span class="title">Report Management</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
					    <li <?php if($this->uri->segment(2)=="report" || $this->uri->segment(3)=="report_view"){echo 'class="start active"'; }?>>
							<a href="<?php echo base_url('admin/report'); ?>">
							Manage Reports</a>
						</li>
					
						<!--<li <?php if($this->uri->segment(2)=="payment"){echo 'class="start active"'; }?>>
							<a href="<?php echo base_url('admin/payment/manage_payment'); ?>">
							Manage Payments</a>
						</li>-->
						
						
					</ul>
				</li>
                      
                                            
                
                <li <?php if($this->uri->segment(2)=="invoice"){echo 'class="start active"'; }?>>
					<a href="javascript:;">
					<i class="icon-group"></i>
					<span class="title">Invoice Management</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
					    <li <?php if($this->uri->segment(2)=="invoice" || $this->uri->segment(3)=="invoice_view"){echo 'class="start active"'; }?>>
							<a href="<?php echo base_url('admin/invoice'); ?>">
							Manage Invoices</a>
						</li>
                        					
					</ul>
				</li>
                
                
                				
                 <li <?php if($this->uri->segment(2)=="cms" && $this->uri->segment(3)!="add_subscription" && $this->uri->segment(3)!="manage_subscription"){echo 'class="start active"'; }?>>
					<a href="javascript:;">
					<i class="icon-folder-open"></i> 
					<span class="title">Manage Cms</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li <?php if($this->uri->segment(2)=="cms" && $this->uri->segment(3)!="add_subscription" && $this->uri->segment(3)!="manage_subscription"){echo 'class="start active"'; }?>>
							<a href="<?php echo base_url('admin/cms'); ?>">
							Manage Cms</a>
						</li>
						
					</ul>
				</li>
                
                
                
                <li <?php if($this->uri->segment(2)=="faq" && $this->uri->segment(3)!="add_faq" && $this->uri->segment(3)!="manage_faq"){echo 'class="start active"'; }?>>
					<a href="javascript:;">
					<i class="icon-folder-open"></i> 
					<span class="title">Manage Faq</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li <?php if($this->uri->segment(2)=="faq" && $this->uri->segment(3)!="add_faq" && $this->uri->segment(3)!="manage_faq"){echo 'class="start active"'; }?>>
							<a href="<?php echo base_url('admin/faq'); ?>">
							Manage Faq</a>
						</li>
						
					</ul>
				</li>
                
                
                
                <li <?php if($this->uri->segment(2)=="signup_content" && $this->uri->segment(3)!="edit_signup_content" && $this->uri->segment(3)!="signup_content_manage"){echo 'class="start active"'; }?>>
					<a href="javascript:;">
					<i class="icon-folder-open"></i> 
					<span class="title">Signup Content Manage</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li <?php if($this->uri->segment(2)=="faq" && $this->uri->segment(3)!="add_faq" && $this->uri->segment(3)!="manage_faq"){echo 'class="start active"'; }?>>
							<a href="<?php echo base_url('admin/signup_content'); ?>">
							Signup Content Manage</a>
						</li>
						
					</ul>
				</li>
                
				
                
                <li <?php if($this->uri->segment(2)=="seo"){echo 'class="start active"'; }?>>
     <a href="javascript:;">
     <i class="icon-cog"></i> 
     <span class="title">Seo Settings</span>
     <span class="arrow "></span>
     </a>
     <ul class="sub-menu">
      <!--<li <?php if($this->uri->segment(3)=='logo' || $this->uri->segment(3)=='add_logo' || $this->uri->segment(3)=='edit_logo'){ echo 'class="active"';}?>>
       <a href="<?php echo base_url('admin/seo/logo');?>">
       Manage Logo</a>
      </li>-->
      
	  <li <?php if($this->uri->segment(3)=='tittle' || $this->uri->segment(3)=='add_tittle' || $this->uri->segment(3)=='view_tittle'  || $this->uri->segment(3)=='edit_tittle'){ echo 'class="active"';}?>>
       <a href="<?php echo base_url('admin/seo/tittle');?>">
       Seo Title</a>
      </li>
	  
	  
	  
     </ul>
    </li>
      
                <li <?php if($this->uri->segment(2)=="settings"){echo 'class="start active"'; }?>>
					<a href="javascript:;">
					<i class="icon-lock"></i> 
					<span class="title">Admin Settings</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<!--<li >
							<a href="<?php echo base_url('admin/settings/account');?>">Account&nbsp;Setting</a>
						</li>-->
						<li <?php if($this->uri->segment(3)=="payment"){echo 'class="start active"'; }?>>
							<a href="<?php echo base_url('admin/settings/payment');?>">Payment</a>
						</li>
						<li <?php if($this->uri->segment(3)=="profile_pricture"){echo 'class="start active"'; }?>>
							<a href="<?php echo base_url('admin/settings/profile_pricture');?>">Profile&nbsp;Picture</a>
						</li>
                        <li <?php if($this->uri->segment(3)=="change_password"){echo 'class="start active"'; }?>>
							<a href="<?php echo base_url('admin/settings/change_password');?>">Password&nbsp;Settings</a>
						</li>

                                              <!--<li class="start active"> 
                                                    <a href="<?php echo base_url('admin/settings/reset_orders');?>">Reset Orders</a>
                                                     </li> ?>-->
                        

                        
                        
						
					</ul>
				</li>
                
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
