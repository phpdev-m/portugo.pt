
<div style="max-height:250px; overflow:auto; width:100%;">

<?php
require_once(APPPATH.'libraries/config.php');
$total_amount=0;
$delivery_charge=0;
if(isset($restaurent['delivery_charges']) && $restaurent['delivery_charges']!=''){$delivery_charge=$restaurent['delivery_charges'];}


		 if(!empty($cart))
		 {
		 foreach($cart as $allcart)
		 {
		 
		 $menu=$this->search_model->get_menu_detail($allcart['menu_id']);
		 $total_amount=$total_amount+$menu['item_cost']*$allcart['quantity'];
		 $type=$cart[0]['type'];
		 
		 ?>
    
		   
		   <h4><font style=" margin:3px 0px 0px 0px"><?php echo $allcart['quantity']; ?>x</font> <?php echo ucfirst($menu['item_name']); ?> <span><?php echo $dollar; ?><?php echo number_format($menu['item_cost']*$allcart['quantity'],2); ?> <font style="font-size:10px;  margin:0px 0px 0px 5px; right:0;"><a href="javascript:void(0);" class="delete_cart" id="delete_cart<?php echo $allcart['id']; ?>">X</a></font></span></h4>
		   
		   
          <?php
		   if($allcart['addons']!='')
	  {
	   $addon_id= explode(',',$allcart['addons']);
	  $addons=$this->search_model->get_addonsby_id($addon_id);
	  
		  if(!empty($addons))
		  {
		  foreach($addons as $alladons)
	  {
	   $total_amount=$total_amount+$alladons['price'];
	  ?>
           
		    <h4><font style=" margin:3px 0px 0px 0px">&nbsp;</font> <?php echo ucfirst($alladons['extra_item']); ?> <span><?php echo $dollar; ?><?php echo number_format($alladons['price'],2); ?> <font style="font-size:10px;  margin:0px 0px 0px 5px; right:0;"></font></span></h4>
		             
		   
		   <?php } } } ?>
           <?php } ?>
           <br />
		   <?php
		 if($type!='delivery')
		 {
		 $delivery_charge=0;
		 }
		 
		   ?>
		   </div>
           <h4>Subtotal <span><?php echo $dollar; ?><?php echo number_format($total_amount,2); ?></span></h4>
		   <?php /*?><h4 style="color:#FF0000; text-align:right; display:none;" id="min_amount">Minimum $<?php if(isset($restaurent['min_order']) && $restaurent['min_order']!=''){echo number_format($restaurent['min_order'],2);}?></h4><?php */?>
<?php 

//muda valor do delivery  caso tenha valor  base para desconto
//recebe info se entrega 
$delivery =  $restaurent['delivery_check'];

$free_delivery = $restaurent['free_delivery'];

//echo '<script type="text/javascript"> alert("'. $_POST['type'] . '")</script>';


//echo '<script type="text/javascript"> alert("'. $type . '")</script>';

?>



<?php
//testa se restarurante faz retirada  e entrega e tb se usuario escolhe retirada, nao aparece  tx de entrega
if  ($_POST['type']== 'delivery' )
{
if ($total_amount <= $free_delivery)
{
$final_amount=$total_amount+$delivery_charge;

if ($free_delivery>=0)
{
?>
<h4 >Free Delivery from $<?php echo $free_delivery; ?></h4>
<?php
}

if ($total_amount <= $free_delivery)
{
$final_amount=$total_amount+$delivery_charge;
?>

<h4>Delivery Charge<span><?php echo $dollar; ?><?php echo number_format($delivery_charge,2); ?></span></h4>

<?php
}
}
else
{

$final_amount=$total_amount;
?>

<h4>Delivery Charge<span><?php echo "(Free Delivery)"; ?></span></h4> 

<?php
//echo '<script type="text/javascript"> alert("'. "maior 15" . '")</script>';
}

}
else
{
$final_amount=$total_amount;
}

?>




          <hr />
           <h6>Total <span><?php echo $dollar; ?><?php echo number_format($final_amount,2); ?> </span></h6>
		   <?php } ?>
