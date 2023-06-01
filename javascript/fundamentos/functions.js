// Funções em JavaScript

// Uma linguagem muito funcional...


// 1. TIPOS DE SINTAXES
// 2. ARGUMENTOS
// 3. INVOCAÇÃO
// 4. FUNCTION CALL
// 5. FUNCTION APPLY
// 6. FUNCTION BIND
// 7. CLOSURE - procurar mais


// Há sintaxes diferentes para declarar funções, que sejam mais curtas, reutilizáveis, anônimas, etc
// Há métodos para o objeto arguments
// Call, apply, bind: são formas de usar métodos de um objeto em outro, alterando a referência de this
// Closure: ?




// 1. Tipos de sintaxe na declaração de funções:

// Declaradas, como expressão, funções que se invocam, Arrow functions


// a) Declaração Normal

function multiplica(x, y) {
    return x * y;
}

// b) Como expressão
// São sempre funções anônimas

const z = function (x, y) {return x * y};
let a = z(10, 4); // a = 40


// c) Funcões que se invocam
// Elas executam na mesma hora, automaticamente, no momento que são declaradas

(function() {
    alert("Hello");
})();

// Ela é invocada pelos dois () no final, que disparam ela!


// d) Arrow functions
// Com apenas um statement
const d = (x, y) => x * y;
// Com mais de um statement
const b = (x, y) => {
    let a = x - y;
    return a * x * y;
}




// 2. ARGUMENTOS

function somaDoisItens(a, b) {
    return a + b;
}

function somaDoisItensValorDefault(a = 10, b = 15) {
    return a + b;
}

function somaVarios(...args) {
    let qtdArgs = arguments.lenght;  
    // arguments => é um objeto do JS, que nos permite acessar propriedades do conjunto de argumentos passado a função
    let soma = 0;
    for (let arg in args) {
        soma += arg;
    }
    return soma;
}

// ATENÇÃO!
// Argumentos são passados como valor
// Objetos são passados como referência
// FICA LIGADA!





// 3. Invocações

// Funções definidas fora do escopo de um objeto (ou seja, funções que não são métodos)
// Possuem como this o objeto global Window

// (ou seja, ela é sim um método, do objeto global Window)

// Não entendi direito o que isso quer dizer




// 4. FUNCTION CALL

// With the call() method, you can write a method that can be used on different objects.

// Methods like call(), apply(), and bind() can refer this to any object.
// O que isso quer dizer?

// With call(), an object can use a method belonging to another object.


// This example calls the fullName method of person, using it on person2:
const person = {
    fullName: function() {
      return this.firstName + " " + this.lastName;
    }
}

const person1 = {
    firstName:"John",
    lastName: "Doe"
}

const person2 = {
    firstName:"Mary",
    lastName: "Doe"
}
  
// This will return "John Doe":
person.fullName.call(person1);
// Sintaxe: o objeto que tem o método + o nome do método + call + o objeto no qual o método vai ser usado
// Agora entendi o porque do lance do this
// Com o call o "this" do método fullname mudou o objeto que ele refere!
// Doidêêraaa

// Com argumentos
const persona = {
    fullName: function(city, country) {
      return this.firstName + " " + this.lastName + "," + city + "," + country;
    }
  }
  
  const persona1 = {
    firstName:"John",
    lastName: "Doe"
  }
  
  person.fullName.call(persona1, "Oslo", "Norway");
  // John Doe, Oslo, Norway





// 5. FUNCTION APPLY 

// Similar a apply
// Com a diferença de: 
// The difference is:
// The call() method takes arguments separately.
// The apply() method takes arguments as an array.
// The apply() method is very handy if you want to use an array instead of an argument list.

Math.max.apply(null, [1,2,3]); 


// TAN TAN TAN
// JavaScript Strict Mode
// In JavaScript strict mode, if the first argument of the apply() method is not an object, 
// it becomes the owner (object) of the invoked function. In "non-strict" mode, it becomes the global object.
// TODO Ver o que é isso!!



// 6. FUNCTION BIND

// Ai...
// Entendi que é quase a mesma coisa
// Mas que ajuda a manter o this associado a um objeto, mesmo quando chamamos como callback


// Call is a function that helps you change the context of the invoking function. 
// In layperson's terms, it helps you replace the value of this inside a function with whatever value you want.

// Apply is very similar to the call function. 
// The only difference is that in apply you can pass an array as an argument list.

// Bind is a function that helps you create another function that you can execute later with the new 
// context of this that is provided.


// All three of the call, bind, and apply methods set the this argument to the function.
// The call and apply methods set this to a function and call the function.
// The bind method will only set this to a function. We will need to separately invoke the function.


// Summary
// call: binds the this value, invokes the function, and allows you to pass a list of arguments.
// apply: binds the this value, invokes the function, and allows you to pass arguments as an array.
// bind: binds the this value, RETURNS a new function, and allows you to pass in a list of arguments.


// é....





// 7. CLOSURE

// não entendi, mas tem a ver com escopo e acesso a variáveis dentro de funções
