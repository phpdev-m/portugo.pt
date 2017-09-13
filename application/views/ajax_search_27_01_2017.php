<?php 

require_once(APPPATH.'libraries/config.php');

	  $session_user_id=$this->session->userdata('session_search_data');
	  $language_data=$this->session->userdata('language');

if($language_data==''){
$language_data=array('language' =>'purtgal');
}

if(!empty($language_data)){
$this->lang->load($language_data['language'], $language_data['language']);
}
$page=$this->uri->segment(1);


	  ?>
	  <div class="right_pan pc">
<?php
	  if(!empty($restaurant_search)){
	  
	  foreach($restaurant_search as $key=>$all_restaurant){
	  $date=date("l");
	       $today = $this->restaurant_model->time_table($all_restaurant['id'],$date);
	  //print_r($today); die;
	   $review=$this->search_model->get_restaurant_review($all_restaurant['id']);
	  ?>
      
      <div class="cuisine_col">
       <div class="col-sm-4">
        <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><div class="resbg" style="background:rgba(0, 0, 0, 0) url('<?php echo base_url();?>image_gallery/cover_photo/<?php echo $all_restaurant['cover_photo'];?>') no-repeat scroll center top / cover ;">
          <img src="<?php echo base_url();?>public/front/images/res_bg.png"  />
		   <?php
		  if($all_restaurant['restaurant_logo']!='' && file_exists('image_gallery/restaurant_logo/'.$all_restaurant['restaurant_logo']))
		  {?>
		  <img src="<?php echo base_url();?>image_gallery/restaurant_logo/<?php echo $all_restaurant['restaurant_logo']; ?>"  style="position:absolute; top:0; left:
          0px; margin:38px 0 0 26px; width:72px; height:77px;"/>
		  <?php } else {?>
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  style="position:absolute; top:0; left:
          0px; margin:38px 0 0 26px"/>
		  <?php } ?>
          </div></a>
       </div>
       <div class="col-sm-8 padding_main">
       <div class="col-sm-8">
       <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><h1><?php echo $all_restaurant['restaurant_name'];?></h1></a>
       <h2 style="font-size:14px;"><?php echo substr(stripslashes(strip_tags($all_restaurant['restaurant_description'])),0,150); if(strlen($all_restaurant['restaurant_description'])>150){echo ".....";}?></h2>
       
       
<h4 style="color:#ffbf00;">
<?php
$rat_val = $all_restaurant['avg_rating'];
for($i=1;$i<=5;$i++){?>
<?php
if($rat_val>=$i){?>
<i class="fa fa-star"></i>
<?php }else{ ?>

<i class="fa fa-star-o"></i>
<?php } }?>
<span style="color:#333">(<?php echo count($review); ?>)</span>
<?php //echo $all_restaurant['cuisine_types'];?>
</h4>
       
       </div>
       <div class="col-sm-4">
       <h4><?php echo $this->lang->line('Rating');?>: <span><?php echo $all_restaurant['avg_rating'];?></span></h4>
       <h4><?php echo $this->lang->line('Minimum Order');?>: <span><?php echo $dollar; ?><?php echo $all_restaurant['min_order'];?> </span></h4>
       <h4><?php echo $this->lang->line('Delivery Charges');?>:  <span><?php echo $dollar; ?><?php echo $all_restaurant['delivery_charges'];?></span></h4>
       <h4><?php echo $this->lang->line('Delivery');?>:  <span><?php echo $all_restaurant['delivery_time_min'];?> <?php echo $this->lang->line('mints');?> </span></h4>
       <h4>
	   <?php
	   if(@$today['status']=='Open')
	   {?>
	   <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><button class="btn_order" type="submit" style="font-size:12px;"><?php echo $this->lang->line('Place order');?></button></a>
	   <?php } else{?>
	   <a href="javascript:void(0);" data-target="#myModal" data-toggle="modal"><button class="btn_order" type="submit" style="font-size:12px;"><?php echo $this->lang->line('Place order');?></button></a>
	   <?php } ?>
	   
	   </h4>
       </div>
       </div>      
       </div>
       
      <?php } 
	  
	  }else{?>
	  <div class="cuisine_col" style="margin-bottom:100px;">
       <div class="col-sm-12">
        <center><h1><?php echo $this->lang->line('No_Find_Restaurant');?> </h1></center>
		<br />
		
       </div>
             
       </div>
	 
	  <?php }?>
	  </div>
      
	  
	  <div class="right_pan mobile">
      <?php
	  if(!empty($restaurant_search)){
	  foreach($restaurant_search as $key=>$all_restaurant){
	  $date=date("l");
	       $today = $this->restaurant_model->time_table($all_restaurant['id'],$date);
	  //print_r($today); die;
	   $review=$this->search_model->get_restaurant_review($all_restaurant['id']);
	  ?>
	  
      <div class="cuisine_col">
     <div class="col-sm-12">  <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><h1><?php echo $all_restaurant['restaurant_name'];?></h1></a></div>
     <div class="col-sm-12">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" valign="top">
   
		   <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><div class="resbg" style="background:rgba(0, 0, 0, 0) url('<?php echo base_url();?>image_gallery/cover_photo/<?php echo $all_restaurant['cover_photo'];?>') no-repeat scroll center top / cover ; float:left;  margin: 10px 10px 10px 0;
    max-width: 100%; height:88px;">
          <img src="<?php echo base_url();?>public/front/images/res_bg_mobile.png"  height="88" width="100"  />
          <?php
		  if($all_restaurant['restaurant_logo']!='' && file_exists('image_gallery/restaurant_logo/'.$all_restaurant['restaurant_logo']))
		  {?>
		  <img src="<?php echo base_url();?>image_gallery/restaurant_logo/<?php echo $all_restaurant['restaurant_logo']; ?>"  style="position:absolute; top:0; left:
          0px; margin:24px 0 0 24px; height:50px;"/><?php } else {?>
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  style="position:absolute; top:0; left:
          0px; margin:24px 0 0 24px; height:50px;"/>
		  <?php } ?>
          </div></a>
          <font style="color:#ffbf00;">
    
<?php
$rat_val = $all_restaurant['avg_rating'];
for($i=1;$i<=5;$i++){?>
<?php
if($rat_val>=$i){?>
<i class="fa fa-star"></i>
<?php }else{ ?>

<i class="fa fa-star-o"></i>
<?php } }?>
<span style="color:#333">(<?php echo count($review); ?>)</span>


</font>
<h4><?php echo $this->lang->line('Rating');?>: <span><?php echo $all_restaurant['avg_rating'];?></span> <br /><?php echo $this->lang->line('Minimum Order');?>: <span><?php echo $dollar; ?><?php echo $all_restaurant['min_order'];?> </span><br /> <?php echo $this->lang->line('Delivery Charges');?>:  <span><?php echo $dollar; ?><?php echo $all_restaurant['delivery_charges'];?></span> <br /><?php echo $this->lang->line('Delivery');?>:  <span><?php echo $all_restaurant['delivery_time_min'];?> <?php echo $this->lang->line('mints');?> </span></h4>
          <h2><?php echo substr(stripslashes(strip_tags($all_restaurant['restaurant_description'])),0,70); if(strlen($all_restaurant['restaurant_description'])>70){echo ".....";}?>  <br />

 <?php
	   if(@$today['status']=='Open')
	   {?>
	   <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><button class="btn_order" style="margin:18px 0px 0px 0px;" type="submit"><?php echo $this->lang->line('Place order');?></button></a>
	   <?php } else{?>
	   <a href="javascript:void(0);" data-target="#myModal" data-toggle="modal"><button class="btn_order" style="margin:18px 0px 0px 0px;" type="submit"><?php echo $this->lang->line('Place order');?></button></a>
	   <?php } ?>
</h2>
    </td>
  </tr>
</table>
       </div>
       </div>
        <?php } }else{?>
	 <div class="cuisine_col" style="margin-bottom:100px;">
       <div class="col-sm-12">
        <center><h1><?php echo $this->lang->line('No_Find_Restaurant');?></h1></center>
		<br />
		
       </div>
             
       </div>
	 
	  <?php }?>
       
      </div>