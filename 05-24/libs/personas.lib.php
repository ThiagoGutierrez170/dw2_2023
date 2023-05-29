<?php
function traerPersonas($con){
    $sql="SELECT * FROM personas";
    $filas=$con->query($sql);
    return $filas;
}
function traerPersona($id,$con)
{
    $sql="SELECT * FROM personas where id=".$id;
    $filas=$con->query($sql);
    return $filas;
}
function agregarPersonas($datos,$con)
{
    //INSERT INTO `personas`(`id`, `nombre`, `apellido`, `cin`, `direccion`,
    // `fecha_nac`, `ciudad_id`) VALUES ('[value-1]',
    //'[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
   $sql="INSERT INTO personas (nombre,apellido,cin,direccion,fecha_nac,ciudad_id) VALUES ('".
   $datos['nombre'].",".$datos['apellido'].",".$datos['cin'].",".
   $datos['direccion'].",".$datos['fecha_nac'].",".$datos['ciudad_id'].",');";
   $con->query($sql);
}
function editarPersona($datos,$con)
{
    //UPDATE `personas` SET `id`='[value-1]',`nombre`='[value-2]',`apellido`='[value-3]',
    //`cin`='[value-4]',`direccion`='[value-5]',`fecha_nac`='[value-6]',`ciudad_id`='[value-7]' WHERE 1
    $sql="update personas set nombre ='".$datos['nombre']."',apellido ='".$datos['apellido'].
    "',cin ='".$datos['cin']."',direccion ='".$datos['direccion']."',fecha_nac ='".$datos['fecha_nac'].
    "',ciudad_id ='".$datos['ciudad_id']."' where id=".$datos['id'];
   $con->query($sql);
}
function borrarPersona($id,$con)
{
   // delete from ciudades where id == ID
    $sql="DELETE FROM  personas where id=".$id;
    $filas=$con->query($sql);
    return $filas;
}
?>