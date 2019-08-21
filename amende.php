<?php
session_start();

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
  		require 'assets/auto/navbar-gendarmerie.php';
	}
	if($ident->getCoplevel(1))
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
					<a href="#" class="btn btn-success d-flex justify-content-center"></i> Commencer</a>
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
	}}