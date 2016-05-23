<?php

if (isset($_SESSION['role'], $_GET['action'], $_GET['id']))
{
	$id_commentaire_edit = intval($_GET['id']);

	if ($_GET['action'] == "edit")
	{
		$query = 'SELECT * FROM commentaires WHERE id="'.$id_commentaire_edit.'"'; 
		$res = mysqli_query($link, $query);
		
		while ($ligne = mysqli_fetch_assoc($res))
			{
				if (($_SESSION['role'] == 1) || ($_SESSION['id'] == $ligne['auteur']))
				{
					$commentaire_id=$ligne['id'];
					$commentaire_contenu=htmlentities($ligne['contenu']);
					$commentaire_auteur=$ligne['auteur'];
					$commentaire_id_article=$ligne['id_article'];
					require('views/commentaires_form_in_edit.phtml');
				}
				
			}
	}	
	if ($_GET['action'] == "delete")
	{
		$origine = intval($_GET['origine']);
		$query = 'DELETE FROM commentaires WHERE id="'.$id_commentaire_edit.'" LIMIT 1';  
		mysqli_query($link, $query);	
		header('Location: index.php?page=article&id='.$origine.'');
		exit;
	}

}
?>