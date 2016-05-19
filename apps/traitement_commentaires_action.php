<?php
if (isset($_SESSION['login']))
{
	if (isset($_POST['commentaire']))
	{
		$commentaire = $_POST['commentaire'];
		$id_article = $_POST['id_article'];
		$auteur = $_SESSION['id'];
		$query = "INSERT INTO commentaires (contenu, auteur, id_article) VALUES ('$commentaire', '$auteur', '$id_article')";
		$res = mysqli_query($link, $query);
		header('Location: index.php?page=article&id="'.$id_article.'"');
		exit;


	}
header('Location: index.php?page=login');
exit;
}
?>