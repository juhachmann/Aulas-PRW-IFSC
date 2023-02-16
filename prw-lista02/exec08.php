<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Compras na Farmácia</title>
</head>
<body>
    <h1>Minhas compras na farmácia</h1>

    <?php

        DEFINE("DESCONTO", 0.05);

        //print_r($_POST); // Para mostrar na tela o que está pegando de dados

        /* 
        Array ( 
            [itens] => Array ( 
                [paracetamol] => 5 
                [rivotril] => 50 
                [engov] => 10 ) 
            [cliente] => Array ( 
                [0] => idadeOn 
                [1] => fidelidadeON ) 
            )
        */
        echo "<table>
                <tr>
                    <th>Itens</th>
                    <th>Valor</th>
                </tr>";

        foreach ($_POST['itens'] as $item => $preco) {
            echo "<tr>
                    <td>$item</td>
                    <td>R$ " . number_format($preco, 2, ",", "") . "</td>
                  </tr>";
        }

        $valorFinal = array_sum($_POST['itens']);

        if (array_key_exists('desconto', $_POST)) {
            echo "<tr>
                    <td>- Desc. 5%</td>
                    <td>R$ " . number_format($valorFinal * DESCONTO, 2, ",", "") . "</td>
                  </tr>";
            $valorFinal -= $valorFinal * DESCONTO;
        }

        echo "<tr>
                <td class='bold'>Valor Final</td>
                <td>R$ " . number_format($valorFinal, 2, ",", "") . "</td>
              </tr>
            </table>";

    ?>

<!--
    <form action="exec06.php" method="post">
        <fieldset>
            <legend>Selecione os itens da farmácia:</legend>
            <input type="checkbox" name="itens[paracetamol]" value="5"><label> Paracetamol (R$ 5,00)</label><br>
            <input type="checkbox" name="itens[rivotril]" value="50"><label> Rivotril (R$ 50,00)</label><br>
            <input type="checkbox" name="itens[engov]" value="10"><label> Engov (R$ 10,00)</label><br>
        </fieldset>
        <fieldset>
            <legend>Dados do cliente</legend>
            <input type="checkbox" name="cliente[]" value="idadeOn"><label> Cliente possui mais de 60 anos</label><br>
            <input type="checkbox" name="cliente[]" value="fidelidadeON"><label> Cliente possui Cartão Fidelidade</label><br>
        </fieldset>
        <button type="submit">Enviar!</button>        
    </form> -->
</body>
</html>