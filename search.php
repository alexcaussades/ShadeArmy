<?php 
	require_once(dirname(__FILE__).'assets/class/bdd.php');
	
    if(isset($_GET['name'])){
        $user = (String) trim(htmlspecialchars($_GET['name']));
        global $bdd;
        $req = $bdd->prepare("SELECT * FROM players WHERE name LIKE ? LIMIT 10");
		$req->execute(array("$user%"));
        foreach($req as $r){
        ?>   
		<div style="color-text: white;">
			<?= htmlspecialchars($r['name']); ?>
		</div>
	<?php 
	}
}
 ?>