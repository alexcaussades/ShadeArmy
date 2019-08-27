<?php
session_start();
require 'assets/auto/header.php';
if(!empty($_GET['action']) && $_GET["action"] === "logout")
{
  session_destroy();
	$users = null;
	$streamer = null;
	$token = null;
	$id = null;
	$password = null;
	$idusers = null;
	$login = null;
	$newpass = null;

  
  ?>
  <meta http-equiv="refresh" content="5 ; url= index.php">
  <div class="alert alert-info" role="alert">
  <strong>redirection en cour veuillez patienter... </strong>
  </div>
  <?php
  exit();
}