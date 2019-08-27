<?php 
session_start();
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
			<img class="ineterpol" src="https://www.interpol.int/bundles/interpolfront/images/logo-blanc.png" alt="">
		</div>
			<div class="col-sm-8">
			<p class="recherche">Wanted</p>
			<p class="nationalite"></p>
			</div>
	</div>
	</div>
	</div>
	</div>

	<div class="container grade table-responsive-sm ">
	
		<table class="table">
			<thead class="thead-dark">
				<tr>
				<th scope="col">Name</th>
				<th scope="col">Raison</th>
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			global $bdd;
			$req = $bdd->query("SELECT * FROM players join wantedP WHERE wantedP.pid = players.pid AND active = 1");
			while($r = $req->fetch())
			{
        	?>   
				<tr>
				<th scope="row"><?= htmlspecialchars($r['name']); ?></th>
				<th scope="row"><?= htmlspecialchars($r['raison']); ?></th>
				<th>
				<a href="player.php?pid=<?= htmlspecialchars($r['pid']);?>"><button type="button" class="btn btn-dark">Profile</button></a>
				<form action="#" method="get">
					<input type="hidden" name="pid" value="<?= $r['pid']; ?>">
					<button type="submit" name="final" class="btn btn-success">Fin d'alerte</button>
				</form>
				</th>
				</tr>
		   	<?php
			}
			?>
				</tbody>
  				</table>
				</div>


<?php	
}
	if(isset($_GET['final']))
	{
		global $bdd;
		$b = $bdd->prepare("UPDATE wantedP SET active = 0 WHERE pid = ".$_GET['pid']."");
		$b->execute();
		?>
		<script>
			window.location.replace("wantedplayer.php");
		</script>
		<?php
	}
	require 'footer.php';