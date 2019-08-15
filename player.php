<?php 
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
				<p><strong>Nombre de de facture émis :</strong><?= $players->GetPlayersFromFacture();?></p>
				</div>
		</div>
	</div>
</div>
