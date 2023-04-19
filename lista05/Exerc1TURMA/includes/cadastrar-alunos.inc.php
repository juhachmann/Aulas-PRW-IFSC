<?php

    //html special chars
    // ou escape_string();

    $aluno = $conexao->escape_string(trim($_POST['aluno']));
    $matricula = $conexao->escape_string(trim($_POST['matricula']));
    $media = $conexao->escape_string(trim($_POST['media-prw']));

    $sql = "INSERT INTO $nomeDaTabela (matricula, aluno, media) VALUES ('$matricula', '$aluno', $media);";

    $resposta = $conexao->query($sql) or exit($conexao->error);

    echo "<p>Cadastro efetuado com sucesso!</p>";



