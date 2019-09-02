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
	if($ident->getCoplevel(1))
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
			<p class="recherche1">Récapitulatif des amendes </p>
			</div>
			</div>
			</div>
			</div>
			</div>


			<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded">
			<div class="container">
			<div class="row">
			<div class="container row">
			
			<div class="col-sm">
			<div class="card">
			
			<div class="container"><h3>Les Amendes sur VHL</h3></div>

			<div class="container table-responsive-sm ">
	
			<table class="table">
			<thead class="thead-dark">
			<tr>
			<th scope="col">Plaque</th>
			<th scope="col">Somme</th>
			<th scope="col">payer</th>
			<th scope="col">date</th>
			<th scope="col">action</th>
			</tr>
			</thead>
			<tbody>
			<?php 
			global $bdd;
			$q = $bdd->query("SELECT * FROM amende_vhl");
			while($r = $q->fetch()){
			?>
			<tr>
				<th scope="row"><?= htmlspecialchars($r['immat']); ?> </th>
				<th scope="row"><?= htmlspecialchars($r['somme']); ?></th>
				<th scope="row"><?php if($r['paid'] == 1){echo 'oui';}else{ echo 'non';}?></th>
				<th scope="row"><?= htmlspecialchars($r['date']); ?></th>
				<th scope="row"><a href="?paid=paid&id=<?= $r['id']?>"><?php if($r['paid'] == 1){}else{ echo '<button class="btn btn-danger" type="button">Payement</button>';}?></a></th>
			</tr>
			<?php
			}
			?>
			</tbody>
		  	</table>
  			</div>

			</div>
			</div>
			</div>
			<?php
	}
		}

		if (isset($_GET['paid'])) 
		{
			$id = htmlspecialchars($_GET['id']);
			$q = $bdd->prepare("UPDATE amende_vhl SET paid = 1 WHERE id= ".$id." ");
			$q->execute();
		}
require 'footer.php';