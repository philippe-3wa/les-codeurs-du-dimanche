<?php
if (!empty($error))
    require('views/error.phtml');

$query = 'SELECT id, titre, contenu, date, auteur FROM articles';
$res = mysqli_query($link, $query);

	while ($ligne = mysqli_fetch_assoc($res))
	{
		
		$id = $ligne['id'];
		$titre = $ligne['titre'];
		$contenu = $ligne['contenu'];
		$date = $ligne['date'];
		$auteur = $ligne['auteur'];
		
		require('views/home.phtml');
	}
?>