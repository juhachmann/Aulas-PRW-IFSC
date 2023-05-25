<?php

    $sql = "SELECT * FROM $tabelaTimes";

    $resposta = $conexao->query($sql) or die ($conexao->error);

    $times = $resposta->fetch_all(MYSQLI_ASSOC);

    $captionTabela = "Veja todos os times do Campeonato Brasileiro: ";
    