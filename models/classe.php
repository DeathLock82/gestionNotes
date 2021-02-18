<?php
    class Classe {

        private $conn;
        private $base = 'note';
        private $table = 'classe';

        public $idClasse;
        public $classe;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function lister_Classe()
        {
            $query = 'SELECT * FROM '.$this->table.' ORDER BY idClasse';
            $statement = $this->conn->prepare($query);
            $statement->execute();
            return $statement;
        }

        public function afficher_un_Classe($id)
        {
            $query = 'SELECT * FROM '.$this->table.' WHERE idClasse = :id';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':id',$id);
            $statement->execute();
            return $statement;
        }

        public function recherche($classe)
        {
            $classe = '%'.$classe.'%';
            $query = 'SELECT * FROM '.$this->table.' WHERE classe LIKE :classe';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':classe',$classe);
            $statement->execute();
            return $statement;
        }

        public function inserer_Classe($nom)
        {
            $query = 'INSERT INTO '.$this->table.' SET classe = :classe';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':classe', $nom);
            
            if($statement->execute()) {
                return true;
            }

            echo "Error: ". $statement->error;
            return false;
        }

        public function modifier_Classe($id)
        {
            $query = 'UPDATE '.$this->table.' SET classe = :classe WHERE idClasse = :id';
            $statement = $this->conn->prepare($query);

            $statement->bindParam(':classe', $this->classe);
            $statement->bindParam(':id',$idClasse);

            if($statement->execute()) {
                return true;
            }

            echo "Error: ". $statement->error;
            return false;
        }

        public function supprimer_Classe($id)
        {
            $query = 'DELETE FROM '.$this->table.' WHERE idClasse = :id';
            $statement = $this->conn->prepare($query);

            $statement->bindParam(':id', $id);

            if($statement->execute()) {
                return true;
            }

            echo "Error: ". $statement->error;
            return false;
        }

    }