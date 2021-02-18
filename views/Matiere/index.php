<?php
	include '../../config/database.php';
	include '../../models/matiere.php';

	$database = new Database();
    $db = $database->connect();

    $matiere = new Matiere($db);
    $result = $matiere->lister_matiere();
    $liste_matiere = $result->fetchAll(PDO::FETCH_ASSOC);  
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Gestion des Notes | Matières</title>
		<link rel="icon" type="image/png" href="../../assets/img/logo.png">
		<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">		
		<?php include_once '../header.php' ?>
	</head>

	<body>
		<div class="container mt-5">
			<h3 class="float-right">Liste des Matières</h3>
		</div>

		<div class="container"> 
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nouveau">
			    Nouveau
			</button>


			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>Id</th>
			        <th>Matière</th>
			        <th>Coefficient</th>
			        <th></th>
			      </tr>
			    </thead>
			    <tbody>
			      <?php foreach ($liste_matiere as $data) { ?>
					<tr>
						<td><?= $data['idMatiere'] ?></td>
						<td><?= $data['nomMat'] ?></td>
						<td><?= $data['coefficient'] ?></td>
						<td>
				        	<a class="btn btn-outline-dark" data-toggle="modal" data-target="#modifier"><span>Modifier</span></a>
				        	<a class="btn btn-outline-danger" data-toggle="modal" data-target="#supprimer"><span>Supprimer</span></a>
			        </td>
					</div>
				<?php } ?>
			    </tbody>
			  </table>
		</div>

		<div class="container">
		  <!-- The Modal -->
		  <div class="modal fade" id="nouveau">
		    <div class="modal-dialog modal-dialog-centered">
		      <div class="modal-content">
		      
		        <!-- Modal Header -->
		        <div class="modal-header">
		          <h4 class="modal-title">Ajout de matière</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        
		        <form>
			        <div class="modal-body">
		          		<div class="form-group">
							<label for="exampleInputEmail1">Identifiant </label>
							<input type="text" class="form-control" id="idMatiere" name="idMatiere">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Matière</label>
							<input type="text" class="form-control" id="nomMat" name="nomMat">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Coefficient</label>
							<input type="text" class="form-control" id="coefficient" name="coefficient">
						</div>
					</div>	        
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
						<button type="submit" class="btn btn-primary">Ajouter</button>

			            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
			        </div>
		        </form>
		        
		      </div>
		    </div>
		  </div>

		  <div class="container">
		  <!-- The Modal Modifier-->
		  <div class="modal fade" id="modifier">
		    <div class="modal-dialog modal-dialog-centered">
		      <div class="modal-content">
		      
		        <!-- Modal Header -->
		        <div class="modal-header">
		          <h4 class="modal-title">Modification de matière</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        
		        <form>
			        <div class="modal-body">
		          		<div class="form-group">
							<label for="exampleInputEmail1">Identifiant </label>
							<input type="text" class="form-control" id="idMatiere" name="idMatiere">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Matière</label>
							<input type="text" class="form-control" id="nomMat" name="nomMat">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Coefficient</label>
							<input type="text" class="form-control" id="coefficient" name="coefficient">
						</div>
					</div>	        
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
						<button type="submit" class="btn btn-primary">Modifier</button>

			            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
			        </div>
		        </form>
		        
		      </div>
		    </div>
		  </div>

		  <div class="container">
		  <!-- The Modal Modifier-->
		  <div class="modal fade" id="supprimer">
		    <div class="modal-dialog modal-dialog-centered">
		      <div class="modal-content">
		      
		        <!-- Modal Header -->
		        <div class="modal-header">
		          <h4 class="modal-title">Suppression de matière</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        
		        <form>
			        <div class="modal-body">
		          		<p>Voulez-vous vraiment supprimer cet élément ?</p>
					</div>	        
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
						<button type="submit" class="btn btn-primary">Valider</button>

			            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
			        </div>
		        </form>
		        
		      </div>
		    </div>
		  </div>

		<script type="text/javascript" src="../../assets/js/jquery.js"></script>
		<script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
	</body>
</html>