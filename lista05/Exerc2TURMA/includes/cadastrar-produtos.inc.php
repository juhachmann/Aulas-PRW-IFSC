<?php

    //echo "<p>Cadastrar Produtos!</p>";

    //html special chars
    // ou escape_string();
    // Pode usar os dois pra garantir!

    $id = $conexao->escape_string(trim($_POST['id']));
    $preco = $conexao->escape_string(trim($_POST['preco']));
    $estoque = $conexao->escape_string(trim($_POST['estoque']));
    $perecivel = $conexao->escape_string(trim($_POST['perecivel']));
    $descricao = $conexao->escape_string(trim($_POST['descricao']));

    // $aluno = trim($_POST['aluno']);
    // $matricula = trim($_POST['matricula']);
    // $media = trim($_POST['media-prw']);

    $sql = "INSERT INTO $nomeDaTabela (id, preco, estoque, perecivel, descricao) VALUES ('$id', $preco, $estoque, $perecivel, '$descricao');";
    
    $resposta = $conexao->query($sql) or exit($conexao->error);

    echo "<p>Cadastro efetuado com sucesso!</p>";



