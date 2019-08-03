<?php

namespace ShadeLife;

/**
 * - Recupère les donners de table Players via le PID utilisateurs steam
 * - Via la class Players 
 */

//require '../bdd.php';

trait TPlayers

{
	public function GetPlayersPid($value = "pid")
	{
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	// public function GetPlayersUid($value = "uid")
	// {
		
	// 	$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
	// 	$q->execute(array('pid'=> $this->pid));
	// 		while ($r = $q->fetch())
	// 		{
	// 			echo $r[$value];
	// 		}
	// 	$q->closeCursor();
	// }

	public function GetPlayersName($value = "name")
	{
		global $bdd;
		$q = $bdd->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersAliases($value = "aliases")
	{
		
		global $bdd;
		$q = $bdd->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersCash($value = "cash")
	{
		
		global $bdd;
		$q = $bdd->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersBankacc($value = "bankacc")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersCoplevel($value = "coplevel")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersMediclevel($value = "mediclevel")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersCiv_licenses($value = "civ_licenses")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersCop_licenses($value = "cop_licenses")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersMed_licenses($value = "med_licenses")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersCiv_gear($value = "civ_gear")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersCop_gear($value = "cop_gear")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersMed_gear($value = "med_gear")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersCiv_stats($value = "civ_stats")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersCop_stats($value = "cop_stats")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersMed_stats($value = "med_stats")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersArrested($value = "arrested")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersAdminlevel($value = "adminlevel")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersDonorlevel($value = "donorlevel")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersBlacklist($value = "blacklist")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersCiv_alive($value = "civ_alive")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersCiv_position($value = "civ_position")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersPlaytime($value = "playtime")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersLast_seen($value = "last_seen")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersBanking_pin($value = "banking_pin")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersPointspermis($value = "pointsPermis")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersAnnuaire($value = "annuaire")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersSms($value = "sms")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersAppel($value = "appel")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersNum($value = "num")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersContact($value = "contact")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersIscop($value = "IsCop")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersIsemt($value = "IsEMT")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersIsadac($value = "IsAdac")
	{
		
		$q = DB::get()->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}
}