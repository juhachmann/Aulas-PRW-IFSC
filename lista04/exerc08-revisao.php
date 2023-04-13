<?php

    include 'exerc08_functions.inc.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <title>Exercício 8 - Revisão para prova</title>
</head>
<body>

    <div class="col-md-9 main-div">

        <?php if (empty($_POST)) { ?>
            <form class="container-fluid" action="" method="post">
                <div>
                    <label class="form-label" for="nome">Nome: </label>
                    <input class="form-control" type="text" name="nome" id="nome" required>
                </div>
                
                <?php foreach(range(1, 3) as $nota) { ?>
                        <label class="form-label" for="notas[<?php $nota ?>]">Nota <?php echo $nota ?>: </label>
                        <input class="form-control" type="number" name="notas[]" id="notas[<?php $nota ?>]" min="0" max="10" step="0.01" required>

                <?php } ?>
                

                    <input class="form-check-input" type="radio" name="tipo_media" value="ponderada"> Média Ponderada
                    <input class="form-check-input" type="radio" name="tipo_media" value="aritmetica"> Média Aritmética
 
               
                <button type="submit">Enviar</button>
            </form>

        <?php } else { 
            
            $keys = ['nome', 'notas', 'tipo_media'];
            
            foreach ($keys as $key) {
                if (!isset($_POST[$key]) || empty($_POST[$key])) {
                    exit("Erro, você não inseriu o valor de {$key}.");
                }
            }

            foreach (range(0,2) as $nota) {
                if (!isset($_POST['notas'][$nota])  || empty($_POST['notas'][$nota])) {
                    exit ("Erro, você não inseriu o valor da nota " . $nota + 1);
                }
            }

            //var_dump($notas);

            $mediaPrincipal = $mediaSecundaria = 0;
            if ($_POST['tipo_media'] === 'ponderada') {
                $mediaPrincipal = ponderada($_POST['notas']);
                $mediaSecundaria = aritmetica($_POST['notas']);
            }
            elseif ($_POST['tipo_media'] === 'aritmetica') {
                $mediaPrincipal = aritmetica($_POST['notas']);
                $mediaSecundaria = ponderada($_POST['notas']);
            }

        ?>

        <div class="resultado container-fluid">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th colspan="2">Cálculo de Média</th>
                    </tr>
                    <tr>
                        <th>Estudante</th>
                        <th> <?php echo $_POST['nome'] ?> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($_POST['notas'] as $nota => $valor) { ?>
                    <tr>
                        <td>Nota <?php echo $nota + 1 ?></td>
                        <td> <?php echo number_format($valor, 2) ?> </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Média <?php echo $_POST['tipo_media'] ?> : </td>
                        <td> <?php echo $mediaPrincipal ?> </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div>
            <form action="" method="get">
                <button type="submit">Calcular Novamente</button>
            </form></div>

        <?php } ?>


    </div>
    
</body>
</html>