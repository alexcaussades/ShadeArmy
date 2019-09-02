<?php
namespace ShadeLife;


class ShadeLife 
{
	public function __construct()
	{
		
	}

	public function GetMessage()
	{
		global $bdd;
		$active ="on";
		$q = $bdd->query("SELECT count(*) FROM messagerie WHERE topid = ".$_SESSION["pid"]." AND lu = 0")->fetchColumn();
		if($q > 0)
		{
			?>
			<span class="badge badge-danger"><?= $q;?></span>
			<?php
		}
	}

	public function GetMarqueLu($value)
	{
		global $bdd;
		$t = $bdd->query("SELECT * FROM messagerie WHERE lu = 1 AND id = ".$value."");
		$q = $t->fetch();
		//var_dump($t);
		if ($q["lu"] != 1)
		{
			
		}else{
			?>
			<i class="far fa-envelope-open">
			<?php
		}
	}
}