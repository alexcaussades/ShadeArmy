<?php

try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=alexcaus_shade;charset=utf8', 'alexcaus_shadeusuer', 'Z%I*al^z!bvS',
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e)
		{
			// En cas d'erreur, on affiche un message et on arrête tout
				die('Erreur : '.$e->getMessage());
		}


