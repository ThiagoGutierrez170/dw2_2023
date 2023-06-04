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
function agregarPersona($datos,$con)
{
    //INSERT INTO `personas`(`id`, `nombre`, `apellido`, `cin`, `direccion`,
    // `fecha_nac`, `ciudad_id`) VALUES ('[value-1]',
    //'[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
   $sql="INSERT INTO personas (nombre,apellido,cin,direccion,fecha_nac,ciudad_id) VALUES ('".
   strip_tags($datos['nombre'])."','". strip_tags($datos['apellido'])."','". strip_tags($datos['cin'])."','".
   strip_tags($datos['direccion'])."','".$datos['fecha_nac']."',". strip_tags($datos['ciudad_id']).");";
   $con->query($sql);
}
function editarPersona($datos,$con)
{
    //UPDATE `personas` SET `id`='[value-1]',`nombre`='[value-2]',`apellido`='[value-3]',
    //`cin`='[value-4]',`direccion`='[value-5]',`fecha_nac`='[value-6]',`ciudad_id`='[value-7]' WHERE 1
    $sql="update personas set nombre ='". strip_tags($datos['nombre'])."',apellido ='". strip_tags($datos['apellido']).
    "',cin ='". strip_tags($datos['cin'])."',direccion ='". strip_tags($datos['direccion'])."',fecha_nac ='".$datos['fecha_nac'].
    "',ciudad_id ='". strip_tags($datos['ciudad_id'])."' where id=". strip_tags($datos['id']);
   $con->query($sql);
}
function borrarPersona($id,$con)
{
   // delete from ciudades where id == ID
    $sql="DELETE FROM  personas where id=".$id;
    $filas=$con->query($sql);
    return $filas;
}
function validarPersonas($datos){
    $errores=[];
    /*
    $valor1=$dato['id'];
    $valor2=$dato['nombre'];
    $valor3=$dato['apellido'];
    $valor4=$dato['cin'];
    $valor5=$dato['direccion'];
    $valor6=$dato['fecha_nac'];
    $valor7=$dato['ciudad_id'];
    */
    if (empty($datos['id'])){
        array_push($errores, "El campo id debe estar definido");
    }
    if ( !preg_match('/^[A-Za-z\s]+$/' ,$datos['nombre'])){
        array_push($errores, "El campo nombre no permite numeros ni simbolos");
    }
    if ( !preg_match('/^[A-Za-z\s]+$/' ,$datos['apellido'])){
        array_push($errores, "El campo apellido no permite numeros ni simbolos");
    }
    if ( !preg_match('/^[0-9]+$/', $datos['cin'])){
        array_push($errores, "El campo CIN no permite letras y simbolos");
    }
    if (empty($datos['direccion'])){
        array_push($errores, "El campo direccion debe estar definido");
    }
    if ( !preg_match('/^\d{4}-\d{2}-\d{2}$/', $datos['fecha_nac'])){
        array_push($errores, "La fecha de nacimiento ingresada esta mal definido");
    }
    if (is_nan($datos['ciudad_id'])){
        array_push($errores, "El campo ciudad id debe estar definido");
    }
    return  $errores;
}
function traerCiudadNombre($id,$con)
{
    $sql="SELECT nombre FROM ciudades where id=".$id;
    $filas=$con->query($sql);
    $dato=$filas->fetch_assoc();
    return $dato['nombre'] ;
}
function buscarPersona($tipo,$nombre,$con)
{
    $nombre=trim($nombre);
    $sql= "SELECT * FROM `personas` WHERE ". $tipo."='" . $nombre . "'";
    $filas=$con->query($sql);
    return $filas;
}
?>