<?php

namespace ShadeLife;


require 'trait/trait_player.php';

class Players
{

use TPlayers;

public $pid;

public function __construct()
{
	$this->pid = $this->regexPid();
}


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



}