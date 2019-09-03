<?php
session_start();
ini_set('display_errors', 1); 
error_reporting(E_ALL); 

require 'autoload.php';

use ShadeLife\auth;
use ShadeLife\Players;
use ShadeLife\Impots;
use ShadeLife\ident;
use ShadeLife\BlueFort;

?>
<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">
<?php


auth::connection();

    if(ident::getCoplevel(1))
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
				<img class="logofrancais" src="./assets/img/logogvt.jpg" alt="">
			</div>
				<div class="col-sm-8">
				<p class="recherche1"></p>
				</div>
		</div>
		</div>
		</div>
		</div>
		<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="addnote">
				<div class="container">
				<div class="row">
				<div class="col-sm-1"><img class="intt" src="./assets/img/minstere-int.png" alt=""></div>
				<div class="col-sm-10">
				<h2>Déclaration de(s) vol de véhicule(s) au prêt des services de l'état. </h2>

				<div class="">Sélectionnez dans le formulaire ci-dessous le(s) véhicule(s) que vous voulez déclarer au prêt de l'état ! </div>
				<br>		
				<div class="container table-responsive-sm ">
				<table class="table">
					<thead class="thead-dark">
						<tr>
						<th scope="col">Plaque</th>
						<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$q = $bdd->query("SELECT * FROM info_vehicules_players WHERE recherche_vhl = 'non'  AND pid = ".$_SESSION['pid']."");
						while($r = $q->fetch())
						{
							?>
							<tr>
							<th scope="row"><?= htmlspecialchars($r['immatriculation_vhl']); ?></th>
							<th><a href="?id_vhl=<?= htmlspecialchars($r['id_vhl']);?>&pid=<?= htmlspecialchars($r['pid']);?>#validation"><button type="button" class="btn btn-dark">Je déclare mon vol</button></a>
							</th>
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
				</div>
				</div>
	<?php

				if(isset($_GET["id_vhl"]) && (isset($_GET["pid"])))
				{
					$id_vhl = htmlspecialchars($_GET["id_vhl"]);
					$pid = htmlspecialchars($_GET["pid"]);

					$q = $bdd->prepare("UPDATE info_vehicules_players SET recherche_vhl = :recherche_vhl WHERE id_vhl = :id_vhl");
					$q->execute(array("recherche_vhl" => "oui", "id_vhl" => $id_vhl));

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
				
require 'footer.php';