//agrega al campo la funcion de que introdusca solo numeros
function soloNumeros(n)
{
    key = n.keyCode || n.which;
    tecla = String.fromCharCode(key).toLowerCase();
    numero = "1234567890";
    especiales = [8,9,37,39];
    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }
    if(numero.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
} 