<?php
require 'assets/auto/header.php';
require 'assets/auto/function.php';
require 'assets/class/ident.php';
//require 'assets/class/bdd.php';

use ShadeLife\ident;
$ident = new ident;

?>
<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">

<div class="container grade">
<h3>Je crée mon compte !</h3>

<p>
	Bienvenue dans la procedure de création de votre compte !
</p>
<div class="container">
<div class="alert alert-info" role="alert">
<p>
	<strong>Etape: 1</strong> Renseigner, votre PID et l'adresse E-Mail.
</p>
</div>
</div>

<form name="register" action="#" method="post">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">Register</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
				<input type="text" class="form-control" aria-label="Large" name="pid" id="inlineFormInputGroup" placeholder="votre PID">
				</div>
				<label class="sr-only" for="inlineFormInput">Email</label>
                <div class="input-group mb-2">
                <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input type="text" class="form-control" name="email" id="inlineFormInputGroup" placeholder="votre Email">
          </div>
        </div>
        
      <div class="col-auto">
            <button type="submit" class="btn btn-success mb-2"><i class="fas fa-share"></i> Go</button>
        </div>
</form>
</div>

<?php
if(isset($_POST['pid']) && !empty($_POST["pid"]) && isset($_POST["email"]) && !empty($_POST["email"]))
{
		$pid = htmlentities(trim($_POST['pid']));
		$email = htmlentities(trim($_POST['email']));
		if (preg_match("#^[7][6][5][6]#", $pid))
		{
			global $bdd;
			$q = $bdd->prepare("SELECT * FROM players WHERE pid = :pid");
			$q->execute(array("pid" => $pid));
			while ($r = $q->fetch())
			{
				$setname = $r['name'];			
			}
			if(isset($setname))
			{
			        $pass = $ident->register();
					$newpass = hash("SHA512", $pass);
					if(isset($setname) && isset($newpass) && isset($email) && isset($pid))
					{
						global $bdd;
						$t = $bdd->prepare("INSERT INTO auth (login, mdp, email, pid, creattime, lastseen) VALUES (:login, :mdp, :email, :pid, NOW(), NOW())");
						$t->bindParam(':login', $setname);
						$t->bindParam(":mdp", $newpass);
						$t->bindParam(":email", $email);
						$t->bindParam(":pid", $pid);
						$t->execute();
						?>
						<div class="container">
						<div class="alert alert-success" role="alert">
  						<p>Etape: 2 </p>
						Bonjour <?= $setname; ?>, votre compte à bien était crée !<br /> Merci de verifier votre compte email: <?= $email; ?>.
						</div>
						</div>
						<?php
						$messagemail = "Votre login : ".$setname.". Nouveaux mot de passe : " .$pass ." votre compte et activer ";
						mail($email, "création de votre compte", $messagemail);
					}
			}		
			}else {
			?>
			<div class="alert alert-danger" role="alert">
			Un problème est survenue sur le PID
			</div>
			<?php
			}
}

