<?php
session_start();
require 'assets/class/bdd.php';
ini_set('display_errors', 1); 
error_reporting(E_ALL); 

$info = 76561198197341191;

global $bdd;
$q = $bdd->query("SELECT * FROM players join wantedP WHERE wantedP.pid = players.pid AND active = 1");
while ($p = $q->fetch())
{
	$name = $p["name"];
	$pid = $p["pid"];

	echo $name;

	//UPDATE auth SET mdp = :mdp WHERE email = :email
	//$b = $bdd->prepare("UPDATE wantedP SET active = 0 WHERE pid = ".$pid."");
	//$b->execute();


}



$b = $bdd->query("SELECT COUNT(*) AS id FROM wantedP")->fetchColumn();
echo $b;

$q = $bdd->query("SELECT count(*) FROM wantedP WHERE active = 0")->fetchColumn();
echo $q;