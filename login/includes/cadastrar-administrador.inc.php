<?php

    session_start();

    $nome = $conexao->escape_string(trim($_POST['nome']));
    $login = $conexao->escape_string(trim($_POST['login']));
    $senha = $conexao->escape_string(trim($_POST['senha']));

    $senha = password_hash($senha, PASSWORD_ARGON2I);

    $sql = "INSERT INTO $tabelaAdmin VALUES (null, '$nome', '$login', '$senha')";
    
    $resposta = $conexao->query($sql) or exit($conexao->error);

    echo "<p>Cadastro realizado com sucesso!</p>";

    $_SESSION['conectado'] = true;
    header("location: protegida.php");

