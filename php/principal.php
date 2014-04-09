<?php
require_once('../lib/includeLibs.php');
require_once('../class/principal.class.php');
$class = new principal;
/*$itm=$_GET['nom'];
switch($itm) {
        //control de logueo
        case "login": $class->login();break;
        //formulario principal
        //default: echo $class->Display();break;
        case "salir": $class->salir();break;
}*/
echo $class->Display();

?>