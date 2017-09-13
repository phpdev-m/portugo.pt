

 <div class="clearfix bar" id="" style="height:60px;">&nbsp;</div>
   <div  class="social_col mobile" style="margin-top:-60px; height:90px; display:none1">
   <a href="https://www.facebook.com/portugotakeaway/" target="_blank"><div class="s_facebook"><i class="fa fa-facebook" aria-hidden="true" style="color:#FFF; padding:11px 0 0 13px; font-size:21px"></i></div></a>
  <a href="https://www.instagram.com/portugotakeaway/" target="_blank"><div class="s_instagram"><i class="fa fa-instagram" aria-hidden="true" style="color:#FFF; padding:11px 0 0 12px; font-size:21px"></i></div></a>
   <a href="https://twitter.com/PortuGoTakeaway" target="_blank"><div class="s_twitter"><i class="fa fa-twitter" aria-hidden="true" style="color:#FFF; padding:11px 0 0 13px; font-size:20px"></i></div></a>
   <a href="https://www.youtube.com/channel/UCxFbt4z4TyGHMuLyPCskebQ" target="_blank"><div class="s_youtube"><i class="fa fa-youtube" aria-hidden="true" style="color:#FFF; padding:10px 0 0 13px; font-size:20px; font-weight:normal;"></i></div></a>
  </div>
     </div>
   
     
 <div class="clearfix"  style="height:0px;"></div>


<style>.footer_center {
    padding: 0px;
  
    float: left;
    margin-left: 5px;
	text-align:center}
	
	.footer_col {
    padding: 0 1%;
    width: 100%;
}
.res_top_nav { margin: 12px 0px 0px 10px; padding: 0; }
.res_top_nav a { color: #4d4d4d !important;  font-size: 14px; line-height:20px; display:inline;  list-style: none outside none; margin: 0; padding:7px 3px 10px; text-decoration: none;  font-family: 'Segoe UI'; font-weight:bold; text-align: center;}
.res_top_nav a:hover { color: #d8261c;text-decoration:none;}
	
	</style>
<div style="background:#efeeee; overflow:hidden ">
 <div class="footer_col" >
 
 <div class="padding_main pc" style="width:212px; float:left">
 <div  class="social_col ">
   <a href="https://www.facebook.com/portugotakeaway/" target="_blank"><div class="s_facebook"><i class="fa fa-facebook" aria-hidden="true" style="color:#FFF; padding:11px 0 0 13px; font-size:21px"></i></div></a>
  <a href="https://www.instagram.com/portugotakeaway/" target="_blank"><div class="s_instagram"><i class="fa fa-instagram" aria-hidden="true" style="color:#FFF; padding:11px 0 0 12px; font-size:21px"></i></div></a>
   <a href="https://twitter.com/PortuGoTakeaway" target="_blank"><div class="s_twitter"><i class="fa fa-twitter" aria-hidden="true" style="color:#FFF; padding:11px 0 0 13px; font-size:20px"></i></div></a>
   <a href="https://www.youtube.com/channel/UCxFbt4z4TyGHMuLyPCskebQ" target="_blank"><div class="s_youtube"><i class="fa fa-youtube" aria-hidden="true" style="color:#FFF; padding:10px 0 0 13px; font-size:20px; font-weight:normal;"></i></div></a>
  </div>
 </div>
 
 
 <div class=" pc footer_center">
  <div class="res_top_nav">
   
    <a href="<?php echo base_url('page/contact_us'); ?>"><?php echo $this->lang->line('Contact us');?></a>
    <a href="<?php echo base_url('page/faq'); ?>"><?php echo $this->lang->line('FAQ');?></a>
   <!--<a href="<?php echo base_url('page/recomend_restaurant'); ?>"><?php echo $this->lang->line('Recommend a restaurant');?></a>-->
    <a href="<?php echo base_url('page/about_us'); ?>"><?php echo $this->lang->line('About Us');?></a>
    <a href="<?php echo base_url('page/term_condition'); ?>"><?php echo $this->lang->line('Terms and conditions');?></a>
    <a href="<?php echo base_url('page/privacy_policy'); ?>"><?php echo $this->lang->line('Privacy policy');?></a>
   
 </div>
 
 </div>




 
 <div class="footer_bottom_right footer_right pc" >
 
 <h1>
 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">

    <td>
     
            <img src="<?php echo base_url(); ?>public/front/images/mb.png" width="23" height="23"/>
 <img src="<?php echo base_url(); ?>public/front/images/visa.png"  class="payment_icon" />
 <img src="<?php echo base_url(); ?>public/front/images/master.png"   class="payment_icon" />
 <img src="<?php echo base_url(); ?>public/front/images/paypal.png"   class="payment_icon"/>
  <img src="<?php echo base_url(); ?>public/front/images/mastro.png"  class="payment_icon"/>
  <p style="margin:5px 0px 3px 0px" class="font_s">&copy; <?php echo date('Y');?> GoTakeaway</p></td>
  </tr>
</table>

  </h1>
 </div>
 


 
 <div class="footer_bottom_right mobile "  >
 
 <h1>
 <?php
 $language_data=$this->session->userdata('language');
 ?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">

    <td>
    <form id="language1" name="language_select" action="" method="post"  class="flag_mar mobile" style=" float:right; position:absolute; right:0;" >
            <select name="lang_sel" id="mycomp1" class="select deepak mycomp" style="width:45px; cursor:pointer" data-maincss="blue">
           <option  title="<?php echo base_url();?>public/front/images/pr.png" <?php if($language_data['language']=='purtgal'){ echo "selected==selected"; } ?> value="purtgal" class="pr_img"></option>
            <option  title="<?php echo base_url();?>public/front/images/en.png" <?php if($language_data['language']=='english'){ echo "selected==selected"; } ?> value="english"  class="en_img"></option>
            </select>
            </form> 
            <img src="<?php echo base_url(); ?>public/front/images/mb.png" width="23" height="23"/>
 <img src="<?php echo base_url(); ?>public/front/images/visa.png"  class="payment_icon" />
 <img src="<?php echo base_url(); ?>public/front/images/master.png"   class="payment_icon" />
 <img src="<?php echo base_url(); ?>public/front/images/paypal.png"   class="payment_icon"/>
  <img src="<?php echo base_url(); ?>public/front/images/mastro.png"  class="payment_icon"/>
  <p style="margin:5px 0px 3px 0px; text-align:center !important;" class="font_s">&copy; <?php echo date('Y');?> GoTakeaway</p></td>
  </tr>
</table>

  </h1>
 </div>
 
 </div>
 </div>









  	 
<script>

$(function(){
	  $('.mycomp').on('change',function(){
		  
	   var language = $(this).val();
	 var page = $("#page_name").val();
	  if(language!=''){
	  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>langswitch/switchlanguage",	  
            data: {language:language},			
            success: function(msg){

		//alert(msg); return false;

           if(msg!='')
				{
				window.location.reload();	
				}
               /*if(page=='home'){
				 
				 window.location.href = '<?php echo base_url();?>home';
			
			}*/

			
            }
			});
	  }
   });
});
</script>

<!--<script>
//wH = $(window).height();
var wH= $('.bar').offset().top - $('.foo').offset().top;

if(wH<500){
 $(".mobile_footer").show();	
} else{
	 $(".mobile_footer").css('display','none');
}
</script>

<script>
$(window).resize(function(){
	if ($(window).width() < 768){
$(window).scroll(function() {
   var hT = $('#malik').offset().top,
       hH = $('#malik').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
   
   if (wS > (hT+hH-wH)){
       $(".mobile_footer").css('display','inline');
   } else{
	   $(".mobile_footer").css('display','none');
   }
});
} else {
	
	 $(".mobile_footer").css('display','none');
	
}	
});
</script>
-->
	   
 
