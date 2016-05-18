<?php
if (isset($_SESSION['login']))
{
	if (isset($_GET['action']))
	{
		$action = $_GET['action'];
		if ($action == 'supprimer')
		{
			if (isset($_GET['id']))
			{
				$ligne = intval($_GET['id']);
				header('Location: index.php');
				exit;
			}
			else
				$error = "Il manque l'identifiant de la tache";
		}
		else if ($action == 'dupliquer')
		{
			if (isset($_GET['id']))
			{
				$ligne = intval($_GET['id']);
				header('Location: index.php?page=admin&action=editer&id='.$newid);
				exit;
			}
			else
				$error = "Il manque l'identifiant de la tache";
		}
		else if ($action == 'editer')
		{
			if (isset($_POST['id'], $_POST['title'], $_POST['description'], $_POST['priority'], $_POST['deadline']))
			{
				$id = intval($_POST['id']);
				$title = $_POST['title'];
				$author = $_SESSION['login'];
				$description = $_POST['description'];
				$priority = $_POST['priority'];
				$deadline = $_POST['deadline'];
				$create = date('d/m/Y H\hi');
				if (strlen($title) < 3)
					$error = 'Titre trop court ! (< 3 caractères)';
				else if (strlen($title) > 32)
					$error = 'Titre trop long ! (> 32 caractères)';
				if (strlen($description) < 16)
					$error = 'Description trop courte ! (< 16 caractères)';
				else if (strlen($description) > 1024)
					$error = 'Description trop longue ! (> 1024 caractères)';
				if ($priority < 1 || $priority > 10)
					$error = 'Priorité incorrecte ! (Doit être comprise entre 1 et 10)';
				$time = strtotime($deadline);
				if ($time === false)
					$error = 'Format de la deadline incorrect !';
				else if ($time < time())
					$error = 'La date limite est déjà passée !';
				if (empty($error))
				{
					$deadline = date('d/m/Y H\hi', $time);
					$date = date('d/m/Y H\hi');
					header('Location: index.php');
					exit;
				}
			}
		}
		else
		{
			require('views/article_edit.phtml');
		}
	}
	else if (isset($_POST['title'], $_POST['description'], $_POST['priority'], $_POST['deadline']))
	{
		$title = $_POST['title'];
		$author = $_SESSION['login'];
		$description = $_POST['description'];
		$priority = $_POST['priority'];
		$deadline = $_POST['deadline'];
		$create = date('d/m/Y H\hi');
		if (strlen($title) < 3)
			$error = 'Titre trop court ! (< 3 caractères)';
		else if (strlen($title) > 32)
			$error = 'Titre trop long ! (> 32 caractères)';
		if (strlen($description) < 16)
			$error = 'Description trop courte ! (< 16 caractères)';
		else if (strlen($description) > 1024)
			$error = 'Description trop longue ! (> 1024 caractères)';
		if ($priority < 1 || $priority > 10)
			$error = 'Priorité incorrecte ! (Doit être comprise entre 1 et 10)';
		$time = strtotime($deadline);
		if ($time === false)
			$error = 'Format de la deadline incorrect !';
		else if ($time < time())
			$error = 'La date limite est déjà passée !';
		if (empty($error))
		{
			$deadline = date('d/m/Y H\hi', $time);
			$date = date('d/m/Y H\hi');
			header('Location: index.php');
			exit;
		}
	}
	else
	{
		require('views/article_add.phtml');
	}
}
else
{
	header('Location: index.php');
	exit;
}
?>