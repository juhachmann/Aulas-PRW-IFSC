let numero = document.getElementById('numero').value;

let botao_calcula = document.querySelector('#botao1');

let botao_toogle = document.querySelector('#botao2');

let p_resultado = document.getElementById('resultado');

console.log(p_resultado);


// Associa eventos aos botões
botao_calcula.addEventListener("click", function (numero, p_resultado) {
    extrairRaiz(numero, p_resultado);
});


botao_toogle.addEventListener("click", function(p_resultado) {
    p_resultado.classList.toggle("hidden");
});



function extrairRaiz(numero, p_resultado) {
    let raiz = Math.sqrt(numero);
    console.log(raiz);
    p_resultado.innerHTML = raiz;

}

