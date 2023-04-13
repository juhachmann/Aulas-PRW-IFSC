<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Comparando Idades</title>
</head>
<body>
 <h1>Comparando Idades</h1>
 
 <?php

  // Como melhorar esta estrutura de dados?
  // Tem que ter alguma forma de manipular de outro jeito

  $pessoas = [
   $_POST['nome1'] => $_POST['idade1'], 
   $_POST['nome2'] => $_POST['idade2'],
   $_POST['nome3'] => $_POST['idade3'],
  ];

  function avg($array) {
   return array_sum($array) / count($array);
  }
  
  echo "<p>Média das idades: " . avg($pessoas) . "</p>";

  echo "<table>
         <tr>
          <th>Nome</th>
          <th>Idade</th>
         </tr>";
  foreach ($pessoas as $nome => $idade) {
   echo "<tr>
          <td>$nome</td>
          <td>$idade</td>
         </tr>";
  }
  echo "</table>";

  echo "<p>A(s) pessoa(s): ";
  foreach (array_keys($pessoas, min($pessoas)) as $nome) {
   echo "<br>- $nome";
  }
  echo "<br>possuem a menor idade (" . min($pessoas) . " anos).</p>";

  ksort($pessoas);

  echo "<table>
         <tr>
          <th>Nome</th>
          <th>Idade</th>
         </tr>";
  foreach ($pessoas as $nome => $idade) {
   echo "<tr>
          <td>$nome</td>
          <td>$idade</td>
         </tr>";
  }
  echo "</table>";


 ?>

<!--
  <form action="exec05.php" method="post">
   <fieldset>

    <legend>Insira as idades:</legend>

    <label>Nome: </label>
    <input type="text" name="nome1" placeholder="Digite o nome" autofocus><br>
    <label>Idade:</label>
    <input type="number" name="idade1"><br><br>

    <label>Nome: </label>
    <input type="text" name="nome2" placeholder="Digite o nome"><br>
    <label>Idade:</label>
    <input type="number" name="idade2"><br><br>

    <label>Nome: </label>
    <input type="text" name="nome3" placeholder="Digite o nome"><br>
    <label>Idade:</label>
    <input type="number" name="idade3"><br><br>

    <button type="submit">Enviar!</button>

   </fieldset>
  </form> -->
  


</body>
</html>