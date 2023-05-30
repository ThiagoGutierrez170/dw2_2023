<?php
include("../libs/conex.php");
include("../libs/ciudades.lib.php");
    if ($_POST) {
        if ($_POST['nombre']) {
            if ($_POST['id'] == -1) {
                agregarCiudad($_POST, $conn);
            } else {
                editarCiudad($_POST, $conn);
                ?><p><?php echo $_POST['id'] ?></p><?php
            }
            header('Location: ../index.php?mod=ciudades');
        }
    }
?>