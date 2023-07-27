<?php
error_reporting(E_ALL ^ E_NOTICE);
$servidor="localhost"; 
$usuario="dw21_gutierrez";
$password="dw21_gutierrez";
$base="dw21_gutierrez";
$conn=mysqli_connect($servidor,$usuario,$password,$base);
if($conn->connect_error)
{
    die("fallo la conexion");
}
?>