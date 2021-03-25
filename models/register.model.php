<?php 


function register_user($name,$pseudo,$email,$password)

	{
		$bdd = getBdd();
		$q = $bdd->prepare('INSERT INTO users(name,pseudo,email,password) VALUES (:name,:pseudo,:email,:password)');
		$q->execute(["name"=>$name,
					"pseudo"=>$pseudo,
					"email"=>$email,
					"password"=>$password,

						]);

	}
