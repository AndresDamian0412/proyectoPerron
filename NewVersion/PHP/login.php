<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {  
  //$user = $_GET["nombre"];
  //$pwd = $_GET["clave"];
  $user ="Andres";
  $pwd ="123";

  $BD = new conexionBD();
  $sql = "SELECT * FROM usuarios WHERE NomUsuario= '".$user."' and Contra = '".$pwd."'";
  $stmt = $BD->ejecutar($sql);

  $array;
  $i=0;

  while($resultado= $stmt->fetch(PDO::FETCH_ASSOC)){
    $array[$i] = $resultado;
    $i++;
  }

  $json_datos = json_encode($array);
  echo $json_datos;
  $stmt->closeCursor();

}
?>