<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 1)
{
	if (isset($_GET['action'], $_GET['id']) && $_GET['action'] == 'supprimer')
	{
		$id = intval($_GET['id']);
		$query = 'DELETE FROM articles WHERE id="'.$id.'" LIMIT 1';
		mysqli_query($link, $query);
		header('Location: index.php?page=index');
		exit;
	}
	else
	require('views/admin.phtml');
}
else
{
	header('Location: index.php?page=login');
	exit;
}
?>