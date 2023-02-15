<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas e vetores</title>
</head>
<body>
    <h1>Notas da turma</h1>

    <?php

        $st1 = [$_POST["nome1"] => $_POST["nota1"]];
        $st2 = [$_POST["nome2"] => $_POST["nota2"]];
        $st3 = [$_POST["nome3"] => $_POST["nota3"]];

        $arExec01 = [$st1[$_POST["nome1"]], $st2[$_POST["nome2"]], $st3[$_POST["nome3"]]];

        function avg($array) {
            return array_sum($array) / count($array);
        }

        echo "<p>A média da nota dos estudantes é: " . avg($arExec01) . "</p>";
        

        $arExec02 = array_merge($st1, $st2, $st3);
        echo "<table>
                <tr>
                    <th>Estudante</th>
                    <th>Nota</th>
                </tr>";
        foreach ($arExec02 as $i => $value) {
            echo "<tr>
                    <td>$i</td>
                    <td>$value</td>
                  </tr>";
        }
        echo "</table>";

        $maiorNota = max($arExec02);
        echo "<p>A maior nota foi $maiorNota, obtida pelo(s) estudante(s): ";
        foreach (array_keys($arExec02, $maiorNota) as $i => $value) {
            echo "<br>- $value";
        } 
        echo "<p>";


        //$arExec03 = 
        arsort($arExec02);
        echo "<table>
                <tr>
                    <th>Estudante</th>
                    <th>Nota</th>
                </tr>";
        foreach ($arExec02 as $i => $value) {
            echo "<tr>
                    <td>$i</td>
                    <td>$value</td>
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