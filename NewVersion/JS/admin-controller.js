var myObj;

function cambioVista(direccion) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            myObj = xmlhttp.responseText;
            document.getElementById("cambiar").innerHTML = myObj;
        }
    }
    xmlhttp.open("GET", "../HTML/admin-" + direccion + ".html", true);
    xmlhttp.send();
}

function getPostInfo() {
    var nombre = document.getElementById("getNombre").value;
    var imagen = "../IMAGES/urls/" + document.getElementById("getImg").value;
    var precio = document.getElementById("getPrecio").value;
    var tipo = document.getElementById("getTipo").value;
    var descripcion = document.getElementById("getDesc").value;

    //console.log(nombre + "\n" + imagen + "\n" + precio + "\n" + tipo + "\n" + descripcion);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        }
    }
    xmlhttp.open("GET", "../PHP/crearPublicaciones.php?nombre=" + nombre + "&imagen=" + imagen + "&precio=" + precio + "&tipo=" + tipo + "&descripcion=" + descripcion, true);
    xmlhttp.send();
}

function setPostInfo() {
    var publicaciones = "";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            myObj = JSON.parse(this.responseText);
            for (var i = 0; i < Object.keys(myObj).length; i++){
                publicaciones += 
                "<table style='width: 100%; border-bottom: 1px solid rgb(192, 192, 192);'>"+
                "<tr><td style='width: 40%;'>"+
                "<p id='nombre'>"+myObj[i].Nombre+"</p>"+
                "<img id='imagen' src='"+myObj[i].Imagen+"' alt='image-dish' style='width: 200px; height: 130px;'>"+
                "</td><td style='width: 40%;'>"+
                "<p id='descripcion' style='font-size: 10px;'>"+myObj[i].Descripcion+"</p>"+
                "</td><td style='width: 20%; text-align: center;'>"+
                "<p id='precio'>$"+myObj[i].Precio+"</p></td></tr></table>";
            }
            document.getElementById("ver").innerHTML = publicaciones;
        }
    }
    xmlhttp.open("GET", "../PHP/obtenerPublicaciones.php", true);
    xmlhttp.send();
}

function getOrder() {
    var tabla = "";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            myObj = JSON.parse(this.responseText);

            for (var i = 0; i < Object.keys(myObj).length; i++) {
                tabla +=
                    "<form action=''>" +
                    "<table style='border-collapse: collapse; width: 100%; border: 1px solid rgb(141, 141, 141);'>" +
                    "<tr style='background-color: rgb(231, 231, 231); border-bottom: 1px solid grey; '>" +
                    "<td style='width: 30%; text-align: center;'>" +
                    "<p>" + myObj[i].Nombre + "</p>" +
                    "<img style='width: 100px; height: 80px;' src='" + myObj[i].Imagen + "' alt='img-dish'>" +
                    "<p id='id_platillo' style='visibility: hidden;'>" + myObj[i].Id_platillo + "</p>" +
                    "</td>" +
                    "<td style='width: 60%;'>" +
                    "<p style='color: grey;'>FECHA DEL PEDIDO</p>" +
                    "<p id='fecha'>" + myObj[i].Fecha_pedido + "</p>" +
                    "<p style='color: grey;' id='id-pedido'>" + myObj[i].Id_orden + "</p>" +
                    "<p id='status'>" + myObj[i].Status + "</p>" +
                    "<select name='ordenCantidad' id='ordenCantidad'>" +
                    "<option value='espera' selected>En espera</option>" +
                    "<option value='confirmado'>Confirmado</option>" +
                    "<option value='entregado'>Entregado</option>" +
                    "</select></td>" +
                    "<td style='width: 10%; text-align: center;'>" +
                    "<p style='color: grey;'>CANTIDAD:</p>" +
                    "<p id='cantidad'>" + myObj[i].Cantidad + "</p>" +
                    "<p style='color: grey;'>TOTAL</p>" +
                    "<p id='total'>$" + myObj[i].Precio_total + "</p></td></tr></table></form>";
            }
            document.getElementById("pendientes").innerHTML = tabla;
        }
    }
    xmlhttp.open("GET", "../PHP/obtenerOrdenes.php", true);
    xmlhttp.send();
}