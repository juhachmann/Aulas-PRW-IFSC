<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Cadastro de Produtos</title>
</head>
<body>
    
    <div class="container-fluid" id="0">
        <div class="container w-70" id="main">
            <div class="title">
                Cadastro de Produtos
            </div>
            <div id="result">
                
                <?php

                    foreach($_POST as $key => $value) {
                        $var = $key;
                        $$var = $value;
                    }

                    // Conexão Banco de Dados
                    $server = 'localhost';
                    $user = 'root';
                    $password = '';

                    $conexao = new mysqli($server, $user, $password);

                    $sql = "CREATE DATABASE IF NOT EXISTS prw;";
                    $resultado = $conexao->query($sql) or die($conexao->error);

                    $sql = "USE DATABASE prw;";
                    $resultado = $conexao->query($sql) or die($conexao->error);

                    $sql = "CREATE TABLE IF NOT EXISTS exerc03 (
                        id varchar(100) not null,
                        price float not null, 
                        qty int not null,
                        PRIMARY KEY (id)
                    );";
                    $resultado = $conexao->query($sql) or die($conexao->error);

                    $sql = "INSERT INTO exerc03 (id, price, qty) VALUES (" . $id . ", " . $price . ", " . $qty . ");";
                    // que coisa horrível!!
                    $resultado = $conexao->query($sql) or die($conexao->error);

                    // É para estar salvo....

                    // Agora, precisa 



                ?>

            </div>
        </div>
    </div>

</body>
</html>