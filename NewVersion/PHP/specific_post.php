<?php
    include_once "conexion.php";
    
    if ($_SERVER["REQUEST_METHOD"]=="GET") {
        $id_plat = $_GET["idPlatillo"];
        $BD = new conexionBD();

        $sql = "SELECT * FROM platillos WHERE Id_platillo = '".$id_plat."'";
        $stmt = $BD->ejecutar($sql);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($resultado);
        $stmt->closeCursor();
    }   
?>