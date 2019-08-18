<?php 
session_start();
/**
 * Importation des functions et des class 
 */

require 'assets/auto/header.php';
require 'assets/auto/function.php';
require 'assets/class/ident.php';
require 'assets/class/define.php';
use ShadeLife\ident;

$ident = new ident;

?>


<link rel="stylesheet" href="<?= cssuri(); ?>index.css">
<div class="alert alert-danger" role="alert">
 En cour de création ! <a href="mailto:<?= MAILDEV; ?>">contacter un administrateur</a> !
 La création du compte et la modification du mot de passe sont opérationnelles | En phase Alpha actuellement !
 <li> Une récriture des envoie d'e-mail est actuellement en cours </li>
 <li> Création des rapports d'intervention </li> 
</div>

<div class="d-flex justify-content-center">
  <img class="logogend" src="<?= imguri(); ?>LogoGouv.png" alt="" title="A remplacer avec le nouveau logo">
</div>


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