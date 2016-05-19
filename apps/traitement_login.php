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
			$_SESSION['email']=$email;/** Pascal : Il vaut mieux utiliser $ligne['email'] que $email, par soucis de lisibilité **/
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
	/** Pascal : Il manque un message d'erreur pour informer l'utilisateur que l'email n'est pas reconnu **/
}
?>