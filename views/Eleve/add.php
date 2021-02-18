<?php
	include '../../config/database.php';
	include '../../models/eleve.php';

	$database = new Database();
    $db = $database->connect();

    $eleve = new Eleve($db);

    if (isset($_POST['numMatricule']) && isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['classe'])){
    	$numMatricule = $_POST['numMatricule'];
    	$nom = $_POST['nom'];
    	$adresse = $_POST['adresse'];
    	$classe = $_POST['classe'];
    		
    	$eleve->inserer_eleve($numMatricule, $nom, $adresse, $classe);

    	header('Location:index.php');
    }