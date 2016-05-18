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
		$error = 'Login trop long ! (> 32 caractères)';
	if ($password1 != $password2)
		$error = 'Mots de passe différents';
	else if (strlen($password1) < 4)
		$error = 'Mot de passe trop court';
	if (empty($error))
	{
		


		$servername = "localhost";
		$username = "username";
		$db_pass = "password";
		$dbname = "myDB";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn)
    		die("Connection failed: " . mysqli_connect_error());

		$sql = "INSERT INTO MyGuests (firstname, lastname, email)
		VALUES ('John', 'Doe', 'john@example.com')";

		
		header('Location: index.php?page=login');
		exit;
	}
}
?>