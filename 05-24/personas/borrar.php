<?php
//include("../libs/conex.php");
//include("../libs/ciudades.lib.php");
if ($_GET and $_GET['id'])
    {
       // echo $_GET['id'];
        borrarPersona($_GET['id'],$conn);
        //echo "<pre>";
        //$dato=$rs->fetch_assoc();
        //echo "</pre>";
    }
  header('Location:../05-24/index.php?mod=personas');   
  //<p>soy borrar</p>
    ?>