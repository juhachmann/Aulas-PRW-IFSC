<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Meu carrinho de supermercado</title>
</head>
<body>
  <h1>Calcular minhas compras no supermercado</h1>


  <?php
   $mercadorias = [];
   foreach ($_POST as $i => $value) {
    $mercadorias[$i] = $value;
   }
   //echo print_r($mercadorias);
   echo "<p>Seu carrinho de compras:</p>
         <table>
           <tr>
            <th>Item</th>
            <th>Valor</th>
           </tr>";
   foreach ($mercadorias as $i => $value) {
    echo "<tr>
           <td>$i</td>
           <td>$value</td>
          </tr>";
   }
   echo " <tr>
           <td>Valor Total:</td>
           <td>" . array_sum($mercadorias) .  "</td>
          </tr>
         </table>";

  ?>

<!--
  <form action="exec4.php" method="post">
   <fieldset>
    <legend>Selecione os itens de seu carrinho de compras:</legend>
    <input type="checkbox" name="banana" value="1"><label> Banana (R$ 1,00)</label><br>
    <input type="checkbox" name="laranja" value="2"><label> Laranja (R$ 2,00)</label><br>
    <input type="checkbox" name="maca" value="3"><label> Maçã (R$ 3,00)</label><br>
    <button type="submit">Enviar!</button>
   </fieldset>
  </form> -->
</body>
</html>