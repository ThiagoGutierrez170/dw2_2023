<?php
function traerCiudades($con){
    $sql="SELECT * FROM ciudades";
    $filas=$con->query($sql);
    return $filas;
}
function traerCiudad($id,$con)
{
    $sql="SELECT * FROM ciudades where id=".$id;
    $filas=$con->query($sql);
    return $filas;
}
function agregarCiudad($datos,$con)
{
   $sql="INSERT INTO ciudades (nombre) VALUES ('". strip_tags($datos['nombre'])."');";
   $con->query($sql);
}
function editarCiudad($datos,$con)
{
    // update ciudades set nombre = CAMPO where id= ID
    $sql="update ciudades set nombre ='". strip_tags($datos['nombre'])."' where id=". strip_tags($datos['id']);
   $con->query($sql);
}
function borrarCiudad($id,$con)
{
   // delete from ciudades where id == ID
    $sql="DELETE FROM  ciudades where id=".$id;
    $filas=$con->query($sql);
    return $filas;
}
function buscarCiudad($nombre,$con)
{
    $sql= "SELECT * FROM `ciudades` WHERE nombre='" . $nombre . "'";
    $filas=$con->query($sql);
    return $filas;
}
function validarCiudades($datos){
    $errores=[];
    if ( !preg_match('/^[A-Za-z\s]+$/' ,$datos['nombre'])){
        array_push($errores, "El campo nombre no permite numeros ni simbolos");
    }
    return  $errores;
}
?>