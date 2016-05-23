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

	while ($ligne2 = mysqli_fetch_assoc($res2))
	{
		$commentaires_auteur = $ligne2['users_login'];
		$commentaires_auteur_id = $ligne2['users_id'];
		$commentaires_contenu = $ligne2['commentaires_contenu'];
		$commentaires_date = $ligne2['commentaires_date'];
		$commentaires_id = $ligne2['commentaires_id'];

		require('apps/commentaires.php');
	}		
	require('apps/commentaires_form.php');
}
?>