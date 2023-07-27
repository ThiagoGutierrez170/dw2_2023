<?php
include("../libs/conex.php");
include("../libs/personas.lib.php");
if ($_POST and $_POST['id'])
    {
       // echo $_GET['id'];
        borrarPersona($_POST['id'],$conn);
        //echo "<pre>";
        //$dato=$rs->fetch_assoc();
        //echo "</pre>";
    }
  header('Location:../index.php?mod=personas&b');   
  //<p>soy borrar</p>
    ?>