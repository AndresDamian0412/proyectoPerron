<?php
include_once "conexion.php";
    
if ($_SERVER["REQUEST_METHOD"]=="GET") {
    $id_plat = $_GET["idPlatillo"];
    $BD = new conexionBD();

    $sql = "SELECT * FROM platillos WHERE Id_platillo = '".$id_plat."'";
    $stmt = $BD->ejecutar($sql);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql2 = "SELECT Comentario FROM comentarios WHERE Id_platillo = '".$id_plat."'";
    $stmt2 = $BD->ejecutar($sql2);
    $resultado2 = $stmt2->fetch(PDO::FETCH_ASSOC);
}   
echo"<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <script src='../JS/user-controller.js'></script>
    <title>Post</title>
</head>
<body>
    <div style='height: 890px; overflow-y: scroll;'>
        <div class='view-post' style='text-align: center;'>
            <h2 id='name-dish'>".$resultado["Nombre"]."</h2>
            <img id='img-dish' src='".$resultado["Imagen"]."' alt='img-dish'
            style='width: 200px; height: 200px;'>
            <p id='price-dish'>".$resultado["Precio"]."</p>
            <p id='description-dish'>".$resultado["Descripcion"]."</p>
        </div>
        <div class='view-comments'>
            <p>Comentarios</p>
            <p id='comments'>".$resultado2["Comentario"]."</p>
        </div>
        <div class='view-sendcomment'>
            <form action=''>
                <table style='width: 100%;'>
                    <tr>
                        <td style='width: 80%;'>
                            <input type='text' name='getComment' id='getComment' style='width: 80%; height: 30px;margin-left: 100px;'>
                        </td>
                        <td style='width: 20%;'>
                            <button id='sendComment' type='button'><img src='../IMAGES/icon-send.png' alt='icon-send-comment'
                                style='max-width: 30px; max-height: 30px;'></button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class='view-order'>
            <form action=''>
                <table style='width: 100%; text-align: center;'>
                    <tr>
                        <td>
                            <label for='ordenCantidad'>Seleccione cantidad:</label>
                            <select name='ordenCantidad' id='ordenCantidad'>
                                <option value='0' selected>0</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button id='sendOrder' type='button'>Ordenar</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        
    </div>
    
</body>
</html>"
?>