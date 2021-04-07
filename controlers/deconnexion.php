<?php 

session_destroy();

$_SESSION=[];

header("location: accueil.php");
exit;



