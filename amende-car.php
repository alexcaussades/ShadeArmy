<?php 
session_start();
	require 'assets/class/bdd.php';
	require 'assets/auto/header.php';
	require 'assets/auto/function.php';
	require 'assets/class/players.php';
	require 'assets/class/impot.php';
	require 'assets/class/ident.php';
	require 'assets/class/bluefort.php';
	require 'assets/class/auth.php';

use ShadeLife\auth;
use ShadeLife\Players;
	use ShadeLife\Impots;
	use ShadeLife\ident;
	use ShadeLife\BlueFort;
	$ident = new ident;
	$bluefort = new bluefort;

	function rr()
	{
		$user = (String) $_GET['name'];
		
        global $bdd;
        $req = $bdd->prepare("SELECT * FROM vehicles join players WHERE vehicles.pid = players.pid and immatriculation LIKE ? LIMIT 30");
		$req->execute(array("%$user%"));
        foreach($req as $r){
        ?>   
				<tr>
				<th scope="row"><?= htmlspecialchars(str_replace('"','',$r['immatriculation'])); ?></th> <!-- verif -->
				<th scope="row"><?= htmlspecialchars($r['classname']);?></th>
				<th scope="row"><?= htmlspecialchars($r['name']);?></th>
				<th scope="row"><a href="amende-car-creat.php?pid=<?= htmlspecialchars($r['pid']);?>&id=<?= htmlspecialchars($r['id']);?>&immat=<?= htmlspecialchars(str_replace('"','',$r['immatriculation'])); ?>"><button type="button" class="btn btn-dark">Crée une amende</button></a></th>
				</tr>
		<?php 
	}
	}
?>
	
	<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">
<?php
	auth::connection();
	auth::AuthGendarmerie();
	if(ident::getCoplevel(1))
	{
  		require 'assets/auto/navbar-gendarmerie.php';
	}
	?>
	<div class="bandeau">

<div class="container">
<div class="row">
	<div class="col-sm-4">
		<img class="ineterpol" src="https://www.interpol.int/bundles/interpolfront/images/logo-blanc.png" alt="">
	</div>
		<div class="col-sm-8">
		<p class="recherche1">Recherche de Véhicule :</p>
		</div>
</div>
</div>
</div>
</div>

<div class="grade formgnd d-flex justify-content-center">
  <form name="ident" action="#" method="get">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">login</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
                <input type="text" class="form-control" name="name" id="inlineFormInputGroup" placeholder="Entrée les premieres lettre ?">
                </div>
          </div>
        
      <div class="col-auto">
            <button type="submit" class="btn btn-success mb-2"></i> recherche</button>
        </div></div>
    </form>
</div>





<?php 
	
    if(isset($_GET['name'])){
		?>
	<div class="container table-responsive-sm ">
	
		<table class="table">
			<thead class="thead-dark">
				<tr>
				<th scope="col">Plaque d'immatriculation</th>
				<th scope="col">Modele</th>
				<th scope="col">Titulaire</th>
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
			<?= rr(); ?>
    		</tbody>
  			</table>
  	</div>
   
	<?php
	}

 


require 'footer.php';
?>