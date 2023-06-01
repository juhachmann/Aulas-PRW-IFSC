// Métodos assíncronos de JavaScript

// Como é voltada a eventos, escuta de eventos, etc.. há coisas assíncronas sendo mandadas para executar


// 1. CALLBACK
// A callback is a function passed as an argument to another function.
function myDisplayer(some) {
    document.getElementById("demo").innerHTML = some;
  }
  
  function myCalculator(num1, num2, myCallback) {
    let sum = num1 + num2;
    myCallback(sum);
  }
  
  myCalculator(5, 5, myDisplayer);



// 2. ASYNCRONOUS FUNCTIONS

// Functions running in parallel with other functions are called asynchronous

// Mas hoje não se usa mais estes callbacks e sim as PROMISES



// 3. PROMISES

// "Producing code" is code that can take some time
// "Consuming code" is code that must wait for the result
// A Promise is a JavaScript object that links producing code and consuming code

// A JavaScript Promise object contains both the producing code and calls to the consuming code:


// THEN
//Promise.then() takes two arguments, a callback for success and another for failure.
//Both are optional, so you can add a callback for success or failure only.

// Aqui tá dizendo para usar a seguinte sintaxe

// 1º Criar a promessa
let myPromise = new Promise(function(){});
// 2º Chamar a promessa com o then + callback success, callback error
myPromise.then(
    function() {}, // sucesso
    function() {} // erro
)


// MAS.. nunca vi isso, será que ainda é assim?



// 4. ASYNC e AWAIT

// São palavras reservadas de tipo de função
async function myAsync() {
    let value = await promise;
    return null};

// Aí já ficou complexo pra caramba, não entendi nada
// Procurar vídeo!



// Callback Functions!


// A callback is a function passed as an argument to another function
// This technique allows a function to call another function
// A callback function can run after another function has finished


function myDisplayer(some) {
    document.getElementById("demo").innerHTML = some;
  }
  
  function myCalculator(num1, num2, myCallback) {
    let sum = num1 + num2;
    myCallback(sum);
  }
  
myCalculator(5, 5, myDisplayer);
// Aqui, uma função é passada como callback e é executada depois de outra



// Create an Array
const myNumbers = [4, 1, -20, -7, 5, 9, -6];

// Call removeNeg with a callback
const posNumbers = removeNeg(myNumbers, (x) => x >= 0);

// Display Result
document.getElementById("demo").innerHTML = posNumbers;

// Keep only positive numbers
function removeNeg(numbers, callback) {
  const myArray = [];
  for (const x of numbers) {
    if (callback(x)) {
      myArray.push(x);
    }
  }
  return myArray;
}

// Aqui, o callback é usado dentro da função, para cada item


// veja esta sintaxe
// (x) => x > 0;
// É o mesmo que:
function isPositive(x) {
    return x > 0;
}
// (retorna se um número é positivo)


// Sintaxe
// (x)      função anônima de x
// =>       retorna
// x > 0    retorno  


// Where callbacks really shine are in asynchronous functions, where one function has to wait for another 
// function (like waiting for a file to load).

// Funções assíncronas
// Functions running in parallel with other functions are called asynchronous

