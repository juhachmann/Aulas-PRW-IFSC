<?php

    include "../includes/lista05.inc.php";

    // $_POST keys: id, preco, qtd, perecivel , description
    //pprint($_POST);

    foreach ($_POST as $key => $value) {
        $var = $key;
        $$var = $value;
    }
    // Show!
    //echo "$id + $preco + $qtd + $perecivel + $description";



    $conexao = new mysqli('localhost', 'root');
    $sql = "CREATE DATABASE IF NOT EXISTS prw;";
    $resultado = $conexao->query($sql) or die($conexao->error);
    $conexao->select_db('prw');
    // Não é mais fácil colocar isso num if? 
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id varchar(100) unique not null,
        preco float not null,
        qtd int not null,
        perecivel boolean not null,
        description text,
        PRIMARY KEY (id)
    );";
    $resultado = $conexao->query($sql) or die($conexao->error);
    
    $sql = "INSERT INTO products VALUES ('$id', $preco, $qtd, $perecivel, '$description');";
    $resultado = $conexao->query($sql) or die($conexao->error);  
    

    $sql = "SELECT * FROM products WHERE (perecivel = 1) ORDER BY qtd DESC;";
    $resultado = $conexao->query($sql) or die($conexao->error);
    //echo "$resultado";
    $pereciveis = $resultado->fetch_all(MYSQLI_ASSOC);
    pprint($pereciveis);


    $sql = "SELECT description FROM products WHERE (SELECT MIN(qtd) FROM products) = qtd;";
    $resultado = $conexao->query($sql) or die($conexao->error);
    //echo "$resultado";
    $menorQtd = $resultado->fetch_all(MYSQLI_ASSOC);
    pprint($menorQtd);


    $sql = "SELECT SUM(preco) FROM products WHERE perecivel = 0;";
    $resultado = $conexao->query($sql) or die($conexao->error);
    //echo "$resultado";
    $naoPereciveis = $resultado->fetch_all(MYSQLI_ASSOC);
    pprint($naoPereciveis);

    $conexao->close();

    // Agora montar tabelas usando apenas php

    echo "<table>
            <tr>
                <th colspan='5'>Produtos Perecíveis</th>
            </tr>
            <tr>
                <th>ID Produto</th>
                <th>Preço</th>
                <th>Qtd. Estoque</th>
                <th>Classificação</th>
                <th>Descrição</th>
            </tr>";
    foreach($pereciveis as $perecivel) {
        echo "<tr>
                <td>". $perecivel['id'] ."</td>
                <td>R$ ". number_format($perecivel['preco'], 2, ",", "") ."</td>
                <td>". $perecivel['qtd'] ."</td>
                <td>". $perecivel['perecivel'] ."</td>
                <td>". $perecivel['description'] ."</td>
             </td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<p>Descrição do(s) produto(s) com a menor quantidade em estoque: </p>";
    foreach ($menorQtd as $produto) {
        echo "<p>Descrição: " . $produto['description'] ."</p>";
    }

    echo "<p>Faturamento total com a venda de produtos não perecíveis: R$ " . number_format($naoPereciveis[0]['SUM(preco)'], 2, ",", "") . "</p>";








?>