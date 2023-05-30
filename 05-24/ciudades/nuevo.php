<?php
$titulo="Insertar Ciudad";
if ($_GET and isset($_GET['id'])){
       // echo $_GET['id'];
        $titulo="Editar Ciudad";
        $rs=traerCiudad($_GET['id'],$conn);
        //echo "<pre>";
        $dato=$rs->fetch_assoc();
       // echo "</pre>";
    } else 
    {
        $dato['id']=-1;
        $dato['nombre']="";
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciudades - <?php echo $titulo; ?></title>
</head>
<body>
    <h3><?php echo $titulo; ?></h3>
    <div>
        <form action="index.php?mod=confciudad" method="post">
           <label>Nonbre de la ciudad</label><br>
           <input type="hidden" id="id" name="id" value="<?php 
                echo $dato['id'];
            ?>" />
           <input type="text" id="nombre" name="nombre" required value="<?php 
                echo $dato['nombre'];
            ?>" /> <br>
           <button type="submit">enviar</button>
           <a href="index.php?mod=ciudades">Volver</a>    

        </form>

    </div>
</body>
</html>