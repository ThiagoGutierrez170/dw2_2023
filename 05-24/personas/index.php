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
                <th><a href="index.php?mod=personas&&orden=id">Id</a></th>
                <th><a href="index.php?mod=personas&&orden=nombre">Nombre</a></th>
                <th><a href="index.php?mod=personas&&orden=apellido">Apellido</a></th>
                <th><a href="index.php?mod=personas&&orden=cin">CIN</a></th>
                <th><a href="index.php?mod=personas&&orden=direccion">Direccion</a></th>
                <th>Fecha de nacimiento</th>
                <th>Ciudad ID</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
           
                <?php
                if(isset($_GET['orden'])){
                    if (($_GET['orden'])=="nombre")  {
                        $item='nombre';
                    }
                    if (($_GET['orden'])=="apellido")  {
                        $item='apellido';
                    }
                    if (($_GET['orden'])=="cin")  {
                        $item='cin';
                    }
                    if (($_GET['orden'])=="direccion")  {
                        $item='direccion';
                    }
                    if (($_GET['orden'])=="id")  {
                        $item='id';
                    }
                    
                    $resultado = $conn->query("SELECT id, nombre, apellido, cin, direccion, fecha_nac, ciudad_id FROM personas");

                    // Convertir el objeto mysqli_result en un arreglo
                    $datos = $resultado->fetch_all(MYSQLI_ASSOC);

                    // Extraer la columna 'id' en un arreglo separado
                    $columnaId = array_column($datos, $item);

                    // Ordenar el arreglo $datos basado en la columna 'id'
                    array_multisort($columnaId, SORT_ASC, $datos);
                }
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