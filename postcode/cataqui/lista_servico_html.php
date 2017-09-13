<?php 

if ($_SERVER['REQUEST_METHOD'] != "POST") 
{

carregalista();
}

?>

<?php
function carregalista()
{

$intVal = 1;

$n = (string)$intVal;


$lista_arquivo = carrega_lista("lista_arquivo", "*");  //para todos os registros

if(count($lista_arquivo) > 0)
{

foreach($lista_arquivo as $y => $y_value)
{
 
$_POST['numero'] = $intVal;   //numero do registro

$_POST['num_serv'] = "num_serv" . $n;
$_POST['nome_serv'] = "nome_serv" . $n;
$_POST['endereco'] = "endereco" . $n;
$_POST['placeid'] = "placeid" . $n;
$_POST['usuario'] = "usuario" . $n;
$_POST['email'] = "email" . $n;
$_POST['data'] = "data" . $n;


$num_serv = round($lista_arquivo[$y][0]);
$nome_serv = $lista_arquivo[$y][1];
$endereco = $lista_arquivo[$y][2];
$placeid = $lista_arquivo[$y][3];
$usuario = $lista_arquivo[$y][4];
$email = $lista_arquivo[$y][5];
$data = $lista_arquivo[$y][6];


$_POST['checkboxselecao'] = $num_serv; 
 

//echo '<script type="text/javascript"> alert("' . $num_serv   . '") </script>';


?>


<html>
<head>
<title></title>
</head>
<body  style="font-family:arial;"  bgcolor = ""><font size="3">
<form method="POST" enctype="multipart/form-data" name="formpedido" id="formpedido">

<div class="container" id="container">

<input class="checkbox_selecao" type="checkbox" id="<?php echo $_POST['checkboxselecao'] ;?>"  onclick="selecaocheck(this);"  name="checkboxselecao" unchecked>


<input class="tit_numero" type="text"  id= "tit_num"   name="tit_num" value="Id" disabled>
<input class="tit_servico" type="text"  id= "tit_servico"   name="tit_servico" value="Estabelecimento" disabled>

<br>

<input class="numero" type="numero"  id =<?php echo $_POST['num_serv'] ;?> name="numero"  >
<input class="servico" type="text"   id ="<?php echo $_POST['nome_serv'] ;?>" name="servico">


<input class="comprar" type="button" id="<?php echo $_POST['servico'] ;?>"  name="comprar" onClick="comprarcheck(this);" value="Comprar" readonly>

<br><br>


<hr>

</div>

<style>



.container {
      
        left:10px;

        }

.comprar {
        background-size: 60px;
        cursor: pointer;
        position: absolute;
        font-family: Verdana, Arial, sans-serif;
        display: inline-block;
        background: red ;
        color: #fff;
        padding: 4px 4px 4px 4px;
        cursor: pointer;
        width: 57px;
        height: 25px;

        left:232px;
      
        background-color: red;
       // pointer-events: none;
        }



.selecao {
        opacity: 1.0;
        font-family: Verdana, Arial, sans-serif;
        display: inline-block;
        background: red ;
        border: 1px solid red ;
        padding: 4px 4px 4px 4px;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
        width: 30;
        position: absolute;
        left:230px;
        
        //background-color: rgb(255, 255, 255);
       // pointer-events: none;
        }

.imprime {
        opacity: 1.0;
        font-family: Verdana, Arial, sans-serif;
        display: inline-block;
        background: red ;
        border: 1px solid red ;
        padding: 4px 4px 4px 4px;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
        width: 60px;
        position: relative;
        left:525px;
        //background-color: rgb(255, 255, 255);
       // pointer-events: none;
        }




.checkbox_selecao {
           font-family: Verdana, Arial, sans-serif;
        //display: inline-block;
       // background: #459300 ;
        //border: 1px solid #459300 ;
        //padding: 5px 7px 5px 7px;
        //color: #fff;
        font-size: 12px;
        cursor: pointer;
        position: relative;
        left: 230px;
        top: 0px;
        //pointer-events: none;
                }


.tit_numero {
         opacity: 0.5;
        font-family: Verdana, Arial, sans-serif;
        display: inline-block;
        background: white top left repeat-x;
        border: 1px solid #459300 ;
        padding: 4px 1px 1px 4px;
        color: black;
        font-size: 10px;
        cursor: pointer;
        position: absolute;
 
        width: 30px;
        left: 10px;
        pointer-events: none;
        }


.numero {
        font-family: Verdana, Arial, sans-serif;
        display: inline-block;
        background: #459300 ;
        border: 1px solid #459300 ;
        padding: 4px 4px 4px 4px;
        color: #fff;
        font-size: 12px;
        text-aligment: center;
        cursor: pointer;
        position: absolute;
 
        width: 30px;
        left: 10px;
        pointer-events: none;
        }


.tit_servico {
        opacity: 0.5;
        font-family: Verdana, Arial, sans-serif;
        display: inline-block;
        background: white top left repeat-x;
        border: 1px solid #459300 ;
        padding: 4px 1px 1px 4px;
        color: black;
        font-size: 10px;
        cursor: pointer;
        position: absolute;
        width: 185px;
        left: 45px;
        pointer-events: none;
        }

.servico {
        font-family: Verdana, Arial, sans-serif;
        display: inline-block;
        background: #459300 ;
        border: 1px solid #459300 ;
        padding: 4px 4px 4px 4px;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
        position: absolute;
        width: 185px;
        left: 45px;
        pointer-events: none;
        }

</style>


</form>

<script type="text/javascript">


function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}



function  selecaocheck(key)
{
if (key.selectedIndex != '') 
{   

var id = key.id;
var split = id.split('checkboxselecao');
var numid = split[1];

//alert(document.getElementById(id).checked);

var arquivo = "arquivo" + numid;
var servico = "servico" + numid;
var numero = numid;

if (document.getElementById(id).checked)
{
document.getElementById(arquivo).style.background = "#450000";
document.getElementById(servico).style.background = "#450000";
document.getElementById(numero).style.background = "#450000"; 
}
else
{
document.getElementById(arquivo).style.background = "#459300";
document.getElementById(servico).style.background = "#459300";
document.getElementById(numero).style.background = "#459300"; 
}
}
}


function comprarcheck(key)
{
if (key.selectedIndex != '') 
{   
var id = key.id;
var split = id.split('servico');
var numid = split[1];
//alert(id);
//alert(document.getElementById(id).checked);

var arquivo = "arquivo" + numid;
var servico = "servico" + numid;
var numero = numid;

//alert(document.getElementById(id).value);

}
}




</script>

</body>

</html>



<?php 

echo '<script type="text/javascript"> document.getElementById("' .  $_POST['num_serv']   . '").value ="' . $num_serv . '"</script>';
echo '<script type="text/javascript"> document.getElementById("' .  $_POST['nome_serv']   . '").value ="' . $nome_serv  . '"</script>';

echo '<script type="text/javascript"> document.getElementById("' .  $_POST['checkboxselecao']    . '").value ="' . "selecao"  . '"</script>';

$intVal =  $intVal + 1;
$n = (string)$intVal;
} 

 

}


}


?>





<?php if ($_SERVER['REQUEST_METHOD'] == "POST") 
{

if (isset($_POST['checkboxcomprar']))
{
echo '<script type="text/javascript"> alert("' .  $_POST['checkboxcomprar']    . '")  </script>';
}

if (isset($_POST['checkboxselecao']))
{

session_start();

$regValue= $_POST['num_serv'];

$_SESSION['regName'] = $regValue;


echo '<script type="text/javascript"> alert("' .  $_POST['checkboxselecao']    . '")  </script>';

//criaselecao($_POST['arquivo']);

}


}
?>



<?php  //carrega_lista e retorna usuario

function carrega_lista($sel,$usuario)
{

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
 
 //$ok = mysqli_select_db($ligacao,"servicos");
  
 //if (!$ok)
 //{ 
 //$data = "Problema no Banco de Dados tente novamente!" . "\n" ;
 //echo $data;
 //} 
 //else
 //{ 
 //$data = "Banco de Dados OK!" . "\n" ;
 //} 

$verifica_servico = mysqli_query($ligacao,"SELECT * FROM servicos") ;

if (mysqli_num_rows($verifica_servico)<=0)
{
//echo '<script type="text/javascript"> alert("'. "Sem registro de servicos no banco de dados" . '")</script>';
//die;
}

//$verifica_usuario = mysqli_query($ligacao,"SELECT * FROM usuarios") ;

//if (mysqli_num_rows($verifica_usuario)<=0)
//{
//echo '<script type="text/javascript"> alert("'. "Sem registro de usuarios no banco de dados" . '")</script>';
//die;
//}



if ($sel=="lista_arquivo")
{

//$user=mysqli_real_escape_string($ligacao ,$usuario); 

if ($usuario=="*")
{
$printquery_arquivo = mysqli_query($ligacao,"SELECT *  FROM servicos  ");
}
//else
//{
//$printquery_arquivo = mysqli_query($ligacao,"SELECT *  FROM mark3d where login = '$user' ");
//}


$lista_arquivo = array();

        $i=0;
        while( $row = mysqli_fetch_array($printquery_arquivo) )
           {
              $lista_arquivo[$i]=$row;
              $i++;
           }


//echo '<script type="text/javascript">alert("' . $i . '")</script>';

return $lista_arquivo;
}
}
?>

