

// Botões de Adicionar e Remover Itens


(function() { // adiciona os event listeners
    let addIcons = document.querySelectorAll('.add-icon');
    addIcons.forEach(icon => icon.addEventListener('click', addCar));
    
    let removeIcons = document.querySelectorAll('.remove-icon');
    removeIcons.forEach(icon => icon.addEventListener('click', removeCar));

})()



let carNum = 1;

const formRows = document.querySelector('#form-rows');
const mainForm = document.querySelector('#mainForm');



function modifyInputs(parent) {

    let inputNames = ['chassi', 'fabricante', 'preco'];

    inputNames.forEach(function(inputName) {
        let selector = '.' + inputName + ' input'; // ex: ".chassi input" - primeiro input dentro do div .chassi
        let input = parent.querySelector(selector);
        input.value = "";
        input.name = 'car' + carNum + '[' + inputName + ']';
    });
}



function addCar() { 

    if (carNum === 10) {
        alert('Máximo de 10 itens por cadastro!');
        return;
    }

    if (mainForm.classList.contains('was-validated')) {
        mainForm.classList.remove('was-validated');
        return;
    }

    carNum++;

    const form = document.querySelector('.new-row');
    const newForm = form.cloneNode('deep');

    let rowNumber = newForm.querySelector('.row-number');
    rowNumber.textContent = carNum;

    modifyInputs(newForm);

    formRows.appendChild(newForm);

}



function removeCar() {

    let lastCar = formRows.lastElementChild;

    if (carNum === 1) {
        modifyInputs(lastCar);        
        mainForm.classList.remove('was-validated');
        return;
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
