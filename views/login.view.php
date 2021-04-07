<?php   ob_start()  ?>

<h1>Connexion</h1>
<form method="POST">
  <div class="form-group">
    <label >Pseudo</label>
    <input type="text" class="form-control" name="pseudo" placeholder="Pseudo">
 </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="password">
  	<a href="?page=forget_mdp">Mot de passe oublié</a>
  </div>


  <button type="submit" class="btn btn-primary" name="login">Connexion</button>
</form>


<?php  $content = ob_get_clean();  ?>


<?php  require_once 'views/gabarit.php'; ?>