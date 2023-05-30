<?php
include("../libs/conex.php");
include("../libs/ciudades.lib.php");
if ($_POST and $_POST['id'])
    {
       // echo $_GET['id'];
        borrarCiudad($_POST['id'],$conn);
        //echo "<pre>";
        //$dato=$rs->fetch_assoc();
        //echo "</pre>";
    }
  header('Location:../index.php?mod=ciudades');   
    
    