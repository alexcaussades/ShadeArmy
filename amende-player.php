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
			<p class="recherche1">Création d'une Amende </p>
			</div>
			</div>
			</div>
			</div>
			</div>
		<?php
		$q = $bdd->query("SELECT * FROM players WHERE pid = ".$_GET['pid']."");
		$r = $q->fetch();
		?>

		<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="">
		<div class="container">
		<div class="row">
		<div class="col-sm-12">
		<div class="form-group">
		<form action="" method="get">
		<select multiple class="form-control" id="exampleFormControlSelect2" name="crime[]">
		<?php
		$t = $bdd->query("SELECT * FROM interpol_crimes");
		while ($crime = $t->fetch())
		{
			?>
			<option value="<?= $crime['price'];?>"><?= $crime['crime'];?></option>
			<?php
		}
		?>
		</select>
		</div>
		
		</select>
		<input type="hidden" name="pid"  value="<?= $_GET['pid'];?>">
		<button type="submit" name="prepa" class="btn btn-primary">Poursuivre l'amendement</button>
		</form>


		</div>
		</div>
		<?php
		if(isset($_GET["prepa"]))
		{
			?>
			<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="">
			<div class="container">
			<div class="row">
			<div class="col-sm-12">
			<form action="#" method="get">
			<label for="">Somme a payer pour l'amende</label>
			<div class="input-group mb-3">
			<div class="input-group-prepend">
			<span class="input-group-text">$</span>
			</div>
			<input type="hidden" name="pid" value="<?= $_GET['pid'];?>">
			<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?= array_sum($_GET["crime"]);?>">
			</div>

			<div class="custom-control custom-checkbox">
			<input type="checkbox" name="paid" value="1" class="custom-control-input" id="customCheck1">
			<label class="custom-control-label" for="customCheck1">Le paiement de l'amende forfaitaire a-t-il était effectué sur place ?</label>
			</div>

			<input type="hidden" name="somme" id="" value="<?= array_sum($_GET["crime"]);?>">
			<input type="hidden" name="pid"  value="<?= $_GET['pid'];?>">
			
			<br>
			<button type="submit" name="create" class="btn btn-primary">Enregister</button>
			</form>
			</div>
			</div>
			</div>
			<?php
		}

		if(isset($_GET["create"]))
		{
			$somme = htmlspecialchars($_GET['somme']);
			$pid = htmlspecialchars($_GET['pid']);
			$paid = (empty($_GET["paid"])) ? '0' : htmlspecialchars($_GET["paid"]);
			
			$q = $bdd->prepare("INSERT INTO amende_players(somme, pid, paid, date) VALUES(:somme, :pid, :paid, NOW())");
			$q->bindValue(":somme", $somme);
			$q->bindValue(":pid", $pid);
			$q->bindValue(":paid", $paid);
			$q->execute();

			$q = $bdd->prepare("INSERT INTO casier_jud(type, txt, pid, name, date) VALUE(:type, :txt, :pid, :name, NOW())");
				$q->bindValue(":type", "Amende Forfaitaire");
				$q->bindValue(":txt", "Une amende forfaitaire de ".$somme." $ a était émise");
				$q->bindValue(":pid", $pid);
				$q->bindValue(":name", $_SESSION["name"]);
				$q->execute();

				$message = "L'enregistement de l'amende a bien était effectué, avec une insciption au casier judiciaire également";
			?>
			<br>
			<div class="alert alert-primary" role="alert">
			<?= $message; ?>
			</div>
			<?php
		}

		

		

		?>
		</div>
		</div>
		</div>
		</div>

<?php
	}}

require 'footer.php';