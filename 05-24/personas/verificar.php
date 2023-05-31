<?php
if (isset($_GET['id']) && isset($_GET['delnombre']) && isset($_GET['delapellido'])
&& isset($_GET['delcin']) && isset($_GET['deldireccion']) && isset($_GET['delfecha_nac'])
&& isset($_GET['delciudad_id'])) {
    $valor1=$_GET['id'];
    $valor2=$_GET['delnombre'];
    $valor3=$_GET['delapellido'];
    $valor4=$_GET['delcin'];
    $valor5=$_GET['deldireccion'];
    $valor6=$_GET['delfecha_nac'];
    $valor7=$_GET['delciudad_id'];
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
    <h1>¿Está seguro de borrar?</h1>
    <form id="myForm" action="personas/borrar.php" method="post">
    <input type="hidden" id="id" name="id" value="<?php 
                echo $valor1;
            ?>" />
           <input type="text" id="nombre" name="nombre"  value="<?php 
                echo $valor2;
            ?>" /> <br>
            <label>Apellido</label><br>
            <input type="text" id="apellido" name="apellido"  value="<?php 
                echo $valor3;
            ?>" /> <br>
            <label>CIN</label><br>
            <input type="text" id="cin" name="cin"  value="<?php 
                echo $valor4;
            ?>" /> <br>
            <label>Direccion</label><br>
            <input type="text" id="direccion" name="direccion"  value="<?php 
                echo$valor5;
            ?>" /> <br>
            <label>Fecha de nacimiento</label><br>
            <input type="date" id="fecha_nac" name="fecha_nac"  value="<?php 
                echo $valor6;
            ?>" /> <br>
            <label>Ciudad ID</label><br>
            <input type="number" id="ciudad_id" name="ciudad_id"  value="<?php 
                echo $valor7;
            ?>" /> <br>
            <button type="submit">Sí</button>
    </form>
    <a href="index.php?mod=personas">Volver</a>
    </body>
    </html>
    <?php
}
else{
    $seleccion = isset($_POST['seleccion']) ? $_POST['seleccion'] : '';
    $valor1=$_POST['id'];
    $valor2=$_POST['nombre'];
    $valor3=$_POST['apellido'];
    $valor4=$_POST['cin'];
    $valor5=$_POST['direccion'];
    $valor6=$_POST['fecha_nac'];
    $valor7=$_POST['ciudad_id'];
    

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
<h1>¿Está seguro de hacer cambios?</h1>
    <form id="myForm" action="personas/guardar.php" method="post">
        <input type="hidden" name="seleccion" value="si">
        
           <input type="hidden" id="id" name="id" value="<?php 
                echo $valor1;
            ?>" />
           <input type="text" id="nombre" name="nombre" required value="<?php 
                echo $valor2;
            ?>" /> <br>
            <label>Apellido</label><br>
            <input type="text" id="apellido" name="apellido" required value="<?php 
                echo $valor3;
            ?>" /> <br>
            <label>CIN</label><br>
            <input type="text" id="cin" name="cin" required value="<?php 
                echo $valor4;
            ?>" /> <br>
            <label>Direccion</label><br>
            <input type="text" id="direccion" name="direccion" required value="<?php 
                echo$valor5;
            ?>" /> <br>
            <label>Fecha de nacimiento</label><br>
            <input type="date" id="fecha_nac" name="fecha_nac" required value="<?php 
                echo $valor6;
            ?>" /> <br>
            <label>Ciudad ID</label><br>
            <input type="number" id="ciudad_id" name="ciudad_id" required value="<?php 
                echo $valor7;
            ?>" /> <br>
           <button type="submit">Sí</button>
    </form>
    <a href="index.php?mod=personas">Volver</a>
    
</body>
</html>
<?php } ?>