<?php
session_start();

require 'assets/auto/header.php';
require 'assets/auto/function.php';
require 'assets/class/bdd.php';
require 'assets/class/players.php';
require 'assets/class/bluefort.php';
require 'assets/class/ident.php';
use ShadeLife\Players;
use ShadeLife\ident;
use ShadeLife\BlueFort;
$ident = new ident;
$player = new Players;
$bleufort = new BlueFort;



if(!isset($_SESSION['name']))
{
	?>
	<script>
     	window.location.replace("index.php");
    </script>
	<?php
}else
{ if($ident->getCoplevel(1))
	{
  		require 'assets/auto/navbar-gendarmerie.php';
	}
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
				</div></div>

				<!-- button maquer comme lu -->
				<?= $bleufort->GetMaqueLu();?>
				<br>
				<?= $bleufort->SetRapportFavory();?>
				</div>
				
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
					<input type="hidden" name="suitedesuivie" value="Affaire Classer">
					<button type="submit" class="btn btn-secondary" name="classer">Classer</button>
					</form>
					&nbsp; &nbsp;	
					<form action="#reply" method="get">
					<input type="hidden" name="id" value="<?= $r['id']; ?>">
					<button type="submit" class="btn btn-success" name="creatsuite">poursuite</button>
					</form></div>

					</div>
					</div>
					</div>

					<div class="card shadow-lg p-3 mb-5 bg-white rounded">
					<div class="container">
					<div class="row">

					<div class="container grade table-responsive-sm ">
	
		<table class="table">
			<thead class="thead-dark">
				<tr>
				<th scope="col">Name</th>
				<th scope="col">Information</th>
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			global $bdd;
			$req = $bdd->query("SELECT * FROM players join rapport_int_suite WHERE rapport_int_suite.pid = players.pid AND id_rapport = ".$_GET['id']."");
			while($r = $req->fetch())
			{
        	?>   
				<tr>
				<th scope="row"><?= htmlspecialchars($r['name']); ?></th>
				<th scope="row"><?= htmlspecialchars($r['text_suite']); ?></th>
				<th>
				<?php
						if($r['classer'] == 1)
						{
							?>
							<button type="button" class="btn btn-success" disabled>repondre <i class="fas fa-reply"></i></button>
							<?php
						}else{
							?>
							<form action="#reply" method="get">
							<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
							<button type="submit" name="reply" class="btn btn-success">repondre <i class="fas fa-reply"></i></button>
							</form>
							<?php
						}
					
					?>
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


					<?php
					if(isset($_GET['affaire']))
					{
						$id = $_GET['rapport'];
						$poursuite = $_GET['suitedesuivie'];
						$pid = $_GET['pid'];
						?>
						<form action="#" method="get">
						<label for="">Suite a donner ! </label><br>
						<input type="text" name="id" value="<?= $r['id']; ?>">
						
						<button type="submit" name="affaire">poursuite</button>
						</form>
						<?php
					}

					if(isset($_GET['classer']))
					{
						$classement = $_GET['suitedesuivie'];
						$classer = 1;
						$id_rapport = $_GET["id"];
						$pid = $_SESSION['pid'];
						global $bdd;
						$q = $bdd->prepare("INSERT INTO rapport_int_suite(id_rapport, pid, text_suite, classer, date) VALUES(:id_rapport, :pid, :text_suite, :classer, NOW())");
						$q->bindValue(":id_rapport", $id_rapport);
						$q->bindValue(":pid", $pid);
						$q->bindValue(":text_suite", $classement);
						$q->bindValue(":classer", $classer);
						$q->execute();
						?>
						<script>
							window.location.replace("compterendu.php?id=<?= $id_rapport; ?>");
						</script>
						<?php
					}

					if(isset($_GET["lu"]))
				 	{
						$id = $_GET['id'];
						$pid = $_SESSION['pid'];
						$active = 1;
						global $bdd;
						$q = $bdd->prepare("INSERT INTO rapport_int_lue(rapport_id, pid, active) VALUES(:rapport_id, :pid, :active)");
						$q->bindValue(":rapport_id", $id);
						$q->bindValue(":pid", $pid);
						$q->bindValue(":active", $active);
						$q->execute();
						?>
						<script>
							window.location.replace("compterendu.php?id=<?=$id;?>");
						</script>
						<?php
						
					 }
					 
					if(isset($_GET['bookmarks']))
					{
						$id_rapport = $_GET["id"];
						$pid = $_SESSION['pid'];
						global $bdd;
						$q = $bdd->prepare("INSERT INTO rapport_int_fav(id_rapport, pid) VALUES(:id_rapport, :pid)");
						$q->bindValue(":id_rapport", $id_rapport);
						$q->bindValue(":pid", $pid);
						$q->execute();
						?>
						<script>
							window.location.replace("compterendu.php?id=<?= $id_rapport; ?>");
						</script>
						<?php
					}

					if(isset($_GET['unsetbookmarks']))
					{
						$id_rapport = $_GET["id"];
						$pid = $_SESSION['pid'];
						global $bdd;
						$q = $bdd->prepare("DELETE FROM rapport_int_fav WHERE id_rapport = :id_rapport AND pid = :pid");
						$q->bindValue(":id_rapport", $id_rapport);
						$q->bindValue(":pid", $pid);
						$q->execute();
						?>
						<script>
							window.location.replace("compterendu.php?id=<?= $id_rapport; ?>");
						</script>
						<?php
					}

					if(isset($_GET['reply']))
					{
						?>
							<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="reply">
								<div class="container">
										
										<form action="#" method="get">
										<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
										
										<Label>Reponse : </Label> <br />
										<input class="form-control" name="textdesuivie" type="text" placeholder="Envoyer une reponse">
										<br>
										<button type="submit" class="btn btn-success" name="replys">Envoyer <i class="fas fa-reply"></i></button>
										</div>
										</form>
										
							</div>
							</div>
							</div>
					<?php	
					}

					if(isset($_GET['creatsuite']))
					{
						?>
							<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="reply">
								<div class="container">
										
										<form action="#" method="get">
										<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
										
										<Label>Qu'elle est l'étape suivante ; </Label> <br />
										<input class="form-control" name="textdesuivie" type="text" placeholder="">
										<br>
										<button type="submit" class="btn btn-success" name="replys">Envoyer <i class="fas fa-reply"></i></button>
										</div>
										</form>
										
							</div>
							</div>
							</div>
					<?php	
					}

					
						if(isset($_GET['replys']))
						{
						
						$classement = htmlspecialchars($_GET['textdesuivie']);
						$classer = 0;
						$id_rapport = $_GET["id"];
						$pid = $_SESSION['pid'];
						global $bdd;
						$q = $bdd->prepare("INSERT INTO rapport_int_suite(id_rapport, pid, text_suite, classer, date) VALUES(:id_rapport, :pid, :text_suite, :classer, NOW())");
						$q->bindValue(":id_rapport", $id_rapport);
						$q->bindValue(":pid", $pid);
						$q->bindValue(":text_suite", $classement);
						$q->bindValue(":classer", $classer);
						$q->execute();
						?>
						<script>
							window.location.replace("compterendu.php?id=<?= $id_rapport; ?>#reply");
						</script>
						<?php
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


}require 'footer.php';