<?php  

function modif_mdp($pseudo,$last_password,$new_password)

{
$bdd=getBdd();

$q=$bdd->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
$q->execute(['pseudo'=>$pseudo]);

$user = $q->fetch();

if (password_verify($last_password, $user['password']))
	{

		$q=$bdd->prepare("UPDATE users SET password=:password WHERE pseudo=:pseudo");
		$q->execute(['password'=>password_hash($new_password,PASSWORD_DEFAULT),'pseudo'=>$pseudo]);

		return true;


	} else{

		return false;
	}




}