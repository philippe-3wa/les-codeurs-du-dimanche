<?php
if (isset($_GET['id']))
{

	$id = intval($_GET['id']);

	$query = 'SELECT users.id AS users_id, articles.id AS articles_id, 
	articles.titre, articles.contenu, articles.date AS articles_date, 
	articles.auteur, users.login 
	FROM articles 
	INNER JOIN users ON articles.auteur = users.id
	WHERE articles.id = '.$id.'';

	$res = mysqli_query($link, $query);
	$articles = mysqli_fetch_assoc($res);

	require('views/article.phtml');

	$query2 = 'SELECT commentaires.id AS commentaires_id, commentaires.contenu AS commentaires_contenu, 
	commentaires.auteur AS commentaires_auteur, commentaires.date AS commentaires_date, commentaires.id_article, 
	 users.id AS users_id, users.login AS users_login
	 FROM commentaires   
	 INNER JOIN users ON commentaires.auteur = users.id
	 WHERE commentaires.id_article = '.$id.'
	 ORDER BY commentaires.date DESC'; 

	$res2 = mysqli_query($link, $query2);
	$commentaires = mysqli_fetch_assoc($res2);

	require('apps/commentaires.php');	
	require('apps/commentaires_form.php');
}
?>