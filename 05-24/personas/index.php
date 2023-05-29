<?php
// include("libs/conex.php");
// include("libs/ciudades.lib.php");
$datos=traerPersonas($conn);
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
    <title>Personas</title>
</head>
<body>
    <h1>Personas</h1>
    <a href="index.php?mod=newpersona">Nuevo</a>
    <table border=1>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>CIN</th>
                <th>Direccion</th>
                <th>Fecha de nacimiento</th>
                <th>Ciudad</th>
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
                <td><?php echo $d['apellido'];  ?> </td>
                <td><?php echo $d['cin'];  ?> </td>
                <td><?php echo $d['direccion'];  ?> </td>
                <td><?php echo $d['fecha_nac'];  ?> </td>
                <td><?php echo $d['ciudad_id'];  ?> </td>
                <td><a href="index.php?mod=edtpersona&&id=<?php  echo $d['id'];  ?>">Editar</a> </td>
                <td><a href="index.php?mod=delpersona&&id=<?php  echo $d['id'];  ?>">Borrar</a> </td>
            </tr>
               <?php 
               }
               ?> 
        </tbody>    
    </table>
</body>
</html>