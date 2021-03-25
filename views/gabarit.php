   <?php require_once '_partials/header.php';   ?>


   <?php require_once '_partials/nav.php';   ?>


   <main class="container">
      <?php
      if (!empty($_SESSION['message_flash'])) {
         echo $_SESSION['message_flash'];
         $_SESSION['message_flash'] = []; // de message chi xuat hien 1 lan, k xuat hien them o nhung site khac
      }

      ?>

      <?= $content;  ?> //! <?php echo $content;  ?>



   </main>



   <?php require_once '_partials/footer.php';   ?>