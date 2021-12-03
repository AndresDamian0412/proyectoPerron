var myObj;

function cambioVista(direccion) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            myObj = xmlhttp.responseText;
            document.getElementById("cambiar").innerHTML = myObj;
        }
    }
    xmlhttp.open("GET", "../HTML/admin-"+ direccion +".html", true);
    xmlhttp.send();
}

function getPostInfo(){
    var nombre = document.getElementById("getNombre").value;
    var imagen = "../IMAGES/urls/" + document.getElementById("getImg").value;
    var precio = document.getElementById("getPrecio").value;
    var tipo = document.getElementById("getTipo").value;
    var descripcion = document.getElementById("getDesc").value;

    console.log(nombre + "\n" + imagen + "\n" + precio + "\n" + tipo + "\n" + descripcion);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
        }
    }
    xmlhttp.open("GET", "../PHP/crearPublicaciones.php?nombre="+nombre+"&imagen="+imagen+"&precio="+precio+"&tipo="+tipo+"&descripcion="+descripcion, true);
    xmlhttp.send();

    
}