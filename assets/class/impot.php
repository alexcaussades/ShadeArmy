<?php

namespace ShadeLife;
require 'bdd.php';
//require 'players.php';

/**
 * SELECT * FROM `interpol_crimes` ORDER BY `id` ASC
 */

class Impots extends Players
{
	

	public function __construct()
	{
		parent::__construct();
		
	}

	public function GlobalFacture()
	{
		global $bdd;
		$q = $bdd->prepare("SELECT * FROM factures WHERE from_pid = ?");
		$q->execute(array($this->pid));
		
		while ($t = $q->fetch())
		{
			?> Facture numéros : <?= $t['id']; ?> - A : <?= $t['to_name']; ?> - Price : <?= $t['price']; ?> <br/> <?php
		}
		
	}

	public function Getbank($value = "bankacc")
	{
		global $bdd;
		$q = $bdd->prepare("SELECT * FROM players WHERE pid = :pid");
		$q->execute(array('pid'=> $this->pid));
			while ($r = $q->fetch())
			{
				$this->bankacc = $r[$value];
				$this->ancien = $r[$value];
			}
		$q->closeCursor();
	}

	public function pour($value)
		{
			$ancien = $this->ancien;
		 	$bank = $this->bankacc;
			$pourcentages = $value;
			setlocale(LC_MONETARY, 'en_US');
				echo "Ancien Solde: ". money_format('%(#10n', $ancien)." Taxe de : ".$pourcentages."% Nouveaux Solde: ". money_format('%(#10n',$bank * (1 - $pourcentages/100)); // Pour une réduction
				$this->bankacc = $bank * (1 - $pourcentages/100);
			}


	public function result()
	{
		
	}
}