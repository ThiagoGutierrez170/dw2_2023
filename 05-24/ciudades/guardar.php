<?php
include("../libs/conex.php");
include("../libs/ciudades.lib.php");
    if ($_POST) {
        $err=validarCiudades($_POST);
        if (count($err)==0){
            
                if ($_POST['id'] == -1) {
                    agregarCiudad($_POST, $conn);
                } else {
                    editarCiudad($_POST, $conn);
                }
                header('Location: ../index.php?mod=ciudades');
            
        }
        else{
            header('Location:../index.php?mod=newciudad&&id='.$_POST['id'].'&&errores='. urlencode(implode('!<br>', $err)));
        }
    }
?>