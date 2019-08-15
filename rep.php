<?php
session_start();

setcookie( "login", $_SESSION['name'], strtotime( '+59 minute' ),"/", true, true );
setcookie( "pid", $_SESSION['pid'], strtotime( '+59 minute' ),"/", true, true  );

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
?>
<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">
<?php
//$ident->updatesession();

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
	
	
  <div class="container grade">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Bienvenue agent : <?= $_SESSION["name"]; ?></h5>
        <p class="card-text">
			Grade : <?= $bluefort->displayCopLevel($_SESSION['coplevel']); ?> <br>
			information importante :
		</p>
		<a href="./profile.php" class="btn btn-primary"><i class="fas fa-tools"></i> My Profile</a>
		<a href="systeme.php?action=logout" class="btn btn-primary">Disconnect</a>		
      </div>
    </div>
  </div>
  <br>
  <h3>Gendarmerie :</h3>
	<div class="container row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><i class="far fa-address-book"></i> Recherche <span class="badge badge-secondary">New</span></h5>
        <p class="card-text"></p>
        <a href="./search.php" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-bullhorn"></i> Avis <span class="badge badge-secondary">New</span></h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-clipboard"></i> Les Amemdes <span class="badge badge-secondary">New</span></h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
      </div>
    </div>
  </div>
</div>
<br>

<br>
<h3>Administration :</h3>
	<div class="container row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><i class="far fa-address-book"></i> Recherche <span class="badge badge-secondary">New</span></h5>
        <p class="card-text"></p>
        <a href="./search.php" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-plus-circle"></i> AddUser <span class="badge badge-secondary">New</span></h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-edit"></i></i>ModUser <span class="badge badge-secondary">New</span></h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
      </div>
    </div>
  </div>
</div>

	
	<?php
}
?>
