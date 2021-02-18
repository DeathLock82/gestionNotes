<?php
	$url = "http://localhost/GestionNotes/";
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
	<a class="navbar-brand" href="#"> <span><img id="logo" src="<?= $url ?>assets/img/logo.png"></span> Gestion de Notes</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse mr-0" id="navbarSupportedContent" >
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item active">
			<a class="nav-link" href="<?= $url ?>views/Eleve/index.php">Elèves </a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="<?= $url ?>views/Matiere/index.php">Matières</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="<?= $url ?>views/Classe/index.php">Classes</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="<?= $url ?>views/Note/index.php">Notes</a>
		  </li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
		  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>