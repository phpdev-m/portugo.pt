<?php  
$language_data=$this->session->userdata('language');
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
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Dear  <?php echo ucwords($data['first_name'].'&nbsp;'.$data['last_name']); ?></div></td>
    </tr>
	

  
  
  <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Thank you very much for contacting us on  (<?php echo date('d/m/Y'); ?> at <?php echo date('H:i'); ?>).A representative will respond to your inquiry as soon as possible. </div></td>
    </tr>
  
  <tr>
    <td width="96%" height="30">&nbsp;</td>
    </tr>
  
  
  <tr>
    <td width="96%" height="30"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; font-weight:bold ">Many thanks,<br>
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
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Caro <?php echo ucwords($data['first_name'].'&nbsp;'.$data['last_name']); ?></div></td>
    </tr>
  
  <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Muito obrigado por contactar-nos   (<?php echo date('d/m/Y'); ?> <?php echo utf8_encode('às'); ?>  <?php echo date('H:i'); ?>)). <?php echo utf8_encode('Um representante responderá à sua solicitação o mais breve possível'); ?>.. </div></td>
    </tr>
  
 
  
  <tr>
    <td width="96%" height="30"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; font-weight:bold ">Muito obrigado,<br>
Equipa PortuGo
</div></td>
    </tr>
  
 
  
  </table>
  <?php }
  
  
  ?>
  
  
</div>

</div>