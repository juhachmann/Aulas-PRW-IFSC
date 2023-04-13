<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lista1.css">
    <title>Calculadora de comissão</title>
</head>
<body>
    <h1>Quanto vou ganhar de comissão?</h1>

    <?php 
        $valorVenda = $_GET["valor-venda"];
        DEFINE("desconto", 0.1);
        DEFINE("ICMS", 0.12);
        DEFINE("comissao", 0.05);
    ?>

    <p>Valor Total da Venda = R$ <?php echo $valorVenda?></p>
    <p>Desconto obtido pelo cliente (10%) = R$ <?php echo $valorVenda * desconto ?></p>
    <p>ICMS (12%) = R$ <?php echo $valorVenda * ICMS ?> </p>
    <p>Comissão do/a vendedor/a <?php echo $_GET["nome-vendedor"]?> (5%) = R$ <?php echo $valorVenda * comissao ?></p>
</body>
</html>