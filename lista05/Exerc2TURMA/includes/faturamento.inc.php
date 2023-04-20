<?php

    $sql = "SELECT SUM(preco*estoque) FROM $nomeDaTabela WHERE perecivel = 0;";
    
    $resposta = $conexao->query($sql) or die($conexao->error);

    $registro = $resposta->fetch_array();

    $faturamento = $registro[0];


    echo "<p>Faturamento Total com a venda de produtos não perecíveis: R$ {$faturamento}</p>";






    