<?php

function not_empty($fields)
{

	if (count($fields) != 0) {

		foreach ($fields as $field) {

			if (empty($_POST[$field]) || trim($_POST[$field]) == "") {

				return false;
			}
		}

		return true;
	}
}

//cette fonction sert a verifier l'unicité d'une valeur: cad qui nexiste qune seule fois: ca sert a détecter lerreur en cas d'un pseudo ou un mail déja exisitant: elle aura besoin de la colonne, la valeur et la table
//on utilise cette funtion dans register.php et login.php pour detecter les erreur
function is_already_in_use($field, $value, $table)
{
	$bdd = getBdd(); //je me connecte a la bdd
	$q = $bdd->prepare('SELECT id FROM ' . $table . ' WHERE ' . $field . ' = ? '); //preparer la requete
	$q->execute([$value]);
	$count = $q->rowCount(); //on compte le nbre de ligne si soit 0 ou 1 pour savoir si ce qu'on cherche existe deja ou pas

	return $count; //return 1 ou 0 cad existe ou non
}




//function permettant d'afficher un msg par default(indiquer que lutilisateur sest bien inscri)
function messages_flash($message, $type = 'success')
{
	$_SESSION['message_flash'] = '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
' . $message . '
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div> ';
}

//function qui sert a garder en mémoire les données déja renseigné par l'utilisateur en cas d'oubli ou d'erreur lors du renseignement
function save_input_data()
{
	foreach ($_POST as $key => $value) {
		if (strpos($key, 'password') == false) //on cherche la position du password, pour ne pas l'enregistrer cad: si le champs est different du password alor on save data ds un tableau double dimension
			$_SESSION['input'][$key] = $value;             //pour eviter decraser notre variable plus tard ds le code, il faut la bien  identifier en utilisant un tableau a 2 dimensions,tableau ds un tableau
	}
}


//recuperer les valeur enregistré dans le formulaire dans register.view (value)
function get_input($key)
{
	if (!empty($_SESSION['input'][$key])) {
		return htmlspecialchars($_SESSION['input'][$key]);
	}
}

//creer une function qui supprime les données renseignées si on a pas cliquer sur le buton register du formulaire
function clear_input_data()
{
	$_SESSION['input'] = [];
}

//apres enregistrement on envoi un lien par mail pour activer l'enregistrement grace a une fonction activ mail
//on va creer un token qui concatene les 3 variables et fait un hashage pour avoir un identifiant (token) unique
function activ_mail($name, $pseudo, $email)
{
	$token = sha1($name . $pseudo . $email);
	//le format pour lenvoi de lemail est mail('test@test.fr','test catcher','test description catcher') 
	//quand on fait une inscription: on recoit un mail + on aura un msg flash sur le site
	if (mail($email, 'Activation du compte', 'Activation de votre inscription: ' . WEBSITE_URL . '?page=activation&pseudo=' . $pseudo . '&token=' . $token)) {
		messages_flash("Un mail d'activation a été envoyé");
	} else {
		messages_flash("Problème d'envoi du mail d'activation", "danger");
	}
}

function forget_mdp_email($name, $pseudo, $email)
{
	$token = sha1($name . $pseudo . $email);
	//le format pour lenvoi de lemail est mail('test@test.fr','test catcher','test description catcher') 
	//quand on fait une inscription: on recoit un mail + on aura un msg flash sur le site
	if (mail($email, 'Reset mdp', 'Réinitialisation du mot de passe: ' . WEBSITE_URL . '?page=reset_mdp&pseudo=' . $pseudo . '&token=' . $token)) {
		messages_flash("Un mail de réinitialisation a été envoyé");
	} else {
		messages_flash("Problème d'envoi du mail de réinitialisation", "danger");
	}
}
