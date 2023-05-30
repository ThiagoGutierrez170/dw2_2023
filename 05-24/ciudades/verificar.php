<?php
if (isset($_GET['delid']) && isset($_GET['delnombre'])) {
    $delid = $_GET['delid'];
    $delnombre = $_GET['delnombre'];
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
    <form id="myForm" action="ciudades/borrar.php" method="post">
        <input type="hidden" name="seleccion" value="si">
        <input type="text" id="id" name="id" value="<?php echo $delid; ?>">
        <input type="text" id="nombre" name="nombre" value="<?php echo $delnombre; ?>">
        <button type="submit">Sí</button>
    </form>
    <a href="index.php?mod=ciudades">Volver</a>
    <p><?php echo $delid; ?></p>
    <p><?php echo $delnombre; ?></p>
    </body>
    </html>
    <?php
}
else{
    $seleccion = isset($_POST['seleccion']) ? $_POST['seleccion'] : '';
    $valor1=$_POST['id'];
    $valor2=$_POST['nombre'];

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
    <form id="myForm" action="ciudades/guardar.php" method="post">
        <input type="hidden" name="seleccion" value="si">
        <input type="text" id="id" name="id" value="<?php echo $valor1; ?>">
        <input type="text" id="nombre" name="nombre" value="<?php echo $valor2; ?>">
        <button type="submit">Sí</button>
    </form>
    <a href="index.php?mod=ciudades">Volver</a>
    
</body>
</html>
<?php } ?>