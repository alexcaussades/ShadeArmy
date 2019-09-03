<?php

namespace ShadeLife;

class auth 
{

	/**
	 * connection
	 *
	 * @var $_SESSION['name'] n'est pas trouver il redirige vers la page de connection
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
		if(!isset($_SESSION['coplevel']))
		{
			?>	
			<meta http-equiv="refresh" content="5 ; url=rep.php">	
			<div class="info">
			<div class="alert alert-info grade container" role="alert">
			Vous n'avez pas les droits nécessaires pour consultez cette partie conctatez un administrateur !
			<br>
			Une redirection automatique et en cours veuillez patienter ! 
			</div>
			</div>
			<?php
			die();
		}

	}

	/**
	 * AuthMed
	 *
	 * @var $_SESSION['medlevel'] n'est pas trouver il redirige vers la page de connection
	 */
	public static function AuthMed()
	{
		if(!isset($_SESSION['medlevel']))
		{
			?>	
			<meta http-equiv="refresh" content="5 ; url=rep.php">	
			<div class="info">
			<div class="alert alert-info grade container" role="alert">
			Vous n'avez pas les droits nécessaires pour consultez cette partie conctatez un administrateur !
			<br>
			Une redirection automatique et en cours veuillez patienter ! 
			</div>
			</div>
			<?php
			die();
		}

	}
}