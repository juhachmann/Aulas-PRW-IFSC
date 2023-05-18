<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Login de usuário com PHP </title> 
  <link rel="stylesheet" href="../css/formata-login.css">
</head> 

<body> 
 <h1> Autenticação de usuário com PHP - HOME </h1>

 <?php
    require "../includes/testar-login.inc.php";
 ?>

 <div>
  Você está vendo uma página acessível apenas para quem está logado no sistema (mais ou menos né...)
 </div>

 <form action="../includes/logout.inc.php" method="post">
    <fieldset>
        <legend>Desconectar</legend>
        <button type="submit">Desconectar</button>
    </fieldset>
 </form>

</body> 
</html> 
