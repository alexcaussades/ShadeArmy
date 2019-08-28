<?php
session_start();
require 'assets/class/bdd.php';
ini_set('display_errors', 1); 
error_reporting(E_ALL); 


?>
<form method="POST" action="#" enctype="multipart/form-data">
     <!-- On limite le fichier à 100Ko -->
     <input type="hidden" name="MAX_FILE_SIZE" value="100000">
     Fichier : <input type="file" name="avatar">
     <input type="submit" name="envoyer" value="Envoyer le fichier">
	 <input type="hidden" name="pid" value="<?= $_GET['pid']; ?>">
</form>


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
				//$_GET['pid'] = "76561198124270648";
				$pid = "76561198124270648";
				$q = $bdd->prepare("INSERT INTO avatar(fichier, pid, date) VALUES(:fichier, :pid, NOW())");
				$q->bindValue("fichier", $fichier);
				$q->bindValue("pid", $pid);
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
?>