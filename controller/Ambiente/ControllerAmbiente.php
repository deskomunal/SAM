<?php
    //$template=  includeLibs::coneccion();
    class ControllerAmbiente{
        //funcion q guarda el activo a la base de datos
        function guardarActivo($nombre,$stock,$categoria,$detalle){
            $obj=new controller;  //crea el objeto al controlle
            $codActivo=$obj->siguiente('iddetactivo','detalle_activo_fijo');   //genera el id
            $Verificar=$obj->repetidos('nomdetactivo',$nombre,'detalle_activo_fijo');   //verifica replicas
            if($Verificar=='1'){
                return 2;
            }else{
                $pdo = null;
                try {
                    $pdo = includeLibs::conectaDb();
                    //prepara el guardado del cliente
                    $queryActivo = "INSERT INTO detalle_activo_fijo(iddetactivo,idcategoria,nomdetactivo,desdetactivo,stock) 
                                    VALUES (?, ?, ?, ?, ?)";
                    $stmActivo = $pdo->prepare($queryActivo);
                    $stmActivo->bindParam(1,$codActivo);
                    $stmActivo->bindParam(2,$categoria);
                    $stmActivo->bindParam(3,$nombre);
                    $stmActivo->bindParam(4,$detalle);
                    $stmActivo->bindParam(5,$stock);

                    $pdo->beginTransaction();
                        $stmActivo->execute();
                    // Confirmar Transaccion
                    $pdo->commit();
                    return 1;
                }catch (Exception $e){
                    $pdo->rollBack();
                    $e->getMessage();
                    return $e;
                }
            }

        }
        //---
        //funcion q edita el activo en la base de datos
        function editarActivo($idActivo,$nombre,$stock,$categoria,$detalle){
            $pdo = null;
            try {
                $pdo = includeLibs::conectaDb();
                $queryEdit = "UPDATE detalle_activo_fijo SET idcategoria=:idcategoria,nomdetactivo=:nomdetactivo,desdetactivo=:desdetactivo,stock=:stock WHERE iddetactivo=:iddetactivo";
                $stmEdit = $pdo->prepare($queryEdit);
                $stmEdit->bindParam(':iddetactivo',$idActivo);
                $stmEdit->bindParam(':idcategoria',$categoria);
                $stmEdit->bindParam(':nomdetactivo',$nombre);
                $stmEdit->bindParam(':desdetactivo',$detalle);
                $stmEdit->bindParam(':stock',$stock);
                
                $pdo->beginTransaction();
                    $stmEdit->execute();
                // Confirmar Transaccion
                $pdo->commit();
                return 1;
            
            }catch (Exception $e){
                $pdo->rollBack();
                $e->getMessage();
                return $e;
            }
        }
        //------------------------------------//
                //funcion q edita el activo en la base de datos
        function eliminarActivo($idActivo){
            $query = new query;
            $query->dbDelete("detalle_activo_fijo","where iddetactivo='$idActivo'");
            return 1;
        }
        //------------------------------------//
    }

?>
