<?php   ob_start()  ?>

<h1>RĂ©initialisation mdp</h1>
<form method="POST">
  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
 </div>




  <button type="submit" class="btn btn-primary" name="forget_mdp">RĂ©initialisation mdp</button>
</form>


<?php  $content = ob_get_clean();  ?>


<?php  require_once 'views/gabarit.php'; ?>