<?php 
session_start();
	require 'assets/class/bdd.php';
	require 'assets/auto/header.php';
	require 'assets/auto/function.php';
	require 'assets/class/players.php';
	require 'assets/class/ident.php';
	require 'assets/class/bluefort.php';
	require 'assets/class/shadeLife.php';
	require 'assets/class/auth.php';
use ShadeLife\auth;
use ShadeLife\Players;
	use ShadeLife\ident;
	use ShadeLife\BlueFort;
	use ShadeLife\ShadeLife;
	$clients = new ShadeLife;
	$ident = new ident;
	$bluefort = new bluefort;
	ini_set('display_errors', 1); 
	error_reporting(E_ALL); 
	?>
	<style>
	a{
		color: white;
	}
	a:hover{
		color: white;
	}
	#to{
		visibility:hidden;
	}

	.form-control{
		width: 400%;
		
	}

	
	
	</style>
	<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">
<?php

auth::connection();

	if(ident::getCoplevel(1))
	{
  		require 'assets/auto/navbar-gendarmerie.php';
	}elseif(ident::getCoplevel(5))
	{
		require 'assets/auto/navbar-gendarmerie.php';
	} else
	{
		require 'assets/auto/navbar.php';
	}

	?>
	<div class="bandeau">

<div class="container">
<div class="row">
		<div class="col-sm-12">
		<p class="recherche1">Messagerie</p>
		</div>
</div>
</div>
</div>
</div>
<?php
if(isset($_GET['message']))
{
	$message = "Le message à bien était envoyer ";
	?>
	<div class="grade container-fluid">
	<div class="row">
	<div class="col-12">
		<div class="alert alert-primary" role="alert">
		<?= $message; ?>
	</div>
	</div>
	
	</div>
	</div>
	<?php
}
?>
<div class="container">
<div class="row grade">
	<div class="col">
		<div class="btn-group-vertical align-self-start" role="group" aria-label="Vertical button group">
		<button type="button" class="btn btn-dark" onclick="compmessage()">Nouveau message</button>
		<button class="btn btn-light" onclick="repmessage()" type="button">Boîte de réception <?= $clients->GetMessage();?></button>
		<button class="btn btn-light" onclick="sendmessage()" type="button">Messages envoyés</button>
		</div>
	</div>
	<?php
	if(isset($_GET['inbox']))
	{
		?>
	<div class="col-sm-9">
		<div class="d-flex ">
			<table class="table table-dark">
				<tbody>
					<tr>
						<td>De:</td>
						<td>Suject:</td>
					</tr>
					<?php
					$req = $bdd->query("SELECT * FROM messagerie JOIN players WHERE players.pid = messagerie.topid AND players.pid = ".$_SESSION["pid"]." GROUP BY id desc ");
					while($r = $req->fetch())
					{
						?>
						<tr>
						<td><a href="?id=<?= $r['id']?>"><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#mess"> <?= $r['name'];?></a><?= $clients->GetMarqueLu($r['id']);?></td></button>
						<td><?= $r['messsubject'];?></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		<?php
	}elseif (isset($_GET['send'])) {
		?>
		<div class="col-sm-9">
		<div class="d-flex ">
			<table class="table table-dark">
				<tbody>
					<tr>
						<td>Envoyer a:</td>
						<td>Suject:</td>
					</tr>
					<?php
					$req = $bdd->query("SELECT * FROM players JOIN messagerie WHERE players.pid = messagerie.topid AND messagerie.frompid = ".$_SESSION['pid']."  GROUP BY id desc ");
					while($r = $req->fetch())
					{
						?>
						<tr>
						<td><a href="?id=<?= $r['id']?>"><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#mess"> <?= $r['name'];?>1</a><?= $clients->GetMarqueLu($r['id']);?></td></button>
						<td><?= $r['messsubject'];?></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
			<?php
			}elseif(isset($_GET['compose']))
			{
				$q = $bdd->query("SELECT * FROM players WHERE pid = ".$_SESSION["pid"]."");
				$r = $q->fetch();
				?>
				<div class="col-9">
				<div class="d-flex ">
				<form method="post" action="assets/application/envoie.php">
				<label for=""> De : <?= $r['name']; ?></label> <br>
				<?php
				if(isset($_GET['topid']))
				{
				?>
					<label for="">Pour :</label><br>
					<input class="form-control" type="text" value="<?= $_GET['topid'];?>" name="for">
				<?php
				}
				?>
				<label for="">Pour :</label><br>
				<input class="form-control" type="text" name="for">

				<label for="">Sujet :</label><br>
				<input class="form-control" type="text" name="subject">
				
				<div class="form-group">
				<label for="">Votre message :</label><br>
					<textarea id="my-textarea" class="form-control" name="messages" rows="3"></textarea>
				</div>
				<button class="btn btn-dark" type="submit">Envoyer</button>
				</form>
				<?php
			
			}else {
			if(isset($_GET['id']))
			{
				$id = htmlspecialchars($_GET['id']);
				$q = $bdd->prepare("UPDATE messagerie SET lu = :lu WHERE id = :id AND topid = ".$_SESSION['pid']."");
				$q->bindValue('lu', 1);
				$q->bindValue('id', $id);
				$q->execute();
				$q = $bdd->query("SELECT * FROM messagerie JOIN players WHERE id = ".$id." AND messagerie.frompid = players.pid");
				$r = $q->fetch();
				?>
				<div class="container">
					<div class="row">
						<div class="col-3"></div>
						<div class="col-9">

							<h5>De : <?= $r["name"];?></h5>
							<h6>Subject: <?= $r["messsubject"];?></h6>

							<div>
							<?= $r['messmessage'];?>
							</div>
							<br>
							<br>
						<form method="post" action="assets/application/envoie-reponse.php">
						<div class="form-group">
							<label for="my-textarea">Répondre : </label>
							<textarea id="my-textarea" class="form-control" name="message" rows="3"></textarea>
						</div>
						<input id="my-input" type="hidden" name="id" value="<?= $_GET['id']?>">
						<input id="my-input" type="hidden" name="topid" value="<?= $r['frompid']?>">
							<button type="submit" class="btn btn-dark">Envoyer</button>
						</form>
							<div class="alert alert-danger" role="alert">
								Non active !
							</div>
						</div>
					</div>
				</div>
					
			<?php
			}else{
				?>
					<script>
					window.location.replace('?inbox')
					</script>
					<?php
			}
					
				}
	?>
			
		</div>
	</div>

	
	
</div>	
</div>


<?php

require 'footer.php';
?>
<script>
function compmessage()
{
	window.location.replace('?compose');
}

function sendmessage()
{
	window.location.replace('?send');

}

function repmessage() 
{
	window.location.replace('?inbox');
	
}


</script>
