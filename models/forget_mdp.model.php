<?php 


function forget_mdp($email){
global $errors;

$bdd=getBdd();

$q=$bdd->prepare("SELECT * FROM users WHERE email=:email");
$q->execute(['email'=>$email]);

$userHasBeenFound=$q->rowCount();

if ($userHasBeenFound)
	{

		$user = $q->fetch();

		forget_mdp_email($user['name'],$user['pseudo'],$user['email']);


	}else{

		$errors[]="Compte absent";

	}



}