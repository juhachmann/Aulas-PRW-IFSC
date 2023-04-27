<?php

    //echo "<p>Cadastrar Produtos!</p>";

    //html special chars
    // ou escape_string();
    // Pode usar os dois pra garantir!

    $id = $conexao->escape_string(trim($_POST['id']));
    $preco = $conexao->escape_string(trim($_POST['preco']));
    $estoque = $conexao->escape_string(trim($_POST['estoque']));


    // $aluno = trim($_POST['aluno']);
    // $matricula = trim($_POST['matricula']);
    // $media = trim($_POST['media-prw']);

    $sql = "INSERT INTO $nomeDaTabela (id, preco, estoque) VALUES ('$id', $preco, $estoque)";
    
    $resposta = $conexao->query($sql) or exit($conexao->error);

    echo "<p>Cadastro efetuado com sucesso!</p>";



