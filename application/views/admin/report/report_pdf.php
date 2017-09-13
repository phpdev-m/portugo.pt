<?php
//error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
require_once(APPPATH.'libraries/config.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="UTF-8">
<title>	Manage Parents </title>
<style>
body{margin:0px; padding:0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333;}
.padding{ padding:5px 10px 0px 10px; }
p{padding:10px 15px; margin:0px 0px 5px 0px; line-height:25px;}

</style>
</head>

<body>

<div style="width:730px;  margin:auto; background:#FFF;">

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
 <td colspan="10">
 <h2 style="text-align:center">Manage Report</h2>
 </td>
 </tr>
 
 
 
 
                                    <thead>
										<tr>
										
										<th width="10%">Order Id</th>
										<th width="13%">Name</th>
										<th width="18%">Email</th>
										<th width="17%">Restaurant</th>
										<th width="5%">Phone</th>
										<th width="10%">Payment</th>
										<th width="11%">Date</th>
										<!--<th width="15%">Price</th>-->
										
										</tr>
									</thead>
									<tbody>
									 
										<?php 
										
										$sn=1;
										foreach($report as $w){
										
										?>
										<tr>
										
										<td><center><?php echo $w['order_id'];?></center></td>
	
										<td><?php
										//if($w['user_type']==1){
											
									if(!empty($w['customer_id'])){
									
										$customer = $this->order_model->get_customer($w['customer_id']);
										echo ucwords($customer['first_name']).' '.ucwords($customer['last_name']);
										}else{
										$guest = $this->order_model->get_guest_detail($w['guest_id']);
										echo ucwords($guest['full_name']);
										}?>
										 </td>
										<td><center><?php
										if(!empty($w['customer_id'])){
											$user_id=$w['customer_id'];
										$customer = $this->order_model->get_customer($user_id);
										echo $customer['email'];
										}else{
										$guest = $this->order_model->get_guest_detail($w['guest_id']);
										echo ucwords($guest['email']);
										}?>
										 </center></td>
										<td><center><?php $restaurant = $this->payment_model->restaurant($w['restaurant_id']); 
										echo ucwords($restaurant['restaurant_name']);?></center></td>
										<td><center><?php
										if(!empty($w['customer_id'])){
											$user_id=$w['customer_id'];
										$customer = $this->order_model->get_customer($user_id);
										echo $customer['phone'];
										}else{
										$guest = $this->order_model->get_guest_detail($w['guest_id']);
										echo ucwords($guest['phone_number']);
										}?></center></td>
										
			                            <td><?php echo ucwords($w['payment_method']); ?></td>
                                        <td><?php echo date('d-m-Y',$w['order_date']); ?></td>										
                                        <!--<td class=""><center>€&nbsp;<?php //echo number_format($w['total_amount'],2,'.', ',');?></center></td>-->										
									
										</tr>
									<?php $sn++;} ?>
									
									</tbody>  
 
</table>
                                        
									
									 
									   
									    
									   
									 
									
									    
								
									
</div>

</body>
</html>
