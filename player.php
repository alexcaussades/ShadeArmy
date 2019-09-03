<?php 
session_start();

require 'autoload.php';

use ShadeLife\auth;
use ShadeLife\Players;
	use ShadeLife\Impots;
	use ShadeLife\ident;
	use ShadeLife\BlueFort;
	

	$players = new Players;
	$BlueFort = new BlueFort;
	$players->regexPid();
	$players->getInfo();
	$players->advance_identity();

	
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
		<p class="recherche"><?= $players->GetPlayersName(); ?></p>
		<p class="nationalite">Nationalité : <?= $players->getPlayersLieuNaiss(); ?></p>
</div>
</div>
</div>

</div>



<div class="card shadow-lg p-3 mb-5 bg-white rounded">
<div class="container identt">
  <div class="row">
    <div class="col-sm-4">
	<div>
	<?php
	/** recherche l'avatar && wanted sur la bdd  */
		echo $BlueFort->GetPlayersBageWanted();
		
		$r = $bdd->query("SELECT count(*) FROM avatar WHERE pid = ".$_GET['pid']."")->fetchColumn();
		if($r > 0)
		{
			$q = $bdd->query("SELECT * FROM avatar WHERE pid = ".$_GET['pid']." ORDER BY id DESC  LIMIT 1");
			while($r = $q->fetch())
			{
				?>
				<div><img class="avatar" id="test1" src="<?= imguri() ?>/files/<?= $r['fichier'];?>" alt="photo de <?= $players->GetPlayersName(); ?>"></div>
				<?php
			}
		}else
		{
			?>
			<div><img class="avatarsansfichier" id="test1" src="<?= imguri() ?>avatar.jpeg" alt=""></div>
			<?php
		}
		
		?>
	</div>	

	<div class="grade card segonde shadow-lg p-3 mb-5 bg-white rounded" id="file">
<div class="container">
		<div class="row">
		<div class="col-sm-12">
			<form method="POST" action="#" enctype="multipart/form-data">
				<!-- On limite le fichier à 100Ko -->
				<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
				Fichier : <input type="file" name="avatar">
				<input type="submit" name="envoyer" value="Envoyer le fichier">
				<input type="hidden" name="pid" value="<?= $_GET['pid']; ?>">
			</form>
		</div>
		</div>
	</div>
</div>

    </div>
    <div class="col-sm-4">
      <h3>Éléments d'identifications</h3>
      <p><strong>Sexe:</strong> Homme</p>
	  <p><strong>Date de naissance:</strong> <?= $players->getPlayersNaiss(); ?></p>
	  <p><strong>Taille:</strong> <?= $players->getPlayerstaille(); ?></p>
	  <p><strong>Numéros CNI:</strong> <?= $players->getpid(); ?> <button class="btn btn-secondary btn-sm" data-clipboard-text="<?= $players->getpid(); ?>">copy</button></p>
	  <br>
	  <h2>Informations Complémentaires: </h2>
	  <p><strong>Points sur le permis :</strong> <?= $players->GetPlayersPointspermis() ?></p>
	  <p><strong>Numéro de téléphone:</strong> <?= $players->GetPlayersNum();?> <button class="btn btn-secondary btn-sm" data-clipboard-text="<?= $players->getpid(); ?>">copy</button></p>
	  <p><strong>Derniere connection :</strong> <?= $players->GetPlayersLast_seen();?></p>
    </div>
    <div class="col-sm-4">
	<nav class="navbar navbar-dark bg-dark">
  <button type="button" class="btn btn-dark">Imprimier</button> <br /><br />
  <a href="#addnote"><button type="button" class="btn btn-dark">Judiciaire <span class="badge badge-light"><?= $BlueFort->GetPlayersCasier(); ?></span></button></a> <br />
  <a href="wanted.php?pid=<?= htmlspecialchars($players->getpid());?>"><button type="button" class="btn btn-danger">Wanted</button></a></th>
	</nav>

				
	</div>
  </div>
</div>
</div>
</div>


<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded">
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
				<div class="col-sm-8"><h2>Pôle Financier</h2>
				<p><strong>Total du compte :</strong> <?= $players->GetPlayersBankacc() ?></p>
				<p><strong>Nombre de Maison :</strong> <?= $players->getplayersHouse(); ?></p>
				<p><strong>Nombre de containers :</strong> <?= $players->getplayersContanier(); ?></p>
				<p><strong>Nombre de de facture émis :</strong> <?= $players->GetPlayersFromFacture();?></p>
				</div>
		</div>
	</div>
</div>


<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="addnote">
<div class="container">
		<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-8">
		<form method="post" action="assets/application/addjudiciaire.php">
		<Label><h3>Information judiciaire</h3></label>
		<br>

		<div class="form-check form-check-inline">
		<input class="form-check-input" name="option" type="checkbox" id="inlineCheckbox1" value="surveillance">
		<label class="form-check-label" for="inlineCheckbox1">Surveillance</label>
		</div>

		<div class="form-check form-check-inline">
		<input class="form-check-input" name="option" type="checkbox" id="inlineCheckbox2" value="infraction">
		<label class="form-check-label" for="inlineCheckbox2">Infraction</label>
		</div>

		<div class="form-check form-check-inline">
		<input class="form-check-input" name="option" type="checkbox" id="inlineCheckbox3" value="detention" disabled>
		<label class="form-check-label" for="inlineCheckbox3">Detention</label>
		</div>

		<div class="form-group">
		<textarea class="form-control" name="txt" id="exampleFormControlTextarea1" rows="3"></textarea>
		</div>
		
		<input type="hidden" name="pid" value="<?= $_GET['pid']?>">
		<input type="hidden" name="name" value="<?= $_SESSION['name']?>">

		<button type="reset" class="btn btn-dark">Reset</button>
		<button type="submit" class="btn btn-success">Enregistrement</button>
		</form>
		</div>

		
</div>
</div>
</div>

<div class="card segonde shadow-lg p-3 mb-5 bg-white rounded" id="addnote">
<div class="container">
		<div class="row">
		
		<div class="col-sm-12"><h2>Casier Judiciaire</h2>
		<?= $BlueFort->GetplayersCasierView();?>
		</div>
		</div>
</div>
</div>
</div>


<?php


if(isset($_FILES['avatar']))
{
		$dossier = 'assets/img/files/';
		$fichier = basename($_FILES['avatar']['name']);
		$taille_maxi = 10000000;
		$taille = filesize($_FILES['avatar']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['avatar']['name'], '.'); 
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
			$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
		}
		if($taille>$taille_maxi)
		{
			$erreur = 'Le fichier est trop gros...';
		}
		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
			//On formate le nom du fichier ici...
			$fichier = strtr($fichier, 
				'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			{
				echo 'Upload effectué avec succès !';
				
				$q = $bdd->prepare("INSERT INTO avatar(fichier, pid, date) VALUES(:fichier, :pid, NOW())");
				$q->bindValue("fichier", $fichier);
				$q->bindValue("pid", $_GET['pid']);
				$q->execute();
			}
			else //Sinon (la fonction renvoie FALSE).
			{
				echo 'Echec de l\'upload !';
			}
		}
else
{
     echo $erreur;
}
}
require 'footer.php';
?>
<script>
new ClipboardJS('.btn');
</script>