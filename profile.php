<?php

use ShadeLife\auth;

session_start();


require 'autoload.php';

auth::connection();

?>
<link rel="stylesheet" href="<?= cssuri(); ?>index.css">
<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">


<div class="container grade">
<h4>Profil de : <?= $_SESSION["name"]; ?></h4>

<p>
	changement du mot de passe :
</p>

<div class="formgnd d-flex justify-content-center">
	<form action="#" method="post">
		<input type="hidden" name="name" value="<?= $_SESSION["name"]; ?>">
		<label> Ancien de mots de passe : </label>
		<input type="text" name="ancienmdp" placeholder="Votre ancien mots de passe"><br>
		<label for="">nouveaux mots de passe :</label>
		<input type="password" name="nouvmdp" placeholder="nouveaux mots de passe"><br>
		<label for="">Repetez votre mots passe :</label>
		<input type="password" name="repetmdp" placeholder="repetez votre mots de passe"><br>
		<input type="submit" value="changer mon mot de passe">
	</form>
</div>
</div>

<hr>
<div>
<table class="table table-dark">
  <thead>
    <tr>
	  <th scope="col">id</th>
      <th scope="col">Type de mofication</th>
      <th scope="col">date</th>
    </tr>
  </thead>
  <tbody>
    
      <?= action(); ?>
    
  </tbody>
</table>
</div>
<?php 
function action()
{
		$id = $_SESSION["id"];
		global $bdd;
		$q = $bdd->prepare("SELECT * FROM motif_users WHERE id_auth = :id_auth ORDER BY id DESC LIMIT 0, 10");
		$q->bindValue(":id_auth", $id);
		$q->execute();
			while($t = $q->fetch())
			{
				?>
				<tr>
				<th scope="row"><?= $t["id"];?></th>
				<td><?= $t["motif"];?></td>
				<td><?= $t["date"];?></td>
				</tr>
				<?php
			}
		
}
?>
	<?php 

	if(isset($_POST["name"]) && isset($_POST["ancienmdp"]) && isset($_POST["nouvmdp"]) && isset($_POST["repetmdp"]))
	{
		if(isset($_POST["nouvmdp"]) == isset($_POST["repetmdp"]))
		{
			$amdp = htmlspecialchars($_POST['ancienmdp']);
			$nouvmdp = htmlspecialchars($_POST['nouvmdp']);
			$name = htmlspecialchars($_POST['name']);
			$verifpass = hash("SHA512", $amdp);
			global $bdd;
			$q = $bdd->prepare("SELECT * FROM auth WHERE login = :login");
			$q->execute(array('login'=> $name));
			while ($r = $q->fetch())
			{
				$idusers = $r['id'];
				$email = $r['email'];
				if($r["mdp"] == $verifpass)
				{
					$pass = hash("SHA512", $nouvmdp);
					$q = $bdd->prepare("UPDATE auth SET mdp = :mdp WHERE login = :login");
					$q->execute(array('mdp'=> $pass, 'login'=> $name));
					$erreurmessagelogin = "Le mot de passe a bien était modifier !";
					$q = $bdd->prepare("INSERT INTO motif_users(id_auth, motif, date) VALUES(:id_auth, :motif, NOW())");
					$q->execute(array("id_auth" => $idusers, "motif" => "changement du mot de passe par l'utilisateur"));
					$messagemail = "une modification de votre mot de passe à était éffecuter sur votre compte";
					mail($email, "Modification de votre mot de passe", $messagemail);
				?>
				<div class="d-flex justify-content-center">
				<div class="alert alert-warning" role="alert">
				  <?=  $erreurmessagelogin; ?>
				</div>
			  </div>
			  <?php
				}
			}

		}
		else
		{
			echo "il y a un probmleme";
		}
	}