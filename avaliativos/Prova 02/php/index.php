<?php

    require "../includes/componentes/navbar.php";

?>


<div class="container content home">
    <h3>Portal do Campeonato Brasileiro</h3>
    <p>Bem vindo/a à página de administração de times do campeonato brasileiro</p>
    <p>Aqui você pode: </p>
    <ul>
        <li><a href="times.php" title="Ver Times">Ver os times do campeonato</a></li>
        <li><a href="cadastro.php" title="Cadastrar Times">Cadastrar times</a></li>
        <li><a href="tricampeoes.php" title="Ver Tricampeões">Ver os times tricampeões por seus estados</a></li>
    </ul>
</div>


<?php

    require "../includes/desconectar.inc.php";

?>