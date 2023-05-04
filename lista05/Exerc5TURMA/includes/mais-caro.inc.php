<?php

    $sql = "SELECT * FROM $tabelaMedicamentos WHERE preco = (SELECT max(preco) FROM $tabelaMedicamentos)";

    $resposta = $conexao->query($sql) or die($conexao->error);

    $registros = $conexao->affected_rows;

    if ($registros > 0) {
        echo "<table>
        <caption>Medicamentos Mais Caros Cadastrados</caption>
        <tr>
            <th>Cod.</th>
            <th>Nome do Medicamento</th>
            <th>Preço</th>
            <th>Data de Validade</th>
        </tr>";

        while($registro = $resposta->fetch_array()) { 
            echo "<tr>";
            $cod = htmlentities($registro[0], ENT_QUOTES);    
            echo "<td>$cod</td>";
            $nome = htmlentities($registro[1], ENT_QUOTES);    
            echo "<td>$nome</td>"; 
            $preco = number_format(htmlentities($registro[2], ENT_QUOTES), 2, ",", "");    
            echo "<td>$preco</td>";
            $validade = htmlentities($registro[3], ENT_QUOTES);
            $date = new Datetime($validade);
            $date = $date->format('d/m/Y');
            echo "<td>$date</td>";
            echo "</tr>";
        }

        echo "</table>";  
    }
    else {
        echo "<p>Ainda não há medicamentos cadastrados no banco de dados</p>";
    }




    




