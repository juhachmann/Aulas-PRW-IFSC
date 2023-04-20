<?php

    $sql = "SELECT * FROM $nomeDaTabela WHERE (SELECT min(estoque) FROM $nomeDaTabela) = estoque;";

    $resultado = $conexao->query($sql) or exit($conexao->error);

    // var_dump($resultado);
    // var_dump($resultado->current_field);

    // Checar se a tabela existe e se está vazia
    $registros = $conexao->affected_rows;

    if($registros > 0) {

        echo "<table>
                <caption>Produto(s) com menor quantidade em estoque </caption>
                <tr>
                    <th>Id</th>
                    <th>Preço</th>
                    <th>Qtd. em estoque</th>
                    <th>Perecível?</th>
                    <th>Descrição</th>
                </tr>";

        while($registro = $resultado->fetch_array(MYSQLI_ASSOC)) {
            // amei essa lógica <3, nunca tinha usado
            // Só que o fetch_array me dá os dados duplicados, com chave associativa E chave numérica...
            // Então deve ter o argumento pra passar igual em fetch_all()
            // var_dump($registro);


            // Filtrar e sanitizar quando puxa do banco de dados também? Sim, pq dados podem ter sido 


            echo "<tr>";
            foreach ($registro as $dado) {
                $dadoValidado = htmlentities($dado, ENT_QUOTES);
                echo "<td>$dadoValidado</td>";
            }
            echo "</tr>";
        }

        echo "</table>";    

    }
    else {
        echo "<p>Não há dados cadastrados!</p>";
    }
