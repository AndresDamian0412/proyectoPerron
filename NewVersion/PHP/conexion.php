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
            } catch (PDOException $exp) {
            }
        }

        //funcion para ejecutar una sentencia sql
        public function ejecutar($sql){
            $this->stmt = $this->link->prepare($sql);
            $this->stmt->execute();
            return $this->stmt;
        }

        /*Destructor de la clase */
        function __destruct() {
            $this->link=null;
        }
    }
?>