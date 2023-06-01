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
   $sql="INSERT INTO ciudades (nombre) VALUES ('".$datos['nombre']."');";
   $con->query($sql);
}
function editarCiudad($datos,$con)
{
    // update ciudades set nombre = CAMPO where id= ID
    $sql="update ciudades set nombre ='".$datos['nombre']."' where id=".$datos['id'];
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
    $sql= "SELECT `id`, `nombre` FROM `ciudades` WHERE nombre='" . $nombre . "'";
    $filas=$con->query($sql);
    return $filas;
}
?>