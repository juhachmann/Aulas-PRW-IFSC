<?php


    $minTitulos = 3;

    $sql = "SELECT * FROM $tabelaTimes WHERE titulos_estado >= $minTitulos";

    $resposta = $conexao->query($sql) or die ($conexao->error);

    $times = $resposta->fetch_all(MYSQLI_ASSOC);

    $captionTabela = "Veja os times com 3 ou mais títulos por seu estado de origem: ";
