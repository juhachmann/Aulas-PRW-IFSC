<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        table {
            border-collapse: collapse;
        } 
        
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>

    <title>Notas e vetores</title>
</head>
<body>
    <h1>Notas da turma</h1>
    <form action="exec01.php" method="post">
        <fieldset>
            <legend>Insira os dados dos/as estudantes:</legend>

            <?php

                for ($i = 1; $i < 4; $i++) {
                    echo "
                    
                        <label>Nome ($i):</label>
                        <input type='text' name='est".$i."[nome]' placeholder='Nome do/a estudante' autofocus><br>
                        <label>Nota:</label>
                        <input type='number' name='est".$i."[nota]' min='0' max='10' step='0.5'><br><br>

                    ";

                }

            ?>

           
            <button type="submit">Enviar!</button>
        </fieldset>
    </form>
</body>
</html>