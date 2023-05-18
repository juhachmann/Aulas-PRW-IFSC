<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Login de usuário com PHP </title> 
  <link rel="stylesheet" href="../css/formata-login.css">
</head> 

<body> 
 <h1> Usando um serviço web </h1>

 <div>
  <form action="servico-web.php" method="post">
    <fieldset>
        <legend>Fazendo uma requisição a um serviço web</legend>
        <input type="text" name="nome" placeholder="Nome" required><br>
        <label for="salarioBase">Salário Base: </label>
        <input type="number" name="salarioBase" min="0" step="0.01" required><br>
        <label for="dependentes">Dependentes: </label>
        <input type="number" name="dependentes" min="0" required><br>
        <button type="submit">Calcular Salário Líquido</button>
    </fieldset>

  </form>

  <?php

    if(!empty($_POST)) {
        include "../includes/servico.inc.php";
    }

  ?>

 </div>
</body> 
</html> 
