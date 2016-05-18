<?php
if (isset($_POST['email'], $_POST['password']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$json = file_get_contents('users.json');
	$list = json_decode($json, true);
	$count = 0;
	$max = sizeof($list);
	while ($count < $max)
	{
		$user = $list[$count];
		if ($user['email'] == $email)
		{
			if ($user['password'] == $password)
			{
				$_SESSION['login'] = $user['login'];
				header('Location: index.php?page=admin');
				exit;
			}
			else
				$error = 'Mot de passe invalide';
		}
		$count++;
	}
	$error = 'Email inconnu';
}
?>