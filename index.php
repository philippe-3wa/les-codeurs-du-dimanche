<?php
session_start();
$error = '';
$page = 'home';
$access = array('home', 'atricle', 'login', 'register', 'admin', 'logout');
if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $access))
		$page = $_GET['page'];
}
$access_traitement = array('login', 'article', 'register', 'admin', 'logout');
if (in_array($page, $access_traitement))
	require('apps/traitement_'.$page.'.php');
require('apps/skel.php');
?>