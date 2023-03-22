<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Concessionária</title>
</head>
<body>

    <div class="container w-50" id="main">

        <div class="container-fluid formCarro" >
            <form action="teste.php" method="post" id="mainForm">

                <div id="novoCarro">
                    <div class="form-group" id="chassi">
                        <label for="chassi" class="form-label">Chassi: </label>
                        <input type="text" class="form-control" name="chassi[]">
                        <div class="form-text">Digite o nome do Chassi</div>
                    </div>    
                    <div class="form-group" id="fabricante">
                        <label for="fabricante" class="form-label">Fabricante:</label>
                        <input type="text" class="form-control" name="fabricante[]">
                        <div class="form-text">Nome do fabricante</div>
                    </div>    
                    <div class="form-group" id="preco">
                        <label for="preco" class="form-label">Preço: </label>
                        <input type="number" class="form-control" min="0" step="0.01" placeholder="R$" name="preco[]">
                        <div class="form-text">Preço em R$</div>
                    </div>   
                </div>

                <p id="novo">+ Inserir Novo Carro</p>
                <button type="submit">Submit</button>
            </form>

        </div>

    </div>
    


    <script type="text/javascript">

        let button = document.querySelector('#novo');
        console.log(button.innerHTML);
        button.addEventListener('click', novoItem);

        // javascript é uma meleca =(
        
        /*
        function novoItem() {
            const form = document.querySelector('#novoCarro');
            let clone = form.cloneNode('deep');
            clone.removeAttribute('id');
            const endDiv = document.querySelector('#novo');
            const parentDiv = document.querySelector('#mainForm');
            parentDiv.insertBefore(clone, endDiv);
        };
        */

        function novoItem() { 
            // Que meleca ficou isso
            let parentDiv = document.querySelector('#mainForm');

            let container = document.createElement('div');
            container.className = 'novo-carro';

            let chassi = document.createElement('div');
            chassi.className = 'form-group chassi';

            let chassiLabel = document.createElement('label');
            chassiLabel.className = 'form-label';
            chassiLabel.setAttribute('for', 'chassi[]');
            chassiLabel.innerHTML = 'Chassi: ';
            chassi.appendChild(chassiLabel);

            let chassiInput = document.createElement('input');
            chassiInput.className = 'form-control';
            chassiInput.setAttribute('type', 'text');
            chassiInput.setAttribute('name', 'chassi[]');
            chassiInput.setAttribute('placeholder', 'Digite o chassi');
            chassi.appendChild(chassiInput);

            let fabricante = document.createElement('div');
            fabricante.className = 'form-group fabricante';

            let fabricanteLabel = document.createElement('label');
            fabricanteLabel.className = 'form-label';
            fabricanteLabel.setAttribute('for', 'fabricante[]');
            fabricanteLabel.innerHTML = 'Fabricante: ';
            fabricante.appendChild(fabricanteLabel);

            let fabricanteInput = document.createElement('input');
            fabricanteInput.className = 'form-control';
            fabricanteInput.setAttribute('type', 'text');
            fabricanteInput.setAttribute('name', 'fabricante[]');
            fabricanteInput.setAttribute('placeholder', 'Digite o fabricante');
            fabricante.appendChild(fabricanteInput);

            let preco = document.createElement('div');
            preco.className = 'form-group preco';

            let precoLabel = document.createElement('label');
            precoLabel.className = 'form-label';
            precoLabel.setAttribute('for', 'preco[]');
            precoLabel.innerHTML = 'Preco: ';
            preco.appendChild(precoLabel);

            let precoInput = document.createElement('input');
            precoInput.className = 'form-control';
            precoInput.setAttribute('type', 'number');
            precoInput.setAttribute('name', 'preco[]');
            precoInput.setAttribute('min', '0');
            precoInput.setAttribute('placeholder', 'R$');
            precoInput.setAttribute('step', '0.01');
            preco.appendChild(precoInput);

            container.appendChild(chassi);
            container.appendChild(fabricante);
            container.appendChild(preco);

            parentDiv.insertBefore(container, button);
        }

    </script>

</body>
</html>