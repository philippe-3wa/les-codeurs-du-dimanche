<?php
if (!empty($error))
	require('apps/error.php');


if (isset($_GET['id']))
{

	$id = intval($_GET['id']);

	$query = 'SELECT users.id AS users_id, articles.id AS articles_id, 
	articles.titre, articles.contenu, articles.date AS articles_date, 
	articles.auteur FROM articles INNER JOIN users ON articles.auteur = users.id';
	$res = mysqli_query($link, $query);

	while ($ligne = mysqli_fetch_assoc($res))
	{
		
		$id = $ligne['articles_id'];
		$titre = $ligne['titre'];
		$contenu = $ligne['contenu'];
		$date = $ligne['articles_date'];
		$auteur = $ligne['auteur'];
	}

	require('views/article.phtml');
	require('apps/commentaires.php');
	require('apps/commentaires_form.php');
}
?>