/*console.log("hola mundo");
var vari=1;
console.log(vari);
vari="hola!!!";
console.log(vari);
vari=[1,2,"tres"];
console.log(vari);
console.log(vari.length);
var i=0;*/
var frutas=["manzanas","pera"];
console.log(frutas[1]);
frutas[2]="naranja";
console.log(frutas)
frutas[3]="frutilla";
console.log(frutas);
console.log(frutas.indexOf("pera"));
frutas.unshift("mandarina");
console.log(frutas.length);
function suma(a,b) {return a+b;}
console.log(suma(10,5));
const resta=(a,b) => {return a-b;}
console.log(resta(10,5))
frutas.forEach((item,i)=>{
    console.log("indice es "+i+" y el valor es "+item);
});
frutas[1]="pomelo";
console.log(frutas)
