<?php
$session_user_id=$this->session->userdata('session_search_data');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
     <link href="<?php echo base_url();?>public/front/css/jquery-ui.css" rel="stylesheet">
<?php /*?><script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.min.js"></script><?php */?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/bootstrap.min.js"></script>
<!--<script src="js/scrolltopcontrol.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/front/css/dd.css" />
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.dd.js"></script>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDkQtOxZKHfcvJtdoYD_X1PflGNbOba_sQ&amp;libraries=places"></script>
 
<script src="<?php echo base_url();?>public/front/js/jquery.geocomplete.js"></script>
    <script src="<?php echo base_url();?>public/front/js/logger.js"></script> 
    <script>
      $(function(){
        
        
		var input = document.getElementById('geocomplete');
		var options = {
		types: ['(cities)'],
		componentRestrictions: {country: 'pt'}//Portugal only
		};
		var autocomplete = new google.maps.places.Autocomplete(input,options);
      });
    </script>
	<!--<script>
      $(function(){
        
        $("#geocomplete").geocomplete()
          .bind("geocode:result", function(event, result){
            $.log("Result: " + result.formatted_address);
          })
          .bind("geocode:error", function(event, status){
            $.log("ERROR: " + status);
          })
          .bind("geocode:multiple", function(event, results){
            $.log("Multiple: " + results.length + " results found");
          });
        
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        });
        
        
        $("#examples a").click(function(){
          $("#geocomplete").val($(this).text()).trigger("geocode");
          return false;
        });
        
      });
    </script>-->

<script>
$(function(){
 $(window).on('load',function(){
	 //alert();
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
   $('.navbar-collapse').removeClass('in');
});
$('.dropdown').on('click',function(){
$('.san').hide();
});
$('.navbar-toggle').on('click',function(){
$('.san').show();
});
});
</script>
<title>Gotakeaway</title>
</head>
<body>

 					
 	<?php $this->load->view('segment/header');?> 
   
   <!--<div class="wrap_margin top_border"></div>-->  
     
     
  <div class=" main_wrapper banner wrap_margin">
  
  
  
  <div class="container">
  
  
  <div class="col-lg-9 col-lg-offset-2">
  <div class="banner_text">
     <h1><?php echo $this->lang->line('Welcome to PortuGo Takeaway');?></h1>
     <!--<div class="b_border"><center><img src="images/border.jpg"  style="max-width:50%;" /></center></div>-->
  
  <form id="registerForm" action="<?php echo base_url('search'); ?>" method="post" class="form-horizontal bv-form" name="register-form" role="form">
     <div class="input_box">
     <div id="custom-search-input">
                            <div class="input-group col-md-12">
							<p style="position: absolute; border: 1px solid rgb(255, 0, 0); background-color: rgb(255, 0, 0); color: rgb(255, 255, 255); padding: 10px; margin-top: -50px; border-radius: 5px; display:none;" id="city_error"><i class="fa fa-caret-down" aria-hidden="true" style="font-size:18px; padding-top:23px; color:#FF0000; position:absolute;"></i><?php echo $this->lang->line('Please find your location');?></p>
                              <input type="text" name="search" id="geocomplete" class="banner_input clearable address" autocomplete="off" value="<?php echo $session_user_id['search_data'];?>" placeholder="e.g. SW6 6LG" required />
							  <span class="input-group-btn load_img" style="display:none;">
                                    <img src="<?php echo base_url();?>public/front/images/small-loader.gif" />
                                </span>
							  
                                <span class="input-group-btn search-data" style="cursor:pointer">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
     <input type="hidden" class="lat" id="lat"/>
	 <input type="hidden" class="long" id="long" />
     </div>
     <center><button type="button" name="submit" class="find_btn find-me" ><?php echo $this->lang->line('FIND ME');?>  <i  ><img src="<?php echo base_url();?>public/front/images/find_icon.png" style="margin:-5px 0px 0px 15px" /></i></button></center>
    <a href="javascript:void(0);" data-target="#myModal_location_map" data-toggle="modal"  class="find-me-trigger"></a>
	<input type="submit" id="registerForm_btn" style="display:none;" />
    </form>
    
    </div>
     </div>
      </div>
     
     
     </div>
   
    
  <div class=" main_wrapper mid_top"> 
  <div class="container">
  <div class="row">
     <div class="col-lg-12 ">
     <div class="col-xs-4 how_it_box">
       <img src="<?php echo base_url();?>public/front/images/how_it_img1.png" style="max-width:100%"/>
       <h1><?php echo $this->lang->line('Enter');?>&nbsp;<?php echo $this->lang->line('your');?>&nbsp;<?php echo $this->lang->line('Postcode');?> </h1>
       </div>
     
     
     <div class="col-xs-4 how_it_box">
       <img src="<?php echo base_url();?>public/front/images/how_it_img2.png"  style="max-width:100%" />
       <h1><?php echo $this->lang->line('Pick');?>&nbsp;<?php echo $this->lang->line('your');?>&nbsp;<?php echo $this->lang->line('Favourite');?> </h1>
       </div>
       <div class="col-xs-4 how_it_box">
       <img src="<?php echo base_url();?>public/front/images/how_it_img3.png" style="max-width:100%" />
       <h1><?php echo $this->lang->line('Get');?>&nbsp;<?php echo $this->lang->line('it');?>&nbsp;<?php echo $this->lang->line('Delivered');?> </h1>
       </div>
       
   </div>
   
   <div  class="social_col mobile">

   
   <a href="#"><div class="s_facebook"><i class="fa fa-facebook" aria-hidden="true" style="color:#FFF; padding:11px 0 0 13px; font-size:21px"></i></div></a>
  <a href="#"><div class="s_instagram"><i class="fa fa-instagram" aria-hidden="true" style="color:#FFF; padding:11px 0 0 12px; font-size:21px"></i></div></a>
   <a href="#"><div class="s_twitter"><i class="fa fa-twitter" aria-hidden="true" style="color:#FFF; padding:11px 0 0 13px; font-size:20px"></i></div></a>
   <a href="#"><div class="s_youtube"><i class="fa fa-youtube" aria-hidden="true" style="color:#FFF; padding:10px 0 0 13px; font-size:20px; font-weight:normal;"></i></div></a>
  </div>
 </div>
    
     </div>
  </div>
   </div>
  </div>
  
  
  
  
  
  
  <div class="clearfix"  style="height:60px;"></div>
  
 <?php $this->load->view('segment/footer');?>
 
 

</body>
</html>

<script>
function tog(v){return v?'addClass':'removeClass';} 
$(document).on('input', '.clearable', function(){
    $(this)[tog(this.value)]('x');
}).on('mousemove', '.x', function( e ){
    $(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');
}).on('touchstart click', '.onX', function( ev ){
    ev.preventDefault();
    $(this).removeClass('x onX').val('').change();
});
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



<div class="modal fade" id="myModal_location_map" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url();?>public/front/images/close.png">
</button>
        <h3 style="margin:0px;"><center>Confirm Your Address</center></h3>
      </div>
            
      <div class="modal-body" style="overflow:hidden;">
     
      
        <div class="form-group form-horizontal">
          <div class="col-md-12 padding">
  
  <div class="col-md-12 padding_main" style="margin-bottom:15px;">
  <input type="text" autocomplete="off" class="form-control2 address" />

</div>
  
  <div id="map-canvas" style="width:100%;height:400px;"></div>
  
</div>
</div>


      

<div class="form-group">
  <div class="col-md-12 padding">
   
  
   <input type="button" class="btn_login alo" data-dismiss="modal" value="Cancel" style="margin:5px 0px 0px 0px; float:left;"/>
   <input type="button" class="btn_login alo" data-dismiss="modal" id="confirm"  value="Confirm" style="margin:5px 0px 0px 0px; float:right;"/>

 </div>
</div>



      </div>
      
      
    </div>
  </div>
</div>
<script>
$(function(){
$('.find-me').on('click',function(){
var geocomplete_value = $('#geocomplete').val();
if(geocomplete_value==''){
$('#city_error').show();
return false;
}else{
$('#city_error').hide();
var geocoder = new google.maps.Geocoder();
var address = geocomplete_value;
geocoder.geocode( { 'address': address}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();
   $('.lat').val(latitude);
   $('.long').val(longitude);
  
var map;
var marker;
var myLatlng = new google.maps.LatLng(latitude,longitude);
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
function initialize(){
var mapOptions = {
zoom: 18,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
};

map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

marker = new google.maps.Marker({
map: map,
position: myLatlng,
draggable: true 
}); 

geocoder.geocode({'latLng': myLatlng }, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (address) {
$('#latitude,#longitude').show();
$('.address').val(address);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.setContent(address);
infowindow.open(map, marker);
}
}
});

google.maps.event.addListener(marker, 'dragend', function() {

geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('.address').val(results[0].formatted_address);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});
});

}
$('#myModal_location_map').on('show.bs.modal', function() {
   //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
   initialize();
   resizeMap();
})

function resizeMap() {
   if(typeof map =="undefined") return;
   setTimeout( function(){resizingMap();} , 400);
}

function resizingMap() {
   if(typeof map =="undefined") return;
   var center = map.getCenter();
   google.maps.event.trigger(map, "resize");
   map.setCenter(center); 
}
   $('.find-me-trigger').trigger('click');
    } 
});
}
});
	});
</script>

<script>
$(function(){
   $('#confirm').on('click',function(){
   var search_data = $('.address').val();
   	$('#geocomplete').val('');
	$(".load_img").show();
	$(".search-data").hide();
   if(search_data!=''){
	  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>search/get_postcode",
            data: { search_data:search_data},
            success: function(msg){
			//alert(msg);
     					if(msg!=''){
				$('#geocomplete').val(msg);
				$(".load_img").hide();
				$(".search-data").show();
				}	
            }
			});
	  
	  }
      
   });
});
</script>



<script>
$(function(){
   $('.search-data').on('click',function(){
   var search_data = $('#geocomplete').val();
  // alert(search_data);
      if(search_data!=''){
	  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>search/session_search_address",
            data: { search_data:search_data},
            success: function(msg){
     					if(msg!=''){
				window.location.href='<?php echo base_url();?>search';	
				}	
            }
			});
	  
	  }
   });
});
</script>

