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
    <a href="index.php?mod=personas">Volver</a>
        <form action="index.php?mod=buspersona" method="post">
           <label><h3>Buscador: </h3></label>
           <select name="tipo" id="tipo">
            <option value="nombre">Por Nombre</option>
            <option value="apellido">Por Apellido</option>
            <option value="cin">Por CIN</option>
            <option value="direccion">Por direccion</option>
           </select>
           <input type="text" id="nombre" name="nombre" required value="" />
           <button type="submit">buscar</button>
        </form>
    
    <table border=1 class="table table-dark table-striped">
                <?php
                    $rs = buscarPersona( $_POST['tipo'],$_POST['nombre'], $conn);
                    $dato = $rs->fetch_assoc();
                    if (!isset($dato['id'])) { ?>
                    <h2 style="color: red">No se encontró ninguna coincidencia en la búsqueda</h2>
                <?php } else { ?>
                    <a href="index.php?mod=newpersona">Nuevo</a>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>CIN</th>
                <th>Direccion</th>
                <th>Fecha de nacimiento</th>
                <th>Ciudad ID</th>
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
                <td><?php echo traerCiudadNombre($d['ciudad_id'],$conn);  ?> </td>
                <td><a href="index.php?mod=edtpersona&&id=<?php  echo $d['id'];  ?>">Editar</a> </td>
                <td><a href="index.php?mod=confpersona&&id=<?php  echo $d['id'];  ?>">Borrar</a> </td>
            </tr>
               <?php 
               }
               ?> 
        <?php } ?> 
        </tbody>    
    </table>
</body>
</html>