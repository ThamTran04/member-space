<?php  
session_start();
require_once 'includes/functions.php';
require_once 'config/database.php';
require_once 'config/constants.php';

$errors=[];// initialisation du tableau contenant les erreurs du formulaire

if (!empty($_GET['page']) && is_file('controlers/'.$_GET['page'].'.php')  )

    {


      require_once 'controlers/'.$_GET['page'].'.php'; 

    } 

    else {


      require_once 'controlers/accueil.php'; 

    } 





?>

