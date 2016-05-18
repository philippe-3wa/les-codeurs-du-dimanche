<?php
if ( isset($_SESSION['role']))
{
	if ($_SESSION['role'] == 1)
		require('views/profile_admin.phtml');
	else
		require('views/profile.phtml');
}
else
{
	header('Location: index.php?page=login');
	exit;
}
?>