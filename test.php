<?php
session_start();
require 'assets/class/bdd.php';
echo $_SESSION['pid'];
echo '<br>';
global $bdd;
$q = $bdd->prepare("SELECT * FROM players WHERE pid = :pid");
$q->execute(array(':pid' => $_SESSION['pid']));

$role = $q->fetch();


echo '<br>';

function getCoplevel($requirelvl): bool
{
	global $bdd;
	$q = $bdd->prepare("SELECT * FROM players WHERE pid = :pid");
	$q->execute(array(':pid' => $_SESSION['pid']));
	$role = $q->fetch();
		if($role['coplevel'] > $requirelvl)
		{
			return true;
		}
}

if (getCoplevel(9))
{
	echo 'test';
}