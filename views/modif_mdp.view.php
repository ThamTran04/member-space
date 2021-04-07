<?php   ob_start()  ?>

<h1>Modification du mot de passe</h1>
<form method="POST">

  <div class="form-group">
    <label for="exampleInputPassword1">Ancien mot de passe</label>
    <input type="password" class="form-control" name="last_password" placeholder="password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Nouveau mot de passe</label>
    <input type="password" class="form-control" name="new_password" placeholder="password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Confirmation nouveau mot de passe</label>
    <input type="password" class="form-control" name="new_confirm_password" placeholder="password">
  </div>


  <button type="submit" class="btn btn-primary" name="modif_mdp">Modification du mot de passe</button>
</form>


<?php  $content = ob_get_clean();  ?>


<?php  require_once 'views/gabarit.php'; ?>