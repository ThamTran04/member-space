<?php  require_once 'models/reset_mdp.model.php'; ?>

<?php 

if (!isset($_GET['pseudo']) && !isset($_GET['token']))
	{

	header('location: index.php');
	exit;


	}
	else{

		if (reset_verif_token($_GET['pseudo'],$_GET['token']))
			{


				if (isset($_POST['modif_mdp']))
						{

					if (not_empty(['password','confirm_password']))
							{

								$_POST=array_map('htmlspecialchars',$_POST);
								$_POST=array_map('trim',$_POST);
								extract($_POST,EXTR_SKIP);

							
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

									change_mdp($password);
									messages_flash("mot de passe réinitialisé avec succes");
									header('location: ?page=login');
									exit;
							}


							}



						}






			} else{

				messages_flash("Lien de réinitialisation incorrect","danger");
				header('location: ?page=accueil');
				exit;



			}






	}

















?>

<?php  require_once 'views/reset_mdp.view.php'; ?>