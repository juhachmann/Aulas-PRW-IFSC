<?php

$login = $conexao->escape_string(trim($_POST['login']));
$senha = $conexao->escape_string(trim($_POST['senha']));

$sql = "SELECT senha FROM $tabelaAdmin WHERE login = '$login'";

$resposta = $conexao->query($sql) or die($conexao->error);

if ($conexao->affected_rows > 0) {
    $resultado = $resposta->fetch_array();
    $senhaHash = htmlentities($resultado[0]);
    if (password_verify($senha, $senhaHash)) {
        session_start();
        $_SESSION['conectado'] = true;
        header("location: protegida.php");
    }
    else {
        echo "<p>Usuário ou senha incorretos</p>";
    }
}
else {
    echo "<p>Usuário ou senha incorretos</p>";
}
