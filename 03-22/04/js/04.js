console.log("04.js enlazado")
var lista=["jugo","chocolatada","agua","gaseosa"];
console.log(lista);
lista.forEach((item,e)=>{
    console.log("indice es: "+e+" y el valor es "+item);
});
var f,c;
const valor1 = prompt("elige un numero del 0 al 3 para seleccionar un valor");
const valor2 = prompt("elige un numero del 0 al 3 para cambiar de lugar");
f=lista[valor1];
c=lista[valor2];
lista[valor1]=c;
lista[valor2]=f;
console.log(lista);
console.log("nuevo orden");
lista.forEach((item,e)=>{
    console.log("indice es: "+e+" y el valor es "+item);
});

