<?php
if (!empty($error))
	require('views/error.phtml');


if (isset($_GET['id']))
{

	$id = intval($_GET['id']);

	$query = 'SELECT id, titre, contenu, date, auteur FROM articles WHERE id="'.$id.'"';
	$res = mysqli_query($link, $query);

	while ($ligne = mysqli_fetch_assoc($res))
	{
		
		$id = $ligne['id'];
		$titre = $ligne['titre'];
		$contenu = $ligne['contenu'];
		$date = $ligne['date'];
		$auteur = $ligne['auteur'];
	}

	require('views/article.phtml');
	require('apps/commentaires.php');
	require('apps/commentaires_form.php');
}
?>