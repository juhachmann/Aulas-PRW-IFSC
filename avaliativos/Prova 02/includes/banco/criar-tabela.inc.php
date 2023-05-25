<?php

    $sql = "CREATE TABLE IF NOT EXISTS $tabelaTimes(
        id INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(150) NOT NULL,    
        uf CHAR(2) NOT NULL,
        titulos_estado INT NOT NULL
        )
        ENGINE=innoDB";

    $conexao->query($sql) or exit($conexao->error);

