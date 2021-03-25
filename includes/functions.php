<?php

//vérification que les champs ne sont pas vides
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

// verification de l'unicité d'une valeur (pseudo et email)
function is_already_in_use($field, $value, $table)
{

	$bdd = getBdd();

	$q = $bdd->prepare('SELECT id FROM ' . $table . ' WHERE ' . $field . ' = ? ');
	$q->execute([$value]);
	$count = $q->rowCount();

	return $count;
}


//! tu "success" ben duoi xuat hien do muon giong boostrap class="alert alert-success" (https://getbootstrap.com/docs/4.5/components/alerts/)
function message_flash($message, $type = 'success')
{
	$_SESSION['message_flash'] = '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
  ' . $message . '
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

function save_input_data()
{
	foreach ($_POST as $key => $value) {
		if (strpos($key, 'password') == false)

			$_SESSION['input'][$key] = $value;
	}
}
