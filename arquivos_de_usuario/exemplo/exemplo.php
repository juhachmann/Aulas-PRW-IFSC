<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulação de Arquivos</title>
</head>
<body>
    
    <h1>Arquivos de usuário em PHP</h1>

    <?php

        // Manipulação de Arquivos de Usuário na máquina servidora
        // Poderia armazenar diretamente em banco de dados

        $jogosDePC = "Tomb Raider 2013" . PHP_EOL;
        // PHP_EOL é uma constante em PHP para indicar "End Of Line" em um arquivo de texto

        $jogosDePC .= "God of War" . PHO_EOL;
        $jogosDePC .= "Dragon Age: Inquisition" . PHO_EOL;
        $jogosDePC .= "Assassin's Creed Black Flag" . PHO_EOL;

        $arquivo = "jogos.ruben";
        // php SEMPRE vai tratar o arquivo como arquivo de texto...

        file_put_contents($arquivo, $jogosDePC, FILE_APPEND|LOCK_EX);
        // Ver o que é isso!

        




        


    ?>

</body>
</html>