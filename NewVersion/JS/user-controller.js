var myObj;

function cambioVista(direccion) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            myObj = xmlhttp.responseText;
            document.getElementById("mid-contenido").innerHTML = myObj;
        }
    }
    xmlhttp.open("GET", "../HTML/user-"+ direccion +".html", true);
    xmlhttp.send();
}