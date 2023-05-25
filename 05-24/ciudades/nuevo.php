<?php
include("../libs/conex.php");
include("../libs/ciudades.lib.php");
$datos=traerciudades($conn);
$titulo="insertar ciudad";
if ($_GET and ["id"]){
    $titulo="Editar ciudad";
    $dato=traerciudad($_GET["id"],$conn);
    echo "<pre>"
    $fila=$rs->
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
</head>
<body>
    <h3>agregar ciudad</h3>
    <div>
        <form action="guardar.php" method="post">
            <label>Nombre de la cidad</label><br>
            <input type="text" id="nombre" name="nombre" required value="<?php 
            if (insert)
            ?>"/><br>
            <button type="submit" >enviar</button>
            <a href="index.php">volver</a>
        </form>
    </div>
</body>
</html>