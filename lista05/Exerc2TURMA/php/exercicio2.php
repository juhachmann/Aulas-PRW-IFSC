<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP com MySQL </title> 
  <link rel="stylesheet" href="../css/formata-banco.css">
</head> 

<body> 
 <h1> MySQL + PHP - modelo 2 </h1>

 <form action="exercicio2.php" method="post">
  <fieldset>
   <legend> Cadastro de produtos </legend>

   <label class="alinha"> ID: </label>
   <input type="text" name="id" autofocus placeholder="Forneça o código do produto"> <br>

   <label class="alinha"> Preço Unitário: </label>
   <input type="number" name="preco" step="0.01" min="0" max="9999.99"> <br>

   <label class="alinha"> Quantidade em estoque: </label>
   <input type="number" name="estoque" min="0"> <br>

   <label> Classificação do Produto: </label><br>
   <input type="radio" name="perecivel" value="1"> Produto Perecível <br>
   <input type="radio" name="perecivel" value="0"> Produto NÃO Perecível <br>

   <label class="alinha"> Descrição do produto: </label>
   <textarea name="descricao" placeholder="Insira a descrição do produto"></textarea> <br>



   <button name="cadastrar"> Cadastrar produto </button>
  </fieldset>

  <fieldset>
   <legend> Outras operações sobre o Banco de Dados </legend>

    <select name="outras-operacoes">
      <option value="tabular">Tabular produtos perecíveis</option>
      <option value="descricao">Mostrar descrição</option>
      <option value="faturamento">Calcular Faturamento</option>
    </select>

    <button name="executar-operacao"> Executar Operação </button>

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

  else if(isset($_POST['executar-operacao'])) {
    $selecao = $_POST['outras-operacoes'];
    if ($selecao == 'tabular') {
      require "../includes/tabular-produtos.inc.php"; 
    }
    else if($selecao == 'descricao') {
      require "../includes/descricao.inc.php";
    }
    else if($selecao == 'faturamento')
    {
    require "../includes/faturamento.inc.php";
    }
  }

  require "../includes/desconectar.inc.php";

 ?>    
</body> 
</html> 