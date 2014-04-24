<?php
    header('Content-Type: text/html; charset=ISO-8859-1'); 
    
    include '../lib/includeLibs.php';
    include 'controller.php';
    include 'Usuario/ControllerUsuario.php';
    
    $itm=$_POST["itm"];
    $objUsuario=new ControllerUsuario();
    //control de los casos
    switch($itm){
        //recive los parametros de javascripts
        //guarda los valores del activo fijo
        case "Guardar":
            $nombre = utf8_decode($_POST["nomActivo"]);
            $stock = $_POST["stockActivo"];
            $categoria = $_POST["categActivo"];
            $detalle = utf8_decode($_POST["detActivo"]);
            echo $mgs=$objUsuario->guardarActivo($nombre,$stock,$categoria,$detalle);
        break;

        case "editar":
            $idActivo = $_POST["idActivo"];
            $nombre = utf8_decode($_POST["nomEditActivo"]);
            $stock = $_POST["stockEditActivo"];
            $categoria = $_POST["categEditActivo"];
            $detalle = utf8_decode($_POST["detEditActivo"]);
            echo $mgs=$objUsuario->editarActivo($idActivo,$nombre,$stock,$categoria,$detalle);
        break;
    
        case "eliminar":
            $idActivo = $_POST["idActivo"];
            echo $mgs=$objUsuario->eliminarActivo($idActivo);
        break;
    
 
    }
    

?>
