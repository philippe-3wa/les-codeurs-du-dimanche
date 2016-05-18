<?php
if (isset($_POST['email'], $_POST['login'], $_POST['password']))
{
	$email = $_POST['email'];
	$login = $_POST['login'];
	$password = $_POST['password'];
	if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
		$error = 'Email non valide';
	if (strlen($login) < 1)
		$error = 'Login trop court ! (< 1 caractères)';
	else if (strlen($login) > 20)
		$error = 'Login trop long ! (> 20 caractères)';
	if (strlen($password) < 4)
		$error = 'Login trop court ! (< 4 caractères)';
	else if (strlen($password) > 15)
		$error = 'Login trop long ! (> 15 caractères)';
	if (empty($error))
	{
		$json = file_get_contents('users.json');
		$list = json_decode($json, true);
		$list[] = array('email'=>$email, 'login'=>$login, 'password'=>$password1);
		$json = json_encode($list);
		file_put_contents('users.json', $json);
		header('Location: index.php?page=login');
		exit;
	}
}
?>