<?php  require_once 'models/register.model.php'; ?>

<?php 
if (isset($_POST['register']))
		{

			//si tous les champs sont remplis
			if (not_empty(['name','pseudo','email','password','confirm_password']))
			{


				$_POST=array_map('htmlspecialchars',$_POST);
				extract($_POST,EXTR_SKIP);

				if (mb_strlen($name)<=5){

					$errors[]="Nom trop court (minimum de 6 caractères) ";
				}

				if (mb_strlen($pseudo)<4){

					$errors[]="Pseudo trop court (minimum de 4 caractères) ";
				}


				if (!filter_var($email,FILTER_VALIDATE_EMAIL))
				{

					$errors[]="Adresse email invalide";

				}


				if (is_already_in_use('pseudo',$pseudo,'users'))
				{

					$errors[]="Le pseudo est déjà utilisé";

				}


				if (is_already_in_use('email',$email,'users'))
				{

					$errors[]="L'email' est déjà utilisé";

				}


				if (mb_strlen($password)<8){

					$errors[]="mot de passe trop court (minimum de 8 caractères) ";

				}

				else
						{

						if ($password!=$confirm_password)
							{
							 $errors[]="Les deux mots de passe  ne concordent pas";


							}


						}


			if (count($errors)==0)

				{
					$password = password_hash($password,PASSWORD_DEFAULT);

					activ_mail($name,$pseudo,$email);

					register_user($name,$pseudo,$email,$password);

					//messages_flash("Le compte a bien été créé");
				
					header('location: ?page=login');
					exit();
				}
				else
				{
					save_input_data();

				}

			

			}
			else{
				
				$errors[]="Veuillez SVP remplir tous les champs";
				save_input_data();

			}



		}
		else
		{
			clear_input_data();

		}



?>

<?php  require_once 'views/register.view.php'; ?>