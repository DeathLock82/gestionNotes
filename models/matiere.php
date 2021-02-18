<?php
    class Matiere {

        private $conn;
        private $base = 'note';
        private $table = 'matiere';

        public $idMatiere;
        public $nomMat;
        public $coefficient;
      

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function lister_matiere()
        {
            $query = 'SELECT * FROM '.$this->table.' ORDER BY idMatiere';
            $statement = $this->conn->prepare($query);
            $statement->execute();
            return $statement;
        }

        public function afficher_un_matiere($id)
        {
            $query = 'SELECT * FROM '.$this->table.' WHERE idMatiere = :id';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':id',$id);
            $statement->execute();
            return $statement;
        }

        public function recherche($matiere)
        {
            $matiere = '%'.$matiere.'%';
            $query = 'SELECT * FROM '.$this->table.' WHERE nomMat LIKE :matiere';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':matiere',$matiere);
            $statement->execute();
            return $statement;
        }

        public function inserer_matiere()
        {
            $query = 'INSERT INTO '.$this->table.' SET nomMat = :nomMat, coefficient = :coefficient';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':nomMat', $this->nomMat);
            $statement->bindParam(':coefficient', $this->coefficient);
            
            if($statement->execute()) {
                return true;
            }

            echo "Error: ". $statement->error;
            return false;
        }

        public function modifier_matiere($id)
        {
            $query = 'UPDATE '.$this->table.' SET nomMat = :nomMat, coefficient = :coefficient WHERE idMatiere = :id';
            $statement = $this->conn->prepare($query);

            $statement->bindParam(':nomMat', $this->nomMat);
            $statement->bindParam(':coefficient', $this->coefficient);
            $statement->bindParam(':id',$id);

            if($statement->execute()) {
                return true;
            }

            echo "Error: ". $statement->error;
            return false;
        }

        public function supprimer_matiere($id)
        {
            $query = 'DELETE FROM '.$this->table.' WHERE idMatiere = :id';
            $statement = $this->conn->prepare($query);

            $statement->bindParam(':id', $id);

            if($statement->execute()) {
                return true;
            }

            echo "Error: ". $statement->error;
            return false;
        }

    }