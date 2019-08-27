<?php
session_start();
ini_set('display_errors', 1); 
error_reporting(E_ALL); 

require 'assets/auto/header.php';
require 'assets/auto/function.php';
require 'assets/class/bdd.php';
require 'assets/class/players.php';
require 'assets/class/impot.php';
require 'assets/class/ident.php';
require 'assets/class/bluefort.php';

use ShadeLife\Players;
use ShadeLife\Impots;
use ShadeLife\ident;
use ShadeLife\BlueFort;
$ident = new ident;
$bluefort = new bluefort;
?>
<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">
<?php


if(!isset($_SESSION['name']))
{
	?>
	<script>
     	window.location.replace("index.php");
    </script>
	<?php
}else
{
    if($ident->getCoplevel(1))
        {
          /** NAVBAR GENDARMERIE */
          require 'assets/auto/navbar-gendarmerie.php';
        }else{
          /** NAVBAR civil */
          require 'assets/auto/navbar.php';
        }

	?>
	<div class="bandeau">
	<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<img class="ineterpol" src="https://www.interpol.int/bundles/interpolfront/images/logo-blanc.png" alt="">
		</div>
			<div class="col-sm-8"><p class="recherche1">F. V. V.</p></div>
	</div>
	</div>
	</div>

	<div class="card shadow-lg p-3 mb-5 bg-white rounded grade">
	<div class="container identt">
  	<div class="row">
	  <div class="container table-responsive-sm ">
	
	<table class="table">
		<thead class="thead-dark">
			<tr>
			<th scope="col">Immat</th>
			<th scope="col">Propriétaire</th>
			<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
	$q = $bdd->query("SELECT * FROM info_vehicules_players join players where players.pid = info_vehicules_players.pid AND recherche_vhl = 'oui'");
	while ($r = $q->fetch())
	{
		?>
		<tr>
		<th scope="row"><?= htmlspecialchars($r['immatriculation_vhl']); ?></th>
		<th scope="row"><?= htmlspecialchars($r['name']); ?></th>
		<th scope="row"><a href="?id_vhl=<?= htmlspecialchars($r['id_vhl']);?>"><button type="button" class="btn btn-primary">Retrouvez</button></a></th>
		</tr>
		<?php
	}
	?>
	</div>
	</div>
	</div>

	<?php

	if(isset($_GET['id_vhl']))
	{
		$q = $bdd->prepare("UPDATE info_vehicules_players SET recherche_vhl = :recherche_vhl WHERE id_vhl = :id_vhl");
		$q->execute(array("recherche_vhl" => "non", "id_vhl" => $_GET['id_vhl']));

		if($q)
				{
					?>
					<meta http-equiv="refresh" content="5 ; url=rep.php">	
					<div class="info" id="validation">
					<div class="alert alert-info grade container" role="alert">
					L'enregistrement au prêt des services de l'état a bien était effectuer. 
					<br>
					Une redirection automatique et en cours veuillez patienter ! 
					</div>
					</div>
					<?php
				}
	}
}//fin de page 
require 'footer.php';