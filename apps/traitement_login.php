<?php
if (isset($_POST['login'], $_POST['password']))
{
	$login = $_POST['login'];
	$password = $_POST['password'];

	$servername = "localhost";
	$username = "root";
	$db_pass = "troiswa";
	$dbname = "blog";

	// Create connection
	$conn = mysqli_connect($servername, $username, $db_pass, $dbname);
	// Check connection
	if (!$conn)
		die("Connection failed: " . mysqli_connect_error());

	$sql = "SELECT id, login, password, role FROM users WHERE login LIKE $login";
	

	if (mysqli_query($conn, $sql)){
		$message = "Inscription correcte";
		}

		else{
		$message = "Inscription incorrecte";
		}
		mysqli_close($conn);

}
?>