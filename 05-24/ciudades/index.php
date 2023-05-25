<?php
include("libs/conex.php");
include("libs/ciudades.lib.php");
$datos=traerciudades($conn);
//echo "<pre>";
/*foreach($datos as $d){
    print_r($d);
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ciudades</h1>
    <a href="nuevo.php">Nuevo</a>
    <table border=1>
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($datos as $d){
            ?>
            <tr>
                <th><?php echo $d['id'] ?></th>
                <th><?php echo $d['nombre'] ?></th>
                <th><a href="nuevo.php? id="><?php echo $d['id'] ?>Editar</a></th>
                <th><?php echo $d['nombre'] ?></th>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>