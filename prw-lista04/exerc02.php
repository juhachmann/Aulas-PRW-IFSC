<?php

    include '../includes/lista04.inc.php';

    if (value_in_range($_POST['idade'])) {
        echo "<p>Sua idade é um número válido,<br>";
        if ( can_vote ( $_POST['idade'] ) ) {
            echo "e você já pode votar!</p>";
        }
        else {
            echo "mas você ainda não pode votar.<br>Espere até os 16 e faz o L!</p>";
        }
    }
    else {
        exit("<p>Você inseriu um valor inválido para a idade humana!
                <br>Se você for humano, volte no formulário e corrija.
                <br>Se não, entre em contato com o suporte técnico para resolvermos a situação.</p>");
    }


?>