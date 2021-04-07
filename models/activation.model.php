<?php 

function active_compte($pseudo,$token)
{

$bdd=getBdd();


$q=$bdd->prepare('SELECT * FROM users WHERE pseudo=:pseudo');
$q->execute(['pseudo'=>$pseudo]);

 if ($q->rowCount())
	 {
	 	$user=$q->fetch();

	 	$token_verif=sha1($user['name'].$user['pseudo'].$user['email']);

	 	if ($token==$token_verif)
	 	{

	 		$q=$bdd->prepare('UPDATE users SET active="1" WHERE pseudo=:pseudo');
	 		$q->execute(['pseudo'=>$pseudo]);
	 		messages_flash("Compte activé avec succes");

	 		header('location: ?page=login');
	 		exit;

	 	}
	 	else{
	 		messages_flash("Lien d'activation incorrect",'danger');

			header('location: ?page=accueil');
	 		exit;


	 	}



	 }
	 else{
	 		messages_flash("Lien d'activation incorrect",'danger');

			header('location: ?page=accueil');
	 		exit;


	 	}



}