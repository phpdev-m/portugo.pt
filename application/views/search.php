<?php
error_reporting(0);



//echo '<pre>';
//print_r($restaurant_search); die;


require_once(APPPATH.'libraries/config.php');

$session_user_id=$this->session->userdata('session_search_data');

/*
print_r($session_user_id['search_data']); 
echo "<pre>";
print_r($session_user_id['search_rest']); 
echo "<pre>";
print_r($session_user_id['search_dist']); 
echo "<pre>";
print_r($session_user_id['search_lim']); 

die;
*/
//echo '<script type="text/javascript"> alert("'. "valor total da ordem antes stripe server: " . $final_amount. '")</script>';

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
     <link href="<?php echo base_url();?>public/front/css/jquery-ui.css" rel="stylesheet">
<!--<script type="text/javascript" src="<?php //echo base_url();?>public/front/js/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/bootstrap.min.js"></script>
<!--<script src="js/scrolltopcontrol.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/front/css/dd.css" />
<script type="text/javascript" src="<?php echo base_url();?>public/front/js/jquery.dd.js"></script>





<!--google api>-->
<script src="<?php echo base_url();?>public/front/js/jquery.geocomplete.js"></script>
<script src="<?php echo base_url();?>public/front/js/logger.js"></script>


 
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


$(document).ready(function(){

$(".sort").on('change',function(){

//mostra icone aguardando o processo

$(".right_pan").html('<img src="<?php  echo base_url('public/front/images/ajax-loader.gif'); ?>" style="margin-left:340px; margin-top:100px;">');

//quando seleciona filtro executa ajax 

//alert("<?php echo $session_user_id['search_dist'][1]; ?>");

var sort_by=$(".sort_by").val();
var cuisine_id=$("#cuisine_id").val();
var rating=$("#rating").val();


//executa teste de disatncia na pagina

var search_data = "<?php echo$session_user_id['search_data'];?>";

var search_rest = "<?php echo$session_user_id['search_rest'];?>";



if (sort_by == "todos")
{
var search_lim = "10.0";
}

if (sort_by == "locala")
{
var search_lim = "0.9";
}


if (sort_by == "localb")
{
var search_lim = "1.9";
}


if (sort_by == "localc")
{
var search_lim = "4.9";
}




$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('search/session_search_address'); ?>', 
     data: { search_data:search_data,search_rest:search_rest,search_lim:search_lim},
    success: function (data) {
     //alert(data);
       window.location.href='<?php echo base_url();?>search';
  $(".right_pan").html(data);
              }
   });




/*
$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('search/load_restaurant'); ?>', 
    data: {cuisine_id:cuisine_id,rating:rating,sort_by:sort_by}, 
      data: {cuisine_id:cuisine_id,rating:rating,sort_by:sort_by}, 
    success: function (data) {
     //alert(data);
  $(".right_pan").html(data);
              }
         });

*/




});
});



</script>




<script>

$(document).ready(function(){


$(".sort1").on('change',function(){


$(".right_pan").html('<img src="<?php  echo base_url('public/front/images/ajax-loader.gif'); ?>" style="margin-left:340px; margin-top:100px;">');


var sort_by=$(".sort_by1").val();


var cuisine_id=$("#cuisine_id").val();


var rating=$("#rating").val();


//alert(sort_by);


$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('search/load_restaurant'); ?>', 
    data: {cuisine_id:cuisine_id,rating:rating,sort_by:sort_by}, 
    success: function (data) {
     //alert(data);
  $(".right_pan").html(data);
  $(document).trigger('click');
  }
  }); //ajax


}); //function

}); //document



</script>




<script>
$(function(){
  $(document).on('click',function(){
    $('.navbar-collapse').removeClass('in');
  });
  $(window).scroll(function() {
  // $('.navbar-collapse').removeClass('in');
});
$('.dropdown').on('click',function(){
$('.san').hide();
});
$('.navbar-toggle').on('click',function(){
$('.san').show();
});
});
</script>


    <script>
	$(function() {
		$( "#slider-range2" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 0, 99 ],
			slide: function( event, ui ) {
				$( "#amount2" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			}
		});
		$( "#amount2" ).val(  $( "#slider-range2" ).slider( "values", 0 ) +
			" - " + $( "#slider-range2" ).slider( "values", 1 ) );
	});
	</script> 
    
    
    
    <script>
	$(function() {
		$( "#slider-range3" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 0, 300 ],
			slide: function( event, ui ) {
				$( "#amount3" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			}
		});
		$( "#amount3" ).val(  $( "#slider-range3" ).slider( "values", 0 ) +
			" - " + $( "#slider-range3" ).slider( "values", 1 ) );
	});
	</script>  


<title>PortuGo</title>
</head>
<body>
  
 <?php $this->load->view('segment/header'); ?>      
 
     
  <div class=" inner_wrapper wrap_margin" >
   <div class="inmer_main">
      <div class="container">
      <div class="col-md-12">
       <a href="<?php echo base_url('home'); ?>"><?php echo $this->lang->line('Home')?></a>&nbsp;  / &nbsp; <?php echo $this->lang->line('Search')?>
      </div>
      </div>
   </div>
  <div class="container">
    <div class="row1">

	 <?php 

	  if(!empty($restaurant_search))

    {?>
	  

<!-- ////Inicio do filtro  aqui nao tem efeito -->

	  <div class="col-sm-3 padding_768 mobile">
      <div class="col-xs-6">
  <div class="dropdown filter_head" id="myDropdown">
     <h1 style=" cursor:pointer; border-bottom:#036 1px solid; padding-bottom:5px;" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->lang->line('Filter')?><span class="caret pull-right" style="margin-top:10px;"></span></h1>
    <ul class="dropdown-menu" style="width:300px; position:absolute; z-index:9999">
      <div style="background:#fafafa; border-radius:5px;">
     
 <div class="category">

<ul>
<li>
&nbsp;

</li>


<li>
<form id="registerForm"   class="form-horizontal" >



<select class="form-control sort1 sort_by1" style="height:40px; margin:20px 0px" id="sort">
<option value="">-- <?php echo $this->lang->line('Select option');?> --</option>
<option value="popular"><?php echo $this->lang->line('Popularity');?></option>
<option value="todos"> <?php echo "Todos";?></option>
<option value="locala"><?php echo "Distancia 1Km";?></option>
<option value="localb"><?php echo "Distancia 2Km";?></option>
<option value="localc"><?php echo "Distancia 5Km";?></option>
</select>

</form>
</li>


            
  <li><a href="javascript:void(0);"><?php echo $this->lang->line('Rating')?>  <span> 
<h4 style="color:#ffbf00; margin-top:0px;">
<i class="fa fa-star-o rat r-1" cus="1"></i>
<i class="fa fa-star-o rat r-2" cus="2"></i>
<i class="fa fa-star-o rat r-3" cus="3"></i>
<i class="fa fa-star-o rat r-4" cus="4"></i>
<i class="fa fa-star-o rat r-5" cus="5"></i>
</h4></span> </a>
</li>  


 
</ul>
</div>


     </div> 
    </ul>
  </div>
     </div>
  
      <div class="col-xs-6">
     <div class="filter_head dropdown" style="margin-top:20px;" id="myDropdown">
    <h1 class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer; border-bottom:#036 1px solid; padding-bottom:5px;"><?php echo $this->lang->line('Cuisine')?><span class="caret pull-right" style="margin-top:10px;"></span></h1>
    
    
     <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="width:300px;left: auto;right: 0; position:absolute; z-index:9999">


     <div style=" background:#fafafa; border-radius:5px;  "   >

     <div class="c_nav">

     <ul>





<?php


//////////////////////////////////////////
//for cria cousine

//aonde o status do db cozinha esta ok  selec o restaurante pelo POSTCODE e marca ono checkbox tipo de cozinha , DEVE ESTUDAR
//saquifaz o echo das infos apenas


//monta menu com cozinhas checkbox 

$all_cusin = $this->restaurant_model->cusin_all();

foreach($all_cusin as $key=>$cuision)
{
$res_num=$this->search_model->get_number_restaurentbycuisine($cuision['id'],$session_user_id['search_data']);
?>


<li><a href="javascript:void(0);"  class="cuisine" id="cuisine<?php echo $cuision['id']; ?>"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp; <?php echo ucfirst($cuision['cuisine_name']);?> <span style="float:right"><?php echo $res_num; ?></span></a></li>

  <?php 
  } ?> 


</ul>
</div>
     </div>
     </ul>
     </div>
	 </div>
     </div>
	  


 <!-- Div do  layout de restaurantes.-->
<div class="col-md-3 padding_768 pc"   >


<!--comeco div filtro posicao anterior-->
<div class="col-md-12 " style="position:relative; padding-bottom:40px;">


<!--DIV para manter o projeto mapa no scroll-->
<div class="fiz">

<!-- posicao  do titulo  filtro .-->

<div class="filter_head">
<h1 style="cursor:pointer ;width:270px;height:0px;"><?php echo 'Disponivel para entrega:'?> </h1>
<!--<h1 style="cursor:pointer ;margin:20px 0px; , "><?php echo $this->lang->line('Filter')?> </h1>-->
</div>


<!-- ////div do  filtro  na posicao anterior e categorias de cozinha  aqui muda e monta o fitro de distancia popularidade  rating e cozinhas etcc .-->

<div style="width:270px;height:80px; background:#fafafa ; margin:20px 0px; border-radius:8px;">     
<div class="category">



<ul>

<li>
&nbsp;
</li>

<!-- posicao do select filtro .-->


 <?php  


if($session_user_id['search_lim'] == '10.0')
{ 
$dist_rest='Todos';       
} 

if($session_user_id['search_lim'] == '0.9')
{ 
$dist_rest='Distancia 1Km';       
} 

if($session_user_id['search_lim'] == '1.9')
{ 
$dist_rest='Distancia 2Km';       
} 


if($session_user_id['search_lim'] == '4.9')
{ 
$dist_rest='Distancia 5Km';       
} 


?>

<li>
<select class="form-control sort sort_by" style="height:35px; margin:5px 0px" id="sort">
<option  value="">-- <?php  echo  $dist_rest; // echo $this->lang->line('Select option');?> --</option>
<!--<option value="popular"><?php echo $this->lang->line('Popularity');?></option>
<option value="min_order"> <?php echo $this->lang->line('Minimum order value');?></option>-->
<option value="todos"> <?php echo "--Todos--";?></option>
<option value="locala"><?php echo "--Distancia 1Km--";?></option>
<option value="localb"><?php echo "--Distancia 2Km--";?></option>
<option value="localc"><?php echo "--Distancia 5Km--";?></option>
</select>
</li>


           
<!-- rating hidden 
<li><a href="javascript:void(0);"><?php echo $this->lang->line('Rating')?>  <span> 
-->

<h4 style=" visibility: hidden; color:#ffbf00; margin-top:0px;">
<i class="fa fa-star-o rat r-1" cus="1"></i>
<i class="fa fa-star-o rat r-2" cus="2"></i>
<i class="fa fa-star-o rat r-3" cus="3"></i>
<i class="fa fa-star-o rat r-4" cus="4"></i>
<i class="fa fa-star-o rat r-5" cus="5"></i>
</h4></span> </a></li>  
 
</ul>

</div>
</div>


<!--constroi mapa-->

 <div id="map-canvas" style="width:270px;height:300px;"></div>

<!--constroi mapa-->



</div>
    

<!--div Sscroll mapa-->
</div>


<!--fim div filtro-->










<!-- div da cozinha com checkbox hidden-->
<div>
<div class="filter_head" style=" visibility: hidden; margin-top:30px;">
<h1><?php echo $this->lang->line('Cuisine')?> </h1>
</div>



<!-- div da cozinha com checkbox hidden-->

<div style=" visibility: hidden; background:#fafafa; border-radius:5px;">
     
<div class="c_nav">


<ul>


<?php


////////////////
////for cria cozinha


//aonde o status do db cozinha esta ok  selec o restaurante pelo POSTCODE e marca ono checkbox tipo de cozinha , DEVE ESTUDAR
//AQUI ALTERA AS INFOS

//monta menu com cozinhas

$all_cusin = $this->restaurant_model->cusin_all();
foreach($all_cusin as $key=>$cuision){

$res_num=$this->search_model->get_number_restaurentbycuisine($cuision['id'],$session_user_id['search_data']);
?>


<li><a href="javascript:void(0);"  class="cuisine" id="cuisine<?php echo $cuision['id']; ?>"> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>&nbsp; <?php echo ucfirst($cuision['cuisine_name']);?> <span style="float:right"><?php echo $res_num; ?></span></a></li>
  <?php 
  } ?> 




</ul>
</div>
     </div>
     </div>
     </div>
	 <?php } ?>
     
     <div class="col-md-<?php 

     if(!empty($restaurant_search))
      { 
         echo '9';
      }
     else
      {

        echo '12';
      }

      ?>  

      ">



	 <center><p style="margin-top:100px; display:none;" id="loader"><img src="<?php echo base_url();?>public/front/images/loader.gif" /></p></center>
	 
	 	 


    <div class="right_pan mobile">



    <?php
////comeca a construir restaurantes

	  if(!empty($restaurant_search)){

	  foreach($restaurant_search as $key=>$all_restaurant)
    {

 ////echo '<script type="text/javascript"> alert("partee 1")</script>';
      
	  $date=date("l");
	  $today = $this->restaurant_model->time_table($all_restaurant['id'],$date);
	  //print_r($today); die;
	   $review=$this->search_model->get_restaurant_review($all_restaurant['id']);
	  ?>
	  


  <div class="cuisine_col">

  <div class="col-sm-12">  <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><h1><?php echo $all_restaurant['restaurant_name'];?></h1></a></div>

  <div class="col-sm-12">

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="100%" valign="top">
  
 <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>">

<div class="resbg" style="background:rgba(0, 0, 0, 0) url('<?php echo base_url();?>image_gallery/cover_photo/<?php echo $all_restaurant['cover_photo'];?>') no-repeat scroll center top / cover ;">


 <img src="<?php echo base_url();?>public/front/images/res_bg_mobile.png"   height="80" width="100"  />


  <?php
  if($all_restaurant['restaurant_logo']!='' && file_exists('image_gallery/restaurant_logo/'.$all_restaurant['restaurant_logo']))
  {
  ?>
  <img src="<?php echo base_url();?>image_gallery/restaurant_logo/<?php echo $all_restaurant['restaurant_logo']; ?>"  style="position:absolute; top:0; left:0px; margin:24px 0 0 24px; height:50px;"/>
  <?php 
  } 
 else 
  {
    ?>
  <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  style="position:absolute; top:0; left:0px; margin:24px 0 0 24px; height:50px;"/>
  <?php 
  } 
  ?>

 </div></a>

<font style="color:#ffbf00;">


<?php
$rat_val = $all_restaurant['avg_rating'];
for($i=1;$i<=5;$i++){?>
<?php
if($rat_val>=$i){?>
<i class="fa fa-star"></i>
<?php }else{ ?>

<i class="fa fa-star-o"></i>
<?php } }

?>



<span style="color:#333">(<?php echo count($review); ?>)</span>
</font>
<h4><?php echo $this->lang->line('Rating');?>: <span><?php echo $all_restaurant['avg_rating'];?></span> <br /><?php echo $this->lang->line('Minimum Order');?>: <span><?php echo $dollar; ?><?php echo $all_restaurant['min_order'];?> </span><br /> <?php echo $this->lang->line('Delivery Charges');?>:  <span><?php echo $dollar; ?><?php echo $all_restaurant['delivery_charges'];?></span> <br /><?php echo $this->lang->line('Delivery');?>:  <span><?php echo $all_restaurant['delivery_time_min'];?> <?php echo $this->lang->line('mints');?> </span></h4>
          <h2><?php echo substr(stripslashes(strip_tags($all_restaurant['restaurant_description'])),0,70); if(strlen($all_restaurant['restaurant_description'])>70){echo ".....";}?>  <br />



 <?php

	   if(@$today['status']=='Open')
	   {?>
	   <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><button class="btn_order" style="margin:18px 0px 0px 0px;" type="submit"><?php echo $this->lang->line('Place order');?></button></a>
	   <?php } else{?>
	   <a href="javascript:void(0);" data-target="#myModal" data-toggle="modal"><button class="btn_order" style="margin:18px 0px 0px 0px;" type="submit"><?php echo $this->lang->line('Place order');?></button></a>
	   <?php } ?>



</h2>
    </td>
  </tr>
</table>
       </div>
       </div>
        <?php } }else{?>
	  <div class="cuisine_col">
       <div class="col-sm-12">
        <center><h1><?php echo $this->lang->line('Sorry,We don t find restaurant this location');?> <?php echo $session_user_id['search_data'];?></h1></center>
		<br />
		<center><a href="<?php echo base_url();?>"><input type="button" class="btn_login alo"  value="Change location" style="margin:5px 0px 0px 0px; width:200px;"/></a></center>
       </div>
             
       </div>






	  <?php

/////////////////////////////fim do if para filtro e finaliza montagem do menu cozinha

    }?>
       

    </div>
	 	 
	 <div class="right_pan pc" style="min-height:350px;">




        
	 <?php 



     //constroi restaurante
if(!empty($restaurant_search)){

    //echo '<script type="text/javascript"> alert("inicio if ")</script>';

//print_r($session_user_id['search_data']); ;
//echo "<pre>";
 //print_r($session_user_id['search_rest']); die;

 //lista com restaurantes disponiveis

 $list_rest=$session_user_id['search_dist'];


//echo '<script type="text/javascript"> alert(' . $list_rest[0] .')</script>';


foreach($restaurant_search as $key=>$all_restaurant){

//testa se tem o id do restaurante no array



  
  if (in_array($all_restaurant['id'],$list_rest))
  {

   // echo '<script type="text/javascript"> alert("inicio for  aceito pelo teste code")</script>';

	   $date=date("l");
	   $today = $this->restaurant_model->time_table($all_restaurant['id'],$date);
	   //print_r($today); die;
	   $review=$this->search_model->get_restaurant_review($all_restaurant['id']);
	   
	   
		  //print_r($today); die;
		   $opening = explode(' ', $today['opening_time']);
		   $open = $opening[0];

$open = str_replace( ' ', '', $open );  

		   $open1 = $opening[1];

$open1 = str_replace( ' ', '', $open1);         
		   $clossing = explode(' ', $today['closing_time']);

		   $close = $clossing[0];
$close = str_replace( ' ', '', $close );         
		   $close1 = $clossing[1];
$close1 = str_replace( ' ', '', $close1 ); 

//echo '<script type="text/javascript"> alert("'.  $all_restaurant['id']. '")</script>'; 

$nome_rest=  str_replace(' ','',$all_restaurant['restaurant_name']);

//echo '<script type="text/javascript"> alert("'.  $nome_rest. '")</script>'; 

	     ?>
	 

      <div   class="col-md-4 padding_more  <?php echo $nome_rest;?>">
      <div class="restaurant_col">
       <div class="col-sm-12 padding_main">
        <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"> <div class="resbg" style="background:rgba(0, 0, 0, 0) url('<?php echo base_url();?>image_gallery/cover_photo/<?php echo $all_restaurant['cover_photo'];?>') no-repeat scroll center top / cover ;">
          <img src="<?php echo base_url();?>public/front/images/res_bg.png"  />
          <div style="position:absolute; top:0; left: 0px; margin:15px 0 0 6px">
          <div class="frame">
          <?php
		  if($all_restaurant['restaurant_logo']!='' && file_exists('image_gallery/restaurant_logo/'.$all_restaurant['restaurant_logo']))
		  {?>
		  <img src="<?php echo base_url();?>image_gallery/restaurant_logo/<?php echo $all_restaurant['restaurant_logo']; ?>" class="main_img" />
		  <?php } else {?>
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"/ class="main_img">
		  <?php } ?>
          </div>
          </div>
          
          </div>
		  </a>
       </div>
       <div class="col-sm-12 padding_main">

        <h1>
       <a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><?php echo substr($all_restaurant['restaurant_name'],0,12);?> 
       </a>        
      </h1>

       <font style="color:#ffbf00;">
   <?php
$rat_val = $all_restaurant['avg_rating'];


for($i=1;$i<=5;$i++){?>
<?php
if($rat_val>=$i){?>
<i class="fa fa-star"></i>
<?php }else{ ?>

<i class="fa fa-star-o"></i>

<?php } }?>


<span style="color:#333">(<?php echo count($review); ?>)</span>
</font>
    
       <table width="100%" border="0" cellspacing="0" cellpadding="0" class="cuisine_col_inner">
  <tr>

    <td height="10" valign="top" ><h6 ><?php echo $this->lang->line('Minimum Order');?>: <span><?php echo $dollar; ?><?php echo $all_restaurant['min_order'];?>  </span> </h6></td>
  <tr>

       <h1 >
       <span><?php echo $all_restaurant['delivery_time_min'];?> <?php echo $this->lang->line('mints');?></span>
       </h1>



  <td height="10" align="left" valign="middle"><h6> <strong> <?php echo 'Horário:';?></strong> <strong>   <?php echo $open;?>-<?php echo $close;?></strong></h6></td>
  </td>
 
  </tr>

 <tr>
    <td height="10" valign="top"><h6><?php echo $this->lang->line('Delivery Charges');?>: <span><?php echo $dollar; ?><?php echo $all_restaurant['delivery_charges'];?> </span> </h6></td>
    </tr>
</table>
       
       </div>      
       </div>
       </div>
       
     <?php 

     //fim da construcao do restaurante 
     //end for

   // echo '<script type="text/javascript"> alert("end for aceito pelo teste")</script>';

   } //end test if code
  


    } //end if restaurante_search db
   // echo '<script type="text/javascript"> alert("end if")</script>';

   } 
  else
  {

///caso nao tenha restaurante  informa ao usuario

  ?>




	    <div class="cuisine_col">
       <div class="col-sm-12">
        <center><h1><?php echo $this->lang->line('Sorry,We don t find restaurant this location');?> <?php echo $session_user_id['search_data'];?></h1></center>
		<br />
		<center><a href="<?php echo base_url();?>"><input type="button" class="btn_login alo"  value="Change location" style="margin:5px 0px 0px 0px; width:200px;"/></a></center>
       </div>
             
       </div>
	 
	  <?php 

    }?>



       
      </div>
	  
	  
     </div>
        </div>
    </div>
    
   
  
 <?php $this->load->view('segment/footer');?>
 

 
</body>
</html>






<!--
//////////////////////////////////define mapa 
-->




 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4W0I7ncB-L-7_ngFdX2Dtn_-QzPf58z0&amp;libraries=places&drawing&callback" async defer></script>



<script>




var raio_dist = "<?php echo$session_user_id['search_lim'];?>";  //relacao zoom e distancia dos restaurantes

var json_read =''; //define variavel para testar se json de restaurantes foi carregado




$(function(){





//$('.find-me').on('click',function(){

//se input vazio usa findme, se imput com dados usa findme com esse dados

//alert("<?php echo$session_user_id['search_data'];?>");


var geocomplete_value = "<?php echo$session_user_id['search_data'];?>";  //nome da rua


var user_address=geocomplete_value; 


var geocoder = new google.maps.Geocoder();


var address = user_address;


geocoder.geocode( { 'address': address}, function(results, status) {



if (status == google.maps.GeocoderStatus.OK) {


//usa coordenada aproximada

    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();



var map;
var marker;

var myLatlng = new google.maps.LatLng(latitude,longitude);   ///coordenada achada se digita endereco no teclado 


var geocoder = new google.maps.Geocoder();

var infowindow = new google.maps.InfoWindow();




//////vai para tela com localizacao do usuario
//mostra restaurantes em determinado raio

show_restaurant();

resizeMap();


//////funcao search places

function show_restaurant() {


//var mapOptions = {
//zoom: 13,
//center: usuario,  //coordenada do inico da sessao
//mapTypeId: google.maps.MapTypeId.ROADMAP
//};

//map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

///cria marker usuario no map e define mapa
  var  usuario = {lat: latitude, lng: longitude};

   if (raio_dist==0.9)
   {
   dist=950;
   zoom_dist=14;
   }

   if (raio_dist==1.9)
   {
   dist=1950;
   zoom_dist=13;
   }

   if (raio_dist==4.9)
   {
   dist=4950; 
   zoom_dist=12;
   }

   if (raio_dist==10)
   {
   dist=5050; 
   zoom_dist=12;
   }


  map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: usuario,
    zoom: zoom_dist , minZoom: 11, maxZoom: zoom_dist,disableDefaultUI: true,
  });



var raio = dist;
var icon_user = {
    url: "public/images/favicon1.png", // url
    scaledSize: new google.maps.Size(25, 25), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0) // anchor
};


var marker_user = new google.maps.Marker({
    position: usuario,
    map: map,
    icon: icon_user
});





  var Circle = new google.maps.Circle({
      strokeColor: '#FF0000',
     strokeOpacity: 0.2,
      strokeWeight: 2,
     fillColor: '#FF0000',
     fillOpacity: 0.1,
     map: map,
     center: map.center,
     radius: parseFloat(raio)
    });





$(function(){

            var search_data="";

            $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>search/cria_rest",
            data: { search_data:search_data},
            success: function(msg=true){
            // alert(msg.replace(/(\r\n|\n|\r)/gm,""));
              if(msg!=''){
             json_read = msg.replace(/(\r\n|\n|\r)/gm);
          // json_read = msg.replace(/(\r\n|\n|\r)/gm,"");
              // json_read=json_read.replace(/\s+/g,'');
          //alert(json_read);



//usa lista json para plotar restaurantes / estudo par usar session 

user_restaurant = JSON.parse(json_read);

//alert(user_restaurant.restaurant[0]['id']);

           var infowindow_user = new google.maps.InfoWindow({
                content: "Cliente"
            });

            google.maps.event.addListener(marker_user, 'mouseover', function () {
            infowindow_user.open(map, marker_user);
            });

            google.maps.event.addListener(marker_user, 'mouseout', function () {
            infowindow_user.close(map, marker_user);
            });




for (var i = 0; i < user_restaurant.restaurant.length - 1; i++) 
{
     var counter = user_restaurant.restaurant[i];
    // alert(counter.logo);

     var logo = "logo_google.png";  //counter.logo;

     var name =   counter.name;
    //format lat long do usuario para usar na pesquisa e criar restaurantes na tela

     var latlng = new google.maps.LatLng( counter.lat,counter.lng ); 

     create_restaurant(latlng,logo,name);

}//end for
    
                         }   //end if msg 
               
                  }///sucess aajax
              });  //ajax



});


} //end function show restaurant

var nome_temp='';

function create_restaurant(latlng,logo,name) {

var icon = {
    url: "image_gallery/restaurant_logo/thumb/google/" + logo , // url
    scaledSize: new google.maps.Size(25, 25), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0,0) // anchor
};

//var marker = new google.maps.Marker({
 //   map: map,
  //  position:latlng,
   // icon: icon
//});

//insere dados nos objetos com nome e foto

     
        var infowindow = new google.maps.InfoWindow({disableAutoPan: true});

        var service = new google.maps.places.PlacesService(map);
        

        service.getDetails({

        placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4'  // no futuro pode retornar dados do google do restaurante

        }, function(place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
           
            var marker = new google.maps.Marker({
              map: map,
              position: latlng,
              icon:icon
            });





google.maps.event.addListener(marker, 'mouseover', function () {
            //pode modificar para retornar dados do google

                
              if(nome_temp!='')
              {
              $('.'+nome_temp).css("opacity", 1);
              } 
             
         
              infowindow.setContent('<div><strong>' + name + '</strong><br>' +
                'Restaurante ' + name + '<br>' +
                'Cozinha  Horario' + '</div>');
              infowindow.open(map, this);


                var nome_rest=name.replace(/\s+/g,'');
                //$('.'+nome_rest).hide();
                $('.'+nome_rest).css( "opacity", 0.5);
                nome_temp=nome_rest;

             ;

    });

    google.maps.event.addListener(marker, 'mouseout', function () {
        infowindow.close(map, marker);

    });

              }
          });






} //fim create restaurante






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





}




});


//});  //fim findme click button


  });  //fim function

//////fim do findme


</script>


<!--
//////////////////////////////////define mapa 
-->





<script>
$(document).ready(function(){
	$(document).on('click',".mess_btn",function(){
	$(".send_mass").show();
  });

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

<script>
$(function(){
   $('.rat').on('click',function(){
      var rat_val = $(this).attr('cus');
	  if(rat_val==1){
	  $('.r-1').removeClass('fa-star-o');
	  $('.r-2').removeClass('fa-star');
	  $('.r-2').removeClass('add-star');
	  $('.r-3').removeClass('fa-star');
	  $('.r-3').removeClass('add-star');
	  $('.r-4').removeClass('fa-star');
	  $('.r-4').removeClass('add-star');
	  $('.r-5').removeClass('fa-star');
	  $('.r-5').removeClass('add-star');
	  $('.r-1').addClass('fa-star');
	  $('.r-1').addClass('add-star');
	  $('.r-1').addClass('one-add-star');
	  $('.r-2').addClass('fa-star-o');
	  $('.r-3').addClass('fa-star-o');
	  $('.r-4').addClass('fa-star-o');
	  $('.r-5').addClass('fa-star-o');
	  $("#rating").val(1);
	  }
	  if(rat_val==2){
	  $('.r-1').removeClass('fa-star-o');
	  $('.r-1').removeClass('one-add-star');
	  $('.r-2').removeClass('fa-star-o');
	  $('.r-3').removeClass('fa-star');
	  $('.r-3').removeClass('add-star');
	  $('.r-4').removeClass('fa-star');
	  $('.r-4').removeClass('add-star');
	  $('.r-5').removeClass('fa-star');
	  $('.r-5').removeClass('add-star');
	  $('.r-1').addClass('fa-star');
	  $('.r-1').addClass('add-star');
	  $('.r-2').addClass('fa-star');
	  $('.r-2').addClass('add-star');
	  $('.r-3').addClass('fa-star-o');
	  $('.r-4').addClass('fa-star-o');
	  $('.r-5').addClass('fa-star-o');
	  $("#rating").val(2);
	  }
	  if(rat_val==3){
	  $('.r-1').removeClass('fa-star-o');
	  $('.r-1').removeClass('one-add-star');
	  $('.r-2').removeClass('fa-star-o');
	  $('.r-3').removeClass('fa-star-o');
	  $('.r-4').removeClass('fa-star');
	  $('.r-4').removeClass('add-star');
	  $('.r-5').removeClass('fa-star');
	  $('.r-5').removeClass('add-star');
	  $('.r-1').addClass('fa-star');
	  $('.r-1').addClass('add-star');
	  $('.r-2').addClass('fa-star');
	  $('.r-2').addClass('add-star');
	  $('.r-3').addClass('fa-star');
	  $('.r-3').addClass('add-star');
	  $('.r-4').addClass('fa-star-o');
	  $('.r-5').addClass('fa-star-o');
	  $("#rating").val(3);
	  }
	  if(rat_val==4){
	  $('.r-1').removeClass('fa-star-o');
	  $('.r-1').removeClass('one-add-star');
	  $('.r-2').removeClass('fa-star-o');
	  $('.r-3').removeClass('fa-star-o');
	  $('.r-4').removeClass('fa-star-o');
	  $('.r-5').removeClass('fa-star');
	  $('.r-5').removeClass('add-star');
	  $('.r-1').addClass('fa-star');
	  $('.r-1').addClass('add-star');
	  $('.r-2').addClass('fa-star');
	  $('.r-2').addClass('add-star');
	  $('.r-3').addClass('fa-star');
	  $('.r-3').addClass('add-star');
	  $('.r-4').addClass('fa-star');
	  $('.r-4').addClass('add-star');
	  $('.r-5').addClass('fa-star-o');
	  $("#rating").val(4);
	  }
	   if(rat_val==5){
	  $('.r-1').removeClass('fa-star-o');
	  $('.r-1').removeClass('one-add-star');
	  $('.r-2').removeClass('fa-star-o');
	  $('.r-3').removeClass('fa-star-o');
	  $('.r-4').removeClass('fa-star-o');
	  $('.r-5').removeClass('fa-star-o');
	  $('.r-1').addClass('fa-star');
	  $('.r-1').addClass('add-star');
	  $('.r-2').addClass('fa-star');
	  $('.r-2').addClass('add-star');
	  $('.r-3').addClass('fa-star');
	  $('.r-3').addClass('add-star');
	  $('.r-4').addClass('fa-star');
	  $('.r-4').addClass('add-star');
	  $('.r-5').addClass('fa-star');
	  $('.r-5').addClass('add-star');
	  $("#rating").val(5);
	  }
	  
	  
	  $(".right_pan").html('<img src="<?php  echo base_url('public/front/images/ajax-loader.gif'); ?>" style="margin-left:340px; margin-top:100px;">');
var sort_by=$("#sort").val();
var cuisine_id=$("#cuisine_id").val();
var rating= $("#rating").val();


$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('search/load_restaurant'); ?>', 
    data: {cuisine_id:cuisine_id,rating:rating,sort_by:sort_by}, 
    success: function (data) {
     //alert(data);
	$(".right_pan").html(data);
	
	}
    });
	  
	  
	  
	  
   });
});
</script>

 <input name="rating" value="" id="rating" type="hidden"  >
 <input type="hidden" id="cuisine_id" value="">
 
 <script>
$(document).ready(function(){
$(".cuisine").click(function(){
$(".right_pan").html('<img src="<?php  echo base_url('public/front/images/ajax-loader.gif'); ?>" style="margin-left:340px; margin-top:100px;">');
//return false;
var id=$(this).attr('id');
$(".cuisine").removeClass('active');
$("#"+id).addClass('active');
var cuisine_id=id.replace('cuisine','');
$("#cuisine_id").val(cuisine_id);
var rating=$("#rating").val();
var sort_by=$("#sort").val();

$.ajax({ 
    type: "POST",
    url: '<?php echo base_url('search/load_restaurant'); ?>', 
    data: {cuisine_id:cuisine_id,rating:rating,sort_by:sort_by}, 
    success: function (data) {
     //alert(data);
	$(".right_pan").html(data);
	
	}
    });

});

});
</script>





<script>

///////////////////////////////////////SCROLLL MAPA ////////////////////////////

$(function(){
$(window).scroll(function(){
//testa scroll  e define se o menu fica na tela
  var height=$(window).height();
  var res=height-$(this).scrollTop();
  //alert($(this).scrollTop());
  if($(this).scrollTop()>100 ){
  $(".fiz").addClass("scrol_fix");
} else{
$(".fiz").removeClass("scrol_fix"); 
}
if($(this).scrollTop()>=2000){
$(".fiz").removeClass("scrol_fix"); 
}
});
});
</script>

















<div class="modal fade" id="myModal" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal">
<img src="<?php echo base_url('public/front/images/close.png'); ?>">
</button>
        <h3 style="margin:0px; text-align:center" id=""><?php echo $this->lang->line('Message');?></h3>
      </div>
      

      
      
      <div class="modal-body "      id="model_content">
       <form  class="form-horizontal san" name="register-form" >
      
        <div class="form-group has-feedback">
          <div class="col-md-12 padding"    >
          
          <h4 style="text-align:center"><?php echo $this->lang->line('This restaurant is closed for today');?>.</h4>
   
  <div class="clearfix"></div>
   <div class="col-md-7 padding_main">
   
   



</div>
</div>
</div>


  <hr />    

<div class="form-group has-feedback">
  <div class="col-md-12 padding">
   <div class="col-md-4">
  <p style=" color:#000; margin:0px;">&nbsp;</p>
  </div>
   <div class="col-md-12  padding_main">
   <center><button class="btn_popup  " data-dismiss="modal" style="margin:5px 0px 0px 0px; width:150px;">Ok</button></center>
  
  </div>
 </div>
</div>

</form>

      </div>
      
      
    </div>
  </div>
</div>
