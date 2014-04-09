<?php
    //require_once('../lib/includeLibs.php');
class session{
    function controlSession(){
        if($_SESSION['logeado'] == 1){
            if($_SESSION['tipo'] == 0){
                $template->SetParameter('pagina',$this ->Pagina($parm));
            }
        }else{
            echo "<script>window.location.href='../php/index.php'</script>";
        }
    }

    function salir()
    {
        session_start();
        session_unset();
         session_destroy();
         header("location:../php/index.php");

    }
}
?>