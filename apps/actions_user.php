<?php
if (isset($_SESSION['role']))
{
	if ($_SESSION['role'] == 1)
		require('views/actions_commentaires_admin.phtml');
	else if ($_SESSION['role'] == 0)
	{
		if ($commentaires_auteur_id == $_SESSION['id'])
			require('views/actions_commentaires_user.phtml');
	}
}
?>