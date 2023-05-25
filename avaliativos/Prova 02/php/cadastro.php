<?php

    require "../includes/componentes/navbar.php";

    $estados = ['AC', 'AL', 'AM', 'AP', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 
            'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN',
            'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];

?>

<div class="w-75 mx-auto">
 <form id="cadastro" action="" method="post">
  <fieldset>
   <legend>Cadastro de Times</legend>

   <div>
    <label class="alinha"> Nome do time: </label>
    <input type="text" name="nome" placeholder="Forneça o nome do time" required autofocus> 
   </div>
   
    <div>
        <label class="alinha">UF do time: </label>
        <select name="uf" placeholder="Forneça a UF do time" required>
            <optgroup>
                <?php foreach ($estados as $estado) {
                    echo "<option value='$estado'>$estado</option>";
                }
                ?>
            </optgroup>
        </select>
    </div>
   
    <div>
        <label class="alinha">Nº de títulos por sua UF de origem: </label>
        <input type="number" min="0" name="titulos" placeholder="Nº de títulos do time" required> 
    </div>

    <div class="alinha-botoes mt-3">
        <button form="cadastro" type="submit" name="cadastrar-time" class="btn btn-secondary">Cadastrar Time</button>
    </div>
   

  </fieldset>
 </form>

 
 <?php


    if (isset($_POST['cadastrar-time'])) {
        require "../includes/cadastrar-time.inc.php";
    }

    echo "</div>";


    // Desconectar do Banco de Dados

    include "../includes/desconectar.inc.php";

?>