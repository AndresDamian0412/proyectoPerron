var xmlhttp = new XMLHttpRequest();
//Solicitud al servidor con Ajax
var dato;
xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        console.log(myObj[0].NomUsuario);
       
    }
};
xmlhttp.open("GET", "../PHP/login.php", true);
xmlhttp.send();

function comprobacion() {
    console.log("hola");
}