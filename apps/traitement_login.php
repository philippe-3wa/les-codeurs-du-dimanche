<?php
if (isset($_POST['email'], $_POST['password']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$query = 'SELECT id, login, email, password, role FROM users WHERE email="'.$email.'"';
	$res = mysqli_query($link, $query);

	while ($ligne = mysqli_fetch_assoc($res))
	{
		if ($ligne['password']==$password)
		{
			$_SESSION['email']=$ligne['email'];
			$_SESSION['role']=$ligne['role'];
			$_SESSION['login']=$ligne['login'];
			$_SESSION['id']=$ligne['id'];
			header('Location: index.php');
			exit;
		}
		else
		{
			$error = 'Mauvais mot de passe';
		}
	}
	$error = 'Adresse mail inconnue';
}
?>