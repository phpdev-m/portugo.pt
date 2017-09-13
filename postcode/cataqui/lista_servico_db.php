<?php
// Connects to your Database 
 
 $ligacao = mysqli_connect("127.0.0.1", "root", "tobby63","portugo");
 
 if (!$ligacao)
 { 
 $data = "Problema de conexao" . "\n" ;
 //echo $data;
 } 
 else
 { 
 $data = "Conexao MYSQL OK!" . "\n";
 //echo $data;
 } 


 
 $ok = mysqli_select_db($ligacao,"servicos");
  
 if (!$ok)
 { 
 $data = "Problema no Banco de Dados!" . "\n" ;
 //echo $data;
 } 
 else
 { 
 $data = "Banco de Dados OK!" . "\n" ;
 //echo $data;
 }  
 
 
 $sql = "SELECT * FROM servicos";

 $result = mysqli_query($ligacao,$sql);

 if (mysqli_num_rows($result) > 0) 
 {
 //$data = "Listando tabela <mark3d>" . "\n" ;
 //echo $data;
 
 echo "Listando serviços : \n";
 while ($data = mysqli_fetch_row($result)) 
 {
 
 echo "{$data[1]} {$data[2]} {$data[3]} \n {$data[4]} {$data[5]} {$data[6]} {$data[7]}\n";
 } 
 }
 else
 {
 $data = "Sem dados na tabela < mark3d >" ;
 echo $data;
 }
 
?>