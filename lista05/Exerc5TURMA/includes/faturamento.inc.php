<?php

    $sql = "SELECT SUM(preco) FROM $tabelaMedicamentos";

    $resposta = $conexao->query($sql) or die($conexao->error);
    $faturamento = $resposta->fetch_array();
    $faturamento = $faturamento[0];

    $faturamento = number_format($faturamento, 2, ",", "");

    echo "<p>Faturamento total com a venda dos medicamentos: R$ $faturamento</p>";








