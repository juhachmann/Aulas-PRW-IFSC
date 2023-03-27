<?php
    DEFINE('LISTA_FABRICANTES', [
        "Chevrolet", "Ford", "Hyundai", "Kia", "Peugeot", "Renault", "Volkswagen",
    ]);
?>

    <!-- Ícones Bootstrap-->
    <div class="row justify-content-end align-self-end action-icons">
        <i class="bi bi-plus-circle icons add-icon"> 
            <span class="hide-this"> Ícone de Adicionar </span>
        </i>
        <i class="bi bi-dash-circle icons remove-icon">
            <span class="hide-this"> Ícone de Remover </span>
        </i>
    </div>

    <div class="container-fluid formulario">
        <form action="" method="post" id="mainForm" class="needs-validation" novalidate>

            <div class="row align-items-center form-header">
                <div class="col-md-1 row-number">
                    <label for="counter" class="form-label"># </label>
                </div>
                <div class="col-md-4">
                    <label for="chassi" class="form-label">Chassi: </label>
                </div>
                <div class="col-md-4">
                    <label for="fabricante" class="form-label">Fabricante: </label>
                </div>
                <div class="col-md-3">
                    <label for="preco" class="form-label">Preço (R$) : </label>
                </div>
            </div>

            <div id="form-rows">

                <div class="row align-items-center new-row">
                    <div class="col-md-1 row-number">
                        <label for="counter" class="form-label hidden"># </label> 1
                    </div>
                    <div class="col-md-4 form-group chassi">
                        <label for="chassi" class="form-label hidden">Chassi: </label>
                        <input type="text" class="form-control" name="car1[chassi]" pattern="^([a-zA-Z0-9]{5,}).*" title="Deve iniciar com 5 alfanuméricos" required>
                        <div class="form-text invalid-feedback">* Deve iniciar com 5 alfanuméricos</div>
                    </div>    
                    <div class="col-md-4 form-group fabricante">
                        <label for="fabricante" class="form-label hidden">Fabricante: </label>
                        <input type="text" class="form-control input-fab" name="car1[fabricante]" list="fabricantes" autocomplete="off" pattern="^([a-zA-Z]{3,}).*" title="Deve iniciar com 3 letras" required>
                        <datalist id="fabricantes">
                            <?php
                                foreach(LISTA_FABRICANTES as $fabricante) {
                                    echo "<option value='$fabricante'>";
                                }
                            ?>
                        </datalist>
                        <div class="form-text invalid-feedback">* Deve iniciar com 3 letras</div>
                    </div>    
                    <div class="col-md-3 form-group preco">
                        <label for="preco" class="form-label hidden">Preço (R$) : </label>
                        <input type="number" class="form-control" min="0" step="0.01" placeholder="R$" name="car1[preco]"  required>
                        <div class="form-text invalid-feedback">* Números positivos ou zero</div>
                    </div>
                </div>

            </div>

            <!-- Ícones Bootstrap-->
            <div class="row justify-content-end align-self-end action-icons">
                <i class="bi bi-plus-circle icons add-icon"> 
                    <span class="hide-this"> Ícone de Adicionar </span>
                </i>
                <i class="bi bi-dash-circle icons remove-icon">
                    <span class="hide-this"> Ícone de Remover </span>
                </i>
            </div>

            <button class="btn btn-outline-secondary" type="submit">Cadastrar</button>
        </form>

    </div>
