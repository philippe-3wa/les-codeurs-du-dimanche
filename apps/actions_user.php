<?php
if ($_SESSION['role'] == 1)
	require('views/actions_commentaires_admin.phtml');
else if ($_SESSION['role'] == 0)
{
	if ($commentaires_auteur == $_SESSION['id'])
		require('views/actions_commentaires_user.phtml');
}
?>