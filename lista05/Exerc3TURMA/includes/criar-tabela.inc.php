<?php
 $sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela(
          id VARCHAR(30) NOT NULL UNIQUE PRIMARY KEY,    
          preco DECIMAL(6,2),
          estoque INT)";

 $conexao->query($sql) or exit($conexao->error);