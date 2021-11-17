function esconderForm(){
    document.getElementById("formEmploye").style.visibility = 'collapse';
    document.getElementById("formStudent").style.visibility = 'collapse';
}

function cambiarForm(){
    document.getElementById(this.id).style.visibility = "visible";
}