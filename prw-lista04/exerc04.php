<?php

    include '../includes/lista04.inc.php';

    exit_if_empty($_POST, 'valor');

    $fidelidade = false;
    if (isset($_POST['fidelidade'])) {
        $fidelidade = true;
    }

    imprime_relatorio($_POST['valor'], $fidelidade);

?>