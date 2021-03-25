<?php require_once 'models/register.model.php'; ?>

<?php
if (isset($_POST['register'])) {

	//si tous les champs sont remplis
	if (not_empty(['name', 'pseudo', 'email', 'password', 'confirm_password'])) {

		$_POST = array_map('htmlspecialchars', $_POST);
		extract($_POST, EXTR_SKIP);
		//* ces mots dessus 'name', 'pseudo', 'email', 'password'... viennent de la page html register.view.php  

		//! ham extract co tac dung tao ra cac variables. Cac variables nay là cac index trong array $_POST. Sau nay k can thao tac manuel de tao ra cac variables nay nua. Chi can sd no thoi. vd: $name, $pseudo...
		//? tuy nhien, de cac variables nay moi tao ra k écraser cac variables (neu co) da ton tai truoc do voi cung ten. Do do, can them "EXTR_SKIP" de no k écraser.

		$password = password_hash($password, PASSWORD_DEFAULT);

		register_user($name, $pseudo, $email, $password);
	} else {
	}
}



?>

<?php require_once 'views/register.view.php'; ?>