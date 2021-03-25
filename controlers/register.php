<?php  require_once 'models/register.model.php'; ?>

<?php 
if (isset($_POST['register']))
		{

			//si tous les champs sont remplis
			if (not_empty(['name','pseudo','email','password','confirm_password']))
			{
				//array map applique une fonction a tous les champs de la table
				$_POST=array_map('htmlspecialchars',$_POST);
				extract($_POST,EXTR_SKIP); //affecte une variable a tous les champs

				// une fois les donnees extracté, on verifie les erreurs
				//erreur1: longeur du nom
				if (mb_strlen($name)<=5)
					{
						$errors[]="Nom trop court ( minimum 6 caractères)"; //$errors est deja initialise dans le root index.php
					}
				if (mb_strlen($pseudo)<4)
					{
						$errors[]="pseudo trop court ( minimum 4 caractères)"; 
					}

				//erreur2: email est valide: qui a le format dun email: on utilise filter
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) //si cest pas un mail alors il faut afficher erreur
					{
						$errors[]="Adresse email invalide";
					}
				//erreur3: vérifier si lemail et pseudo existe deja: il faut creer une function appelle (if already in use) qui fait ça. on va la creer dans le fichier function.php, cete fonction aura besoin de 3 paramètres: la colonne, le contenu de la colonne(variable) et la table (users)
				if (is_already_in_use('pseudo',$pseudo, 'users'))
					{
						$errors[]="Le pseudo est déjà utilisé";
					}

				if (is_already_in_use('email',$email, 'users'))
					{
						$errors[]="L'email est déjà utilisé";
					}

				// il faut avoir un password qui contient au moins 8 caractères
				if (mb_strlen($password)<8)
				{
						$errors[]="mot de passe trop court ( minimum 8 caractères)"; 
				}
				else
					{
						if ($password!=$confirm_password)
						{
							$errors[]="Les deux mots de passe ne concordent pas";
						}
					}
				

					if (count($errors)==0)
					{
						$password = password_hash($password,PASSWORD_DEFAULT);
						//apres enregistrement on envoi un lien par mail pour activer l'enregistrement grace a une fonction activ mail
						activ_mail($name,$pseudo,$email);
						register_user($name,$pseudo,$email,$password);
						

						//messages_flash("Le compte a bien été créé!"); //on a créé cette function ds function.php

						header ('location: ?page=login');
						exit();
					}	
					//il ne faut jamais mettre du html avant header location
					else
					{
					//pour garder en mémoire les champs deja remplie on utilise les $session pour pas perdre ce quon a deja rempli
						save_input_data(); //on a cree cette function ds function.php
					}
			}

			else
			{
					
				$errors[]="Veuillez remplir tous les champs";
				//pour garder en mémoire les champs deja remplie on utilise les $session pour pas perdre ce quon a deja rempli
				save_input_data();
				
			}



		}
else
{
	clear_input_data();
}


?>

<?php  require_once 'views/register.view.php'; ?>

<!-- un caractere prend 1 oct mais un caractere avec un accent comprend 2 oct, donc pour fixer la longeur une chaine de caractere en prenant en consideration les accents en utilise mb_strlen -->