<?php
session_start();

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
  		require 'assets/auto/navbar-gendarmerie.php';
	}
	if($ident->getCoplevel(9))
	{		
		?>
		<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">

			<div class="bandeau">
			<div class="container">
			<div class="row">
			<div class="col-sm-4">
			<img class="ineterpol" src="https://www.interpol.int/bundles/interpolfront/images/logo-blanc.png" alt="">
			</div>
			<div class="col-sm-8">
			<p class="recherche">Rapport d'intervention (ADM) </p>
			</div>
			</div>
			</div>
			</div>
			</div>
			<br>
			<br>
			<div class="container table-responsive-sm ">
	
			<table class="table">
				<thead class="thead-dark" id="home">
					<tr>
					<th scope="col">type</th>
					<th scope="col">Officier</th>
					
					<th scope="col">Date d'intervention</th>
					<th scope="col">Ville</th>
					<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
			$q = $bdd->query("SELECT * FROM rapport_int  ORDER BY id desc ");
			while ($r = $q->fetch())
			{
								
				?>
				<tr>
				<th scope="row"><?= htmlspecialchars($r['typerap'])?> <?php $bluefort->GetMarqueLuInterventionTableau($r['id']); ?> <?php $bluefort->GetMarqueFavoryInterventionTableau($r['id']); ?></th>
				<th scope="row"><?= htmlspecialchars($r['officier']); ?></th>
				
				<th scope="row"><?= htmlspecialchars($r['dateinter']); ?></th>
				<th scope="row"><?= htmlspecialchars($r['city']); ?></th>
				<th scope="row"><a href="compterendu.php?id=<?= htmlspecialchars($r['id']); ?>"><button type="submit" class="btn btn-dark">Rapport <?= $class;?></button></a></th>
				</tr>
				<?php
			}
	
	}else
	{
		?>	
			<meta http-equiv="refresh" content="5 ; url=rep.php">	
			<div class="info">
			<div class="alert alert-info grade container" role="alert">
			Vous n'avez pas les droits nécessaires pour consultez cette partie constatez un administrateur !
			<br>
			Une redirection automatique et en cours veuillez patienter ! 
			</div>
			</div>
			<?php
	}


}
require 'footer.php';
?>

<?php

/**
 * 	$t = $bdd->query("SELECT * FROM `rapport_int_lue`join rapport_int WHERE rapport_int_lue.rapport_id = rapport_int.id AND rapport_int_lue.pid = rapport_int.pid AND rapport_int_lue.pid = ".$_SESSION["pid"]."");
			
 */
?>