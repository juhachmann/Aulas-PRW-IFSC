<?php

    $nome = $conexao->escape_string(trim($_POST['paciente-nome']));
    $crm_medico = $conexao->escape_string(trim($_POST['paciente-crm']));
    $data_consulta = $conexao->escape_string(trim($_POST['paciente-data']));


    $sql = "INSERT INTO $tabelaPacientes VALUES (null, '$nome', '$crm_medico', '$data_consulta')";
    
    $resposta = $conexao->query($sql) or exit($conexao->error);

    echo "<p>Paciente cadastrado com sucesso!</p>";
