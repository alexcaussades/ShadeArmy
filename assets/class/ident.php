<?php

namespace ShadeLife;

use function Sodium\bin2hex;

require 'bdd.php';

/**
 * Page de création de compte
 * 
 * mot de passe rdm  
 * 
 * update passworld
 * 
 *  */



class ident

{
	public function __construct()
	{
		$this->newpass = $this->generateRandomString();
		$this->nav = $this->getCoplevel(1);
		
	}
	
	
	public function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#$%^&*';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
	}    

	public function login()

	{
		if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['passworld'])&& !empty($_POST['passworld'])))
		{
			date_default_timezone_set("Europe/Paris");
			global $bdd;
			$loginusers = htmlspecialchars(trim(($_POST['login'])));
			$mdpusers = htmlspecialchars(trim(($_POST['passworld'])));
			$pass = hash("SHA512", $mdpusers);
			$q = $bdd->prepare("SELECT * FROM auth WHERE login = :login AND mdp = :mdp");
			$q->execute(array(':login' => $loginusers, ':mdp' => $pass));
			$logged = $q->fetch();
			if(!$logged)
			{
				$erreurmessagelogin = " Mauvais login ou password ! ";
				?>
				<div class="d-flex justify-content-center">
				<div class="alert alert-warning" role="alert">
				  <?=  $erreurmessagelogin; ?>
				</div>
			  </div>
			  <?php
			}
			else
			{
				global $bdd;
				$q = $bdd->prepare("UPDATE auth SET lastseen = NOW() WHERE login = :login");
				$q->bindValue(":login", $loginusers);
				$q->execute();
				session_start();
				$_SESSION['name'] = $logged['login'];
				$_SESSION['pid'] = $logged['pid'];
				$_SESSION['id'] = $logged['id'];
				global $bdd;
				$q = $bdd->prepare("SELECT * FROM players WHERE pid = :pid");
				$q->execute(array(':pid' => $_SESSION['pid']));
				while ($r = $q->fetch())
				{
					$_SESSION['coplevel'] = $r['coplevel'];
					$_SESSION['medlevel'] = $r['medlevel'];
					?>
					<script>
						window.location.replace("rep.php");
					</script>
					<?php
				}
				
			}
			
		}elseif (isset($_POST['login']) && !empty($_POST['login'])) 
		{
			$erreurmessagelogin  = "Pas de password reçu !";
			?>
			<div class="d-flex justify-content-center">
			<div class="alert alert-warning" role="alert">
			  <?=  $erreurmessagelogin; ?>
			</div>
		  </div>
		  <?php
		}
		elseif (isset($_POST['passworld']) && !empty($_POST['passworld'])) 
		{
			$erreurmessagelogin  = "Pas de login reçu !";
			?>
			<div class="d-flex justify-content-center">
			<div class="alert alert-warning" role="alert">
			  <?=  $erreurmessagelogin; ?>
			</div>
		  </div>
		  <?php
		}
		else
		{
			$erreur = 'Un probème est survenue. Contacter un administrateur';
			?>
			<div class="d-flex justify-content-center">
			<div class="alert alert-warning" role="alert">
			  <?=  $erreur; ?>
			</div>
		  </div>
		  <?php
		}
		
	}


	public function register()
	{
		return $this->newpass;
	}

	public function updatesession()
	{
			global $bdd;
				//^uEIc^Odeh$%ohJT^WtRAP4Qn
				date_default_timezone_set("Europe/Paris");
				$date = date('Y m d H:i:s');
				$loginusers = $_SESSION["name"];
				$q = $bdd->prepare("UPDATE auth SET lastseen = :lastseen WHERE login = $loginusers");
				$q->execute(array('lastseen' => $date));
				var_dump($q);
	}

	/**
	 * resetmdp
	 * - redonne un mdp via le formulaire externe
	 * - recherche via Email 
	 * - confirmation du retour vers boite email users 
	 * - set des parametres utilisateur dans Table motif_users! 
	 *
	 */
	public function resetmdp()
	{
		if(isset($_POST["email"]) && !empty($_POST['email']))
			{
				$email = htmlspecialchars(trim($_POST["email"]));
				global $bdd;
				$q = $bdd->prepare("SELECT email FROM auth WHERE email = :email");
				$q->execute(array(":email" => $email));
				$logged = $q->fetch();
				if(!$logged)
				{
					$erreurmessagelogin = " Aucun email ne correspond a votre demande";
					?>
					<div class="d-flex justify-content-center">
					<div class="alert alert-warning" role="alert">
					  <?=  $erreurmessagelogin; ?>
					</div>
				  </div>
				  <?php
				}
				else
				{
					$erreurmessagelogin = " Un email correspond bien a votre demande, votre nouveaux mot de passe et dans votre boite E-mail";
					?>
					<div class="d-flex justify-content-center">
					<div class="alert alert-warning" role="alert">
					  <?=  $erreurmessagelogin; ?>
					</div>
				  </div>
				  <?php
				    $newpass = $this->newpass;
					$pass = hash("SHA512", $newpass);
					//echo "<br>";
					//echo $newpass;
					global $bdd;
					$q = $bdd->prepare("UPDATE auth SET mdp = :mdp WHERE email = :email");
					$q->execute(array("mdp" => $pass, "email" => $email));
					global $bdd;
					$q = $bdd->prepare("SELECT * FROM auth WHERE email = :email");
					$q->execute(array('email'=> $email));
					while($r = $q->fetch())
					{
						$idusers = $r["id"];
						global $bdd;
						$q = $bdd->prepare("INSERT INTO motif_users(id_auth, motif, date) VALUES(:id_auth, :motif, NOW())");
						$q->execute(array("id_auth" => $idusers, "motif" => "changement du mot de passe fait par le formulaire"));
						// mettre en function avec la class mail
						$messagemail = "Voici votre nouveaux mot de passe : " .$newpass;
						mail($email, "Modification de votre mot passe", $messagemail);
					}
				}
			}
	}


	/**
	 * setToken
	 *
	 * - création d'un token de securité 
	 */
	public function setToken()
	{
		$token = random_bytes(32);
		$token = bin2hex($token);
		echo $token;
		setcookie( "TestCookie", $token, strtotime( '+5 minute' ) );
	}

	
	/**
	 * getCookie
	 *
	 * - Verification du cookie avec recherche bdd + insertion de la derniere connection datetime() lastseen
	 * - Set session login / pid / coplvl
	 * - Redirige vers rep.php 
	 * 
	 */
	

	
    public static function getCoplevel($requirelvl): bool
		{
			global $bdd;
			$q = $bdd->prepare("SELECT * FROM players WHERE pid = :pid");
			$q->execute(array(':pid' => $_SESSION['pid']));
			$role = $q->fetch();
				if($role['coplevel'] >= $requirelvl)
				{
					return true;
				}
				else{
					return false;
				}
		}
    



	
} //fin de class