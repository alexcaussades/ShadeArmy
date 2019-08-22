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
		<?php
		//$q = $bdd->query("SELECT count(*) FROM houses WHERE pid = ".$_SESSION['pid']."")->fetchColumn();
		//$r = $bdd->query("SELECT count(*) FROM declar_house WHERE pid = ".$_SESSION["pid"]."")->fetchColumm();
		$rt = 1;
		if($rt == 1)
		{	global $bdd;
			$q = $bdd->prepare("SELECT * FROM `houses` INNER JOIN delacre_houses ON houses.pid = ".$_SESSION['pid']." AND NOT EXISTS (SELECT * FROM delacre_houses WHERE houses.id = delacre_houses.id_houses)");
			$t -> $q->fetch()
			?>
			<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="addnote">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<img src="./assets/img/logo_dgfip.jpg" alt="">
					</div>
					<div class="col-sm-4">
					<form action="#" method="get">
					
					qsdqsdqsd
					
					</form>
					</div>
				</div>
			</div>
		</div>
			<?php
		}else{
			?>
			<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="addnote">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<img src="./assets/img/logo_dgfip.jpg" alt="">
					</div>
					<div class="col-sm-4">
					<?php echo "tout et ok"; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
	?>


<?php
}
