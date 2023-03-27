
// Botões de Adicionar e Remover Itens
// que meleca

const addIcons = document.querySelectorAll('.add-icon');
addIcons.forEach(icon => icon.addEventListener('click', addCar));

const removeIcons = document.querySelectorAll('.remove-icon');
removeIcons.forEach(icon => icon.addEventListener('click', removeCar));

let carNum = 1;

const formRows = document.querySelector('#form-rows');
const mainForm = document.querySelector('#mainForm');


function addCar() { 

    if (carNum === 10) {
        alert('Máximo de 10 itens por cadastro!');
        return false;
    }

    carNum++;
    
    mainForm.classList.remove('was-validated');

    const targetContainer = document.querySelector('.new-row');
    const clonedContainer = targetContainer.cloneNode('deep');

    let rowNumber = clonedContainer.childNodes[1];
    rowNumber.textContent = carNum;

    let inputChassi = clonedContainer.childNodes[3].childNodes[3];
    let inputFab = clonedContainer.childNodes[5].childNodes[3];
    let inputPrice = clonedContainer.childNodes[7].childNodes[3];

    let inputs = [inputChassi, inputFab, inputPrice];
    inputs.forEach(input => input.value = "");

    inputChassi.name = 'car' + carNum + '[chassi]';
    inputFab.name = 'car' + carNum + '[fabricante]';
    inputPrice.name = 'car' + carNum + '[preco]';

    formRows.appendChild(clonedContainer);

}


function removeCar() {

    let lastCar = formRows.lastElementChild;

    if (carNum === 1) {
        let inputChassi = lastCar.childNodes[3].childNodes[3];
        let inputFab = lastCar.childNodes[5].childNodes[3];
        let inputPrice = lastCar.childNodes[7].childNodes[3];
    
        let inputs = [inputChassi, inputFab, inputPrice];
        inputs.forEach(input => input.value = "");
        
        mainForm.classList.remove('was-validated');

        return false;
    }

    lastCar.remove();
    carNum--;
}




// Bootstrap Validation 
// CTRL+C da documentação do Bootstrap: 
// https://getbootstrap.com/docs/5.0/forms/validation/ 
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict' // tá dizendo pra usar um modo estrito do javascript, que não seja o modo normal ou 'sloppy'... não compreendi bem as mudanças que isso traz

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms) // call é um método especial, ainda quero ver o que é! (call, bind e ?)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) { // pra cada item de form adiciona um eventListener
            if (!form.checkValidity()) { //checkValidity() é função default do JS: checa as constraints do elemento
            event.preventDefault() //preventDefault() idem : previne comportamento padrão (no caso, submit)
            event.stopPropagation() // é default do event, mas não entendi o que faz
            }

            form.classList.add('was-validated') // pelo que entendi então... são estas classes que controlam cor e o que vai ser exibido..
        }, false)
        })
    })()
