<?php
 include("../libs/conex.php");
 include("../libs/personas.lib.php");
 if ($_POST)
 {
    if ($_POST['nombre'])
        {
        if ($_POST['id']==-1){
        agregarCiudad($_POST,$conn);  
        }  else {
        editarCiudad($_POST,$conn);
        }
        }
 }
 header('Location:../index.php? mod=personas');
 //<p>soy guardar</p>
?>