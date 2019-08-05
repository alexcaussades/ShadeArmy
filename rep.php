<?php
session_start();


require 'assets/auto/header.php';
require 'assets/auto/function.php';
require 'assets/class/bdd.php';
require 'assets/class/players.php';
require 'assets/class/impot.php';
use ShadeLife\Players;
use ShadeLife\Impots;


if($_SESSION['name'] == $_SESSION['name'])
{
	?>
	<h3>Bienvenue : <?= $_SESSION['name']; ?></h3>
	<?php
	$players = New Players();
	$players->users();
	echo $players->form();
	if($_GET['pid'])
	{

		
	
	
	$players->regexPid();
	$players->getInfo();
	

	?>
	
	<h2>Information : </h2>
	PID : <?= $players->GetPlayerspid(); ?>
	<br>
	Name : <?= $players->GetPlayersName(); ?>
	<br>

	Num : <?= $players->GetPlayersNum(); ?>

	<br>

	<h2> Impots </h2>

	<?php

	$impot = new Impots();
	echo '<br>';
	echo $impot->GlobalFacture();
	echo '<br>';
	$impot->Getbank();
	echo $impot->pour(50);
	echo '<br>';
	echo $impot->pour(25);
	echo '<br>';
	echo $impot->pour(5);
	}
}else{
	?>
	<script>
     	window.location.replace("index.php");
    </script>
	<?php
}
?>
