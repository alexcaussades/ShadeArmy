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
				<img class="logofrancais" src="./assets/img/logogvt.jpg" alt="">
			</div>
				<div class="col-sm-8">
				<p class="recherche1"></p>
				</div>
		</div>
		</div>
		</div>
		</div>
		<?php
		
		global $bdd;
		$q = $bdd->query("SELECT count(*) FROM vehicles WHERE pid =".$_SESSION['pid']."")->fetchColumn();
		
		$r = $bdd->query("SELECT count(*) FROM info_vehicules_players WHERE pid =".$_SESSION['pid']."")->fetchColumn();
		
		if($r <= $q)
		{	
			if($q)
			{

				?>
				<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="addnote">
				<div class="container">
				<div class="row">
				<div class="col-sm-1"><img class="intt" src="./assets/img/minstere-int.png" alt=""></div>
				<div class="col-sm-10">
				<h2>Déclaration de(s) véhicule(s) au prêt des services de l'état. </h2>

				<div class="">Sélectionnez dans le formulaire ci-dessous le(s) véhicule(s) que vous voulez déclarer au prêt de l'état ! </div>
						<?php
						$message = "Etape 1";
						?>
						<div class="info">
						<div class="alert alert-info grade container" role="alert">
						<?= $message; ?>
						</div>
						</div>
								
				<div class="form-group">
					<form action="" method="get">
					<select class="form-control" id="exampleFormControlSelect2" name="id">
					<?php
					$t = $bdd->query("SELECT * FROM vehicles WHERE pid =".$_SESSION['pid']." AND NOT EXISTS(SELECT id_vhl FROM info_vehicules_players WHERE pid=".$_SESSION['pid']." AND info_vehicules_players.id_vhl = vehicles.id)");
					while ($houses = $t->fetch())
					{
						$houses["immatriculation"] = str_replace('"', '',$houses["immatriculation"]);
						
						?>
						<option value="<?= $houses['id'];?>"><?= $houses['immatriculation'];?></option>
						<?php
					}
					?>
					</select>
					</div>
					</select>
					<br>
					<button type="submit" name="vhlon" class="btn btn-primary">Je déclare mon véhicule.</button>
					</form>
					</div>
				</div>
				</div>
				</div>
				</div>
				<?php

					if(isset($_GET["vhlon"]))
					{
					
						$id = htmlspecialchars($_GET["id"]);
						$t = $bdd->query("SELECT * FROM vehicles join players WHERE vehicles.id =".$id." AND players.pid =".$_SESSION['pid']." AND vehicles.pid = players.pid");
						while($r = $t->fetch())
						{
							?>
							<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="">
							<div class="container">
							<div class="row">
							<div class="col-sm-10">
							<?php
							$message = "Etape 2";
							?>
							<div class="info">
							<div class="alert alert-info container" role="alert">
							<?= $message; ?>
							</div>
							</div>
							
							<br>
							<div><h4>Certificat Immatriculation : <?= $r['plate']; ?></h4></div>
							<div>N° immatriculation : <?= str_replace('"','',$r['immatriculation']); ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Date de première immatriculation: <?= $r['insert_time'];?></div>
							<div>Type: <?= $r['type']; ?> &nbsp; Service : <?=$r['side'];?> &nbsp; Série : <?=$r['classname'];?></div>
							<br>
							<div> Est le proprotaire du vheicule </div>
							<div><?= $r['name'];?> </div>
							<br>
							<?php
							$r['immatriculation'] = str_replace('"','',$r['immatriculation']);
							?>
								<form action="#" method="get">
								<div class="form-check">
								<input type="hidden" name="id" value="<?= $r['id'];?>">
								<input type="hidden" name="type" value="<?= $r['type'];?>">
								<input type="hidden" name="side" value="<?= $r['side'];?>">
								<input type="hidden" name="classname" value="<?= $r['classname'];?>">
								<input type="hidden" name="immatriculation_vhl" value="<?= $r['immatriculation']; ?>">
								<input type="hidden" name="insert_time" value="<?= $r['insert_time']; ?>">
								  <label class="form-check-label">
									<input class="form-check-input" name="verif" id="" type="checkbox" value="oui"> Je certifie les informations ci-dessus conforme
								  </label>

								</div>
								<button type="submit" class="btn btn-success" name="valide">Enregistrer</button>
								</form>
							</div>
							</div>
							</div>
							</div>
							<?php
						}

						
					}
					if(isset($_GET["valide"]))
						{
							if($_GET["verif"] === "oui")
							{
								$id = htmlspecialchars($_GET['id']);
								$type = htmlspecialchars($_GET['type']);
								$side = htmlspecialchars($_GET['side']);
								$classname = htmlspecialchars($_GET['classname']);
								$insert_time = htmlspecialchars($_GET['insert_time']);
								$immatriculation_vhl = htmlspecialchars($_GET['immatriculation_vhl']);

								$q = $bdd->prepare("INSERT INTO info_vehicules_players(pid,	id_vhl, side_vhl, classname_vhl, type_vhl, immatriculation_vhl, achat_date_vhl, recherche_vhl, date) VALUES(:pid, :id_vhl, :side_vhl, :classname_vhl, :type_vhl, :immatriculation_vhl, :achat_date_vhl, :recherche_vhl, NOW())");
								$q->bindValue("pid", $_SESSION['pid']);
								$q->bindValue("id_vhl", $id);
								$q->bindValue("side_vhl", $side);
								$q->bindValue("classname_vhl", $classname);
								$q->bindValue("type_vhl", $type);
								$q->bindValue("immatriculation_vhl", $immatriculation_vhl);
								$q->bindValue("recherche_vhl", "non");
								$q->bindValue("achat_date_vhl", $insert_time);
								$q->execute();

								?>
								<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="">
								<div class="container">
								<div class="row">
								<div class="col-sm-10">
								<?php
								$message = "Votre véhicule a bien était enregistré au prêt des services de l'état !";
								?>
								<meta http-equiv="refresh" content="5 ; url=declar_vhl.php">
								<div class="info">
								<div class="alert alert-info container" role="alert">
								<?= $message; ?>
								<br>
								Une redirection automatique et en cours veuillez patienter !
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
								<?php
							}
							

						}
					
			
			}else
			{
				$message = "Une erreur ses produites veuilliez recommencer d'ici qu'elles instants";
				?>
				<meta http-equiv="refresh" content="5 ; url=rep.php">	
				<div class="info">
				<div class="alert alert-danger grade container" role="alert">
				<?= $message; ?>
				<br>
				Une redirection automatique et en cours veuillez patienter ! 
				</div>
				</div>
				<?php
			}
		}
			else{
				$message = "Actuellement, vous ne possédez pas de véhicule supplémentaire sur le serveur.";
				?>
				<meta http-equiv="refresh" content="5 ; url=rep.php">	
				<div class="info">
				<div class="alert alert-info grade container" role="alert">
				<?= $message; ?>
				<br>
				Une redirection automatique et en cours veuillez patienter ! 
				</div>
				</div>
				<?php
			}

		



}
require 'footer.php';