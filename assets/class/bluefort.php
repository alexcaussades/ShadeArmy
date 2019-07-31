<?php

namespace ShadeLife;

/**
 * - Pour les bluefort and medic 
 */
require 'trait/trait_player.php';

class BlueFort implements Players
{
use TPlayers;


	 public function displayCopLevel($rank)
	 {
        $ranks = [null,'1ère Classe','Soldat','Caporal','Sergent','Adjudant','Major','Lieutenant','Capitaine','Commandant','Colonel','Général'];
        return $ranks[$rank];
	}
	
	
}