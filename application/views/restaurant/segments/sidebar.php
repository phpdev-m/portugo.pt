<?php
$session_data=$this->session->userdata('restaurant_logged_in');		    
$rest_id=$session_data['id'];
//print_r($session_data);die;
$this->load->model('restaurant/cuisine_model');
$manage_sidebar= $this->cuisine_model->restaurant_logo($rest_id);
//print_r($manage_sidebar);die;
?>
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
					<a href="<?php echo base_url('restaurant/dashboard'); ?>">
					<i class="icon-home"></i> 
					<span class="title"><?php echo $this->lang->line('Rest_Dashboard');?></span>
					<span class="selected"></span>
					</a>
				</li>
                
				<li <?php if($this->uri->segment(2)=="restaurant_logo" || $this->uri->segment(3)=="payment" || $this->uri->segment(2)=="restaurant_bank_detail" || $this->uri->segment(2)=="settings" || $this->uri->segment(3)=="edit_restaurant" || $this->uri->segment(3)=="edit_timetable"){echo 'class="start active"'; }?>>
     <a href="javascript:;">
     <i class="icon-cog"></i> 
     <span class="title"><?php echo $this->lang->line('Rest_Settings');?></span>
     <span class="arrow "></span>
     </a>
     <ul class="sub-menu">
     
	    <li <?php if($this->uri->segment(3)=="edit_restaurant"){echo 'class="start active"'; }?>>
		<a href="<?php echo base_url('restaurant/restaurant/edit_restaurant/'); ?>">
		<?php echo $this->lang->line('Rest_Account');?></a>
		</li>
        
        <li <?php if($this->uri->segment(3)=="edit_timetable"){echo 'class="start active"'; }?>>
		<a href="<?php echo base_url('restaurant/restaurant/edit_timetable/'); ?>">
		General Information</a>
		</li>
		
		<!--<li <?php if($this->uri->segment(2)=="restaurant_bank_detail"){echo 'class="start active"'; }?>>
		<a href="<?php echo base_url('restaurant/restaurant_bank_detail/edit_bank_detail'); ?>">
		Bank A/C Detail</a>
		</li>-->
		
		<li <?php if($this->uri->segment(3)=="payment"){echo 'class="start active"'; }?>>
		<a href="<?php echo base_url('restaurant/restaurant_bank_detail/payment'); ?>">
		<?php echo $this->lang->line('Rest_Payment');?></a>
		</li>
		
		<li <?php if($this->uri->segment(2)=="restaurant_logo"){echo 'class="start active"'; }?>>
		<a href="<?php echo base_url('restaurant/restaurant_logo/edit_restaurant_logo'); ?>">
		<?php echo $this->lang->line('Rest_Logo');?></a>
		</li>
		
	 
        <li <?php if($this->uri->segment(3)=="change_password"){echo 'class="start active"'; }?>>
        <a href="<?php echo base_url('restaurant/settings/change_password');?>"><?php echo $this->lang->line('Password_Settings');?></a>
        </li>
		
		 <li <?php if($this->uri->segment(3)=="delivery_postcode"){echo 'class="start active"'; }?>>
        <a href="<?php echo base_url('restaurant/settings/delivery_postcode');?>"><?php echo $this->lang->line('Order_Delivery_Postcode');?></a>
        </li>
                      
      
     </ul>
    </li>
				
				
				
                <li <?php if($this->uri->segment(3)=="restaurant_cuisine" || $this->uri->segment(3)=="add_cuisine"){echo 'class="start active"'; }?>>
     <a href="javascript:;">
     <i class="icon-globe"></i> 
     <span class="title"><?php echo $this->lang->line('Rest_Cuisine');?></span>
     <span class="arrow "></span>
     </a>
     <ul class="sub-menu">
      
      <li <?php if($this->uri->segment(3)=="add_cuisine"){echo 'class="start active"'; }?>>
	<a href="<?php echo base_url('restaurant/cuisine/add_cuisine'); ?>">
	<?php echo $this->lang->line('Rest_Add_Cuisine');?></a>
	</li>     
     
      <li <?php if($this->uri->segment(3)=="restaurant_cuisine"){echo 'class="start active"'; }?>>
	<a href="<?php echo base_url('restaurant/cuisine/restaurant_cuisine'); ?>">
	<?php echo $this->lang->line('Rest_Manage_Cuisine');?></a>
	</li>
      </ul>
      </li> 
                
                <li <?php if($this->uri->segment(3)=="manage_category" || $this->uri->segment(3)=="add_category" || $this->uri->segment(3)=="edit_category"){echo 'class="start active"'; }?> >
                
					<a href="javascript:;">
					<i class="icon-food"></i>
					<span class="title"><?php echo $this->lang->line('Rest_Category'); ?></span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
                         
                        <!-- <li <?php if($this->uri->segment(3)=="add_category"){echo 'class="start active"'; }?>>
							<a href="<?php echo base_url('restaurant/category/add_category'); ?>">
							Add Category</a>
						</li>-->
                         
                         <li <?php if($this->uri->segment(3)=="manage_category" || $this->uri->segment(3)=="edit_category"){echo 'class="start active"'; }?>>
							<a href="<?php echo base_url('restaurant/category/manage_category'); ?>">
							<?php echo $this->lang->line('Rest_Manage_Category'); ?></a>
						</li>
                        
					</ul>
				</li>
                
      <li <?php if($this->uri->segment(3)=="manage_menu" || $this->uri->segment(3)=="edit_menu" || $this->uri->segment(3)=="add_menu" || $this->uri->segment(3)=="view" || $this->uri->segment(3)=="addons"){echo 'class="start active"'; }?>>
     <a href="javascript:;">
     <i class="icon-food"></i> 
     <span class="title">Menu</span>
     <span class="arrow "></span>
     </a>
     <ul class="sub-menu">
     
     <li <?php if($this->uri->segment(3)=="add_menu"){echo 'class="start active"'; }?>>
	  <a href="<?php echo base_url('restaurant/category_menu/add_menu'); ?>">
	  Add Menu</a>
	  </li>
     
      <li <?php if($this->uri->segment(3)=="manage_menu" || $this->uri->segment(3)=="edit_menu" || $this->uri->segment(3)=="view" || $this->uri->segment(3)=="addons"){echo 'class="start active"'; }?>>
	  <a href="<?php echo base_url('restaurant/category_menu/manage_menu'); ?>">
	  <?php echo $this->lang->line('Rest_Manage_Menu'); ?></a>
	  </li>
      </ul>
      </li> 

	
    
    <?php if($manage_sidebar['approval_status']=='1'){?>
    
     
     <li <?php if($this->uri->segment(3)=="all" || $this->uri->segment(3)=="accepted" || $this->uri->segment(3)=='pending' || $this->uri->segment(3)=='order_view' || $this->uri->segment(3)=='order_edit' ){echo 'class="start active"'; }?>>
     <a href="javascript:;">
     <i class="icon-shopping-cart"></i> 
     <span class="title"><?php echo $this->lang->line('Rest_Order'); ?></span>
     <span class="arrow "></span>
     </a>
     <ul class="sub-menu">
    
	  
	   <li <?php if($this->uri->segment(3)=='all' || $this->uri->segment(3)=='order_view' || $this->uri->segment(3)=='order_edit'){ echo 'class="active"';}?>>
       <a href="<?php echo base_url('restaurant/order/all');?>">
       <?php echo $this->lang->line('Rest_All_Orders'); ?></a>
      </li>
	  
	  <li <?php if($this->uri->segment(3)=='accepted' || $this->uri->segment(3)=='order_view' || $this->uri->segment(3)=='order_edit'){ echo 'class="active"';}?>>
       <a href="<?php echo base_url('restaurant/order/accepted');?>">
       <?php echo $this->lang->line('Rest_Accepted_Orders'); ?></a>
      </li>
	  
	  
	  
	  
	  <li <?php if($this->uri->segment(3)=='pending' || $this->uri->segment(3)=='order_view' || $this->uri->segment(3)=='order_edit'){ echo 'class="active"';}?>>
       <a href="<?php echo base_url('restaurant/order/pending');?>">
       <?php echo $this->lang->line('Rest_Pending_Orders'); ?></a>
      </li>
	  
      </ul>
  </li>
	   
 
 
 
      
          <li <?php if($this->uri->segment(2)=="payment" || $this->uri->segment(2)=="report"){echo 'class="start active"'; }?>>
     <a href="javascript:;">
     <i class="icon-list-alt"></i> 
     <span class="title">Report</span>
     <span class="arrow "></span>
     </a>
     <ul class="sub-menu">
         <li <?php if($this->uri->segment(2)=="report" || $this->uri->segment(3)=="report_view"){echo 'class="start active"'; }?>>
       <a href="<?php echo base_url('restaurant/report'); ?>">
       <?php echo $this->lang->line('Rest_Manage_Reports'); ?></a>
      </li>
      
     </ul>
    </li> 

    
    <?php /*?><li <?php if($this->uri->segment(2)=="invoice"){echo 'class="start active"'; }?>>
     <a href="javascript:;">
     <i class="icon-usd"></i>
     <span class="title">Invoice</span>
     <span class="arrow "></span>
     </a>
     <ul class="sub-menu">
         <li <?php if($this->uri->segment(2)=="invoice" || $this->uri->segment(3)=="invoice_view"){echo 'class="start active"'; }?>>
       <a href="<?php echo base_url('restaurant/invoice'); ?>">
       Manage Invoices</a>
      </li>
                             
     </ul>
    </li><?php */?>
    
    
    
   
    <li <?php if($this->uri->segment(3)=="create_invoice" || $this->uri->segment(3)=="track_invoice" || $this->uri->segment(3)=="cash_in"  ){echo 'class="start active"'; }?> >
					<a href="javascript:;">
					<i class="icon-eur"></i> 
					<span class="title"><?php echo $this->lang->line('Rest_Finance'); ?></span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
					
						<li <?php 

                                                    if($this->uri->segment(3)=='create_invoice'){ echo 'class="active"';}?>>
							<a href="<?php echo base_url('restaurant/invoice/create_invoice'); ?>">
							Create Invoice</a> 
						</li> 
						
						<li <?php if($this->uri->segment(3)=='track_invoice' ){ echo 'class="active"';}?>>
							<a href="<?php echo base_url('restaurant/invoice/track_invoice'); ?>">
							<?php echo $this->lang->line('Rest_Cash_Out'); ?></a>
						</li>
						
							<li <?php if($this->uri->segment(3)=='cash_in' ){ echo 'class="active"';}?>>
							<a href="<?php echo base_url('restaurant/invoice/cash_in'); ?>">
							<?php echo $this->lang->line('Rest_Cash_In'); ?></a>
						</li>
						
						
						
					</ul>
				</li>
				
	
    <?php } ?>
      
      
      
                
                
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
