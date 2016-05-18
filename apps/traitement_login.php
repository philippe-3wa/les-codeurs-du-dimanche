<?php
if (isset($_POST['login'], $_POST['password']))
{
	$login = $_POST['login'];
	$password = $_POST['password'];

	//requete SELECT sql
	$link = mysql_connect('localhost', 'root', 'troiswa');
	if (!$link) {
   	die('Impossible de se connecter : ' . mysql_error());
	}

	// Rendre la base de données users, la base courante
	$db_selected = mysql_select_db('users', $link);
	if (!$db_selected) {
   	die ('Impossible de sélectionner la base de données : ' . mysql_error());
	}

	$link = mysql_connect("localhost", "root", "troiswa")
    or die("Impossible de se connecter : " . mysql_error());
	echo 'Connexion réussie';
	mysql_close($link);

}
?>