<?php  

if (!isset($_SESSION['user_id']) && !isset($_SESSION['pseudo']))

	{

header('location: ?page=login');
exit;

	}


  ?>






<?php  require_once 'views/profile.view.php'; ?>