<?php

namespace ShadeLife;

class auth 
{

	public static function connection()
	{
		if(!isset($_SESSION['name']))
		{
			?>
			<script>
				window.location.replace("index.php");
			</script>
			<?php
		}
	}


	public static function connectionAdmin()
	{
		if(!isset($_SESSION['admin']))
		{
			?>
			<script>
				window.location.replace("logout.php?action=logout");
			</script>
			<?php
		}
	}

}