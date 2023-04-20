<?php

    $sql = "SELECT COUNT(media) FROM $nomeDaTabela WHERE media >= 6";

    $resposta = $conexao->query($sql) or die($conexao->error);

    $registro = $resposta->fetch_array();

    $alunosAprovados = $registro[0];

    echo "<p>Número de alunos aprovados: {$alunosAprovados}</p>";





    