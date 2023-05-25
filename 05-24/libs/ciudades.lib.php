<?php
function traerciudades($con){
    $sql="SELECT * FROM ciudades";
    $filas=$con->query($sql);
    return $filas;
}

function traerciudad(,$con){
    $sql="SELECT * FROM ciudades where id";
    $filas=$con->query($sql);
    return $filas;
}

function guardarciudad($datos,$con){
    //print_r($datos);
    $sql="INSERT INTO ciudades (nombre) VALUES ('".$datos['nombre']."');";
    $con->query($sql);
}

?>