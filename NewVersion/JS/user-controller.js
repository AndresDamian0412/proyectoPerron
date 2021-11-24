var myObj;

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        myObj = xmlhttp.responseText;
        console.log(myObj);
    }
}
xmlhttp.open("GET", "../HTML/user-postview.html", true);
xmlhttp.send();

function formu(){
    document.getElementById("mid-contenido").innerHTML = myObj;
}