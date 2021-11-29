<?php
$_GET;
include_once "conexion.php";

$BD = new conexionBD();
$stmt = $BD->ejecutar("Select * from usuarios");

$array;
$i=0;

while($resultado= $stmt->fetch(PDO::FETCH_ASSOC)){
  $array[$i] = $resultado;
  $i++;
}

$json_datos = json_encode($array);
echo $json_datos;
$stmt->closeCursor();
?>