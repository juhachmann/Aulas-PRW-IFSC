<?php

    namespace Connect;

    DEFINE (SERVIDOR, "localhost");
    DEFINE (USUARIO, "root");
    DEFINE (SENHA, "");
    DEFINE (BANCO_DE_DADOS, "projeto_clinica");

    function conectar () {
        $conexao = new mysqli(SERVIDOR, USUARIO, SENHA, BANCO_DE_DADOS);
        return $conexao;
    }
