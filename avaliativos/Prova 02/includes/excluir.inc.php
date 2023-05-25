<?php

    $data = $conexao->escape_string(trim($_POST['validade-excluir']));

    $sql = "DELETE FROM $tabelaMedicamentos WHERE validade <= '$data'";

    $conexao->query($sql) or die($conexao->error);

    $registros = $conexao->affected_rows;

    if ($registros > 0) {
        echo "<p>$registros medicamento(s) excluídos com sucesso!</p>";
    }
    else {
        echo "<p>Nenhum medicamento com data de validade inferior ao estipulado</p>";
    }


