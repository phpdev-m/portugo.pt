

<?php

//envia pedido para DB

//error_reporting(0);
//ini_set('display_errors', 0);


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
 $data = "Problema no Banco de Dados tente novamente!" . "\n" ;
 echo $data;
 } 
 else
 { 
 $data = "Banco de Dados OK!" . "\n" ;
 } 


 
$nome_serv= mysqli_real_escape_string($ligacao ,$_POST['nome_serv']); 
$endereco= mysqli_real_escape_string($ligacao ,$_POST['endereco']);
$placeid= mysqli_real_escape_string($ligacao ,$_POST['placeid']);
$usuario= mysqli_real_escape_string($ligacao ,$_POST['usuario']); 
$email = mysqli_real_escape_string($ligacao ,$_POST['email']);  


if($nome_serv)
{
$import="INSERT into servicos (nome_serv,endereco,placeid,usuario,email ,data) values ('" . $nome_serv . "' ,'" . $endereco . "' ,'" . $placeid . "' ,'" . $usuario .  "' , '" . $email . "' ,  CURDATE() )" ;

$result = mysqli_query($ligacao,$import);

}

if($result > 0)
{
echo "ok";
}
else
{
echo "Problema no banco de dados tente novamente!";
}
       


mysqli_close($ligacao);


?>
















