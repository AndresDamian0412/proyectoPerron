<?php
    include_once "conexion.php";

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $nomUser = $_POST["getUser"];
        $email = $_POST["getMail"];
        $pwd = $_POST["getPass"];
        $tel = $_POST["getPhone"];
        $tipoUser = "User";
        
        $BD = new conexionBD();
        $sql1 = "SELECT NomUsuario FROM usuarios WHERE NomUsuario= '".$nomUser."'";
        $stmt1 = $BD->ejecutar($sql1);
        $resultado1= $stmt1->fetch(PDO::FETCH_ASSOC);
        
        if ($nomUser == $resultado1["NomUsuario"]) {
            echo'<script type="text/javascript">
            window.location.href="../HTML/login.html";
            alert("Lo sentimos, el nombre de usuario '.$nomUser.' ya se encuentra registrado...");
            </script>';
        }else{
            $sql2 = "INSERT INTO usuarios VALUES('".$nomUser."','".$email."','".$pwd."','".$tel."','".$tipoUser."')";
            $stmt2 = $BD->ejecutar($sql2);
            if ($stmt2->rowCount()==1) {
                echo'<script type="text/javascript">
                window.location.href="../HTML/login.html";
                alert("Usuario registrado exitosamente!!");
                </script>';
            }else{
                echo'<script type="text/javascript">
                window.location.href="../HTML/login.html";
                alert("Error inesperado, vuelva a intentarlo...");
                </script>';
            }
        }
        $stmt1->closeCursor();
        $stmt2->closeCursor();
    }
?>