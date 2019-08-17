<?php 
session_start();
	require 'assets/class/bdd.php';
	require 'assets/auto/header.php';
	require 'assets/auto/function.php';
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
	$players = new players;

	$players->regexPid();
	$players->getInfo();
	$players->advance_identity();

	
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
?>

<div class="bandeau">

<div class="container">
<div class="row">
	<div class="col-sm-4">
		<img class="ineterpol" src="https://www.interpol.int/bundles/interpolfront/images/logo-blanc.png" alt="">
	</div>
		<div class="col-sm-8">
		<p class="recherche"><?= $players->GetPlayersName(); ?></p></p>
		<p class="nationalite">Nationalité : <?= $players->getPlayersLieuNaiss(); ?></p>
		</div>
</div>
</div>
</div>

</div>



<div class="card shadow-lg p-3 mb-5 bg-white rounded">
<div class="container identt">
  <div class="row">
    <div class="col-sm-4">
	<div><img class="avatar" src="<?= imguri() ?>avatar.jpeg" alt=""></div>
    </div>
    <div class="col-sm-4">
      <h3>Éléments d'identification</h3>
      <p><strong>Sexe:</strong> Homme</p>
	  <p><strong>Date de naissance:</strong> <?= $players->getPlayersNaiss(); ?></p>
	  <p><strong>Taille:</strong> <?= $players->getPlayerstaille(); ?></p>
	  <p><strong>Numéros CNI:</strong> <?= $players->getpid(); ?></p>
	  <br>
	  <h2>Information Complémentaire: </h2>
	  <p><strong>Points sur le permis :</strong> <?= $players->GetPlayersPointspermis() ?></p>
	  <p><strong>Numeros de téléphone:</strong> <?= $players->GetPlayersNum();?></p>
	  <p><strong>Derniere connection :</strong> <?= $players->GetPlayersLast_seen();?></p>
    </div>
    <div class="col-sm-4">
	<nav class="navbar navbar-dark bg-dark">
  <button type="button" class="btn btn-dark">Imprimier</button> <br /><br />
  <a href="#addnote"><button type="button" class="btn btn-dark">Judiciaire <span class="badge badge-light"><?= $bluefort->GetPlayersCasier(); ?></span></button></a> <br />
	</nav>

				
	</div>
  </div>
</div>
</div>
</div>


<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded">
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
				<div class="col-sm-8"><h2>Pôle Financier</h2>
				<p><strong>Total du compte :</strong> <?= $players->GetPlayersBankacc() ?></p>
				<p><strong>Nombre de Maison :</strong> <?= $players->getplayersHouse(); ?></p>
				<p><strong>Nombre de containers :</strong> <?= $players->getplayersContanier(); ?></p>
				<p><strong>Nombre de de facture émis :</strong> <?= $players->GetPlayersFromFacture();?></p>
				</div>
		</div>
	</div>
</div>


<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="addnote">
<div class="container">
		<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-8">
		<form method="post" action="assets/application/addjudiciaire.php">
		<Label><h3>Information judiciaire</h3></label>
		<br>

		<div class="form-check form-check-inline">
		<input class="form-check-input" name="option" type="checkbox" id="inlineCheckbox1" value="surveillance">
		<label class="form-check-label" for="inlineCheckbox1">Surveillance</label>
		</div>

		<div class="form-check form-check-inline">
		<input class="form-check-input" name="option" type="checkbox" id="inlineCheckbox2" value="infraction">
		<label class="form-check-label" for="inlineCheckbox2">Infraction</label>
		</div>

		<div class="form-check form-check-inline">
		<input class="form-check-input" name="option" type="checkbox" id="inlineCheckbox3" value="detention" disabled>
		<label class="form-check-label" for="inlineCheckbox3">Detention</label>
		</div>

		<div class="form-group">
		<textarea class="form-control" name="txt" id="exampleFormControlTextarea1" rows="3"></textarea>
		</div>
		
		<input type="hidden" name="pid" value="<?= $_GET['pid']?>">
		<input type="hidden" name="name" value="<?= $_SESSION['name']?>">

		<button type="reset" class="btn btn-dark">Reset</button>
		<button type="submit" class="btn btn-success">Enregistrement</button>
		</form>
		</div>

		
</div>
</div>
</div>
<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="addnote">
<div class="container">
		<div class="row">
		
		<div class="col-sm-12"><h2>Casier Judiciaire</h2>
		<?= $bluefort->GetplayersCasierView();?>
		</div>
		</div>
</div>
<?php
}
?>