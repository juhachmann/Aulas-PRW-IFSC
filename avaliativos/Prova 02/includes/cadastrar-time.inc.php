<?php

//var_dump($_POST);
//         array (size=4)
//   'nome' => string 'Time Teste' (length=10)
//   'uf' => string 'AP' (length=2)
//   'titulos' => string '5' (length=1)
//   'cadastrar-time' => string '' (length=0)

        // Lógica do cadastro vindo de uma include
    //echo "<p>Cadastrar Produtos!</p>";

    //html special chars
    // ou escape_string();
    // Pode usar os dois pra garantir!

    $nome = $conexao->escape_string(trim($_POST['nome']));
    $uf = $conexao->escape_string(trim($_POST['uf']));
    $titulos_estado = $conexao->escape_string(trim($_POST['titulos']));

    $sql = "INSERT INTO $tabelaTimes VALUES (null, '$nome', '$uf', $titulos_estado)";
    
    $conexao->query($sql) or exit($conexao->error);

    echo "<p class='text-center'>O time '$nome' foi cadastrado com sucesso!</p>";
