<?php
//error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
require_once(APPPATH.'libraries/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage-report</title>
</head>
<style>
body{margin:0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px;}
.padding{ padding:5px 10px 0px 10px; }
p{padding:5px 5px; margin:0px 0px 5px 0px; line-height:25px; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#FFFFFF;}
h5{padding:5px 5px; margin:0px 0px 5px 0px; line-height:25px; font-family:Arial, Helvetica, sans-serif; font-size:10px;}
.style1 {color: #acabb6}
</style>
<body style="font-family:Arial, Helvetica, sans-serif">

<div style="width:740px; margin:0px auto;">
 
                               
 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:#bdbdbd 1px solid;">
  <tr>
    <td width="13%" bgcolor="#737373"><p>ORDERID</p></td>
    <td width="14%" bgcolor="#737373"><p>NAME</p></td>
    <td width="14%" bgcolor="#737373"><p>EMAIL</p></td>
    <td width="17%" bgcolor="#737373"><p>RESTAURANT</p></td>
    <td width="13%" bgcolor="#737373"><p>PHONE</p></td>
    <td width="14%" bgcolor="#737373"><p>PAYMENT</p></td>
	<td width="15%" bgcolor="#737373"><p>DATE</p></td>
  </tr>
  
	<?php
	$sn=1;
	foreach($report as $w){
	?>               
  <tr>
    <td bgcolor="<?php if($sn%2==0){echo '#f5f4f2';}else{echo '#FFFFFF';};?>"><h5 class="style1"><?php echo $w['order_id'];?></h5></td>
    <td bgcolor="<?php if($sn%2==0){echo '#f5f4f2';}else{echo '#FFFFFF';};?>"><h5 class="style1"><?php
										if($w['customer_id']!=''){
										$customer = $this->order_model->get_customer($w['customer_id']);
										echo ucwords($customer['first_name']).' '.ucwords($customer['last_name']);
										}else{
										$guest = $this->order_model->get_guest_detail($w['guest_id']);
										echo ucwords($guest['full_name']);
										}?></h5></td>
    <td bgcolor="<?php if($sn%2==0){echo '#f5f4f2';}else{echo '#FFFFFF';};?>"><h5 class="style1"><?php echo $customer['email'];?></h5></td>
    <td bgcolor="<?php if($sn%2==0){echo '#f5f4f2';}else{echo '#FFFFFF';};?>"><h5 class="style1"><?php $restaurant = $this->payment_model->restaurant($w['restaurant_id']); 
										echo ucwords($restaurant['restaurant_name']);?></h5></td>
    <td bgcolor="<?php if($sn%2==0){echo '#f5f4f2';}else{echo '#FFFFFF';};?>"><h5 class="style1"><?php echo $customer['phone'];?></h5></td>
    <td bgcolor="<?php if($sn%2==0){echo '#f5f4f2';}else{echo '#FFFFFF';};?>"><h5 class="style1"><?php $pay_method = $this->report_model->get_pay_method($w['order_id']); 
										echo ucwords($w['payment_method']);?></h5></td>
										<td bgcolor="<?php if($sn%2==0){echo '#f5f4f2';}else{echo '#FFFFFF';};?>"><h5 class="style1"><?php echo date('d-m-Y',$w['order_date']);?></h5></td>
  </tr>
  
  <?php $sn++;} ?>
</table>


</div>




 
 


</body>
</html>
