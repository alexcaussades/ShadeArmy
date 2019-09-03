<?php 
session_start();
/**
 * Importation des functions et des class 
 */

require 'assets/auto/header.php';
require 'assets/auto/function.php';
//require 'vendor/autoload.php';
require 'assets/class/ident.php';
require 'assets/class/define.php';
use ShadeLife\ident;

$ident = new ident;

?>
<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= cssuri(); ?>index.css">
<div class="alert alert-danger" role="alert">
 En cour de création ! <a href="mailto:<?= MAILDEV; ?>">contacter un administrateur</a> ! | En phase Alpha actuellement !
  <?= $_SESSION["name"];?>
</div>

<div class="bandeau">
		<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<img class="logofrancais" src="./assets/img/logogvt.jpg" alt="">
			</div>
				<div class="col-sm-8">
				<p class="recherche1"> Portail Gouvernemental</p>
				</div>
		</div>
		</div>
		</div>
		</div>
<br><br><br>

<div class="formgnd d-flex justify-content-center">
  <form name="ident" action="#" method="post">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">login</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
                <input type="text" class="form-control" name="login" id="inlineFormInputGroup" placeholder="Username">
                </div>
                
                <label class="sr-only" for="inlineFormInput">passworld</label>
                <div class="input-group mb-2">
                <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-key"></i></div>
                </div>
                <input type="password" class="form-control" name="passworld" id="inlineFormInputGroup" placeholder="Password">
          </div>
        </div>
      <div class="col-auto">
            <button type="submit" class="btn btn-success mb-2"><i class="fas fa-fingerprint"></i> Identification</button>
        </div>
    </form>
</div>
<div class="d-flex justify-content-center">
<a href="register.php"><button type="submit" class="btn btn-info mb-2"><i class="fas fa-plus-square"></i> Creat Account</button></a>&nbsp;
<a href="systeme.php?action=resetpass"><button type="submit" class="btn btn-danger mb-2"><i class="fas fa-retweet"></i> New Password</button></a>

</div>

<?php 
if (isset($_POST['login']) && isset($_POST['passworld']))
{
  $ident->login();
}
?>







<footer>
<?php require 'footer.php'; ?>
</footer>