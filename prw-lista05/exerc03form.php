<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Cadastro de Produtos</title>
</head>
<body>
    
    <div class="container-fluid" id="0">
        <div class="container w-70" id="main">
            <div class="title">
                Cadastro de Produtos
            </div>
            <div id="form">
                <form action="exerc03.php" method="post">
                    <div class="form-group" id="product-id">
                        <label for="id" class="form-label">ID do produto: </label>
                        <input type="text" name="id" class="form-control" placeholder="ID alfanumérico" required>
                    </div>

                    <div class="form-group" id="product-price">
                        <label for="price" class="form-label">Preço do produto: </label>
                        <input type="number" min="0.01" step="0.01" name="price" class="form-control" placeholder="R$" required>
                    </div>


                    <div class="form-group" id="product-qty">
                        <label for="qty" class="form-label">Qtd. em estoque: </label>
                        <input type="number" min="0" setp="1" name="qty" class="form-control"  placeholder="Qtd" required>
                    </div>

                    <button type="submit" class="btn btn-info" id="submit">Gravar!</button>
                    <button type="reset" class="btn btn-info" id="submit">Limpar</button>

                </form>
            </div>
        </div>
    </div>

</body>
</html>