<?php 

//vérification que les champs ne sont pas vides
function not_empty($fields)
{

	if (count($fields)!=0)
	{

		foreach ($fields as $field) {

			if (empty($_POST[$field]) || trim($_POST[$field])=="")
			{

				return false;

			}
			
		}


		return true;

	}





}

// verification de l'unicité d'une valeur (pseudo et email)
function is_already_in_use($field,$value,$table)
{

	$bdd=getBdd();

	$q= $bdd->prepare('SELECT id FROM '.$table.' WHERE '.$field.' = ? ');
	$q->execute([$value]);
	$count=$q->rowCount();

	return $count;



}


	
function messages_flash($message,$type='success'){


$_SESSION['messages_flash']='

<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
  
  	'.$message.'

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

';


}


function save_input_data(){


	foreach ($_POST as $key => $value) {
		
		if (strpos($key,'password')==false)
		$_SESSION['input'][$key]=$value;

	}


}


function get_input($key){

	if (!empty($_SESSION['input'][$key]))
	{

		return htmlspecialchars($_SESSION['input'][$key]);

	}


}

function clear_input_data()
{

$_SESSION['input']=[];

}


function activ_mail($name,$pseudo,$email)
{
	$token=sha1($name.$pseudo.$email);



	if (mail($email,'Activation du compte','Activation de votre inscription: '.WEBSITE_URL.'?page=activation&pseudo='.$pseudo.'&token='.$token))
		{
			messages_flash("Un mail d'activation a été envoyé");

		}
		else{

			messages_flash("Problème d'envoi du mail d'activation","danger");

		}


}


function forget_mdp_email($name,$pseudo,$email){

	$token=sha1($name.$pseudo.$email);


	if (mail($email,'Reset mdp','Réinitialisation du mot de passe: '.WEBSITE_URL.'?page=reset_mdp&pseudo='.$pseudo.'&token='.$token))
		{
			messages_flash("Un mail de réinitialisation a été envoyé");

		}
		else{

			messages_flash("Problème d'envoi du mail de réinitialisation","danger");

		}



}