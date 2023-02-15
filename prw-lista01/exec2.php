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

    <p>Você irá gastar em média R$ <?php echo ($distancia / $consumo * combustivel) ?> </p>
    <p>Em sua viagem serão consumidos em média <?php echo ($distancia/$consumo) ?> litros de combustível. </p>
    <p>Preço do litro do combustível: R$ <?php echo combustivel ?> </p>

</body>
</html>