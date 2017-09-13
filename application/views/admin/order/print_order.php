<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>gotakeaway</title>
</head>

<body>

<div style="width:795px; margin:0px auto;">
  <?php 
	
	$restaurant = $this->user_model->get_restaurant($order['restaurant_id']);
	?>
  
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
 
 
 <tr>
    <td height="55" colspan="3"  style="border-bottom:#000 dashed 2px;">&nbsp;</td>
    </tr>
 
 
  <tr>
    <td width="5%" height="40">&nbsp;</td>
    <td width="91%" height="40" align="center"  style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; "> <?php echo strtoupper($restaurant['restaurant_name']); ?></td>
    <td width="4%" height="40" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td width="5%" height="40">&nbsp;</td>
    <td width="91%" height="40" align="center"  style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; "> <?php echo ucfirst($restaurant['full_address']); ?></td>
    <td width="4%" height="40" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td width="5%" height="40">&nbsp;</td>
    <td width="91%" height="40" align="center"  style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; "> <?php if($order['order_date']!=''){ echo gmdate('d-m-Y H:i:',$order['order_date']);} ?></td>
    <td width="4%" height="40" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td width="5%" height="40">&nbsp;</td>
    <td width="91%" height="40" align="center"  style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">Order Reference Number:<?php echo $order['order_id']; ?></td>
    <td width="4%" height="40" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  
   <tr>
    <td height="20" colspan="3"  style="border-bottom:#000 dashed 2px;">&nbsp;</td>
    </tr>
    <tr>
    <td height="20" colspan="3" >&nbsp;</td>
    </tr>
 
  
  <tr>
    <td width="5%" height="50">&nbsp;</td>
    <td width="91%" height="50" align="center">
    
    <table width="65%"  border="0" cellspacing="0" cellpadding="0">
	
  <tr>
    <td width="45%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
   <td width="20%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
    <td width="21%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
    <td width="14%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">IVA</td>
  </tr>
  
 <?php 
										 $sn=1;
										    
											
										 $total=0;
										 foreach($order_detail as $allorder){
										// print_r($allorder);
										 
										  $item_detail=$this->order_model->get_item($allorder['menu_id']);
										   $total=$total+$allorder['quantity']*$allorder['menu_price'];
										 ?>
  <tr>
    <td width="45%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; "><?php echo $allorder['quantity']; ?> x <?php echo ucwords(@$item_detail['item_name']);?></td>
   <td width="20%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">€<?php echo @number_format($allorder['menu_price'],2);?></td>
    <td width="21%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">€<?php echo @number_format($allorder['quantity']*$allorder['menu_price'],2);?></td>
   <!-- <td width="14%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">13%</td>-->
  </tr>
  <?php 
    if($allorder['adddons']!='')
	  {
	
	   $addon_id= explode(',',$allorder['adddons']);
	  $addons=$this->order_model->get_addonsby_id($addon_id);
	
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total=$total+$alladons['price'];
	  ?>
  <tr>
    <td width="45%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; "><?php echo ucfirst($alladons['extra_item']); ?></td>
   <td width="20%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">€<?php echo number_format($alladons['price'],2);?></td>
    <td width="21%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">€<?php echo number_format($alladons['price'],2);?></td>
   <!-- <td width="14%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">13%</td>-->
  </tr>
  
  
  <?php } } } } ?>
  
  
  
</table>
</td>
    <td width="4%" height="55" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  
  
  <tr>
    <td height="80" colspan="3" >&nbsp;</td>
    </tr>
  <tr>
    <td height="20" colspan="3"  style="border-bottom:#000 dashed 2px;"></td>
    </tr>
   
  <tr>
    <td height="20" colspan="3" >&nbsp;</td>
    </tr>
  
  <tr>
    <td width="5%" height="50">&nbsp;</td>
    <td width="91%" height="50" align="center">
    
    <table width="90%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="52%" height="35" align="right" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">Subtotal</td>
   <td width="9%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
    <td width="39%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">€ <?php echo number_format($total,2); ?></td>
  </tr>
   <?php
   
   if($order['delivery_charge']!=''){$delivery_charge=$order['delivery_charge'];}else{$delivery_charge=0;}



//echo '<script type="text/javascript"> alert("'. $order['restaurant_id'] . '")</script>';

$restaurante = $this->order_model->get_restaurant($order['restaurant_id']);


//echo '<script type="text/javascript"> alert("'. $order['order_type'] . '")</script>';

if($order['order_type']!='Delivery')
                 {
                 $delivery_charge=0;
                 }
                else
                 {
                    if ($total >= $restaurante['free_delivery'])
                        {
                        $delivery_charge=0;
                        }
                  }


 $final_total=$total+$delivery_charge;






?>  
  
  <tr>
    <td width="52%" height="35" align="right" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">Delivery:</td>
   <td width="9%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
    <td width="39%" height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; "><p>€  <?php echo number_format($delivery_charge,2);?></p></td>
  </tr>
 <!-- <tr>
    <td height="35" align="right" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">Tax:</td>
    <td height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
    <td height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">€ 4.6605</td>
  </tr>-->
  <tr>
    <td height="35" align="right" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; "><strong>Total:</strong></td>
    <td height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
    <td height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; "><p>€<?php echo number_format($final_total,2); ?></p></td>
  </tr>
 <!-- <tr>
    <td height="35" align="right" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">if paid by card Card Number Ending: </td>
    <td height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
    <td height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">XXXX (show last 4 digits)</td>
  </tr>-->
  <tr>
    <td height="20" align="right" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
    <td height="20" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
    <td height="20" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
  </tr>
  <tr>
    <td height="35" colspan="3" align="center" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; "><p>Thank you for  ordering at Portugo.pt. </p></td>
    </tr>
  <tr>
    <td height="35" align="right" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
    <td height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
    <td height="35" style=" font-family:Myriad Pro,arial; font-size:24px; color:#000000; ">&nbsp;</td>
  </tr>
  
    </table>
</td>
    <td width="4%" height="55" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  <tr>
    <td width="5%" height="50">&nbsp;</td>
    <td width="91%" height="50">&nbsp;</td>
    <td width="4%" height="55" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  </table>

</div>




 
 


</body>
</html>
