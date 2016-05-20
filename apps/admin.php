<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 1)
{
	if (isset($_GET['action'], $_GET['id']) && $_GET['action'] == 'supprimer')
	{
		$id = intval($_GET['id']);
		$query = 'DELETE FROM articles WHERE id="'.$id.'" LIMIT 1';
		mysqli_query($link, $query);
	}
	else
	{
		if (isset($_GET['action'], $_GET['id']) && $_GET['action'] == 'editer')
		{
			$id = intval($_GET['id']);

			$query = 'SELECT users.id AS users_id, articles.id AS articles_id, 
			articles.titre, articles.contenu, articles.date AS articles_date, 
			articles.auteur, users.login FROM articles INNER JOIN users ON articles.auteur = users.id
			WHERE articles.id = '.$id.'';
			$res = mysqli_query($link, $query);


			while ($ligne = mysqli_fetch_assoc($res))
			{
		
				$id_article = $ligne['articles_id'];
				$titre = $ligne['titre'];
				$contenu = $ligne['contenu'];
				$date = $ligne['articles_date'];
				$id_auteur = $ligne['auteur'];
				$auteur = $ligne['login'];
			}
		require('views/article_edit.phtml');
		}
		else {
			require('views/admin.phtml');
		}
	}

	
}
else
{
	header('Location: index.php?page=login');
	exit;
}
?>