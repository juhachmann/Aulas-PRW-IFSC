<?php

    $sql = "CREATE TABLE IF NOT EXISTS $tabelaMedicos(
        crm VARCHAR(50) NOT NULL UNIQUE PRIMARY KEY,    
        nome VARCHAR(150) NOT NULL
        )
        ENGINE=innoDB";

    $conexao->query($sql) or exit($conexao->error);


    $sql = "CREATE TABLE IF NOT EXISTS $tabelaPacientes(
            id INT NOT NULL UNIQUE AUTO_INCREMENT,    
            nome VARCHAR(150) NOT NULL,
            crm_medico VARCHAR(50) NOT NULL,
            data_consulta DATE,
            PRIMARY KEY (id),
            FOREIGN KEY (crm_medico) REFERENCES $tabelaMedicos (crm)
            )
            ENGINE=innoDB";

    $conexao->query($sql) or exit($conexao->error);