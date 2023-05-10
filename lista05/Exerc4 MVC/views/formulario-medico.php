<form id="medicos" action="exercicio4.php" method="post">
  <fieldset>
   <legend>Cadastro de Médicos</legend>

   <label class="alinha"> CRM: </label>
   <input type="text" name="medico-crm" autofocus placeholder="Forneça o CRM do médico" required> <br>

   <label class="alinha"> Nome do médico: </label>
   <input type="text" name="medico-nome" placeholder="Insira o nome do médico" required> <br>

   <button form="medicos" type="submit" name="cadastrar-medico">Cadastrar Médico</button>

  </fieldset>
</form>
