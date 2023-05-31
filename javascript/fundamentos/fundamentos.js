// por hoje, cansei!
// amanhã:
// alguns conceitos:
// funções anônimas, funções assíncronas, hoisting, strict mode, best practices, mistakes, performance, 
// functions: call, apply, bind, closures



// Fundamentos de Javascript
// Orientada a eventos --> listen



// Tipos ou Objetos típicos do Javascript

// Array
// String
// Number
// Math
// Date
// Global
// RegExp
// Object
// Classes
// Error
// Boolean
// Operators
// Statements
// JSON
// Typed Array
// Precedence



// ARRAY

const contagemAnimais = ['baleia', 5, 'golfinho', 7, 'tubarão', 9];
// Declara-se arrays como constantes para garantir que sempre será uma array
// O valor dentro da array sempre é variável
// Há uma quantidade muito grande de métodos de arrays

contagemAnimais.at(1);
// 'baleia'

contagemAnimais.push('arraia', 11);
// Colocou a arraia na lista
// Retorna o novo tamanho da array

// filter()
// The filter() method creates a new array filled with elements that pass a test provided by a function.
// The filter() method does not execute the function for empty elements.
// The filter() method does not change the original array.
const nomesAnimais = contagemAnimais.filter(function(animal){
    return typeof animal === 'string';
})
// nomesAnimais = só a lista de nomes dos animais

contagemAnimais.pop();
// Tira o último elemento da lista

contagemAnimais.fill('juju');
// substitui os valores da lista pelo valor indicado. Pode indicar o intervalo de valores que será afetado

nomesAnimais.find(TESTE);
// retorna o primeiro valor que passa no TESTE

nomesAnimais.indexOf('baleia')
// retorna o índice de baleia


// Presta atenção:
// The main difference between forEach and filter is that forEach just loop over the array and 
// executes the callback but filter executes the callback and check its return value. 
// If the value is true element remains in the resulting array but if the return value is false the element 
// will be removed for the resulting array.



// VER MAIS!







// STRING

// Pode ser acessado como string[0]
// TODOS os métodos retornam NOVO valor
// Não modificam o valor original
// (porque será?)





// NUMBER

// Só um tipo de número, com ou sem decimais
// Tem vários métodos próprios




// MATH

// é o método que faz operações matemáticas!
// geralmente chama assim: Math.metodo()


Math.floor(1.15);
// retorna 1

Math.ceil(1.15);
// retorna 2

Math.random();
// retorna um número randômico entre 0 e 1
// Depois manipula conforme precisa

// Diferença entre trunc() e floor()
// The existing answers have explained well about the performance. 
// However, I could not understand the functional difference between Math.trunc and Math.floor 
// from either the question or the answers and hence I have put my finding in this answer.

// Math.trunc rounds down a number to an integer towards 0 while Math.floor rounds down a number 
// to an integer towards -Infinity. As illustrated with the following number line, 
// the direction will be the same for a positive number while for a negative number, the 
// directions will be the opposite.

//            2.3     -2.3
// Math.trunc: 2       -2
// Math.floor: 2       -3


// Tem muito mais





// DATE
// Primeiro criamos um objeto Date
const d = new Date();

// Com este objeto, usamos os vários métodos de data
let day = d.getDate();





// GLOBAL

// É como se fosse a classe mãe de tudo
// Seus métodos podem ser usados com todos os outros objetos!

// Obs: o objeto global é a janela do navegador
// transformar valor em número, em string, usar parse, ver se é NaN (Not a Number);








// REGEXP

// cria o objeto como uma nova expressão regular

// alguns métodos:
let text = "The best things in life are free";
let result = /e/.exec(text);
// uau, hein
// retorna um array com os resultados
// No caso retornou só "e"... ué, tinha entendido que ia retornar array com todos os 'e's
// test() faz a mesma coisa, mas retorna true ou false





// OBJECT

// Usados para armazenar chave: valor
// E acessa como se fosse propriedade
// Não tem necessidade de criar uma classe
// É uma mescla entre o dict de python e objetos de OOP

const pessoa = {
    nome: "Juliana",
    sobrenome: "Hachmann",
    idade: 36
};
pessoa.idade;
// retorna 36

// Assim como ARRAYS, se define como constante para ser sempre um objeto
// Os valores são alterados de outra forma

pessoa.keys();
// retorna as chaves

// prototype
// Aqui tem uma coisa DEMAIS do js
// que é uma forma de criar o equivalente a classes, a partir de objetos

// Está disponível a todos os objetos JavaScript
// Permite adicionar novas propriedades e métodos aos objetos
// OBVIAMENTE, nunca alterar o protótipo dos objetos puros do javascript porque DÁ PROBLEMA de inconsistência depois!

function employee(name, jobtitle, born) {
    this.name = name;
    this.jobtitle = jobtitle;
    this.born = born;
}

employee.prototype.salary = 2000;
  
const fred = new employee("Fred Flintstone", "Caveman", 1970);





// CLASSES 

// Funciona como nas outras linguagens, pelo menos para o usuário
// A class is a type of function, but instead of using the keyword function to initiate it, 
// we use the keyword class, and the properties are assigned inside a constructor() method:

class Car {  // Create a class
    constructor(brand) {  // Class constructor
      this.carname = brand;  // Class body/properties
    }
  }

let mycar = new Car("Ford");  // Create an object of Car class 

// Podemos usar:
// extend para relações de herança
// static para definir método estático
// super para se referir à classe mãe




// ERROR

// The Error object provides error information when an error occurs.

try {
    adddlert("Welcome");
  }
  catch(err) {
    document.getElementById("demo").innerHTML =
    err.name + "<br>" + err.message;
  } 


// Todo erro tem nome e mensagem!
// Tipos de erros do JavaScript
// RangeError	    A number "out of range" has occurred	
// ReferenceError	An illegal reference has occurred	
// SyntaxError	    A syntax error has occurred	
// TypeError	    A type error has occurred	
// URIError	        An error in encodeURI() has occurred


// Try - The try statement defines a code block to run (to try).
// Catch - The catch statement defines a code block to handle any error.
// Finally - The finally statement defines a code block to run regardless of the result.
// Throw - The throw statement defines a custom error.






// BOOLEAN

Boolean(10 > 9) // é o mesmo que:
(10 > 9)

// toString() 	Converts a boolean value to a string, and returns the result
// valueOf() 	Returns the primitive value of a boolean



// OPERATORS

// Ué, são os operadores...

// Atenção

// The ?. operator returns undefined if an object is undefined or null (instead of throwing an error).
let car;
document.getElementById("demo").innerHTML = car?.name; 






// STATEMENTS

// São os statements normais, palavras reservadas
// if, else, while, etc

// Nunca tinha visto

// debugger
// The debugger statement stops the execution of JavaScript, and calls the debugger.
// With the debugger turned on, this code should stop executing before the third line:
// amey






// JSON

// Olá, Jason

// JSON is a format for storing and transporting data.
// Começou como um objeto do js e ganhou suas próprias perninhas
// converte de um para outro:

const juliana = {tipo: "humano", estado: "cansada"};

let jsonJu = JSON.stringify(juliana); 
const julianaDeNovo = JSON.parse(jsonJu);

// Portanto, sempre chama JSON.metodo(objeto_do_metodo)






// TYPED ARRAY

// Typed arrays are not arrays.
// isArray() on a typed array returns false.
// Many array methods (like push and pop) are not supported by typed arrays.
// Typed arrays are array-like objects for storing binary data in memory.

// Typed Array Benefits
// Typed arrays provide a way to handle binary data as efficiently as arrays work in C.
// Typed arrays are raw memory, so JavaScript can pass them directly to any function without 
// converting the data to another representation.
// Typed arrays are serously faster than normal arrays, for passing data to functions that can use 
// raw binary data (Computer Games, WebGL, Canvas, File APIs, Media APIs).






// PRECEDENCE

// são só as precedências nas operações







// O que MAIS quero aprender hoje em javascript
// map()
// callback functions



// map() creates a new array from calling a function for every array element.
// map() does not execute the function for empty elements.
// map() does not change the original array.
// Ver mais em arrays




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





// Funções anônimas
// 







