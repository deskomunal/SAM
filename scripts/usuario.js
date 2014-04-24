function guardarActivo(){
    var nomActivo = document.getElementById("nomActivo").value;
    var stockActivo = document.getElementById("stockActivo").value;
    var categActivo = document.getElementById("categActivo").value;
    var detActivo = document.getElementById("detActivo").value;
    if(nomActivo==''){
        activoE.style.display = 'block';
        document.getElementById("activoE").innerHTML="Llene El nombre del Activo";
    }
    if(stockActivo==''){
        stockE.style.display = 'block';
        document.getElementById("stockE").innerHTML="Llene la cantidad de Stock";
    }
    if(categActivo=='s'){
        categoriaE.style.display = 'block';
        document.getElementById("categoriaE").innerHTML="Seleccione una Opcion";
    }
    if(nomActivo!='' && categActivo!='s' && stockActivo!=''){
        $.post("../controller/DetActivo.php",{itm:'Guardar',nomActivo:nomActivo,stockActivo:stockActivo,categActivo:categActivo,detActivo:detActivo},
            function(resul){
               if(resul==1){
                   //MensajeS.style.display = 'block';
                    $('#MensajeS').show();
                    $('#MensajeS').delay(2000).hide(3000);
                    document.getElementById("MensajeS").innerHTML="Guadado Satisfactoriamente";
                    limpiar();
                    $("#datatables").load(location.href+" #datatables>*","");
                }else{
                   if(resul==2){
                        //$('#activoE').show();
                        $('#activoE').delay(2000).hide(3000);
                       activoE.style.display = 'block';
                       document.getElementById("activoE").innerHTML="Ya existe el Activo Fijo";
                   }else{
                        $('#MensajeE').show();
                        $('#MensajeE').delay(2000).hide(3000);
                       //MensajeS.style.display = 'block';
                       document.getElementById("MensajeE").innerHTML="No se guardo";
                   }
                }
            }
        );
    }
}

function editarActivo(){
    var idActivo = document.getElementById("idActivo").innerHTML;
    var nomEditActivo = document.getElementById("nomEditActivo").value;
    var stockEditActivo = document.getElementById("stockEditActivo").value;
    var categEditActivo = document.getElementById("categEditActivo").value;
    var detEditActivo = document.getElementById("detEditActivo").value;
    if(nomEditActivo==''){
        activoEE.style.display = 'block';
        document.getElementById("activoEE").innerHTML="Llene El nombre del Activo";
    }
    if(stockEditActivo==''){
        stockEE.style.display = 'block';
        document.getElementById("stockEE").innerHTML="Llene la cantidad de Stock";
    }
    if(categEditActivo=='s'){
        categoriaEE.style.display = 'block';
        document.getElementById("categoriaEE").innerHTML="Seleccione una Opcion";
    }
    
    if(nomEditActivo!='' && categEditActivo!='s' && stockEditActivo!=''){
        $.post("../controller/DetActivo.php",{itm:'editar',idActivo:idActivo,nomEditActivo:nomEditActivo,stockEditActivo:stockEditActivo,categEditActivo:categEditActivo,detEditActivo:detEditActivo},
            function(resul){
                if(resul==1){
                    $('#MensajeGenerico').show();
                    $('#MensajeGenerico').delay(700).hide(3000);
                    document.getElementById("MensajeGenerico").innerHTML="Editado Satisfactoriamente";
                    //document.getElementById("MensajeS").innerHTML="Editado Satisfactoriamente";
                    $("#datatables").load(location.href+" #datatables>*","");
                    popupCssHide();
                    //$("#refr").load(location.href+" #refr>*","");
                    }else{
                        alert(resul);
                        //document.getElementById("MensajeS").innerHTML="No se guardo";
                    }
            }
        );
    }
}

function eliminarActivo(id){
   
    $.post("../controller/DetActivo.php",{itm:'eliminar',idActivo:id},
        function(resul){
            if(resul==1){
                $('#MensajeGenerico').show();
                $('#MensajeGenerico').delay(700).hide(3000);
                document.getElementById("MensajeGenerico").innerHTML="Eliminado Satisfactoriamente";
                $("#datatables").load(location.href+" #datatables>*","");
            }else{
                //alert(resul);
                //document.getElementById("MensajeS").innerHTML="No se guardo";
            }
        }
    );

}

//controla los campos del activo con mensajes de error o de validacion
function VeriActivo(valor){
     if(valor==''){
        activoE.style.display = 'block';
        document.getElementById("activoE").innerHTML="Llene el nombre del Activo";
    }else{ 
        //activoS.style.display = 'block';
        activoE.style.display = 'none';
        //document.getElementById("activoS").innerHTML="Bien Hecho!";
    }
}

function VeriStock(valor){
    if(valor==''){
        stockE.style.display = 'block';
        document.getElementById("stockE").innerHTML="Llene la cantidad de Stock";
    }else{ 
        //stockS.style.display = 'block';
        stockE.style.display = 'none';
        //document.getElementById("stockS").innerHTML="Bien Hecho!";
    }
}

function VeriCategoria(valor){
     if(valor=='s'){
        categoriaE.style.display = 'block';
        document.getElementById("categoriaE").innerHTML="Seleccione una Opcion";
    }else{ 
        //categoriaS.style.display = 'block';
        categoriaE.style.display = 'none';
        //document.getElementById("categoriaS").innerHTML="Bien Hecho!";
    }
}

function limpiar(){
    document.getElementById("nomActivo").value='';
    document.getElementById("stockActivo").value='';
    $("#refres").load(location.href+" #refres>*","");
    document.getElementById("detActivo").value='';
    
} 

