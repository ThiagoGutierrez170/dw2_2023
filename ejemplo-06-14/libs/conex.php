<?php
error_reporting(E_ALL ^ E_NOTICE);
$servidor="localhost"; // ip o direccion e la base e datos
$usuario="dw2_unae";
$password="dw2_unae";
$base="dw2_unae";
$conn=mysqli_connect($servidor,$usuario,$password,$base);
if($conn->connect_error)
{
    die("fallo la conexion");
}
//echo "conectado";

?>