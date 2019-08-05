<?php
require 'assets/auto/header.php';
require 'assets/auto/function.php';
require 'assets/class/bdd.php';
require 'assets/class/players.php';
require 'assets/class/impot.php';


use ShadeLife\Players;
use ShadeLife\Impots;


 $players = New Players();
 $players->regexPid();

?>
<h2>Essais de con BDD: </h2>
<?php $players->getInfo(); ?>
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
?>
