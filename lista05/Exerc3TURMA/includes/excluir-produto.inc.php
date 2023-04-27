<?php

    $min = $conexao->escape_string(trim($_POST['estoque-min']));

    $sql = "DELETE FROM $nomeDaTabela WHERE estoque < $min";

    $conexao->query($sql) or die($conexao->error);

    $registros = $conexao->affected_rows;

    if ($registros) {
        echo "<p>$registros produto(s) excluídos com sucesso! </p>";
    }
    else {
        echo "<p>Nenhum produto foi alterado, pois nenhum havia o estoque menor do que $min</p>";
    }


    