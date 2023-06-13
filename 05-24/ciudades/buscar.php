<?php
// include("libs/conex.php");
// include("libs/ciudades.lib.php");
$datos=traerCiudades($conn);
//echo "<pre>";
// foreach($datos as $d)
// {
//  print_r($d);
// }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciudades</title>
</head>
<body>
    <h1>Ciudades</h1>
    <a href="index.php?mod=ciudades">Volver</a>
    <form action="index.php?mod=busciudad" method="post">
           <label>Nombre de la ciudad: </label>
           <input type="text" id="nombre" name="nombre" required value="" />
           <button type="submit">buscar</button>
        </form><br>
    <table border=1 class="table table-dark table-striped">
    <?php
    $rs = buscarCiudad($_POST['nombre'], $conn);
    $dato = $rs->fetch_assoc();
    if (!isset($dato['id'])) { ?>
        <h2 style="color: red">No se encontró ninguna coincidencia en la búsqueda</h2>
    <?php } else { ?>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($datos as $d) {
                ?>
             <tr>    
                <td><?php echo $d['id'];  ?> </td>
                <td><?php echo $d['nombre'];  ?></td>
                <td><a href="index.php?mod=edtciudad&&id=<?php  echo $d['id'];  ?>">Editar</a> </td>
                <td><a href="index.php?mod=confciudad&&id=<?php  echo $d['id'];  ?>">Borrar</a> </td>
            </tr>
               <?php 
                }
               ?> 
    <?php } ?>     
        </tbody>    
    </table>
</body>
</html>