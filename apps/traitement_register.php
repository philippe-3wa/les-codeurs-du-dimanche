<?php
if (isset($_POST['email'], $_POST['login'], $_POST['password1'], $_POST['password2']))
{
	$email = $_POST['email'];
	$login = $_POST['login'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
		$error = 'Email non valide';
	if (strlen($login) < 3)
		$error = 'Login trop court ! (< 3 caractères)';
	else if (strlen($login) > 32)
		$error = 'Login trop long ! (> 32 caractères)';/** Pascal : Votre login fait maximum 15 caractères dans votre base de données, il serait peut etre judicieux d'avoir la même limite ici ! **/
	if ($password1 != $password2)
		$error = 'Mots de passe différents';
	else if (strlen($password1) < 4)
		$error = 'Mot de passe trop court';
	else if (strlen($password1) > 20)/** Pascal : Je pense sincèrement que limiter la taille maximum du mot de passe ne sert a rien **/
		$error = 'Mot de passe trop long';
	if(empty($error))
	{
		/** Pascal : Je vous conseille de mettre une valeur role par défaut directement dans la base de données et de ne pas l'indiquer ici, c'est plus sécurisé **/
				$query = "INSERT INTO users (login, email, password,role)
				VALUES ('$login', '$email', '$password1','0')";

				$res = mysqli_query($link, $query);/** Pascal : La variable $res ne sert pas là **/

				header('Location: index.php?page=login');
				exit;
	}
}
?>