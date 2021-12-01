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
            console.log(myObj[0].NomUsuario);
        }
    };

    xmlhttp.open("GET", "../PHP/login.php", true);
    xmlhttp.send();
}