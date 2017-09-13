<?php  
$language_data=$this->session->userdata('language');
?>
<?php
require_once(APPPATH.'libraries/config.php');

//print_r($order);die;
?>

<div style="width:750px; margin:0px auto; border:1px #fff solid;">

<div style="width:750px; margin:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img src="<?php echo base_url('public/front/img/logo.png'); ?>" style="margin:30px 0px;"/></td>
  </tr>
</table>



  <?php if($language_data['language']=='english'){?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
    <td height="10" colspan="3" bgcolor="#e81d25"></td>
    </tr>
    
   
 
 <tr>
 
    <td width="96%" height="55" align="right">
	<a href="https://www.facebook.com/portugotakeaway/" target="_blank"><img src="<?php echo base_url('public/front/img/facebook.jpg'); ?>" width="54" height="41" border="0" /></a>
	<a href="https://www.instagram.com/portugotakeaway/" target="_blank"><img src="<?php echo base_url('public/front/img/instagram.jpg'); ?>" width="54" height="41" border="0" /></a>
	<a href="https://twitter.com/PortuGoTakeaway" target="_blank"><img src="<?php echo base_url('public/front/img/twiter.jpg'); ?>" width="54" height="41" border="0" /></a>
	<a href="https://www.youtube.com/channel/UCxFbt4z4TyGHMuLyPCskebQ" target="_blank"><img src="<?php echo base_url('public/front/img/youtube.jpg'); ?>" width="54" height="41" border="0" /></a>
	</td>

  </tr>
 
 
  <tr>
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">DEAR  <?php echo ucwords($first_Name); ?></div></td>
    </tr>
 
  
  <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Thank you for your order! We can confirm that your order has been accepted by (<?php echo $restaurant['restaurant_name']; ?>). You can find a full breakdown of your order below. . </div></td>
    </tr>
  
 
  
  <tr>
    <td width="96%" height="30"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000;">Enjoy!<br>PortuGo Team
</div></td>
    </tr>
	
	
  
	
	<tr>
    <td width="96%" height="30"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000;">Your order will be delivered to: 
	
	CUSTOMER ADDRESS :<?php echo ucwords($user_street.','.$user_city.','.$user_zip); ?><br>
	ORDER NUMBER :<?php echo $order['order_id']; ?><br>
	ORDER DATE AND TIME :<?php if($order['delivery_time']!=''){ echo $order['delivery_time'];} ?><br>
	PAYMENT TYPE :<?php echo ucwords($order['payment_method']);?><br>
	RESTAURANT ADDRESS :<?php echo $restaurant['full_address']; ?><br>
	RESTAURANT OPENING TIMES :<?php echo $restaurant_open['opening_time']; ?><br>
	ORDER DETAILS (ITEMS):
	 <?php 
										 $sn=1;
										    
											
										 $total=0;
										 foreach($order_detail as $allorder){
										// print_r($allorder);
										 
										  $item_detail=$this->search_model->get_menu_detail($allorder['menu_id']);
										   $total=$total+$allorder['quantity']*$allorder['menu_price'];
										   echo ucwords($item_detail['item_name']).'&nbsp;';
										    if($allorder['adddons']!='')
	  {
	
	   $addon_id= explode(',',$allorder['adddons']);
	  $addons=$this->search_model->get_addonsby_id($addon_id);
	
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total=$total+$alladons['price'];
	   } } } }
										
										
			 if($order['delivery_charge']!=''){$delivery_charge=$order['delivery_charge'];}else{$delivery_charge=0;}
  
   $final_total=$total+$delivery_charge;							
										
										 ?>
	
	<br>
	SUBTOTAL:&euro;<?php echo number_format($total,2); ?><br>
	PROMO DEDUCTION:<br>
	TOTAL:&euro;<?php echo number_format($final_total,2); ?><br>
</div></td>
    </tr>
	
	
  
  </table>
  
  <?php } else {?>
  
  
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
    <td height="10" colspan="3" bgcolor="#e81d25"></td>
    </tr>
    
   
 
 <tr>
 
    <td width="96%" height="55" align="right">
	<a href="https://www.facebook.com/portugotakeaway/" target="_blank"><img src="<?php echo base_url('public/front/img/facebook.jpg'); ?>" width="54" height="41" border="0" /></a>
	<a href="https://www.instagram.com/portugotakeaway/" target="_blank"><img src="<?php echo base_url('public/front/img/instagram.jpg'); ?>" width="54" height="41" border="0" /></a>
	<a href="https://twitter.com/PortuGoTakeaway" target="_blank"><img src="<?php echo base_url('public/front/img/twiter.jpg'); ?>" width="54" height="41" border="0" /></a>
	<a href="https://www.youtube.com/channel/UCxFbt4z4TyGHMuLyPCskebQ" target="_blank"><img src="<?php echo base_url('public/front/img/youtube.jpg'); ?>" width="54" height="41" border="0" /></a>
	</td>

  </tr>
 
 
  <tr>
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">CARO  <?php echo ucwords($first_Name); ?></div></td>
    </tr>
  
  
  <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "><?php echo utf8_encode('Agradecemos seu pedido! Confirmamos que seu pedido foi aceito por'); ?>  (<?php echo $restaurant['restaurant_name']; ?>). <?php echo utf8_encode('Você pode encontrar uma descrição completa do seu pedido abaixo'); ?>.  </div></td>
    </tr>
  
 
  
  
  <tr>
    <td width="96%" height="30"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000;">Aproveite!<br>Equipa PortuGo
</div></td>
    </tr>
	
	
  
	
	<tr>
    <td width="96%" height="30"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000;"><?php echo utf8_encode('Seu pedido será entregue em'); ?>: 
	
	CUSTOMER ADDRESS :<?php echo ucwords($user_street.','.$user_city.','.$user_zip); ?><br>
	<?php echo utf8_encode('NÚMERO DO PEDIDO'); ?>:<?php echo $order['order_id']; ?><br>



	<?php echo utf8_encode('DATA E HORÁRIO DO PEDIDO'); ?> :<?php if($order['delivery_time']!=''){ echo $order['delivery_time'];} ?><br>
	<?php echo utf8_encode('FORMA DE PAGAMENTO'); ?> :<?php echo ucwords($order['payment_method']);?><br>
	<?php echo utf8_encode('MORADA DO RESTAURANTE'); ?> :<?php echo $restaurant['full_address']; ?><br>
	<?php echo utf8_encode('HORÁRIO DE FUNCIONAMENTO DO RESTAURANTE'); ?>:<?php echo $restaurant_open['opening_time']; ?><br>
	<?php echo utf8_encode('DETALHES DO PEDIDO (ITENS)'); ?>:
	 <?php 
										 $sn=1;
										    
											
										 $total=0;
										 foreach($order_detail as $allorder){
										// print_r($allorder);
										 
										  $item_detail=$this->search_model->get_menu_detail($allorder['menu_id']);
										   $total=$total+$allorder['quantity']*$allorder['menu_price'];
										   echo ucwords($item_detail['item_name']).'&nbsp;';
										    if($allorder['adddons']!='')
	  {
	
	   $addon_id= explode(',',$allorder['adddons']);
	  $addons=$this->search_model->get_addonsby_id($addon_id);
	
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total=$total+$alladons['price'];
	   } } } }



   if($order['delivery_charge']!=''){$delivery_charge=$order['delivery_charge'];}else{$delivery_charge=0;}










   $final_total=$total+$delivery_charge;
										 ?>
	<br>
	SUBTOTAL:&euro;<?php echo number_format($total,2); ?><br>
	DESCONTO PROMOCIONAL:<br>
	TOTAL:&euro;<?php echo number_format($final_total,2); ?><br>
</div></td>
    </tr>
	
	
 
  
  </table>
  <?php }
  
  
  ?>
  
  
</div>

</div>
