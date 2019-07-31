<?php

namespace ShadeLife;


trait TPlayers

{
	public function GetPlayersPid($value = "pid")
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

	public function GetPlayersUid($value = "uid")
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
		global $bdd;
		$q = $bdd->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				echo $r[$value];
			}
		$q->closeCursor();
	}

	public function GetPlayersCoplevel($value = "coplevel")
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

	public function GetPlayersMediclevel($value = "mediclevel")
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

	public function GetPlayersCiv_licenses($value = "civ_licenses")
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

	public function GetPlayersCop_licenses($value = "cop_licenses")
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

	public function GetPlayersMed_licenses($value = "med_licenses")
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

	public function GetPlayersCiv_gear($value = "civ_gear")
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

	public function GetPlayersCop_gear($value = "cop_gear")
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

	public function GetPlayersMed_gear($value = "med_gear")
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

	public function GetPlayersCiv_stats($value = "civ_stats")
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

	public function GetPlayersCop_stats($value = "cop_stats")
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

	public function GetPlayersMed_stats($value = "med_stats")
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

	public function GetPlayersArrested($value = "arrested")
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

	public function GetPlayersAdminlevel($value = "adminlevel")
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

	public function GetPlayersDonorlevel($value = "donorlevel")
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

	public function GetPlayersBlacklist($value = "blacklist")
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

	public function GetPlayersCiv_alive($value = "civ_alive")
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

	public function GetPlayersCiv_position($value = "civ_position")
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

	public function GetPlayersPlaytime($value = "playtime")
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

	public function GetPlayersLast_seen($value = "last_seen")
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

	public function GetPlayersBanking_pin($value = "banking_pin")
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

	public function GetPlayersPointspermis($value = "pointsPermis")
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

	public function GetPlayersAnnuaire($value = "annuaire")
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

	public function GetPlayersSms($value = "sms")
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

	public function GetPlayersAppel($value = "appel")
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

	public function GetPlayersNum($value = "num")
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

	public function GetPlayersContact($value = "contact")
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

	public function GetPlayersIscop($value = "IsCop")
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

	public function GetPlayersIsemt($value = "IsEMT")
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

	public function GetPlayersIsadac($value = "IsAdac")
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
}