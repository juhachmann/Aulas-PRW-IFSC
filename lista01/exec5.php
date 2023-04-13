<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="lista1.css">
 <title>Câmbio</title>
</head>
<body>
    <h1>Trocar meus dólares</h1>


    <?php 
        DEFINE("CAMBIO", 5.23);

        $reais = $_POST['dolares'] * CAMBIO;

        echo "<p>Seus dólares: U$ " . number_format($_POST['dolares'], "2", ",", " ") . "<br>
        Resultado da Conversão: R$ " . number_format($reais, "2", ",", "") . "<br>
        Taxa de câmbio aplicada: " .  number_format(CAMBIO, 2, ",", "") . "</p>";
    ?>

    <!--
    <form action="exec5.php" method="post">
        <fieldset>
            <legend>Insira os dados financeiros:</legend>
            <label>Quantos dólares você quer vender?</label>
            <input type="number" step="0.01" name="dolares">
            <button type="submit">Converter</button>
        </fieldset>
    </form>
    -->
</body>
</html>