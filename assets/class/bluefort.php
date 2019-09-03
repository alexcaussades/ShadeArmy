<?php

namespace ShadeLife;

/**
 * - Pour les bluefort and medic 
 */


class BlueFort extends Players
{



	 public static function displayCopLevel($rank)
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
	
	
	public static function Displaylevel($level)
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


	public static function GetPlayersCasier()
	{
		global $bdd;
		$q = $bdd->query("SELECT COUNT(*) AS pid FROM casier_jud WHERE pid = ".$this->pid."")->fetchColumn();
		if($q > 0)
		{
			echo $q;
		}
	}

	public static function GetPlayerswanted()
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

	public static function GetPlayersvhl()
	{
		global $bdd;
		$active ="on";
		$q = $bdd->query("SELECT count(*) FROM info_vehicules_players WHERE recherche_vhl = 'oui'")->fetchColumn();
		if($q > 0)
		{
			?>
			<a href="cr_vhl_de.php"><button type="button" class="btn btn-warning">vol de voiture <span class="badge badge-light"><?= $q;?></span></button></a>
			<?php
		}
	}

	public static function GetplayersCasierView()
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
			$q = $bdd->query("SELECT * FROM casier_jud WHERE pid = ".$this->pid." ORDER BY id DESC");
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

	public static function GetPlayersBageWanted()
	{
		global $bdd;
		$q = $bdd->query("SELECT * FROM wantedP WHERE active = 1 AND pid = ".$this->pid."")->fetchColumn();
		if($q["active"] == 1)
			{
				?>
				<img class="rednotice" id="test2" src="<?= imguri();?>rednotice.png"  alt="">
				<?php
			}
		
		
	}

	public static function GetPlayersBageWantedMini()
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

	public static function GetMaqueLu()
	{
		global $bdd;
		$q = $bdd->query("SELECT * FROM rapport_int_lue WHERE pid = ".$_SESSION["pid"]." AND rapport_id = ".$_GET["id"]."")->fetchColumn();
		if(!$q["active"])
			{
				?>
				<form action="#" method="get">
				<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
				<button type="submit" name="lu" class="btn btn-secondary" title="Marquer comme lu"><i class="far fa-envelope-open"></i> Marquer comme lu</button>
				</form>
				<?php
			}
	}

	public static function GetPlayersrapportnonlu()
	{
		global $bdd;
		$b = $bdd->query("SELECT COUNT(*) AS id FROM rapport_int_lue WHERE pid = ".$_SESSION["pid"]."")->fetchColumn();
		$q = $bdd->query("SELECT count(*) FROM rapport_int ")->fetchColumn();
		$t = $q-$b;
			?>
			<a href="intervention.php"><button type="button" class="btn btn-primary">Rapport <span class="badge badge-light"><?= $t;?></span></button></a>
			<?php	
	}

	public static function GetPlayersrapportfav()
	{
		global $bdd;
		$active ="on";
		$q = $bdd->query("SELECT count(*) FROM rapport_int_fav WHERE pid = ".$_SESSION["pid"]."")->fetchColumn();
		if($q > 0)
		{
			?>
			<a href="#"><button type="button" class="btn btn-info" disabled>Favoris <span class="badge badge-light"><?= $q;?></span></button></a>
			<?php
		}
	}

	public static function SetRapportFavory()
	{
		$id_rapport = $_GET['id'];
		global $bdd;
		$q = $bdd->query("SELECT count(*) FROM rapport_int_fav WHERE id_rapport = ".$_GET["id"]." AND pid = ".$_SESSION["pid"]."")->fetchColumn();
		if($q > 0)
		{
			?>
			<form action="#" method="get">
				<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
				<input type="hidden" name="pid" value="<?= $_GET['pid']; ?>">
				<button type="submit" name="unsetbookmarks" class="btn btn-secondary" title="Supprimer des Favoris"><i class="fas fa-star"></i> Supprimer des Favoris</button>
				</form>
			<?php
		}else{
			?>
			<form action="#" method="get">
				<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
				<input type="hidden" name="pid" value="<?= $_GET['pid']; ?>">
				<button type="submit" name="bookmarks" class="btn btn-secondary" title="Marquer comme Favoris"><i class="far fa-star"></i></i> Ajouter aux Favoris</button>
				</form>
			<?php
		}
		
		
	}

	public static function GetMarqueLuInterventionTableau($value)
	{
		global $bdd;
		$t = $bdd->query("SELECT * FROM rapport_int_lue join rapport_int WHERE rapport_int_lue.rapport_id = rapport_int.id AND rapport_int_lue.pid = ".$_SESSION["pid"]." AND rapport_int_lue.rapport_id = ".$value."");
		$q = $t->fetch();
		//var_dump($t);
		if ($q["rapport_id"] != $value)
		{
			
		}else{
			?>
			<i class="far fa-envelope-open">
			<?php
		}
	}

	public static function GetMarqueFavoryInterventionTableau($value)
	{
		global $bdd;
		$t = $bdd->query("SELECT * FROM rapport_int_fav join rapport_int WHERE rapport_int_fav.id_rapport = rapport_int.id AND rapport_int_fav.pid = ".$_SESSION["pid"]." AND rapport_int_fav.id_rapport = ".$value."");
		$q = $t->fetch();
		//var_dump($t);
		if ($q["id_rapport"] != $value)
		{
			
		}else{
			?>
			<i class="fas fa-star"></i>
			<?php
		}
	}

	public static function GetVerifVHL($value)
	{
		global $bdd;
		$q = $bdd->query("SELECT * FROM info_vehicules_players WHERE id_vhl = ".$value."");
		$r = $q->fetch();
		if ($r["id_vhl"] != $value)
		{
			
		}else{
			?>
			<i class="fas fa-check-circle"></i>
			<?php
		}	
	}
	
}