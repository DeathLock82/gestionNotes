<?php
    class Note {

        private $conn;
        private $base = 'note';
        private $table = 'note';

        public $idNote;
        public $numMatricule;
        public $note;
      

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function lister_note($matricule)
        {
            $query = 'SELECT eleve.nom AS nom, note, matiere.nomMat FROM eleve JOIN note ON eleve.numMatricule = note.numMatricule JOIN matiere ON note.idMatiere = matiere.idMatiere WHERE eleve.numMatricule = :matricule';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':matricule',$matricule);
            $statement->execute();
            return $statement;
        }

        public function moyenne()
        {
            $query = 'SELECT eleve.nom AS nom, SUM(note*matiere.coefficient)/SUM(matiere.coefficient) AS Moyenne FROM eleve JOIN note ON eleve.numMatricule = note.numMatricule JOIN matiere ON note.idMatiere = matiere.idMatiere GROUP BY eleve.numMatricule';
            $statement = $this->conn->prepare($query);
            $statement->execute();
            return $statement;
        }

        public function afficher_un_note($id,$id2)
        {
            $query = 'SELECT * FROM '.$this->table.' WHERE idMatiere = :idMatiere and numMatricule = :numMatricule';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':idMatiere', $id);
            $statement->bindParam(':numMatricule', $id2);            
            $statement->execute();
            return $statement;
        }

        public function inserer_note()
        {
            $query = 'INSERT INTO '.$this->table.' SET idMatiere = :idMatiere, numMatricule = :numMatricule,note
                = :note';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':idMatiere', $this->idMatiere);
            $statement->bindParam(':numMatricule', $this->numMatricule);
            $statement->bindParam(':note', $this->note);
            
            if($statement->execute()) {
                return true;
            }

            echo "Error: ". $statement->error;
            return false;
        }

        public function modifier_note($id,$id2)
        {
            $query = 'UPDATE '.$this->table.' SET note = :note WHERE idMatiere = :idMatiere and numMatricule = :numMatricule';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':idMatiere', $id);
            $statement->bindParam(':numMatricule', $id2);
            $statement->bindParam(':note',$this->note);

            if($statement->execute()) {
                return true;
            }

            echo "Error: ". $statement->error;
            return false;
        }

        public function supprimer_note($id)
        {
            $query = 'DELETE FROM '.$this->table.' WHERE idNote = :id';
            $statement = $this->conn->prepare($query);

            $statement->bindParam(':id', $id);

            if($statement->execute()) {
                return true;
            }

            echo "Error: ". $statement->error;
            return false;
        }

    }