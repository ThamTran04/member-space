<?php  
session_start();
require_once 'includes/functions.php';
require_once 'config/database.php';
require_once 'config/constants.php';


//initialiser le tableau contenant les erreurs du formulaire dans le rooter, il est vide au début
$errors = [];

if (!empty($_GET['page']) && is_file('controlers/'.$_GET['page'].'.php')  ) /*si ds url il ya page suivi dun nom qui existe ds le fichier controlers alors on affiche cette page*/

    {


      require_once 'controlers/'.$_GET['page'].'.php'; 

    } 

    else {


      require_once 'controlers/accueil.php'; /* sinon on affiche la page daccueil*/

    } 





?>

