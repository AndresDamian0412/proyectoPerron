<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
  $user = $_POST["getUser"];
  $pwd = $_POST["getPass"];

  $BD = new conexionBD();
  $sql = "SELECT * FROM usuarios WHERE NomUsuario= '".$user."' and Contra = '".$pwd."'";
  $stmt = $BD->ejecutar($sql);
  $resultado= $stmt->fetch(PDO::FETCH_ASSOC);
  if($resultado){
    if($resultado["TipoUser"]=="User"){
      header("Location: ../HTML/user-mainview.html");
    }else if($resultado["TipoUser"]=="Admin"){
      header("Location: ../HTML/admin-mainview.html");
    }
  }else{
    header("Location: ../HTML/login.html");
  }
  
  $stmt->closeCursor();
}
?>