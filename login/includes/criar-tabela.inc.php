<?php

    $sql = "CREATE TABLE IF NOT EXISTS $tabelaAdmin(
        id INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(150) NOT NULL,   
        login VARCHAR(150) NOT NULL UNIQUE,
        senha VARCHAR(300) NOT NULL
        )
        ENGINE=innoDB";

    $conexao->query($sql) or exit($conexao->error);
    // Aqui precisa de um jeito de pegar esse erro
