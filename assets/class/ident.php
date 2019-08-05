<?php

namespace ShadeLife;

require 'bdd.php';

/**
 * Page de création de compte
 * 
 * mot de passe rdm  
 * 
 * update passworld
 * 
 * set login libre axees 
 * 
 * 
 *  */



class ident

{
	

	public function login()

	{
		if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['passworld'])&& !empty($_POST['passworld'])))
		{
			global $bdd;
			$loginusers = htmlspecialchars(trim(($_POST['login'])));
			$mdpusers = htmlspecialchars(trim(($_POST['passworld'])));
			$pass = hash(SHA512, $mdpusers);
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
				session_start();
				$_SESSION['name'] = $logged['login'];
				?>
				<script>
       				 window.location.replace("rep.php");
    			</script>
				<?php
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

}