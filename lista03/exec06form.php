<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista 3 - Atividade 6</title>
</head>
<body>
    <h1>Catálogo da Farmácia</h1>
    <form action="exec06.php" method="post">

        <?php
            for ($i = 1; $i < 4; $i++) {
                echo "<fieldset>
                        <legend>Medicamento $i:</legend>
                        <label for='cod$i'>Código do medicamento:</label>
                        <input type='text' name='meds[med$i][]' id='cod$i' required placeholder='Código Único do Medicamento'><br>
                        <label for='nome$i'>Nome do medicamento:</label>
                        <input type='text' name='meds[med$i][]' id='nome$i' required placeholder='Nome do Medicamento'><br>
                        <label for='preco$i'>Preço de venda</label>
                        <input type='number' name='meds[med$i][]' id='preco$i' min='0' step='0.01' required placeholder='R$'><br>
                    </fieldset>";
            }
        ?>

        <fieldset>
            <legend>Pesquisar Medicamento:</legend>
            <label for="pesquisa">Nome do medicamento:</label>
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Nome do medicamento a pesquisar">
        </fieldset>

        <button type="submit">Enviar!</button>

    </form>
</body>
</html>