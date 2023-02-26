<?php

    include '../includes/lista04.inc.php';

    foreach ($_POST as $key => $value) {
        exit_if_empty($_POST, $key);
    }

    if ($_POST['conversao'] == 'toCelsius') {
        $converted = to_celsius($_POST['temp']);
        echo "<p>" . $_POST['temp'] . "º fahrenheit = <br>
                $converted º Celsius.</p>";
    }
    else {
        $converted = to_fahrenheit($_POST['temp']);
        echo "<p>" . $_POST['temp'] . "º Celsius = <br>
                $converted º Fahrenheit.</p>";
    }





?>