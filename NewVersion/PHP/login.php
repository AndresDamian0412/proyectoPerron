<?php
$_GET;
include_once "conexion.php";

$BD = new conexionBD();
$stmt = $BD->ejecutar("Select * from usuarios");
$fila = 0;
//funciones recuperadas del documento de practica
$arreglo;

for ($fila=0; $fila < $stmt->num_rows;$fila++) {
  $registro=$BD->obtener_fila($stmt,$fila);
  $arreglo[$fila] = $registro;
}
echo json_encode($arreglo);
?>