var cambio=1;
function mostrarForm() {
    if(cambio==1){
        document.getElementById("formRegister").style.visibility="visible";
        cambio+=1;
        console.log(cambio);
    }else if(cambio==2){
        document.getElementById("formRegister").style.visibility="hidden";
        cambio-=1;
        console.log(cambio);
    }
}