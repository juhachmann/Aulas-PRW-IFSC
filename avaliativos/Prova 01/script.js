// APENAS VALIDACAO

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
