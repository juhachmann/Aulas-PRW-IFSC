<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP com MySQL </title> 
  <link rel="stylesheet" href="../css/formata-banco.css">
</head> 

<body> 
 <h1> MySQL + PHP - modelo 2 </h1>

 <form action="exercicio3.php" method="post">
  <fieldset>
   <legend> Cadastro de produtos </legend>

   <label class="alinha"> ID: </label>
   <input type="text" name="id" autofocus placeholder="Forneça o código do produto"> <br>

   <label class="alinha"> Preço Unitário: </label>
   <input type="number" name="preco" step="0.01" min="0" max="9999.99"> <br>

   <label class="alinha"> Quantidade em estoque: </label>
   <input type="number" name="estoque" min="0"> <br>

   <button name="cadastrar"> Cadastrar produto </button>
  </fieldset>

  <fieldset>
   <legend> Outras operações sobre o Banco de Dados </legend>

   <button type="submit" name="tabular">Tabular produtos</button> <br>

   <label class="alinha"> ID do produto a ser alterado: </label>
   <input type="text" name="id-alter" autofocus placeholder="Código do produto a ser alterado"> <br>

   <label class="alinha"> Novo Preço Unitário: </label>
   <input type="number" name="preco-alter" step="0.01" min="0" max="9999.99" placeholder="Novo preço unitário"> <br>

   <button type="submit" name="alterar">Alterar Preço do Produto</button> <br>


   <label class="alinha"> Estoque Mínimo </label>
   <input type="number" name="estoque-min" min="0" max="9999.99" placeholder="Estoque mínimo"> <br>
   <button type="submit" name="excluir">Excluir do Banco produtos com estoque abaixo do mínimo</button>

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
   require "../includes/cadastrar-produtos.inc.php";
   }
  else if(isset($_POST['tabular'])) 
  {
    require "../includes/tabular-produtos.inc.php"; 
  }
  else if(isset($_POST['alterar'])) 
  {
    require "../includes/alterar-produtos.inc.php"; 
  }
  else if(isset($_POST['excluir'])) 
  {
    require "../includes/excluir-produto.inc.php"; 
  }


  require "../includes/desconectar.inc.php";

 ?>    
</body> 
</html> 