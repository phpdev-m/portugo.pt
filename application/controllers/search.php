<?php 
class search extends CI_Controller{
	
	
function __construct()
    {
        // Call the Model constructor
  parent::__construct();
  $this->load->database();
	$this->load->model('search_model');
	$this->load->model('home_model');
	$this->load->model('restaurant_model');
	$this->load->model('signup_user_model');
	$this->load->model('myaccount_model');
    }




public function calc_dist2(
  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $latDelta = $latTo - $latFrom;
  $lonDelta = $lonTo - $lonFrom;

  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
  return $angle * $earthRadius;
}


public function calcdist($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }
}


function populate_gps($postrest)
  {


$this->search_model->removegps();

$this->data['restaurant_search'] = @$this->search_model->get_all_restaurant();

$restaurant_search=$this->data['restaurant_search'];


foreach($restaurant_search as $key=>$all_restaurant)
{




$coord_user=explode(",",$postrest);
$lat_user=$coord_user[0];
$lng_user=$coord_user[1];



$id=$all_restaurant['id'];
$code=$all_restaurant['postcode_search'];
$name=$all_restaurant['restaurant_name'];
$address=$all_restaurant['address'];
$full_address=$all_restaurant['full_address'];
$cuisine=$all_restaurant['cuisine_types'];
$note=$all_restaurant['restaurant_description'];
$logo=$all_restaurant['restaurant_logo'];

if ($all_restaurant['full_address'])
  {

///calcula coordenada lat e long para cada restaurante
 $formattedAddr = str_replace(' ','+',$all_restaurant['full_address']);

 $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=true&false&key=AIzaSyCYeNIgWZRpwrRvYJOF3AJAwqSLFZST-kQ'); 
        $output1 = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data

        $lat  = $output1->results[0]->geometry->location->lat; 
        $lng = $output1->results[0]->geometry->location->lng;


if ($lat!='')
 { 
        $this->search_model->insert_coord_restaurant($id,$lat,$lng,$code,$name,$cuisine,$logo);
 }

}



/*
print_r($postrest); //code user
echo "<pre>";        
print_r($lat_user);  //lat user 
echo "<pre>";
print_r($lng_user);   //long user
echo "<pre>";
print_r($id);         //id rest
echo "<pre>";
print_r($lat);      //lat rest
echo "<pre>";
print_r($lng);      //long rest
echo "<pre>";
print_r($code);      //code rest 
echo "<pre>";
print_r($name);  //nome rest
echo "<pre>";
print_r($address);  //nome rest
echo "<pre>";
print_r($full_address);  //nome rest
echo "<pre>";
print_r($cuisine);      //cozinha
echo "<pre>";
print_r($note);           //nota
echo "<pre>";
print_r($logo);           //nota
die;
*/
//echo '<script type="text/javascript"> alert("'. 'index' . '")</script>';


}

}




//testa dados recebidos da session para pesquisa de restaurante e chama view search no home view

public function index()
	{


	if(isset($_POST['search']) && !empty($_POST['search']))
	{

	$search_data = $_POST['search'];

	$sess_array = array( 'search_data' => $search_data );

  $this->session->set_userdata('session_search_data', $sess_array);


	}


//echo '<script type="text/javascript"> alert("'. 'index' . '")</script>';


////depois de enviado o cep pela pesquisa de home view busca no db e exibe tela search com restaurantes


//vem ou do input ou do find, recebe lista para calculo de restaurantes proximos
//a opcao de postcode no db esta desativada, 

//cria sessao usuario cep
//$session_user_id=$this->session->userdata('session_search_data');
//$postcode=@$session_user_id['search_data'];


//cria seessao usuario rest e cep

$session_user_id=$this->session->userdata('session_search_data');


//usa os dados criado pelo request ajax do home
$postcode=@$session_user_id['search_data'];   //nome da rua

$postrest=@$session_user_id['search_rest'];  // coordenada 

$postdist=@$session_user_id['search_dist'];     //criado array com lista pela distancia

/*
print_r($postdist); 
echo "<pre>";
print_r($postcode); 
echo "<pre>";
print_r($postrest); 
echo "<pre>";
die;
*/


//executa funcao para popular gps e criar coood lat lng
//$this->populate_gps($postrest);



if(@$postcode!='')
{


$this->data['restaurant_search'] = @$this->search_model->get_all_restaurant($postcode);

	  }
         else
         {
	 $this->data['restaurant_search'] = array();
	 }

   //echo '<script type="text/javascript"> alert("search view")</script>';
	 $this->load->view('search',$this->data);
	}
	


	function load_restaurant()
	{

	$session_user_id=$this->session->userdata('session_search_data');
	//print_r($session_user_id); die;

//echo '<script type="text/javascript"> alert("'. $session_user_id . '")</script>';

	$postcode=@$session_user_id['search_data'];

	if(@$postcode!='')
        {
	$this->data['restaurant_search'] = @$this->search_model->load_restaurant($postcode,$_POST);
	 }
         else
                 {
	 $this->data['restaurant_search'] = array();
	 }

	 $this->load->view('ajax_search',$this->data);
	}
	




//armazena o cep em variavel comum as telas	chamado pela funcao de home view

 //carreaga array com cep e json de restaurantes para selecao por distancia 
	public function session_search_address()
	{


	$search_data = $_POST['search_data'] ;  //nome da ruSa

  $search_rest = $_POST['search_rest'] ;  //coordenada do users

  $search_lim = $_POST['search_lim'] ;  //inicia com valor padrao de distancia,depois muda qdo requisatod por sarch view


/*
print_r($search_data); 
echo "<pre>";
print_r($search_rest); 
echo "<pre>";
print_r($search_lim); 
echo "<pre>";
*/



  $search_dist =  $this->restaurant_search_distance( $_POST['search_rest'],$_POST['search_lim']);  //lista distancia
  
	$sess_array = array('search_data' => $search_data,'search_rest' => $search_rest ,'search_dist' => $search_dist,'search_lim' => $search_lim);

	$this->session->set_userdata('session_search_data', $sess_array);

	$session_user_id=$this->session->userdata('session_search_data');


//  $search_data = $_POST['search_data'];
//  $sess_array = array('search_data' => $search_data);
//  $this->session->set_userdata('session_search_data', $sess_array);
//  $session_user_id=$this->session->userdata('session_search_data');
//  echo 1;


	//echo '1';


	}
	


 public function  restaurant_search_distance($postrest,$search_lim)
{

if($postrest!='')
{


//$latitude='38.72503';
//$longitude='-9.149981';

//$postrest = preg_replace('/[ \t]+/', ' ', preg_replace('/[\r\n]+/', "\n", $postrest));
//$array = json_decode($postrest, true);

//print_r($postcode_rest);
//echo "<pre>";
//die;

//print_r($postcode_rest); die;

//$lat_user=$array['lat'];

//$long_user=$array['long'];


$coord_user=explode(",",$postrest);
$lat_user=$coord_user[0];
$lng_user=$coord_user[1];


$this->data['gps_restaurant'] = @$this->search_model->get_all_gps();

$gps_restaurant=$this->data['gps_restaurant'];


$id=$gps_restaurant[0]['id'];
$lat=$gps_restaurant[0]['lat'];
$lng=$gps_restaurant[0]['lng'];


//print_r($array['user']);
//echo "<pre>";
//print_r($array['lat']);
//echo "<pre>";
//print_r($array['long']);


$i=0;


foreach($gps_restaurant as $key=>$ponto)

{

//print_r($array['restaurant'][$i]['code']);
//echo "<pre>";
//print_r($array['restaurant'][$i]['lat']);
//echo "<pre>";
//print_r($array['restaurant'][$i]['long']);
//echo "<pre>";

$id=$gps_restaurant[$i]['id'];
$lat=$gps_restaurant[$i]['lat'];
$lng=$gps_restaurant[$i]['lng'];

$result = $this->calcdist($lat_user,$lng_user,$lat,$lng,"K");



//estudar gerar lista completa com array session e muda no search view
if($result < $search_lim)
{
//resultado da selecao por distancia e id
//$list_rest[]=array($id,$result);
$list_rest[]=$id;
}
else
{
$list_rest[]='0';
}


$i += 1;


} //end for


return $list_rest;

//print_r($postcode_rest);

//die;

}// fim if postcode_rest

}// fim funcao lista_rest








///converte endereco do findme em cep para pesquisa dde restaurante 
	function cria_rest()
	{

              
  ///carrega todos os restaurantes para usar no findme
  $this->data['gps_restaurant'] = @$this->search_model->get_all_gps();
  $gps_restaurant=$this->data['gps_restaurant'];


$id=$gps_restaurant[0]['id'];
$lat=$gps_restaurant[0]['lat'];
$lng=$gps_restaurant[0]['lng'];
$code=$gps_restaurant[0]['code'];
$name=$gps_restaurant[0]['name'];       
$cuisine=$gps_restaurant[0]['cuisine'];
$logo=$gps_restaurant[0]['logo'];       



  ///dados do usuario
  echo '{"restaurant":[';

   foreach($gps_restaurant as $key=>$ponto)
       {
   
   ////usa  endereco e deve formata conforme modelo get_postocode
       echo '{"id":"' . $ponto['id'] . '",' . 
            '"lat":"' . $ponto['lat'] . '",' . 
            '"lng":"' . $ponto['lng'] .'",' . 
            '"code":"' . $ponto['code'] . '",' . 
             '"name":"' . $ponto['name'] . '",' . 
            '"cuisine":"' . $ponto['cuisine'] .'",' . 
            '"logo":"' . $ponto['logo'] .'"},';	   
          } //end for

          echo '{"id":"0","lat":"0","lng":"0","code":"0","name":"0","cuisine":"0" ,"logo":"0"}]}';


	}


///converte endereco para cep para entrada via teclado
	function get_postcode()
	{

   
	$address=$_POST['search_data'];

//echo '<script type="text/javascript"> alert("'.  $address . '")</script>';

        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);

        //echo '<script type="text/javascript"> alert("'. $formattedAddr  . '")</script>';
        //Send request and receive json data by address
     
        $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=true_or_false&key=AIzaSyCYeNIgWZRpwrRvYJOF3AJAwqSLFZST-kQ'); 


        $output1 = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        $latitude  = $output1->results[0]->geometry->location->lat; 
        $longitude = $output1->results[0]->geometry->location->lng;
        //Send request and receive json data by latitude longitute
        $geocodeFromLatlon = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$latitude.','.$longitude.'&sensor=true_or_false');
        $output2 = json_decode($geocodeFromLatlon);
        if(!empty($output2)){
            $addressComponents = $output2->results[0]->address_components;
            foreach($addressComponents as $addrComp){
                if($addrComp->types[0] == 'postal_code'){
                    //Return the zipcode
                   echo  $addrComp->long_name;

                }
            }
            //return false;
        }else{
           // return false;
        }
    
	}


	
	public function filter()
	{
	$session_user_id=$this->session->userdata('session_search_data');
	$filter_value = $_POST['filter'];
	$new_search_data = str_replace('Portugal','',@$session_user_id['search_data']);
	$new_search_data1 = str_replace(' ',',',$new_search_data);
	$new_search_data2 = rtrim(str_replace(',,',',',$new_search_data1),',');
	$new_search_data3 = explode(',',$new_search_data2);
	//echo rtrim($new_search_data2,','); die;
	//print_r($new_search_data3); die;
	foreach($new_search_data3 as $key=>$search_val){
	
	 $minimum_order = $this->restaurant_model->filter_min_order($_POST['filter'],$search_val);
	 
	 }
	
	  if(count($minimum_order)>0){
	  foreach($minimum_order as $key=>$all_restaurant){?>
      
      <div class="cuisine_col">
       <div class="col-sm-4">
        <div class="resbg" style="background:rgba(0, 0, 0, 0) url('<?php echo base_url();?>image_gallery/cover_photo/<?php echo $all_restaurant['cover_photo'];?>') no-repeat scroll center top / cover ;">
          <img src="<?php echo base_url();?>public/front/images/res_bg.png"  />
          <img src="<?php echo base_url();?>public/front/images/rest_logo.png"  style="position:absolute; top:0; left:
          0px; margin:38px 0 0 26px"/>
          </div>
       </div>
       <div class="col-sm-8 padding_main">
       <div class="col-sm-8">
       <h1><?php echo $all_restaurant['restaurant_name'];?></h1>
       <h2><?php echo substr(strip_tags($all_restaurant['restaurant_description']),0,150); if(strlen($all_restaurant['restaurant_description'])>150){echo ".....";}?></h2>
       
       
       <h4 style="color:#ffbf00;">
<?php
$rat_val = ceil($all_restaurant['rating_value']/$all_restaurant['rating']);
for($i=1;$i<=5;$i++){?>
<?php
if($rat_val>=$i){?>
<i class="fa fa-star"></i>
<?php }else{ ?>

<i class="fa fa-star-o"></i>
<?php } }?>
<span style="color:#333">(<?php echo $all_restaurant['rating'];?>)</span>
</h4>
       
       </div>
       <div class="col-sm-4">
       <h4>Rating: <span><?php echo ceil($all_restaurant['rating_value']/$all_restaurant['rating']);?></span></h4>
       <h4>Min Order: <span>$<?php echo $all_restaurant['min_order'];?> </span></h4>
       <h4>Delivery Charge:  <span>$<?php echo $all_restaurant['delivery_charges'];?></span></h4>
       <h4>Delivery:  <span><?php echo $all_restaurant['delivery_time_min'];?> mints </span></h4>
       <h4><a href="<?php echo base_url('restaurant_details'); ?>/?id=<?php echo $all_restaurant['id'];?>"><button class="btn_order" type="submit">Place order</button></a></h4>
       </div>
       </div>      
       </div>
       
      <?php } }else{?>
	  <div class="cuisine_col">
       <div class="col-sm-8">
        <center><h1>Sorry,We don't find your restaurant this location </h1></center>
       </div>
             
       </div>
	 
	  <?php }
	}
}


?>
