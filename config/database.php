<?php
    class Database {
        // Concifguration de base
        private $host = 'localhost';
        private $db_name = 'note';
        private $username = 'root';
        private $password = '';

        private $connexion;

        public function connect()
        {
            $this->connexion = null;

            try {
                // Connexion à la base
                $this->connexion = new PDO('mysql:host=' .$this->host. ';dbname='.$this->db_name,$this->username,$this->password);
                $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection error: '.$e->getMessage();
            }

            return $this->connexion;
        }
    }
?>