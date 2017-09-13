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
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Dear  <?php echo ucwords($data['first_name']); ?></div></td>
    </tr>
  
  
  <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Thank you for registering with PortuGo! . </div></td>
    </tr>
	
	<tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">We are glad to welcome you. </div></td>
    </tr>
 
	
	<tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">we need to activate Your account, Please hit the button below: </div></td>
    </tr>
		<tr>
    <td width="96%" height="55"><a href='<?php echo base_url('signup/confirm').'/'.$data['user_id'].'/'.$data['activation_code']; ?>' target="_blank" style="text-decoration:none;">
      <div style="width:217px; height:18px; background:#f31515; border-radius:6px; font-size:16px; font-family:Myriad Pro,arial; color:#ffffff; font-weight:500; text-align:center; text-decoration:none; padding:10px 0px; margin:10px 0px 0px 0px;">Activate now</div></a></td>
    </tr>
	
  
	
	
  
  	<tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">When you are ready to order, you can sign into your registered account with your username:(<?php echo $data['email']; ?>) at <a href="<?php echo base_url(); ?>"><?php echo base_url(); ?></a></div></td>
    </tr>
  <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Be sure to follow us on social media to keep up to date with PortuGo. </div></td>
    </tr>
  
 
	
	<tr>
      <td width="96%" height="55" align="left">
	<a href="https://www.facebook.com/portugotakeaway/" target="_blank"><img src="<?php echo base_url('public/front/img/facebook.jpg'); ?>" width="54" height="41" border="0" /></a>
	<a href="https://www.instagram.com/portugotakeaway/" target="_blank"><img src="<?php echo base_url('public/front/img/instagram.jpg'); ?>" width="54" height="41" border="0" /></a>
	<a href="https://twitter.com/PortuGoTakeaway" target="_blank"><img src="<?php echo base_url('public/front/img/twiter.jpg'); ?>" width="54" height="41" border="0" /></a>
	<a href="https://www.youtube.com/channel/UCxFbt4z4TyGHMuLyPCskebQ" target="_blank"><img src="<?php echo base_url('public/front/img/youtube.jpg'); ?>" width="54" height="41" border="0" /></a>
	</td>
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
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Caro  <?php echo ucwords($data['first_name']); ?></div></td>
    </tr>
  
  
  <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "><?php echo utf8_encode('Obrigado por se registrar em PortuGo'); ?>!   </div></td>
    </tr>
	
	<tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "><?php echo utf8_encode('Estamos muito felizes em recebê-lo'); ?>.  </div></td>
    </tr>
  
  
	
	<tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "><?php echo utf8_encode('Precisamos ativar sua conta, por favor clique no botão abaixo'); ?>: </div></td>
    </tr>
		<tr>
    <td width="96%" height="55"><a href='<?php echo base_url('signup/confirm').'/'.$data['user_id'].'/'.$data['activation_code']; ?>' target="_blank" style="text-decoration:none;">
      <div style="width:217px; height:18px; background:#f31515; border-radius:6px; font-size:16px; font-family:Myriad Pro,arial; color:#ffffff; font-weight:500; text-align:center; text-decoration:none; padding:10px 0px; margin:10px 0px 0px 0px;">Ative agora</div></a></td>
    </tr>
	
  
  	<tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "><?php echo utf8_encode('Quando estiver pronto para fazer um pedido, pode iniciar sessão na sua conta registada com o nome de utilizador'); ?>:(<?php echo $data['email']; ?>) em  <a href="<?php echo base_url(); ?>"><?php echo base_url(); ?></a></div></td>
    </tr>
  <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "><?php echo utf8_encode('Não se esqueça de nos seguir nas nossas redes sociais para se manter sem atualizado com PortuGo!'); ?> </div></td>
    </tr>
  
  
	
	<tr>
      <td width="96%" height="55" align="left">
	<a href="https://www.facebook.com/portugotakeaway/" target="_blank"><img src="<?php echo base_url('public/front/img/facebook.jpg'); ?>" width="54" height="41" border="0" /></a>
	<a href="https://www.instagram.com/portugotakeaway/" target="_blank"><img src="<?php echo base_url('public/front/img/instagram.jpg'); ?>" width="54" height="41" border="0" /></a>
	<a href="https://twitter.com/PortuGoTakeaway" target="_blank"><img src="<?php echo base_url('public/front/img/twiter.jpg'); ?>" width="54" height="41" border="0" /></a>
	<a href="https://www.youtube.com/channel/UCxFbt4z4TyGHMuLyPCskebQ" target="_blank"><img src="<?php echo base_url('public/front/img/youtube.jpg'); ?>" width="54" height="41" border="0" /></a>
	</td>
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