<?php
include_once "conexion.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $BD = new conexionBD();
    $sql = "SELECT * FROM ordenes A JOIN platillos B on A.Id_platillo = B.Id_platillo;";
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