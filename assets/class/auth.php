<?php

namespace ShadeLife;

class auth 
{


	public static function generateToken(){

		$token = random_bytes(32);
		$token = bin2hex($token);
		return $token;
	}

	/**
	 * veriffLoginGend
	 *
	 * @param  mixed $value
	 * @var $_SESSION['name]; verifie si l'identification et toujours possible 
	 * @return void
	 */
	
	private static function veriffLoginGend()
	{
		if(isset($_SESSION['name']))
		{
			global $bdd;
			$q = $bdd->query("SELECT * FROM players WHERE pid = ".$_SESSION['pid']."");
			$q->execute();
			if($r = $q->fetch()){
				if($r['coplevel'] >= 1)
				{
					return true;
				}
				else{
					?>	
					<script>
						window.location.replace("403.php");
					</script>
					<?php
					die();
				}
			}
		}
	}

	private static function veriffLoginGendAdmin()
	{
		if(isset($_SESSION['name']))
		{
			global $bdd;
			$q = $bdd->query("SELECT * FROM players WHERE pid = ".$_SESSION['pid']."");
			$q->execute();
			if($r = $q->fetch()){
				if($r['coplevel'] >= 7)
				{
					
				}
				else{
					?>	
					<script>
						window.location.replace("403.php");
					</script>
					<?php
					die();
				}
			}
		}
	}


	/**
	 * connection
	 *
	 * @var $_SESSION['name'] 
	 * - N'est pas trouver il redirige vers la page de connection
	 * @return void
	 */
	public static function connection()
	{
		if(!isset($_SESSION['name']))
		{
			?>	
			<script>
				window.location.replace("403.php");
			</script>
			<?php
			die();
		}
	}


	public static function connectionAdmin()
	{
		if(!isset($_SESSION['admin']))
		{
			?>
			<script>
				window.location.replace("logout.php?action=logout");
			</script>
			<?php
		}
	}

	/**
	 * AuthGendarmerie
	 *
	 * @var $_SESSION['coplevel'] n'est pas trouver il redirige vers la page de connection
	 */

	public static function AuthGendarmerie()
	{
		auth::veriffLoginGend();
	}

	public static function AuthGendarmerieAdm()
	{
		auth::veriffLoginGendAdmin();
	}

	/**
	 * veriffLoginMed
	 *
	 * @var $_SESSION['medlevel'] n'est pas trouver il redirige vers la page de connection
	 */
	private static function veriffLoginMed()
	{
		if(isset($_SESSION['name']))
		{
			global $bdd;
			$q = $bdd->query("SELECT * FROM players WHERE pid = ".$_SESSION['pid']."");
			$q->execute();
			if($r = $q->fetch()){
				if($r['mediclevel'] >= 1)
				{
					return true;
				}
				else{
					?>	
					<script>
						window.location.replace("403.php");
					</script>
					<?php
					die();
				}
			}
		}
	}

	/**
	 * veriffLoginMedAdmin
	 *
	 * @var $_SESSION['medlevel'] n'est pas trouver il redirige vers la page de connection
	 */
	private static function veriffLoginMedAdmin()
	{
		if(isset($_SESSION['name']))
		{
			global $bdd;
			$q = $bdd->query("SELECT * FROM players WHERE pid = ".$_SESSION['pid']."");
			$q->execute();
			if($r = $q->fetch()){
				if($r['mediclevel'] >= 7)
				{
					return true;
				}
				else{
					?>	
					<script>
						window.location.replace("403.php");
					</script>
					<?php
					die();
				}
			}
		}
	}

	/**
	 * AuthMed
	 *
	 * @var $_SESSION['medlevel'] n'est pas trouver il redirige vers la page de connection
	 */
	public static function AuthMed()
	{
		auth::veriffLoginMed();
	}

	/**
	 * AuthMedAdm
	 *
	 * @var $_SESSION['medlevel'] n'est pas trouver il redirige vers la page de connection
	 */
	public static function AuthMedAdm()
	{
		auth::veriffLoginMedAdmin();
	}

	/**
	 * veriffLoginUsers
	 * @var $_SESSION['pid']
	 * @var $_SESSION['token']
	 * - verrifie le token de securiter dans la base de donner
	 * - securise la session utilisateur
	 * - si la session et differente redirige vers 403.php
	 */
	public static function veriffLoginUsers()
	{
		if(isset($_SESSION['pid'])) {
			global $bdd;
			$q = $bdd->query("SELECT * FROM players JOIN auth WHERE players.pid = auth.pid AND players.pid = ".$_SESSION['pid']."");
			
			if($t = $q->fetch())
			{
				if($t['token'] == $_SESSION['token']) 
				{
				
				}else{
					?>	
					<script>
						window.location.replace("403.php");
					</script>
					<?php
					die();
				}
			}
		}
	}

}
