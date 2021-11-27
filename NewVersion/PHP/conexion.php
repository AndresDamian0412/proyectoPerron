<?php
    class conexionBD{
        private $host = 'localhost';
        private $dbname = 'restaurantePerron';
        private $username ='andresdam';
        private $password ='123';
        private $puerto = 1433;
        private $link;
        private $stmt;

        //constructor de la clase
        public function __construct(){
            $this-> conectar();
        }

        //conexion a la base de datos utilizando driver sqlsrv y la clase PDO
        public function conectar(){
            try {
                $this->link = new PDO("sqlsrv:Server=$this->host,$this->puerto;Database=$this->dbname",
                    $this->username,$this->password);
                echo ("Se conectó correctamente la base de datos");
            } catch (PDOException $exp) {
                echo ("No se logro la conexion a la base de datos: $this->dbname, error:$exp");
            }
        }

        //funcion para ejecutar una sentencia sql
        public function ejecutar($sql){
            $this->stmt = $this->link->query($sql);
            return $this->stmt;
        }

        /*Método para obtener una fila de resultados de la sentencia sql*/
        public function obtener_fila($stmt,$fila){
            if ($fila==0){
            $this->array=$stmt->fetch(PDO::FETCH_ASSOC);
            }else{
            $this->array=$stmt->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT,$fila);
            }
            return $this->array;
        }
        
        /*Destructor de la clase */
        function __destruct() {
            $this->link=null;
        }
    }
?>