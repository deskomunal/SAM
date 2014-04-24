<?php

    require_once('../lib/includeLibs.php');
    require_once('../class/ambiente.class.php');
    $class = new ambiente;
    $itm=$_GET['var'];
    switch ($itm){
        case "mostrar": echo $class->Display(); break;
        case "edit": echo $class->editar();break;
    }
    
?>