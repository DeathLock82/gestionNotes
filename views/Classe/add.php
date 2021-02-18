<?php

	include '../../config/database.php';
	include '../../models/classe.php';

	$database = new Database();
    $db = $database->connect();

    $classe = new Classe($db);

    if (isset($_POST['classe'])){
    	$nom = $_POST['classe'];
    	$classe->inserer_Classe($nom);

    	header('Location:index.php');
    }