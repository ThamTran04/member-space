   <?php require_once '_partials/header.php';   ?>


   <?php require_once '_partials/nav.php';   ?>


<main class="container">
    
    <?php  require_once '_partials/errors.php'; ?>

    <?php  
    		if (!empty($_SESSION['messages_flash']))
    		{
				echo $_SESSION['messages_flash'];
				$_SESSION['messages_flash']=[];
    		}

      ?>

<?= $content;  ?>


</main>
    


<?php require_once '_partials/footer.php';   ?>