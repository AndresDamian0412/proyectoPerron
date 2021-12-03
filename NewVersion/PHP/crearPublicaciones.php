<?php
include_once "conexion.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $nombre = $_GET["nombre"];
    $imagen = $_GET["imagen"];
    $precio = $_GET["precio"];
    $tipo = $_GET["tipo"];
    $descripcion = $_GET["descripcion"];

    $BD = new conexionBD();
    $sql = "INSERT INTO platillos VALUES ('" .$nombre. "'," .$precio. ",'" .$descripcion. "','" .$tipo. "','" .$imagen. "');";
    $stmt = $BD->ejecutar($sql);
    $stmt->closeCursor();
}

?>