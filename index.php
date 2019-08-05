<?php 
session_start();

/**
 * Importation des functions et des class 
 */

require 'assets/auto/header.php';
require 'assets/auto/function.php';
require 'assets/class/ident.php';
 use ShadeLife\ident;

?>


<link rel="stylesheet" href="<?= cssuri(); ?>index.css">
<div class="alert alert-danger" role="alert">
 En cour de création ! contacter un administrateur !
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
                <br />
                <label class="sr-only" for="inlineFormInput">passworld</label>
                <div class="input-group mb-2">
                <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-key"></i></div>
                </div>
                <input type="password" class="form-control" name="passworld" id="inlineFormInputGroup" placeholder="Password">
          </div>
        </div>
      <div class="col-auto">
            <button type="submit" class="float-right btn btn-success mb-2"><i class="fas fa-fingerprint"></i> Identification</button>
        </div>
    
  </form>
</div>

<?php 
if (isset($_POST['login']) && isset($_POST['passworld']))
{
 $ident = new ident;
 $ident->login();
}
?>


<?php

$prod = null;

if($prod == true)
{
?>
<form name="pid" action="sr.php" method="get">
<input type="text" class="form-control" name="pid" placeholder="PID players">
<button type="submit" class="float-right btn btn-success mb-2"><i class="fas fa-fingerprint"></i> Identification</button>
</form>
<?php
}

?>




<footer>
<?php require 'footer.php'; ?>
</footer>