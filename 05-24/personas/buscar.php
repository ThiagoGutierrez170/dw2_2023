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
        <form action="index.php?mod=busperonas" method="post">
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
    
    <table border=1>
                <?php
                    $rs = buscarPersona( $_POST['tipo'],$_POST['nombre'], $conn);
                    $dato = $rs->fetch_assoc();
                    if (!isset($dato['id'])) { ?>
                    <h2 style="color: red">No se encontró ninguna coincidencia en la búsqueda</h2>
                <?php } else { ?>
                    <a href="index.php?mod=newpersona">Nuevo</a>
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
           
                
             <tr>    
                <td><?php echo $dato['id'];  ?> </td>
                <td><?php echo $dato['nombre'];  ?></td>
                <td><?php echo $dato['apellido'];  ?> </td>
                <td><?php echo $dato['cin'];  ?> </td>
                <td><?php echo $dato['direccion'];  ?> </td>
                <td><?php echo $dato['fecha_nac'];  ?> </td>
                <td><?php echo traerCiudadNombre($dato['ciudad_id'],$conn);  ?> </td>
                <td><a href="index.php?mod=edtpersona&&id=<?php  echo $dato['id'];  ?>">Editar</a> </td>
                <td><a href="index.php?mod=confpersona&&id=<?php  echo $dato['id'];  ?>">Borrar</a> </td>
            </tr>
        <?php } ?> 
        </tbody>    
    </table>
</body>
</html>