

<div class="container w-50 mt-5">

    <?php if (count($times) > 0) {
        echo "<h3>$captionTabela</h3>"; ?>

    <table class="table">
        <thead>
            <th>Nome</th>
            <th>UF</th>
            <th>Nº de títulos por seu estado</th>
        </thead>
        <tbody>

            <?php
                foreach($times as $time) {
                    echo "<tr>";
                    echo "<td>" . $time['nome'] . "</td>";
                    echo "<td>" . $time['uf'] . "</td>";
                    echo "<td>" . $time['titulos_estado'] . "</td>";
                    echo "</tr>";
                }
            ?>

        </tbody>
    </table>

    <?php 
    }
    else {
        echo "<p>Ainda não há times para visualizar</p>";
    }
    ?>
</div>

