<?php 
//session_start();

ini_set('display_errors', 1); 
error_reporting(E_ALL); 

require '../class/bdd.php';
require '../class/bdd.php';
require '../auto/header.php';
require '../auto/function.php';
?>
<link rel="stylesheet" href="../css/recherche.css">
<div class="bandeau">
<div class="container">
<div class="row">
	<div class="col-sm-4">
		<img class="ineterpol" src="https://www.interpol.int/bundles/interpolfront/images/logo-blanc.png" alt="">
		<br><br>
	</div>
		<div class="col-sm-8">
		<br><br>
		</div>
</div>
</div>
</div>
</div>
<?php


if(isset($_POST['option']) && isset($_POST['city']) && isset($_POST['gps']) && isset($_POST['txt']) && isset($_POST['name']) && isset($_POST['pid']) && isset($_POST["dateinter"]) && isset($_POST["playerpid"]) && isset($_POST["plaintenum"]))
{
	$typeinter = htmlspecialchars(trim($_POST['option']));
	$dateinter = htmlspecialchars(trim($_POST['dateinter']));
	$city = htmlspecialchars(trim($_POST['city']));
	$gps = htmlspecialchars(trim($_POST['gps']));
	$txt = htmlspecialchars(trim($_POST['txt']));
	$officier = htmlspecialchars(trim($_POST['name']));
	$pid = htmlspecialchars(trim($_POST['pid']));
	$playerpid = htmlspecialchars(trim($_POST['playerpid']));
	$plaintenum = htmlspecialchars(trim($_POST['plaintenum']));

	echo $typeinter, $city, $gps, $txt, $officier, $pid, $playerpid, $plaintenum ;

	global $bdd;

	$q = $bdd->prepare("INSERT INTO rapport_int (typerap, city, gps, txt, officier, pid, playerpid, plaintenum, dateinter, date) VALUES (:typerap, :city, :gps, :txt, :officier, :pid, :playerpid, :plaintenum, :dateinter, now())");
	$q->bindParam(':typerap', $typeinter);
	$q->bindParam(':city', $city);
	$q->bindParam(':gps', $gps);
	$q->bindParam(':txt', $txt);
	$q->bindParam(':officier', $officier);
	$q->bindParam(':pid', $pid);
	$q->bindParam(':playerpid', $playerpid);
	$q->bindParam(':plaintenum', $plaintenum);
	$q->bindParam(':dateinter', $dateinter);
	$q->execute();
	$lastid = $bdd->lastInsertId();
	?>
		<meta http-equiv="refresh" content="5 ; url= ../../rep.php">
			<div class="info">
			<div class="alert alert-info grade container" role="alert">
			Votre rapport a bien etait enregister sous le numero: <?= $lastid; ?>
			<br>
			Une redirection automatique et en cours veuillez patienter !  
			<br>
			Une redirection automatique et en cours veuillez patienter ! 
			</div>
			</div>
	<?php
}
