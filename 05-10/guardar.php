<?php
include("libs/conex.php");
include("libs/ciudades.lib.php");
//print_r($_GET);
//echo $_GET["nombre"];
if ($_POST){
    if ($_POST["nombre"]){
        guardarciudad($_POST,$conn);
    }
}
header('location:index.php');
?>
<p>soy guardar</p>