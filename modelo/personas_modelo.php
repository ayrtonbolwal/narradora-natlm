<?php
    class frases_modelo{
        private $db;
        private $frases;

        public function __construct(){
            $this->db=Conectar::conexion();
            $this->frases=array();
        }

        public function get_frases(){
            $consulta=$this->db->query("SELECT * from frase;");
            while($filas=$consulta->fetch_assoc()){
                $this->frases[]=$filas;
            }
            return $this->frases;
        }
    }
?>