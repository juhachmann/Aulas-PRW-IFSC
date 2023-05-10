<form id="pacientes" action="exercicio4.php" method="post">
  <fieldset>
    <legend>Cadastro de Consultas</legend>

    <label for="paciente-nome" class="alinha">Nome do paciente:</label>
    <input type="text" name="paciente-nome" placeholder="Insira o nome do paciente" required> <br>

    <label for="paciente-crm" class="alinha">CRM do médico que o atendeu: </label>
    <input type="text" name="paciente-crm" placeholder="Insira o CRM do médico que atendeu o paciente" required> <br>

    <label for="paciente-data" class="alinha">Data da internação:</label>
    <input type="date" name="paciente-data" required> <br>

    <button form="pacientes" type="submit" name="cadastrar-paciente">Cadastrar Paciente</button>

  </fieldset>
</form>
