<?php
session_start();

require 'autoload.php';


use ShadeLife\ident;
use ShadeLife\BlueFort;
use ShadeLife\auth;


/** Nouvelle nomenclature */

auth::connection();
auth::veriffLoginUsers();
auth::AuthGendarmerie();



	if(ident::getCoplevel(1))
	{
  		require 'assets/auto/navbar-gendarmerie.php';
	}
	if(ident::getCoplevel(1))
	{		
		?>
		<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">

			<div class="bandeau">
			<div class="container">
			<div class="row">
			<div class="col-sm-4">
			<img class="ineterpol" src="https://www.interpol.int/bundles/interpolfront/images/logo-blanc.png" alt="">
			</div>
			<div class="col-sm-8">
			<p class="recherche1">Création de l'Amende pour : <?php echo $_GET["immat"];?> </p>
			</div>
			</div>
			</div>
			</div>
			</div>
		<?php
		$q = $bdd->query("SELECT * FROM vehicles WHERE id = ".$_GET['id']."");
		$r = $q->fetch();
		?>

		<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="">
		<div class="container">
		<div class="row">
		<div class="col-sm-12">
		<div class="form-group">
		<form action="" method="get">
		<select multiple class="form-control" id="exampleFormControlSelect2" name="crime[]">
		<?php
		$t = $bdd->query("SELECT * FROM interpol_crimes");
		while ($crime = $t->fetch())
		{
			?>
			<option value="<?= $crime['price'];?>"><?= $crime['crime'];?></option>
			<?php
		}
		?>
		</select>
		</div>
		
		</select>
		<input type="hidden" name="pid"  value="<?= $_GET['pid'];?>">
		<input type="hidden" name="id" value="<?= $_GET['id'];?>">
		<input type="hidden" name="immat" value="<?= $_GET['immat'];?>">
		<button type="submit" name="prepa" class="btn btn-primary">Poursuivre l'amendement</button>
		</form>


		</div>
		</div>
		<?php
		if(isset($_GET["prepa"]))
		{
			?>
			<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="">
			<div class="container">
			<div class="row">
			<div class="col-sm-12">
			<?php
			$getid	= $_GET['id'];
			$q = $bdd->query("SELECT * FROM info_vehicules_players WHERE id_vhl = ".$getid."");
			//$q->fetch();
			while($r = $q->fetch())
			{
				if($r['id_vhl'] == $getid)
				{
					?>
					<div>
					<i class="fas fa-check-circle"></i> vehicule enregistrer au prêt de l'état
					</div>
					<?php
				}
			}

			$q = $bdd->query("SELECT * FROM info_vehicules_players WHERE id_vhl = ".$getid."");
			//$q->fetch();
			while($r = $q->fetch())
			{
				if($r['recherche_vhl'] == "oui")
				{
					?>
					<button type="button" class="btn btn-warning">ATTENTION CE VHL SUR LA LISTE DES VOLS</button> 
					<?php
				}
			}
			?>
			<form action="#" method="get">
			<label for="">Somme a payer pour l'amende</label>
			<div class="input-group mb-3">
			<div class="input-group-prepend">
			<span class="input-group-text">$</span>
			</div>
			<input type="hidden" name="id" value="<?= $_GET['id'];?>">
			<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?= array_sum($_GET["crime"]);?>">
			</div>

			<div class="custom-control custom-checkbox">
			<input type="checkbox" name="paid" value="1" class="custom-control-input" id="customCheck1">
			<label class="custom-control-label" for="customCheck1">Le paiement de l'amende forfaitaire a-t-il était effectué sur place ?</label>
			</div>

			<input type="hidden" name="somme" id="" value="<?= array_sum($_GET["crime"]);?>">
			<input type="hidden" name="pid"  value="<?= $_GET['pid'];?>">
			
			<input type="hidden" name="immat" value="<?= $_GET['immat'];?>">
			<br>
			<button type="submit" name="create" class="btn btn-primary">Enregister</button>
			</form>
			</div>
			</div>
			</div>
			<?php
		}

		if(isset($_GET["create"]))
		{
			$idvhl = htmlspecialchars($_GET['id']);
			$somme = htmlspecialchars($_GET['somme']);
			$pid = htmlspecialchars($_GET['pid']);
			$immat = htmlspecialchars($_GET['immat']);
			$paid = (empty($_GET["paid"])) ? '0' : htmlspecialchars($_GET["paid"]);
			
			$q = $bdd->prepare("INSERT INTO amende_vhl(id_vhl, somme, pid, immat, paid, date) VALUES(:id_vhl, :somme, :pid, :immat, :paid, NOW())");
			$q->bindValue(":id_vhl", $idvhl);
			$q->bindValue(":somme", $somme);
			$q->bindValue(":pid", $pid);
			$q->bindValue(":immat", $immat);
			$q->bindValue(":paid", $paid);
			$q->execute();

			$message = "L'enregistement de l'amende a bien était effectué ";
			?>
			<br>
			<div class="alert alert-primary" role="alert">
			<?= $message; ?>
			</div>
			<?php

			?>
			<br>
			<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="">
			<div class="container">
			<div class="row">
			<div class="col-sm-12">
			<form action="retraitpoints.php" method="get">
			<div class="custom-control custom-checkbox">
			<input type="checkbox" name="point" value="o" class="custom-control-input" id="customCheck1">
			<label class="custom-control-label" for="customCheck1">L'infraction entraîne-t-il un retrait de points ?</label>
			<input type="hidden" name="pid"  value="<?= $_GET['pid'];?>">
			</div>
			<br>
			<button type="submit"class="btn btn-primary">continuer</button>
			</form>
			<br>
			<a href="rep.php"><button type="submit" class="btn btn-dark">Retour au pannel</button></a>
			</div>
			</div>
			</div>
			<?php
		}

		

		

		?>
		</div>
		</div>
		</div>
		</div>

<?php
	}

require 'footer.php';