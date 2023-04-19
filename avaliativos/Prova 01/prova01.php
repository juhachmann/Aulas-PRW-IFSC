<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="style.css">
    
    <title>Livraria - Cadastro de Livros</title>
</head>
<body>

    <!-- Navbar do Bootstrap -->
    <nav class="navbar navbar-dark navbar-expand-md">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="prova01.html">
                <img class="logo" src="" alt="Logo da Livraria">
            </a>
        
            <!-- Botão que só aparece quando colapsa -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">Menu</span>
            </button>

            <!-- Tudo dentro dessa DIV colapsa quando atinge a view-port determinada-->
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="prova01.html">Cadastrar Livros</a>
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
        <h1> Cadastro de Livros </h1>
    </div>


    <div class="container col-md-8 mx-auto" id="main">
        
        <?php

            $errorMsg = "<p class='error-msg'>Ops, algo deu errado, você não preencheu o valor %VALOR% corretamente! Volte e tente novamente!</p>";

            $livros = [];
            $precos = []; // pegar junto o isbn do livro!
            
            // Dados que espero para cada livro: isbn, autor, preco
            // Validar e adicionar na matriz!

            $livrosDoMachado = 0;

            foreach($_POST as $livro) {
                foreach ($livro as $key => $dados) {
                    if (empty($dados)) {
                        exit (str_replace('%VALOR%', $key, $errorMsg));
                    }
                }
                $livros[trim($livro['isbn'])] = [
                    'autor' => ucwords(strtolower(trim($livro['autor']))),
                    'preco' => $livro['preco']
                ];
                $precos[$livro['isbn']] = $livro['preco'];
                if (strtolower($livro['autor']) == "machado de assis") {
                    $livrosDoMachado++;
                }
            } 
                      
            $maxPreco = max($precos);
            $keyMaisCaro = array_keys($precos, $maxPreco);
            $key = $keyMaisCaro[0];

            // Exibir os dados (copiei tabela da atividade avaliativa)
            // Livros Cadastrados em formato tabular
            echo "<div class='col-md-9 mx-auto table-responsive'>
            <table class='table table-hover books-table'>
                <thead>
                    <tr class='column-title'>
                        <th>#</th>
                        <th>ISBN</th>
                        <th>Autor</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody class='table-group-divider'>";
                
                $i = 0;
                foreach ($livros as $isbn => $dados) {
                    $i++;
                    echo "<tr>
                            <td scope='row'>$i</td>
                            <td>$isbn</td>
                            <td>" . $dados['autor'] . "</td>
                            <td>R$ " . number_format($dados['preco'], "2", ",", ".") . "</td>
                        </tr>";
                }

                echo "</tbody>
                        <tfoot class='table-group-divider'>
                            <tr>
                                <td colspan = '4'>Livro mais caro cadastrado: R$ " . number_format($maxPreco, 2, ",", "") . "</td>
                            </tr> 
                        </tfoot>
                        </table>";

            echo "<table class='table result-table'> <tr> <td> Livros de autoria de Machado de Assis: {$livrosDoMachado} </td> </tr> </table>"; 
        ?>

    </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>
</html>
