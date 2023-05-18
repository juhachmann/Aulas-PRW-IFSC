<?php

    $nome = $_POST['nome'];
    $salarioBase = $_POST['salarioBase'];
    $dep = $_POST['dependentes'];

    // Alguns comandos php para consumir apis:
    // file_get_contents()
    // curl()

    $salarioLiquido = json_decode(file_get_contents("http://localhost:8081/calcular_salario/$nome/$salarioBase/$dep"));

    echo "<p>$nome, seu salário líquido será de R$ " . number_format($salarioLiquido, 2, ",", ""). "</p>";

