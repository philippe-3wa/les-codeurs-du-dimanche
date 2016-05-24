<?php
	if (isset($_POST['commentaire']))
	{

		$commentaire = mysqli_real_escape_string($link,$_POST['commentaire']);
		$id_article = $_POST['id_article'];
		$auteur = $_SESSION['id'];

		if (strlen($commentaire) < 3)
			$error = 'commentaire trop court !';

		if (empty($error))
		{

			if (isset($_POST['id_commentaire']))
			{
				$id_new = $_POST['id_commentaire'];
				$query = "UPDATE commentaires SET contenu='".$commentaire."' WHERE id='".$id_new."'";
			}
			else
			{
				$query = "INSERT INTO commentaires (contenu, auteur, id_article) VALUES ('$commentaire', '$auteur', '$id_article')";
			}
			
			
			$res = mysqli_query($link, $query);

			header('Location: index.php?page=article&id='.$id_article.'');
			exit;

		}
		else 
		header('Location: index.php?page=article&id='.$id_article.'');
		exit;
	}


?>