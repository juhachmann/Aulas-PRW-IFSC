<?php

    function pprint($array) {
        return print("<pre>".print_r($array,true)."</pre>");
    }

    /* 
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> 
    Isto retorna o formulário para a mesma página... Mas eu imagino que vai perder o que já foi enviado antes...
    */ 


    $db = [];

    //pprint($_POST);



    //print_r($_POST);

    /*
    Array
    (
        [meds] => Array
            (
                [med1] => Array
                    (
                        [0] => 001
                        [1] => Paracet
                        [2] => 10
                    )

                [med2] => Array
                    (
                        [0] => 002
                        [1] => Mefen
                        [2] => 20
                    )

                [med3] => Array
                    (
                        [0] => 003
                        [1] => Rivot
                        [2] => 50
                    )

            )

        [pesquisa] => 
    )
    */

    // A) Estrutura de matriz com o código como íncide associativo
    foreach ($_POST['meds'] as $meds) {
        $db[$meds[0]] = [
            'name' => $meds[1],
            'price' => $meds[2]
        ];
    }
    /* 
    Array
    (
        [001] => Array
            (
                [name] => Paracet
                [price] => 10
            )

        [002] => Array
            (
                [name] => Mefen
                [price] => 20
            )

        [003] => Array
            (
                [name] => Rivot
                [price] => 50
            )

    )
    */


    //pprint($db);

    $pesquisa = $_POST['pesquisa'];
    //$pesquisa = 'Rivot';


    // B) Dados de todos os medicamentos

    echo "<table>
            <tr>
                <th colspan='3'>Tabela de Medicamentos</th>
            </tr>
            <tr>
                <th>Cód.</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>";
    foreach ($db as $cod => $dados) {
        echo "<tr>
                <td>$cod</td>
                <td>". $dados['name'] . "</td>
                <td>R$ " . number_format($dados['price'], 2, ",", "") . "</td>
             </tr>";
//        foreach ($dados as $dado) {
//            echo "<td>$dado</td>";
//        }
        echo "</tr>";
    }
    echo "</table>";



    // C) Medicamento mais barato
    $dbPrice = [];
    foreach ($db as $med => $dados) {
        $dbPrice[$med] = $dados['price'];
    }

    //pprint($dbPrice);

    $menorPreco = min($dbPrice);
    $codMenorPreco = array_keys($dbPrice, $menorPreco);
    //pprint($codMenorPreco);

    echo "<p>Medicamento(s) de menor preço: ";
    foreach ($codMenorPreco as $key => $cod) { // [0] => cod.
        echo $db[$cod]['name'];
        if ($key !== array_key_last($codMenorPreco)) { 
            echo ", ";
        } 
    }
    echo "</p>";


    // D) Retorno da pesquisa:
    $dbNames = [];
    foreach ($db as $med => $dados) {
        $dbNames[$med] = $dados['name'];
    }

    //pprint($dbNames);

    
    if (!empty($pesquisa)) {
        echo "<p>Medicamento pesquisado: $pesquisa</p>";
        $codPesquisa = array_keys($dbNames, $pesquisa);
        if (empty($codPesquisa)) {
            echo "<p>Não foi encontrado nenhum medicamento com este nome.</p>";
        }
        else {
            echo "<table>
            <tr>
                <th>Cód.</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>";
            foreach ($codPesquisa as $cod) {
                echo "<tr>
                        <td>$cod</td>
                        <td>". $db[$cod]['name'] ."</td>
                        <td>R$ ". number_format($db[$cod]['price'], 2, ",", "") ."</td>
                     </tr>";
            }
            echo "</table>";
        }
    }
    else {
        echo "Você não fez nenhuma pesquisa";
    }

    asort($dbNames);
    echo "<table>
            <tr>
                <th colspan='3'>Medicamentos por Ordem Alfabética</th>
            </tr>
            <tr>
                <th>Cód.</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>";
    foreach ($dbNames as $cod => $name) {
        echo "<tr>
                <td>$cod</td>
                <td>". $db[$cod]['name'] ."</td>
                <td>R$ ". number_format($db[$cod]['price'], 2, ",", "") ."</td>
             </tr>";
    }
    echo "</table>";

/* 

*/

?>

