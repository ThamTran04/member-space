<?php  

function getLogin($pseudo,$password)
	{
	global $errors;	
	$bdd = getBdd();

	$q=$bdd->prepare("SELECT id,pseudo,password FROM users WHERE (pseudo=:pseudo OR email=:pseudo) AND active='1' ");
	$q->execute(['pseudo'=>$pseudo]);

	$userHasBeenFound=$q->rowCount();
	$user=$q->fetch();

	if ($userHasBeenFound and password_verify($password,$user['password'] ))
		{
				$_SESSION['user_id']=$user['id'] ;
				$_SESSION['pseudo']=$user['pseudo'] ;

				header('location: ?page=profile');
				exit;

		}else
		{

			$errors[]="Erreur de login ou de mot de passe";

		}


	}





