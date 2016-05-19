<?php
if (isset($_SESSION['login']))
{
	if (isset($_POST['commentaire']))
	{
		$commentaire = $_POST['commentaire'];
		$id_article = $_POST['id_article'];
		$auteur = $_SESSION['id'];
		$query = "INSERT INTO commentaires (contenu, auteur, id_article) VALUES ('$commentaire', '$auteur', '$id_article')";/** Pascal : Il vaut mieux concaténer plutot que d'écrire les requetes de cette facon ! **/
		$res = mysqli_query($link, $query);/** Pascal : Variable $res inutile ici **/
		header('Location: index.php?page=article&id="'.$id_article.'"');/** Pascal : Très bonne redirection :) **/
		exit;


	}
	/** Pascal : Je suis presque sûr que ces deux lignes ne sont pas au bon endroit :p **/
header('Location: index.php?page=login');
exit;
}
?>