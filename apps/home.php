<?php
if (!empty($error))
    require('apps/error.php');

$query = 'SELECT users.id AS auteur_id, articles.id AS article_id, articles.titre, articles.contenu, articles.date, articles.auteur, users.login FROM articles
INNER JOIN users ON articles.auteur=users.id ORDER BY articles.date DESC';
$res = mysqli_query($link, $query);

	while ($ligne = mysqli_fetch_assoc($res))
	{
		
		$id = $ligne['article_id'];
		$titre = $ligne['titre'];
		$contenu = $ligne['contenu'];
		$date = $ligne['date'];
		$auteur = $ligne['login'];
		$id_auteur = $ligne['auteur_id'];
		
		require('views/home.phtml');
	}
?>