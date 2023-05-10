<?php

    include "../conexao/dados-conexao.inc.php";
    include "../conexao/conectar.inc.php";
    include "../conexao/definir-utf8.inc.php";
    include "../conexao/criar-banco.inc.php";
    include "../conexao/abrir-banco.inc.php";
    include "../includes/criar-tabela.inc.php";

    // Lógica dos botões

    if (isset($_POST['cadastrar-paciente'])) {
        include "../models/paciente.php";
    }
    else if (isset($_POST['cadastrar-medico'])) {
        include "../models/medico.php";
    }
    else if (isset($_POST['busca-crm'])) {
        include "../models/buscas.php";
    }


    // Desconectar do Banco de Dados

    include "../includes/desconectar.inc.php";
