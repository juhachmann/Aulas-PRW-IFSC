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

        // Chaves esperadas [compra: number, idade: int, fidelidade: null ???]

        DEFINE (
            'PERC_DESCONTO',  
                [   1 => 0.00,
                    2 => 0.05,
                    3 => 0.07, 
                ]
            ); //Aqui era pra ser um enum!

        DEFINE ('DESC_FIDELIDADE', 0.05);
        

        // Testando usar variável de variável
        foreach ($_POST as $key => $value) {
            $var = $key;
            $$var = $value;
        }


        // Validação simples dos dados esperados
        $checkVar = [$compra, $idade]; 
        foreach ($checkVar as $var) {
            if ( ! isset($var) ) {
                exit("Ocorreu um erro, pois você não definiu o/a $var.<br>Retorne à página anterior e tente novamente.");
            }    
        }

        // Precisaria ainda validar se o valor da idade corresponde às chaves que foram colocadas ali no vetor PERC_DESCONTO
     
        $descontoIdade = $compra * PERC_DESCONTO[$idade];
        $valorFinal = $compra - $descontoIdade;
        echo "
            <p>Valor da compra: $compra</p>
            <p>Desconto para sua Faixa Etária: R$ $descontoIdade </p>
        ";
        
        if (isset($fidelidade)) {
            $descFid = $compra * DESC_FIDELIDADE;
            $valorFinal -= $descFid;
            echo "<p>Desconto para Cartão Fidelidade: R$ $descFid </p>";
        }

        echo "<p>Valor Final da Compra: R$ $valorFinal</p>";

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