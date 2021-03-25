<?php


function register_user($name11, $pseudo22, $email33, $password44)

{
	$bdd = getBdd();
	$q = $bdd->prepare('INSERT INTO users(name,pseudo,email,password) VALUES
	(:name1,:pseudo2,:email3,:password4)');
	//!name, pseudo, email, password : nhung tu nay phai sd chinh xac voi nhung tu da duoc khai bao sd trong bdd (table users)
	$q->execute([
		"name1" => $name11,
		"pseudo2" => $pseudo22,
		"email3" => $email33,
		"password4" => $password44,

	]);
}
