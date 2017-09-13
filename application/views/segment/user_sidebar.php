
<?php 
$page=$this->uri->segment(1);
$page1=$this->uri->segment(2);
?>

<div class="col-md-03 pc">
    <div class="account_head">
    <h1><?php echo $this->lang->line('My Account');?></h1>
    </div>
      <div class="glossymenu">
      
 <a class="menuitem submenuheader <?php if($page1=='favourite_restaurant' || $page1=='favourite_dish'){echo "sel"; } ?>" href="<?php echo base_url();?>myaccount/favourite_restaurant"  > <i class="fa fa-star" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('My Favorites');?> <i class="fa fa-caret-down pull-right" aria-hidden="true" style="margin-top:6px;"></i>
</a>
 <div class="submenu">
	<ul>
	<li><a class="" href="<?php echo base_url();?>myaccount/favourite_restaurant"><?php echo $this->lang->line('Restaurants');?></a></li>
    <li><a href="<?php echo base_url();?>myaccount/favourite_dish"><?php echo $this->lang->line('Dishes');?></a></li>
      </ul>
</div>
 <a class="menuitem <?php if($page1=='user_order' || $page1=='view_order'){echo "sel"; } ?>" href="<?php echo base_url();?>myaccount/user_order"><i class="fa fa-history" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('Recent Orders');?></a>
 <a class="menuitem <?php if($page1=='dashboard'){echo "sel"; } ?>" href="<?php echo base_url();?>myaccount/dashboard"><i class="fa fa-user" aria-hidden="true" ></i> &nbsp; <?php echo $this->lang->line('My Account');?> </a>
 <a class="menuitem <?php if($page1=='address_book'){echo "sel"; } ?>" href="<?php echo base_url();?>myaccount/address_book" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('Address Book');?></a>
<?php /*?><a class="menuitem <?php if($page1=='payment_method'){echo "sel"; } ?>" href="<?php echo base_url();?>myaccount/payment_method"> <i class="fa fa-money" aria-hidden="true"></i> &nbsp; Payment Methods</a><?php */?>
</div>
     </div>
	 
	 
<div class="col-md-03 mobile">
    <div class="account_head">
    <h1 class="moon" style="cursor:pointer"><?php echo $this->lang->line('My Account');?> <i class="fa fa-caret-down" aria-hidden="true"></i></h1>
    </div>
      <div class="glossymenu san" style="display:none">
      
  <a class="menuitem submenuheader " href="<?php echo base_url();?>myaccount/favourite_restaurant"  > <i class="fa fa-star" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('My Favorites');?> <i class="fa fa-caret-down pull-right" aria-hidden="true" style="margin-top:6px;"></i>
</a>
 <div class="submenu">
	<ul>
	<li><a href="<?php echo base_url();?>myaccount/favourite_restaurant"><?php echo $this->lang->line('Restaurants');?></a></li>
    <li><a href="<?php echo base_url();?>myaccount/favourite_dish"><?php echo $this->lang->line('Dishes');?></a></li>
      </ul>
</div>
 <a class="menuitem <?php if($page1=='user_order' || $page1=='view_order'){echo "sel"; } ?>" href="<?php echo base_url();?>myaccount/user_order"><i class="fa fa-history" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('Recent Orders');?></a>
 <a class="menuitem <?php if($page1=='dashboard'){echo "sel"; } ?>" href="<?php echo base_url();?>myaccount/dashboard"><i class="fa fa-user" aria-hidden="true" ></i> &nbsp; <?php echo $this->lang->line('My Account');?> </a>
 <a class="menuitem <?php if($page1=='address_book'){echo "sel"; } ?>" href="<?php echo base_url();?>myaccount/address_book" > <i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp; <?php echo $this->lang->line('Address Book');?></a>
 
</div>
     </div>	 
	 
	 
