<?php

namespace ShadeLife;

/**
 * - Pour les bluefort and medic 
 */


class BlueFort 
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


}