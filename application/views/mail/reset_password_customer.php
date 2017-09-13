
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
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Dear <?php echo ucwords($customer['first_name'].'&nbsp;'.$customer[' 	last_name']); ?></div></td>
    </tr>
 
 
  <tr>
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">We received a request to reset your password for your PortuGo account. We're here to help.</div></td>
    </tr>
  
 
 
  <tr>
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Simply click on the button to set a new password..</div></td>
    </tr>
   
  
  
  <tr>
    <td width="96%" height="60" valign="top"><a href='<?php echo base_url('signup/customer')."/".md5($customer['email']).$customer['user_id']; ?>' target='_blank' style="text-decoration:none;">
      <div style="width:217px; height:18px; background:#f31515; border-radius:6px; font-size:16px; font-family:Myriad Pro,arial; color:#ffffff; font-weight:500; text-align:center; text-decoration:none; padding:10px 0px; margin:10px 0px 0px 0px;">Set a new password</div></a></td>
</tr>
  
 
  
  
   <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "> If you didn't ask to change your password, don't worry! Your password is still safe and you can delete this email. . </div></td>
    </tr>
  
  <tr>
    <td width="96%" height="30">&nbsp;</td>
    </tr>
  
  
 
  <tr>
    <td width="96%" height="30"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; font-weight:bold ">Sincerely,<br>
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
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Caro <?php echo ucwords($customer['first_name'].'&nbsp;'.$customer[' 	last_name']); ?></div></td>
    </tr>
  
 
  <tr>
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "><?php echo utf8_encode('Recebemos uma requisição para redefinir a senhada sua conta PortuGo. Estamos aqui para ajudar..'); ?></div></td>
    </tr>
  
 
 
  <tr>
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "><?php echo utf8_encode('Basta clicar no botão para criar uma nova senha'); ?>.</div></td>
    </tr>
   
  
  
  <tr>
    <td width="96%" height="60" valign="top"><a href='<?php echo base_url('signup/customer')."/".md5($customer['email']).$customer['user_id']; ?>' target='_blank' style="text-decoration:none;">
      <div style="width:217px; height:18px; background:#f31515; border-radius:6px; font-size:16px; font-family:Myriad Pro,arial; color:#ffffff; font-weight:500; text-align:center; text-decoration:none; padding:10px 0px; margin:10px 0px 0px 0px;"><?php echo utf8_encode('Criaruma nova senha'); ?></div></a></td>
</tr>
  
  
   <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "> <?php echo utf8_encode('Se você não solicitou uma alteração de senha, não se preocupe! Sua senha ainda é segura e você pode excluir este email'); ?>. </div></td>
    </tr>
  
 
  
 
  <tr>
    <td width="96%" height="30"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; font-weight:bold ">Atenciosamente,<br>
Equipa PortuGo
</div></td>
    </tr>
  
 
  
  </table>
  <?php }
  
  
  ?>
  
  
</div>

</div>