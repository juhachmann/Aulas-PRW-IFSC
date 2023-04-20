<?php
 $sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela(
          matricula VARCHAR(50) PRIMARY KEY,
          aluno VARCHAR(500),
          media DECIMAL(3,1))";

 $conexao->query($sql) or exit($conexao->error);