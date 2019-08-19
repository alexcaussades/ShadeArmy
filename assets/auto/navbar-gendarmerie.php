<?php
?>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="./rep.php">ShadeArmy</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./rep.php">Home <span class="sr-only">(current)</span></a>
      </li>
          
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gendarmerie <span class="sr-only">(current)</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="search.php">Recherche</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="intervention.php">Rapport intervention</a>
          <a class="dropdown-item" href="#">Favori</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.arma.shadearmy.fr/">Forum <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="http://213.32.7.88/Launcher/ShadeLife.exe">Launcher <span class="sr-only">(current)</span></a>
      </li>
    </ul>

    



    <form action="search.php" method="get" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="name" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Envoyer</button>
    </form>
   
    <ul class="navbar-nav">
    <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <?= $_SESSION['name']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile.php">Profil</a>
          <a class="dropdown-item" href="systeme.php?action=logout">Disconnect</a>
        </div>
      </li>
      </ul>

  </div>
</nav>


