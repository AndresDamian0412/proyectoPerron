function cambioVista(direccion) {
    var myObj;
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

function vaciado(filtro) {
    var myObj;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            myObj = this.responseText;
            console.log(myObj);
        }
    }
    xmlhttp.open("GET", "../PHP/posts.php?filtro="+filtro,true);
    xmlhttp.send();
}