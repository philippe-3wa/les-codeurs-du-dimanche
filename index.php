<?php
session_start();
$error = '';
$page = 'home';
<<<<<<< HEAD
$access = array('home', 'login', 'register', 'admin', 'logout', 'article');
=======
$access = array('home', 'atricle', 'login', 'register', 'admin', 'profile', 'logout');
>>>>>>> ab5245d0ce7086d25ba0e069ebfe0299b0513f37
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