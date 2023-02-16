<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lista1.css">
    <title>Lojinha</title>
</head>
<body>
    <h1>Calcular meus descontos</h1>

    <?php

        //if (!isset($_POST['teste'])) {
        //    exit("Entramos na mensagem de erro!");
        //}

        $valorCompra = $_POST["compra"];
       
        echo "<p>Valor da Compra: R$ $valorCompra</p>";

        $desc = $acresc = 0;
        $sorteio = false;

        

        if ($_POST["a-vista"] == "true") {
            $desc = $valorCompra*0.05;
            echo "<p>- Desconto para compra à vista: R$ $desc</p>";
        }
        else {
            $acresc = $valorCompra*0.02;
            echo "<p>+ Acréscimo para compra à prazo: R$ $acresc</p>";
        }
        
        echo "<p>Valor final da compra: R$ ";
        echo $valorCompra - $desc + $acresc;
        echo "</p>";

        if (array_key_exists("visa", $_POST)) {
            echo "<p>Parabéns, você está concorrendo ao sorteio de um automóvel!<br>(Promoção exclusiva para cartões Visa)</p>";
        }

    ?>

</body>
</html>