<?php 
session_start();
	require 'autoload.php';
	

	use ShadeLife\auth;
	use ShadeLife\Players;
	use ShadeLife\ident;
	use ShadeLife\BlueFort;
	
	ini_set('display_errors', 1); 
	error_reporting(E_ALL); 
	?>
	
	<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">
<?php

auth::connection();
auth::veriffLoginUsers();
auth::AuthGendarmerie();


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

	<div>
	<!-- <div class="btn-group" role="group" aria-label="Button group" id="myForm">
		<button class="btn btn-secondary" type="button">Amendes</button>
		<button class="btn btn-secondary" type="button">Interventions</button>
		
	</div> -->

	</div>

	<div class="garde" id="myForm">
	<div id="myForm"><h5>Infos serveur :</h5></div>
	<?= bluefort::GetPlayerswanted()." ".bluefort::GetPlayersvhl();?>
	<?php
	if(ident::getCoplevel(9))
        {
          echo bluefort::GetPlayersrapportnonlu();
		}
	?>
	</div>
<?php

if(isset($_GET['message']))
{
	$message = "La fréquence a bien été modifié ! ";
	?>
	<div class="contanier">
	<div class="alert alert-info grade container alert-dismissible fade show" role="alert">
	<?= $message; ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
	</div>
	</div>
<?php
}

if(isset($_GET['messagephrase']))
{
	$message = "Le mot d'identification a bien été modifié ! ";
	?>
	<div class="contanier">
	<div class="alert alert-info grade container alert-dismissible fade show" role="alert">
	<?= $message; ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
	</div>
	</div>
<?php
}
	

?>
	<div class="grade">
		<table class="table" >
			<thead class="thead-dark">
				<tr>
				<th scope="col">Fréquence Radio</th>
				<?php
				if(ident::getCoplevel(9))
				{
					?>
					<th scope="col">Action</th>
					<?php
				}
				?>
				</tr>
			</thead>
			<tbody>
			<?php
				$req = $bdd->query("SELECT * FROM freq");
				$r = $req->fetch();
				if(ident::getCoplevel(1))
				{
				?>   
						<tr>
						<th scope="row">GND1 : <?= htmlspecialchars($r['freq1']); ?> MHz <button class="btn btn-secondary btn-sm" data-clipboard-text="<?= htmlspecialchars($r['freq1']); ?>">copy</button></th>
						<?php
						if(ident::getCoplevel(9))
						{
							?><th>
						<form action="#" method="post">
						<div class="input-group mb-3">
						<input class="form-control" type="text" name="freqgnd1">
						<div class="input-group-append">
						<button class="btn btn-success" type="submit">Update</button></div>
						</div>
						</div>
						</form></th>
						<?php
						}
						?>
						
						</tr>
						<tr>
						<th scope="row">GND2 : <?= htmlspecialchars($r['freq2']); ?> MHz <button class="btn btn-secondary btn-sm" data-clipboard-text="<?= htmlspecialchars($r['freq2']); ?>">copy</button></th>
						
						<?php
						if(ident::getCoplevel(9))
						{
							?><th>
						<form action="#" method="post">
						<div class="input-group mb-3">
						<input class="form-control" type="text" name="freqgnd2">
						<div class="input-group-append">
						<button class="btn btn-success" type="submit">Update</button></div>
						</div>
						</div>
						</form></th>
						<?php
						}
						?>
						
						</tr>

						<tr>
						<th scope="row">GND-MDP : <?= htmlspecialchars($r['freqpassphrase']); ?></th>
						
						<?php
						if(ident::getCoplevel(9))
						{
							?><th>
						<form action="#" method="post">
						<div class="input-group mb-3">
						<input class="form-control" type="text" name="mdp">
						<div class="input-group-append">
						<button class="btn btn-success"  type="submit">Update</button></div>
						</div>
						</div>
						</form></th>
						<?php
						}
						?>
						
						</tr>
					<?php
				}
					?>
			 		</tbody>
  			</table>
  	</div>
<?php
		
		if(isset($_POST['freqgnd1']))
		{
			$freq = htmlspecialchars($_POST['freqgnd1']);
			$q = $bdd->prepare("UPDATE freq SET freq1 = ".$freq." WHERE id = 1");
			$q->execute();
			?>
			<script>
				window.location.replace("freq.php?message");
			</script>
			<?php
			
			
		}

		if(isset($_POST['freqgnd2']))
		{
			$freq = htmlspecialchars($_POST['freqgnd2']);
			$q = $bdd->prepare("UPDATE freq SET freq2 = ".$freq." WHERE id = 1");
			$q->execute();
			?>
			<script>
				window.location.replace("freq.php?message");
			</script>
			<?php
		}

		if(isset($_POST['mdp']))
		{
			$freq = htmlspecialchars($_POST['mdp']);
			$q = $bdd->prepare("UPDATE freq SET freqpassphrase = :freqpassphrase WHERE id = 1");
			$q->bindValue("freqpassphrase", $freq);
			$q->execute();
			?>
			<script>
				window.location.replace("freq.php?messagephrase");
			</script>
			<?php
		}

require 'footer.php';

?>
<script>
new ClipboardJS('.btn');
</script>
