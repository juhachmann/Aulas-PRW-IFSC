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


        function pprint($array) {
            return print("<pre>".print_r($array,true)."</pre>");
        }

        pprint($_POST);
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
        /* 
        Array ( 
            [0123] => Array ( 
                [nome] => Ju 
                [media] => 7 ) 
            [0124] => Array ( 
                [nome] => Paulo 
                [media] => 10 ) 
            [0125] => Array ( 
                [nome] => André 
                [media] => 9 ) 
            ) 
        */

        /*não entendi.. não funciona!
        foreach ($alunos as $mat => [
                            ['nome'] => $nome,
                            ['media'] => $media,
                            ]) {
            echo "Mat.: $mat, Nome: $nome, Media: $media";
        }
        */

        echo "<table>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Média Final</th>";
        
        foreach ($alunos as $mat => $dados) {
            echo "<tr>
                    <td>".$mat."</td>";
            foreach ($dados as $dado) {
                echo "<td>".$dado."</td>";
            }
            echo "</tr>";
        }

        echo "</table>";


        // Exercício Dois e Três
        // Usando um vetor auxiliar para armazenar só a Matrícula e a Nota e depois usar sum() e max() só neste vetor
        $notas = [];
        foreach ($alunos as $mat => $dados) { 
            $notas[$mat] = $dados['media'];
        }
        // print_r($notas);
       /* Array ( 
            [0123] => 7 
            [0124] => 10 
            [0125] => 9 
        )  */

        // Pegando a Média
        echo "<p>Média da turma: " . number_format(array_sum($notas) / count($notas), 1, ".", "") . "</p>";

        // array_filter() -> para encontrar todas as chaves que contêm um valor. 
        // Meu problema: encontrar a chave da chave.. fazer um teste! (não quero!)

        $maiorNota = max($notas);

        // Métodos para busca, cada um com suas especificidades:
            // array_filter(), array_search(), array_keys($array, $value);

        //print_r( array_keys($notas, $maiorNota) );
        $matMaiorNota = array_keys($notas, $maiorNota);

        echo "<table>
                <tr>
                    <th colspan='3'>Nota mais alta: " . $maiorNota . "</th>
                </tr>";
        foreach ($matMaiorNota as $mat) {
            echo "<tr>
                    <td>" . $mat . "</td>
                    <td>" . $alunos[$mat]['nome'] . "</td>
                    <td>" . $alunos[$mat]['media'] . "</td>
                 </tr>";
        }
        echo "<tr>
                <td colspan='3'>Total de alunos com a maior nota: " . count($matMaiorNota) . "</td>
              </tr>
            </table>";



        // Atividade 4: como assim, tem que usar um armazenamento externo? Ou um javascript? Aí complicou..

        // Atividade 5: sort em ordem descrescente de nota
        echo "<p>Notas em ordem descrescente</p>";

        // A-Reverse Sort Notas 
        // arsort() para manter a associação com os índices...
        arsort($notas);
        //print_r($notas);
        /* Array ( 
            [0002] => 10 
            [0003] => 9 
            [0001] => 6 
            )
        ) */


        echo "<table>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Média Final</th>";

        $mat = [];
        foreach ($notas as $mat => $nota) {
            echo "<tr>
                    <td>".$mat."</td>";
            foreach ($alunos[$mat] as $dado) {
                echo "<td>".$dado."</td>";
            }
//                    <td>".$alunos[$mat]['nome']."</td>
//                    <td>".$alunos[$mat]['media']."</td>
            echo "</tr>";
        }
        echo "</table>";


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