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
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Dear  <?php echo ucwords($data['contact_name']); ?></div></td>
    </tr>
	

  
  <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Thank you very much for registering interest in joining PortuGo. After reviewing your application, we are delighted to confirm that we would like to welcome you to our growing family. </div></td>
    </tr>
  
  
	
	 <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000;font-weight:bold; ">Account Details for your Dashboard </div></td>
    </tr>
  
 
	
	 <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000;">Your username is: <?php echo $data['contact_email']; ?>.<br>
Your temporary password is(<?php echo $data['password']; ?>)
 </div></td>
    </tr>
  
  
	
	
	 <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">We have attached a comprehensive guide for you to refer to when setting up your restaurant profile. In this guide you will find out everything you need to know including what you can expect from us and what we expect from you. 
 </div></td>
    </tr>
  
  
	
  <tr>
    <td width="96%" height="55"><a href='<?php echo base_url('public/pdf/user_guide.pdf'); ?>'  style="text-decoration:none;">
      <div style="width:217px; height:18px; background:#f31515; border-radius:6px; font-size:16px; font-family:Myriad Pro,arial; color:#ffffff; font-weight:500; text-align:center; text-decoration:none; padding:10px 0px; margin:30px 0px 0px 0px;">Open User Guide</div></a></td>
    </tr>
  
 
	
	
	 <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Let's get started! To access your dashboard and set up your restaurant profile please <a href="<?php echo base_url('restaurant/login'); ?>" target="_blank">click here</a>. 
 </div></td>
    </tr>
  
 
	
	<tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000;">At PortuGo, we pride ourselves on our support system. Should you have any further questions or wish to arrange a training session; please don't hesitate to contact us at <font style="color:#FF0000;">contato@portugo.pt</font> 
    </tr>
  
  
	
  
  <tr>
    <td width="96%" height="30"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; font-weight:bold ">Many thanks and a warm welcome,<br>
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
    <td width="96%" height="55"> <div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; ">Caro  <?php echo ucwords($data['contact_name']); ?></div></td>
    </tr>
	
	
  
  
  <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "><?php echo utf8_encode('Muito obrigado pelo interesse em se juntar a PortuGo. Despois de revisarmos sua aplicação, estamos muito satisfeitos em confirmar que você é muito bem-vindo à nossa família em crescimento'); ?>. </div></td>
    </tr>
  
  
	
	 <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000;font-weight:bold; "><?php echo utf8_encode('Detalhes da conta para seu painel de controlo'); ?> </div></td>
    </tr>
  
  
	
	 <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000;"><?php echo utf8_encode('Seu nome de usuário é'); ?> : <?php echo $data['contact_email']; ?>.<br>
<?php echo utf8_encode('Sua senha temporária é'); ?>  (<?php echo $data['password']; ?>)
 </div></td>
    </tr>
  
 
	
	 <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "><?php echo utf8_encode('Anexamos um guia completo para você consultar quando configurar seu perfil de restaurante. Neste guia você vai descobrir tudo o que precisa saber, incluindo o que você pode esperar de nós e o que esperamos de você'); ?>. 
 </div></td>
    </tr>
  
  
  <tr>
    <td width="96%" height="55"><a href='<?php echo base_url('public/pdf/user_guide.pdf'); ?>'  style="text-decoration:none;">
      <div style="width:217px; height:18px; background:#f31515; border-radius:6px; font-size:16px; font-family:Myriad Pro,arial; color:#ffffff; font-weight:500; text-align:center; text-decoration:none; padding:10px 0px; margin:30px 0px 0px 0px;"><?php echo utf8_encode('Abrir o guia do usuário'); ?></div></a></td>
    </tr>
  
  
	
	
	 <tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; "><?php echo utf8_encode('Vamos começar! Para acessar seu painel de controlo e configurar o seu perfil de restaurante'); ?> <a href="<?php echo base_url('restaurant/login'); ?>" target="_blank">clique aqui</a>. 
 </div></td>
    </tr>
  
  
	
	<tr>
    <td width="96%" height="55"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000;"><?php echo utf8_encode('Em PortuGo, nos orgulhamos do nosso sistema de apoio. Caso você tenha outras perguntas ou deseje organizar uma sessão de treinamento; não hesite em contactar-nos em'); ?> <font style="color:#FF0000;">contato@portugo.pt</font> 
    </tr>
  
  
	
	
  
  <tr>
    <td width="96%" height="30"><div style=" font-family:Myriad Pro,arial; font-size:16px; color:#000000; font-weight:bold "><?php echo utf8_encode('Muito obrigado e seja muito bem-vindo'); ?>,<br>
Equipa PortuGo
</div></td>
    </tr>
  
 
  
  </table>
  <?php }
  
  
  ?>
  
  
</div>

</div>