<?php 



function reset_verif_token($pseudo,$token)
{

$bdd=getBdd();

$q=$bdd->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
$q->execute(['pseudo'=>$pseudo]);

	 if ($q->rowCount())
		 {

		 	$user=$q->fetch();

		 	$token_verif=sha1($user['name'].$user['pseudo'].$user['email']);

		 	if ($token==$token_verif)
			 	{

			 		return true;


			 	}
			 	else return false;



		 } else return false;



}



function change_mdp($password){

$bdd=getBdd();


$q=$bdd->prepare("UPDATE users SET password=:password WHERE pseudo=:pseudo");
$q->execute(['password'=>password_hash($password,PASSWORD_DEFAULT),'pseudo'=>$_GET['pseudo']]);




}