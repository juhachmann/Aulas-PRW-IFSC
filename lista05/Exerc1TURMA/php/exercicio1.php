<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP com MySQL </title> 
  <link rel="stylesheet" href="../css/formata-banco.css">
</head> 

<body> 
 <h1> MySQL + PHP - modelo 1 </h1>

 <form action="exercicio1.php" method="post">
  <fieldset>
   <legend> Cadastro de alunos </legend>

   <label class="alinha"> Aluno: </label>
   <input type="text" name="aluno" autofocus > <br>

   <label class="alinha"> Matrícula: </label>
   <input type="text" name="matricula" > <br>

   <label class="alinha"> Média de PRW: </label>
   <input type="number" name="media-prw"  step="0.1" min="0" max="10"> <br>

   <button name="cadastrar"> Cadastrar aluno </button>
  </fieldset>

  <fieldset>
   <legend> Outras operações sobre o Banco de Dados </legend>

   <div class="alinha-botoes">
    <button name="tabular-dados"> Tabular dados dos alunos </button>

    <button name="contar-aprovados"> Contar número de alunos aprovados </button>
   </div> 
  </fieldset>
 </form>

 <?php
  //var_dump($_POST);

  //neste ponto do arquivo, antes de qualquer coisa, vamos chamar as includes que contêm todas as etapas de conexão com o banco de dados
  
  require "../includes/dados-conexao.inc.php";
  require "../includes/conectar.inc.php";
  require "../includes/criar-banco.inc.php";
  require "../includes/abrir-banco.inc.php";
  require "../includes/definir-utf8.inc.php";
  require "../includes/criar-tabela.inc.php";

  //vamos, agora, descobrir qual botão foi selecionado no formulário e chamar a include adequada para executar tal operação
  if(isset($_POST['cadastrar']))
   {
   require "../includes/cadastrar-alunos.inc.php";
   }

  if(isset($_POST['tabular-dados']))
   {
   require "../includes/tabular-dados.inc.php"; 
   }

  if(isset($_POST['contar-aprovados']))
   {
   require "../includes/contar-aprovados.inc.php";
   }

  require "../includes/desconectar.inc.php";
 ?>    
</body> 
</html> 