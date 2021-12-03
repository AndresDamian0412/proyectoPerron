function cambioVista(idPlatillo) {
    var myObj;
    var spcp="";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            myObj = JSON.parse(this.responseText);
            
        }
    }
    xmlhttp.open("GET", "../PHP/specific_post.php?idPlatillo="+idPlatillo, true);
    xmlhttp.send();
}


function vaciado(filtro) {
    var myObj;
    var post = ""; 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            myObj = JSON.parse(this.responseText);
            for (var i=0;i<Object.keys(myObj).length;i++) {
                post= post+"<div><table style='width: 100%; border-bottom: 1px solid rgb(192, 192, 192);' onclick= cambioVista('"+myObj[i].Id_platillo+"')><tr><td><p>"+
                myObj[i].Nombre+"</p><img src='"+myObj[i].Imagen+
                "' alt='image-dish' style='width: 200px; height: 130px;'></td><td><p style='font-size: 10px;'>"+myObj[i].Descripcion+"</p></td><td><p>$ "+myObj[i].Precio+"</p></td></tr></table></div>";
            }
            document.getElementById("posts").innerHTML = post;
        }
    }
    xmlhttp.open("GET", "../PHP/posts.php?filtro="+filtro,true);
    xmlhttp.send();
}