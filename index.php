<?php
session_start();
$error = '';
$message = '';
$page = 'home';

$access = array('home', 'article', 'login', 'register', 'admin', 'profile', 'logout');

if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $access))
		$page = $_GET['page'];
}
$access_traitement = array('login', 'register', 'admin', 'logout');
if (in_array($page, $access_traitement))
	require('apps/traitement_'.$page.'.php');
require('apps/skel.php');
?>