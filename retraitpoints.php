<?php
session_start();

require 'autoload.php';

use ShadeLife\auth;
use ShadeLife\Players;
use ShadeLife\Impots;
use ShadeLife\ident;
use ShadeLife\BlueFort;


auth::connection();
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
			<p class="recherche1">Retrait des points</p>
			</div>
			</div>
			</div>
			</div>
			</div>
			<?php
		$q = $bdd->query("SELECT * FROM players WHERE pid = ".$_GET['pid']."");
		$r = $q->fetch();
		?>

		<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded">
		<div class="container">
		<div class="row mx-auto">
		
		
		
		<form action="#" method="get">
		
		<div class="custom-control custom-checkbox">
			<input type="checkbox" name="confirme" value="true" class="custom-control-input" id="customCheck1">
			<label class="custom-control-label" for="customCheck1">Confirmation que le retrait des points est bien pour : <?= $r['name']; ?></label>
			<small id="emailHelp" class="form-text text-muted">Cliquer que le buton envoyé, sans cocher la case même si ses uns autres conducteurs</small>
		</div>
		<br>
		<input type="hidden" name="pid"  value="<?= $_GET['pid'];?>">
		<button type="submit" name="lancer" class="btn btn-primary">Envoyer</button>
		</form>
		
		
		</div>
		</div>
		</div>
		
		<?php
		if(isset($_GET["lancer"]))
		{
			$confirme = (empty($_GET["confirme"])) ? 'false' : htmlspecialchars($_GET["confirme"]);

			if($confirme === "true")
			{
				?>
				<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded">
				<div class="container">
				
									
				<form action="#" method="get">
				<div class="form-group">
				<label for="exampleInputEmail1">Combien de point sont a retirer :</label>
				<input type="txt" class="form-control" id="inlineFormInputGroup" name="pointsenmoin">
				</div>
				
				<input type="hidden" name="pid"  value="<?= $_GET['pid'];?>">
				<button type="submit" name="continue" class="btn btn-primary">Passer à l'étape suivante</button>
				</form>
				
				
				</div>
				</div>
				
				<?php
			}else{
				?>
				<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded">
				<div class="container">
				
									
				<form action="#" method="get">
				<div class="form-group">
				<label for="exampleInputEmail1">Entrez le nouveau numéro de la carte d'identité</label>
				<input type="txt" class="form-control" name="pid" id="inlineFormInputGroup" name="pointsenmoin">
				</div>
				<button type="submit" name="newcard" class="btn btn-primary">Passer à l'étape suivante</button>
				</form>
				
				
				</div>
				</div>
				
				<?php
			}

			if(isset($_GET["newcard"]))
			{
				$pid = htmlspecialchars($_GET['newpid']);
				?>
				<script>
					 window.location.replace("retraitpoints.php?pid=<?= $pid; ?>");
				</script>
				<?php
			}

			if(isset($_GET['continue']))
			{
				$moinpoint = htmlspecialchars($_GET['pointsenmoin']);
				$result = $r['pointsPermis'] - $moinpoint;
				$q = $bdd->prepare("UPDATE players SET pointsPermis = :pointsPermis WHERE pid = :pid");
				$q->bindValue(":pointsPermis", $result);
				$q->bindValue(":pid", $_GET["pid"]);
				$q->execute();

				$q = $bdd->prepare("INSERT INTO casier_jud(type, txt, pid, name, date) VALUE(:type, :txt, :pid, :name, NOW())");
				$q->bindValue(":type", "Retrait de points");
				$q->bindValue(":txt", "Il a était effectuer un retrait ".$moinpoint." points");
				$q->bindValue(":pid", $_GET["pid"]);
				$q->bindValue(":name", $_SESSION["name"]);
				$q->execute();

				$message = "Le retrait de(s) point(s) ".$moinpoint." avec insciption au casier judiciaire à bien était effectuer";
			?>
			<br>
			<div class="alert alert-primary" role="alert">
			<?= $message; ?>
			</div>
			<?php
			}
		}
	}

	require 'footer.php';