<?php 

function getBdd()
		{

				try 
				{ 
				 $bdd = new PDO('mysql:host=localhost;dbname=espace_membres', 'root', ''); 
				$bdd -> exec("set names utf8"); // pour passer à l'UTF 8  ou alors $bdd = new  
				 
				} 
				catch (Exception $e) 
				{ 
				        die('Erreur : ' . $e->getMessage()); 
				} 

		return $bdd;
		}
