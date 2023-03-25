console.log("03.js enlazado")

let paralerta = prompt(`Indica hasta que número quieres ver : `);
let par = [];
for (let i = 1; i < paralerta; i++){
  if (i % 2 === 0) {
    par.push(i);
  }
}
console.log(par);
console.log("cantidad de numeros pares: "+par.length)
/*
let p =prompt("inserte un numero"); //prompt es para pedir informacion
console.log(p);
*/