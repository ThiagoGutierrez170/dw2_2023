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
           <label>Nonbre de la ciudad: </label>
           <input type="text" id="nombre" name="nombre" required value="" />
           <button type="submit">buscar</button>
        </form><br>
    <table border=1>
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
                    $rs = buscarCiudad($_POST['nombre'], $conn);
                    $dato = $rs->fetch_assoc();
                ?>
                    <tr>    
                        <td><?php echo $dato['id']; ?></td>
                        <td><?php echo $dato['nombre']; ?></td>
                        <td><a href="index.php?mod=edtciudad&&id=<?php echo $dato['id']; ?>">Editar</a></td>
                        <td><a href="index.php?mod=confciudad&&id=<?php echo $dato['nombre']; ?>">Borrar</a></td>
                    </tr>
        </tbody>    
    </table>
</body>
</html>