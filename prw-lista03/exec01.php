<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lista3.css">
    <title>Dados dos estudantes da Turma</title>
</head>
<body>
    
    <h1>Dados da Turma</h1>


    <?php

        //print_r($_POST);
/*
        Array ( 
            [est1] => Array ( 
                [matr] => 0000 
                [nome] => Juliana 
                [media] => 5 ) 
            [est2] => Array ( 
                [matr] => 0001 
                [nome] => Paulo 
                [media] => 10 ) 
            [est3] => Array ( 
                [matr] => 0002 
                [nome] => André 
                [media] => 7 ) 
            ) 
*/
        $alunos = [];

        foreach ($_POST as $pessoa) {
            $alunos[$pessoa['matr']] = [
                'nome' => $pessoa['nome'], 
                'media' => $pessoa['media'],
            ];
        }

        //print_r($alunos);


        echo "<table>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Média Final</th>";
        
        foreach ($alunos as $mat => $dados) {
            echo "<tr>
                    <td>$mat</td>";
            foreach ($dados as $dado => $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }

        echo "</table>";

        
        $notas = [];
        foreach ($alunos as $mat) {
            $notas[] = $mat['media'];
        }
        

        echo "<p>Média da turma: " . number_format(array_sum($notas) / count($notas), 1, ".", "") . "</p>";

        // array_filter() -> para encontrar todas as chaves que contêm um valor. 
        // Meu problema: encontrar a chave da chave.. fazer um teste! (não quero!)

        $maiorNota = max($notas);
        echo $maiorNota;
        echo array_search($maiorNota, $alunos);






    ?>

    <!-- 
    <form action="exec01.php" method="post">

        <fieldset>
            <legend>Aluno 1</legend>
            <label>Matrícula:</label>
            <input type="text" name="matr1" placeholder="Digite o nº de matrícula" autofocus><br>
            <label>Nome:</label>
            <input type="text" name="nome1" placeholder="Digite o nome"><br>
            <label>Média Final:</label>
            <input type="number" name="media1" min="0" max="10" step="0.5">            
        </fieldset>

        <fieldset>
            <legend>Aluno 2</legend>
            <label>Matrícula:</label>
            <input type="text" name="matr2" placeholder="Digite o nº de matrícula" autofocus><br>
            <label>Nome:</label>
            <input type="text" name="nome2" placeholder="Digite o nome"><br>
            <label>Média Final:</label>
            <input type="number" name="media2" min="0" max="10" step="0.5">            
        </fieldset>

        <fieldset>
            <legend>Aluno 3</legend>
            <label>Matrícula:</label>
            <input type="text" name="matr3" placeholder="Digite o nº de matrícula" autofocus><br>
            <label>Nome:</label>
            <input type="text" name="nome3" placeholder="Digite o nome"><br>
            <label>Média Final:</label>
            <input type="number" name="media3" min="0" max="10" step="0.5">            
        </fieldset>

    </form>
    -->
</body>
</html>