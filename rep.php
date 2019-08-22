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
    if($ident->getCoplevel(1))
        {
          /** NAVBAR GENDARMERIE */
          require 'assets/auto/navbar-gendarmerie.php';
        }else{
          /** NAVBAR civil */
          require 'assets/auto/navbar.php';
        }

	?>
		<div class="bandeau">
		<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<img class="logofrancais" src="./assets/img/logogvt.jpg" alt="">
			</div>
				<div class="col-sm-8">
				<p class="recherche1"></p>
				</div>
		</div>
		</div>
		</div>
		</div>

	
  <div class="container grade">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Bienvenue : <?= $_SESSION["name"]; ?></h5>
        <p class="card-text">
        <?php
        if($ident->getCoplevel(1))
        {
          ?>
          <div>Grade : <?= $bluefort->displayCopLevel($_SESSION['coplevel']); ?> <br>
			    information importante :</div>
          <br>
          <div><?= $bluefort->GetPlayerswanted();?>
          <?php
        }
        if($ident->getCoplevel(9))
        {
          echo $bluefort->GetPlayersrapportnonlu()." ".$bluefort->GetPlayersrapportfav();
        }
        ?>

      </div>
		</p>
	
      </div>
    </div>
  </div>
  <br>
  <div class="card segonde shadow-lg p-3 mb-5 bg-white rounded">
		<div class="container">
		<div class="row">
		<div class="col-sm-12">
  <div class="card segonde shadow-lg p-3 mb-5 bg-white rounded">
		<div class="container">
		<div class="row">
		<div class="col-sm-12">
  <h3>Civil :</h3>
	<div class="container row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><i class="far fa-address-book"></i> Déclaration de maison</h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-success disabled"><i class="fas fa-share"></i> Go</a>
      </div>
    </div>
  </div>
  
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-clipboard"></i> Déclaration de Véhicule  </h5>
        <p class="card-text"></p>
        <a href="#" ><button class="btn btn-success" disabled="disabled"><i class="fas fa-share"></i> Go</button></a>
      </div>
  </div>
  </div>

 
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-clipboard"></i> Déclaration de vol de voiture</h5>
        <p class="card-text"></p>
        <a href="#" ><button class="btn btn-success" disabled="disabled"><i class="fas fa-share"></i> Go</button></a>
      </div>
    </div>
  </div>
</div>
</div>
    </div>
  </div>
</div>

<?php

  if($ident->getCoplevel(1))
	{	
        ?>
        <div class="card segonde shadow-lg p-3 mb-5 bg-white rounded">
		<div class="container">
		<div class="row">
		<div class="col-sm-12">
        <h3>Gendarmerie :</h3>
        <div class="container row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="far fa-address-book"></i> Rapport d'intervention</h5>
              <p class="card-text"></p>
              <a href="./search.php" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
            </div>
          </div>
        </div>
        
      
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fas fa-clipboard"></i> Les Amendes <span class="badge badge-secondary">New</span></h5>
              <p class="card-text"></p>
              <a href="amende.php" ><button class="btn btn-success"><i class="fas fa-share"></i> Go</button></a>
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

  if($ident->getCoplevel(9))
	{	
      ?>
     
      <!-- Service administration  -->
      <div class="card segonde shadow-lg p-3 mb-5 bg-white rounded">
		<div class="container">
		<div class="row">
		<div class="col-sm-12">
      <h3>Administration :</h3>
        <div class="container row">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="far fa-address-book"></i> Recherche</h5>
              <p class="card-text"></p>
              <a href="./search.php" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fas fa-plus-circle"></i> Rapport d'intervention adm </h5>
              <p class="card-text"></p>
              <a href="intervention.php" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
            </div>
          </div>
        </div>
        
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="fas fa-edit"></i></i>ModUser</h5>
              <p class="card-text"></p>
              <a href="#" ><button class="btn btn-success" disabled="disabled"><i class="fas fa-share"></i> Go</button></a>
            </div>
          </div>
        </div>
      </div>
      </div>
        </div>
      </div>
      
        
        <?php
  }


}

require 'footer.php';
?>
