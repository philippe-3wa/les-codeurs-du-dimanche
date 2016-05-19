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
		else if (strlen($title) > 32)
			$error = 'Titre trop long ! (> 32 caractères)';
		if (strlen($content) < 16)
			$error = 'Contenu trop court ! (< 16 caractères)';
		else if (strlen($content) > 1024)
			$error = 'Contenu trop long ! (> 1024 caractères)';
	
		if (empty($error))
		{
			$query = "INSERT INTO articles (titre, contenu, auteur) VALUES ('$title', '$content', '$auteur')";
			$res = mysqli_query($link, $query);

			header('Location: index.php');
			exit;
		}
	}
	else
	{
		
	}
}
else
{
	header('Location: index.php');
	exit;
}

?>