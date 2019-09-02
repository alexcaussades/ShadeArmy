<?php
session_start();
require 'assets/class/bdd.php';
require 'assets/auto/header.php';
$q = $bdd->query("SELECT * FROM rapport_int");

$r = $q->fetch();
?>

<button class="btn btn-primary" data-clipboard-text="!ban">
    Ban
</button>

<button class="btn btn-dark" data-clipboard-text="!timeout">
    TimeOut
</button>

<script src="assets/js/dist/clipboard.min.js"></script>

<script>
new ClipboardJS('.btn');
</script>








<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="test.js"></script>