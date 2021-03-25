<?php  

require_once 'includes/functions.php';
require_once 'config/database.php';

if (!empty($_GET['page']) && is_file('controlers/'.$_GET['page'].'.php')  )

    {


      require_once 'controlers/'.$_GET['page'].'.php'; 

    } 

    else {


      require_once 'controlers/accueil.php'; 

    } 





?>

