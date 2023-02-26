<?php

    include "../includes/lista04.inc.php";

    exit_if_empty($_POST['notas']);
    exit_if_empty($_POST['tipoMedia']);

    if ($_POST['tipoMedia'] == 'arit') {
        echo "<p>A média aritmética das notas é: " . average($_POST['notas']) . "<p>";
    }
    else {
        //...
    }

    




    /*

<label for="name">Nome do/a estudante: </label>
<input type="text" name="name" id="name"><br>

<?php
    for ($i = 1; $i < 4; $i++) {
        echo "<label for='n$i'>Nota $i: </label>
              <input type='number' name='notas[n$i]' id='n$i' min='0' max='10' step='0.5'><br>";
    }
?>

<label for="tipoMedia">Tipo de média a calcular:</label><br>
<input type="radio" name="tipoMedia" id="arit" value="arit" checked> Média Aritmética Simples<br>
<input type="radio" name="tipoMedia" id="pond" value="pond"> Média Ponderada<br>

<label for="ponderada">Se você escolheu Média Ponderada, pode, opcionalmente inserir os pesos das notas:</label><br>

<?php
    for ($i = 1; $i < 4; $i++) {
        echo "<label for='peso$i'>Peso da Nota $i: </label>
            <input type='number' name='pesos[n$i]' id='peso$i' min='0' max='10' step='1'><br>";
    }
?>

*/

?>