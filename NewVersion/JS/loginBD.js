function comprobacion() {
    var user = document.getElementById("login-user").value;
    var pwd = document.getElementById("login-pass").value;
    controlUsers(user,pwd);
}

function controlUsers(user,pwd){
    var xmlhttp = new XMLHttpRequest();
    //Solicitud al servidor con Ajax
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            console.log(myObj[0].TipoUser);
            if(myObj == null){
                //Se niega el acceso
                window.alert("Acceso denegado");
            }else{
                if(myObj[0].TipoUser = "User"){
                    //Se abre pestaña usuario
                    window.location.href = '../HTML/user-mainview.html';
                }else if(myObj[0].TipoUser = "Admin"){
                    //Se abre pestaña administrador
                    window.location.href = '../HTML/admin-mainview.html';
                }
            }
            
            
            //si lo encontro se abre un if

            //si tipo user es admin abre ventana admin

            //si tipo user es user se abre ventana usuario
        }
    };

    xmlhttp.open("GET", "../PHP/login.php?nombre="+user+"&clave="+pwd, true);
    xmlhttp.send();
}