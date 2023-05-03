<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP com MySQL </title> 
  <link rel="stylesheet" href="../css/formata-banco.css">
</head> 

<body> 
 <h1> MySQL + PHP - modelo 4 </h1>

 <form action="exercicio4.php" method="post">
  <fieldset>
   <legend>Cadastro de Médicos</legend>

   <label class="alinha"> CRM: </label>
   <input type="text" name="medico-crm" autofocus placeholder="Forneça o CRM do médico"> <br>

   <label class="alinha"> Nome do médico: </label>
   <input type="text" name="medico-nome" placeholder="Insira o nome do médico"> <br>

   <button type="submit" name="cadastrar-medico">Cadastrar Médico</button>

  </fieldset>

  <fieldset>
    <legend>Cadastro de Consultas</legend>

    <label for="paciente-nome" class="alinha">Nome do paciente:</label>
    <input type="text" name="paciente-nome" placeholder="Insira o nome do paciente"> <br>

    <label for="paciente-crm" class="alinha">CRM do médico que o atendeu: </label>
    <input type="text" name="paciente-crm" placeholder="Insira o CRM do médico que atendeu o paciente"> <br>

    <label for="paciente-data" class="alinha">Data da internação:</label>
    <input type="date" name="paciente-data"> <br>

    <button type="submit" name="cadastrar-paciente">Cadastrar Paciente</button>

  </fieldset>

  <fieldset>
    
    <legend>Filtros de Busca</legend>

    <label for="busca-medico" class="alinha">Nome do médico (opcional)):</label>
    <input type="text" name="busca-medico" placeholder="Opcional"> <br>

    <label for="busca-data" class="alinha">Data para busca (opcional):</label>
    <input type="date" name="busca-data"> <br>

    <button type="submit" name="busca-crm">Ver Consultas Cadastradas</button>

  </fieldset>

  <fieldset>
    <button type="submit">Recarregar</button>
  </fieldset>

 
</form>

</body> 
</html> 

<?php


    // Criar Banco de Dados

    include "../includes/dados-conexao.inc.php";
    include "../includes/conectar.inc.php";
    include "../includes/definir-utf8.inc.php";
    include "../includes/criar-banco.inc.php";
    include "../includes/abrir-banco.inc.php";
    include "../includes/criar-tabela.inc.php";


    // Lógica dos botões

    if (isset($_POST['cadastrar-paciente'])) {
        include "../includes/cadastrar-paciente.inc.php";
    }
    else if (isset($_POST['cadastrar-medico'])) {
        include "../includes/cadastrar-medico.inc.php";
    }
    else if (isset($_POST['busca-crm'])) {
        //var_dump($_POST);
        include "../includes/buscar-crm.inc.php";
    }


    // Desconectar do Banco de Dados

    include "../includes/desconectar.inc.php";

?>