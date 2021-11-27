<?php
$GET;
include_once "conexion.php";

$BD = new conexionBD();
$stmt = $BD->ejecutar("Select * from usuarios");
$fila = 0;
echo $fila;
//funciones recuperadas del documento de practica
global $arreglo;

for ($fila=0; $fila < $stmt->rowCount();$fila++) {
  $registro=$BD->obtener_fila($stmt,$fila);
  $arreglo[$fila] = $registro;
}
echo json_encode($arreglo);
?>