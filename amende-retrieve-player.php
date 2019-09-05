<?php
session_start();

require 'autoload.php';
use ShadeLife\auth;
use ShadeLife\Players;
use ShadeLife\Impots;
use ShadeLife\ident;
use ShadeLife\BlueFort;




auth::connection();
auth::veriffLoginUsers();
auth::AuthGendarmerie();
	if(ident::getCoplevel(1))
	{
  		require 'assets/auto/navbar-gendarmerie.php';
	}
	if(ident::getCoplevel(1))
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
			
			<div class="container"><h3>Amendes sur les Personnes</h3></div>

			<div class="container table-responsive-sm ">
	
			<table class="table">
			<thead class="thead-dark">
			<tr>
			<th scope="col">Name</th>
			<th scope="col">Somme</th>
			<th scope="col">payer</th>
			<th scope="col">date</th>
			<th scope="col">action</th>
			</tr>
			</thead>
			<tbody>
			<?php 
			global $bdd;
			$q = $bdd->query("SELECT * FROM amende_players join players where amende_players.pid = players.pid");
			while($r = $q->fetch()){
			?>
			<tr>
				<th scope="row"><?= htmlspecialchars($r['name']); ?> </th>
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
		

		if (isset($_GET['paid'])) 
		{
			$id = htmlspecialchars($_GET['id']);
			$q = $bdd->prepare("UPDATE amende_players SET paid = 1 WHERE id= ".$id." ");
			$q->execute();
		}
require 'footer.php';