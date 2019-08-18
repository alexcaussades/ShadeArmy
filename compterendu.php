<?php
session_start();

require 'assets/auto/header.php';
require 'assets/auto/function.php';
require 'assets/class/bdd.php';
require 'assets/class/players.php';
require 'assets/class/ident.php';
use ShadeLife\Players;
use ShadeLife\ident;
$ident = new ident;
$player = new Players;



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
		$q = $bdd->prepare("SELECT * FROM rapport_int WHERE id = :id");
		$q->execute(array('id'=> $_GET["id"]));
		while($r = $q->fetch())
		{			
			$_GET["pid"] = $r['playerpid'];
					$player->regexPid();
					$player->getInfo();
			
			?>
			<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">
			<!-- header du rapport -->
			<div class="bandeau">
			<div class="container">
			<div class="row">
			<div class="col-sm-4">
			<img class="ineterpol" src="https://www.interpol.int/bundles/interpolfront/images/logo-blanc.png" alt="">
			</div>
			<div class="col-sm-8">
			<p class="recherche"> Rapport : N° <?= $r['id']; ?></p>
			</div>
			</div>
			</div>
			</div>
			</div>
			
			<br>
			<br>
			<!-- contenus du rapport  -->
			<div class="card shadow-lg p-3 mb-5 bg-white rounded">
			<div class="container">
			<div class="row">
				<div class="col-sm-4">
				<h6>Type: <?= $r['typerap']; ?></h6>
				<h6>Ville: <?= $r['city']; ?></h6>
				<h6>Gps: <?= $r['gps']; ?></h6>
				<h6>concernant: <a href="player.php?pid=<?= $r['playerpid']; ?>" title="Voir le profil de <?= $player->GetPlayersName(); ?>"><?= $player->GetPlayersName(); ?></a></h6>
				<div class="card p-3 mb-5 bg-white rounded">
				<div class="container">
				<div class="row">
				<h6>Officier: <?= $r['officier']; ?></h6>
				<br>
				<h6>Date d'intervention: <?= $r['dateinter']; ?></h6>
				<br>
				<h6>Date du rapport: <?= $r['date']; ?></h6>
				</div></div></div>
				 </div> <!--fin de balise col-sm-4 -->

				 <div class="col-sm-8">
					<h3>Détail d'intervention :</h3>
					<br>
					<?= $r['txt']; ?> 
				 </div>

			</div>
			</div>
			</div>
			</div> <!-- fin de balise card -->

			<?php
			if($ident->getCoplevel(9))
			{
				?>
					<div class="card shadow-lg p-3 mb-5 bg-white rounded">
					<div class="container">
					<div class="row">
					<!-- button des traitements -->
					<div class="d-flex justify-content-center">
					<form action="#" method="get">
					<input type="hidden" name="id" value="<?= $r['id']; ?>">
					<input type="hidden" name="suitedesuivie" value="classer">
					<button type="submit" class="btn btn-secondary" name="classer">Classer</button>
					</form>
						
					<form action="#" method="get">
					<input type="hidden" name="id" value="<?= $r['id']; ?>">
					<input type="hidden" name="suitedesuivie" value="poursuite">
					<input type="hidden" name="rapport" value="<?= $r['id']; ?>">
					<input type="hidden" name="pid" value="<?= $r['playerpid']; ?>">
					<button type="submit" class="btn btn-success" name="affaire">poursuite</button>
					</form></div>

					</div>
					</div>
					</div>
					<?php
					if(isset($_GET['affaire']))
					{
						$id = $_GET['rapport'];
						$poursuite = $_GET['suitedesuivie'];
						$pid = $_GET['pid'];
						?>
						<form action="#" method="get">
						<input type="text" name="id" value="<?= $r['id']; ?>">
						
						<button type="submit" name="affaire">poursuite</button>
						</form>
						<?php
					}

					if(isset($_GET['classer']))
					{
						$id = $_GET['rapport'];
						$classement = $_GET['suitedesuivie'];
						$pid = $_GET['pid'];
						
					}
			}
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