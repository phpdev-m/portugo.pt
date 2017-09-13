<?php
require_once(APPPATH.'libraries/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="icon" href="<?php echo base_url();?>public/images/logoportugo.png">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
 <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>public/front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>public/front/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/front/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/front/css/font.css" rel="stylesheet">
     <!-- ...............add................-->
    <link href="<?php echo base_url();?>public/front/css/new_css.css" rel="stylesheet">
     <!-- ...............add................-->
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.min.js"></script>
  
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/bootstrap.min.js"></script>
<!--<script src="js/scrolltopcontrol.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/front/css/dd.css" />
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.dd.js"></script>
<script>
$(function(){
 $(window).on('load',function(){
 //$('.selected .ddlabel').hide();
 //$('.selected .fnone').hide();
 });
 $('#mycomp').on('change',function(){
	var flag = $(this).val();
	
	$('.enabled _msddli_ selected ddlabel').hide();
    $('.enabled _msddli_ selected fnone').hide();
	
 });
$(document).on('mouseleave','#mycomp_msdd',function(){
    $(this).removeClass('borderRadiusTp');
	 $(this).addClass('borderRadius');
	 $('#mycomp_child').hide();
 });
  $(document).on('mouseenter','#mycomp_msdd',function(){
   $(this).removeClass('borderRadius');
    $(this).addClass('borderRadiusTp');
	
	 $('#mycomp_child').show();
 });
});
</script>
<script>
$(function(){
  $(document).on('click',function(){
    $('.navbar-collapse').removeClass('in');
  });
  $(window).scroll(function() {
   //$('.navbar-collapse').removeClass('in');
});
$('.dropdown').on('click',function(){
$('.san').hide();
});
$('.navbar-toggle').on('click',function(){
$('.san').show();
});
});
</script>

<title>PortuGo</title>
</head>
<body>

<?php $this->load->view('segment/header');?>


  <div class=" inner_wrapper wrap_margin" >
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12 padding_main">
       <a href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('Home');?></a>&nbsp;  / &nbsp;      <?php echo $this->lang->line('Recent Orders');?>
      </div>
      </div>
   </div>
  <div class="container">
    <div class="row">
    
      <?php $this->load->view('segment/user_sidebar');?>
     
     
     
     <div class="col-md-09 padding_main">
     
     <div class="col-md-12">
     <div class="account_head">
    <h1><?php echo $this->lang->line('Recent Orders');?></h1>
    </div>
    <div class="pc">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
     
  <tr>
    
    <td height="40" align="center" class="td_bord"><strong><?php echo $this->lang->line('Order&nbsp;Number');?></strong></td>
    <td height="40" align="center" class="td_bord"><strong><?php echo $this->lang->line('Ordered&nbsp;At');?></strong></td>
    <td height="40" align="center" class="td_bord"><strong><?php echo $this->lang->line('Order&nbsp;Type');?></strong></td>
   <td height="40" align="center" class="td_bord"><strong><?php echo $this->lang->line('Payment&nbsp;Method');?></strong></td>
    <td height="40" align="center" class="td_bord"><strong><?php echo $this->lang->line('Order&nbsp;Status');?></strong></td>
    <td height="40" align="center" class="td_bord"><strong><?php echo $this->lang->line('Details');?></strong></td>
    <td height="40" align="center" class="td_bord"><strong><?php echo $this->lang->line('Reviews');?></strong></td>
    <td height="40" align="center" class="td_bord"><strong>Print Receipt</strong></td>
  </tr>
  
  
 <?php 	
 foreach($all_orders as $allorder){ 

//correcao  das datas
$timeorder=$allorder['order_date'];
$order_time = gmdate("H:i ", $timeorder);
$order_date = gmdate("d-m-Y ", $timeorder);

//echo '<script type="text/javascript"> alert("'. $date . '")  </script>';
//echo '<script type="text/javascript"> alert("'. $time . '")  </script>';
//$timedelivery=$w['delivery_time'];
//$delivery_time = gmdate("H:i A:", $timedelivery);
//$delivery_date = gmdate("d-m-Y ", $timedelivery);

 ?>
  
 <tr>
    
    <td height="60" align="center" class="td_bord"><?php echo $allorder['order_id']; ?></td>
    <td height="60" align="center" class="td_bord"><?php if($allorder['order_date']!=''){ echo $order_date; ?> <br /><?php echo $order_time;} ?> </td>
    <td height="60" align="center" class="td_bord"><?php echo $allorder['order_type']; ?></td>
   
    <td height="60" align="center" class="td_bord"><?php echo ucwords($allorder['payment_method']);?></td>
    <td height="60" align="center" class="td_bord delivered "><?php if($allorder['status']==0){ echo "Cancelled";} if($allorder['status']==1){echo "Pending";} if($allorder['status']==2){echo "Processing";}if($allorder['status']==3){echo "Delivered";}?></td>
    <td height="60" align="center" class="td_bord"><a href="<?php echo base_url();?>myaccount/view_order/<?php echo $allorder['id']?>"><strong>View Full <br /> Details</strong></a></td>
    <td height="60" align="center" class="td_bord"><?php if($allorder['status']==3){
	$review=$this->order_model->get_review($allorder['id']);
	if(empty($review))
	{
	?>
	<a href="javascript:void()0;" data-target="#myModal_new_tag" data-toggle="modal" class="give_rating" id="give_rating<?php echo $allorder['id']; ?>" ><button class="btn_contine" type="button" style="padding:5px; width:100px; font-size:14px;" >Give Feedback</button></a>
	 
	<?php }else { 
	echo '<h4 style="color:#ffbf00;">'; 
	for($i=1;$i<=$review['rating']; $i++)
	{
   echo '<i class="fa fa-star"></i>';
    }
    
	for($i=1;$i<=5-$review['rating']; $i++)
	{
   echo  '<i class="fa fa-star-o"></i>';
     } 
	echo ' </h4>';
	}
	 } ?></td>
	 
	  <td height="60" align="center" class="td_bord"><a href="javascript:void(0);" class="print" id="print<?php echo $allorder['id']?>">Print</a></td>
	 
	 
  </tr>
  
 <?php } ?> 
   
  
  
    </table>
    </div>
    
    
    <div class="mobile">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
    
      <td height="40" align="center" class="td_bord"><strong><?php echo $this->lang->line('Order&nbsp;Number');?></strong></td>
    <td height="40" align="center" class="td_bord"><strong><?php echo $this->lang->line('Order&nbsp;At');?></strong></td>
  
        <td height="40" align="center" class="td_bord"><strong><?php echo $this->lang->line('Order&nbsp;Status');?></strong></td>
    <td height="40" align="center" class="td_bord"><strong><?php echo $this->lang->line('Details');?></strong></td>
    <td height="40" align="center" class="td_bord"><strong><?php echo $this->lang->line('Reviews');?></strong></td>
  </tr>
  <?php
  if(!empty($order))
  {
  foreach($order as $allorder)
  {?>
   <tr>
    <td height="60" align="center" class="td_bord"><?php echo $allorder['order_id']; ?></td>
    <td height="60" align="center" class="td_bord"><?php if($allorder['order_date']!=''){ echo date('d-m-Y',$allorder['order_date']); ?> <br /><?php echo date('H:i A',$allorder['order_date']);} ?></td>
    
    <td height="60" align="center" class="td_bord delivered "><?php if($allorder['status']==0){ echo "Cancelled";} if($allorder['status']==1){echo "Pending";} if($allorder['status']==2){echo "Processing";}if($allorder['status']==3){echo "Delivered";}?></td>
    <td height="60" align="center" class="td_bord"><a href="<?php echo base_url('order/detail/'.$allorder['id']); ?>"><strong>View Full <br /> Details</strong></a></td>
    <td height="60" align="center" class="td_bord"><?php if($allorder['status']==3){
	$review=$this->order_model->get_review($allorder['id']);
	if(empty($review))
	{
	?>
	<a href="javascript:void()0;" data-target="#myModal_new_tag" data-toggle="modal" class="give_rating" id="give_rating<?php echo $allorder['id']; ?>" ><button class="btn_contine" type="button" style="padding:5px; width:100px; font-size:14px;" >Give Feedback</button></a>
	 
	<?php }else { 
	echo '<h4 style="color:#ffbf00;">'; 
	for($i=1;$i<=$review['rating']; $i++)
	{
   echo '<i class="fa fa-star"></i>';
    }
    
	for($i=1;$i<=5-$review['rating']; $i++)
	{
   echo  '<i class="fa fa-star-o"></i>';
     } 
	echo ' </h4>';
	}
	 } ?></td>
  </tr>
  
  <?php } } else{ ?>
   <tr>
       
     <td height="60" align="center" bgcolor="#fafafa" class="td_bord" colspan="5"><div class="error"><?php echo $this->lang->line('No Records');?>.......</div></td>
  </tr>
  <?php 
  }?>
 
    </table>
    </div>
    
     </div>
     </div>
     </div>
    </div>
    
  
 <?php $this->load->view('segment/footer');?>
 
 
</body>
</html>

<script type="text/javascript" src="<?php echo base_url();?>public/front/js/ddaccordion.js">
/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/
</script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})

</script>



<div class="modal fade" id="myModal_new_tag" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url();?>public/front/images/close.png">
</button>
        <h3 style="margin:0px;"><center><?php echo $this->lang->line('Reviews');?></center></h3>
      </div>
      
       <h2 style="margin:50px 0px; color:#3fbb01; display:none;" class="mun" ><center><?php echo $this->lang->line('Thank you for your feedback');?>!</center></h2>
      
      
      <div class="modal-body ">
       <form  class="form-horizontal san" name="register-form" id="review_form" method="post" action="<?php echo base_url('order/provide_review'); ?>" >
       
       <input type="hidden" name="order_id" id="order_id">
      
        <div class="form-group has-feedback">
          <div class="col-md-12 padding">
   <div class="col-md-4">
  <p style=" color:#000; margin:0px;"> <?php echo $this->lang->line('Rating');?>  <span style="color:#F00">*</span></p>
  </div>
   <div class="col-md-7">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div class="radio">
<input id="radio1" name="rating" value="1" checked="" type="radio">
<label for="radio1">1 </label>
</div></td>
    <td><div class="radio">
<input id="radio12" name="rating" value="2" checked="" type="radio">
<label for="radio12"> 2 </label>
</div></td>
    <td><div class="radio">
<input id="radio13" name="rating" value="3" checked="" type="radio">
<label for="radio13"> 3 </label>
</div></td>
    <td><div class="radio">
<input id="radio14" name="rating" value="4" checked="" type="radio">
<label for="radio14"> 4 </label>
</div></td>
    <td><div class="radio">
<input id="radio15" name="rating" value="5" checked="" type="radio">
<label for="radio15"> 5 </label>
</div></td>
  </tr>
</table>

</div>
</div>
</div>


      <div class="form-group has-feedback">
          <div class="col-md-12 padding">
   <div class="col-md-4">
  <p style=" color:#000; margin:0px;"><?php echo $this->lang->line('Message');?> <span style="color:#F00">*</span></p>
  </div>
   <div class="col-md-7">
   <textarea class="form-control" name="message" id="message" style="height:150px;"></textarea>
   <span id="message_error" style="display:none;color:#a94442;">*<?php echo $this->lang->line('Please enter message');?>.</span>
</div>
</div>
</div>

<div class="form-group has-feedback">
  <div class="col-md-12 padding">
   <div class="col-md-4">
  <p style=" color:#000; margin:0px;">&nbsp;</p>
  </div>
   <div class="col-md-7">
   <input class="btn_login alo" value="Submit" type="button" style="margin:5px 0px 0px 0px;" onclick="return validate();"/>
  </div>
 </div>
</div>

</form>

      </div>
      
      
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
$(".alo").click(function(){
   /* $(".san").hide();
	  $(".mun").show();*/
});
});
</script>

<script>
$(document).ready(function(){

	 $(document).on('click',".moon",function(){
    $(".san").slideDown();
	$(this).addClass('choon');
	$(this).removeClass('moon');
  });
   $(document).on('click',".choon",function(){
    $(".san").slideUp();
	$(this).addClass('moon');
	$(this).removeClass('choon');
  });
  
});
</script>


<script>
$(document).ready(function(){
	$(document).on('click',".mess_btn",function(){
	$(".send_mass").show();
  });

});
</script>



<script>
$(document).ready(function(){	
$(".give_rating").click(function(){	
var res=$(this).attr('id');
var order_id=res.replace('give_rating','');
$("#order_id").val(order_id);

});
});
</script>

<script>
$(document).ready(function(){	
$(".print").click(function(){	
var res=$(this).attr('id');
var order_id=res.replace('print','');
$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('order/order_print_detail'); ?>', 
    data: {order_id:order_id}, 
    success: function (data) {
     //alert(data);
	$("#print_order_detail").html(data);
	PrintElem('#print_order_detail')
	}
    });

});
});
</script>

<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js" > </script> 
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>


<div id="print_order_detail">
</div>





<script>
function validate()
{
var message=$("#message").val();
if(message=='')
{
$("#message_error").show();
$("#message").focus();
return false;
}
else
{
$("#message_error").hide();
 $(".san").hide();
	  $(".mun").show();
	  $("#review_form").submit();

 }
 

}
</script>




 <script>

$(document).ready(function(e) {		
	//no use
	try {
		var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
												var val = data.value;
												if(val!="")
													window.location = val;
											}}}).data("dd");

		var pagename = document.location.pathname.toString();
		pagename = pagename.split("/");
		pages.setIndexByValue(pagename[pagename.length-1]);
		$("#ver").html(msBeautify.version.msDropdown);
	} catch(e) {
		//console.log(e);	
	}
	
	$("#ver").html(msBeautify.version.msDropdown);
		
	//convert
	$(".select").msDropdown({roundedBorder:false});
	createByJson();
	$("#tech").data("dd");
});
function showValue(h) {
	console.log(h.name, h.value);
}
$("#tech").change(function() {
	console.log("by jquery: ", this.value);
})
//
</script>

<style>
#mycomp_child{height:90px!important;}

#mycomp1_child{ margin-left: -6px;
    margin-top: 25px;}

</style>
