<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formata-blog.css">
    <title>Meu blog</title>
</head>
<body>
    
    <h1>Meu blog</h1>

    <form action="blog.php" method="post">
        <fieldset>
            <legend>Comentário</legend>

            <label for="nome" class="alinha">Nome: </label>
            <input type="text" name="nome" id="nome" placeholder="Seu nome" autofocus required><br>

            <label for="comentario" class="alinha">Comentário:</label>
            <textarea name="comentario" id="comentario" cols="30" rows="10" required placeholder="Digite aqui seu comentário"></textarea><br>

            <button name="comentar" type="submit">Enviar</button>
        </fieldset>
    </form>


    <?php

        date_default_timezone_set("America/Sao_Paulo");
        $arquivo = "blog.txt";

        if(isset($_POST['comentar'])) {

            $visitante = trim($_POST['nome']);
            $comentario = trim($_POST['comentario']);
            $data = date("d/m/Y  H:i:s");           

            $texto = "<p>Autor: $visitante<br>Comentário: $comentario<br>Hora: $data</p>" . PHP_EOL;

            file_put_contents($arquivo, $texto, FILE_APPEND|LOCK_EX);

            echo "<p>Comentário enviado!</p>";

        }

        if(!file_exists($arquivo)) {
            echo "<p>Erro na leitura dos arquivos</p>";
        }
        else {
            $comentarios = file($arquivo);
            $comentarios = array_reverse($comentarios);
            //var_dump($comentarios);
            foreach($comentarios as $comentario) {
                //$comentario = htmlentities($comentario, ENT_QUOTES); // Aqui tem um problema...
                echo $comentario;
            }
        }

    ?>

</body>
</html>