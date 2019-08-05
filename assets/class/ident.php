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
	
	public function __construct()
	{
		
	}


	public function setname($value)
	{

	}

	public function rdmpassworld()
	{
		/** serialise */
	} 

	

	public function login()

	{
		if (isset($_POST['login']) && isset($_POST['passworld']))
		{
			global $bdd;
			$loginusers = htmlspecialchars(trim(strip_tags($_POST['login'])));
			$mdpusers = htmlspecialchars(trim(strip_tags($_POST['passworld'])));
			$pass = password_hash($mdpusers, PASSWORD_DEFAULT);
			
			$q = $bdd->prepare("SELECT * FROM auth WHERE login = ? ");
			$q->execute(array('login' => $loginusers));
			if($q == true)
			{
				$q = $bdd->prepare("SELECT * FROM auth WHERE mdp = ? ");
				$q->execute(array('mdp' => $mdpusers));
				if($q == true)
				{
					$chekpass = password_verify($autpass, $mdpusers);
				}
				
			}else {
				echo $erreurmessagelogin;
			}
			
		}
		
	}

}