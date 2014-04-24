<?php
header('Content-Type: text/html; charset=ISO-8859-1'); 
$template=  includeLibs::coneccion();
class index
{
    //carga la cabezera y menu inicial 
    function head(){
        $template = new template;
        $template->SetTemplate('../html/view/vista/menu/menuprincipal.htm');
        return $template->Display();
    }
    
    //carga la cabezera y menu inicial 
    function foot(){
        $template = new template;
        $template->SetTemplate('../html/view/vista/foot/foot.html');
        return $template->Display();
    }
    
    //carga el cuerpo de la pagina
    function formPrinciapl(){
        $template = new template;
        //$query=new query;
        //$resTotal=$query->getRows("f.nomfoto,f.titulofoto,f.detallefoto","fotos f");
        $template->SetTemplate('../html/view/vista/body/bodyP.html');
        
        return $template->Display();
    }
    
    //carga el cuerpo de la pagina
    function sindebar(){
        $template = new template;
        $template->SetTemplate('../html/view/vista/sindebarL/sindebarLP.html');
        return $template->Display();
    }
    
    //carga la cabeza el cuerpo y los pies de la pagina
    function verFormSesion(){
        $template = new template;
        $template->SetTemplate('../html/view/pagina.html');
        $template->SetParameter('head',$this->head());
        $template->SetParameter('sindebar',$this->sindebar());
        $template->SetParameter('body',$this->formPrinciapl());
        $template->SetParameter('foot',$this->foot());
        return $template->Display();
    }

    function PaginaSesion(){
        $template = new template;
        $template->SetTemplate('../html/index.html');
        $template->SetParameter('pagina',$this->verFormSesion());
        
	return $template->Display();
    } 
    
    //carga el cuerpo de la pagina
    //formulario login
    function FormLogin(){
        $template = new template;
        $template->SetTemplate('../html/view/vista/body/login.html');
        return $template->Display();
    }
    
    //carga la cabeza el cuerpo y los pies de la pagina
    function verForm(){
        $template = new template;
        $template->SetTemplate('../html/view/pagina.html');
        $template->SetParameter('head','');
        $template->SetParameter('sindebar','');
        $template->SetParameter('body',$this->FormLogin());
        $template->SetParameter('foot','');
        return $template->Display();
    }
    //carga la pagina base
    function Pagina(){
        $template = new template;
        $template->SetTemplate('../html/index.html');
        $template->SetParameter('pagina',$this->verForm());
        
	return $template->Display();
    }    

    function salir()
    {
         session_destroy();
         echo "<script>window.location.href='../php/index.php'</script>";
    }
    
    function Display(){
	$template = new template;
        //$sesion=new controlSession;
	$template->SetTemplate('../html/index.html'); //sets the template for this function
	$template->SetParameter('Keywords','php, sample, structure');//sets the parameters that uses the template
	$template->SetParameter('description','');//sets the parameters that uses the template
	$template->SetParameter('title','Bienvenidos!!');//sets the parameters that uses the template
        
        //controla la session
	if($_SESSION['logeado'] == 1){
                $template->SetParameter('pagina',$this ->PaginaSesion());
            //else {$template->SetParameter('navegacion',$this->showNavVenta());}
		//$template->SetParameter('usuario','<div><h3><label>Usuario: '.$_SESSION['nomlogin'].'</label></h3></div>');
        }else{
            $template->SetParameter('pagina',$this ->Pagina());
	}
        
	return $template->Display();
        
    }
}
?>