<form id="busca" action="exercicio4.php" method="post">
  <fieldset>
    
    <legend>Filtros de Busca</legend>

    <label for="busca-medico" class="alinha">Nome do médico (opcional)):</label>
    <input type="text" name="busca-medico" placeholder="Opcional"> <br>

    <label for="busca-data" class="alinha">Data para busca (opcional):</label>
    <input type="date" name="busca-data"> <br>

    <button form="busca" type="submit" name="busca-crm">Ver Consultas Cadastradas</button>

  </fieldset>
</form>

<form action="exercicio4.php" method="get">
  <fieldset>
    <button type="submit">Recarregar</button>
  </fieldset> 
</form>
