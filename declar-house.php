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
		<?php
		
		global $bdd;
		$q = $bdd->query("SELECT count(*)FROM houses WHERE houses.id AND pid =".$_SESSION['pid']." AND NOT EXISTS (SELECT * FROM info_houses_players WHERE pid =".$_SESSION['pid']." AND info_houses_players.id_houses)")->fetchColumn();
		
		if($q != 0)
		{	
			if($q)
			{
				?>
				<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="addnote">
				<div class="container">
				<div class="row">
				<div class="col-sm-1"><img class="intt" src="./assets/img/logo_dgfip.jpg" alt=""></div>
				<div class="col-sm-10">
				<h2>Déclaration de(s) maison(s) au prêt des services de l'état. </h2>

				<div class="grade">Sélectionnez dans le formulaire ci-dessous le(s) demeure(s) que vous voulez déclarer au prêt de l'état ! </div>
				<div class="form-group">
					<form action="" method="get">
					<select class="form-control" id="exampleFormControlSelect2" name="houses">
					<?php
					$t = $bdd->query("SELECT * FROM houses WHERE houses.id AND pid =".$_SESSION['pid']." AND NOT EXISTS (SELECT * FROM info_houses_players WHERE pid =".$_SESSION['pid']." AND info_houses_players.id_houses = houses.id)");
					while ($houses = $t->fetch())
					{
						$houses["pos"] = str_replace("[", "",$houses["pos"]);
						$houses["pos"] = str_replace("]", "",$houses["pos"]);
						?>
						<option value="<?= $houses['id'];?>"><?= $houses['pos'];?></option>
						<?php
					}
					?>
					</select>
					</div>
					</select>
					<input type="text" class="form-control" name="pseudo" id="inlineFormInputGroup" placeholder="Entrée un nom pour cette maison ?">
					<input type="hidden" name="pid"  value="<?= $_SESSION['pid'];?>">
					<br>
					<button type="submit" name="housseon" class="btn btn-primary">Je déclare mon habitation.</button>
					</form>
					</div>
				</div>
				</div>
				</div>
				</div>
				<?php

					if(isset($_GET["housseon"]))
					{
						var_dump($_GET);
						$pid = htmlspecialchars($_GET["pid"]);
						$id = htmlspecialchars($_GET["houses"]);
						$pseudo = htmlspecialchars($_GET["pseudo"]);

						$e = $bdd->prepare("INSERT INTO info_houses_players(id_houses, pid, pseudo_houses, date) VALUES(:id_houses, :pid, :pseudo_houses, NOW())");
						$e->bindValue("id_houses", $id);
						$e->bindValue("pid", $pid);
						$e->bindValue("pseudo_houses", $pseudo);
						$e->execute();

						$message = "Le gouvernement vous remercie pour la déclaration de votre habitation !.";
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
				$message = "Actuellement, vous ne possédez pas de maison supplémentaire sur le serveur.";
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

		

require 'footer.php';
