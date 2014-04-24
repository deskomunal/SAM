<?php

    require_once('../lib/includeLibs.php');
    require_once('../class/usuario.class.php');
    $class = new usuario;
    $itm=$_GET['var'];
    switch ($itm){
        case "mostrar": echo $class->Display(); break;
        case "edit": echo $class->editar();break;
    }
    
?>