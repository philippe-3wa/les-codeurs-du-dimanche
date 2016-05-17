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
				$json = file_get_contents('tasks.json');
				$data = json_decode($json, true);
				$list = $data['list'];
				$count = 0;
				$max = sizeof($list);
				while ($count < $max && sizeof($list) == $max)
				{
					if ($list[$count]['id'] == $ligne)
						unset($list[$count]);
					$count++;
				}
				$data['list'] = array_values($list);
				$json = json_encode($data);
				file_put_contents('tasks.json', $json);
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
				$json = file_get_contents('tasks.json');
				$data = json_decode($json, true);
				$list = $data['list'];
				$newid = $data['current'];
				$count = 0;
				$max = sizeof($list);
				while ($count < $max && sizeof($list) == $max)
				{
					if ($list[$count]['id'] == $ligne)
					{
						$task = $list[$count];
						$task['id'] = $newid;
						$list[] = $task;
					}
					$count++;
				}
				$data['current']++;
				$data['list'] = array_values($list);
				$json = json_encode($data);
				file_put_contents('tasks.json', $json);
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
					$json = file_get_contents('tasks.json');
					$data = json_decode($json, true);
					$list = $data['list'];
					$count = 0;
					$max = sizeof($list);
					$continue = true;
					while ($count < $max && $continue)
					{
						if ($list[$count]['id'] == $id)
						{
							$list[$count] = array('title'=>$title, 'description'=>$description, 'priority'=>$priority, 'deadline'=>$deadline, 'author'=>$author, 'create'=>$date, 'id'=>$id);
							$continue = false;
						}
						$count++;
					}
					$data['list'] = array_values($list);
					$json = json_encode($data);
					file_put_contents('tasks.json', $json);
					header('Location: index.php');
					exit;
				}
			}
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
			$json = file_get_contents('tasks.json');
			$data = json_decode($json, true);
			$list = $data['list'];
			$newid = $data['current'];
			$list[] = array('title'=>$title, 'description'=>$description, 'priority'=>$priority, 'deadline'=>$deadline, 'author'=>$author, 'create'=>$date, 'id'=>$newid);
			$data['list'] = array_values($list);
			$data['current']++;
			$json = json_encode($data);
			file_put_contents('tasks.json', $json);
			header('Location: index.php');
			exit;
		}
	}
}
else
{
	header('Location: index.php');
	exit;
}
?>