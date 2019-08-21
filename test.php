<?php
session_start();
require 'assets/class/bdd.php';
ini_set('display_errors', 1); 
error_reporting(E_ALL); 

// $info = 76561198197341191;

// global $bdd;
// $q = $bdd->query("SELECT * FROM players join wantedP WHERE wantedP.pid = players.pid AND active = 1");
// while ($p = $q->fetch())
// {
// 	$name = $p["name"];
// 	$pid = $p["pid"];

// 	echo $name;

// 	//UPDATE auth SET mdp = :mdp WHERE email = :email
// 	//$b = $bdd->prepare("UPDATE wantedP SET active = 0 WHERE pid = ".$pid."");
// 	//$b->execute();


// }

//echo $_SESSION["pid"];
?>
<form method="post" action="#">
   <p>
       <label for="pays">immatriculation </label><br />
       <select name="pays" id="pays">
<?php
$t = $bdd->query("SELECT * FROM vehicles");
while ($r = $t->fetch())
{
	?>
           <option value="immat"><?= str_replace('"', '',$r['immatriculation']);?></option>
    
  <?php
}
?>     
</select>
   </p>
</form>