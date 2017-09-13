<?php


//envia pedido para DB

//error_reporting(0);
//ini_set('display_errors', 0);

// Connects to your Database 
 
$ligacao = mysqli_connect("mysql.portugo.pt", "portugo_adm", "-AhfBrBY","pgotake_sdbt");
 
 if (!$ligacao)
 { 
 $data = "Problema de conexao" . "\n" ;
 } 
 else
 { 
 $data = "Conexao OK!" . "\n";
 } 


$ok = mysqli_select_db($ligacao,"delivery_postcode_teste");


$var_code = "100";
$var_start = "1";
$var_finish = "5";


$total =  $var_finish - $var_start;


for ($i = 1; $i <= 10; $i++) 
{
$postcode="2" ;
$rest_id= "1";
$import="INSERT into delivery_postcode_teste (delivery_postcode,restaurant_id) values ('" . $postcode . "' ,'" . $rest_id  . "'  )" ;
echo $i;
$result = mysqli_query($ligacao,$import);

}


//if($result > 0)
//{
//echo $result;
//}
//else
//{
//echo "nok";
//}



mysqli_close($ligacao);


?>
















