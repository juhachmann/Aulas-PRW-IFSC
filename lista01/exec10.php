<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lista1.css">
    <title>Farmácia - Descontos</title>
</head>
<body>

    <div class="container-geral">
        
        <div class="container-title">
            <h1>Calcule descontos do cliente</h1>
        </div>
        
        <div class="container-body">


            <div class="image">
                <img src="pharmacy2.png" alt="PharmaLogo">
            </div>
       

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


                    // Testando usar 'variável de variável'
                    foreach ($_POST as $key => $value) {
                        $var = $key;
                        $$var = $value;
                    }


                    // Validações e tratamento de erros simples

                    $errorMsg = "<div class='msg error-msg'>
                                    <p>Oooops...</p>
                                    <p>%ERROR%!</p>
                                    <p>Retorne à página anterior e tente novamente.</p>
                                </div>";
                    // para compra
                    // (HTML já está checando...)
                    if ( empty($compra) || $compra < 0.01) {
                        exit(str_replace('%ERROR%', 'O valor da compra está incorreto', $errorMsg));
                    }    
                    
                    // para idade (pegando erro na lógica do PHP)
                    if ( ! isset ($idade)) {
                        exit(str_replace('%ERROR%', 'Você não informou a faixa etária do cliente', $errorMsg));
                    }

                    // para fidelidade (pegando erro na lógica do PHP)
                    if ( ! array_key_exists ($fidelidade, DESC_FIDELIDADE)) {
                        exit(str_replace('%ERROR%', 'valor do Desconto Fidelidade está indefinido', $errorMsg));
                    }


                    $descIdade = $compra * DESC_IDADE[$idade];
                    $descFid = $compra * DESC_FIDELIDADE[$fidelidade];


                    $relatorioFinal = [
                        "compra" => [
                            "texto" => "Valor Inicial",
                            "valor" => $compra,
                        ],
                        "descIdade" => [
                            "texto" => "- Desconto Faixa Etária (" . (DESC_IDADE[$idade] * 100) . "%)",
                            "valor" => $descIdade,
                        ],
                        "descFid" => [
                            "texto" => "- Desconto Fidelidade (". (DESC_FIDELIDADE[$fidelidade] * 100) . "%)",
                            "valor" => $descFid,
                        ],
                        "valorFinal" => [
                            "texto" => "Valor Final da Compra",
                            "valor" => $compra - $descIdade - $descFid,
                        ],
                    ];

                
                    // Saída de Dados em formato tabular
                    echo "<table>
                            <tr>
                                <th colspan='2'>Descontos da Compra</th>
                            </tr>";
                    foreach ($relatorioFinal as $dados) {
                        if ($dados == end($relatorioFinal)) {
                            echo "<tfoot>";
                        }
                        echo "<tr>
                                <td>". $dados['texto'] ."</td>
                                <td>R$ " . number_format($dados['valor'], "2", ",", "") . "</td>
                            </tr>";
                    }
                    echo "</tfoot>
                         </table>";
                


                    /*
                    // Primeira versão 
                    // mais 'direta', mas com repetições
                    // Fui tentando deixar mais automatizada depois...
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
                    <form action="exec10.html" method="get">
                        <button type="submit">Calcular Nova Compra</button>
                    </form>
                </div>          
                
            </div>

        </div>

    </div>   

</body>
</html>