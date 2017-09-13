<?php
// Connects to your Database 
 
 $ligacao = mysqli_connect("127.0.0.1", "root", "tobby63","3d_printer");
 
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


 
 $ok = mysqli_select_db($ligacao,"3d_printer");
  
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
 
 
 $sql = "SELECT * FROM usuarios";

 $result = mysqli_query($ligacao,$sql);

 if (mysqli_num_rows($result) > 0) 
 {
 //$data = "Listando tabela <usuarios>" . "\n" ;
 //echo $data;
  echo "Listando usuários:\n"; 
 while ($data = mysqli_fetch_row($result)) 
 {
 
 echo "{$data[0]} {$data[1]} {$data[2]} \n {$data[3]} {$data[4]} \n";
 } 
 }
 else
 {
 $data = "Sem dados na tabela < usuarios >" ;
 echo $data;
 }
 
?>