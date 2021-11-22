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

var dato;
var xmlhttp = new XMLHttpRequest();
//Solicitud al servidor con Ajax
xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var myObj =this.responseText;
        dato=myObj;
    }
};
xmlhttp.open("GET", "../PHP/login.php", true);
xmlhttp.send();

function comprobacion() {
    console.log("aaaaa");
    console.log(dato);
}