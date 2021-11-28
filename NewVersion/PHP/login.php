<?php
$_GET;
include_once "conexion.php";

$BD = new conexionBD();
$stmt = $BD->ejecutar("Select * from usuarios");
$array;
$i=0;

while($resultado= $stmt->fetch(PDO::FETCH_ASSOC)){
  $array[$i] = $resultado;
  print_r($array[$i]);
  print "<br><br>";
  $i++;
}
$stmt->closeCursor();
$json_datos = json_encode($array);
print($json_datos);
?>