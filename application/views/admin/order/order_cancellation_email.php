<?php  
$language_data=$this->session->userdata('language');
//print_r($language_data);die;
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
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Dear  <?php echo ucwords($name); ?></div></td>
    </tr>
  
  
  <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Thank you for placing an order with (<?php echo ucwords($rest_name); ?>). Unfortunately, we cannot fulfil your order <?php echo $order_number; ?> at this time. . </div></td>
    </tr>
  
 
	 <tr>
    <td width="96%" height="30"> Your order was not fulfilled for the following reason:</td>
    </tr>
 <tr>
    <td width="96%" height="30" style="color:#FF0000; text-align:center"> <?php echo $data['cancel_reason']; ?><br>
OR<br>
Your credit/debit card has been declined. If the authorisation from the bank failed.
</td>
    </tr>
 
 
 
 
  <tr>
    <td width="96%" height="30"> We sincerely apologise for any inconvenience caused. 
</td>
    </tr>
	
	
	<tr>
    <td width="96%" height="30"> Still want to order takeaway? Do not despair, there are many alternative restaurants on <a href="<?php echo base_url(); ?>">portugo.pt</a>  where you can place an order. 
</td>
    </tr>
	
	
	
  
  <tr>
    <td width="96%" height="30"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; font-weight:bold "><br>Sincerely,<br>
PortuGo Team
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
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Caro  <?php echo ucwords($name); ?></div></td>
    </tr>
  
  
  <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "><?php echo utf8_encode('Obrigado por fazer um pedido com'); ?>  (<?php echo ucwords($rest_name); ?>). <?php echo utf8_encode('Infelizmente, não podemos atender ao seu pedido'); ?> <?php echo $order_number; ?> <?php echo utf8_encode('neste momento'); ?> . </div></td>
    </tr>
  
 
	 <tr>
    <td width="96%" height="30"> <?php echo utf8_encode('Seu pedido não foi aceito pelas seguintes razões'); ?>:</td>
    </tr>
 <tr>
    <td width="96%" height="30" style="color:#FF0000; text-align:center"> <?php echo $data['cancel_reason']; ?><br>
OR<br>
<?php echo utf8_encode('Your credit/debit card has been declined." If the authorisation from the bank failed'); ?>.
</td>
    </tr>

 
  <tr>
    <td width="96%" height="30"><?php echo utf8_encode('Pedimos sinceras desculpas por qualquer inconveniente causado'); ?>.
</td>
    </tr>
	
	
	<tr>
    <td width="96%" height="30"> <?php echo utf8_encode('Ainda deseja pedir seu takeaway? Não se desespere, existem muitos restaurantes alternativos em'); ?>  <a href="<?php echo base_url(); ?>">portugo.pt</a>  <?php echo utf8_encode('onde pode realizar um pedido'); ?>.
</td>
    </tr>
	
	
	
  
  <tr>
    <td width="96%" height="30"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; font-weight:bold "><br>Atenciosamente,<br>
Equipa PortuGo
</div></td>
    </tr>
  
 
  
  </table>
  <?php }
  
  
  ?>
  
  
</div>

</div>