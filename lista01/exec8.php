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
        echo print_r($_POST);

        
        $valorCompra = $_POST["compra"];
        
        $descCartao = $acrescEntrega = 0;

        if (array_key_exists("cartao", $_POST)) {
            $descCartao = $valorCompra * 0.05;
        }
        
        if (array_key_exists("entrega", $_POST)) {
            $acrescEntrega = $valorCompra * 0.02;
        }

        /* alternativa usa a função isset() para testar (o que é melhor em algumas situações)
        if (isset($_POST['entrega'])) {
            ...
        }

        */
    ?>

<!-- <legend>Preferências da Compra</legend>
            <input type="checkbox" name="cartao" value="true"> Pagamento com cartão <br> 
            <input type="checkbox" name="entrega" value="true"> Entrega à domicílio <br> -->


    <h1>Meu Supermercado</h1>
    <p>Valor inicial da compra: R$ <?php echo $valorCompra?></p>
    <p>- Desconto de pagamento com cartão: R$ <?php echo $descCartao?></p>
    <p>+ Acréscimo de entrega à domicílio: R$ <?php echo $acrescEntrega?></p>
    <p>= VALOR FINAL DA COMPRA: R$ <?php echo $valorCompra - $descCartao + $acrescEntrega?></p>

</body>
</html>