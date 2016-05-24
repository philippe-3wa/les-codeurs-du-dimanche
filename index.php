<?php
session_start();

require('config.php');
$link = mysqli_connect($db_host, $db_login, $db_pass, $db_name);

if (!$link) 
{
    require('views/mysql_error.php');
}

$error = '';
$page = 'home';

$access = array('home', 'article', 'login', 'register', 'admin', 'profile', 'logout', 'commentaires_action');

if (isset($_GET['page']))
{

	if (in_array($_GET['page'], $access))
		$page = htmlspecialchars($_GET['page'], ENT_QUOTES);
}
$access_traitement = array('login', 'register', 'admin', 'logout', 'commentaires_action');
if (in_array($page, $access_traitement))
	require('apps/traitement_'.$page.'.php');
require('apps/skel.php');

mysqli_close($link);
?>