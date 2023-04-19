<?php
 $sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela(
          id int not null unique AUTO_INCREMENT PRIMARY KEY,
          matricula VARCHAR(300),
          aluno VARCHAR(500),
          media DECIMAL(3,1))";

 $conexao->query($sql) or exit($conexao->error);