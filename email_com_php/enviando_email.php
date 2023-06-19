<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviando E-mail com PHPMailer</title>
</head>
<body>
    <!-- Enviando email com a biblioteca PHP Mailer -->
    <h1>Enviando Emails</h1>
    <form action="enviar_email.php" method="post">
        <fieldset>
            <legend>Dados cadastrais do Cliente</legend>
            <div>
                <label for="cliente" class="alinha">Nome do cliente: </label>
                <input type="text" name="cliente" id="cliente" placeholder="Forneça o nome do cliente" required>
            </div>
            <div>
                <label for="nascimento" class="alinha">Data de nascimento: </label>
                <input type="date" name="nascimento" id="nascimento" required>
            </div>
            <div>
                <label for="email" class="alinha">Email: </label>
                <input type="email" name="email" id="email" placeholder="Forneça o email do cliente" required>
            </div>
            <div>
                <label for="senha" class="alinha">Senha: </label>
                <input type="password" name="senha" id="senha" placeholder="Insira a senha" required>
            </div>
            <button type="submit">Cadastrar</button>
        </fieldset>
    </form>
</body>
</html>
