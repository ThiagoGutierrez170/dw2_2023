<?php
// include("../libs/conex.php");
// include("../libs/ciudades.lib.php");
$titulo="Insertar Personas";
if ($_GET and $_GET['id']){
       // echo $_GET['id'];
        $titulo="Editar Persona";
        $rs=traerPersona($_GET['id'],$conn);
        //echo "<pre>";
        $dato=$rs->fetch_assoc();
       // echo "</pre>";
    } else 
    {
        $dato['id']=-1;
        $dato['nombre']="";
        $dato['apellido']="";
        $dato['cin']="";
        $dato['direccion']="";
        $dato['fecha_nac']="";
        $dato['ciudad_id']="";
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas - <?php echo $titulo; ?></title>
</head>
<body>
    <h3><?php echo $titulo; ?></h3>
    <div>
        <form action="personas/guardar.php" method="post">
           <label>Nonbre de la ciudad</label><br>
           <input type="hidden" id="id" name="id" value="<?php 
                echo $dato['id'];
            ?>" />
           <input type="text" id="nombre" name="nombre" required value="<?php 
          // if (isset($dato['nombre'])) { echo $dato['nombre']; }
                echo $dato['nombre'];
            ?>" /> <br>
            <input type="text" id="apellido" name="apellido" required value="<?php 
          // if (isset($dato['nombre'])) { echo $dato['nombre']; }
                echo $dato['apellido'];
            ?>" /> <br>
            <input type="text" id="cin" name="cin" required value="<?php 
          // if (isset($dato['nombre'])) { echo $dato['nombre']; }
                echo $dato['cin'];
            ?>" /> <br>
            <input type="text" id="direccion" name="direccion" required value="<?php 
          // if (isset($dato['nombre'])) { echo $dato['nombre']; }
                echo $dato['direccion'];
            ?>" /> <br>
            <input type="date" id="fecha_nac" name="fecha_nac" required value="<?php 
          // if (isset($dato['nombre'])) { echo $dato['nombre']; }
                echo $dato['fecha_nac'];
            ?>" /> <br>
            <input type="number" id="ciudad_id" name="ciudad_id" required value="<?php 
          // if (isset($dato['nombre'])) { echo $dato['nombre']; }
                echo $dato['ciudad_id'];
            ?>" /> <br>
            
           <button type="submit">Enviar</button>
           <a href="index.php?mod=personas">Volver</a>    

        </form>

    </div>
</body>
</html>