<?php
$servidor="127.0.0.1";//ip a direccion a la base de datos
$usuario="dw2_unae";
$password="dw2_unae";
$base="dw2_unae";
$conn=mysqli_connect($servidor,$usuario,$password,$base);
if($conn->connect_error){
    die("fallo la conexion");
}
//echo "conectado";

?>