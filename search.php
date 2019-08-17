<?php 
session_start();
	require 'assets/class/bdd.php';
	require 'assets/auto/header.php';
	require 'assets/auto/function.php';
	require 'assets/class/players.php';
	require 'assets/class/impot.php';
	require 'assets/class/ident.php';
	require 'assets/class/bluefort.php';
	use ShadeLife\Players;
	use ShadeLife\Impots;
	use ShadeLife\ident;
	use ShadeLife\BlueFort;
	$ident = new ident;
	$bluefort = new bluefort;

	function rr()
	{
		$user = (String) trim(htmlspecialchars($_GET['name']));
        global $bdd;
        $req = $bdd->prepare("SELECT * FROM players WHERE name LIKE ? LIMIT 10");
		$req->execute(array("$user%"));
        foreach($req as $r){
        ?>   
				<tr>
				<th scope="row"><?= htmlspecialchars($r['name']); ?></th>
				<th><a href="player.php?pid=<?= htmlspecialchars($r['pid']);?>"><button type="button" class="btn btn-dark">Profile</button></a>
				<a href="rapport.php?pid=<?= htmlspecialchars($r['pid']);?>"><button type="button" class="btn btn-primary">Rapport</button></a>
				<a href="wanted.php?pid=<?= htmlspecialchars($r['pid']);?>"><button type="submit" class="btn btn-danger">Wanted</button></a>
				</th>
				</tr>
		<?php 
	}
	}
?>
	
	<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">
<?php
if(!isset($_SESSION['name']))
{
	?>
	<script>
     	window.location.replace("index.php");
    </script>
	<?php
}else
{
	?>
	<div class="bandeau">

<div class="container">
<div class="row">
	<div class="col-sm-4">
		<img class="ineterpol" src="https://www.interpol.int/bundles/interpolfront/images/logo-blanc.png" alt="">
	</div>
		<div class="col-sm-8">
		<p class="recherche1">Recherche de personnes :</p>
		</div>
</div>
</div>
</div>
</div>


	<div class="info">
		<div class="alert alert-info grade container" role="alert">
		Bienvenue dans la recheche de personnes !
		</div>
	</div>

	<div class="formgnd d-flex justify-content-center">
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
				<th scope="col">Name</th>
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

 
}
 ?>