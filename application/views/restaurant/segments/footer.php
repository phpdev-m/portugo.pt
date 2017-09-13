<style>

.close_btn{position: absolute;top: 0; right: 0;}
</style>
<div class="footer">
		<div class="footer-inner">
			<?php echo date('Y'); ?> &copy; <?php echo $title; ?>|Restaurant
			
			
			<div id="order_msg_pop" style="position:fixed; right:0;bottom:0; margin:-80px 0px 20px 0px;background-color:#b70101;font-size:16px; padding:10px 50px;color:#ffffff;border-radius:5px;display:none;">You have a new  order <a href="javascript:void(0);" id="close_pop"><font class="close_btn">X</font></a></div>
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
    <audio controls  style="display:none;" id="notification_tone">
  <source src="horse.ogg" type="audio/ogg">
  <source src="<?php echo base_url('public/notification.mp3'); ?>" type="audio/mpeg">
  Your browser does not support the audio element.
</audio> 
    




 

    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
    
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

           if(msg!='')
				{
				window.location.reload();	
				}
               			
            }
			});
	  }
   });
});
</script>
<?php
$session_data=$this->session->userdata('restaurant_logged_in');
$rest_id=$session_data['id'];

$query="select * from `order`  where restaurant_id='$rest_id' and status='1'";
//echo $query;
$res=mysql_query($query);
$num=mysql_num_rows($res);
?>
<input type="hidden" name="" id="pending_order_footer" value="<?php echo $num; ?>" >
<script>
    $(document).ready(
            function() {
                setInterval(function() {
				var  pending_order='';
				var  pending_order=$("#pending_order_footer").val();
			
				$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('restaurant/dashboard/get_pending_order'); ?>', 
    data: {pending_order:pending_order}, 
    success: function (data) {
	
	data=parseInt(data);
	//alert(data);
	if(data > pending_order)
	{
     $('audio')[0].play(); 
	 $("#pending_order").val(data);
	 $("#pending_order_footer").val(data);
	 $("#pending_total").html(data);
	  $("#order_msg_pop").show();
	 }
	}
    });
				
				
				
				
				
				}, 3000);
            });
</script>

<script>

$(function(){
	  $('#close_pop').on('click',function(){
	  
	  $("#order_msg_pop").hide();
	  });
});
</script>
