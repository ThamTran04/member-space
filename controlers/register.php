<?php  require_once 'models/register.model.php'; ?>

<?php 
if (isset($_POST['register']))
		{

			//si tous les champs sont remplis
			if (not_empty(['name','pseudo','email','password','confirm_password']))
			{

				$_POST=array_map('htmlspecialchars',$_POST);
				extract($_POST,EXTR_SKIP);

				$password = password_hash($password,PASSWORD_DEFAULT);

				register_user($name,$pseudo,$email,$password);


			}
			else{
					

			}



		}



?>

<?php  require_once 'views/register.view.php'; ?>