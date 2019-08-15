<?php

namespace ShadeLife;

/**
 * - Recupère les donners de table Players via le PID utilisateurs steam
 * - Via la class Players 
 */

//require '../bdd.php';

trait TPlayers

{
	public function GetPlayersPid()
	{
		return $this->pid;
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

	public function GetPlayersName()
	{
		return $this->name;
	}

	public function GetPlayersAliases()
	{
		return $this->aliases;
	}

	public function GetPlayersCash()
	{
		return $this->cash;
	}

	public function GetPlayersBankacc()
	{
		setlocale(LC_MONETARY, 'en_US');
		$money = money_format('%(#10n', $this->bankacc);
		return $money;
	}

	public function GetPlayersCoplevel()
	{
		return $this->coplevel;
	}

	public function GetPlayersMediclevel()
	{
		return $this->mediclevel;
	}

	public function GetPlayersCiv_licenses()
	{
		return $this->civ_licenses;
	}

	public function GetPlayersCop_licenses()
	{
		return $this->cop_licenses;
	}

	public function GetPlayersMed_licenses()
	{
		return $this->med_licenses;
	}

	public function GetPlayersCiv_gear()
	{
		return $this->civ_gear;
	}

	public function GetPlayersCop_gear()
	{
		return $this->cop_gear;
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

	public function GetPlayersArrested()
	{
		return $this->arrested;
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

	public function GetPlayersLast_seen()
	{
		return $this->lastseen;
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

	public function GetPlayersPointspermis()
	{		
		return $this->pointsPermis;
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

	public function GetPlayersNum()
	{
		return $this->num;
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