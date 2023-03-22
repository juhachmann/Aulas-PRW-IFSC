<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista 4 -Exercício 1</title>
</head>
<body>

    <h1>Calcular Média do Aluno</h1>

    <form action="exerc01form.php" method="post">
        <fieldset>
            <legend>Insira os dados do/a estudante</legend>
            <label for="name">Nome: </label>
            <input type="text" name="name" id="name"><br>
            <label for="n1">Nota 1:</label>
            <input type="number" name="n1" id="n1" min="0" max="10" step="0.1" ><br>
            <label for="n2">Nota 2:</label>
            <input type="number" name="n2" id="n2" min="0" max="10" step="0.1" ><br>
            <button name="enviar" type="submit">Enviar!</button>
        </fieldset>
    </form>
    

    <?php

        include '../includes/lista04.inc.php';

        if (isset($_POST['enviar'])) {
            
            pprint($_POST);

            exit_if_empty($_POST, 'name');

            $nota = $_POST['n1'];

            echo $nota;
            
            $valorTestado = filter_var($nota, FILTER_VALIDATE_INT);

            echo $valorTestado;

            if ($valorTestado !== false) {
                echo "CAIU AQUI.. 0 não lê como false!";
            }

            $media = average($_POST['n1'], $_POST['n2']);
            echo "<p>A média do/a estudante é: $media</p>";

            if (aprova($media, 6)) {
                echo "<p>O estudante está aprovado</p>";
            }
            else {
                echo "<p class='err'>O estudante está reprovado</p>";
            }
        };

        // Manipulação de strings em PHP
        // trim() : corta os espaços no começo e no final
        // strlen() : comprimento da string

        // Validação de dados de entrada:
        // filter_var()
        // ver todos os filtros: https://www.w3schools.com/php/php_ref_filter.asp


    ?>

</body>
</html>