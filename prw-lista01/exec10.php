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

    <div class="container-geral">
        <div class="container-title">
            <h1>Calcule seus descontos na Farmácia</h1>
        </div>
        
        <div class="container-body">

       
            <div class="content">


                <?php

                    DEFINE (
                        'DESC_IDADE',  
                            [   0 => 0.00,
                                1 => 0.05,
                                2 => 0.07, 
                            ]
                        ); 
                    //Mostrando o índice numérico apenas para legibilidade


                    DEFINE ('DESC_FIDELIDADE', 
                            [
                                0 => 0.00,
                                1 => 0.05
                            ]
                        );
                    

                    $fidelidade = 0;


                    // Testando usar variável de variável
                    foreach ($_POST as $key => $value) {
                        $var = $key;
                        $$var = $value;
                    }


                    // Validações e tratamento de erros simples

                    // para compra
                    // (HTML já está checando)
                    if ( empty($compra) || $compra < 0.01) {
                        exit("Ocorreu um erro, pois o valor da compra está incorreto ou indefinido.<br>Retorne à página anterior e tente novamente.");
                    }    
                    
                    // para idade 
                    if ( ! array_key_exists ($idade, DESC_IDADE)) {
                        exit("Ocorreu um erro com a idade informada.<br>Retorne à página anterior e tente novamente.");
                    }

                    // para fidelidade
                    if ( ! array_key_exists ($fidelidade, DESC_FIDELIDADE)) {
                        exit("Ocorreu um erro com o valor do Desconto Fidelidade.<br>Retorne à página anterior e tente novamente.");
                    }


                    $descIdade = $compra * DESC_IDADE[$idade];
                    $descFid = $compra * DESC_FIDELIDADE[$fidelidade];


                    $relatorioFinal = [
                        "compra" => [
                            "texto" => "Valor da compra",
                            "param" => "",
                            "valor" => $compra,
                        ],
                        "descIdade" => [
                            "texto" => "- Desconto Faixa Etária",
                            "param" => " (". (DESC_IDADE[$idade] * 100) . "%)",
                            "valor" => $descIdade,
                        ],
                        "descFid" => [
                            "texto" => "- Desconto Fidelidade",
                            "param" => " (". (DESC_FIDELIDADE[$fidelidade] * 100) . "%)",
                            "valor" => $descFid,
                        ],
                        "valorFinal" => [
                            "texto" => "Valor Final da Compra",
                            "param" => "",
                            "valor" => $compra - $descIdade - $descFid,
                        ],
                    ];

                
                    // Saída de Dados em formato tabular
                    echo "<table>
                            <tr>
                                <th colspan='2'>Sua compra</th>
                            </tr>";
                    foreach ($relatorioFinal as $dados) {
                        echo "<tr>
                                <td>". $dados['texto'] . $dados['param'] ."</td>
                                <td>R$ " . number_format($dados['valor'], "2", ",", "") . "</td>
                            </tr>";
                    }
                    echo "</table>";
                

                    /*
                    // Primeira versão 
                    // mais 'direta', mas com repetições
                    // Não pede validação de 'idade' pq o HTML já valida

                    DEFINE ('DESC_IDADE_1', 0.05);
                    DEFINE ('DESC_IDADE_2', 0.07);
                    DEFINE ('DESC_FID', 0.05);

                    $valorCompra = $_POST['compra'];
                    $faixaEtaria = $_POST['idade'];
                    $valorFinal = $valorCompra;

                    if (empty($valorCompra) || $valorCompra < 0.01) {
                        exit('O valor da compra não pode ser nulo. <br>Volte à página anterior e preencha o valor da compra.');
                    }
                    
                    echo "<p><span class='bold'>Sua Compra</span></p>
                        <p>Valor da Compra: R$ " . number_format($valorCompra, "2", ",", "") . "</p>";

                    if ($faixaEtaria == 1) {
                        $descIdade = $valorCompra * DESC_IDADE_1;
                        $valorFinal -= $descIdade;
                        echo "<p>- Desconto Faixa Etária (" . DESC_IDADE_1 * 100 . "%): R$ " . number_format($descIdade, "2", ",", "") . "</p>";
                    }
                    elseif ($faixaEtaria == 2) {
                        $descIdade = $valorCompra * DESC_IDADE_2;
                        $valorFinal -= $descIdade;
                        echo "<p>- Desconto Faixa Etária (" . DESC_IDADE_2 * 100 . "%): R$ " . number_format($descIdade, "2", ",", "") . "</p>";
                    }

                    if ( isset ( $_POST['fidelidade'] ) ) {
                        $descFidelidade = $valorCompra * DESC_FID;
                        echo "<p>- Desconto Cartão Fidelidade (" . DESC_FID * 100 . "%): R$ " . number_format($descFidelidade, "2", ",", "") . "</p>";
                        $valorFinal -= $descFidelidade;
                    }

                    echo "<p>Valor Final da Compra: R$ ". number_format($valorFinal, "2", ",", "") . "</p>";
                    */

                    ?>

                <div class="button">
                    <form action="exec10.html" method="get" id="voltar">
                        <button type="submit">Calcular Nova Compra</button>
                    </form>
                </div>          
                
            </div>
        </div>
    </div>   

</body>
</html>