<?php  require_once 'models/login.model.php'; ?>

<?php 
if (isset($_POST['login']))
		{

	if (not_empty(['pseudo','password']))
			{

				$_POST=array_map('htmlspecialchars',$_POST);
				$_POST=array_map('trim',$_POST);
				extract($_POST,EXTR_SKIP);

				getLogin($pseudo,$password);

			}



		}

?>

<?php  require_once 'views/login.view.php'; ?>