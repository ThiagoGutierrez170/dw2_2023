<?php
function traerciudades($con){
    $sql="SELECT * FROM ciudades";
    $filas=$con->query($sql);
    return $filas;
}

function guardarciudad($datos,$con){
    //print_r($datos);
    $sql="INSERT INTO ciudades (nombre) VALUES ('".$datos['nombre']."');";
    echo $sql;
    $con->query($sql);
    
}

?>