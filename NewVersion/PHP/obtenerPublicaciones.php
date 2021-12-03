<?php
include_once "conexion.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $BD = new conexionBD();
    $sql = "SELECT * FROM platillos";
    $stmt = $BD->ejecutar($sql);
    $array;
    $i = 0;

    while($resultado = $stmt->fetch(PDO::FETCH_ASSOC)){
        $array[$i]=$resultado;
        $i++;
    }
    echo json_encode($array);
    $stmt->closeCursor();
}

?>