<?php  require_once 'models/modif_mdp.model.php'; ?>

<?php 

if (isset($_POST['modif_mdp']))
		{

	if (not_empty(['last_password','new_password','new_confirm_password']))
			{

				$_POST=array_map('htmlspecialchars',$_POST);
				$_POST=array_map('trim',$_POST);
				extract($_POST,EXTR_SKIP);

			
			if (mb_strlen($new_password)<8){

					$errors[]="mot de passe trop court (minimum de 8 caractères) ";

				}

				else
						{

						if ($new_password!=$new_confirm_password)
							{
							 $errors[]="Les deux mots de passe  ne concordent pas";
							}
						}


			if (count($errors)==0)
			{


			if (modif_mdp($_SESSION['pseudo'],$last_password,$new_password)	)
				{

					messages_flash("mot de passe modifié");
					header('location: ?page=profile');
					exit;

				} else{

					$errors[]="Ancien mot de passe incorrect";


				}



			}			




			}



		}
?>

<?php  require_once 'views/modif_mdp.view.php'; ?>