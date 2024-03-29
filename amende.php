<?php
session_start();

require 'autoload.php';


use ShadeLife\Players;
use ShadeLife\Impots;

use ShadeLife\auth;
use ShadeLife\ident;
use ShadeLife\BlueFort;


auth::connection();
auth::veriffLoginUsers();
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
			<p class="recherche1">Création d'une amende </p>
			</div>
			</div>
			</div>
			</div>
			</div>


			<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded">
			<div class="container">
			<div class="row">
			<div class="container row">
			
			<div class="col-sm">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title d-flex justify-content-center"><i class="fas fa-car ammende"></i></h5>
					<p class="card-text d-flex justify-content-center">Suite à un contrôle de véhicule</p>
					<a href="amende-car.php" class="btn btn-success d-flex justify-content-center"></i> Commencer</a>
				</div>
				</div>
				</div>

				<div class="col-sm">
					<div class="card">
				<div class="card-body">
					<h5 class="card-title d-flex justify-content-center"><i class="fas fa-user ammende"></i></h5>
					<p class="card-text d-flex justify-content-center">Suite à un contrôle de Personne</p>
					<a href="amende-search-player.php" class="btn btn-success d-flex justify-content-center"></i> Commencer</a>
				</div>
				</div>
				</div>
			</div>
			</div>
			</div>
			


			</div>
			</div>
			</div>
		<?php
	}

	require 'footer.php';