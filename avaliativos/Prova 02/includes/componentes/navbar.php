<?php

    require "../includes/abrir-conexao.inc.php";

?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Cadastro de Times </title> 
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
  <link rel="stylesheet" href="../css/formata-banco.css">
</head> 

<body> 

    <!-- Navbar do Bootstrap -->
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
            
            <!-- Tudo dentro dessa DIV colapsa quando atinge a view-port determinada-->
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">Cadastrar Times</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="times.php">Todos os Times</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tricampeoes.php">Estrelas do Campeonato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mt-2 mb-5 main-title">
        <h1>Campeonato Brasileiro</h1>
    </div>
