<?php
$query = 'SELECT users.id AS auteur_id, articles.id AS article_id, articles.titre, articles.contenu, articles.date, articles.auteur, users.login FROM articles
INNER JOIN users ON articles.auteur=users.id ORDER BY articles.date DESC';
$res = mysqli_query($link, $query);

	while ($ligne = mysqli_fetch_assoc($res))
	{
		
		$id = $ligne['article_id'];
		$titre = htmlentities($ligne['titre']);
		$contenu = htmlentities($ligne['contenu']);
		$date = $ligne['date'];
		$auteur = htmlentities($ligne['login']);
		$id_auteur = $ligne['auteur_id'];
		
		require('views/home.phtml');
	}
?>