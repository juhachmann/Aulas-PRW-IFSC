<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas e vetores</title>

    <style>
        table {
            border-collapse: collapse;
        } 
        
        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: lightgray;
        }
    </style>

</head>
<body>
    <h1>Notas da turma</h1>

    <?php

        //print_r ($_POST);

        /* 
        Array ( 
            [est1] => Array ( 
                [nome] => Ju 
                [nota] => 6 ) 
            [est2] => Array ( 
                [nome] => Paulo 
                [nota] => 10 ) 
            [est3] => Array ( 
                [nome] => André 
                [nota] => 8 ) ) 
        */

        $dadosEstudantes = [];
        foreach ($_POST as $student) {
            $dadosEstudantes[ $student['nome'] ] = $student['nota'];
        }
        //print_r($dadosEstudantes);

        function avg($array) {
            return array_sum($array) / count($array);
        }

        echo "<p>A média da nota dos estudantes é: " . number_format(avg($dadosEstudantes), "2") . "</p>";
        
        
        echo "<table>
                <tr>
                    <th>Estudante</th>
                    <th>Nota</th>
                </tr>";
        foreach ($dadosEstudantes as $nome => $nota) {
            echo "<tr>
                    <td>$nome</td>
                    <td>$nota</td>
                </tr>";
        }
        echo "</table>";


        $maiorNota = max($dadosEstudantes);
        echo "<p>A maior nota foi " . number_format($maiorNota, "1") . ", obtida pelo(s) estudante(s): ";
        foreach (
            array_keys($dadosEstudantes, $maiorNota) as $nome) {
            echo "<br>- $nome";
        } 
        echo "</p>";


        
        arsort($dadosEstudantes);
        echo "<table>
                <tr>
                    <th colspan='2'>Lista Ordenada</th>
                </tr>
                <tr>
                    <th>Estudante</th>
                    <th>Nota</th>
                </tr>";
        foreach ($dadosEstudantes as $nome => $nota) {
            echo "<tr>
                    <td>$nome</td>
                    <td>$nota</td>
                </tr>";
        }
        echo "</table>";



    ?>


<!--
    <form action="exec01.php" method="post">
        <fieldset>
            <legend>Insira os dados dos/as estudantes:</legend>
            <label>Nome (1):</label>
            <input type="text" name="nome1" placeholder="Nome do/a estudante" autofocus><br>
            <label>Nota:</label>
            <input type="number" name="nota1" min="0" max="10" step="0.5"><br><br>
            <label>Nome (2):</label>
            <input type="text" name="nome2" placeholder="Nome do/a estudante" autofocus><br>
            <label>Nota:</label>
            <input type="number" name="nota2" min="0" max="10" step="0.5"><br><br>
            <label>Nome (3):</label>
            <input type="text" name="nome3" placeholder="Nome do/a estudante" autofocus><br>
            <label>Nota:</label>
            <input type="number" name="nota3" min="0" max="10" step="0.5"><br><br>
            <button type="submit">Enviar!</button>
        </fieldset>
    </form> -->
</body>
</html>