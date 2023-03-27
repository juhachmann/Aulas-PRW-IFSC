<!-- Aqui é o index, funcionando como um protótipo de 'template' -->

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
    
    <title>Concessionária</title>
</head>
<body>

    <!-- Navbar do Bootstrap -->
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="index.php">
                <img src="logo-small.png" alt="Logo da Concessionária">
            </a>
        
            <!-- Botão que só aparece quando colapsa -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon hide-this"> Ícone sanduíche </span>
            </button>

            <!-- Tudo dentro dessa DIV colapsa quando atinge a view-port determinada-->
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Cadastrar Veículos</a>
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

            /* Aqui vai carregar o formulário de entrada de dados OU
               a lógica para guardar os dados do formulário
               dependendo do tipo do request. 

                Achei a solução na net. Pesquisar se é seguro!
            */

            if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {
                include 'form.inc.php';
            }
            else if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
                include 'result.inc.php';
            }
            else {
                echo "Erro: " . http_response_code(); 
            }

        ?>

    </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>
</html>
