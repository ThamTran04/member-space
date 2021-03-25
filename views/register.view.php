<?php   ob_start()  ?>

<form method="POST">
  <div class="form-group">
    <label >Nom</label>
    <input type="text" class="form-control" name="name" placeholder="Votre nom" >
  </div>
  <div class="form-group">
    <label >Pseudo</label>
    <input type="text" class="form-control" name="pseudo" placeholder="Pseudo">
 </div>
  <div class="form-group">
    <label >Email </label>
    <input type="email" class="form-control" name="email" placeholder="Email">
 </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="password">
  </div>
    <div class="form-group">
    <label >Confirm Password</label>
    <input type="password" class="form-control" name="confirm_password" placeholder="Confirmation password">
  </div>

  <button type="submit" class="btn btn-primary" name="register">Inscription</button>
</form>


<?php  $content = ob_get_clean();  ?>


<?php  require_once 'views/gabarit.php'; ?>