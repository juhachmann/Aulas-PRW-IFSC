<?php

    namespace Validacao;

    use Connect;

    
    $conexao = conectar();


    function basicSanitize($value) {
        $value = trim($value);
        $value = $conexao->real_escape_string($value);
        return $value;
    }


    function validarNome ($value) {
        $value = basicSanitize($value);
        return $value;
    }


    function validarTelefone ($value) {
        $value = basicSanitize($value);
        return $value;
    }


    function validarCPF ($value) {
        $value = basicSanitize($value);
        return $value;
    }


    function validarEndereco ($value) {
        $value = basicSanitize($value);
        return $value;
    }


    function validarCRM ($value) {
        $value = basicSanitize($value);
        return $value;
    }


    $conexao->close();
