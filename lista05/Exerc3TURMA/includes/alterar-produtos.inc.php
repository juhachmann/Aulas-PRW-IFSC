<?php


    $id = $conexao->escape_string(trim($_POST['id-alter']));
    $preco = $conexao->escape_string(trim($_POST['preco-alter']));

    $sql = "UPDATE $nomeDaTabela SET preco = $preco WHERE id = '$id'";
    
    $conexao->query($sql) or die($conexao->error);
    $registros = $conexao->affected_rows;

    if ($registros > 0) 
    { 
        echo "<p>Produto com id: $id alterado com sucesso! </p>";
    }
    else {
        echo "<p>Produto com id $id NÃO encontrado</p>";
    }






    