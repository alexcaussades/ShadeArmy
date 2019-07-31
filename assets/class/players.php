<?php

namespace ShadeLife;


require 'trait/trait_player.php';
require 'bdd.php';

class Players
{

use TPlayers;

public $pid;

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
$_GET['pid'] = "7656141514";
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
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));

			while ($r = $q->fetch())
			{	$infosArray = array(
				$r['uid'] => $this->uid,
				$r['name'] => $this->name,
				//$r['pid'] => $this->pid,
				$r['cash'] => $this->cash,
				$r['bankacc'] => $this->bankacc,
				$r['coplevel'] => $this->coplevel,
				$r['cop_licenses'] => $this->cop_licenses,
				$r['civ_licenses'] => $this->civ_licenses,
				$r['med_licenses'] => $this->med_licenses,
				$r['cop_gear'] => $this->cop_gear,
				$r['med_gear'] => $this->med_gear,
				$r['mediclevel'] => $this->mediclevel,
				$r['arrested'] => $this->arrested,
				$r['aliases'] => $this->aliases,
				$r['adminlevel'] => $this->adminlevel,
				$r['donatorlvl'] => $this->donatorlvl,
				$r['civ_gear'] => $this->civ_gear,
				$r['blacklist'] => $this->blacklist,
				$r['sponsor'] => $this->sponsor,
				$r['credit'] => $this->credit
			);
			return $infosArray;
	}
		$q->closeCursor();
}

public static function countPlayers(){
	$sql = DB::get()->query('SELECT COUNT(uid) FROM players');
	$fetch = $sql->fetch();
	return $fetch['COUNT(uid)'];
}

}