   <?php require_once '_partials/header.php';   ?>


   <?php require_once '_partials/nav.php';   ?>


<main class="container">
<?php require_once '_partials/errors.php'?>
    
<?php 
if (!empty($_SESSION['message_flash']))
{
   echo $_SESSION['message_flash'];  
   $_SESSION['message_flash']=[]; //pour initialiser le tableau session
}

?>
<?= $content;  ?>


</main>
    


<?php require_once '_partials/footer.php';   ?>