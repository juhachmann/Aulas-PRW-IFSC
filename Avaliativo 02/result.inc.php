<?php

    function avg(array $array) : float {
        return array_sum($array) / count($array);
    }

    function tratar(string $string) : string {
        $treated = trim($string);
        $treated = str_ireplace('  ', '', $treated);
        $treated = htmlspecialchars($treated);
        return $treated;
    }
    // o echo, por algum motivo, imprime na tela tirando os espaços extra, mas na variável continuava
    // com o str_replace() dá de tirar!
    // o echo tbm imprime convertendo caracteres especiais de volta para símbolos html
    // mas no banco vai ficar salvo do jeito mais seguro

    DEFINE ('FABRICANTE_PESQUISA', 'Fiat');
    
    DEFINE ('REGEX_FILTERS', [ // Bruxarias (não entendi o .)
        'chassi' => " /^([a-zA-Z0-9]{5,}).*/ ",
        'fabricante' => ' /^([a-zA-Z]{3,}).*/ ',
    ]);

    $errorMsg = "<div class='error-msg'>
                    <p>Há um erro no seguinte campo da sua requisição:</p>
                    <p>%MOTIVO%</p>
                    <p>Volte à página anterior e preencha corretamente o formulário.</p>
                </div>";


    // a) Registrando os dados do veículo em matriz usando o chassi como índice associativo
    // Vamos validar e guardar dentro do mesmo loop
    $cars = [];
    $i = 0;

    foreach ($_POST as $car) {
        $i++;

        // Validando
        $chassi = tratar($car['chassi']);
        if ( ! filter_var ( $chassi, FILTER_VALIDATE_REGEXP, array(
            'options' => array(
                    'regexp' => REGEX_FILTERS['chassi']
        )) ) ) {
            exit( str_replace('%MOTIVO%', "formulário n# $i, campo: Chassi", $errorMsg) ); // error
        }

        $fabricante = ucwords(tratar($car['fabricante']));
        if ( ! filter_var ( $fabricante, FILTER_VALIDATE_REGEXP, array(
            'options' => array(
                'regexp' => REGEX_FILTERS['fabricante'] )) )) {
            exit ( str_replace('%MOTIVO%', "formulário n# $i, campo: fabricante", $errorMsg) ); // error
        }

        $preco = tratar($car['preco']);
        if ( ! filter_var($preco, FILTER_VALIDATE_FLOAT) || $preco < 0) {
            if ($preco != 0) {
                exit ( str_replace('%MOTIVO%', "formulário n# $i, campo: preço", $errorMsg) ); // error
        }}


        // Guardando na matriz os que chegarem aqui
        $cars[$chassi] = [
            'fabricante' => $fabricante,
            'preco' => $preco
        ];
    }

    // b) Verificando quantos carros da Marca Fiat estão cadastrados na matriz
    // Usando métodos de arrays:
    // array_columns()
    // array_count_values()
    $arrayFabricantes = array_column($cars, 'fabricante');
    $searchValue = ucwords(FABRICANTE_PESQUISA);
    $searchCount = 0;

    if (in_array($searchValue, $arrayFabricantes)) {
        $searchCount = array_count_values($arrayFabricantes)[$searchValue]; // solução retirada do manual do PHP!! 
    }


    // c) Calculando o preço médio de venda 
    $mediaPrecos = avg(array_column($cars, 'preco'));


    // SAÍDAS

    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Veículos cadastrados com sucesso!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'> <span class='hide-this'> Botão de fechar </span> </button>
            </div>";

    // Carros Cadastrados em formato tabular
    echo "<div class='table-responsive-sm'>
            <table class='table table-hover car-table'>
                <thead>
                    <tr class='column-title'>
                        <th>#</th>
                        <th>Chassi</th>
                        <th>Fabricante</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody class='table-group-divider'>";
    
    $i = 0;
    foreach ($cars as $chassi => $dados) {
        $i++;
        echo "<tr>
                <td scope='row'>$i</td>
                <td>$chassi</td>
                <td>" . $dados['fabricante'] . "</td>
                <td>R$ " . number_format($dados['preco'], "2", ",", "") . "</td>
            </tr>";
    }

    echo "</tbody>
            <tfoot class='table-group-divider'>
                <tr>
                    <td colspan = '3'>Média de preço: </td>
                    <td>R$ " . number_format($mediaPrecos, "2", ",", "") . "</td>
                </tr>
            </tfoot>
            </table>
            </div>";
    
    // Saída Pesquisa
    echo "<table class='table result-table'>
            <tr>
                <td colspan='4'>Total de carros da marca $searchValue cadastrados: $searchCount</td>
            </tr>
        </table>";

