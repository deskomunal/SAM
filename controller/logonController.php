<?php
require_once('../lib/includeLibs.php');
        try {
            $login=  includeLibs::coneccion();
            $user=$_POST['login'];
            $passw=$_POST['password'];
            $login = new login;
            $iduser = $login->validate($_POST['login'],$_POST['password']);
            if($iduser<>'f1' and $iduser<>'f2'){
                /* Si aceptamos recordar los datos */
                if($_POST['recordar']=="recordar"){
                    setcookie ("coduser", $user, time () + 3600*24*365);
                    setcookie ("codpass", $passw, time () + 3600*24*365);
                }else{
                    if (($_COOKIE['coduser'])!='') {
                        setcookie ("coduser", '', time () + 3600*24*365);
                    setcookie ("codpass", '', time () + 3600*24*365);
                    }else{
                        setcookie ("coduser", '', time () + 3600*24*365);
                    setcookie ("codpass", '', time () + 3600*24*365);
                    }
                }
                $login->loginUser($iduser);
            }
            if($iduser=='f1'){  
                throw new Exception("Contrase?a incorrecta. Vuelva a intentar.");
                $target="../php/index.php";
            }
            if($iduser=='f2'){  
                throw new Exception("Nombre de usuario y/o contrase?a incorrectos. Vuelva a intentar.");
                $target="../php/index.php";
            }    
        } catch (Exception $e) {
            $mensaje=$e->getMessage();
            $target="../php/index.php";
            //printf($mensaje);
	}  
        
    header("location:$target");
    
?>