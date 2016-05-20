<?php
if (!empty($_SESSION['message']))
{
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
	require('views/message.phtml');
}
?>