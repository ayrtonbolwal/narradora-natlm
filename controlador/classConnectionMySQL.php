<?php
    class ConnectionMySQL{
        private $host;
        private $user;
        private $passwd;
        private $database;
        private $conn;

        public function __construct(){
            require_once "config_db.php";
            $this->host=HOST;
            $this->user=USER;
            $this->passwd=PASS;
            $this->database=DATABASE;
        }

        public function CreateConnection(){
            $this->conn=new mysqli($this->host, $this->user, $this->passwd, $this->database);
            if ($this->conn->connect_error) {
                die("Error al conectarse a MySQL: (" . $this->conn->connect_error . ")" . $this->conn->connect_error);
            }
        }

        public function ExecuteQuery($sql){
            $result = $this->conn->query($sql);
            return $result;
        }

        public function GetCountAffectedRows(){
            return $this->conn->affected_rows;
        }

        public function GetRows($result){
            return $result->fetch_row();
        }

        public function SetFreeResult($result){
            $result->free_result();
        }

        public function CloseConnection() {
            // Código para cerrar la conexión a la base de datos
        }

    }
?>