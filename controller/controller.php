<?php
$template =  includeLibs::coneccion();
class controller
{
	public function siguiente($id_valor,$from_valor){
		$query=new query;
		//$resValor;
		//$valor;
                $valor[]=array();
		$resValor = $query->getRow("select max($id_valor) as valor from $from_valor");
		$valor =$resValor['valor']+1;
		return $valor;
	}
        
        /*public function sigVarCad($id_valor,$from_valor,$where_valor) 
	{
		$query=new query;
		//$resValor=0;
		$valorCad[]=array();
                $codAlm=$_SESSION['idofi'];
		$resValorCad = $query->getRow("select max(to_number(substring(idmat,5),'99999')) as valor from $from_valor","where $where_valor=$codAlm");
		$valorCad =$resValorCad['valor']+1;
		return $valorCad;
	}*/
        
        public function repetidos($id_nom,$nom_valor,$from_valor) 
	{
		$query=new query;
		$resVar = $query->getRow("select ($id_nom like '$nom_valor') as valor from $from_valor where ($id_nom like '$nom_valor')='1'");
                if($resVar['valor']==1){
                    $rep=1;
                }else{
                    $rep=0;
                }
		return $rep;
	}
        /*
        
        public function repetidosNum($id_nom,$nom_valor,$from_valor){ 
            $query=new query; 
            $resVar = $query->getRow("select ($id_nom = '$nom_valor') as valor from $from_valor where ($id_nom = '$nom_valor')='t'"); 
            if($resVar[valor]==true){
                $rep=true;
            }
            else{
                $rep=false;
            } 
            return $rep; 
        }*/
        
        //verifica el mes y si es bisiento o no 
    function controlMes($mes,$anio){
        if($mes==2){
            if(checkdate(02,29,$anio)){
                $mesfin='29-'.$mes.'-'.$anio;
            }else{
                $mesfin='28-'.$mes.'-'.$anio;
            }
        }
        if($mes==1 || $mes==3 || $mes==5 || $mes==7 || $mes==8 || $mes==10 || $mes==12){
            $mesfin='31-'.$mes.'-'.$anio;
        }
        if($mes==4 || $mes==6 || $mes==9 || $mes==11){ 
            $mesfin='30-'.$mes.'-'.$anio;
        } 
        return $mesfin;
    }
    
    function vacio($valor){
        if($valor==''){
            $rest=0;
        }else{
            $rest=$valor;
        }
        return $rest;
    }
}
?>