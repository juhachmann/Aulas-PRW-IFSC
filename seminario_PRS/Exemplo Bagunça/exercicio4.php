<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Fundamentos do PHP com MySQL </title> 

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Oswald&family=Sofia+Sans+Condensed&display=swap');
    
      body {
      font-family: "Sofia Sans Condensed";
      margin: 0;
      }


      h1 {
      text-align: center;
      border-bottom: 1px solid #777;
      background: #ccc;
      margin: 0;
      }


      label.alinha {
      width: 200px; 
      display: inline-block;
      margin-bottom: 15px;
      }


      input, button {
      font-family: Oswald;
      }


      button {
      margin: auto; 
      font-size: 18px;
      font-weight: bold;
      width: 500px;
      }


      fieldset {
      width: 70%;
      margin: 30px auto;
      padding-left: 20px;
      border-radius: 10px; /*arredonda os cantos da caixa*/
      box-shadow: 5px 5px 5px #bbb;
      background-color: rgba(220, 220, 220, 0.8);
      }


      div.alinha-botoes {
      text-align: center; /*recurso para alinharmos botões no centro de uma div*/
      }


      p {
      width: 50%;
      border: 1px solid #777;
      border-radius: 10px;
      padding: 20px;
      margin: 20px auto;
      text-align: center;
      }


      span {
      font-weight: bold;
      color: #666;
      font-style: italic;
      }


      table {
      width: 50%;
      border: 1px solid #777;
      border-radius: 5px;
      background-color: rgba(220, 220, 220, 0.8);
      margin: 30px auto;
      }


      th, td {
      border: 1px solid #777;
      border-radius: 5px;
      }


      th {
      background-color: #777;
      color: #fff;
      }


      td {
      text-align: center;
      }
  </style>
</head> 

<body> 
 <h1> MySQL + PHP - modelo 4 </h1>

 <form id="medicos" action="exercicio4.php" method="post">
  <fieldset>
   <legend>Cadastro de Médicos</legend>

   <label class="alinha"> CRM: </label>
   <input type="text" name="medico-crm" autofocus placeholder="Forneça o CRM do médico" required> <br>

   <label class="alinha"> Nome do médico: </label>
   <input type="text" name="medico-nome" placeholder="Insira o nome do médico" required> <br>

   <button form="medicos" type="submit" name="cadastrar-medico">Cadastrar Médico</button>

  </fieldset>
</form>

<form id="pacientes" action="exercicio4.php" method="post">
  <fieldset>
    <legend>Cadastro de Consultas</legend>

    <label for="paciente-nome" class="alinha">Nome do paciente:</label>
    <input type="text" name="paciente-nome" placeholder="Insira o nome do paciente" required> <br>

    <label for="paciente-crm" class="alinha">CRM do médico que o atendeu: </label>
    <input type="text" name="paciente-crm" placeholder="Insira o CRM do médico que atendeu o paciente" required> <br>

    <label for="paciente-data" class="alinha">Data da internação:</label>
    <input type="date" name="paciente-data" required> <br>

    <button form="pacientes" type="submit" name="cadastrar-paciente">Cadastrar Paciente</button>

  </fieldset>
</form>

<form id="busca" action="exercicio4.php" method="post">
  <fieldset>
    
    <legend>Filtros de Busca</legend>

    <label for="busca-medico" class="alinha">Nome do médico (opcional)):</label>
    <input type="text" name="busca-medico" placeholder="Opcional"> <br>

    <label for="busca-data" class="alinha">Data para busca (opcional):</label>
    <input type="date" name="busca-data"> <br>

    <button form="busca" type="submit" name="busca-crm">Ver Consultas Cadastradas</button>

  </fieldset>
</form>

<form action="exercicio4.php" method="get">
  <fieldset>
    <button type="submit">Recarregar</button>
  </fieldset> 
</form>

</body> 
</html> 

<?php


    $servidor = "localhost"; //ou 127.0.0.1
    $usuario  = "root";
    $senha    = "";

    $conexao = new mysqli($servidor, $usuario, $senha);


    $nomeDoBanco  = "CTDS_clinica";
    $tabelaPacientes = "pacientes";
    $tabelaMedicos = "medicos";


    $sql = "CREATE DATABASE IF NOT EXISTS $nomeDoBanco";
    $conexao->query($sql) or exit($conexao->error);


    $conexao->select_db($nomeDoBanco) or exit($conexao->error);

    $sql = "CREATE TABLE IF NOT EXISTS $tabelaMedicos(
      crm VARCHAR(50) NOT NULL UNIQUE PRIMARY KEY,    
      nome VARCHAR(150) NOT NULL
      )
      ENGINE=innoDB";

    $conexao->query($sql) or exit($conexao->error);


    $sql = "CREATE TABLE IF NOT EXISTS $tabelaPacientes(
          id INT NOT NULL UNIQUE AUTO_INCREMENT,    
          nome VARCHAR(150) NOT NULL,
          crm_medico VARCHAR(50) NOT NULL,
          data_consulta DATE,
          PRIMARY KEY (id),
          FOREIGN KEY (crm_medico) REFERENCES $tabelaMedicos (crm)
          )
          ENGINE=innoDB";

    $conexao->query($sql) or exit($conexao->error);

    if (isset($_POST['cadastrar-paciente'])) {
      $nome = $conexao->escape_string(trim($_POST['paciente-nome']));
      $crm_medico = $conexao->escape_string(trim($_POST['paciente-crm']));
      $data_consulta = $conexao->escape_string(trim($_POST['paciente-data']));

      $sql = "INSERT INTO $tabelaPacientes VALUES (null, '$nome', '$crm_medico', '$data_consulta')";
      
      $resposta = $conexao->query($sql) or exit($conexao->error);

      echo "<p>Paciente cadastrado com sucesso!</p>";
    }

    else if (isset($_POST['cadastrar-medico'])) {$crm = $conexao->escape_string(trim($_POST['medico-crm']));$nome = $conexao->escape_string(trim($_POST['medico-nome']));$sql = "INSERT INTO $tabelaMedicos (crm, nome) VALUES ('$crm', '$nome')";$resposta = $conexao->query($sql) or exit($conexao->error);

      echo "<p>Médico cadastrado com sucesso!</p>";
    }

    else if (isset($_POST['busca-crm'])) {
      function criarQuery($request, $tabelaMedicos, $tabelaPacientes) {
          $where = "";
          $texto = "";
      
          if (!empty($request['busca-medico'])) {
              $nomeMedico = $request['busca-medico'];
              $where .= "WHERE $tabelaMedicos.nome = '$nomeMedico'";
              $texto .= "<br>Pelo médico: $nomeMedico";
          }
          
          if (!empty($request['busca-data'])) {
              $data = $request['busca-data'];
              $where .= " AND $tabelaPacientes.data_consulta >= '$data' ";
              $dataFormatada = new Datetime($data);
              $dataFormatada = $dataFormatada->format('d/m/y');
              $texto .= "<br>Após a data: $dataFormatada";
          }
      
          $sql = "SELECT id, $tabelaPacientes.nome as Paciente, $tabelaMedicos.nome as Medico, data_consulta 
                      FROM $tabelaPacientes 
                      JOIN $tabelaMedicos 
                      ON $tabelaPacientes.crm_medico = $tabelaMedicos.crm 
                      $where 
                      ORDER BY id";
          
          return $sql;
      }


      function medicoExiste($nomeDoMedico, $conexaoMySql, $nomeDaTabela) {
          $sql = "SELECT * FROM $nomeDaTabela WHERE nome = '$nomeDoMedico'";
          $resposta = $conexaoMySql->query($sql) or die($conexaoMySql->error);
          $registros = $conexaoMySql->affected_rows;
          if ($registros > 0) {
              return true;
          }
          return false;
      }

      function tabularResultados($data) {
          echo "<table>
          <tr>
              <th>Id</th>
              <th>Nome do Paciente</th>
              <th>Nome do Médico</th>
              <th>Data da Consulta</th>
          </tr>";

          while($registro = $data->fetch_array(MYSQLI_ASSOC)) { 
              echo "<tr>";
              foreach ($registro as $dado) {
                  $dadoValidado = htmlentities($dado, ENT_QUOTES);
                  echo "<td>$dadoValidado</td>";
              }
              echo "</tr>";
          }

          echo "</table>";  
      }

      if (isset($_POST['busca-medico'])) {
          
          if (!medicoExiste($_POST['busca-medico'], $conexao, $tabelaMedicos)) {
              exit("<p>Médico não cadastrado em nosso sistema</p>");
          }

      }

      $sql = criarQuery($_POST, $tabelaMedicos, $tabelaPacientes);

      $resultado = $conexao->query($sql) or exit($conexao->error);

      $registros = $conexao->affected_rows;
      
      echo "<p>Consultas Realizadas na Clínica <br>Total = $registros consultas</p>";

      if($registros > 0) {
          tabularResultados($resultado);    
      }
    }

    $conexao->close();

?>