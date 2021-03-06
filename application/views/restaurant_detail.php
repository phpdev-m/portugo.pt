<?php
//echo '<pre>';

$session_user_id=$this->session->userdata('session_search_data');
require_once(APPPATH.'libraries/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="icon" href="<?php echo base_url();?>public/images/logoportugo.png">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
 <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>public/front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>public/front/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/front/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/front/css/font.css" rel="stylesheet">
     <!-- ...............add................-->
    <link href="<?php echo base_url();?>public/front/css/new_css.css" rel="stylesheet">
     <!-- ...............add................-->
     <link href="<?php echo base_url();?>public/front/css/jquery-ui.css" rel="stylesheet">
<!--<script type="text/javascript" src="<?php //echo base_url();?>public/front/js/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/bootstrap.min.js"></script>
<!--<script src="js/scrolltopcontrol.js"></script>-->


<title>PortuGo</title>
</head>
<body>


<?php $this->load->view('segment/header'); 
?> 
  
  <div class=" inner_wrapper wrap_margin">
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12">
       <a href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('Home')?></a>&nbsp;  / &nbsp; <a href="<?php echo base_url(); ?>search"><?php echo $this->lang->line('Restaurant')?></a>&nbsp;/ &nbsp;<?php echo $this->lang->line('Restaurant Detail')?>
      </div>
      </div>
   </div>
   <div class=" res_wrapper">
   <div class="container">
   <div class="col-md-12 padding_main" style="margin-top:30px;">
     <div class="col-md-8">
      <div class="restaurant_top">
	  
       <h1 style="font-size:22px;"><?php echo ucfirst($restaurant_all_details['restaurant_name']);?></h1>
       
       
       
       <!--<?php
	   
           $rest_id=$_GET['id'];
	 
	   @$session_data = $this->session->userdata('user_logged_in');
				if(@$session_data['user_id']==""){?>
	  <a href="javascript:void(0);" data-target="#myModal" data-toggle="modal"> <img src="<?php echo base_url('public/front/images/heart_gray.png'); ?>" style="float:right; cursor:pointer;" id="fav" class="fav"  alt="Add to favourite"></a>
	   <?php }else{ 
	 
	   $customer_id=@$session_data['user_id'];	  
	   $fav_num=$this->restaurant_model->check_fav_restaurant($customer_id,$rest_id);
	   if($fav_num==0)
	   {
	   ?>
	    <img src="<?php echo base_url('public/front/images/heart_gray.png'); ?>" style="float:right; cursor:pointer;" id="fav" class="add_fav " alt="Add to favourite">
	   <?php } else {  ?>
	   
	   <img src="<?php echo base_url('public/front/images/heart_red.png'); ?>" style="float:right; cursor:pointer;" id="fav" class="remove_fav " alt="Remove from favourite">
	   <?php 
	   } } ?>-->      
       
       
       
       <p><?php echo substr(stripslashes(strip_tags($restaurant_all_details['restaurant_description'])),0,150);?></p>
	    <p><?php echo $this->lang->line('Email');?>:&nbsp;<?php echo $restaurant_all_details['contact_email'];?>&nbsp;&nbsp;<?php echo $restaurant_all_details['website'];?></p>
		<p><?php echo $this->lang->line('Phone Number');?>:&nbsp;<?php echo $restaurant_all_details['restaurant_phone'];?></p>
       <p> &nbsp;<?php echo ucfirst($restaurant_all_details['address'].', '.$restaurant_all_details['city'].', '.$restaurant_all_details['postcode']);?>&nbsp;<span>.</span>&nbsp;<span></p>
       <h5 style="padding:15px 0px 6px 15px;"><?php echo $this->lang->line('Today');?></h5>
	   <?php  $date=date("l");
	       $today = $this->restaurant_model->time_table($restaurant_all_details['id'],$date);
		  // print_r($today); die;
		   $opening = explode(' ', $today['opening_time']);
		   $open = $opening[0];
		   $open1 = $opening[1];
		   $clossing = explode(' ', $today['closing_time']);
		   $close = $clossing[0];
		   $close1 = $clossing[1];
	   ?>
       <p><?php echo $this->lang->line('Opening Hours');?> :&nbsp;<?php echo $open.' '.strtoupper($open1);?> &nbsp;&nbsp;<?php echo $this->lang->line('Closing Hours');?> :&nbsp;<?php echo $close.' '.strtoupper($close1);?></p>
       
       <h5 style="padding:15px 0px 6px 15px;"><?php echo $this->lang->line('Cuisines');?></h5>
       <p>
	    <?php 
		$cuisine_id = @explode(',', $restaurant_all_details['cuisine_types']);
		$sn=0;
		foreach($cuisine_id as $cuisine){
			
		$cusine = $this->restaurant_model->cuisine($cuisine); 


		foreach($cusine as $data){
		if($data['status']==1)
		{
		?>
			<span><a href="#"><?php echo $data['cuisine_name']; ?></a></span>
			
		<?php } } }$sn++; ?>
		
       </p>
       
      </div>
     </div>
           <div class="col-md-4">
           <div class="resbg" style="background:rgba(0, 0, 0, 0) url('<?php echo base_url();?>image_gallery/cover_photo/<?php echo $restaurant_all_details['cover_photo'];?>') no-repeat scroll center top / cover ;">
  
         <img src="<?php echo base_url();?>public/front/images/res_bg.png"  />
         
          <div style="position:absolute; top:0; left: 0px; margin:15px 0 0 22px">
          <div class="frame">
		  <?php
		  if($restaurant_all_details['restaurant_logo']!='' && file_exists('image_gallery/restaurant_logo/'.$restaurant_all_details['restaurant_logo']))
		  {?>
		  <img src="<?php echo base_url();?>image_gallery/restaurant_logo/<?php echo $restaurant_all_details['restaurant_logo']; ?>"  class="main_img"/>
		  <?php } else {?>
                   <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  class="main_img"/>
		  <?php } ?>
		   </div>
          </div>
		  
          </div>





		 <strong style="font-size:20px;"><?php echo $this->lang->line('Add to Favourites');?></strong>
		  <?php
	   
		$rest_id=$_GET['id'];
	 
	   @$session_data = $this->session->userdata('user_logged_in');
	    $customer_id=@$session_data['user_id'];	
				if(@$session_data['user_id']==""){?>
	  <a href="javascript:void(0);" data-target="#myModal" data-toggle="modal"> <img src="<?php echo base_url('public/front/images/heart_gray.png'); ?>" style="float:right; cursor:pointer;" id="fav" class="fav"  alt="Add to favourite"></a>
	   <?php }else{ 
	 
	    
	   $fav_num=$this->restaurant_model->check_fav_restaurant($customer_id,$rest_id);
	   if($fav_num==0)
	   {
	   ?>
	    <img src="<?php echo base_url('public/front/images/heart_gray.png'); ?>" style="float:right; cursor:pointer;" id="fav" class="add_fav " alt="Add to favourite">
	   <?php } else {  ?>
	   
	   <img src="<?php echo base_url('public/front/images/heart_red.png'); ?>" style="float:right; cursor:pointer;" id="fav" class="remove_fav " alt="Remove from favourite">
	   <?php 
	   } } ?> 
		 
     </div>
     </div>
     
     </div>
   </div>
   
  <div class="container">
    <div class="row1">
     <div class="col-md-9">
      <div class="rest_left_pan">
      <div class="col-md-12 order_padding">
      <div class="restaurant_top">
       <div class="col-sm-12 padding_main">
       
       <div class="panel-group" id="accordion">
  <?php 
  $id=$restaurant_all_details['id'];
  $category = $this->restaurant_model->restaurant_category($id);
 
  ?>
  <?php 
   $i=1;
  foreach($category as $category_data){?>
  
  <div class="panel panel-default">
    <div class="panel-heading">
    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $category_data['id']; ?>">

      <td width="88%" valign="top"  class="panel-title"    id="cat_name<?php echo $category_data['id'];?>" > <h3> <?php echo $category_data['cat_name'];?></h3></td>
       </a>
    </div>
    <div id="collapseOne<?php echo $category_data['id']; ?>" class="panel-collapse collapse <?php if($i==1){?>in<?php } ?>">
    
	<?php $cat_id=$category_data['id'];
	  $menu_names = $this->restaurant_model->menu_name($cat_id);
	  foreach($menu_names as $name){
	   $addons=$this->search_model->get_addons($name['id']);
	   //print_r($addons);
	  ?>


      <div class="panel-body">
	  
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile">
  <tr>

    <td width="88%" valign="top"  ><h3><?php echo $name['item_name'];?> </h3></td>
    

    <td width="2%" valign="middle" >
	
	<?php
	if(@$session_data['user_id']==""){?>
	  <a href="javascript:void(0);" data-target="#myModal_dish" data-toggle="modal"> <img src="<?php echo base_url('public/front/images/heart_gray.png'); ?>" style=" cursor:pointer; margin:5px 0px 0px 0px" width="22" height="22"  alt="Add to favourite"></a>
	   <?php }else{ 
	
	 $fav_num_dish=$this->restaurant_model->check_fav_dish($customer_id,$name['id']);
	 if($fav_num_dish==0)
	 {

	 ?>
	
	<img src="<?php echo base_url('public/front/images/heart_gray.png'); ?>" style=" cursor:pointer; margin:5px 0px 0px 0px" width="22" height="22" id="fav_m<?php echo $name['id']; ?>" class="add_fav_dish_m " alt="Add to favourite">
	<?php } else {?>
	<img src="<?php echo base_url('public/front/images/heart_red.png'); ?>" style=" cursor:pointer; margin:5px 0px 0px 0px" width="22" height="22" id="fav_m<?php echo $name['id']; ?>" class="remove_fav_dish_m " alt="Add to favourite">
	<?php } }?>
	
	</td>
    <td width="8%" valign="bottom" ><h4 style="padding-top:15px; font-size:17px"><?php echo $name['type'].''.number_format($name['item_cost'], 2, '.', ',');?></h4></td>
    <td width="2%"  valign="middle">
	
	<?php 
	if(!empty($addons))
	{?>
	<a href="javascript:void(0)" class="menu_item" id="menu_item<?php echo $name['id']; ?>" cus="cat<?php echo $category_data['id']; ?>" data-target="#myModal_res_detail" data-toggle="modal"><img src="<?php echo base_url();?>public/front/images/add.png" style="margin:0px 0px 0px 0px; float:right" width="14" height="14" /></a>
	<?php } else {
	?>
	<a href="javascript:void(0)" class="menu_item_one" id="menu_item_one<?php echo $name['id']; ?>" cus="cat<?php echo $category_data['id']; ?>" ><img src="<?php echo base_url();?>public/front/images/add.png" style="margin:0px 0px 0px 0px; float:right" width="14" height="14"/></a>
	<?php } ?>

	</td>
  </tr>
  
   <tr>
    <td colspan="4" valign="top"><h6><?php echo $name['item_desc'];?></h6></td>
    </tr>
  
</table>
	  
	  
      <table width="100%" border="2" cellspacing="0" cellpadding="0" class="pc" style="border:2 px solid;!important">
  <tr>
    <td  valign="middle" style="width:75%; !important">
    
    <h5 style="width: 575px;"><?php echo $name['item_name'];?></h5>
    
    <h6 style="width: 575px;"><?php echo $name['item_desc'];?></h6></td>
    <td width="14%" valign="middle" style="width:14%;" align="right"><h4><center><?php echo $dollar.''.number_format($name['item_cost'], 2, '.', ',');?></center></h4></td>
    <td width="11%" valign="middle" style="width:11%;" align="right"><center>
	<?php 
	if(!empty($addons))
	{?>
	<a href="javascript:void(0)" class="menu_item" id="menu_item<?php echo $name['id']; ?>" cus="cat<?php echo $category_data['id']; ?>" data-target="#myModal_res_detail" data-toggle="modal"><img src="<?php echo base_url();?>public/front/images/add.png" style="margin:7px 10px 0px 0px" /></a>
	<?php } else {
	?>
	<a href="javascript:void(0)" class="menu_item_one" id="menu_item_one<?php echo $name['id']; ?>" cus="cat<?php echo $category_data['id']; ?>" ><img src="<?php echo base_url();?>public/front/images/add.png" style="margin:7px 10px 0px 0px"/></a>
	<?php } ?>
	
	<?php
	if(@$session_data['user_id']==""){?>
	  <a href="javascript:void(0);" data-target="#myModal_dish" data-toggle="modal"> <img src="<?php echo base_url('public/front/images/heart_gray.png'); ?>" style="float:right; cursor:pointer;" width="30" height="30"  alt="Add to favourite"></a>
	   <?php }else{ 
	
	 $fav_num_dish=$this->restaurant_model->check_fav_dish($customer_id,$name['id']);
	 if($fav_num_dish==0)
	 {
	 ?>
	
	<img src="<?php echo base_url('public/front/images/heart_gray.png'); ?>" style="float:right; cursor:pointer;" width="30" height="30" id="fav<?php echo $name['id']; ?>" class="add_fav_dish " alt="Add to favourite">
	<?php } else {?>
	<img src="<?php echo base_url('public/front/images/heart_red.png'); ?>" style="float:right; cursor:pointer;" width="30" height="30" id="fav<?php echo $name['id']; ?>" class="remove_fav_dish " alt="Add to favourite">
	<?php } }?>
    </center></td>
  </tr>
</table>
     </div>
	 
	 
	 <?php }  ?>
	 
	 
	  
     
     </div>
     </div>
	 
	 
  <?php $i++;  }  ?>
  
 
  
</div>
  </div>
       </div>      
       </div>
       
       
       </div>
       
      </div>
     </div>
     <?php
		
		$ip_address=$_SERVER['REMOTE_ADDR'];
		$delivery_time=$this->order_model->get_delivery_time($ip_address);
		$session_user_id=$this->session->userdata('session_search_data');

//echo '<script type="text/javascript"> alert("'. $delivery_time['date_time'] . '")</script>';
//painel com resumo do pedido para selecao do produtos, aqui finaliza e  vai para checkout e pagto
		?>
     
     

     <div class="col-md-3 " style="position:relative; padding-bottom:40px;">

     <div class="restaurant_top_right fiz">

     <div class="col-md-12 padding_main">

      <div class="restaurant_col_right" style=" padding: 9px 0 7px;">
       
	   <table width="100%">
	   <tr>
	   <td><h1><?php echo $this->lang->line('My Order');?></h1></td>
	   <td><?php
$ipaddress=$_SERVER['REMOTE_ADDR'];
$delivery_type=$this->order_model->get_delivery_type($ipaddress);

?>

<select name="type" id="type" class="form-control2" style="padding: 2px 5px;" >



<?php
//se restaurante  faz entrega aparece a opcao
if (($restaurant_all_details['delivery_check']=='delivery') ||  ($restaurant_all_details['delivery_check']=='delivery/pickup' ))
{
?>
<option value="delivery" <?php if(isset($delivery_type['type']) && $delivery_type['type']=='delivery'){?>selected="selected"<?php } ?>> <?php echo $this->lang->line('Delivery')?> </option>
<?php
}
?>



<?php
if (($restaurant_all_details['delivery_check']=='pickup') ||  ($restaurant_all_details['delivery_check']=='delivery/pickup' ))
{
?>
<option value="pickup" <?php if(isset($delivery_type['type']) && $delivery_type['type']=='pickup'){?>selected="selected"<?php } ?>>     <?php echo $this->lang->line('Pickup')?>  </option>
<?php
}
?>

</select></td>
	   </tr>
	   </table>




<?php
//testa  tipo de entrega para  cobrar tx de entrega
if($delivery_type['type']=='delivery')
{
 $_POST['type']  = 'delivery';
}
else
{
 $_POST['type']  = 'pickup';
}
?>



       
       <div class="ch_dev2" style="display:none1;" >
        <div class="restaurant_top_right_text" id="delievry_text">
		<?php
///valor a ser armazenado no delivery_date**** primeira chamada testa entrega rapida e programada
		if(empty($delivery_time))
		{?>
                 <p><?php echo $this->lang->line('Estimated Delivery');?> </p>
		 <?php

//testa pedido entrega rapida do contrario  armazena data e hora

		 if($restaurant_all_details['delivery_time_min']!='')
		 {
//testa  tempo de entrega em minutos
                   ?>
         <h5 class="restaurant_top_right_text_size"><?php echo $restaurant_all_details['delivery_time_min']; ?></h5>
         <p><?php echo $this->lang->line('Minutes');?></p>
		 <?php } 
                  else
                    {
                    ?>
  		  <p>
                         N/A
                  </p>
		 <?php }  } 
                 else{

//testa entrega programada e armazena primeiro no table  delivery_time

		 $today=date('d-m-Y');
		 $tomorrow=date('d-m-Y', time()+86400);

                 $date = $delivery_time['date_time']; 

                 $arr = explode(" ",$date , 2);
                 $date = $arr[0];

                 $time = $arr[1];


		 ?>
		  <p> <?php echo $this->lang->line('Delivery For');?></p>
		
                <h5 class="restaurant_top_right_text_size" style="font-size:20px !important;">

                 <?php if($date==$today){ echo 'Today';} ?>
		 <?php if($date==$tomorrow){ echo 'Tomorrow';} ?></h5>
		 

                 <p><?php echo $time; ?></p>
		 
		 <?php } ?>
        </div>
		<h6><a href="javascript:void(0)" class="chang2"><?php echo $this->lang->line('Change Delivery Time');?> </a></h6>
        </div>
      
<h6 style="color:#FF0000;display:none;" id="min_amount"><?php echo $this->lang->line('Minimum Order');?> <?php //echo $dollar;?><?php if(isset($restaurant_all_details['min_order']) && $restaurant_all_details['min_order']!=''){echo number_format($restaurant_all_details['min_order'],2);}?></h6>
        
       <div class="ch_dev1" style="display:none;">
        <div class="restaurant_top_right_text">
        <div class="col-lg-12">

         <form id="registerForm" class="form-horizontal bv-form" name="register-form" role="form" novalidate="novalidate">
         
          <div class="form-group has-feedback" style="margin-top:20px">
           <div class="col-lg-12">
<?php //insere CEP no placeholder ?>
             <input type="text" placeholder="WC1E 7HJ"  class="form-control2" value="<?php echo $session_user_id['search_data'];?>" style=" padding:5px" id="postcode">
          </div>
         </div>
         

         
         <div class="form-group has-feedback" >

           <div class="col-lg-6" >

            <select class="form-control2" style=" padding:5px" id="day">
		    <option value=""><?php

                    echo $this->lang->line('ASAP');?></option>
		   <option value="<?php echo date('d-m-Y');?>" selected="selected" ><?php echo $this->lang->line('Later Today');?></option>
		   <option value="<?php echo  date('d-m-Y', time()+86400); ?>"><?php echo $this->lang->line('Tomorrow');?></option>
		   </select>
          </div>
          <div class="col-lg-6">
            <select class="form-control2" style=" padding:5px" id="timing">
			<option value="12:00" >12:00</option>
<option value="12:15" >12:15</option>
<option value="12:30" >12:30</option>
<option value="12:45" >12:45</option>
<option value="13:00" >13:00</option>
<option selected="" value="13:15" >13:15</option>
<option value="13:30" >13:30</option>
<option value="13:45" >13:45</option>
<option value="14:00" >14:00</option>
<option value="14:15" >14:15</option>
<option value="14:30" >14:30</option>
<option value="14:45" >14:45</option>
<option value="15:00" >15:00</option>
<option value="15:15" >15:15</option>
<option value="15:30" >15:30</option>
<option value="15:45" >15:45</option>
<option value="16:00" >16:00</option>
<option value="16:15" >16:15</option>
<option value="16:30" >16:30</option>
<option value="16:45" >16:45</option>
<option value="17:00" >17:00</option>
<option value="17:15" >17:15</option>
<option value="17:30" >17:30</option>
<option value="17:45" >17:45</option>
<option value="18:00" >18:00</option>
<option value="18:15" >18:15</option>
<option value="18:30" >18:30</option>
<option value="18:45" >18:45</option>
<option value="19:00" >19:00</option>
<option value="19:15" >19:15</option>
<option value="19:30" >19:30</option>
<option value="19:45" >19:45</option>
<option value="20:00" >20:00</option>
<option value="20:15" >20:15</option>
<option value="20:30" >20:30</option>
<option value="20:45" >20:45</option>
<option value="21:00" >21:00</option>
<option value="21:15" >21:15</option>
<option value="21:30" >21:30</option>
<option value="21:45" >21:45</option>
<option value="22:00" >22:00</option>
<option value="22:15" >22:15</option>
<option value="22:30" >22:30</option>
<option value="22:45" >22:45</option>
<option value="23:00" >23:00</option></select>
          </div>
         </div>

          <div class="form-group">
          <div class="col-lg-12">
          <a href="javascript:void(0)" class="chang1"><button class="btn_save " type="button" id="save_delivery_time"><?php echo $this->lang->line('Save');?></button></a>
          </div>
          </div>
        </form>
        </div>
        </div>
        </div>
        
        
      </div>
       </div>
       
       
        <div class="col-md-12 padding_main" >
         <div class="restaurant_total">
		 <div id="check_out_detail">
         <!--<div style="max-height:50px; overflow:auto; width:100%;">-->
           <!--<h4><font style=" margin:3px 0px 0px 0px">2x</font> Milano Pizza <span>$12.50 </span><font style="font-size:10px; position:absolute; margin:0px 0px 0px 5px; right:0;"><a href="#">X</a></font></h4>
           
           <h4><font style=" margin:3px 0px 0px 0px">1x</font> Milano Pizza half<span>$12.50 </span> <font style="font-size:10px; position:absolute; margin:0px 0px 0px 5px; right:0;"><a href="#">X</a></font></h4>-->
           <!--</div>-->
		  <!-- </div>
           
           
           <div id="check_out_detail">-->
          
           <!--
           <h4>Subtotal <span>$24.50</span></h4>

           <h4>Free Delivery from  <span>$15.00</span></h4>

           <h4>Delivery Charge<span>$02.50</span></h4>


           <hr />
           <h6>Total <span>$24.50 </span></h6>-->
		   </div>
           </div>
           
           <h4><center><a href="javascript:void(0);"><button class="btn_checkout" type="button" id="checkout_btn" style="display:none;margin:15px 0 0;"><?php echo $this->lang->line('Checkout');?></button></a></center></h4>
         </div>
        </div>
        </div>
       </div>
        </div>
    </div>
    

  <?php $this->load->view('segment/footer'); ?> 
 
 
</body>
</html>

<script>

///////////////////////////////SCROLLLLLL

$(function(){
$(window).scroll(function(){
//testa scroll  e define se o menu fica na tela
	var height=$(window).height();
	var res=height-$(this).scrollTop();
	//alert($(this).scrollTop());
	if($(this).scrollTop()>=200 ){
	$(".fiz").addClass("scrol_fix");
} else{
$(".fiz").removeClass("scrol_fix");	
}
if($(this).scrollTop()>=2750){
$(".fiz").removeClass("scrol_fix");	
}
});
});
</script>



<script>
$(document).ready(function(){
	$(document).on('click',".chang1",function(){
	$(".ch_dev1").hide();
	$(".ch_dev2").show();
	
	
  });
    $(document).on('click',".chang2",function(){
    $(".ch_dev1").show();
	$(".ch_dev2").hide();
  });
  
  
  
});
</script>



<div class="modal fade" id="myModal_res_detail" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url();?>public/front/images/close.png">
</button>



        <h3 style="margin:0px;" id="cat_name_pop">Pizza</h3>
      </div>
      
<!--<input type="hidden1" name="anil" value="<?php //echo $name['id']?>">-->
      
      
      <div class="modal-body " id="model_content">
       

      </div>
      
      
    </div>
  </div>
</div>



<?php
$rest_id=@$_GET['id'];

?>
<script type="text/javascript" src="<?php echo base_url('public/front/js/jquery-1.8.0.min.js'); ?>"></script>  
<form name="" id="check_out_from" action="<?php echo base_url('order/checkout'); ?>" method="get">
<input type="hidden" name="menu_id" id="menu_id">
<input type="hidden" name="addons" id="addons">
<input type="hidden" name="cat_id" id="cat_id">
<input type="hidden" name="rest_id" id="rest_id" value="<?php echo $rest_id; ?>">



<script>
$(document).ready(function(){
$("#type").change(function(){
var rest_id=$("#rest_id").val();
var type=$("#type").val();
//alert(type);
	$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant_details/update_delivery_type'); ?>', 
    data: {rest_id:rest_id,type:type}, 
    success: function (data) {
     //alert(data);
	$("#check_out_detail").html(data);
	if(data!=''){$("#checkout_btn").show();}
	
	
	}
    });
	});	

});
</script>






<script>
$(document).ready(function(){
$(".menu_item").click(function(){
var id=$(this).attr('id');
var new_id=$(this).attr('cus');
var menu_id=id.replace('menu_item','');
var cat_id=new_id.replace('cat','');
var cat_name=$("#cat_name"+cat_id).html();
//alert(cat_id);
//alert(cuisine_name);
$("#cat_name_pop").html(cat_name);
$("#model_content").html('');
$("#menu_id").val(menu_id);
$("#cat_id").val(cat_id);
$("#addons").val('');
$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant_details/load_menu'); ?>', 
    data: {menu_id:menu_id}, 
    success: function (data) {
     //alert(data);
	$("#model_content").html(data);
	
	}
    });

});
});
</script>


<script>
$(document).ready(function(){

$(".addons").live('click',function(){

var  menu_amount=parseInt($("#menu_amount").html());
var addon_id = $('.addons:checked').map(function(){
		   return $(this).attr('id');
        }).get();
		$("#addons").val(addon_id);
		var menu_id=$("#menu_id").val();
		
		$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant_details/get_order_amount'); ?>', 
    data: {menu_id:menu_id,addon_id:addon_id}, 
    success: function (data) {
     //alert(data);
	$("#total_amount").html(data);
	
	}
    });
		
		
});
});

</script>

<script>
$(document).ready(function(){

$("#cancel_order").live('click',function(){

$("#menu_id").val('');
$("#cat_id").val('');
$("#addons").val('');

		
});
});

</script>

<script>
$(document).ready(function(){

$("#add_menu").live('click',function(){

var menu_id=$("#menu_id").val();
var addons=$("#addons").val();
var cat_id=$("#cat_id").val();
var rest_id=$("#rest_id").val();
var type=$("#type").val();

	$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant_details/get_checkout_detail'); ?>', 
    data: {menu_id:menu_id,addons:addons,cat_id:cat_id,rest_id:rest_id,type:type}, 
    success: function (data) {
     //alert(data);
	$("#check_out_detail").html(data);
	
	$("#checkout_btn").show();
	
	}
    });
		
});
});
</script>


<script>

//retorna valores do pedido em formato html  - ler  do controller restaurant_details  - funcao ajax/load_cart_detail
$(document).ready(function(){

var rest_id=$("#rest_id").val();

$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant_details/load_cart_detail'); ?>', 
    data: {rest_id:rest_id}, 
    success: function (data) {
     //alert(data);
	$("#check_out_detail").html(data);
	if(data!=''){$("#checkout_btn").show();}
	
	
	}
    });
		

});
</script>

<script>
$(document).ready(function(){

$(".delete_cart").live('click',function(){
var res=$(this).attr('id');
var cart_id=res.replace('delete_cart','');
var rest_id=$("#rest_id").val();

	$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant_details/del_cart_item'); ?>', 
    data: {cart_id:cart_id,rest_id:rest_id}, 
    success: function (data) {
     //alert(data);
	$("#check_out_detail").html(data);
	if(data==''){$("#checkout_btn").hide();
	$("#min_amount").hide();
	}
	
	}
    });
		
});
});
</script>


<script>
$(document).ready(function(){
$(".menu_item_one").click(function(){
var id=$(this).attr('id');
var new_id=$(this).attr('cus');
var menu_id=id.replace('menu_item_one','');
var cat_id=new_id.replace('cat','');
$("#menu_id").val(menu_id);
$("#cat_id").val(cat_id);
$("#addons").val('');

var menu_id=$("#menu_id").val();
var addons=$("#addons").val();
var cuisine_id=$("#cuisine_id").val();
var rest_id=$("#rest_id").val();
var type=$("#type").val();
	$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant_details/get_checkout_detail'); ?>', 
    data: {menu_id:menu_id,addons:addons,cat_id:cat_id,rest_id:rest_id,type:type}, 
    success: function (data) {
     //alert(data);
	$("#check_out_detail").html(data);
	$("#checkout_btn").show();
	

	
	
	}
    });

});
});
</script>



<script>
$(document).ready(function(){
$("#checkout_btn").live('click',function(){

var rest_id=$("#rest_id").val();
//alert(rest_id); return false;
	$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant_details/check_cart_amount'); ?>', 
    data: {rest_id:rest_id}, 
    success: function (data) {
     //alert(data); return false;
	if(data=='correct')
	{
	document.location.href='<?php echo base_url('order/checkout'); ?>';
	}
	else
	{
	$("#min_amount").show();
    }
	
	
	
	}
    });



});
});

</script>

<script>
$(document).ready(function(){
$("#save_delivery_time").click(function(){
var postcode=$("#postcode").val();
var date=$("#day").val();
var time=$("#timing").val();
var rest_id =$("#rest_id").val();

// alert( date +" " +  time + " " +  "envia delivery_time data e time separado");

//envia array funcao para controller ;
//chama controller e salva em db delivery_time
	$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant_details/save_delivery_time'); ?>', 
    data: {date:date,time:time,postcode:postcode,rest_id:rest_id}, 
    success: function (data) {
	
	$("#delievry_text").html(data);
	
	}
    });


});
});
</script>

<script>
$(document).ready(function(){
$("#day").change(function(){
var date=$("#day").val();
if(date=='')
{
$("#timing").hide();
}
else
{
$("#timing").show();
}

});
});
</script>



<input type="hidden" id="customer_id" value="<?php echo @$session_data['user_id'];?>">
<script type="text/javascript">
   $(document).ready(function(){
 $(".add_fav").live("click",function(){
	 //alert('sss');return false; 
 
  var customer_id =$("#customer_id").val();
    var rest_id =$("#rest_id").val();
 //alert(rest_id);return false;
  
  $.ajax({
  type: "POST",
  url:  "<?php echo base_url();?>restaurant_details/addfavourite",
  data: {customer_id:customer_id,rest_id:rest_id},
  success: function(msg){ 
  //alert(msg);
  
  $("#fav").removeClass("add_fav");
  $("#fav").addClass("remove_fav");
 
  $("#fav").attr("src","<?php echo base_url('public/front/images/heart_red.png'); ?>");
  
  }
  
 });
 
 });
 
 
 
   $(".remove_fav").live("click",function(){ 
 
   var customer_id =$("#customer_id").val();
    var rest_id =$("#rest_id").val();
  
  $.ajax({
  type: "POST",
  url:  "<?php echo base_url();?>restaurant_details/delfavourite",
  data: {customer_id:customer_id,rest_id:rest_id},
  success: function(msg){ //alert(msg);
 $("#fav").removeClass("remove_fav");
  $("#fav").addClass("add_fav");
 
  $("#fav").attr("src","<?php echo base_url('public/front/images/heart_gray.png'); ?>");
  }
  
 });
 
 });
 
 });
 </script>
 
 
 
 
 
 
 
 
 <script type="text/javascript">
   $(document).ready(function(){
 $(".add_fav_dish").live("click",function(){
	 //alert('sss');return false; 
 var id=$(this).attr('id');
 var menu_id=id.replace('fav','');
  var customer_id =$("#customer_id").val();
  
 //alert(customer_id);return false;
  
  $.ajax({
  type: "POST",
  url:  "<?php echo base_url();?>restaurant_details/addfavourite_dish",
  data: {customer_id:customer_id,menu_id:menu_id},
  success: function(msg){ 
  //alert(msg);
  
  $("#fav"+menu_id).removeClass("add_fav_dish");
  $("#fav"+menu_id).addClass("remove_fav_dish");
 
  $("#fav"+menu_id).attr("src","<?php echo base_url('public/front/images/heart_red.png'); ?>");
  
  }
  
 });
 
 });
 
 
 
   $(".remove_fav_dish").live("click",function(){ 
 
   var customer_id =$("#customer_id").val();
    var id=$(this).attr('id');
 var menu_id=id.replace('fav','');
  
  $.ajax({
  type: "POST",
  url:  "<?php echo base_url();?>restaurant_details/delfavourite_dish",
  data: {customer_id:customer_id,menu_id:menu_id},
  success: function(msg){ //alert(msg);
 $("#fav"+menu_id).removeClass("remove_fav_dish");
  $("#fav"+menu_id).addClass("add_fav_dish");
 
  $("#fav"+menu_id).attr("src","<?php echo base_url('public/front/images/heart_gray.png'); ?>");
  }
  
 });
 
 });
 
 });
 </script>
 
 
  <script type="text/javascript">
   $(document).ready(function(){
 $(".add_fav_dish_m").live("click",function(){
	 //alert('sss');return false; 
 var id=$(this).attr('id');
 var menu_id=id.replace('fav_m','');
  var customer_id =$("#customer_id").val();
  
 //alert(customer_id);return false;
  
  $.ajax({
  type: "POST",
  url:  "<?php echo base_url();?>restaurant_details/addfavourite_dish",
  data: {customer_id:customer_id,menu_id:menu_id},
  success: function(msg){ 
  //alert(msg);
  
  $("#fav_m"+menu_id).removeClass("add_fav_dish_m");
  $("#fav_m"+menu_id).addClass("remove_fav_dish_m");
 
  $("#fav_m"+menu_id).attr("src","<?php echo base_url('public/front/images/heart_red.png'); ?>");
  
  }
  
 });
 
 });
 
 
 
   $(".remove_fav_dish_m").live("click",function(){ 
 
   var customer_id =$("#customer_id").val();
    var id=$(this).attr('id');
 var menu_id=id.replace('fav_m','');
  
  $.ajax({
  type: "POST",
  url:  "<?php echo base_url();?>restaurant_details/delfavourite_dish",
  data: {customer_id:customer_id,menu_id:menu_id},
  success: function(msg){ //alert(msg);
 $("#fav_m"+menu_id).removeClass("remove_fav_dish");
  $("#fav_m"+menu_id).addClass("add_fav_dish");
 
  $("#fav_m"+menu_id).attr("src","<?php echo base_url('public/front/images/heart_gray.png'); ?>");
  }
  
 });
 
 });
 
 });
 </script>
 
 
 
 
   
 
 <script type="text/javascript">
   $(document).ready(function(){
   
 $(".fav").live("mouseenter",function(){ 
 $("#fav").attr("src","<?php echo base_url('public/front/images/heart_red.png'); ?>");
});
 
 $(".fav").live("mouseleave",function(){ 
 $("#fav").attr("src","<?php echo base_url('public/front/images/heart_gray.png'); ?>");
});
 
  $(".fav").click(function(){ 
 var res_name=$("#res_name").html();
 $("#restaurant_name_pop").html(res_name);
});
  
 
 });
 </script>
 
 

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url('public/front/images/close.png'); ?>">
</button>
        <h3 style="margin:0px; text-align:center" id=""><?php echo $this->lang->line('Message');?></h3>
      </div>
      

      
      
      <div class="modal-body " id="">
       <form  class="form-horizontal san" name="register-form" >
      
        <div class="form-group has-feedback">
          <div class="col-md-12 padding">
          
          <h4 style="text-align:center"><?php echo $this->lang->line('Please login to  add');?> " <font id="restaurant_name_pop"></font> " <?php echo $this->lang->line('in  your  favourite list');?>.</h4>
   
  <div class="clearfix"></div>
   <div class="col-md-7 padding_main">
   
   


</div>
</div>
</div>


  <hr />    

<div class="form-group has-feedback">
  <div class="col-md-12 padding">
   <div class="col-md-4">
  <p style=" color:#000; margin:0px;">&nbsp;</p>
  </div>
   <div class="col-md-12  padding_main">
   <center><button class="btn_popup  " data-dismiss="modal" style="margin:5px 0px 0px 0px; width:150px;"><?php echo $this->lang->line('Ok');?></button></center>
  
  </div>
 </div>
</div>

</form>

      </div>
      
      
    </div>
  </div>
</div>



<div class="modal fade" id="myModal_dish" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url('public/front/images/close.png'); ?>">
</button>
        <h3 style="margin:0px; text-align:center" id=""><?php echo $this->lang->line('Message');?></h3>
      </div>
      

      
      
      <div class="modal-body " id="">
       <form  class="form-horizontal san" name="register-form" >
      
        <div class="form-group has-feedback">
          <div class="col-md-12 padding">
          
          <h4 style="text-align:center"><?php echo $this->lang->line('Please login to  add');?>  <?php echo $this->lang->line('in  your  favourite list');?>.</h4>
   
  <div class="clearfix"></div>
   <div class="col-md-7 padding_main">
   
   


</div>
</div>
</div>


  <hr />    

<div class="form-group has-feedback">
  <div class="col-md-12 padding">
   <div class="col-md-4">
  <p style=" color:#000; margin:0px;">&nbsp;</p>
  </div>
   <div class="col-md-12  padding_main">
   <center><button class="btn_popup  " data-dismiss="modal" style="margin:5px 0px 0px 0px; width:150px;"><?php echo $this->lang->line('Ok');?></button></center>
  
  </div>
 </div>
</div>

</form>

      </div>
      
      
    </div>
  </div>
</div>




<script>
$(document).ready(function(){
	$(document).on('click',".mess_btn",function(){
	$(".send_mass").show();
  });

});
</script>

 <script>

$(document).ready(function(e) {		
	//no use
	try {
		var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
		var val = data.value;
		if(val!="")
                window.location = val;
	        }}}).data("dd");

		var pagename = document.location.pathname.toString();
		pagename = pagename.split("/");
		pages.setIndexByValue(pagename[pagename.length-1]);
		$("#ver").html(msBeautify.version.msDropdown);
	} catch(e) {
		//console.log(e);	
	}
	
	$("#ver").html(msBeautify.version.msDropdown);
		
	//convert
	$(".select").msDropdown({roundedBorder:false});
	createByJson();
	$("#tech").data("dd");
});
function showValue(h) {
	console.log(h.name, h.value);
}
$("#tech").change(function() {
	console.log("by jquery: ", this.value);
})

</script>

<style>
#mycomp_child{height:90px!important;}

#mycomp1_child{ margin-left: -6px;
    margin-top: 25px;}

</style>




<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/front/css/dd.css" />
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.dd.js"></script>

<script>

$(function(){
 $(window).on('load',function(){
	//alert();
 //$('.selected .ddlabel').hide();
 //$('.selected .fnone').hide();
 });
 $('#mycomp').on('change',function(){
	var flag = $(this).val();
	
	$('.enabled _msddli_ selected ddlabel').hide();
    $('.enabled _msddli_ selected fnone').hide();
	
 });
$(document).on('mouseleave','#mycomp_msdd',function(){
    $(this).removeClass('borderRadiusTp');
	 $(this).addClass('borderRadius');
	 $('#mycomp_child').hide();
 });
  $(document).on('mouseenter','#mycomp_msdd',function(){
   $(this).removeClass('borderRadius');
    $(this).addClass('borderRadiusTp');
	
	 $('#mycomp_child').show();
 });
});
</script>


<script>
$(function(){
  $(document).on('click',function(){
    $('.navbar-collapse').removeClass('in');
  });
  $(window).scroll(function() {
   //$('.navbar-collapse').removeClass('in');
});
$('.dropdown').on('click',function(){
$('.san').hide();
});
$('.navbar-toggle').on('click',function(){
$('.san').show();
});
});
</script>

<style>
.panel-heading .accordion-toggle:after {
    /* symbol for "opening" panels */
    font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
    content: "\e114";    /* adjust as needed, taken from bootstrap.css */
    float: right;        /* adjust as needed */
    color: grey;
	
	margin-top:-30px;

	       
}
.panel-heading .accordion-toggle.collapsed:after {
    /* symbol for "collapsed" panels */
    content: "\e080";    /* adjust as needed, taken from bootstrap.css */
}

</style>




