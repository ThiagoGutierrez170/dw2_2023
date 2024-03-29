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
<?php
if (isset($_GET['b'])) {
    $mensaje ="se ha borrado correctamente";
    echo '<script>alert("' . $mensaje . '");</script>';
}
?>
    <h1>Ciudades</h1>
        <form action="index.php?mod=busciudad" method="post">
           <label>Nombre de la ciudad: </label>
           <input type="text" id="nombre" name="nombre" required value="" />
           <button type="submit">buscar</button>
        </form>
        <a href="index.php?mod=newciudad">Nuevo</a>
    <table border=1 class="table table-dark table-striped">
        <thead>
            <tr>
                <th><a href="index.php?mod=ciudades&&orden=id">Id</a></th>
                <th><a href="index.php?mod=ciudades&&orden=nombre">Nombre</a></th>
                <?php 
    if (!($_SESSION['rol_id']>1)) {
    ?>  
                <th>Editar</th>
                <th>Borrar</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
                <?php
                if(isset($_GET['orden'])){
                    if (($_GET['orden'])=="nombre")  {
                        $item='nombre';
                    }
                    if (($_GET['orden'])=="id")  {
                        $item='id';
                    }
                    $resultado = $conn->query("SELECT id, nombre FROM ciudades");
                    // Convertir el objeto mysqli_result en un arreglo
                    $datos = $resultado->fetch_all(MYSQLI_ASSOC);
                    // Extraer la columna 
                    $columnaId = array_column($datos, $item);
                    // Ordenar el arreglo $datos basado en la columna 'id' o nombre
                    array_multisort($columnaId, SORT_ASC, $datos);
                }
                
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
        </tbody>    
    </table>
</body>
</html>