<?php
 include("../libs/conex.php");
 include("../libs/personas.lib.php");
 if ($_POST){
    //if ($_POST['nombre']){
        $err=validarPersonas($_POST);
        if (count($err)==0){
            if ($_POST['id']==-1){
                agregarPersona($_POST,$conn);  
            }  
            else {
                editarPersona($_POST,$conn);
            }
            header('Location:../index.php? mod=personas');
        }
        else{
            
            header('Location:../index.php?mod=newpersona&&id='.$_POST['id'].'&&errores='. urlencode(implode('!<br>', $err)));
            
        }
    }
 
 //<p>soy guardar</p>
?>