<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lista1.css">
    <title>Cálculo Gasosa</title>
</head>

<body>
    
    <h1>Quanto vou gastar de combustível?</h1>

    <?php
        $distancia = $_POST["km"];
        $consumo = $_POST["consumo"];
        DEFINE("combustivel", $_POST["preco"]);
    ?>

    
    <p>Em sua viagem serão consumidos em média <span class="bold"><?php echo number_format(($distancia/$consumo), 2, ",", "") ?> litros</span> de combustível <br>
    Preço do litro do combustível: R$ <?php echo number_format(combustivel, 2, ",", "") ?> <br>
    Você irá gastar em média <span class="bold">R$ <?php echo number_format(($distancia / $consumo * combustivel), 2, ",", "") ?></span></p>

</body>

</html>