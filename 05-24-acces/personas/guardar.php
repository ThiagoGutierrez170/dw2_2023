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
            /*
    $valor1=$dato['id'];
    $valor2=$dato['nombre'];
    $valor3=$dato['apellido'];
    $valor4=$dato['cin'];
    $valor5=$dato['direccion'];
    $valor6=$dato['fecha_nac'];
    $valor7=$dato['ciudad_id'];
    */
            header('Location:../index.php?mod=newpersona&&id='.$_POST['id'].'&nombre='.$_POST['nombre'].'&apellido='.
            $_POST['apellido'].'&cin='.$_POST['cin'].'&direccion='.$_POST['direccion'].'&fecha_nac='.$_POST['fecha_nac']
            .'&ciudad_id='.$_POST['ciudad_id'].'&errores='. urlencode(implode('!<br>', $err)));
            
        }
    }
 
 //<p>soy guardar</p>
?>