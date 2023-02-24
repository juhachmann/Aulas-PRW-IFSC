<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista 4 -Exercício 1</title>
</head>
<body>

    <h1>Calcular Média do Aluno</h1>

    <form action="exerc01.php" method="post">
        <fieldset>
            <legend>Insira os dados do/a estudante</legend>
            <label for="name">Nome: </label>
            <input type="text" name="name" id="name"><br>
            <label for="n1">Nota 1:</label>
            <input type="number" name="n1" id="n1" min="0" max="10" step="0.1" ><br>
            <label for="n2">Nota 2:</label>
            <input type="number" name="n2" id="n2" min="0" max="10" step="0.1" ><br>
            <button type="submit">Enviar!</button>
        </fieldset>
    </form>
    
</body>
</html>