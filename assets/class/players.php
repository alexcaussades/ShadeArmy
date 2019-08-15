<?php

namespace ShadeLife;

use PDO;

require 'trait/trait_player.php';
require 'bdd.php';

class Players 
{

use TPlayers;

//public $pid;

public function __construct()
{
	$this->pid = $this->regexPid();
	
}


/**
 * regexPid
 * - Vérifie que le pid soit conforme a la numerotation de steam pour preparer le fonctionement de la class player 
 * 
 * @return int
 * @param regex 7656
 */


public function regexPid()
{
	if(isset($_GET["pid"]))
	{
		$_GET['pid'] = htmlspecialchars(trim($_GET['pid']));
		if (preg_match("#^[7][6][5][6]#", $_GET['pid']))
		{
			return $this->pid = $_GET['pid'];
		}
		else {
			?>
			<div class="alert alert-danger" role="alert">
			Un problème est survenue sur le PID
			</div>
			<?php
		}
	}
}

public function getpid()
{
	echo $this->pid;
}

public function getInfo()
{
		global $bdd;
		$q = $bdd->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));

			while ($r = $q->fetch())
			{	$infosArray = array(
				$this->uid = $r['uid'],
				$this->name = $r['name'],
				$this->cash = $r['cash'],
				$this->bankacc = $r['bankacc'], 
				$this->coplevel = $r['coplevel'],
				$this->cop_licenses = $r['cop_licenses'],
				$this->civ_licenses = $r['civ_licenses'], 
				$this->med_licenses = $r['med_licenses'],
				$this->cop_gear = $r['cop_gear'],
				$this->med_gear = $r['med_gear'],
				$this->mediclevel = $r['mediclevel'], 
				$this->arrested = $r['arrested'],
				$this->aliases = $r['aliases'],
				$this->adminlevel = $r['adminlevel'],
				$this->donatorlvl = $r['donatorlvl'],
				$this->civ_gear = $r['civ_gear'],
				$this->blacklist = $r['blacklist'], 
				$this->sponsor = $r['sponsor'],
				$this->credit = $r['credit'],
				$this->lastseen = $r['last_seen'],
				$this->pointsPermis = $r['pointsPermis'],
				$this->num = $r['num'],
			);
			
	}
		$q->closeCursor();
}

public function countPlayers(){
	global $bdd;
	$sql = $bdd->query('SELECT COUNT(uid) FROM players');
	$fetch = $sql->fetch();
	return $fetch['COUNT(uid)'];
}




public function advance_identity()
{
	global $bdd;
		$q = $bdd->prepare("SELECT * FROM advanced_identity WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
		while ($r = $q->fetch())
			{	$infosArray = array(
				$this->datenaissance = $r['naissance'],
				$this->lieudenaissance = $r['lieu_naissance'],
				$this->taille = $r["taille"],
				$this->sexe = $r["sexe"],
			);
		}
		$q->closeCursor();
} 

public function getPlayersLieuNaiss()
{
	$a = $this->lieudenaissance;
	echo str_replace('"', '', $a);
}

public function getPlayersNaiss()
{
	$a = $this->datenaissance;
	$a = str_replace('"', '', $a);
	$a = str_replace(']', '', $a);
	echo str_replace('[', '', $a);
}

public function getPlayerstaille()
{
	return $this->taille;
}

public function getplayersHouse()
{
	global $bdd;
		$q = $bdd->query("SELECT COUNT(*) AS pid FROM houses WHERE pid = ".$this->pid."")->fetchColumn();
		return $q;
		
}

public function getplayersContanier()
{
	global $bdd;
		$q = $bdd->query("SELECT COUNT(*) AS pid FROM containers WHERE pid = ".$this->pid."")->fetchColumn();
		return $q;
}

public function GetPlayersFromFacture()
{
	global $bdd;
		$q = $bdd->query("SELECT COUNT(*) AS from_pid FROM factures WHERE pid = ".$this->pid."")->fetchColumn();
		return $q;
}

}