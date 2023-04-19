<?php

    $sql = "SELECT * FROM $nomeDaTabela";

    $resultado = $conexao->query($sql) or exit($conexao->error);

    // var_dump($resultado);
    // var_dump($resultado->current_field);

    // Checar se a tabela existe e se está vazia
    $registros = $conexao->affected_rows;

    if($registros > 0) {

        echo "<table>
                <caption>Relação de alunos cadastrados</caption>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Média Final</th>
                </tr>";

        while($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {
            // amei essa lógica <3, nunca tinha usado
            // Só que o fetch_array me dá os dados duplicados, com chave associativa E chave numérica...
            // Então deve ter o argumento pra passar igual em fetch_all()
            // var_dump($registro);
            echo "<tr>";
            foreach ($registro as $dado) {
                echo "<td>$dado</td>";
            }
            echo "</tr>";
        }


        echo "</table>";    

    }
    else {
        echo "<p>Não há dados cadastrados!</p>";
    }




