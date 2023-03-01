<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lista1.css">
    <title>Farmácia</title>
</head>
<body>
    <h1>Calcular meus descontos na Farmácia</h1>

    <?php

        DEFINE (
            'PERC_DESCONTO',  
                [   1 => 0.00,
                    2 => 0.05,
                    3 => 0.07, 
                ]
            );

        DEFINE ('DESC_FIDELIDADE', 0.05);
        
        foreach ($_POST as $key => $value) {
            $var = $key;
            $$var = $value;
        }

        if ( ! isset($idade) ) {
            exit("Ocorreu um erro, pois você não definiu a idade.<br>Retorne à página anterior e tente novamente.");
        }       

        echo PERC_DESCONTO[$idade];

        /*
        else {
            $valorCompra = $_POST["compra"];
            $descIdade = $descFidelidade = 0;
            $idade = $_POST["idade"];

            echo "<p>Valor da Compra: R$ $valorCompra</p>";

            // aqui dá de usar um switch case
            if ($idade == 2) {
                $descIdade = $valorCompra * 0.05;
                echo "<p>- Desconto para faixa etária entre 55 e 70 anos: R$ $descIdade";
            }
            elseif ($idade == 3) {
                $descIdade = $valorCompra * 0.07;
                echo "<p>- Desconto para faixa etária acima de 70 anos: R$ $descIdade";
            }
            
            if (array_key_exists("fidelidade", $_POST)) {
                $descFidelidade = $valorCompra * 0.05;
                echo "<p>- Desconto para pagamento com Cartão Fidelidade: $descFidelidade</p>";
            }

            echo "<p>VALOR FINAL DA COMPRA: R$ " . ($valorCompra - $descIdade - $descFidelidade) . "</p>";
        }
        */

    ?>

</body>
</html>