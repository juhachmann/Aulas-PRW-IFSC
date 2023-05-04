<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP com MySQL </title> 
  <link rel="stylesheet" href="../css/formata-banco.css">
</head> 

<body> 
 <h1> MySQL + PHP - modelo 4 </h1>

 <form id="cadastro" action="exercicio5.php" method="post">
  <fieldset>
   <legend>Cadastro de Medicamentos</legend>

   <label class="alinha"> Nome do medicamento: </label>
   <input type="text" name="med-nome" autofocus placeholder="Forneça o nome do medicamento" required> <br>

   <label class="alinha"> Preço do medicamento: </label>
   <input type="number" name="med-preco" min="0" step="0.01" required> <br>

   <label class="alinha"> Data de validade: </label>
   <input type="date" name="med-validade" required> <br>

   <button form="cadastro" type="submit" name="cadastrar-medicamento">Cadastrar Medicamento</button>

  </fieldset>
</form>


<form id="busca" action="exercicio5.php" method="post">
  <fieldset>
    
    <legend>Mostrar Medicamentos</legend>

    <button form="busca" type="submit" name="mostrar">Ver Todos os Medicamentos</button>

  </fieldset>

    <fieldset>
        <legend>Excluir Medicamentos</legend>
        
        <label class="alinha"> Excluir todos os medicamentos com data de validade anterior a: </label>
        <input type="date" name="validade-excluir"> <br>
        <button form="busca" type="submit" name="excluir">Excluir medicamentos</button>
    </fieldset>
  
  <fieldset>
    <legend>Faturamento</legend>
        <button form="busca" type="submit" name="faturamento">Ver Faturamento Total das Vendas</button>
  </fieldset>

    <fieldset>
        <legend>Mais Caro</legend>
        <button form="busca" type="submit" name="mais-caro">Ver Medicamento mais caro cadastrado</button>
    </fieldset>

</form>

<form action="exercicio5.php" method="get">
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

    if (isset($_POST['cadastrar-medicamento'])) {
        include "../includes/cadastrar.inc.php";
    }
    else if (isset($_POST['mostrar'])) {
        include "../includes/mostrar.inc.php";
    }
    else if (isset($_POST['excluir'])) {
        include "../includes/excluir.inc.php";
    }
    else if (isset($_POST['faturamento'])) {
        include "../includes/faturamento.inc.php";
    }
    else if (isset($_POST['mais-caro'])) {
        include "../includes/mais-caro.inc.php";
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