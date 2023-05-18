<?php
    session_start();
    var_dump($_SESSION);

    $salario = file_get_contents("http://localhost:8081/calcular_salario/Juliana/6000/4");
    echo $salario;

?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Login de usuário com PHP </title> 
  <link rel="stylesheet" href="../css/formata-login.css">
</head> 

<body> 
 <h1> Autenticação de usuário com PHP - HOME </h1>

 <div>
  <a href="formulario-cadastro.php"> Ir para o cadastro do administrador </a> <br>

  <a href="formulario-login.php"> Ir para a área de login do administrador </a> <br>

  <a href="servico-web.php"> Ir para serviço web </a> <br>

 </div>
</body> 
</html> 
