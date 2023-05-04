<?php

    //echo "<p>Cadastrar Produtos!</p>";

    //html special chars
    // ou escape_string();
    // Pode usar os dois pra garantir!

    $nome = $conexao->escape_string(trim($_POST['med-nome']));
    $preco = $conexao->escape_string(trim($_POST['med-preco']));
    $validade = $conexao->escape_string(trim($_POST['med-validade']));

    $sql = "INSERT INTO $tabelaMedicamentos VALUES (null, '$nome', $preco, '$validade')";
    
    $resposta = $conexao->query($sql) or exit($conexao->error);

    echo "<p>Medicamento cadastrado com sucesso!</p>";



