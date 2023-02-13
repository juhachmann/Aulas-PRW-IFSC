<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lista1.css">
    <title>Super 1</title>
</head>
<body>

    <?php

        $valorCompra = $_POST["compra"];
        
        $descCartao = $acrescEntrega = 0;

        if ($_POST["cartao"] == "true") {
            $descCartao = $valorCompra * 0.05;
        }
        if ($_POST["entrega"] == "true") {
            $acrescEntrega = $valorCompra * 0.02;
        }
    ?>

    <h1>Meu Supermercado</h1>

    <?php 
        echo "<p>Valor inicial da compra: R$ $valorCompra</p>
        <p>- Desconto de pagamento com cartão (5%): R$ $descCartao</p>
        <p>+ Acréscimo de entrega à domicílio (2%): R$ $acrescEntrega</p>
        <p>= VALOR FINAL DA COMPRA: R$ "; 
        echo $valorCompra - $descCartao + $acrescEntrega;
        echo "</p>";
    ?>

</body>
</html>