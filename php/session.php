<?php
//require_once('../lib/includeLibs.php');
include '../controller/controlSession.php';

$class = new session;
$itm=$_GET['nom'];
switch($itm) {
        //control de logueo
        case "salir": $class->salir();break;
        //formulario principal
        //default: echo $class->Display();break;
        //case "salir": $class->salir();break;
}
?>