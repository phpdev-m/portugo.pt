<?php


 // Connects to your Database 
 
 $ligacao = mysqli_connect("127.0.0.1", "root", "tobby63","portugo");
 
 if (!$ligacao)
 { 
 $data = "Problema de conexao" . "\n" ;
 } 
 else
 { 
 $data = "Conexao OK!" . "\n";
 } 
 //echo $data;
 
 $ok = mysqli_select_db($ligacao,"servicos");
  
 if (!$ok)
 { 
 $data = "Problema no Banco de Dados!" . "\n" ;
 } 
 else
 { 
 $data = "Banco de Dados OK!" . "\n" ;
 } 
 
 //echo $data;
 




$sql="truncate servicos" ;


$delete = mysqli_query($ligacao,$sql) or die("erro ao selecionar");


mysqli_close( $ligacao);
 
 
?>

