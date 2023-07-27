<?php
function traernotas($con){
    $sql="SELECT * FROM nota";
    $filas=$con->query($sql);
    return $filas;
}
function traernota($id,$con)
{
    $sql="SELECT * FROM nota where id=".$id;
    $filas=$con->query($sql);
    return $filas;
}
function agregarnota($datos,$con)
{
    $dato1=mysqli_real_escape_string($con, strip_tags($datos['titulo']));
    $dato2=mysqli_real_escape_string($con, strip_tags($datos['contenido']));
    
    $sql = "INSERT INTO nota (titulo, contenido, gru_id) VALUES ('".$dato1."', '".$dato2."', '".$datos['gru_id']."')";
    if (!$con->query($sql)) {
        printf("Errormessage: %s\n", $con->error);
    }
}
?>