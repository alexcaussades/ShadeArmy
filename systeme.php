<?php
require 'autoload.php';

 use ShadeLife\ident;


?>
<link rel="stylesheet" href="<?= cssuri(); ?>recherche.css">
<?php

if(!empty($_GET['action']) && $_GET["action"] === "resetpass")
{
  ?>
  <div class="container grade">
    <div><p><h3>Un nouveaux mot de passe ? </h3></p></div>
  <div class="formgnd d-flex justify-content-center">
  <form name="ident" action="#" method="post">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">login</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-envelope"></i></div>
              </div>
                <input type="text" class="form-control" name="email" id="inlineFormInputGroup" placeholder="votre email">
                </div>
                <div class="col-auto">
            <button type="submit" class="float-right btn btn-success mb-2">Changer mon mot de passe</button>
        </div>
  </form>
</div>
</div>
<div>
<a href="./index.php"><button type="submit" class="btn btn-danger mb-2">Retourner au pannel !</button></a>
</div>
  <?php

 echo ident::resetmdp();
}


if(!empty($_GET['action']) && $_GET["action"] === "logout")
{
  session_destroy();
  
  setcookie('login', '', time() - 3600);
  unset($_COOKIE['login']);
  setcookie('pid', '', time() - 3600);
  unset($_COOKIE['pid']);
  ?>
  <meta http-equiv="refresh" content="5 ; url= index.php">
  <div class="alert alert-info" role="alert">
  <strong>redirection en cour veuillez patienter... </strong>
  </div>
  <?php
  exit();
}
?>