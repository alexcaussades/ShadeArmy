<?php
session_start();
require '../class/bdd.php';
ini_set('display_errors', 1); 
error_reporting(E_ALL); 
if(isset($_POST['for']) && isset($_POST['subject']) && isset($_POST['messages']))
{
	$for = htmlspecialchars($_POST['for']);
	$subject = htmlspecialchars($_POST['subject']);
	$message = htmlspecialchars($_POST['messages']);

	global $bdd;
	$q = $bdd->prepare("INSERT INTO messagerie(frompid, topid, messsubject, messmessage, lu, date) VALUES(:frompid, :topid, :messsubject, :messmessage, :lu, NOW())");
	$q->bindValue("frompid", $_SESSION['pid']);
	$q->bindValue("topid", $for);
	$q->bindValue("messsubject", $subject);
	$q->bindValue("messmessage", $message);
	$q->bindValue("lu", "0");
	$q->execute();
	?>
	<script>
     	window.location.replace("../../messagerie.php");
    </script>
	<?php
	
}