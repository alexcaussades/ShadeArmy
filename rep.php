<?php
session_start();

require 'autoload.php';

use ShadeLife\auth;
use ShadeLife\ident;
use ShadeLife\BlueFort;


/** Nouvelle identification systeme */
auth::connection();
auth::veriffLoginUsers();


?>
<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">
<?php




  if(ident::getCoplevel(1))
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
        if(ident::getCoplevel(1))
        {
          ?>
          <div>Grade : <?= bluefort::displayCopLevel($_SESSION['coplevel']); ?> <br>
			    information importante :</div>
          <br>
          <div><?= bluefort::GetPlayerswanted()." ".bluefort::GetPlayersvhl();?>
          <?php
        }
        if(ident::getCoplevel(9))
        {
          echo bluefort::GetPlayersrapportnonlu()." ".bluefort::GetPlayersrapportfav();
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
        <h5 class="card-title"> Déclaration de maison <span class="badge badge-secondary">New</span></h5>
        <p class="card-text"></p>
        <a href="./declar-house.php" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
      </div>
    </div>
  </div>
  
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"></i> Déclaration de Véhicule <span class="badge badge-secondary">New</span></h5>
        <p class="card-text"></p>
        <a href="declar_vhl.php" ><button class="btn btn-success"><i class="fas fa-share"></i> Go</button></a>
      </div>
  </div>
  </div>

 
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"> Vol de véhicule <br><span class="badge badge-secondary">New</span></h5>
        <p class="card-text"></p>
        <a href="carjacking.php" ><button class="btn btn-success"><i class="fas fa-share"></i> Go</button></a>
      </div>
    </div>
  </div>
</div>
</div>
    </div>
  </div>
</div>

<?php

  if(ident::getCoplevel(1))
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
              <h5 class="card-title"> Rapport d'intervention</h5>
              <p class="card-text"></p>
              <a href="./search.php" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
            </div>
          </div>
        </div>
        
      
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Les Amendes <span class="badge badge-secondary">New</span></h5>
              <p class="card-text"></p>
              <a href="amende.php" ><button class="btn btn-success"><i class="fas fa-share"></i> Go</button></a>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CR Vols de voiture <span class="badge badge-secondary">New</span></h5>
              <p class="card-text"></p>
              <a href="cr_vhl_de.php" ><button class="btn btn-success"><i class="fas fa-share"></i> Go</button></a>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fréquences <span class="badge badge-secondary">New</span></h5>
              <p class="card-text"></p>
              <a href="#" ><button class="btn btn-success" onclick="openWin()"><i class="fas fa-share"></i> Go</button></a>
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

  

  if(ident::getCoplevel(9))
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
              <h5 class="card-title"> Recherche</h5>
              <p class="card-text"></p>
              <a href="./search.php" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></i> CR d'inter GND </h5>
              <p class="card-text"></p>
              <a href="intervention.php" class="btn btn-success"><i class="fas fa-share"></i> Go</a>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></i> CR d'inter SDIS </h5>
              <p class="card-text"></p>
              <a href="#"> <button class="btn btn-success" disabled="disabled"><i class="fas fa-share"></i> Go</button></a>
            </div>
          </div>
        </div>
        
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> ModUser</h5>
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




require 'footer.php';
?>
