<?php   ob_start()  ?>

<h1>Réinitialisation mdp</h1>
<form method="POST">
  <div class="form-group">
    <label >Mot de passe</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
 </div>

 <div class="form-group">
    <label >Confirmation Mot de passe</label>
    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
 </div>



  <button type="submit" class="btn btn-primary" name="modif_mdp">Réinitialisation mdp</button>
</form>


<?php  $content = ob_get_clean();  ?>


<?php  require_once 'views/gabarit.php'; ?>