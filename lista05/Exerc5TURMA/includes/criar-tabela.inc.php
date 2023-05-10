<?php

    $sql = "CREATE TABLE IF NOT EXISTS $tabelaMedicamentos(
        cod INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(150) NOT NULL,    
        preco FLOAT(6,2) NOT NULL,
        validade DATE NOT NULL
        )
        ENGINE=innoDB";

    $conexao->query($sql) or exit($conexao->error);

