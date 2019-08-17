<?php
session_start();
/**
 * 
 * id / option / txt / pid / date / session->name 
 * 
 * return sur le page 
 * 
 */

require '../class/bdd.php';


if (isset($_POST['option']) && isset($_POST["txt"]) && isset($_POST["pid"]) && isset($_SESSION['name']))
{

 $type = htmlspecialchars($_POST['option']);
 $txt = htmlspecialchars($_POST['txt']);
 $pid = htmlspecialchars($_POST['pid']);
 $name = htmlspecialchars($_SESSION['name']);

 global $bdd;
 $sql = "INSERT INTO casier_jud(type, txt, pid, name, date) VALUES(:type, :txt, :pid, :name, NOW())";
 $q = $bdd->prepare($sql);
 $q->execute(array("type" => $type, "txt" => $txt, 'pid' => $pid, "name" => $name));
	
} elseif (empty($_SESSION['name'])) 
{
	echo 'votre session a été désactivé';	
}
?>