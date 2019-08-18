<?php

namespace ShadeLife;

/**
 * - Pour les bluefort and medic 
 */


class BlueFort extends Players
{



	 public function displayCopLevel($rank)
	 {
		$ranks = array( 0 => null,
						1 => '1ère Classe',
						2 => 'Soldat',
						3 => 'Caporal',
						4 => 'Sergent',
						5 => 'Adjudant',
						6 => 'Major',
						7 => 'Lieutenant',
						8 => 'Capitaine',
						9 => 'Commandant',
						10 => 'Colonel',
						11 => 'Général');
        return $ranks[$rank];
	}
	
	
	public function Displaylevel($level)
	{
		
		if($level != 0)
			{
				switch ($level) {
					case 0:
						echo $this->displayCopLevel(0);
						$_SESSION['cop'] = null;
						break;
					case 1:
						echo $this->displayCopLevel(1);
						$_SESSION['cop'] = 1;
						break;
					case 2:
						echo $this->displayCopLevel(2);
						break;
					case 3:
						echo $this->displayCopLevel(3);
						break;
					case 4:
						echo $this->displayCopLevel(4);
						break;
					case 5:
						echo $this->displayCopLevel(5);
						break;
					case 6:
						echo $this->displayCopLevel(6);
						break;
					case 7:
						echo $this->displayCopLevel(7);
						break;
					case 8:
						echo $this->displayCopLevel(8);
						break;
					case 9:
						echo $this->displayCopLevel(9);
						break;
					case 10:
						echo $this->displayCopLevel(10);
						$_SESSION['cop'] = 10;
						break;
					case 11:
						echo $this->displayCopLevel(11);
						$_SESSION['cop'] = 11;
						break;
				}
			}
	}


	public function GetPlayersCasier()
	{
		global $bdd;
		$q = $bdd->query("SELECT COUNT(*) AS pid FROM casier_jud WHERE pid = ".$this->pid."")->fetchColumn();
		if($q > 0)
		{
			echo $q;
		}
	}

	public function GetPlayerswanted()
	{
		global $bdd;
		$active ="on";
		$q = $bdd->query("SELECT count(*) FROM wantedP WHERE active = 1")->fetchColumn();
		if($q > 0)
		{
			?>
			<a href="wantedplayer.php"><button type="button" class="btn btn-danger">Wanted <span class="badge badge-light"><?= $q;?></span></button></a>
			<?php
		}
	}

	public function GetplayersCasierView()
	{
		global $bdd;
		$q = $bdd->query("SELECT COUNT(*) AS pid FROM casier_jud WHERE pid = ".$this->pid."")->fetchColumn();
		if($q > 0)
		{ ?>
			<div class="container table-responsive-sm ">
	
			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">type</th>
					<th scope="col">détail</th>
					<th scope="col">Par</th>
					<th scope="col">Date</th>
					</tr>
				</thead>
				<tbody>
				<?php
			$q = $bdd->query("SELECT * FROM casier_jud WHERE pid = ".$this->pid."");
			while ($r = $q->fetch())
			{
				?>
				<tr>
				<th scope="row"><?= htmlspecialchars($r['type']); ?></th>
				<th scope="row"><?= htmlspecialchars($r['txt']); ?></th>
				<th scope="row"><?= htmlspecialchars($r['name']); ?></th>
				<th scope="row"><?= htmlspecialchars($r['date']); ?></th>
				</tr>
				<?php
			}
		}else
		{
			?>
			<div class="info">
			<div class="alert alert-info grade container" role="alert">
			Casier Vierge
			</div>
			</div>
			<?php
		}
	}

	public function GetPlayersBageWanted()
	{
		global $bdd;
		$q = $bdd->query("SELECT * FROM wantedP WHERE active = 1 AND pid = ".$this->pid."")->fetchColumn();
		if($q["active"] == 1)
			{
				?>
				<img class="rednotice" src="<?= imguri();?>rednotice.png"  alt="">
				<?php
			}
		
		
	}

	public function GetPlayersBageWantedMini()
	{
		global $bdd;
		$q = $bdd->query("SELECT * FROM wantedP WHERE active = 1 AND pid = ".$this->pid."")->fetchColumn();
		if($q["active"] == 1)
			{
				?>
				<img class="rednoticemini" src="<?= imguri();?>rednotice.png"  alt="">
				<?php
			}
		
		
	}

	public function GetMaqueLu()
	{
		global $bdd;
		$q = $bdd->query("SELECT * FROM rapport_int WHERE nonlu = 1 AND id = ".$_GET["id"]."")->fetchColumn();
		if($q["active"] == 1)
			{
				?>
				<form action="#" method="get">
				<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
				<button type="submit" name="lu" class="btn btn-secondary" title="Marquer comme lu"><i class="far fa-envelope-open"></i> Marquer comme lu</button>
				</form>
				<?php
			}
	}

	public function GetPlayersrapportnonlu()
	{
		global $bdd;
		$active ="on";
		$q = $bdd->query("SELECT count(*) FROM rapport_int WHERE nonlu = 1")->fetchColumn();
		if($q > 0)
		{
			?>
			<a href="intervention.php"><button type="button" class="btn btn-primary">Rapport <span class="badge badge-light"><?= $q;?></span></button></a>
			<?php
		}
	}
}