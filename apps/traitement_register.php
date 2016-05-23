<?php
if (isset($_POST['email'], $_POST['login'], $_POST['password1'], $_POST['password2']))
{
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$login = mysqli_real_escape_string($link, $_POST['login']);
	$password1 = mysqli_real_escape_string($link, $_POST['password1']);
	$password2 = mysqli_real_escape_string($link, $_POST['password2']);
	if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
		$error = 'Email non valide';
	if (strlen($login) < 3)
		$error = 'Login trop court ! (< 3 caractères)';
	else if (strlen($login) > 15)
		$error = 'Login trop long ! (> 15 caractères)';
	if ($password1 != $password2)
		$error = 'Mots de passe différents';
	else if (strlen($password1) < 6)
		$error = 'Mot de passe trop court';
	
	if(empty($error))
	{	
		$password = password_hash($password1, PASSWORD_BCRYPT, array("cost"=>8));
		
		$query = "INSERT INTO users (login, email, password)
		VALUES ('$login', '$email', '$password')";

		mysqli_query($link, $query);

		header('Location: index.php?page=login');
		exit;
	}
}
?>