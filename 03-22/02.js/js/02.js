console.log("02.js enlazado")
var car=prompt("ingrese una palabra: ");
var arraynew=car.split("");
var invertir=arraynew.reverse();
var caracter=invertir.join("");
console.log(caracter);
if (car==caracter){
  console.log("es un pelindromo")
}
else{
  console.log("no es un palindromo")
}