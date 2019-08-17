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
?>

<div class="bandeau">
<div class="container">
<div class="row">
	<div class="col-sm-4">
		<img class="ineterpol" src="https://www.interpol.int/bundles/interpolfront/images/logo-blanc.png" alt="">
	</div>
		<div class="col-sm-8">
		<p class="recherche">Rapport d'intervention </p>
		</div>
</div>
</div>
</div>
</div>

<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="addnote">
<div class="container">
		<div class="row">
		<div class="col-sm-12">
		<form method="post" action="assets/application/creatrapport.php">
		<br>
		<label for="">Créateur du rapport: <?= $_SESSION['name']?></label>
		<br>

		<div>
		<label for="">Type d'intervention : </label>
		<div class="form-check form-check-inline">
		<input class="form-check-input" name="option" type="checkbox" id="inlineCheckbox1" value="surveillance">
		<label class="form-check-label" for="inlineCheckbox1">Surveillance</label>
		</div>

		<div class="form-check form-check-inline">
		<input class="form-check-input" name="option" type="checkbox" id="inlineCheckbox2" value="infraction">
		<label class="form-check-label" for="inlineCheckbox2">Infraction</label>
		</div>

		<div class="form-check form-check-inline">
		<input class="form-check-input" name="option" type="checkbox" id="inlineCheckbox2" value="vol">
		<label class="form-check-label" for="inlineCheckbox2">Vol</label>
		</div>

		<div class="form-check form-check-inline">
		<input class="form-check-input" name="option" type="checkbox" id="inlineCheckbox2" value="terrorisme">
		<label class="form-check-label" for="inlineCheckbox2">Terrorisme</label>
		</div>
		</div>

		<br>

		<div class="row">

		<div class="col-sm-3">
		<label for="player">Concernant :</label>
		<input type="text" class="form-control" name="playerpid" value="<?= $_GET['pid'];?>" disabled>
		</div>

		<div class="col-sm-3">
		<label for="player">Depot de plainte :</label>
		<input type="text" class="form-control" name="plaintenum" placeholder="Numero du depot" disabled>
		</div>
		</div>

		
		<br>

		<div class="row">

		<div class="col-sm-3">
		<label for="player">Date d'intervention :</label>
		<input type="datetime-local" class="form-control" name="dateinter">
		</div>

		<div class="col-sm-3">
		<label for="player">City :</label>
		<input type="text" class="form-control" name="city" placeholder="City">
		</div>

		<div class="col-sm-3">
		<label for="player">GPS :</label>
		<input type="text" class="form-control" name="gps" placeholder="GPS">
		</div>

		</div>
		</div>
		</div>

		<br>

		<div class="form-group">
		<label for="">Détail : </label>
		<textarea class="form-control" name="txt" id="exampleFormControlTextarea1" rows="3"></textarea>
		</div>
		
		<input type="hidden" name="name" value="<?= $_SESSION['name']?>">
		<input type="hidden" name="pid" value="<?= $_SESSION['pid']?>">

		<button type="reset" class="btn btn-dark">Reset</button>
		<button type="submit" class="btn btn-success">Enregistrement</button>
		</form>
		</div>

		
</div>
<?php
}
?>