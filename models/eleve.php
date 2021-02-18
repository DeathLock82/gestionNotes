<?php
    class Eleve {

        private $conn;
        private $base = 'note';
        private $table = 'eleve';

        public $idEleve;
        public $numMatricule;
        public $nom;
        public $adresse;
        public $idClasse;
      

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function lister_eleve()
        {
            $query = 'SELECT e.numMatricule, e.nom, e.adresse, c.classe idClasse FROM classe c, eleve e WHERE e.idClasse = c.idClasse ORDER BY numMatricule ';
            $statement = $this->conn->prepare($query);
            $statement->execute();
            return $statement;
        }

        public function afficher_un_eleve($id)
        {
            $query = 'SELECT * FROM '.$this->table.' WHERE idEleve = :id';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':id',$id);
            $statement->execute();
            return $statement;
        }

        public function recherche($eleve)
        {
            $eleve = '%'.$eleve.'%';
            $query = 'SELECT * FROM '.$this->table.' WHERE nom LIKE :eleve';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':eleve',$eleve);
            $statement->execute();
            return $statement;
        }

        public function inserer_eleve($numMatricule,$nom,$adresse, $idClasse)
        {
            $query = 'INSERT INTO '.$this->table.' SET numMatricule = :numMatricule, nom = :nom, adresse = :adresse , idClasse = :idClasse';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':numMatricule', $numMatricule);
            $statement->bindParam(':nom', $nom);
            $statement->bindParam(':adresse', $adresse);
            $statement->bindParam(':idClasse', $idClasse);
            
            if($statement->execute()) {
                return true;
            }

            echo "Error: ". $statement->error;
            return false;
        }

        public function modifier_eleve($id)
        {
            $query = 'UPDATE '.$this->table.' SET numMatricule = :numMatricule, nom = :nom, adresse = :adresse , idClasse = :idClasse WHERE idEleve = :id';
            $statement = $this->conn->prepare($query);

            $statement->bindParam(':numMatricule', $this->numMatricule);
            $statement->bindParam(':nom', $this->nom);
            $statement->bindParam(':adresse', $this->adresse);
            $statement->bindParam(':idClasse', $this->idClasse);
            $statement->bindParam(':id',$id);

            if($statement->execute()) {
                return true;
            }

            echo "Error: ". $statement->error;
            return false;
        }

        public function supprimer_eleve($id)
        {
            $query = 'DELETE FROM '.$this->table.' WHERE idEleve = :id';
            $statement = $this->conn->prepare($query);

            $statement->bindParam(':id', $id);

            if($statement->execute()) {
                return true;
            }

            echo "Error: ". $statement->error;
            return false;
        }

    }