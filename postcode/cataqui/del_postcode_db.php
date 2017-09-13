<?php


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
 //echo $data;
 
 $ok = mysqli_select_db($ligacao,"pgotake_sdbt");
  
 if (!$ok)
 { 
 $data = "Problema no Banco de Dados!" . "\n" ;
 } 
 else
 { 
 $data = "Banco de Dados OK!" . "\n" ;
 } 
 
 //echo $data;
 




$sql="truncate  delivery_postcode_teste" ;


$delete = mysqli_query($ligacao,$sql) or die("erro ao selecionar");




mysqli_close( $ligacao);
 
 
?>

