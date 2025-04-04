<?php
    class Connection {
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $dbname = "project_language";
        private $connect;

        public function __construct() {
            $connection = "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8";
            try {
                $this->connect = new PDO($connection, $this->user, $this->password);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                die("Error en la conexión: " . $exception->getMessage());
            }
        }   

        public function getConnection() {
            return $this->connect;
        }
  
    }
?>