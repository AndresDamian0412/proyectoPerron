<?php
    class conexionBD{
        public function __construct(){
            $this->conectar();
        }

        static function conectar(){
            $host = 'localhost';
            $dbname ='restaurantePerron';
            $username = 'andresdam';
            $password = '123';
            $puerto = 1433;
            try {
                $conn = new PDO("sqlsrv:Server=$host,$puerto;Database=$dbname",$username,$password);
                echo ("Se conectó correctamente la base de datos");
            } catch (PDOException $exp) {
                echo ("No se logro la conexion a la base de datos: $dbname, error:$exp");
            }
            return $conn;
        }

        /*Método para ejecutar una sentencia sql*/
        public function ejecutar($sql){
            $this->stmt=$this->link->query($sql);
            return $this->stmt;
        }

        /*Método para obtener una fila de resultados de la sentencia sql*/
        public function obtener_fila($stmt,$fila){
            if ($fila==0){
                $this->array=mysqli_fetch_array($stmt,MYSQLI_ASSOC);
            }else{
                mysqli_data_seek($stmt,$fila);
                $this->array=mysqli_fetch_array($stmt,MYSQLI_ASSOC);
            }
            return $this->array;
        }
        /*Destructor de la clase */
        function __destruct() {
            $this->link->close();
        }
    }
?>