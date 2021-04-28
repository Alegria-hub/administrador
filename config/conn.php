<?php
    class Conectar{
        protected $dbhost;

        protected function conexion()
        {
            try {
                $conectar = $this->dbhost = new PDO("mysql:local=localhost;dbname=modelshirts","root","");
                return $conectar;
            } catch (Exception $e) {
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_names()
        {
            return $this->dbhost->query("SET NAMES 'utf8'");
        }
    }
?>