<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Login de usuário com PHP </title> 
  <link rel="stylesheet" href="../css/formata-login.css">
</head> 

<body> 
 <h1> Cadastro do administrador </h1>
  <form action="formulario-cadastro.php" method="post">
   <fieldset>
    <legend> Cadastro </legend>

    <label class="alinha"> Nome completo: </label>
    <input type="text" name="nome" autofocus required> <br>

    <label class="alinha"> Login: </label>
    <input type="text" name="login" required> <br>

    <label class="alinha"> Senha: </label>
    <input type="password" name="senha" required> <br>

    <button name="cadastrar"> Cadastrar administrador </button>
   </fieldset>
  </form> 
 
 <?php
  require "../includes/dados-conexao.inc.php";
  require "../includes/conectar.inc.php";
  require "../includes/criar-banco.inc.php";
  require "../includes/abrir-banco.inc.php";
  require "../includes/definir-utf8.inc.php";
  require "../includes/criar-tabela.inc.php";

  if(isset($_POST['cadastrar']))
   {
   require "../includes/cadastrar-administrador.inc.php";
   }
  
  require "../includes/desconectar.inc.php";
 ?>    
</body> 
</html> 