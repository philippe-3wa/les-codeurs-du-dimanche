<?php
if ( isset($_SESSION['id']))
{
	$id = $_SESSION['id'];

	$query = 'SELECT id, login, email, password, role, date FROM users WHERE id="'.$id.'"';
	$res = mysqli_query($link, $query);

	while ($ligne = mysqli_fetch_assoc($res))
	{
			$login=$ligne['login'];
			$email=$ligne['email'];
			$role=$ligne['role'];
			$id=$ligne['id'];
			$date=$ligne['date'];
	}
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