<?php

    //echo "<p>Cadastrar Produtos!</p>";

    //html special chars
    // ou escape_string();
    // Pode usar os dois pra garantir!

    $crm = $conexao->escape_string(trim($_POST['medico-crm']));
    $nome = $conexao->escape_string(trim($_POST['medico-nome']));

    $sql = "INSERT INTO $tabelaMedicos (crm, nome) VALUES ('$crm', '$nome')";
    
    $resposta = $conexao->query($sql) or exit($conexao->error);

    echo "<p>Médico cadastrado com sucesso!</p>";



