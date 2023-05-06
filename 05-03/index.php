<?php
$numero1 = 10;
$numero2 = 5;
$suma = $numero1 + $numero2;
$resta = $numero1 - $numero2;
$multiplicacion = $numero1 * $numero2;
$division = $numero1 / $numero2;
echo "La suma es: " . $suma . "<br>";
echo "La resta es: " . $resta . "<br>";
echo "La multiplicación es: " . $multiplicacion . "<br>";
echo "La división es: " . $division . "<br>";
$edad=20;
if($edad >=18){
    echo "Eres mayor de edad";
}
else {
    echo "Erers menor de edad";
}
echo "<br>";
$dia = "lunes";
switch ($dia) {
case "lunes":
echo "Hoy es lunes";
break;
case "martes":
echo "Hoy es martes";
break;
default:
echo "Hoy no es ni lunes ni martes";
break;
}
echo "<br>";
for ($i = 0; $i < 5; $i++) {
    echo "El valor de i es: " . $i . "<br>";
    }
    
    $contador = 0;
    while ($contador < 5) {
    echo "El valor del contador es: " .
    $contador . "<br>";
    $contador++;
    }
    
    $contador = 0;
    do {
    echo "El valor del contador es: "
    . $contador . "<br>";
    $contador++;
    } while ($contador < 5);
?>