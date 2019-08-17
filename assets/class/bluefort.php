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
}