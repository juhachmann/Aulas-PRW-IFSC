<?php

    session_start();
    var_dump($_SESSION);

    if (!isset($_SESSION['conectado']) || !$_SESSION['conectado']) {
        echo "Seu acesso não é permitido!";
        exit("<br><a href='../php/home.php'>Home</a>");
    }
