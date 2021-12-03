<?php
    include_once "conexion.php";
    
    if ($_SERVER["REQUEST_METHOD"]=="GET") {
        $filtro = $_GET["filtro"];
        $BD = new conexionBD();
        $array;
        $i = 0;

        if(empty($filtro)){
            $sql = "SELECT * FROM platillos";
            $stmt = $BD->ejecutar($sql);
            while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
               $array[$i]=$resultado;
               $i++; 
            }
            $array_json = json_encode($array);
            echo $array_json;
            $stmt->closeCursor();
        }else{
            $sql = "SELECT * FROM platillos WHERE Tipo_comida = '".$filtro."'";
            $stmt = $BD->ejecutar($sql);
            while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
               $array[$i]=$resultado;
               $i++; 
            }
            $array_json = json_encode($array);
            echo $array_json;
            $stmt->closeCursor();
        }
    }
?>