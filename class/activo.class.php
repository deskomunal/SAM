<?php
header('Content-Type: text/html; charset=ISO-8859-1'); 
$template=  includeLibs::coneccion();
class activo
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
        $template = new template;   //crea un objeto de un template
        $query=new query;           //crea un objeto de coneccion
        $template->SetTemplate('../html/view/vista/ActivoFijo/formActivo.html');
        //hacemos la consulta a la base de datos a la tabla categoria
        $resCategoria=$query->getRows("select idcategoria, nomcategoria from categoria");
        foreach($resCategoria as $key=>$valor){
            $categoria .= '<option value="'.$valor['idcategoria'].'">'.$valor['nomcategoria'].'</option>';
        }
        //enviamos al html la lista de categoria
        $template->SetParameter('categoria', $categoria);
        
        $i=0;
        $ListActivo=$query->getRows("select d.iddetactivo,d.nomdetactivo,d.stock,d.desdetactivo,c.nomcategoria
                                       from detalle_activo_fijo d join categoria c on d.idcategoria=c.idcategoria");
        foreach($ListActivo as $k=>$v){
            $i++;
            $list .= '<tr class="info">
                        <td>'.$i.'</td>
                        <td>'.utf8_decode($v['nomdetactivo']).'</td>
                        <td>'.$v['nomcategoria'].'</td>
                        <td>'.$v['stock'].'</td>
                        <td>'.utf8_decode($v['desdetactivo']).'</td>
                        <td><a href="#" class="cForGen" title="Modificar" onclick="popupCssShow(\'../php/activo.php?var=edit&id='.$v["iddetactivo"].'\',\'\'); return false;"><i class="icon-edit"></i></a></td>
                        <td><a href="#" title="Eliminar" onclick="eliminarActivo('.$v["iddetactivo"].');"><i class="icon-trash"></i></a></td>
                     </tr>';
        }
        
        $template->SetParameter('listaActivo', $list);
        return $template->Display();
    }
    
    //carga el cuerpo de la pagina
    function sindebar(){
        $template = new template;
        $template->SetTemplate('../html/view/vista/sindebarL/sindebarLP.html');
        return $template->Display();
    }
    
    //carga la cabeza el cuerpo y los pies de la pagina
    function verForm(){
        $template = new template;
        $template->SetTemplate('../html/view/pagina.html');
        $template->SetParameter('head',$this->head());
        $template->SetParameter('sindebar',$this->sindebar());
        $template->SetParameter('body',$this->formPrinciapl());
        $template->SetParameter('foot',$this->foot());
        return $template->Display();
    }
    
    //carga a la pagina index todos los elementos
    function Pagina(){
        $template = new template;
        $template->SetTemplate('../html/index.html');
        $template->SetParameter('pagina',$this->verForm());
        
	return $template->Display();
    } 
  
    //mostrar el formulario para edicion
    function editar(){
        $template = new template;
        $query=new query;
        $id=$_GET['id'];
        $template->SetTemplate('../html/view/vista/ActivoFijo/editActivo.html');
        $ListActivo=$query->getRow("select d.iddetactivo,d.nomdetactivo,d.stock,c.idcategoria,d.desdetactivo,c.nomcategoria
                                       from detalle_activo_fijo d join categoria c on d.idcategoria=c.idcategoria
                                       where d.iddetactivo='$id'");
        
        $template ->SetParameter('id',$ListActivo['iddetactivo']);
        $template ->SetParameter('nombre',utf8_decode($ListActivo['nomdetactivo']));
        $template ->SetParameter('stock',$ListActivo['stock']);
        $template ->SetParameter('detalle',utf8_decode($ListActivo['desdetactivo']));
        
        
        //-------------------------------carga la marca-----------------------------------------------------------
        $resCat=$query->getRows("select idcategoria,nomcategoria from categoria order by nomcategoria");
        foreach($resCat as $key=>$valor)
        {
                $check = '';
                if($valor['idcategoria'] == $ListActivo['idcategoria'])
                        $check = 'selected';
                        $Cat .= '<option '.$check.' value="'.$valor['idcategoria'].'">'.$valor['nomcategoria'].'</option>';
        }
        $template->SetParameter('categoriaedit',$Cat);
        
        //$template ->SetParameter('detalle',$ListActivo['desdetactivo']);
        return $template->Display();
        
    }
    //fusiona todos las plantillas
    function Display(){
	$template = new template;
        //$sesion=new controlSession;
	$template->SetTemplate('../html/index.html'); //sets the template for this function
	//$template->SetParameter('Keywords','php, sample, structure');//sets the parameters that uses the template
	//$template->SetParameter('description','');//sets the parameters that uses the template
	$template->SetParameter('title','Activo Fijo');//sets the parameters that uses the template
        
        //controla la session
	if($_SESSION['logeado'] == 1){
                $template->SetParameter('pagina',$this ->Pagina());
            //else {$template->SetParameter('navegacion',$this->showNavVenta());}
		//$template->SetParameter('usuario','<div><h3><label>Usuario: '.$_SESSION['nomlogin'].'</label></h3></div>');
        }else{
            header("location:../php/index.php");
	}
        
	return $template->Display();
        
    }
}
?>