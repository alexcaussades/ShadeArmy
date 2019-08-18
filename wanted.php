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
$players = new Players;

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
				<p class="recherche">Wanted <?= $players->GetPlayersName();?> </p>
				</div>
		</div>
		</div>
		</div>
		</div>

		<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded">
		<div class="container">
		<div class="row">
		<div class="col-sm-12">

		<form action="#" method="get">
		<input type="hidden" name="pid" value="<?= $_GET['pid']; ?>">
		<input type="hidden" name="demande" value="<?= $_SESSION['name']; ?>">
		<label for="">Raison :</label>
		<input type="text" class="form-control" name="raison" id="inlineFormInputGroup">
		<div class="custom-control custom-checkbox">
		<input type="checkbox" class="custom-control-input" name="confirme" id="customCheck1">
		<label class="custom-control-label"  for="customCheck1">Je confime cette recherche !</label>
		</div>
		<br>
		<button type="submit" class="btn btn-warning">Lancer l'avis de recherche</button>
		</form>

		</div>
		</div>
		</div>
		</div>
		</div>
<?php


if(isset($_GET["confirme"]) == "on" && isset($_GET["pid"]) && isset($_GET["demande"]) && isset($_GET['raison']))
{	
	
	$pid = htmlspecialchars($_GET['pid']);
	$name = htmlspecialchars($_GET['demande']);
	$raison = htmlspecialchars($_GET['raison']);
	$type = "wanted";
	$active = 1;

	global $bdd;
	$q = $bdd->prepare("INSERT INTO wantedP(pid, demande, raison, active, date) VALUES (:pid, :demande, :raison, :active, NOW())");
	$q->bindParam(':pid', $pid);
	$q->bindParam(':demande', $name);
	$q->bindParam(':raison', $raison);
	$q->bindParam(':active', $active);
	$q->execute();

	$sql = "INSERT INTO casier_jud(type, txt, pid, name, date) VALUES(:type, :txt, :pid, :name, NOW())";
	$q = $bdd->prepare($sql);
	$q->bindParam(':pid', $pid);
	$q->bindParam(':type', $type);
	$q->bindParam(':txt', $raison);
	$q->bindParam(':name', $name);
	$q->execute();

	?>
	<div class="info">
			<div class="alert alert-info grade container" role="alert">
			La demande a bien activé 
			</div>
			</div>
	<?php
}
}