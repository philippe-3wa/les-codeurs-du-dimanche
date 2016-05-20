<?php
if (isset($_SESSION['login']))
{
	if (isset($_POST['title'], $_POST['content']))
	{
		$title = $_POST['title'];
		$content = $_POST['content'];
		$auteur = $_SESSION['id'];

		if (strlen($title) < 3)
			$error = 'Titre trop court ! (< 3 caractères)';
		else if (strlen($title) > 255)
			$error = 'Titre trop long ! (> 255 caractères)';
		if (strlen($content) < 16)
			$error = 'Contenu trop court ! (< 16 caractères)';
		else if (strlen($content) > 1023)
			$error = 'Contenu trop long ! (> 1023 caractères)';
	
		if (empty($error))
		{
			if ($_POST['action'] == "editer")
			{	
				$id_edit = $_POST['id'];
				$query = "UPDATE articles SET titre='".$title."', contenu='".$content."' WHERE id='".$id_edit."'";
			}
			else
			{
				$query = "INSERT INTO articles (titre, contenu, auteur) VALUES ('".$title."', '".$content."', '".$auteur."')";
			}
			mysqli_query($link, $query);

			header('Location: index.php');
			exit;
		}
	}

}
else
{
	header('Location: index.php');
	exit;
}

?>