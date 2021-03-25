<?php ob_start()  ?>

<div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p>extract($variable, EXTR_SKIP);</p>
  <p>array_map('htmlspecialchars', $_POST);</p>
  <p>session_destroy();</p>
  <p>$_SESSION=[]</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>


<?php $content = ob_get_clean();  ?>


<?php require_once 'views/gabarit.php'; ?>