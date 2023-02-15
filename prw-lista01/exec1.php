<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lista1.css">
    <title>Média Ponderada</title>
</head>
<body>
    <h1>Resultado do Cálculo de Média Ponderada</h1>

    <?php 
        $nomeAluno = $_POST["nome-aluno"];
        $mediaPonderada = (($_POST["nota-1"] * $_POST["peso-1"]) + ($_POST["nota-2"] * $_POST["peso-2"])) / ($_POST["peso-1"] + $_POST["peso-2"]);
    ?>

    <p>A média ponderada do/a estudante <span class="bold"><?php echo $nomeAluno ?></span> é <span class="bold"><?php echo $mediaPonderada ?></span></p>
</body>
</html>