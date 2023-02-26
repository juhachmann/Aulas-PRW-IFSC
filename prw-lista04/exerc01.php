<?php

    include '../includes/lista04.inc.php';

    exit_if_empty($_POST, 'name');

    $media = average($_POST['n1'], $_POST['n2']);
    echo "<p>A média do/a estudante é: $media</p>";

    if (aprova($media, 6)) {
        echo "<p>O estudante está aprovado</p>";
    }
    else {
        echo "<p class='err'>O estudante está reprovado</p>";
    }

    


?>