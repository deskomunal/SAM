<?php
require_once('../lib/includeLibs.php');
    try {

        $login=  includeLibs::coneccion();
        $login = new login();
        //enviando datos para validar
        $iduser = $login->validate($_POST['login'],$_POST['password']);
        if($iduser=="false"){
            throw new Exception("contraseña incorrecta");
        }else{
            $login->loginUser($iduser);
            $target="../php/index.php";
        }
    } catch (Exception $e) {
        $mensaje=$e->getMessage();
        $target="../php/index.php";

        echo "<script>alert($mensaje);</script>";
    }   
    header("location:$target");
?>