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
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			global $bdd;
			$req = $bdd->query("SELECT * FROM wantedP ");
			while($r = $req->fetch())
			{
        	?>   
				<tr>
				<th scope="row"><?= htmlspecialchars($r['pid']); ?></th>
				<th><a href="player.php?pid=<?= htmlspecialchars($r['name']);?>"><button type="button" class="btn btn-dark">Profile</button></a></th>
				</tr>
		   		</tbody>
  				</table>

			</div>
			<?php
			}




	
}