function validarCamposObligatorios(){
    var bandera= false;
    for(var i=0; i<document.forms[0].length; i++){
        var elemento= document.forms[0].elements[i];
        if(elemento.value.trim()== ''){
            bandera = true;
            if(elemento.id== 'cedula'){
                elemento.style.border= "1px red solid"
                document.getElementById("mensajeCedula").innerHTML = "la cedula es obligatoria"

            }
        }
    }
    if(bandera){
        alert('llenar todos los campos')
        return false;
    }else{
        return true;
    }
}

function validarLetras(elemento){
    elemento.value.charCodeAt()
    
    document.getElementById("validarLetras").innerHTML = "ingrese solo letras"
}