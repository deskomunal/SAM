<?php
    $ruta="../uploads/images/";
    $name = "imagen_".time();
    foreach ($_FILES as $key) {
        
    //if($key['error'] == UPLOAD_ERR_OK ){//Verificamos si se subio correctamente
        $nombre = $key['name'];//Obtenemos el nombre del archivo
        $ext=substr($nombre, -3);
        $no="imagen_".time();
        $nomImges=$no.'.'.$ext;
        $temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
        $tamano= ($key['size'] / 1000)."Kb"; //Obtenemos el tamaño en KB
        move_uploaded_file($temporal, $ruta . $nomImges); //Movemos el archivo temporal a la ruta especificada
        echo $ruta.''.$nomImges;
        
    }
?>