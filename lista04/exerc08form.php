<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista 4 - Exercício 8</title>
</head>
<body>
    <h1>Calcular minha média</h1>

    <form action="exerc08.php" method="post">

        <fieldset>
            <legend>Insira as notas e selecione o tipo de média</legend>

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

            <button type="submit">Calcular!</button>

        </fieldset>

    </form>

    
</body>
</html>