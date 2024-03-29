<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="style.css">
    
    <title>Concessionária - Cadastro de Veículos</title>
</head>
<body>

    <!-- Navbar do Bootstrap -->
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="avaliativo02.html">
                <img src="logo-small.png" alt="Logo da Concessionária">
            </a>
        
            <!-- Botão que só aparece quando colapsa -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">Menu</span>
            </button>

            <!-- Tudo dentro dessa DIV colapsa quando atinge a view-port determinada-->
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="avaliativo02.html">Cadastrar Veículos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Cadastrar Vendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Relatórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid page-title">
        <h1> Cadastro de Veículos </h1>
    </div>


    <div class="container col-md-8 mx-auto" id="main">


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

            $errorMsg = "<div class='col-md-9 error-msg'>
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
                $chassi = strtoupper(str_replace(' ', '', tratar($car['chassi'])));
                if ( ! filter_var ( $chassi, FILTER_VALIDATE_REGEXP, array(
                    'options' => array(
                            'regexp' => REGEX_FILTERS['chassi']
                )) ) ) {
                    exit( str_replace('%MOTIVO%', "Formulário nº #$i, campo: Chassi", $errorMsg) ); // error
                }

                $fabricante = ucwords(strtolower(tratar($car['fabricante'])));
                if ( ! filter_var ( $fabricante, FILTER_VALIDATE_REGEXP, array(
                    'options' => array(
                        'regexp' => REGEX_FILTERS['fabricante'] )) )) {
                    exit ( str_replace('%MOTIVO%', "Formulário nº #$i, campo: Fabricante", $errorMsg) ); // error
                }

                $preco = tratar($car['preco']);
                if ( ! filter_var($preco, FILTER_VALIDATE_FLOAT) || $preco < 0) {
                    if ($preco != 0) {
                        exit ( str_replace('%MOTIVO%', "Formulário nº #$i, campo: Preço", $errorMsg) ); // error
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

            if (in_array($searchValue, $arrayFabricantes)) {
                $searchCount = array_count_values($arrayFabricantes)[$searchValue]; // solução retirada do manual do PHP!! 
            } else $searchCount = 0;


            // c) Calculando o preço médio de venda 
            $mediaPrecos = avg(array_column($cars, 'preco'));


            // SAÍDAS

            echo "<div class='col-md-9 alert alert-success alert-dismissible fade show' role='alert'>
                    Veículos cadastrados com sucesso!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'> <span class='hide-this'> Botão de fechar </span> </button>
                    </div>";

            // Carros Cadastrados em formato tabular
            echo "<div class='col-md-9 mx-auto table-responsive'>
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
                        <td>R$ " . number_format($dados['preco'], "2", ",", ".") . "</td>
                    </tr>";
            }

            echo "</tbody>
                    <tfoot class='table-group-divider'>
                        <tr>
                            <td colspan = '4'>Média de preços cadastrados: R$ " . number_format($mediaPrecos, "2", ",", ".") . "</td>
                        </tr>
                    </tfoot>
                    </table>";
            
            // Saída Pesquisa
            echo "<table class='table result-table'>
                    <tr>
                        <td colspan='4'>Total de carros da marca $searchValue cadastrados: $searchCount</td>
                    </tr>
                </table>
               </div>";


        ?>


        <form action="avaliativo02.html" method="get">
            <button class="btn btn-outline-secondary" type="submit">Novo Cadastro</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>