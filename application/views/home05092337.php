<?php
$session_user_id=$this->session->userdata('session_search_data');


//echo $session_user_id['search_data'];
//die;


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<link rel="icon" href="<?php echo base_url(); ?>public/images/logoportugo.png" type="image/png">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<meta name="description" content="PortuGO.pt | Encontre as melhores entregas de Takeaway em Lisboa!">

<meta name="keywords" content="Portugo Takeaway">


 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="canonical" href="/home" />

<title>PortuGO | TakeAway</title>

<script type="application/ld+json">
{
"@context": "http://schema.org/",
  "@type": "Service",
  "logo": "https://portugo.pt/public/images/logoportugo.png",
  "name": "PortGO TakeAway",
  "url" : "https://portugo.pt", 
  "description":"PortuGo.pt | Encontre as melhores entregas de Takeaway em Lisboa!"
}
</script>


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
<script src="<?php echo base_url();?>public/front/js/jquery.geocomplete.js"></script>

<script src="<?php echo base_url();?>public/front/js/logger.js"></script>



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


 $('.selected .ddlabel').hide();
 $('.selected .fnone').hide();
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

<?php 
  $this->load->view('segment/header');
?> 
   
   <!--<div class="wrap_margin top_border"></div>-->  
     
     
  <div class="main_wrapper banner wrap_margin">
  
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

              
   <input type="text" name="search" id="geocomplete" class="banner_input clearable postal_code" autocomplete="off" value="" placeholder="e.g. Endereço ou código postal 1234-567"  onFocus=""   required />



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
     <center><button type="button" name="submit" class="find_btn find-me" ><?php echo $this->lang->line('FIND ME');?>  <i  ><img src="<?php echo base_url();?>public/front/images/find_icon.png" style="margin:-5px 0px 0px 15px;width: 20px;" /></i></button></center>
    <a href="javascript:void(0);" data-target="#myModal_location_map" data-toggle="modal"  class="find-me-trigger"></a>
	<input type="submit" id="registerForm_btn" style="display:none;" />




<table id="address"   style="visibility:visible"  >

<br></br>

    <tr>
  
    <td colspan="2" ><input  class="banner_input clearable " id="route" disabled="true" placeholder="Endereço"></input></td>

    <td ><input class="banner_input clearable "   id="street_number" disabled="true" placeholder="Numero"> </input></td>
  </tr>
 
  <tr>
    <td colspan="2"><input class="banner_input clearable " id="locality"  disabled="true" placeholder="Cidade"></input></td>

    <td ><input class="banner_input clearable " id="postal_code" disabled="true" placeholder="Postal"></input></td>
 </tr>

  <tr>
     <td ><input class="banner_input clearable " id="administrative_area_level_1" disabled="true" placeholder="Regiao"></input>
        </td> 
     <td ><input class="banner_input clearable " id="country" disabled="true" placeholder="Pais"></input></td>
  </tr>   



  </table>


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
       <h1><?php echo $this->lang->line('Enter your Postcode');?> </h1>
       </div>
     
     
     <div class="col-xs-4 how_it_box">
       <img src="<?php echo base_url();?>public/front/images/how_it_img2.png"  style="max-width:100%" />
       <h1><?php echo $this->lang->line('YourFavourite');?> </h1>
       </div>
       <div class="col-xs-4 how_it_box">
       <img src="<?php echo base_url();?>public/front/images/how_it_img3.png" style="max-width:100%" />
       <h1><?php echo $this->lang->line('YourDelivered');?> </h1>
       </div>
       
   </div>
   
    
  </div>





  
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
  
  <div id="map-canvas" style="width:100%;height:350px;"></div>
  
</div>
</div>


      

<div class="form-group">
  <div class="col-md-12 padding">
   <input type="button" class="btn_login alo cancela" data-dismiss="modal" value="Cancel" style="margin:5px 0px 0px 0px; float:left;"/>
   <input type="button" class="btn_login alo" data-dismiss="modal" id="confirm"  value="Confirm" style="margin:5px 0px 0px 0px; float:right;"/>

 </div>
</div>

      </div>
    </div>
  </div>
</div>

<?php

$ip = $_SERVER['REMOTE_ADDR'];

$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

?>

<input type="hidden" id="new_address" value="<?php echo @$details->city; ?>">

<script>

     var placeSearch, autocomplete;
      var componentForm = {
       street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

//   $(function(){
//    var input = document.getElementById('geocomplete');
//    var options = {
//    types: ['(cities)'],
//    componentRestrictions: {country: 'pt'}//Portugal only
//    };
//    var autocomplete = new google.maps.places.Autocomplete(input,options);
 //     });

  function initAutocomplete() {

    // var input = document.getElementById('geocomplete');
    // var options = {
    // types: ['(cities)'],
    // componentRestrictions: {country: 'pt'}//Portugal only
     //};
        // Create the autocomplete object, restricting the search to geographical
        // location types.


        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('geocomplete')),
            {types: ['geocode'],componentRestrictions: {country: 'pt'} });

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }



   function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.

        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
 //                    if (addressType == ("street_number"))
   //                   {  
//          document.getElementById("street_number").value = "1";

     //                   alert(document.getElementById(addressType).value);                 
                      //}


///////////////////////////////////////////////////////cria lista com restaurantesjson

   /*         if (addressType == "postal_code")
                      {
    //carrega restaurantes e usuario para visualiar restaurantes do entorno
$(function(){
 
  var search_data = val;
     //alert(search_data);
 //alert(search_data);

         $.ajax({
            type: "POST",
            url: "<?php //echo base_url();?>search/get_postcode_google",
            data: { search_data:search_data},
            success: function(msg=true){
      //alert(msg.replace(/(\r\n|\n|\r)/gm,""));
              if(msg!=''){

              json_read = msg.replace(/(\r\n|\n|\r)/gm,"");

            //  alert(json_read);

                         }   //end if msg 
                                       }
          });
             
 
   });//end function ler json         
////////////////////////////////////////////////////////////////////////
                      }*/


               }

               if  (document.getElementById("street_number").value = "1")
                {               

                  alert("Please fill any existent  street number!!");
                  }





          }

      }



</script>


 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkQtOxZKHfcvJtdoYD_X1PflGNbOba_sQ&amp;libraries=places&drawing&callback=initAutocomplete" async defer></script>


<script>


var la; //coord global


var lo;


var json_read="" ; //define variavel para testar se json de restaurantes foi carregado


//faz a pesquisa do cep no mapa



$(function(){

$('.find-me').on('click',function(){


var geocomplete_value = $('#geocomplete').val();

//alterado para teste em lisboa
//var new_address = $('#new_address').val();
//alert(new_address);

var new_address='av da liberdade 1,lisboa';

if(geocomplete_value!=''){var user_address=geocomplete_value;}else{var user_address=new_address;}


var geocoder = new google.maps.Geocoder();

var address = new_address;

geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();


///teste de aplicativo para  usar coordenada em lisboa
//raio de 5 km origem praca marques de pombal


   $('.lat').val(latitude);
   $('.long').val(longitude);


var map;
var marker;
var myLatlng = new google.maps.LatLng(latitude,longitude);



var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();




function initialize(){


var mapOptions = {
zoom: 15,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
};


map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

//alert(myLatlng);

marker = new google.maps.Marker({
map: map,
position: myLatlng,
draggable: true 
}); 



geocoder.geocode({'latLng': myLatlng }, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (address) {
$('#latitude,#longitude').show();
$('.postal_code').val(address); 
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
$('.postal_code').val(results[0].formatted_address);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});
});




//testa browser para localizacao
//localiza usando  precisao  qdo disponivel no   computador ou mobile


if(navigator.geolocation) {

//desabilitado para simular teste em lisboa senao carrega local do desenvolviemento
//no futuro pode escolher pela cidade

        navigator.geolocation.getCurrentPosition(function(position){ // callback de sucesso
 //       // ajusta a posição do marker para a localização do usuário
 //       marker.setPosition(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
 //       myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

        var mapOptions = {
        zoom: 15,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

        marker = new google.maps.Marker({
        map: map,
        position: myLatlng,
        draggable: true 
        });  

        la=position.coords.latitude; 
        lo=position.coords.longitude; 



//teste para simular lisboa
la=38.725036;
lo=-9.149981;


///teste de aplicativo para  usar coordenada em lisboa
//raio de 5 km origem praca marques de pombal



   $('.lat').val(la);
   $('.long').val(lo);

//calcula endereco pela coord

geocoder.geocode({'latLng': myLatlng }, function(results, status) {
                for (var i = 0; i < results[0].address_components.length; i++) {

                 var address_find = results[0].address_components[i];

//alert(address_find.types[0]);
//alert(address_find.long_name);

                  if (address_find.types[0] == "route") {
                  var route = address_find.long_name;
                  document.getElementById("route").value = route;
                  }


                  if (address_find.types[0] == "street_number") {
                  var number = address_find.long_name;
                  document.getElementById("street_number").value = number;
                  }

                  if (address_find.types[0] == "postal_code") {
                  var code = address_find.long_name;
                  document.getElementById("postal_code").value = code;
                  }


                  if (address_find.types[0] =="locality") {
                  var cidade = address_find.long_name;
                  document.getElementById("locality").value = cidade;
                  }

                  if (address_find.types[0] == "administrative_area_level_2") {
                  var estado = address_find.long_name;
                  document.getElementById("administrative_area_level_1").value = estado;
                  }


                  if (address_find.types[0] == "country") {
                   var pais = address_find.long_name;
                   document.getElementById("country").value = pais;
                   }


             }

//document.getElementById("address").value =  ;

//calcula endereco pela  coordenada no caso de usar o mapa e precisao de app


var endereco = route + ' ' + number + ',' + cidade + ',' + pais;


//alert(document.getElementById("address").value);

//executa o gget_postcode para mostrar restaurantes da regiao

//////vai para tela com localizacao do usuario
//mostra restaurantes em determinado raio
show_restaurant();



if (status == google.maps.GeocoderStatus.OK) {
if (address) {
$('#latitude,#longitude').show();
$('.address').val(endereco);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());

infowindow.setContent(address);
infowindow.open(map, marker);



}
}
});







    }, 
    function(error){ // callback de erro
    console.log('Erro ao obter localização.', error);
    });
} else {
    console.log('Navegador não suporta Geolocalização!');
} //fim do teste browser


}




$('#myModal_location_map').on('show.bs.modal', function() {
  
   //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
   initialize();

   resizeMap();
  // selecionapt();

})


//seleciona pt na tela do find
function selecionapt()
{

//seleciona pto
google.maps.event.addListener(map, 'click', function(event) {
  la = parseFloat(event.latLng.lat());
  lo = parseFloat(event.latLng.lng());
//   alert("Lat=" + la + "; Lng=" + lo);

var myLatlng = new google.maps.LatLng(la,lo);

var mapOptions = {
zoom: 18,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
};

map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
selecionapt();
});

 //acha o endereco da coordenada selecionada
  var geocoder = new google.maps.Geocoder;
  var infowindow = new google.maps.InfoWindow;
  geocodeLatLng(geocoder, map, infowindow);

}


//reversecode convert coord em endereco
function geocodeLatLng(geocoder, map, infowindow) {
  //var input = document.getElementById('latlng').value;
  //var latlngStr = input.split(',', 2);
  // var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
  var latlng = {lat: la , lng: lo };
  geocoder.geocode({'location': latlng}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        map.setZoom(15);
        var marker = new google.maps.Marker({
          position: latlng,
          map: map
        });
        infowindow.setContent(results[1].formatted_address);
        infowindow.open(map, marker);
      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });
}


//////funcao search places

function show_restaurant() {



///cria marker usuario no map e define mapa
  var  usuario = {lat: la, lng: lo};

  map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: usuario,
    zoom: 14
  });



var raio = 1000;
var icon_user = {
    url: "public/images/favicon1.png", // url
    scaledSize: new google.maps.Size(30, 30), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0) // anchor
};


var marker = new google.maps.Marker({
    position: usuario,
    map: map,
    position: usuario,
    icon: icon_user
});


  var Circle = new google.maps.Circle({
      strokeColor: '#FF0000',
     strokeOpacity: 0.2,
      strokeWeight: 2,
     fillColor: '#FF0000',
     fillOpacity: 0.2,
     map: map,
     center: map.center,
     radius: parseFloat(raio)
    });

//estudo carrega cep
//var addresses = ['','1200263','1170048','1150006','1250096','1150241','1150006','1700261','1150134'];
 // for (var x = 0; x < addresses.length; x++) {
  //      $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
    //        var p = data.results[0].geometry.location
      //      var latlng = new google.maps.LatLng(p.lat, p.lng);
        //    create_restaurant(latlng);

     //   });
   // }



//carrega restaurantes e usuario para visualiar restaurantes do entorno
$(function(){


var search_data =$('.address').val(); 
  //alert(search_data);
  //alert(search_data);

  if(search_data!=''){

  if  (!json_read)
    {
 // alert ("sem json");
  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>search/get_postcode_google",
            data: { search_data:search_data},
            success: function(msg=true){
       //alert(msg.replace(/(\r\n|\n|\r)/gm,""));
              if(msg!=''){

              json_read = msg.replace(/(\r\n|\n|\r)/gm,"");

             // alert(json_read);

/////////////////////////////////////////SIMULACAO

var  search_data= "1250-096";

json_read='{"user":"1250-096","lat":"38.7243582","long":"-9.1500614","restaurant":[{"id":"6","name":"Gurkha","code":"1200263","logo":"logo1.png","lat":"38.7091564","long":"-9.1521929"},{"id":"8","name":"Ola Nepal","code":"1150006","logo":"Logo_Olanepal.png","lat":"38.724037","long":"-9.1470985"},{"id":"9","name":"LeadsPizza","code":"1170048","logo":"LEads_pizza_logo.png","lat":"38.7208899","long":"-9.1244112"},{"id":"10","name":"Leads Pizza","code":"1150134","logo":"LEads_pizza_logo1.png","lat":"38.7284684","long":"-9.1404257"},{"id":"17","name":"Curry House","code":"1200257","logo":"LEads_pizza_logodd.png","lat":"38.7162761","long":"-9.1523708"},{"id":"19","name":"SushiSumeshi","code":"1250096","logo":"sushi_280.png","lat":"38.7180487","long":"-9.1622053"},{"id":"20","name":"MunalRestaurant","code":"1150241","logo":"logo_2801.png","lat":"38.7202599","long":"-9.1373038"},{"id":"22","name":"Casa AlParma","code":"1700261","logo":"Logo.png","lat":"38.7549513","long":"-9.1409314"},{"id":"23","name":"RestauranteTeste","code":"1885057","logo":"","lat":"38.7778027","long":"-9.1027855"},{"id":"0","name":"0","code":"0","logo":"0","lat":"0","long":"0" }]}';


////////////////////////////////////////////////////////////////////////////



user_restaurant = JSON.parse(json_read);

//alert(user_restaurant.user);

for (var i = 1; i < user_restaurant.restaurant.length - 1; i++) {

     var counter = user_restaurant.restaurant[i];
    // alert(counter.logo);

     var logo = "logo_google.png";  //counter.logo;
     var name =   counter.name;
    //format lat long do usuario para usar na pesquisa e criar restaurantes na tela

     var latlng = new google.maps.LatLng( counter.lat,counter.long );

//var latitude1 = la;
//var longitude1 = lo;
//var latitude2 = counter.lat;
//var longitude2 = -counter.long;
//alert(latitude + "," + longitude + "," +  latitude2 + "," + longitude2);

//var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(latitude1, longitude1), new google.maps.LatLng(latitude2, longitude2));  

 create_restaurant(latlng,logo,name);

//$.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+counter.code+'&sensor=false', null, function (data) {
 //          var p = data.results[0].geometry.location
 //           var latlng = new google.maps.LatLng(p.lat, p.lng);
 //          create_restaurant(latlng,logo,name);
//        }
                               }//end for





                         }   //end if msg 
                                  }
         });
    
                     }

       }              
 
         });  //end function ler json



////////////////////////////////////////


 // for (var i = 0; i < user_restaurant.restaurant.length - 1; i++) {
   //     var food_loc = user_restaurant.restaurant[i];
    //    alert(food_loc.code);
       //$.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+food_loc.code+'&sensor=false', null, function (data) {
           ///var p = data.results[0].geometry.location
          //  var latlng = new google.maps.LatLng(p.lat, p.lng);

         //   create_restaurant(latlng);

       // });
  //  }




//mostra usando places
 //infowindow = new google.maps.InfoWindow();

 // var service = new google.maps.places.PlacesService(map);
 // service.nearbySearch({
 //   location: usuario,
 //   radius: parseFloat(raio),
 //   types: ['stores']
 // }, callback);
/////////////



////////////////////////////////////////////////////////

//le dados do local do usuario e dos restaurantes para usar no google . nesse caso ja tem json no ambiente

//alert(msg.replace(/(\r\n|\n|\r)/gm,""));
if  (json_read)
    {
//alert ("com json");

//user_restaurant = JSON.parse(json_read);

//alert(user_restaurant.user);



for (var i = 1; i < user_restaurant.restaurant.length - 1; i++) {
     var counter = user_restaurant.restaurant[i];
   // alert(counter.name);


     var logo = "logo_google.png";  //counter.logo;
     var name =  counter.name;
    //format lat long do usuario para usar na pesquisa e criar restaurantes na tela


//alert( user_restaurant.restaurant.length);

var latlng = new google.maps.LatLng( counter.lat,counter.long );

//var latitude1 = la;
//var longitude1 = lo;
//var latitude2 = counter.lat;
//var longitude2 = -counter.long;

//var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(latitude1, longitude1), new google.maps.LatLng(latitude2, longitude2));  


//alert(distance);

create_restaurant(latlng,logo,name);

//$.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+counter.code+'&sensor=false', null, function (data) {
 //          var p = data.results[0].geometry.location
 //           var latlng = new google.maps.LatLng(p.lat, p.lng);
 //          create_restaurant(latlng,logo,name);
//        }
                               }//end for

   }//end if json_read

//////////////////////////////////////////////////////////




} //end function show restaurant





function create_restaurant(latlng,logo,name) {


var icon = {
    url: "image_gallery/restaurant_logo/thumb/google/" + logo , // url
    scaledSize: new google.maps.Size(30, 30), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0) // anchor
};

//var marker = new google.maps.Marker({
 //   map: map,
  //  position:latlng,
   // icon: icon
//});

//insere dados nos objetos com nome e foto

        var infowindow = new google.maps.InfoWindow();

        var service = new google.maps.places.PlacesService(map);

        service.getDetails({
          placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4'

        }, function(place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
           
            var marker = new google.maps.Marker({
              map: map,
              position: latlng,
              icon:icon
            });

            google.maps.event.addListener(marker, 'click', function() {
              infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                'Restaurante ' + name + '<br>' +
                'Cozinha  Horario' + '</div>');
              infowindow.open(map, this);
            });
          }
        });



}



function callback(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
  


  
}

function createMarker(place) {

//  var placesList = document.getElementById('lista');

var placeLoc = place.geometry.location;

var icon = {
    url: "public/images/logoportugo.png", // url
    scaledSize: new google.maps.Size(30, 30), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0) // anchor
};

var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location,
    icon: icon
});


  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
  

  
}
/////////


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

});
	});

//////fim do findme
</script>



<script>




$('.cancela').click(function() {
   location.reload();
  });



//calcula cep do endereco encontrado na tela find me e envia para o input no  home view


$(function(){
   $('#confirm').on('click',function(){

   var search_data =$('.address').val(); 


//alert(search_data);

  $('#geocomplete').val('');

	$(".load_img").show();

	$(".search-data").hide();


  if(search_data!=''){
	  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>search/get_postcode",
            data: {search_data:search_data},
            success: function(msg){

			//alert(msg.replace(/(\r\n|\n|\r)/gm,""));
     					if(msg!=''){

 //var  s = msg.replace(/\s/g, '');
//alert(find_restaurant);
//var s = '{"first_name" : "Sammy", "last_name" : "Shark", "location" : "Ocean"}';
//var obj = JSON.parse(msg);
//alert(obj.first_name);


//le dados do local do usuario e dos restaurantes para usar no google
//user_restaurant = JSON.parse(msg);
//alert(user_restaurant.user);


//alert(user_restaurant.user);
//for (var i = 0; i < jsonData.restaurant.length; i++) {
//    var counter = jsonData.restaurant[i];
//    alert(counter.id);
//}




				$('#geocomplete').val(msg);
				$(".load_img").hide();
				$(".search-data").show();


//vai para tela de restauranates

//usa o arquivo json para calculos dos restaurantes vizinhos
//agora o calculo acontece no controller search

        $('.search-data').trigger('click');


				}	
            }
			});
	  
	  }
      
   });
});
</script>



<script>

//search ferramenta de localizacao geocomplete
// depois de achar o cep armazena no ambiente session  para usar como pesquisa de restaurante
//chama o controller search para busca de restauranete no get_reataurant no index 


//aqui envia a lista json criada para calculo no controller search 

//primeiro encontra a lista de restaurantes no controll searche, armazena em session e depois executa a view search para mostrar os restaurantes


$(function(){


$('.search-data').on('click',function(){
   //var search_data = $('#geocomplete').val();


var search_data = document.getElementById('postal_code').value;

//alert(search_data);

var search_rest=json_read;



     //alert(search_rest);

      if(search_data != ''){

//alert();
	  $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>search/session_search_address",
            data: { search_data:search_data,search_rest:search_rest},
            success: function(msg){
     					if(msg!=''){
        // alert(msg);
				window.location.href='<?php echo base_url();?>search';	
				}	
            }
			});
	  
	  }
	  else
	  {
	  $("#city_error").show();
	  }
   });
});


</script>




<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkQtOxZKHfcvJtdoYD_X1PflGNbOba_sQ&amp;libraries=places&drawing&callback"></script> 


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkQtOxZKHfcvJtdoYD_X1PflGNbOba_sQ&amp;libraries=places&drawing&callback"></script>
-->

