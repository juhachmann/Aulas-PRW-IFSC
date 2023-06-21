<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP com MySQL </title> 
  <link rel="stylesheet" href="../css/formata-banco.css">
</head> 

<body> 
 <h1> MySQL + PHP - modelo 4 </h1>

 <form id="medicos" action="exercicio4.php" method="post">
  <fieldset>
   <legend>Cadastro de Médicos</legend>

   <label class="alinha"> CRM: </label>
   <input type="text" name="medico-crm" autofocus placeholder="Forneça o CRM do médico" required> <br>

   <label class="alinha"> Nome do médico: </label>
   <input type="text" name="medico-nome" placeholder="Insira o nome do médico" required> <br>

   <button form="medicos" type="submit" name="cadastrar-medico">Cadastrar Médico</button>

  </fieldset>
</form>

<form id="pacientes" action="exercicio4.php" method="post">
  <fieldset id="cadastro-pacientes">
    <legend>Cadastro de Consultas</legend>

    <label for="paciente-nome" class="alinha">Nome do paciente:</label>
    <input type="text" name="paciente-nome" placeholder="Insira o nome do paciente" required> <br>

    <label for="paciente-crm" class="alinha">CRM do médico que o atendeu: </label>
    <input type="text" name="paciente-crm" placeholder="Insira o CRM do médico que atendeu o paciente" required> <br>

    <label for="paciente-data" class="alinha">Data da internação:</label>
    <input type="date" name="paciente-data" required> <br>

    <button form="pacientes" type="submit" name="cadastrar-paciente">Cadastrar Paciente</button>

  </fieldset>
</form>

<form id="busca" action="exercicio4.php" method="post">
  <fieldset>
    
    <legend>Filtros de Busca</legend>

    <label for="busca-medico" class="alinha">Nome do médico (opcional)):</label>
    <input type="text" name="busca-medico" placeholder="Opcional"> <br>

    <label for="busca-data" class="alinha">Data para busca (opcional):</label>
    <input type="date" name="busca-data"> <br>

    <button form="busca" type="submit" name="busca-crm">Ver Consultas Cadastradas</button>

  </fieldset>
</form>

<form action="exercicio4.php" method="get">
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
        include "../includes/buscar-crm.inc.php";
    }


    // Desconectar do Banco de Dados

    include "../includes/desconectar.inc.php";


    // Para ficar profissional, o que precisa?

    // Selecionar - Usar Filtros
    // Requerer e validar todos os campos (inclusive usando expressões regulares)
    // Só deixar buscar por médicos que já estão cadastrados
    // Mostrar CRM com o nome do médico no cadastro da consulta
    // Separar Cadastro de médico, de paciente e de consultas

    // Melhor ainda, mostrar uma tabela, tipo uma agenda, com o tipo da consulta e horário da consulta
    // Se for cadastrar para mesmo médico, mesmo dia e mesmo horário, tem que dar erro

    // Nossa, é quase uma aplicação completa =O
    // Parece legal.. mas o mais legal seria colocar APIs e ainda um javascript lindinho
    // Deixar agendar via tabela de agenda <3

?>