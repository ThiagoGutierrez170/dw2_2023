console.log("01.js enlazado")
var s=0;
function suma(item){
    s=s+item;
}
var num=[1,3,2,3,4253,12,4];
num.forEach(suma);
console.log(s);
console.log("fin.");